<div id="fourth-submenu">
    <a href="index.php?page=products&subpage&action=installation">Records</a> | <a href="index.php?page=products&subpage=installation&action=create">New Project</a>
</div>                                                                                     
<div id="subcontent1">
    <?php
      switch($action){
                case 'create':
                    require_once 'P-Installation/new-installation.php';
                break; 
                case 'installation':
                    require_once 'P-Installation/installation-products.php';
                break; 
                case 'view':
                    require_once 'P-Installation/new-installation.php';
                break;
                case 'result':
                    require_once 'P-Installation/new-installation.php';
                break;
                default:
                    require_once 'P-Installation/main.php';
                break; 
            }
    ?>
  </div>