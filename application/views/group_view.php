        <div class="span8 center">

            <h1><?php echo base64_decode($group) ?> 
              <?php if (!empty($user_is_member)): ?>
                <a href="<?php echo site_url("my_group/leave/".$group) ?>" class="btn btn-danger btn-small pull-right">Leave</a></h3>
              <?php else: ?>
                <a href="<?php echo site_url("my_group/join/".$group) ?>" class="btn btn-primary btn-small pull-right">Join</a></h3>
              <?php endif; ?>
            </h1>
            <hr>
            <p><b>Members: </b><?php echo $members[0]->Count?></p>
            <p><b>Description: </b><?php echo $skill[0]->Description?></p>
            <hr>

        <?php if (!empty($user_is_member)): ?>

         <h3>Members in group</h3>
          <?php foreach ($members_in_group as $curr_mem): ?>
          <a href="<?php echo site_url("/wall/view/" . base64_encode($curr_mem->user)) ?>"><span class="label label-inverse" ><?php echo $curr_mem->Name ?></span></a> 
          <?php endforeach; ?>
          <hr>
           <form method="post" action="<?php echo site_url('my_group/postComment'); ?>" id="comment-create">
            <fieldset>
              <label></label>
              <textarea rows="3" class="span8" name="comment">New Comments</textarea>
            </fieldset>
            <input type="hidden" name="skill" value="<?php echo $group ?>"/>
            <button type="submit" class="btn">Post</button>
          </form>
          <hr>
          </br>
          <h4><u>Past Comments</u> </h4>
          <?php if (!empty($skill_comments['skill_comments'])): ?>
            <?php foreach ($skill_comments['skill_comments'] as $skill_comment): ?>
            <p><?php echo $skill_comment->Comment ?><br><span class="muted"><small>Posted on <?php echo date("d M Y", $skill_comment->Created_on) ?> by </small></span> <span class="label label-inverse"><?php echo $skill_comment->Name ?></span> </p>
            <?php endforeach ?>
          <?php else: ?>
            <p><small><i>There are no comments for this group yet - be the first to comment!</i></small>
          <?php endif; ?>

        <?php endif; ?>
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
