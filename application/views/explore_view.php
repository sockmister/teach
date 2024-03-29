
<div class="container">
  <div class="row center">
   <div class="span3">
    <label>Sort By</label>
    <div class="btn-group btn-group-vertical" data-toggle="buttons-radio">
      <a href="<?php echo site_url("explore/view_all/Popularity") ?>" class="btn vertical-button-fixed" id="Popularity">Popularity</a></h3>       
      <!--<button type="button" class="btn vertical-button-fixed">Popularity</button>-->
      <a href="<?php echo site_url("explore/view_all/DateCreated") ?>" class="btn vertical-button-fixed" id="DateCreated">Date Created</a></h3>    
      <!--<button type="button" class="btn vertical-button-fixed">Date Created</button>-->
      <a href="<?php echo site_url("explore/view_all/Alphabetical") ?>" class="btn vertical-button-fixed" id="Alphabetical">Alphabetical</a></h3> 
      <!--<button type="button" class="btn vertical-button-fixed">Alphabetical</button>-->
    </div>
    <form method="post" id="group-create">
      <fieldset>
        <legend>Start your own Group</legend>
        <label>Group Name</label>
        <input class="input span3" type="text" placeholder="Group Name" name="groupName" id="groupName">
        <label>Group Description</label>
        <textarea rows="5" class="span3" name="description" id="description"></textarea>
      </fieldset>

      <button type="submit" class="btn">Create Group</button>
    </form>
  </div>
  <div class="span6 offset1"> 
                  <?php if (empty($groups)): ?>
                <h2>You have already joined all the groups!</h2>
              <?php endif; ?> 

<?php
     foreach ($groups as $group){
     ?> <hr>   
      <h3> <a href="<?php echo site_url("my_group/view_group/".base64_encode($group->skill)) ?>"> <?php echo $group->skill ?> </a> <small> <?php echo $group->count ?> members since <?php echo date("d M Y", $group->create_on) ?> </small> </h3>
      <a href="<?php echo site_url("explore/join/".base64_encode($group->skill)) ?>" class="btn btn-primary btn-small pull-right">Join</a></h3>
      <p> <?php echo $group->description ?> </p>
      <?php
      }
      ?>

      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){

    $('.order').removeClass('active');
    $('#<?php echo $order; ?>').addClass('active');

    $("form#group-create").submit(function(){
      $("#createMsg").remove();

      var name = $("#groupName").val();
      var description = $("#description").val();

      if (name==="" || description==="")
      {
        $("form#group-create").after('<div class="alert alert-error" id="createMsg"> Please fill up the group name and description! </div>');
        return false;
      }

      $.post('<?php echo site_url('explore/createGroup'); ?>', { 'groupName': name, 'description': description},
        function(result) {
          if (result=="fail") {
            $("form#group-create").after('<div class="alert alert-error" id="createMsg"> Group already exists! </div>');
          }

          else{
            $("form#group-create").after('<div class="alert alert-success" id="createMsg"> You have successfully created and joined a new group!</div>');
          }

        });
      return false;
    });


    });

  </script>
</body>
</html>


            <!-- pagination in code igniter
    http://studioultimate.com/easy-pagination-and-sorting-in-codeigniter/
-->