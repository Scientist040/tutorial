<?php
      session_start();
      include ('connect.php');
    //   include ('checkpoint.php');
      function check()
  {
    if(!(isset($_SESSION['admin'])))
       {
        echo "<center>no such admin admin</center>";
        die;
  }
  }
  check();
      $qanda = "select * from qanda";
      $question = "select * from questions";
      $pendingvolunteers = "select * from volunteers where status='Not Certified'";
      $volunteers = "select * from volunteers where status='Certified'";

      $results = mysqli_query($con,$qanda);
      $result = mysqli_query($con,$question);
      $pendingvolunteersresult = mysqli_query($con,$pendingvolunteers);
      $volunteersresult = mysqli_query($con,$volunteers);
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if($_POST['task'] == "approvevolunteer"){
        $id = $_POST['approvevol'];
        $approve = "UPDATE volunteers SET status='Certified' WHERE id = '$id'";
        $approvere = mysqli_query($con, $approve);
        if($approvere){
        echo "<center>volunteer approved successiful!</center><br>";
        }
        else{
            echo "<center>something wrong!</center><br>";
        }
    }
    else if($_POST['task'] == "removevolunteer"){
        $id = $_POST['removevol'];
        $remove = "DELETE FROM volunteers WHERE id = '$id'";
        
        if(mysqli_query($con, $remove)){
        echo "<center>volunteer removed successiful!</center><br>";
        }
        else{
            echo "<center>something wrong!</center><br>";
        }
    }
    else if($_POST['task'] == "deletequestion"){
        $id = $_POST['deleteq'];
        $delete = "DELETE FROM questions WHERE id = '$id'";
        
        if(mysqli_query($con, $delete)){
        echo "<center>Question deleted successiful!</center><br>";
        }
        else{
            echo "<center>something wrong!</center><br>";
        }
    }
    else if($_POST['task'] == "deleteanswer"){
        $id = $_POST['deletea'];
        $deletea = "DELETE FROM qanda WHERE id = '$id'";
        
        if(mysqli_query($con, $deletea)){
        echo "<center>Answer deleted successiful!</center><br>";
        }
        else{
            echo "<center>something wrong!</center><br>";
        }
    }
    else{
        echo "Something wrong!!!";
    }
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin | Dashboard</title>
    <style>
        body{background: linear-gradient(90deg, #c7c5f4, #776bcc);
        margin: 0;
        padding:0;
        word-wrap:break-word;}
        .logo{width: 40px;
   margin:10px;
  display: inline;}
  .title{font-size: large;
   color:#FFF;
  position: relative;
top: -23px;}
hr{opacity: .3;
margin:0;}
        .main{} 
center{color: red;
      background: #fff;}
        .nav{
   margin: 0;
   background: #f2f2f2;
   display: flex;
   /* justify-content: space-around; */
}
.nav button{background:transparent;
            border: none;
            padding: 10px;
            width: 24%;
            color: #5C5696;
}
.nav button:hover{background: #f2f2f2;
                   opacity: .5;}
.rightdiv span{ 
    text-align: center;
font-weight: bolder;}

.rightdiv{padding:10px;
        width: 90%;
        display: block;
        margin: auto;
}


.footer{
     background:url(../bg3.png);
     background-repeat: no-repeat;
     background-size: cover;
     padding:20px;
     color: #999999;
     max-width: 100%;
}

 table{width:100%;}
th{padding:10px;
}
td{color: #000;
    border-bottom: 1px solid #f2f2f2;
  width:33%;}

 .question, .volunteers, .pendingvolunteers, .qanda{
     box-shadow: 0px 0px 24px #5C5696;
     padding:5px;
     border-radius: 5px;
     box-shadow: 0px 0px 24px #5C5696;
     display: none;
     background: #f2f2f2;
     color: black;
    }
     .volunteers{
     display: block;
    
}
.question span, .volunteers span, .pendingvolunteers span, .qanda span{
 color:#5C5696;
}
.sheight{height: 186px;
overflow: auto;
margin:0;
}

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
 /* form */
 .formdiv{margin:0;
        padding:0;
        width:100%;
       }
       .formdiv form{margin:auto;
        display: block;
        width:100%;
       }
        .icon, input, button{margin:0;
    padding: 10px;
    outline: none;
border: none;
border-radius: 4px;}
.icon{border: 1px solid #4CAF50;
            display: inline-block;
            color: #4CAF50;
        }
        .taskbtn{background: #4CAF50;
        border: 1px solid #f2f2f2;
        border-radius: 4px;
        color: #f2f2f2;
        }
        .inputtask{width:86%;
            background: transparent;
            color: #f2f2f2;}
    .taskbtn:hover{color: #fff;}
.copyright{text-align: center;}
    </style>
</head>
<body>
    <img  class="logo" src="../fav.png">
<span class="title">Admin Dashboard</span>
<hr>
   
        <div class="nav">
            <button class="vlist">Volunteer list</button>
            <button class="nvlist">New Volunteers</button>
            <button class="qs">Questions</button>
            <button class="qa">Questions and Answers</button>
        </div>

        <div class="rightdiv">
           
           
            <div class="qanda">
                <span>Questions and Answers</span><br>
                <table>
                    <tr>
                        <th>ID</th><th>Questions</th><th>Answers</th>
                    </tr>
</table>
<div class="sheight">
                    <table>
                   
                    <?php
        
                    if(mysqli_num_rows($results) > 0)
                    {
                 
                     while($rows = $results->fetch_assoc())
                      {    
                     echo "<tr>";
                        echo "<td>".$rows['id']."</td><td>".$rows['question']."</td><td>".$rows['answer']."</td>";
                     echo "</tr>";
                      }
                 }
                 else {
                    echo "<tr><td>no data</td><td>no data</td><td>no data</td></tr>";
                 }
                 ?>
                
                </table>
                </div>
                <div class="formdiv">
             <form method="post">
               <span class="icon"><i class="fa fa-trash-o"></i></span><input class="inputtask" name="deletea" type="text" placeholder="Type Answer ID" ><button class="taskbtn">Delete</button>
               <input type="hidden"  value="deleteanswer" name="task">
               </form>
            </div>
            </div>
            <!-- uestions -->
             <div class="question">
                <span>Questions</span><br>
                <table>
                    <tr>
                        <th>ID</th><th>Questions</th>
                    </tr>
</table>
<div class="sheight">
                    <table>
                   
                    <?php
        
                    if(mysqli_num_rows($result) > 0)
                    {
                 
                     while($rows = $result->fetch_assoc())
                      {    
                     echo "<tr>";
                        echo "<td>".$rows['id']."</td><td>".$rows['question']."</td>";
                     echo "</tr>";
                      }
                 }
                 else {
                    echo "<tr><td>no data</td><td>no data</td></tr>";
                 }
                 ?>
                
                </table>
                </div>
                <div class="formdiv">
             <form method="post">
               <span class="icon"><i class="fa fa-trash-o"></i></span><input class="inputtask" name="deleteq" type="text" placeholder="Type Question ID" ><button class="taskbtn">Delete</button>
               <input type="hidden"  value="deletequestion" name="task">
               </form>
            </div>
            </div>       
<!-- pending volunteers -->
                 <div class="pendingvolunteers">

                <span>Pending Volunteers</span><br>
                <table>
                    <tr>
                        <th>ID</th><th>Name</th><th>Spec</th><th>Note</th>
                    </tr>
</table>
<div class="sheight">
                    <table>
                   
                    <?php
        
                    if(mysqli_num_rows($pendingvolunteersresult) > 0)
                    {
                 
                     while($rows = $pendingvolunteersresult->fetch_assoc())
                      {    
                     echo "<tr>";
                        echo "<td>".$rows['id']."</td><td>".$rows['fullname']."</td><td>".$rows['special']."</td><td>".$rows['note']."</td>";
                     echo "</tr>";
                      }
                 }
                 else {
                    echo "<tr><td>no data</td><td>no data</td><td>no data</td><td>no data</td></tr>";
                 }
                 ?>
                
                </table>
                </div>
                <div class="formdiv">
             <form method="post">
               <span class="icon"><i class="fa fa-trash-o"></i></span><input class="inputtask" name="approvevol" type="text" placeholder="Type Volunteer ID" ><button class="taskbtn">Approve</button>
               <input type="hidden"  value="approvevolunteer" name="task">
               </form>
            </div>
            </div>
<!-- pending volunteers -->
                 <div class="volunteers">

                <span>Volunteers</span><br>
                <table>
                    <tr>
                        <th>ID</th><th>Name</th><th>Specialization</th>
                    </tr>
</table>
<div class="sheight">
                    <table>
                   
                    <?php
        
                    if(mysqli_num_rows($volunteersresult) > 0)
                    {
                 
                     while($rows = $volunteersresult->fetch_assoc())
                      {    
                     echo "<tr>";
                        echo "<td>".$rows['id']."</td><td>".$rows['fullname']."</td><td>".$rows['special']."</td>";
                     echo "</tr>";
                      }
                 }
                 else {
                    echo "<tr><td>no data</td><td>no data</td><td>no data</td></tr>";
                 }
                 ?>
                
                </table>
                </div>
                <div class="formdiv">
             <form method="post">
               <span class="icon"><i class="fa fa-trash-o"></i></span><input class="inputtask" type="text" name="removevol" placeholder="Type Volunteer ID" ><button class="taskbtn"> Remove</button>
               <input type="hidden"  value="removevolunteer" name="task">
               </form>
            </div>
            </div>
      </div>
    <div class="footer">
        <div class="copyright">
            Copyrights © <span id="date">0000</span> Tutorial App. All rights <br>reserved.
         </div>
    </div>
    <script>       
 $(document).ready(function(){
    $("#date").html(new Date().getFullYear());

    $(".vlist").click(function(){
        $(".pendingvolunteers, .qanda, .question").css("display","none");
        $(".volunteers").css("display","block");
     });

     $(".nvlist").click(function(){
     $(".volunteers, .qanda, .question").css("display","none");
        $(".pendingvolunteers").css("display","block");
     });

     $(".qs").click(function(){
     $(".volunteers, .pendingvolunteers, .qanda").css("display","none");
        $(".question").css("display","block");
     });

     $(".qa").click(function(){
     $(".volunteers, .pendingvolunteers, .question").css("display","none");
     $(".qanda").css("display","block");
     });

 });
    </script>
</body>
</html>