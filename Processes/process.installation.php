<?php
include '../classes/class.installation.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_transaction();
	break;
    case 'additem':
        new_installation_item();
	break;
    case 'saveitem':
        save_installation_items();
	break;
}

function create_new_transaction(){
	$installation = new installation();
    $instname= ucwords($_POST['instname']);
    $instnum= ucwords($_POST['instnum']);
    $instemail= ucwords($_POST['instemail']);
    $instdes= ucwords($_POST['instdes']); 
    
    $rid = $installation->new_installation($instname, $instnum, $instemail, $instdes);
    if(is_numeric($rid)){
        header('location: ../index.php?page=products&subpage=installations&action=installations&id='.$rid);
    }
}



function save_installation_items(){
	$installation = new installation();
    $id = $_POST['recid'];
    $installation->save_to_inventory($id);
    $rid = $installation->save_installation_items($id);
    if($rid){
        header('location: ../index.php?page=products&subpage=installations&id='.$id);
    }
}