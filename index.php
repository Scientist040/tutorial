
<?php
 include("p/connect.php");
 
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
  
    $question = $_POST['question'];
    $contact = $_POST['contact'];
    $id = md5(microtime(true));
  if(!empty($question) && !empty($contact))
    {
      $query = "insert into questions (id, question, contact) values ('$id', '$question','$contact')";
      mysqli_query($con,$query);
    echo "<div style='text-align:center; padding: 10px; color: red;'>We have successfully recieved your question ".$contact."
      you will shortly recieve answer in your provided email / whatsapp.
      You can also check Q & A site for more answers, thank you.<br>
      <a style='text-decoration: none;' href='p/qanda.php''>QAs page</a>
   </div>";    
    }else
    {
     echo "<div style='text-align:center; padding: 10px; color: red;'>Enter something, the fields must not be empty!</div>";
  }

}
?>

<!DOCTYPE html>
<html lang="hausa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="theme-color" content="#f2f2f2">
    <meta name="keywords" content="Web Development, Programming">
    <meta name="description" content="Ku Koyi Programming A Harshen Hausa">
    <meta name="author" content="Khalifa Ali Ahmad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">         
    <script src="https://kit.fontawesome.com/af67cc835a.js" crossorigin="anonymous"></script>

    <title>Online Tutorial Hausa</title>
    <link rel="icon" type="image/x-icon" href="fav.png">
    <link rel="stylesheet" href="style.css">
</head>
<body oncontextmenu="return false">

<div class="upperl">
 <button class="vlbtn" style="background: #4CAF50; padding: 10px; color: white; border-radius: 15px; border: 1px solid #f2f2f2;">Join volunteers</button>
 <button class="user"><a href="volunteer-login.html"><i class="fa-solid fa-user"></i></a></button>  
 <button><i class="fa fa-bars" id="ml" aria-hidden="true"></i></button>
</div>

   <br>
    <div class="volunteer">
    Join volunteers quorum to provide lesson notes and answer questions. <a href="p/registervolunteer.php">Read more.</a>
    <br><br>
    <button onclick="this.parentNode.style.display = 'none';">close</button>
    </div>
   <div class="container">
    <div class="nav" id="nav">
      <button class="copbtn">Concept of Programming</button>
        <div class="block" id="cop">
         
         <div>
         <a href="concept.html" class="link">Concept of Programming</a>
         </div>
         <br>
         <div>
          <a href="variable.html" class="link">Variable</a>
         </div>
         <br>
         <div>
         <a href="datatype.html" class="link">Data Type</a>
         </div>
         <br>
         <div>
         <a href="arithmetic.html" class="link">Arithmetic Operators</a>
         </div>
         <br>
         <div>
         <a href="logic.html" class="link">Logic Operators</a>
         </div>

        </div>
        <br>
    <!-- JavaScript -->
     <button class="jsbtn">JavaScript Programming</button>
        <div class="block" id="jp">
         <div>
          <a href="objdes.html" class="link">Object Destructuring</a>
         </div>
         <br>
         <div>
         <a href="oopjs.html" class="link">JavaScript Inheritence</a>
         </div>
         <br>
         
        </div>
        </div>
 

    <!-- content -->
    <div class="viewpointdiv">
       <div id="viewpoint"><img src="welcome.png" class="welcome"></div>
    </div>
</div>
    <!-- content end -->
    <noscript>
    <b>
    Browser da kuke amfani da ita outdated ce, kuyi updating dinta a Playstore ko kuyi amfani da Chrome.
    </b>
    </noscript>
   
   
<div class="footer">


<h3>Ask question</h3>
 <br>
 <div>
  <form method="POST">
  Type your Email or Whatsapp number
  <br><br>
  <input type="text" name="contact" class="contactinput" placeholder="Enter your Email or Whatsapp">
  <br><br>
  Type your question<br><br>
  <textarea id="message" class="contactbox" placeholder="Type your question here!" name="question"></textarea><br>
  <br><br>
  <button class="btnf">Send question</button>
  </form>
   </div>
   <br>
  <div id="remfooter"></div>
  <script src="js\jquery-3.6.1.js"></script> 
<script src="js/jquery.js"></script>
</body>
</html>