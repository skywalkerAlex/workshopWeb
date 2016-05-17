<html>
<body>
<?php

// PHP code for ContactUS.php
function contactUS($username,$usertitle,$useremail,$userrequest){
	$feedback = "";
//alternative email-scenario by sending the request to database
	$conn = mysqli_connect('localhost','root','alex','labels');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_query('set character set UTF8');
	mysql_query("SET NAMES 'utf8'");
	mysqli_set_charset($conn,"utf8");
	
	//UPLoad the request
	$query = "INSERT INTO requests(username,useremail,usertitle,mainrequest) VALUES('$username','$useremail','$usertitle','$userrequest')";
	if (mysqli_query($conn, $query)) {
		$feedback = "Το μύνημά σας καταχωρήθηκε επιτυχώς";
	} else {
		$feedback = "Προέκυψε κάποιο πρόβλημα.<br>Παρακαλώ προσπαθήστε σε λίγα λεπτά.";
	}
	echo $feedback;
	mysqli_close($conn);

/*
//Send  Mail to me
if($_POST){
	$username = $_POST["name"];
	$usertitle = $_POST["title"];
	//Elegxos an exei dwsei email kai to aithma tou 
	if(isset($_POST['email']) && isset($_POST['request'])){
		$useremail = $_POST["email"];
		$userrequest = $_POST["request"];
		$header = "\nEMAIL Address : "+$useremail;
	}else{
		echo "<script language='javascript' >alert('Please insert your email and your Request. NOTE that we are not keep any information!');</script>";
	}
	
	//Message form Control 
	if (preg_match("(^A-Za-z0-9)",$username)){//an den einai alpha-arithmetic
		echo "<script language='javascript' >alert('Please insert a correct alpha-arithmetic Name.');</script>";
		//EXIT or return  he must retype a name
	}else{
		if(mail("tst08031@labels.gr",$usertitle,$userrequest,$header)){
			$feedback = "Το μύνημά σας καταχωρήθηκε επιτυχώς";
		}else{
			$feedback = "Προέκυψε κάποιο πρόβλημα.<br>Παρακαλώ προσπαθήστε σε λίγα λεπτά.";
		}
	}
	echo $feedback;
}

*/

}//----------#### END of ContactUs ####----------


//PHP code for menu 'ETIKETES'  .... coming soon for menu 'KWDIKOI'
function displayData($table,$line){

	//open SQL CONNECTION
	$conn = mysqli_connect('localhost','root','alex','labels');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_query('set character set UTF8');
	mysql_query("SET NAMES 'utf8'");
	mysqli_set_charset($conn,"utf8");
	
	//SELECT the row from our table 
	$query = "SELECT * FROM ".$table." WHERE id ='".$line."'";
	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo $row['image']."<br>".$row['title']."<br>".$row['smallindex']."<br>".$row['mainindex']."<br>";
		}
	}else{
		echo "0 results";
	}

}
function displayMenu($table){
		$conn = mysqli_connect('localhost','root','alex','labels');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_query('set character set UTF8');
	mysql_query("SET NAMES 'utf8'");
	mysqli_set_charset($conn,"utf8");
	$fn="";
	//SELECT the row from the table 
	$query = "SELECT * FROM ".$table." ";
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
	// output data of each entity 
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class="col-xs-12 col-sm-6 col-md-4">';
			echo '<div class="thumbnail">';
				echo $row['image'];
					echo '<div class="caption">';
						echo '<h2 class="text-center bottom">'.$row['title'].'</h2>';
							if($table=='kwdikoi'){
								echo '<p class="text-center"><a class="img-thumbnail btn btn-lg btn-primary" href="CodesGR.php?fn=display&id='.$row['id'].'" data-fancybox-group="gallery" role="button">Εδώ</a></p>';
							}else{
								echo '<p class="text-center"><a class="img-thumbnail btn btn-lg btn-primary" href="LabelsGR.php?fn=display&id='.$row['id'].'" data-fancybox-group="gallery" role="button">Εδώ</a></p>';
							}
						echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}else{
		echo "0 results";
	}

}
function SearchEng($searchKey,$table){
	//connection to table
	$conn = mysqli_connect('localhost','root','alex','labels');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_query('set character set UTF8');
	mysql_query("SET NAMES 'utf8'");
	mysqli_set_charset($conn,"utf8");
	
	$searchKey = preg_replace("#[^0-9a-z]#i","",$searchKey);	
	//SELECT the row from our table 
	$query = "SELECT * FROM ".$table." WHERE title LIKE '%".$searchKey."%' OR smallindex LIKE '%".$searchKey."%'";
	if ($table=='kwdikoi'){
		$query += "OR codename LIKE '%".$searchKey."%'";
	}
	
	$result = mysqli_query($conn,$query);
	
	if (!$result || mysqli_num_rows($result) <= 0) {
		echo "<p class = ''>Δεν βρέθηκαν αποτελέσματα.</p><p>Αν δέν βρήκατε αυτό που ψάχνατε, παρακαλώ <a href = 'ContactUs.php'>επικοινωνίστε</a> μαζί μας κι εμείς θα ερευνήσουμε την ετικέτα ή κωδικό που ψάχνεται.</p>";
		return false;
	}else if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		return "<p>Βρέθηκαν".$row." αποτελέσματα.</p>";
		displayData($table,$row['id']);
	}else{
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class="col-xs-12 col-sm-6 col-md-4">';
			echo '<div class="thumbnail">';
				echo $row['image'];
					echo '<div class="caption">';
						echo '<h2 class="text-center bottom">'.$row['title'].'</h2>';
							if($table=='kwdikoi'){
								echo '<p class="text-center"><a class="img-thumbnail btn btn-lg btn-primary" href="CodesGR.php?fn=display&id='.$row['id'].'" data-fancybox-group="gallery" role="button">Εδώ</a></p>';
							}else{
								echo '<p class="text-center"><a class="img-thumbnail btn btn-lg btn-primary" href="LabelsGR.php?fn=display&id='.$row['id'].'" data-fancybox-group="gallery" role="button">Εδώ</a></p>';
							}
						echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}
	
}



?>

</body>
</html>