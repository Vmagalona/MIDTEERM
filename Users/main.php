<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone_Number</th>
        <th>Birth_Date</th>
        <th>Hire_Date</th>
        <th>Department</th>
        <th>Income</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $employee_id;?></td>
        <td><a href="index.php?page=settings&subpage=employees&action=profile&id="><?php echo $employee_lastname.',  '.$employee_firstname;?></a></td>
        <td><?php echo $employee_email;?></td>
        <td><?php echo $phone_number;?></td>
        <td><?php echo $birth_date;?></td>
        <td><?php echo $hire_date;?></td>
        <td><?php echo $department;?></td>
        <td><?php echo $income;?></td>
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