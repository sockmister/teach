
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

        <div class="container">
          <div class="row center">
             <div class="span3">
<label>Sort By</label>
    <div class="btn-group btn-group-vertical" data-toggle="buttons-radio">
<!--<button type="button" class="btn vertical-button-fixed">Popularity</button>
<button type="button" class="btn vertical-button-fixed">Date Created</button>
<button type="button" class="btn vertical-button-fixed">Alphabetical</button>-->
    <a href="<?php echo site_url("my_group/view_order/Popularity") ?>" class="btn vertical-button-fixed">Popularity</a></h3>
    <a href="<?php echo site_url("my_group/view_order/DateCreated") ?>" class="btn vertical-button-fixed">Date Created</a></h3>
    <a href="<?php echo site_url("my_group/view_order/Alphabetical") ?>" class="btn vertical-button-fixed">Alphabetical</a></h3>  
    </div>

</div>
            <div class="span6 offset1"> 
               
                  <?php if (empty($groups)): ?>
                <h2>You have not joined any of the groups!</h2>
              <?php endif; ?> 

          <?php
               foreach ($groups as $group){
               ?> <hr>   
                <h3> <a href="<?php echo site_url("my_group/view_group/".base64_encode($group->skill)) ?>"> <?php echo $group->skill ?> </a> <small> <?php echo $group->count ?> members since <?php echo $group->create_on ?> </small> </h3>
                <a href="<?php echo site_url("my_group/leave/".base64_encode($group->skill)) ?>" class="btn btn-danger btn-small pull-right">Leave</a></h3>
                <p> <?php echo $group->description ?> </p>
                <?php
                }
                ?>

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