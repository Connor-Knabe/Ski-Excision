<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ski Excision</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/business-casual.css" rel="stylesheet">
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
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">REVIEWS</h2>
            <hr>
          </div>
          <div class="col-lg-12 text-center">		
		
		<?php

		function display_comments_pagination(){ //this function will be called both before and after the user hits submit to display the original and updated results
			
			//start for pagination
			
			if (isset($_GET["page"])){ //gets values for use in pagination from url
				$page  = $_GET["page"]; 
			} 
			else{ 
				$page=1;  //if no value, default 1
			}; 
			$start_from = ($page-1) * 10;					
			
			//end for pagination
			
			include("../../../../secure/database.php");			//include database.php file in order to connect to psql
			$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD)
			or die('Could not connect: ' . pg_last_error()); //error if could not connect
			$query = 'SELECT * FROM reviews.db ORDER BY log_date DESC OFFSET $1 LIMIT $2';
	
			$stmt = pg_prepare($conn, "select", $query)	or die("Unable to prepare: " . pg_last_error($conn)); //prepare statement
			$result = pg_execute($conn, "select", array($start_from, 10)); //execute
		
			if(!$result){ //error if no value in $result
				die("Unable to execute: " . pg_last_error($conn));
			} else{
				$arr = pg_fetch_all($result); //get all values in table into 2d array
				echo "<br />";
				if(!$arr) // if noone has commented yet
					echo "<font size = '6' style = 'font-family: Miriam'><strong>Be the first one to comment!</font></srong><br />";
				foreach($arr as $i => $row){ //cycle through array
				
					//getting number of days/hours/minutes ago the comment was submitted for user-friendly display
				
				    $days = floor((time() - strtotime($row['log_date']))/86400);
					$hours = floor((time() - strtotime($row['log_date']))/3600) % 24;
					$minutes = floor((time() - strtotime($row['log_date'])) / 60 ) % 60;
					if ($days == 0){
						if($hours == 0){
							if($minutes == 0)
								$date = "within the last minute";
							elseif($minutes == 1)
								$date = "$minutes minute ago";
							else
								$date = "$minutes minutes ago";
						}
						elseif($hours == 1)
							$date = "$hours hour ago";
						else
							$date = "$hours hours ago";
					}
					elseif ($days > 0)
						$date = "$days days ago";
					else {
						$days = abs($days);
						$date = "$days days from now";
					}
					
					//display resort (based on value of resort_id from reviews.db
					//display name
					
					if($row['resort_id'] == 1)
						echo "<br />(" . "Vail - " .$date . ")<strong> " . $row['name'] . "</strong> said:<br />";
					elseif($row['resort_id'] == 2)
						echo "<br />(" . "SnowBird - " .$date . ")<strong> " . $row['name'] . "</strong> said:<br />";
					elseif($row['resort_id'] == 3)
						echo "<br />(" . "Heavenly - " .$date . ")<strong> " . $row['name'] . "</strong> said:<br />";
					else
						echo "<br />(" . "General - " .$date . ")<strong> " . $row['name'] . "</strong> said:<br />";
						
					//then display comment with wordwrap logic incorporated
				
					$text = $row['comments'];
					$newText = wordwrap($text, 100, "<br />\n", true);
					echo "<br />";
					echo $newText;
					echo "<br /><br />";
				}
				
				//start for pagination
					
				if($page == 1) //tell user which comments are being displayed in descending order from most recent
					echo "<br /><strong><font size = '3' style = 'font-family: Kalinga'>(Showing 1 to 10)</font></strong><br />";
				else{
					$new_start = (1 + ($page - 1) * 10);
					$new_end = ($page * 10);
					echo "<br /><strong><font size = '3' style = 'font-family: Kalinga'>(Showing $new_start to $new_end)</font></strong><br />";
				}	
						
				$query = 'SELECT * FROM reviews.db'; //query to get count of all records in database
	
				$stmt = pg_prepare($conn, "count_records", $query)	or die("Unable to prepare: " . pg_last_error($conn)); //prepare statement
				$result = pg_execute($conn, "count_records", array()); //execute
				$total_records = pg_num_rows($result); //grabs count of records in database
				$total_pages = ceil($total_records / 10); //decides how many pages need to be added
 
				for ($i=1; $i<=$total_pages; $i++) {		//adds the pages
					echo "<a href='http://babbage.cs.missouri.edu/~wcmvh8/cs3380/group_project/skiexcision/trunk/new_website/reviews.php?page=".$i."'>".$i."</a> ";
				}
					
				//end for pagination
				
			}
			pg_free_result($result);
			pg_close($conn);
			return;
		}	
		?>
		
		<?php
		function main_page(){ //this function is the main page for reviews
							//it is called first at the bottom of my php code
							//the reason for this is to get rid of the name and comment boxes and previous display_comments() results after the user hits submit
			if(!isset($_POST['submit'])){//if user has NOT submitted a comment yet
		?>
				<form method="POST" action="/~wcmvh8/cs3380/group_project/skiexcision/trunk/new_website/reviews.php">
					<div class="form-group col-lg-12" "controls" align = "middle"> <!--"align = 'middle'" added to center div class on firefox and chrome-->
						<font size = "5" style = "font-family: Kalinga">Post A Comment</font><br />
						<br />
						<select name = "resort" class="form-control" style = "width: 130px; height: 30px; margin: 0 auto;" autofocus><!--'margin: 0 auto;' added to center on IE-->
							<option value=0>General</option>
							<option value=1>Vail</option>
							<option value=2>SnowBird</option>
							<option value=3>Heavenly</option>
						</select>
						<br />
						<input type="text" name="name" style = "width: 200px; height: 30px; margin: 0 auto;" class="form-control" maxlength = 20 placeholder="Name"> <!--'margin: 0 auto;' added to center on IE-->
						<br />
						<textarea id = "flex" name="comment"  style = "height: 100px;"class="form-control" maxlength = 500 placeholder="Enter your comment here (500 characters max)"></textarea>
					</div>
					<br />
					<div class="form-group col-lg-12""form-actions">  
						<button type="submit" name = "submit" class="btn btn-primary">Comment</button>  
					</div>
				</form>
		<?php
				display_comments_pagination();
			}
			else{ //if user HAS submitted a comment yet
				if(!$_POST['name']){ //check for name
					echo "Please enter a value for name.<br />";
					echo "<a href=\"" . $_SERVER['HTTP_REFERER'] . "\">try again</a>";
					return;
				}
				elseif(!$_POST['comment']){ //check for comment
					echo "Please enter a value for comment.<br />";
					echo "<a href=\"" . $_SERVER['HTTP_REFERER'] . "\">try again</a>";
					return;
				}
				$date = date("m/d/y G:i:s");//get current date
				include("../../../../secure/database.php");			
				$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD)
				or die('Could not connect: ' . pg_last_error()); //error if could not connect to database
		
				$query = 'INSERT INTO reviews.db (name, comments, log_date, resort_id) VALUES ($1, $2, $3, $4)'; //insert values for new record submitted by user
	
				$stmt = pg_prepare($conn, "insert", $query)	or die("Unable to prepare: " . pg_last_error($conn)); //prepare statement
				$result = pg_execute($conn, "insert", array($_POST['name'], $_POST['comment'], $date, $_POST['resort'])); //execute
		
				if(!$result){ //error if no value in $result
					die("Unable to execute: " . pg_last_error($conn));
				} else{
		?>
					<font size = "5" style = "font-family: Kalinga">Thank you for commenting!</font><br /><br />
					<form method="POST" action="/~wcmvh8/cs3380/group_project/skiexcision/trunk/new_website/reviews.php">
						<div class="form-group col-lg-12""form-actions">  
							<button type="submit" name = 'another' class="btn btn-primary">Post another comment</button>  
						</div>
					</form>
			
		<?php
					display_comments_pagination(); //displays the comments(this also frees $result and closes the connection)
					if(isset($_POST['another'])){
						main_page(); //go back to main page
					}
					return;
				}
			}
		}
		main_page(); //this is actually called before anything else to produce the main reviews.php page
		?>
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
