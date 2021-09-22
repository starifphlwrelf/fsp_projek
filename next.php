<?php
session_start();
if (isset($_SESSION['jawaban'])) {
    $arr = $_SESSION['jawaban'];
}else{
    // $arr = array();
}


// $jawaban0 = $_POST['jawaban0'];
if (isset($_POST['jawaban1'])) {
    $jawaban1 = $_POST['jawaban1'];
    $arr[1]= $jawaban1;
    if (isset($_POST['jawaban2'])) {
        # code...
        $jawaban2 = $_POST['jawaban2'];
        $arr[2]= $jawaban2;
    
    }
}else if (isset($_POST['jawaban2'])) {
    # code...
    $jawaban2 = $_POST['jawaban2'];
    $arr[2]= $jawaban2;

}else if ($_POST['jawaban3']) {
    # code...
    $jawaban3 = $_POST['jawaban3'];
    $arr[3]= $jawaban3;

}
// $jawaban3 = $_POST['jawaban3'];
// for ($i=0; $i < 2; $i++) { 
//     $arr[$i]=$jawaban
// }

// $arr[0]= $jawaban0;
// $arr[1]= $jawaban1;
// $arr[2]= $jawaban2;
// $arr[3]= $jawaban3;

$_SESSION['jawaban'] = $arr;
// echo $jawaban1;
// echo $jawaban2;
// echo $jawaban3;
var_dump( $_SESSION['jawaban']);

header("Location: index.php?halaman=2");
