<h3>New Product</h3>
<div id="form-block">
        <form method="POST" action="Processes/process.glass.php?action=create">
        <div id="form-block-half">

            <label for="type">Glass Type</label>
            <input type="text" id="type" class="input" name="gtype" placeholder="Type">
            
            <label for="type">Glass Thickness</label>
            <input type="text" id="type" class="input" name="gthick" placeholder="Thickness">

            <label for="type">Glass Dimensions</label>
            <input type="text" id="type" class="input" name="gdimension" placeholder="Dimensions">

            <label for="type">Glass Color</label>
            <input type="text" id="type" class="input" name="gcolor" placeholder="Color">

            <label for="type">Glass Manufacturer</label>
            <input type="text" id="type" class="input" name="gmanufacturer" placeholder="Manufacturer">

            <label for="amount">Glass Price</label>
            <input type="number" id="type" class="input" name="gprice" placeholder="Enter Price">

            <label for="amount">Glass Stock</label>
            <input type="number" id="type" class="input" name="gstock" placeholder="Enter Price">

    

        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>