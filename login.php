<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new user();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Incorrect E-mail & Password!</div>
        <?php
	}
}
?>
<html>
	<head>
  	  <title>FAGAN</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css?<?php echo time();?>">
	</head>
<body>
<div>
	<div id="login-block-shadow">
</div>
<div>
	<div id="login-block1">
</div>
<div>
	<div id="login-block2">
</div>
<div>
	<div id="login-block3">
</div>
<div>
	<div id="login-block4">
</div>
<div>
	<div id="login-block5">
</div>
<div>
	<div id="login-block6">
</div>
<div>
	<div id="login-block7">
</div>
<div>
	<div id="login-block8">
</div>
<div>
	<div id="login-block9">
</div>
<div>
	<div id="login-block10">
</div>
<div>
	<div id="login-block11">
</div>
<div>
	<div id="login-block12">
</div>
<div>
	<div id="login-block13">
</div>

<div class = "container">
  <img src = "css/p/logo.png" alt = "Company Logo" class = "logo">
</div>

<div id = "login-bg">
</div>

<div id = "loginM">
<form method="POST" action="" name="login">
	<div>
		<img src = "css/p/mail.png" alt = "Mail Icon" class = "Micon"> 
	</div>

	<div>
		<img src = "css/p/key1.png" alt = "Key Icon" class = "Kicon"> 
	</div>
	
	<div>
		<input type="email" class="input" required name="useremail" placeholder="  E-mail"/>
	</div>

	<div>
		<input type="password" class="input" required name="password" placeholder="  Password"/>
	</div>

	<div>
		<input type="submit" name="submit" value="Log In"/>
	</div>

			</form>
		</div>
	</body>
</html>