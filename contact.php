<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include("include/header.php"); ?>
  </head>

  <body>
  
  <?php include("include/navbar.php"); ?>


    <div class="container">

      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contact <strong>business casual</strong></h2>
            <hr>
          </div>
          <div class="col-md-8">
            <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
            <iframe width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=engineering+building+west&amp;aq=&amp;sll=38.946494,-92.330839&amp;sspn=0.36367,0.727158&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Engineering+Bldg+West,+Columbia,+Missouri+65201&amp;z=14&amp;ll=38.946767,-92.331461&amp;output=embed"></iframe>
          </div>
          <div class="col-md-4">
            <p>Email: <strong>help@skiexcision.com</strong></p>
            <p>Address: <strong><br>349 Engineering Building West<br>Columbia, MO 65211</strong></p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contact <strong>form</strong></h2>
            <hr>
            <p>This contact form is just the form elements, it is not a working form. You will have to make the form work by yourself, or take it out if you can't figure out how to make it work.</p>
                <form role="form">
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label>Name</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Email Address</label>
                      <input type="email" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="input3">Phone Number</label>
                      <input type="phone" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                      <label>Message</label>
                      <textarea class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                      <input type="hidden" name="save" value="contact">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
              </form>
          </div>
        </div>
      </div>

    </div><!-- /.container -->
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p>Copyright &copy; CS 3380 Team 17 2013</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
	  // Activates the Carousel
	  $('.carousel').carousel({
		interval: 5000
	  })
	</script>
  </body>
</html>


<!-- missy there seems to be an error with your php it gives me a white page if I include this -->
<?php /*
$action = $_REQUEST['action'];
if ($action == "")  
    {
    */?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php /*
    } 
else               
    {
    $fullname =$_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    if (($fullname == "")||($email == "")||($message == ""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from = "From: $name <$email> \r\nReturn-path: $email";
        $subject ="Message sent using your contact form";
       	mail("cakk155@gmail.com", $subject, $message, $from);
        echo "Email sent!";
        } 
*/?>

