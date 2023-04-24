<div id="third-submenu">
 <a href="index.php?page=settings&subpage=users&action=create">New Employee</a>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'Users/create-user.php';
                break; 
                case 'modify':
                    require_once 'Users/modify-user.php';
                break; 
                case 'profile':
                    require_once 'Users/view-profile.php';
                break;
                case 'result':
                    require_once 'Users/search-user.php';
                break;
                default:
                    require_once 'Users/main.php';
                break; 
            }
    ?>
  </div>