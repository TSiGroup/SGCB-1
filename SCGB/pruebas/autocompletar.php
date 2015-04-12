<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="../assets/plugins/jquery-1.8.3.min.js"></script>
  <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
 

  
 <script>
	$(function() {
		function log( message ) {
			$( "<div>" ).text( message ).prependTo( "#log" );
			$( "#log" ).scrollTop( 0 );
		}

		$( "#birds" ).autocomplete({
			source: "buscar.php",
			minLength: 1,
			select: function( event, ui ) {
				log( ui.item ?
					"Selected: " + ui.item.value + " aka " + ui.item.id :
					"Nothing selected, input was " + this.value );
			}
		});
	});
	</script>
</head>
<body>
 
<div class="ui-widget">
	<label for="birds">Birds: </label>
	<input id="birds">
</div>

<div class="ui-widget" style="margin-top:2em; font-family:Arial">
	Result:
	<div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>

 
 
</body>
</html>