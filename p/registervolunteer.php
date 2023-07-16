
<?php
 include("connect.php");
 
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $id = md5(microtime(true));
    $fullname = $_POST['fullname'];
    $status = "Certified";
    $special = $_POST['special'];
    $contact = $_POST['contact'];
    $note = $_POST['note'];
    $password = $_POST['password'];
    $username = $_POST['username'];

  if(!empty($fullname) && !empty($special) && !empty($contact) && !empty($note) && !empty($username))
    {
     $q1 = $con->query("SELECT * FROM `volunteers` WHERE `username` = '$username'") or die(mysqli_error());
		 $f1 = $q1->fetch_array();
		 $c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Username already taken')</script>";
			}else
      {
      $query = "insert into volunteers (id, fullname, status, special, contact, note,password,username) values ('$id', '$fullname', '$status', '$special', '$contact', '$note', '$password','$username')";
      mysqli_query($con,$query);
      echo "<div style='text-align:center;  padding: 10px;  color: white;'>
      We have successfully recieved your request to be a volunteer on this site ".$fullname."
      we really appreciate this and you will shortly recieve an approval message in your provided email / whatsapp, at the mean time you can log in as unverified volunteer. 
      Thank you for your interest and steaking with us and believing in DIOTA.<br>
      <a style='text-decoration: none;' href='../index.php''>Log in</a>
     </div>";
      }
    }else
    {
     echo "<div style='text-align:center;  padding: 10px; color: red;'>Some fields are missing!</div>";
     }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">         
    <script src="https://kit.fontawesome.com/af67cc835a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="..\style.css">
    <title>Register volunteer</title>
     
 <style>
    body{background: linear-gradient(90deg, #c7c5f4, #776bcc);
        font-family: Raleway, sans-serif;
    }
  .title{font-size: large;
   color:#FFF;
  position: relative;
top: -23px;}

.logo{width: 40px;
   margin:10px;
  display: inline;
}

    .text{
      display: block;
      margin: auto;
    color: #504d4d;
    font-size: small;
    box-shadow: 0px 0px 24px #5C5696;
   
    border-radius: 4px;}
  .formdiv{border-radius: 4px;
    background:url(bg.png);
    background-repeat: no-repeat;
    background-size: cover;

    box-shadow: 0px 0px 24px #5C5696;
      display: block;
      margin: auto;
    }
    .formdiv, .text{width: 95%;
      padding: 10px;}
    textarea{resize: none;}
   textarea, input[type=text]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
       display: inline-block;
       border: 1px solid #ccc;
       border-radius: 4px;
        box-sizing: border-box;
      }
       
        button{width: 100%;
            background: #4CAF50;
            color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;}
        button:hover{background: #45a049;}
hr{opacity: .3;}
.ft{padding: 8px;
  color: #504d4d;
  font-size: small;
}
.ft i{border-radius: 0 4px 0 4px;}
.ft i:hover{box-shadow: 0px 0px 24px #5C5696;
  border-radius: 4px 0 4px 0;}
h3{color:#FFF;}
@media only screen and (min-width:768px){
  
  .formdiv, .text{
    padding: 20px;
    }
   textarea, input[type=text]{
        padding: 12px 20px;
        margin: 8px 0;
      }
}
</style>
</head>
<body>
    <img  class="logo" src="..\fav.png">
    <span class="title">Design and Implementation of Online Tutorial App</span>

<div class="main">

  <div class="text">
    <h3>Register As a Volunteer</h3>
   Volunteer is entitled for answering questions provided by the users. 
    <h3>Requrements</h3>
    <ol>
      <li>You are programmer or developer.</li>
      <li>Read the first requirement.</li>
      <li>Make sure you fullfill the above requirements, thank you.</li>
    </ol>
    Make sure you fill all the textboxes before submitting. Write short note about your experience.
    Appreciated for your interest.
   </div>
   <br>
   <div class="formdiv">
    <form method="POST" >
    <input type="text" name="fullname" placeholder="Full name"><br><br>
    <input type="text" name="special" placeholder="Skills (Web Developer)"><br><br>
    <input type="text" name="contact" placeholder="Contact (Email address)"><br><br>
    <textarea name="note" placeholder="Short note"></textarea><br><br>
    <input type="text" name="username" placeholder="Username" ><br><br>
    <input type="text" name="password" placeholder="New password"><br><br>
    <button>Register</button>
   </form>
   <br>Have an account? <a href="../volunteer-login.html">log in</a>
   </div>

</div>
<hr>
<div class="ft">
  <h3>About</h3>
  <br>
  <div>
  Design and Implementation of Online Tutorial App - 
  To come up with a program to promote online tutorial and onboard our people to this system and enlighten them. 
  </div>
  <br>
  <div class="contactdiv">
     <h3>Contact</h3>
     Design and Implementation of Online tutorial Application, 2nd Floor Scientist Street, Maradi state USA.
     <h3>Contact Us</h3>
    <br>
    <div class="contactinternaldiv">
    
    <div>  
     <a href="https://chat.whatsapp.com/GRTp9cII3BFAcsnhFVDZuV"><i class="fa fa-whatsapp"></i></a>
    </div>
    
    <div>
     <a href="mailto:allinonehausa@gmail.com"><i class="fa fa-envelope"></i></a>
    </div>
    
    <div>
     <a href="tel:+2349066947271"><i class="fa fa-phone"></i></a>
    </div>
    
    </div>
    <div>
   
    </div>
    
  </div>
  <hr>
    <div class="copyright">
    Copyrights © <span id="date">2023</span> Tutorial App. All rights <br>reserved.
    </div>
  
  </div>
<script src="jquery.js"></script>
</body>
</html>
