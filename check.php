<?php
session_start();

if (isset($_SESSION['login'])) {
    session_unset($_SESSION['login']);
}


include("./scratch.php");



// ERR 0 -> one or more empty input
// ERR 2 -> not email
// ERR 3 -> short password
// ERR 4 -> email already exists
// ERR 5 -> systematic error
// ERR 6 -> email does not exist
// ERR 7 -> wrong password



if (isset($_POST['auth-type']) and $_POST['auth-type'] != null and $_POST['auth-type'] != '' and isset($_POST['auth-email']) and isset($_POST['auth-password']) and !is_null($_POST['auth-email']) and !is_null($_POST['auth-password']) and $_POST['auth-email'] != '' and $_POST['auth-password'] != '') {
    $auth_type = $_POST['auth-type'];
    $email = $_POST['auth-email'];
    $passwd = $_POST['auth-password'];
    $uid = uniqid();

    if ($auth_type == "signup") {
        // SIGNUP
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (strlen($passwd) >= 6) {

                $sql_Check_Email = "SELECT `email` FROM `users` WHERE `email`='$email'";
                $result_Check_Email = mysqli_query($conn, $sql_Check_Email);
                $res_Check_Email = mysqli_fetch_assoc($result_Check_Email);

                if (!$res_Check_Email) {

                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($result);
                    $next = date('Y/m/d');
                    $passwordHash = password_hash($passwd, PASSWORD_DEFAULT);
                    $sql2 = "INSERT INTO `users` (`id`, `email`, `password`, `balance`, `ban`, `time`) VALUES ('$uid', '$email', '$passwordHash', '0', 'active', '$next')";
                    $result2 = mysqli_query($conn, $sql2);


                    if ($result2 != NULL) {
                        echo json_encode(['success' => 1]);
                        $_SESSION['login'] = $uid;
                    } else {
                        echo json_encode(['success' => 5]); // ERR 5 - systematic error
                    }


                } else {
                    echo json_encode(['success' => 4]); // ERR 5 - email already exists
                }
            } else {
                echo json_encode(['success' => 3]); // ERR 4 - short password
            }
        } else {
            echo json_encode(['success' => 2]); // ERR 2 - not email
        }
    } else {
        // LOGIN
        $sql_Check_Email = "SELECT `email` FROM `users` WHERE `email`='$email'";
        $result_Check_Email = mysqli_query($conn, $sql_Check_Email);
        $res_Check_Email = mysqli_fetch_assoc($result_Check_Email);

        if ($res_Check_Email != NULL) {

            $email2 = $res_Check_Email['email'];


            $sql_email2 = "SELECT * FROM `users` WHERE `email`='$email2'";
            $result_email2 = mysqli_query($conn, $sql_email2);
            $res_email2 = mysqli_fetch_assoc($result_email2);
            $passWord2 = $res_email2['password'];


            if (password_verify($passwd, $passWord2)) {
                $uid = $res_email2['id'];
                $_SESSION['login'] = $uid;
                echo json_encode(['success' => 1]); // SUCCESS

            } else {
                echo json_encode(['success' => 7]); // ERR 7 - wrong password
            }
        } else {
            echo json_encode(['success' => 6]); // ERR 6 - email does not exist
        }
    }
} else {
    echo json_encode(['success' => 0]); // ERR 0 - one or more empty inputs
}