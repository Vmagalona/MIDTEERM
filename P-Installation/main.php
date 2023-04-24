<h3>Installations</h3>
<div id="subcontent2">
    <table id="data-list1">
      <tr>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Job Details</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($installation->list_installation() != false){
foreach($installation->list_installation() as $value){
   extract($value);

?>
      <tr>
        <td><a href="index.php?page=products&subpage=aluminums&action=aluminums&id=<?php echo $customer_name;?>"><?php echo $customer_name;?></td>
        <td><?php echo $phone_number;?></td>
        <td><?php echo $customer_email;?></td>
        <td><?php if($job_details == 0){
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