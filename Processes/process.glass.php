<?php
include '../classes/class.glass.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_transaction();
	break;
    case 'additem':
        new_glass_item();
	break;
    
}

function create_new_transaction(){
	$glass = new glass();
    $gtype=ucwords($_POST['gtype']);
    $gthick=($_POST['gthick']);
    $gdimension=($_POST['gdimension']);
    $gcolor= ucwords($_POST['gcolor']);
    $gmanufacturer= ucwords($_POST['gmanufacturer']);
    $gprice=($_POST['gprice']);
    $gstock=($_POST['gstock']);


    $rid = $glass->new_glass($gtype, $gthick, $gdimension, $gcolor, $gmanufacturer, $gprice, $gstock);
    if(is_numeric($rid)){
        header('location: ../index.php?page=products&subpage=glass&action=glass&id='.$rid);
    }
}



