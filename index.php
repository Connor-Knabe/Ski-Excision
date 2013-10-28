<!DOCTYPE html>
<html lang="en">
  <head>
  
  <?php include("include/header.php"); ?>
    <!-- Jquery UI -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    
    <script>
	  $(function() {
		var dateToday = new Date();
	    $( "#from" ).datepicker({
	      defaultDate: "+1w",
	      minDate: dateToday,
	      changeMonth: true,
	      numberOfMonths: 1,
	      onClose: function( selectedDate ) {
	        $( "#to" ).datepicker( "option", "minDate", selectedDate );
		  }
	    });
	    $( "#to" ).datepicker({
	      defaultDate: "+1w",
	      changeMonth: true,
	      numberOfMonths: 1,
	      onClose: function( selectedDate ) {
	        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
	      }
	    });
	  });
	  
	var min = $("#from").datepicker("getDate");
	
	</script>
  </head>

  <body>
  
    <div class="brand">Ski Excision</div>
    <div class="address-bar">Ski Vacation Aid</div>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Ski Excision</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="reviews.html">Reviews</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="resort_info.html">Resort Info</a></li>
            <li><a href="references.html">References</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>

    <div class="container">

      <div class="row">
        <div class="box">
          <div class="col-lg-12 text-center">
            <div id="carousel-example-generic" class="carousel slide">
              <!-- Indicators -->
              <ol class="carousel-indicators hidden-xs">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>

              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img class="img-responsive img-full" src="img/jumbotron/vail-resorts_colorado_ALTERED.jpg" >
                </div>
                <div class="item">
                  <img class="img-responsive img-full" src="img/jumbotron/Tamarack-Express-11_ALTERED2.jpg" >
                </div>
                <div class="item">
                  <img class="img-responsive img-full" src="img/jumbotron/Alta_Little_Cottonwood_Canyon_ALTERED.jpg" >
                </div>
                <div class="item">
                  <img class="img-responsive img-full" src="img/jumbotron/Snowbird-Cliff-Lodge_ALTERED.jpg" >
                </div>
                <div class="item">
                  <img class="img-responsive img-full" src="img/jumbotron/VAIL_WEB_01_ALTERED.jpg" >
                </div>

              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
              </a>
            </div>
            <h1><small>Welcome to</small><br><span class="brand-name">The Ski Vacation Aid</span><hr class="tagline-divider"><small>By <strong>Team 17</strong></small></h1>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Please choose your dates below</h2>
            <hr>
            <hr class="visible-xs">
            	<div align="center">
		            Start Date: <input type="text" id="from" name="from" />
		            End Date: <input type="text" id="to" name="to" />
            	</div>
            	
	
          </div>
        </div>
      </div>

      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Beautiful boxes <strong>to showcase your content</strong></h2>
            <hr>
            <p>Use as many boxes as you like, and put anything you want in them! They are great for just about anything, the sky's the limit!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
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
    <script src="js/bootstrap.js"></script>
    <script>
	  // Activates the Carousel
	  $('.carousel').carousel({
		interval: 5000
	  })
	</script>
  </body>
</html>