
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
<button type="button" class="btn vertical-button-fixed">Group Joined</button>
<button type="button" class="btn vertical-button-fixed">Alphabetical</button>
    </div>

</div>
            <div class="span6 offset1"> 
              <h2> Pending Friends </h2>
              <h3> M </h3>
              <hr>   
              <h4> <a href="<?php echo site_url("/wall/index") ?>"> Motsu </a>
            <a href="<?php echo site_url("my_group/friend/unfriend/Motsu") ?>" class="btn btn-warning btn-mini pull-right">Withdraw Request</a> </h4> 
              <hr>
              <h2> Friends </h2>
              <h3> Y </h3>
              <hr>   
              <h4> Yuri 
            <a href="<?php echo site_url("my_group/friend/unfriend/Yuri") ?>" class="btn btn-primary btn-mini pull-right">Unfriend</a> </h4> 
              <hr>
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