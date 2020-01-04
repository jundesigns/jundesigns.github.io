<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'jundesigns'; 
		$to = 'junda80@gmail.com'; 
		$subject = 'Message from potential client ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your answer is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="theme-color" content="#89bad3">
      <link rel="icon" href="favicon.ico">
    <title>Junda // Portfolio</title>

    <!-- Bootstrap -->
     <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/navigation1.css"> 
    <link rel="stylesheet" href="css/particles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/animate.css"> 
   
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
      
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container bg footercalc">
    
        <header class="cd-header">
        <a href="index.html"><img class="logo-header" src="img/logo.svg" height="50" width="50"></a>
        <nav>
            <ul class="cd-secondary-nav">
                <li><a href="about.html">ABOUT ME</a></li>
                <li><a href="works.html">MY WORKS</a></li>
                <li><a href="contact.php">CONTACT ME</a></li>
                        
            </ul>
        </nav> <!-- cd-nav -->

        <a class="cd-primary-nav-trigger" href="#0">
            <span class="cd-menu-text"></span><span class="cd-menu-icon"></span>
        </a> <!-- cd-primary-nav-trigger -->
        </header>
        <nav>
           <ul class="cd-primary-nav">
                <li class="cd-label"><a href="about.html">ABOUT ME</a></li>
                <li class="cd-label"><a href="works.html">MY WORKS</a></li>
                <li class="cd-label"><a href="contact.php">CONTACT ME</a></li>
            </ul>
         </nav>
          <div class="container ">
                    <div class="row">
                       <div class="col-md-12 text-center about-title">CONTACT ME</div>  
                        <div class="col-md-6 text-left contact-title margin-topcontact">If you like what you see and you feel that you'll need my services be it for projects or collaborations, drop me an email using the form or drop me a text on my phone number.
                           <br><br><div class="mobileno">+65 97566510</div>
                            <br>
                            <a href="resume.pdf"><div class="mobileno">VIEW MY RESUME HERE</div></a>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 float-right margin-topcontact">
                            <form class="form-horizontal" role="form" method="post" action="contact.php">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                                        <?php echo "<p class='text-danger'>$errName</p>";?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="col-sm-2 control-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                                        <?php echo "<p class='text-danger'>$errMessage</p>";?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                                        <?php echo "<p class='text-danger'>$errHuman</p>";?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <?php echo $result; ?>	
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        
                            
                        
                    </div>
            
  				 
			
                    
                </div>
        
    </div> 
   <footer class="footer text-left"><span class="footername">LOK JUN DA // INTERACTION DESIGNER</span>
       <a href="https://www.behance.net/junda8040f3"><img class="behance" src="img/behance.svg"></a>
       <a href="https://www.linkedin.com/in/lok-jun-da-885031bb/"><img class="behance" src="img/linkedin.svg"></a>
      </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery-2.1.1.js"></script>
      <script src="js/main.js"></script>
      <script src="js/morphext.js"></script>
    <script>
        $("#js-rotating").Morphext({
    // The [in] animation type. Refer to Animate.css for a list of available animations.
    animation: "fadeIn",
    // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
    separator: "|",
    // The delay between the changing of each phrase in milliseconds.
    speed: 2000,
    complete: function () {
        // Called after the entrance animation is executed.
    }
});  
    </script>  
  </body>
</html>