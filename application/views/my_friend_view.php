<!--
        <div class="pagination pagination-centered">
          <ul>
            <li class="disabled"><a href="#">Prev</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
-->
        <div class="container">
          <div class="row center">
             <div class="span2">
               
            </div>

            <div class="span6 offset1"> 
              <?php 
                if(empty($friends))
                  echo "<h2> You have no friends! </h2>";

                $printed = 0;
                $letter = "A";
                $user = $this->session->userdata('email');
                if(!empty($friends))
                  if($friends[0]->status != "accepted"){
                    $button_tag = "btn-warning";
                    echo "<h2> Pending Friends </h2><hr>";
                  }
                foreach ($friends as $curr_friend):
                  $friend = $curr_friend->Email;
                  if($printed == 0 && $curr_friend->status == "accepted"){
                    $button_tag = "btn-danger";
                    echo "<h2> Friends </h2><hr>";
                    $printed = 1;
                    $letter = "A";
                  }
                  if(strtoupper($curr_friend->name[0]) != $letter){
                    $letter = strtoupper($curr_friend->name[0]);
                    echo "<h3> {$letter} </h3><hr>"; ?>
                    <h4> <a href="<?php echo site_url("/wall/view/" . base64_encode($curr_friend->Email)) ?>"> <?php echo $curr_friend->name ?></a>
                    <a href="<?php echo site_url($curr_friend->link .'/'. base64_encode($curr_friend->Email)) ?>" class="btn <?php echo $button_tag ?> btn-mini pull-right"><?php echo $curr_friend->button_name ?></a> </h4> 
                    <hr>
                  <?php 
                  }
                  else{ ?>
                    <h4> <a href="<?php echo site_url("/wall/view/" . base64_encode($curr_friend->Email)) ?>"> <?php echo $curr_friend->name ?> 
                    <a href="<?php echo site_url($curr_friend->link .'/'. base64_encode($curr_friend->Email)) ?>" class="btn <?php echo $button_tag ?> btn-mini pull-right"><?php echo $curr_friend->button_name ?></a> </h4> 
                    <hr>
                  <?php } 
                endforeach; ?>
            </div>

          </div>
        </div>

<script>
$(document).ready(function(){


});

</script>
          </body>
          </html>


            <!-- pagination in code igniter
    http://studioultimate.com/easy-pagination-and-sorting-in-codeigniter/
-->