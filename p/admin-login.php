
<?php
 session_start();
 include ('connect.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{

  $password = $_POST['password'];

    if(!empty($password))
      {
    
      $query = "select * from admin where password = '$password' limit 1";
      $result = mysqli_query($con,$query);
		if(mysqli_num_rows($result) > 0)
		{
		$row = $result->fetch_assoc();
			if($row['password'] == $password){
				$_SESSION["admin"] = "admin";
				header("Location: admin.php");
			}
			else{
				echo "<center>wrong password!</center>";
				die;
			}
		}
		
		else {
		echo "<center>This user is not available!</center>";
		die;
		}
    }
	else {
		echo "<center>Enter login details!</center>";
		die;
		}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin log in</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
 <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
 <link rel="stylesheet" href="../volunteer-login.css">
 
<style>
	.logo{width: 40px;
   margin:10px;
  display: inline;}
  .title{font-size: large;
   color:#FFF;
  position: relative;
top: -23px;}
</style>
</head>
<body>
	<img  class="logo" src="../fav.png">
    <span class="title">Design and Implementation of Online Tutorial App</span>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="username" placeholder="User name">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="password" placeholder="Password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<!-- <h3><a href="p/registervolunteer.php" class="social-login__icon">Sign Up</a></h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div> -->
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
</body>
</html>
