function check()
  {
    if(!(isset($_SESSION['admin'])))
       {
        echo "no admin";
        die;
  }
  }