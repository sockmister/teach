        <div class="span8 center">

          
          <h1><?php echo $user[0]->Name; ?> 
            <?php if($friend_status[0] == "") { ?>
            <?php } else {
                      $button_tag = "btn-danger";
                      if($friend_status[1] == "Friend")
                        $button_tag = "btn-primary";
             ?>
           <a href=<?php echo $friend_status[0] ?> class="btn <?php echo $button_tag; ?>  btn-small pull-right"><?php echo $friend_status[1] ?></a>
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
              <textarea rows="3" class="span8" name="comment"></textarea>
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
          $(document).ready(function(){

            $("form").submit(function(){
              $("#createMsg").remove();

              var comment = $("textarea").val();

              if (comment==="")
              {
                $("form").after('<div class="alert alert-error" id="createMsg"> Please type some comments! </div>');
                return false;
              }

              return true;

            });


      });
</script>
</body>
</html>
