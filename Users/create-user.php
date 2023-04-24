<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" >

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" >

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" >

            <label for="phonenumber">Phone Number</label>
            <input type="number" id="phonenumber" class="input" name="phonenumber" >

            <label for="dateofbirth">Birth Date</label>
            <input type="date" id="date" class="input" name="dateofbirth" >
            
            <label for="hiredate">Hire Date</label>
            <input type="date" id="date" class="input" name="hiredate" >
            
            <label for="access">Position</label>
            <select id="access" name="access">
              <option value="staff">Worker</option>
              <option value="supervisor">Supervisor</option>
              <option value="Manager">Manager</option>
            </select>

        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
