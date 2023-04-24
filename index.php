<?php
include_once 'Classes/class.user.php';
include_once 'Classes/class.glass.php';
include_once 'Classes/class.aluminum.php';
include_once 'Classes/class.installation.php';
include 'Config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$glass = new glass();
$installation = new installation();
$aluminum = new aluminum();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>FAGAN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/custom.css?<?php echo time();?>">
      <h1>FAGAN</h1>
      <h2>GLASS & ALUMINUM</h2>
  <div id="menu">
    <a href="index.php"><img src="css/p/logo1.png" class="logo1"></a>
    <a href="index.php?page=products" class="m1">PRODUCTS</a>
    <a href="index.php?page=settings" class="m3">SETTINGS</a>
    <a href="logout.php" >LOGOUT</a>
  </div>
  </div>
  <div id="content">
<body>

<span class="move-right"><?php echo $user->get_user_lastname($user_id).''.$user->get_user_firstname($user_id);?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span>
  <div id="content">
    <?php
      switch($page){
                case 'settings':
                    require_once 'Settings/index.php';
                break; 
                case 'products':
                    require_once 'Products/index.php';
                break; 
                case 'invoice':
                    require_once 'invoice-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>
</div>

</body>
</html>