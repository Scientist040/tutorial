
<?php
 include ('connect.php');
 include('questions.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{

  $password = $_POST['password'];

    if(!empty($password) &&  $password !== "1' or '1'='1")
      {
    
      $query = "select * from volunteers where password = '$password' limit 1";
    
      $result = mysqli_query($con,$query);

       if(mysqli_num_rows($result) > 0)
          {
        
           while($row = $result->fetch_assoc())
            {
             $user = $row;
            }
           if($user['status'] !== "Certified"){
            echo "<center>volunteer not approved, wait for admin approval!</center>";
            die;
           }
          }
        else {
             echo "<center>This volunteer is not available!</center>";
             die;
             }
     }
  else {
    echo "<center>Type user info!</center>";
    die;
    }
}
  else {
    echo "Wrong request!";
    // header("Location: login.php");
    die;
  }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | Dashboard</title>
    <style>
        body{
          background: linear-gradient(90deg, #c7c5f4, #776bcc);}
        .main{display: flex;
        justify-content: space-between;}
      
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #776bcc;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background:  #c7c5f4;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #f2f2f2;
}

        .question, .user{
    padding: 10px;
    box-shadow: 0px 0px 24px #5C5696;
  border-radius:4px;
  background: #f2f2f2;
  }
  table{ width: 100%;}
  tr{border: 1px solid black;
    }
  th{color: #5C5696;
    width: 50%;
  }
  td{width: 50%;}
        .user{width: 20%;
            }
            .user span{opacity: .5;
            font-family: monospace;}
        .question{width: 60%;
        word-wrap: break-word;
        overflow: auto;
        
        height: 400px;
        
        }
       hr{opacity: .3;}
.chairpic{width:100%;
  box-shadow: 0px 0px 24px #5C5696;
    border-radius:4px;
  }
       input, textarea ,label{
  resize: none;
    width:100%;
    background: transparent;
    color: #999999;
    padding:4px;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   border-radius: 4px;
    box-sizing: border-box;
    }
    .logo{width: 40px;
   margin:10px;
  display: inline;}
  .title{font-size: large;
   color:#FFF;
  position: relative;
top: -23px;}
h4{color: #fff;
   padding:10px;}
textarea{height: 200px;}
input{outline: none;}
textarea:active{border: 1px solid #c7c5f4;}
textarea:hover, input:focus{border: 1px solid #c7c5f4;}
input[type=submit]{color: #fff;}
.questiontextarea{height: 100p;}
    </style>
</head>
<body>
<img  class="logo" src="../fav.png">
<span class="title">Volunteer Dashboard</span>
<hr>
    <!-- <label>Questions</label> -->
    <br><br>
    <div class="main">
      <div class="picsd">
        <img src="picq.png" class="chairpic">
      </div>
        <div class="question">
        <?php
        
      echo "<table>";
      echo "<tr><th>Question</th><th>Contact</th></tr>";
    if(mysqli_num_rows($results) > 0)
    {
     while($rows = $results->fetch_assoc())
      {
        echo "<tr>";
        echo "<td>".$rows['question']."</td><td>".$rows['contact']."</td>";
        echo "</tr>";
      }
 
 }
 else {
      $nul = "question is not available!";
     // header("Location: login.php");
 }
 echo "</table>";
        // if($questions $rows){
        //     while($questions){
        //     echo "<b>Question ID : </b>".$questions['id'];
        //     echo "<b> Question : </b>".$questions['question'];
        //     echo "<b> Contact : </b>" .$questions['answer'];
        //     }
        // }
        // else{
        //     echo "no questions";
        //}
        ?>
        </div>
        <!-- <div class="user">
            Name : <span><?php echo $user_data['fullname']?></span><br><br>
            Specialization : <span><?php echo $user_data['special']?></span><br><br>
             Status : <span><?php echo $user_data['status']?></span>
        </div> -->
    </div>
    <br>
    <h4>Write Answer</h4>
    <hr>
    <br><br>
    <div class="answer">
    <form action="recieveqanda.php" method="GET">
        <input type="text" name="volunteer" placeholder="Your Full Name" value="<?php echo $user['fullname']?>"><br><br>
        <textarea name="question" class="questiontextarea" placeholder="write question here!"></textarea><br><br>
        <textarea name="answer" placeholder="write answer here!"></textarea><br><br>
        <input type="submit" value="send">
    </form>
    </div>
    <br>
</body>
</html>