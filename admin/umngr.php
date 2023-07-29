<?php

session_start();
include("config.php");

if (isset($_SESSION['admin']) and $_SESSION['admin'] == $user) {
    include("./../scratch.php");
    
    if(isset($_POST['userId']) and !is_null($_POST['userId']) and $_POST['userId'] != '' and isset($_POST['blnc-change']) and !is_null($_POST['blnc-change']) and $_POST['blnc-change'] != ''){
        
    
        $id         = $_POST['userId'];
        $balance    = $_POST['blnc-change'];
        
        mysqli_query($conn,"UPDATE `users` SET `balance`='$balance' WHERE id='$id'");
        
        echo json_encode(['success' => 1]); // ERR 2 - wrong email or password
    } else {
        echo json_encode(['success' => 2]); // ERR 2 - wrong email or password
    }
if(isset($_POST['ban']) and !is_null($_POST['ban']) and $_POST['ban'] != ''){
    
if($_POST['ban'] == "active"){
        
    $id         = $_POST['userId'];
    mysqli_query($conn,"UPDATE `users` SET `ban`='active' WHERE id='$id'");
        
        echo json_encode(['success' => 3]); // ERR 2 - wrong email or password
} 
else {
        
    $id         = $_POST['userId'];
    mysqli_query($conn,"UPDATE `users` SET `ban`='inactive' WHERE id='$id'");
        
        echo json_encode(['success' => 1]); // ERR 2 - wrong email or password
} 
    
} else {
    echo json_encode(['success' => 5]); // ERR 2 - wrong email or password
}

} else {
    
    header("Location: ./login.php");
}
?>