<?php
include '../classes/class.aluminum.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_transaction();
	break;
    case 'additem':
        new_aluminum_item();
	break;
    case 'saveitem':
        save_aluminum_items();
	break;
}

function create_new_transaction(){
	$aluminum = new aluminum();
    $alname= ucwords($_POST['alname']);
    $desc= ucwords($_POST['desc']); 
    $amount= $_POST['amount']; 
    $rid = $aluminum->new_aluminum($alname, $desc, $amount);
    if(is_numeric($rid)){
        header('location: ../index.php?page=products&subpage=aluminums&action=aluminums&id='.$rid);
    }
}



function save_aluminum_items(){
	$aluminum = new aluminum();
    $id = $_POST['recid'];
    $aluminum->save_to_inventory($id);
    $rid = $aluminum->save_aluminum_items($id);
    if($rid){
        header('location: ../index.php?page=products&subpage=aluminums&id='.$id);
    }
}