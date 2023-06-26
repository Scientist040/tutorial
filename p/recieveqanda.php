
<?php
 include("connect.php");
 
 if($_SERVER['REQUEST_METHOD'] == "GET")
  {
  
    $volunteer = $_GET['volunteer'];
    $id = md5(microtime(true));
    $question = $_GET['question'];
    $answer = $_GET['answer'];
  if(!empty($volunteer) && !empty($question) && !empty($answer))
    {
      $query = "insert into qanda (id, volunteer, question, answer) values ('$id', '$volunteer','$question','$answer')";
      mysqli_query($con,$query);
      $soll = 8768; 
    }else
    {
     echo "<div style='text-align:center;  padding: 10px; border: 1px solid #f2f2f2; border-radius: 4px; position: fixed; top:50%;'>Some fields are missing!</div>";
     die;
     }

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
              body{color: black;
          background: linear-gradient(90deg, #c7c5f4, #776bcc);}
    </style>
</head>
<body>
<div style='text-align:center; color: #fff;  padding: 10px; border: 1px solid #f2f2f2; border-radius: 4px; position: fixed; top:50%;'>
     Question and answer recieved, thank you <?php echo $volunteer;?> for contributing!
</div>

</body>
</html>
