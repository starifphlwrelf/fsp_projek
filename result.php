<?php 

session_start();
if(isset($_SESSION['tes'])) {
  echo "Your session is running " . $_SESSION['tes'];
}
// echo $_SESSION['tes'];
if(isset($_POST['submit'])){
        if(!empty($_POST['radio'])) {
          echo '  ' . $_POST['radio'];
        } else {
          echo 'Please select the value.';
        }
      }
?>