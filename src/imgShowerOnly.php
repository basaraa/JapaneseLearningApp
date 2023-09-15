<?php
include "partials/header.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["title"])){
	include "helper/helpFunctions.php";
	$name=mb_escape($_GET["title"]);
	?>
	<div>
	 <h1 class="purple"><?php echo str_replace("_"," ",ucfirst($name))?></h1>
	 <img src="img/variousImg/<?php echo $name?>.jpg" alt="x"></img>
	</div>
<?php
}
else echo http_response_code(400);
?>
<?php
include ("partials/footer.php");
?>