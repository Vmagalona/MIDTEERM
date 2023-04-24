<div id="second-submenu">
    <a href="index.php?page=products&subpage=glass">Glass</a> 
    <a href="index.php?page=products&subpage=aluminum">Aluminum</a> 
    <a href="index.php?page=products&subpage=installation">Installation</a>
</div>
<div id="content">
    <?php
      switch($subpage){
                case 'glass':
                    require_once 'P-Glass/index.php';
                break; 
                case 'aluminum':
                    require_once 'P-Aluminum/index.php';
                break; 
                case 'installation':
                    require_once 'P-Installation/index.php';
                break; 
                case 'log':
                    require_once 'P-Transaction/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>