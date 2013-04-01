
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
<a href="<?php echo site_url("explore/view_all/Popularity") ?>" class="btn vertical-button-fixed">Popularity</a></h3>       
<!--<button type="button" class="btn vertical-button-fixed">Popularity</button>-->
<a href="<?php echo site_url("explore/view_all/DateCreated") ?>" class="btn vertical-button-fixed">Date Created</a></h3>    
<!--<button type="button" class="btn vertical-button-fixed">Date Created</button>-->
<a href="<?php echo site_url("explore/view_all/Alphabetical") ?>" class="btn vertical-button-fixed">Alphabetical</a></h3> 
<!--<button type="button" class="btn vertical-button-fixed">Alphabetical</button>-->
<form method="post" action="<?php echo site_url('explore/createGroup'); ?>" id="group-create">
  <fieldset>
    <legend>Start your own Group</legend>
    <label>Group Name</label>
<input class="input span3" type="text" placeholder="Group Name" name="groupName">
<label>Group Description</label>
            <textarea rows="5" class="span3" name="description"></textarea>
                        </fieldset>
          
<button type="submit" class="btn">Create Group</button>
          </form>
    </div>

</div>
            <div class="span6 offset1"> 
              <h1> F </h1>
              <hr>   
              <h3> Fishing <small> 1000 teachers, 1000 learners, 200 pairs since 13 May 2010</small> 
              <a href="<?php echo site_url("explore/join/Fishing") ?>" class="btn btn-primary btn-small pull-right">Join</a></h3> 

              <p> Fishing is interesting because we can learn ... </p>
              <hr>
              <h1> J </h1>
              <hr>


              <h3>Juggling <small> 1000 teachers, 1000 learners, 200 pairs since 13 May 2010</small> 
                <a href="<?php echo site_url("explore/join/Juggling") ?>" class="btn btn-primary btn-small pull-right">Join</a> </h3> 

              <p> Fishing is interesting because we can learn ... </p>
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