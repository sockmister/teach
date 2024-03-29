


        <div class="container">
          <div class="row">
            <div class="span6 center"> 
            <form method="post" action="<?php echo site_url('profile/update_profile');?>" name="form-profile" id="form-profile">
              <fieldset>              
             <legend>Account Information</legend>
             <label>Email</label>
             <p><?php echo $email; ?></p>
             <label>Full Name</label>
             <input class="input-xxlarge" type="text" placeholder="The user's original name" value="<?php echo $name; ?>" name="name" id="name">
             <legend>Change Password</legend>
             <label>Original Password</label>
             <input class="input-xlarge" type="password" placeholder="Enter original Password" name="old_password">
             <div class="control-group" id="password-error">
				 <label>New Password</label>
				 <input class="input-xlarge" type="password" placeholder="New Password" id="password" name="new_password">
			 </div>				 
             <label>Confirm new password</label>
			 <div class="control-group" id="password-error">
				<input class="input-xlarge" type="password" placeholder="Confirm New Password" id="password-check" onkeyup="checkPass();return false;">
				<span id="confirmMessage" class ="confirmMessage"></span>
			</div>	


             <legend>Personal Information</legend>
         <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;" >  <img data-src="holder.js/200x150" alt=""></div>
            <div>
              <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
              <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
          </div>
          <label>Date of Birth</label>
<input id="dp" class="span2" type="text" data-date-format="mm/dd/yy" value="<?php echo $dob;?>" data-date-viewmode="years" name="dob">


             <label>Gender</label>
             <p>
             <div class="btn-group" data-toggle="buttons-radio">
              <button type="button" class="btn gender" id="male"/> Male </button> 
              <button type="button" class="btn gender" id="female"/> Female </button> 
            </div>
          </p>
            <input class="input" type="hidden" id="gender-input" value="<?php echo $gender; ?>" name="gender"/>
            <label>Handphone Number</label>
            <input class="input-large" type="text" name="phone" value="<?php echo $phone; ?>" placeholder="HP number"/>
            <hr>
            <button type="submit" class="btn" id="f">Update Info</button>
          </fieldset>
        </form>
           </div>
        </div>
      </div>

      <!-- Le javascript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->


            <!-- Le javascript
      ================================================== -->
      <!-- Javascript for toggle. Integrate with php -->
      <script>
$("#<?php echo $gender; ?>").button('toggle');
$('input[id=lefile]').change(function() {
   $('#photoCover').val($(this).val());
});

$('#dp').datepicker();

// function to check password as user types
function checkPass()
{
    
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password-check');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}

    $(document).ready(function(){

      $(".gender").click(function() {
        var genderVal = this.id;
        //alert(this.id);
        $("#gender-input").val(genderVal);
      });

            $("form").submit(function(){
              $("#nameMsg").remove();

              var nameVal = $("input#name").val();

              if (nameVal==="")
              {
                $("input#name").after('<div class="alert alert-error" id="nameMsg">Please enter your name!</div>');
                return false;
              }

              return true;

            });
    });

</script>
    </body>
    </html>
