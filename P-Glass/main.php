<h3>Glass</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Glass ID</th>
        <th>Glass Type</th>
        <th>Glass Thickness</th>
        <th>Glass Dimensions</th>
        <th>Glass Color</th>
        <th>Glass Manufacturer</th>
        <th>Glass Price</th>
        <th>Glass Stocks</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($glass->list_glass() != false){
foreach($glass->list_glass() as $value){
   extract($value);

?>
      <tr>
        <td><?php echo $glass_id;?></td>
        <td><?php echo $glass_type;?></td>
        <td><?php echo $glass_thickness;?></td>
        <td><?php echo $glass_dimension;?></td>
        <td><?php echo $glass_color;?></td>
        <td><?php echo $glass_manufacturer;?></td>
        <td><?php echo $glass_price;?></td>
        <td><?php if($glass_stock == 0){
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