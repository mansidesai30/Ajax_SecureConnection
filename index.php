<?php
session_start();
$token=md5(rand(1000,9000));
$_SESSION["token"] =$token ;

?>
<!DOCTYPE>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>



$(document).ready(function(){
	$( ".mnu" ).click(function( event ) 
	{
	   // Stop form from submitting normally
	   event.preventDefault();
	  
	  	$("#data").html("loading");  
		var data="pageid="+$(this).attr("value")+"&token="+"<?php echo $token; ?>";  
		
	  $.post("getData.php", data).done(
		function(response)
		{
			//alert(response);
			$("#data").html(response);
		}
	   ).fail(function(jqXHR, textStatus, errorThrown) 
	   {
			  $("#error").html(jqXHR.responseText);
	   }
	 );

	});
});


</script>

</head>
<body>

	<div id="menu">
		<ul>
		<li ><a href="#"  class="mnu" value="abt">About</a>
		<a href="#"  class="mnu" value="cat">Cat</a></li>
		</ul>
	</div>
	
	<div id="data">
	
	</div>
	
	<span id="error"></span>
	

</body>
</html>
