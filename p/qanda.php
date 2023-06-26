<?php
   include ('connect.php');
   $query = "select question, answer from qanda";
   $results = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions | Answers</title>
    <style>
        .question{border-right: 1px solid #f2f2f2;
        padding: 10px;
        display: block;
        margin: auto;
        }
        hr{opacity: .3;}
    </style>
</head>
<body>
<h2>Questions | Answers</h2>
        <div class="question">
        <?php
        
    if(mysqli_num_rows($results) > 0)
    {
 
     while($rows = $results->fetch_assoc())
      {
        echo "<b> Question : </b>".$rows['question']."<b> Answer : </b>".$rows['answer']."<hr>";
      }
 }
 else {
    echo "question and answer not available!";
 }
 ?>
        </div>
</body>
</html>
    
 