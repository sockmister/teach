        <div class="span8 center">
          <h1><?php echo $name; ?>  <a href="<?php echo site_url("my_group/leave/yoyo") ?>" class="btn btn-primary btn-small pull-right">Unfriend (or friend depending on status)</a></h1>
          <hr>
          <div class="row">
            <div class="span4"> 

              <p><b>Email: </b><?php echo $email; ?></p>
              <p><b>Date of Birth: </b><?php echo $dob;?></p>
              <p><b>Gender: </b><?php echo $gender;?></p>
              <p><b>Handphone: </b><?php echo $phone;?></p>
              <p><b>Address: </b><?php echo $address;?></p>
              <p><b> Groups Joined: </b> <br><a href="<?php echo site_url("/my_group/view/fishing") ?>"><span class="label" >Fishing</span></a> 
                <a href="<?php echo site_url("/my_group/view/fishing") ?>"><span class="label" >Fishing</span></a>
                <a href="<?php echo site_url("/my_group/view/fishing") ?>"><span class="label" >Fishing</span></a> 
                <a href="<?php echo site_url("/my_group/view/fishing") ?>"><span class="label" >Fishing</span></a> 
                <a href="<?php echo site_url("/my_group/view/fishing") ?>"><span class="label" >Fishing</span></a>
                <a href="<?php echo site_url("/my_group/view/fishing") ?>"><span class="label" >Fishing</span></a> 
              </p>
              <p><b> Friends: </b>  <br>          
                <a href="<?php echo site_url("/wall/index") ?>"><span class="label label-inverse" >Motsu</span></a> 
                <a href="<?php echo site_url("/wall/index") ?>"><span class="label label-inverse" >Motsu</span></a> 
                <a href="<?php echo site_url("/wall/index") ?>"><span class="label label-inverse" >Motsu</span></a> 
                <a href="<?php echo site_url("/wall/index") ?>"><span class="label label-inverse" >Motsu</span></a> 
                <a href="<?php echo site_url("/wall/index") ?>"><span class="label label-inverse" >Motsu</span></a> 
              </p>
            </div>
            <div class="span4 text-right">
              <span class="btn btn-file "><img data-src="holder.js/200x150" alt=""></span>
            </div>
          </div>
          <hr>
          <form method="post" action="<?php echo site_url('wall/postComment'); ?>" id="comment-create">
            <fieldset>
              <label></label>
              <textarea rows="3" class="span8" name="comment">New Comments</textarea>
            </fieldset>

            <button type="submit" class="btn">Post</button>
          </form>
          <hr>
          <h4><u>Past Comments</u> </h4>
          <p>Motsu is a good teacher<br><span class="muted"><small>Posted on 21 Feb 2013 by</small></span> <span class="label label-inverse">Mark</span> </p>
          <p>Motsu is a good teacher<br><span class="muted"><small>Posted on 21 Feb 2013 by</small></span> <span class="label label-inverse">Mark</span> </p>
          <p>Motsu is a good teacher<br><span class="muted"><small>Posted on 21 Feb 2013 by</small></span> <span class="label label-inverse">Mark</span> </p>
          <p>Motsu is a good teacher<br><span class="muted"><small>Posted on 21 Feb 2013 by</small></span> <span class="label label-inverse">Mark</span> </p>
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
</script>
</body>
</html>
