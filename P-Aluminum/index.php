<div id="third-submenu">
    <a href="index.php?page=products&subpage=aluminum">Data</a> | <a href="index.php?page=products&subpage=aluminum&action=create">New Product</a>
<div id="subcontent2">
    <?php
      switch($action){
                case 'create':
                    require_once 'P-Aluminum/new-aluminum.php';
                break; 
                case 'aluminum':
                    require_once 'P-Aluminum/aluminum-products.php';
                break; 
                case 'view':
                    require_once 'P-Aluminum/new-aluminum.php';
                break;
                case 'result':
                    require_once 'P-Aluminum/new-aluminum.php';
                break;
                default:
                    require_once 'P-Aluminum/main.php';
                break; 
            }
    ?>
  </div>