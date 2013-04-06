        <div class="span8 center">

          
          <h1><?php echo $user[0]->Name; ?> 
            <?php if($friend_status[0] == "") { ?>
            <?php } else { ?>
           <a href=<?php echo $friend_status[0] ?> class="btn btn-primary btn-small pull-right"><?php echo $friend_status[1] ?></a>
          <?php } ?></h1>
          <hr>
          <div class="row">
            <div class="span4"> 

              <?php 
                if(strcmp($friend_status[1],'Unfriend') == 0) {?>
              <p><b>Email: </b><?php echo $user[0]->Email; ?></p>
              <p><b>Date of Birth: </b><?php echo $user[0]->Birthday;?></p>
              <p><b>Gender: </b><?php echo $user[0]->Gender;?></p>
              <p><b>Handphone: </b><?php echo $user[0]->Contact_number;?></p>
              <p><b>Address: </b>remove???</p>
              <?php
              } else { ?>
                <p><b>Gender: </b><?php echo $user[0]->Gender;?></p>
              <?php }?>

              <p><b> Groups Joined: </b> <br>
                <?php foreach ($groups as $curr_grp): ?>
                <a href="<?php echo site_url("/my_group/view_group/" . base64_encode($curr_grp->skill)) ?>"><span class="label" ><?php echo $curr_grp->skill ?></span></a> 
                <?php endforeach;?>
              </p>

              <?php 
                if(strcmp($friend_status[1],'Unfriend') == 0) {?>
              <p><b> Friends: </b>  <br>
                <?php foreach ($friends as $curr_frn): ?>
                <a href="<?php echo site_url("/wall/view/" . base64_encode($curr_frn->Email)) ?>"><span class="label" ><?php echo $curr_frn->Name ?></span></a> 
                <?php endforeach;?>
              </p>
            </div>
            <div class="span4 text-right">
              <span class="btn btn-file "><img data-src=<?php echo $user[0]->Photo ?> alt=""></span>
            </div>
          </div>
          <hr>
          <form method="post" action="<?php echo site_url('wall/postComment'); ?>" id="comment-create">
            <fieldset>
              <label></label>
              <textarea rows="3" class="span8" name="comment">New Comments</textarea>
            </fieldset>
            <input type="hidden" name="person" value=<?php echo $user[0]->Email ?> />
            <button type="submit" class="btn">Post</button>
          </form>
          <hr>
          <h4><u>Past Comments</u> </h4>
            <?php foreach ($comments as $curr_comm): ?>
              <p><?php echo $curr_comm->Comment ?><br><span class="muted"><small>Posted on <?php echo date("d M Y", $curr_comm->Created_on) ?> by</small></span> <span class="label label-inverse"><?php echo $curr_comm->Name ?></span> </p>
            <?php endforeach;?>

            <?php } ?>
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
