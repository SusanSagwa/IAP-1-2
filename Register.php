<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="one.css">
</head>
<body>
	    <form action="index.php" method="post">
	        <div class="LoginBoxx"> 
			<h1>REGISTER</h1>
        <div class="textBox">
			<input type="text" placeholder="Please enter Full name" name="fullname">
		</div>
		
		<div  class="textBox">
			<input type="text" placeholder="Username" name="username">
		</div>

        <div class="textBox">
			<input type="email" placeholder="E-mail" name="user_email">
		</div>

		   <div class="textBox">
			<input type="Number" placeholder="Phone Number" name="phone">
           </div>
	
	    <div class="textBox">
     	<input type="file"  placeholder="Upload Profile Photo" name="ProfileImage">
        </div>

        <div class="textBox">
        <input type="text" placeholder="City" name="city">
    </div>

		<div class="textBox">
			<input type="text" placeholder="Password" name="password">
		</div>

		
			<input class="btn" type="submit" name="Register"  value="Register">
		
    </div>
		</form>
</body>
</html>