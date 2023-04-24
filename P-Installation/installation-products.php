<h3>installation Transaction</h3>
<div id="shoe-details">
  <table>
    <tr>
      <td><label for="recdate">installation Date</label></td>
      <td class="info-text"><?php echo $installation->get_installation_date($id);?></td>
      <td><label for="purfrom">Purchased From</label></td>
      <td class="info-text"><?php echo $installation->get_installation_supplier($id);?></td>
    </tr>
    <tr>
      <td><label for="recamount">Amount</label></td>
      <td class="info-text"><?php echo $installation->get_installation_amount($id);?></td>
      <td><label for="recstatus">Status</label></td>
      <td class="info-text">
        <?php if($installation->get_installation_save($id) == 0){
            echo "Open Transaction";
          }else{
            echo "Saved Transaction";
          }
          ?>
      
      </td>
    </tr>
  </table>
</div>

<div class="btn-box">
<?php
    if($installation->get_installation_save($id) == 0){
  ?>
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Save</a>
      <?php
    }
    ?>
</div>
<div id="id02" class="modal">
<form method="POST" id="itemSave" action="processes/process.installation.php?action=saveitem">
      <input type="hidden" id="recid" name="recid" value="<?php echo $id;?>"/>
      </form>
      <div #id="form-update" class="modal-content">
    <div class="container">
      <h2>Save Transaction</h2>
      <p>Are you sure you want to save this transaction?</p>
      <div class="clearfix">
        <button class="confirmbtn" onclick="saveSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
       
</div>
<script>
var modal_save = document.getElementById('id02');
window.onclick = function(event) {
  if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    //;window.location.href = "processes/process.installation.php?action=save&id=<?php echo $id;?>";
    document.getElementById("itemSave").submit();
  }

</script>