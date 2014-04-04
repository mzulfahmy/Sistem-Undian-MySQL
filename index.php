<?php
session_start();
include('tetapan.php');
$index = new indeX;

if(isset($_POST['submit'])){
$ic = $_POST['ic'];
$act = $index -> check_no_kp($ic);

if(isset($act)){
$error = $act;
}

if(empty($act)){
$_SESSION['xsc'] = $ic;
header("Location: undian.php");
}
}

?>


<!DOCTYPE html>
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--TITLE-->
<title>
<?php
global $appname;
echo "{$appname}"; 
 ?>
</title>
<!--END TITLE-->

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
	<?php if(isset($error)){echo $error; } ?>
	<!--FORM-->
	<form name="form1" method="post" action="">
    <!--TITLE--><h1><?php echo "{$appname}" ?></h1><!--END TITLE-->
    <!--DESCRIPTION-->
	<span>Sila masukkan no kad pengenalan anda.</span>

	<!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME-->
	<input type="text" class="input username" placeholder="No Kad Pengenalan" name="ic"/>
	<!--END USERNAME-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON-->
	<input type="submit" name="submit" value="Log Masuk" class="button" />
	<!--END LOGIN BUTTON-->
	</form>
	<!--END FORM-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>