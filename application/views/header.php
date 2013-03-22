  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=ASSEST_URL?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=ASSEST_URL?>css/datepicker.css" rel="stylesheet">

    <style type="text/css">
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
    </style>
    <link href="<?=ASSEST_URL?>css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <script src="<?=ASSEST_URL?>js/jquery.js"></script>
        <script src="<?=ASSEST_URL?>js/bootstrap.js"></script>
        <script src="<?=ASSEST_URL?>js/jasny-bootstrap.js"></script>
        <script src="<?=ASSEST_URL?>js/bootstrap-datepicker.js"></script>
        <script src="<?=ASSEST_URL?>js/holder.js"></script>

        <link href="<?=ASSEST_URL?>css/teachme.css" rel="stylesheet">
      </head>



            <!-- Le javascript
            <link href="<?=ASSEST_URL?>css/webapp/reset.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?=ASSEST_URL?>css/webapp/grid.css" media="screen" rel="stylesheet" type="text/css" >
================================================== -->
<!-- Javascript for toggle. Integrate with php -->


<body>
  <?php echo site_url("lol") ?>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="#">TeachMe!</a>
          <div class="nav-collapse collapse">
          <ul class="nav">
            <li id="profileT"><a href="<?php echo site_url("/profile/index") ?>">Profile</a></li>
            <li id="wallT"><a href="#about" >Wall</a></li>
            <li id="friendsT"><a href="#contact">Friends</a></li>

            <li id="interestT"><a href="#">Explore Interests</a></li>
            <li id="groupT"><a href="<?php echo site_url("/group/index") ?>">My Groups</a></li>


          </div><!--/.nav-collapse -->
          <ul class="nav pull-right"> 
            <li class="nav pull-right"><a  href="#logout">Logout</a></li>

          </ul>

      </div>
    </div>
  </div>
    <script>

    $('#<?php echo $activeTab; ?>').addClass("active");
    </script>