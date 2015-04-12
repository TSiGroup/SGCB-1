<?
//Timer start
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;


ini_set('memory_limit','4000M');


$host = "localhost";
$user = "root";
$pass = "";

$db = "proyecto";

$link = mysql_connect($host,$user,$pass);
$result = mysql_query("show databases like 'tag%'");  // we only want tagdb

while($row = mysql_fetch_row($result))
{
    $dbs[] = $row[0];
}

backup_tables('localhost','root','','proyecto');


//backup_tables($host,$username,$password,$db);

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{

      $fname = 'SGCB-Full-'.$name.'_'.time().'.sql'; 
      echo $fname."\n";
      $handle = fopen($fname,'w+');
      $return = '';
      fwrite($handle,$return);
      fclose($handle);

      $link = mysql_connect($host,$user,$pass);
      mysql_select_db($name,$link);

      //get all of the tables
      if($tables == '*')
{
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = @mysql_fetch_row($result))
    {
        $tables[] = $row[0];
    }
}
else
{
    $tables = is_array($tables) ? $tables : explode(',',$tables);
}

foreach($tables as $table)
{
  $handle = fopen($fname,'a');
  fwrite( $handle, 'DROP TABLE IF EXISTS '.$table.';' );

  $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
  fwrite( $handle, "\n\n".$row2[1].";\n\n" );

  $offset = 10000;

  $start = 0;
  do {
      $result = mysql_query( "SELECT * FROM ".$table." LIMIT ".$start.", ".$offset."" );
      $start += $offset;


      $num_rows = mysql_num_rows( $result );
      if (false === $result) {
        //close original file
        fclose($handle);
        //open error file
        $errfn = $fname.'.ERROR';
        $errf = fopen($errfn,'a');
        $err = mysql_error();
        fwrite( $errf, $err );
        fclose($errf);
        //reopen original file
        $handle = fopen($fname,'a');
        //break loop
        $num_rows = 0;
      }

      while( $row = mysql_fetch_row( $result ) ) {
          $line = 'INSERT INTO '.$table.' VALUES(';
          foreach( $row as $value ) {
              $value = addslashes( $value );
              @$value = ereg_replace( "\n","\\n", $value );
              $line .= '"'.$value.'",';
          }
          $line = substr( $line, 0, -1 ); // cut the final ','
          $line .= ");\n";
          fwrite( $handle, $line );
      }
  } while( $num_rows !== 0 );
  }

  $return="\n\n\n";
  fwrite($handle,$return);
  fclose($handle);
}

//End timer and output time
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo "\n Page generated in ".$total_time." seconds. \n";
?>