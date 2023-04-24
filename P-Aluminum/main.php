<h3>Aluminum</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Aluminum ID</th>
        <th>Alloy</th>
        <th>Aluminum Thickness</th>
        <th>Aluminum Width</th>
        <th>Aluminum Length</th>
        <th>Aluminum Manufacturer</th>
        <th>Aluminum Price</th>
        <th>Aluminum Stocks</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($aluminum->list_aluminum() != false){
foreach($aluminum->list_aluminum() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=products&subpage=aluminums&action=aluminums&id=<?php echo $aluminum_id;?>"><?php echo $aluminum_id;?></td>
        <td><?php echo $aluminum_type;?></td>
        <td><?php echo $aluminum_thickness;?></td>
        <td><?php echo $aluminum_width;?></td>
        <td><?php echo $aluminum_length;?></td>
        <td><?php echo $aluminum_manufacturer;?></td>
        <td><?php echo $aluminum_price;?></td>
        <td><?php if($aluminum_stock == 0){
            echo "Open";
          }else{
            echo "Saved";
          }
          ?>
          </td>
      </tr>
      <tr>
        
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>