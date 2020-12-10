<?php include('connect.php')  ?>
<html>
<title>Facebook</title>
<head>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<div class="fb-header">
	<h3 class="fb">facebook</h3>
</div>
	<form action="Facebook.php" method="POST">
		<div id="form1" class="fb-header">Email or Phone<br>	
		<input placeholder="Email" type="mail" name="name" /><br>
		<div id="form2" class="fb-header">Password<br>
		<input placeholder="Password" type="password" name="password" /><br>
		<label>Forgot Account?</label>
		</div>
		<input type="submit" class="submit1" value="login" name="submit" /> 
		</div>
</form>


 <div class="fb-body">
	<div style="position: absolute; left: 200px; top: 40px; font-size: 25px;"><b>Connect with friends and the <br>world around you on Facebook.</b></div>
	<div style="position: absolute; left: 200px; top: 170px; font-size: 13px;"> <b>See photos and updates</b> from friends in News Feed.</div>
	<div style="position: absolute; left: 200px; top: 230px; font-size: 13px;"> <b>Share what's new </b> in your life on your Timeline.</div>
	<div style="position: absolute; left: 200px; top: 290px; font-size: 13px;"> <b>Find more</b> of what you're looking for with Facebook Search.</div>

	<div style="position: absolute; left: 750px; top: 5px;font-size: 30px;"><p><b>Sign Up</b></div> 
	<div style="position: absolute; top: 60px; left: 750px; font-size: 15px"><br>It's quick and easy.</div></p>


	<form action="Facebook.php" method="POST">
		<div id="form3" class="fb-body">
		 <input placeholder="First name" type="text" class="namebox" name="fname" />
		 <input placeholder="Last name" type="text" class="namebox" name="lname" /> <br>
		 <input placeholder="Mobile number or email" type="text" class="mailbox" name="email" /><br>
		 <input placeholder="New password" type="password" class="mailbox" name="pass" /><br><br>
		 <label class="label">Birthday</label> <br>
		 <input type="date" class="namebox"  name="date" /><br><br>
		 <label class="label">Gender</label> <br>
		 <input type="radio" class="gen" name="sex" value="male" />Male
		 <input type="radio" class="gen" name="sex" value="female" />Female
		 <input type="radio" class="gen" name="sex" value="custom" />Custom<br><br>
		 <p class="sign">By clicking Sign Up, you agree to
		 our Terms and that you have read our Data Policy, 
		 including our Cookie Use.</p>
		 <input type="submit" class="button2" value="Sign Up" name="submit1" />
		 <br>
		</div>
	</form>

	<?php  
		if(isset($_POST['submit1'])){
			$firstname = $_POST['fname'];
			$lastname = $_POST['lname'];
			$email = $_POST['email'];
			$password = $_POST['pass'];
			$sex = $_POST['sex'];
			$birthdate = $_POST['date'];


			$sqlInsert= "INSERT INTO tblFacebook(Lastname, Firstname, Number_email, Password, Gender, Birthday) VALUES ('$lastname','$firstname','$email','$password','$sex','$birthdate')";
			$query = mysqli_query($connect,$sqlInsert);
		}
	?>

	<?php  
		$sqlSelect = "SELECT * FROM tblfacebook";
		$query = mysqli_query($connect,$sqlSelect);
		while ($row = mysqli_fetch_array($query)) {
		
		if(isset($_POST['submit'])){
			$login = $_POST['name'];
			$pass = $_POST['password'];

			if ($login != $row['Number_email'] || $pass != $row['Password'] ) {
				header('Location: error.php');
       			exit;
			}else {
				header('Location: log.php');
       			exit;
			}


		}
	}
	?>

		
	 
</body>
</html>