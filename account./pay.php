<?php
session_start();

if(isset($_SESSION['login'])){
    
    if(isset($_POST['balance']) and !is_null($_POST['balance']) and $_POST['balance'] != ''){
        
        $balance = $_POST['balance'];
        $id      = $_SESSION['login'];
        
        if(is_numeric($balance)){
        
        $_SESSION['pay'] = $balance;
        
         header("Location: './../pay/index.php?amount=$balance&id=$id'");
    }else{
        echo json_encode(['success' => 2]);
    }
}
else{
    echo json_encode(['success' => 3]);
}
}else{
    header("Location: ./../login.php");
}
?>