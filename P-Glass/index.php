<div id="third-submenu">
    <a href="index.php?page=products&subpage=glass">Data</a> | <a href="index.php?page=products&subpage=glass&action=create">Add Product</a>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'P-Glass/new-glass.php';
                break; 
                case 'glass':
                    require_once 'P-Glass/glass-products.php';
                break; 
                case 'view':
                    require_once 'P-Glass/new-glass.php';
                break;
                case 'result':
                    require_once 'P-Glass/new-glass.php';
                break;
                default:
                    require_once 'P-Glass/main.php';
                break; 
            }
    ?>
  </div>