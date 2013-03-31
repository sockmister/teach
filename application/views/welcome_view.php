<!--<base href="<?=base_url();?>views">-->

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Welcome to TeachMe</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="<?=ASSEST_URL?>css/bootstrap.css" rel="stylesheet">
<link href="<?=ASSEST_URL?>css/teachme.css" rel="stylesheet">
<style type="text/css">
body {
  padding-top: 60px;
  padding-bottom: 40px;
}
</style>
<link href="<?=ASSEST_URL?>css/bootstrap-responsive.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <![endif]-->

      <!-- Fav and touch icons -->
    <body>

      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
              <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                 
      
             </ul>

            <form class="navbar-form pull-right" method="post" action="<?php echo site_url('welcome/login'); ?>" name="form-login" id="form-login">
            <?php 
              if ($loginFail == true)
                echo "<span class=\"red\"> Login Failed </span>" ;
            ?>
              <input class="span2" placeholder="Email" type="text" name="login_email" id="login_email">
              <input class="span2" placeholder="Password" type="password" name="login_password" id="login_password">
              <button type="submit" class="btn">Sign in</button>
            </form>
        

        </div>
      </div>
    </div>

    <div class="hero-unit">
      <div class="container">
        <h1>Welcome to TeachMe!</h1>
        <p>TeachMe! is a Website which allows sharing of skills for like minded people</p>
      </div>
    </div>
    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->


      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Currently we have </h2>
          <p>3000 users, 100 groups, 1000 pairs</p>
        </div>
        <div class="span4">
          <h2>Trending ...</h2>
          <p> 
            <ol>
              <li>Fishing</li>
              <li>Juggling</li>
              <li>Coca Cola</li>
            </ol>
          </p>
          <p><a class="btn" href="#">View More Groups »</a></p>
        </div>
        <div class="row">
          <div class="span4">
            <h3>Create an Account. It's free!</h3>
            <form method="post" action="<?php echo site_url('welcome/register'); ?>" name="form1" id="form-signup">
             <fieldset>
              <label>Email</label>
              <div class="control-group" id="email-error">
                <input class="span4" placeholder="Email" type="text" name="email" id="email"> 
              </div>
              <label>Password</label>
              <div class="control-group password-error">
                <input class="span4 inputError"  type="password" value="Password" placeholder="Password" name="password" id="password">
			  </div>
               <label>Confirm Password</label>             
              <div class="control-group password-error">             
                <input class="span4 inputError" placeholder="Type password again" type="password" value="" id="password-check" onkeyup="checkPass(); return false;">
				<span id="confirmMessage" class ="confirmMessage"></span>
              </div>
              <label>Full name</label>
              <input class="span4" placeholder="Full Name" type="text" name="name" id="name">
              <button type="submit" id="create-acct" class="btn">Create Account</button>
            </fieldset>
          </form>
          
          <?php 
          if ($createFail == true)
            echo "<div class=\"alert alert-error\"> Username has already been taken; </div>";
          ?>
        </div>
        </div>
      </div>
    </div>
  </div>

  <hr>



</div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=ASSEST_URL?>js/jquery.js"></script>
    <script src="<?=ASSEST_URL?>js/bootstrap.js"></script>

    <script>

    function validateEmail(emailVal) { 
      var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

      return re.test(emailVal);
    } 

    $(document).ready(function(){

      $("form#form-signup").submit(function(){
        var hasError = false;
        var emailVal = $("#email").val();
        var passwordVal = $("#password").val();
        var checkVal = $("#password-check").val();


  if (!validateEmail(emailVal)){
      $('#email-error-text').remove();
      $("#email-error").removeClass('success').addClass('error'); 
      $("#email").removeClass('inputSuccess').addClass("inputError").after('<span class="help-inline" id="email-error-text">Please enter a valid email!</span>');
      hasError = true;
    }

    else
    {
      $('#email-error-text').remove();
      $("#email-error").removeClass('error').addClass('success'); 
      $("#email").removeClass('inputError').addClass("inputSuccess").after('');

    }


     if (passwordVal != checkVal ) {
      $('#pass-error-text').remove();
      $(".password-error").removeClass('success').addClass('error'); 
      $("#password").removeClass('inputSuccess').addClass('inputError'); 
      $("#password-check").removeClass('inputSuccess').addClass("inputError").after('<span class="help-inline" id="pass-error-text">Password does not match!</span>');
      hasError = true;
    }

    else
    {
      $('#pass-error-text').remove();
      $(".password-error").removeClass('error').addClass('success'); 
      $("#password").removeClass('inputError').addClass('inputSuccess'); 
      $("#password-check").removeClass('inputError').addClass("inputSuccess").after('<span class="help-inline" id="pass-error-text">Ok!</span>');

    }


    if(hasError == true) {return false;}

    return true;

  });

}); 






</script>



</body></html>