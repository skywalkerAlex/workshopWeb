<!DOCTYPE html>
<html lang="gr">
	<head>
		<title>Επικοινωνία</title>
		<meta http-equiv="Content-Type" content="text/html" charset = "utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel = "stylesheet" href = "../material_bootstrap_theme-master/css/material_theme.css" >
		<link rel = "stylesheet" href = "mainStyle.css" >
		<style>
			#main{
				border-color: rgba(0, 191, 255, 0.6); 
			}
			.navbar-default:hover{
				box-shadow: 0 6px 10px rgba(0, 191, 255, 0.6);
			}
			.active{
				background-color: rgba(0, 191, 255, 0.6);
			}
			.modal-footer:hover{
				box-shadow: 0 6px 10px rgba(0, 191, 255, 0.6);
			}
		</style>
	</head>
	<body>
		<!-- The Head of the Site -->
		<header >
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="glyphicon glyphicon-align-justify"></span> Μενού
					</button>
					<!-- Logo Image -->
					<a href = "http://gav.uop.gr/"><img class = "navbar-brand btn btn-default z-depth-5 hoverable" src = "logo_gav.gif" title = "Δείτε εδώ ποιοί είμαστε." alt = "GavLab"></img></a>
				</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse">
				<!-- Menu and Search bar -->
					<ul class="nav navbar-nav">
						<li ><a title="Αρχική οθόνη" href = "index.php" class="btn material_btn green"><i class="fa fa-home" aria-hidden="true"></i><span class="sr-only">(current)</span> Αρχική</a></li>
						<li ><a title="Πληροφορίες για τους κωδικούς που έχουμε συλλέξει" href = "CodesGR.php" class="btn material_btn red"><i class="fa fa-code-fork" aria-hidden="true"></i> Κωδικοί</a></li>
						<li ><a title="Πληροφορίες για τις ετικέτες που έχουμε συλλέξει" href="LabelsGR.php" class="btn material_btn orange" ><i class="fa fa-tag" aria-hidden="true"></i> Ετικέτες</a></li>
						<!-- <li><a title="Όλοι οι οργανισμοί που έχουν δώσει πιστοπίηση" href = "CertificatesGR.php" class="btn material_btn">Οργανισμοί Πιστοποίησης</a></li> -->
						<li ><a id = "active" title="Επικοινωνίστε μαζί μας." href = "ContactUs.php" class="btn material_btn blue active"><i class="fa fa-envelope" aria-hidden="true"></i> Επικοινωνία</a></li>
					</ul>
					<form action = "" method = 'GET' class="navbar-form navbar-nav navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" name='search' placeholder="Αναζήτηση εδώ: ">
						</div>
						<button type="submit" class="btn btn-default" >Αναζήτηση <span class="glyphicon glyphicon-search"></span></button>
					</form>

				</div><!-- /.navbar-collapse -->
			
	
			</div><!-- /.container-fluid -->
		</nav>
		</header>
		
		<!-- The Main Body -->
		<main id = "main" role="main" class= "container-fluid navbar-default" >
			<div class="container" >
			<article class="col-md-12">
				<header>
					<h1>Επικοινωνίστε μαζί μας</h1>
				</header>
				<p>Άν έχετε βρεί κάποια ετικέτα ή κάποιον κωδικό ο οποίος δεν βρίσκετε στην βάση μας, παρακαλούμε μην διστάσεται να επικοινωνίσεται μαζί μας.</p>
				<p id="feedback"><?php include 'mainphp.php'; if(isset($_POST['submit'])){ $feed = contactUS($_POST['name'],$_POST['title'],$_POST['email'],$_POST['request']);}?></p>
			</article>
<!-- Contact form -->
			<div class="row clearfix">
			<!-- Submissioner form -->

				<form action = "?" method="post" class="form-horizontal" role="form" id="request">
					<div class="form-group form-group-lg">

					    <label for="name" form="request" class="control-label col-sm-2" >Όνομα:</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="name" placeholder="Όνομα" name="name">
						</div>
					</div>
					<div class="form-group form-group-lg">
					    <label for="email" form="request" class="control-label col-sm-2">Email:</label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="email" placeholder="Δώστε μας ένα email επιβεβαίωσης..." name="email" required>
					    </div>
				    </div>

				
				<h3>Συμπλήρωσε παρακάτω το αίτημα σου.</h3>
			<!-- Form for his/her request -->	
				
				    <div class="form-group form-group-lg">

					    <label for="title" form="request" class="control-label col-sm-2" >Τίτλος:</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="title" placeholder="Τίτλος Αιτήματος" name="title" >
						</div>
					</div>
					<div class="form-group form-group-lg">

					    <label for="text" form="request" class="control-label col-sm-2" >Κείμενο:</label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="3" id="text" placeholder="Εισαγωγή Κειμένου" name="request" required></textarea>
						</div>
					</div>
				    <span class="help-block" >Δεν κρατάμε κανένα πρωσοπικό σας στοιχείο!<br>Ό,τι στέλνετε αποσκοπεί στην βελτίωση της βάσης.</span>
				    <button type="submit" class="btn btn-lg btn-default" name="submit">Αποστολή</button>

				</form>
				
<!-- END of Contact form -->
			</div>
		</div>
		</main>
		
		<!-- The Footer -->
		<footer >
			<div class = "modal-footer" >
				<div class = "row" >
					<div class = "col-md-3" ><p>&#169; Copyright Thesis 2016</p></div>
					<div class = "col-md-2" ></div>
					<div class = "col-md-7" >
						<ul>
							<li class = "col-md-3 col-xs-6"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> <a href = "#" >Πτυχιακή Εργασία</a></li>
							<li class = "col-md-3 col-xs-6"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> <a href = "https://gr.linkedin.com/in/alexander-liakopoulos-b32077ab" >Λιακόπουλος Αλέξανδρος</a></li>
							<li class = "col-md-3 col-xs-6"><a href = "http://gav.uop.gr/" ><img src = "http://gav.uop.gr/images/logotext5.png" class = "imglogo" title = "ΓΑΒ LAB" alt = "ΓΑΒ LAB" ></img></a></li>
							<li class = "col-md-3 col-xs-6"><span class="glyphicon glyphicon-envelope"></span> <a href = "ContactUs.php" >Επικοινωνία</a></li>
						</ul>
					</div>
					<span class="scroll-wrapper"><a id="back-to-top" class="back-to-top" href="#main"> <i class="icon-arrow-up"></i></a></span>
				</div>
			</div>
		</footer>




		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<!-- Include all compiled plugins for Bootstrap's JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
	</body>
</html>