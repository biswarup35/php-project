<?php
require('../config.php');

if (isset($_POST['submit'])) {
    $userName = mysqli_real_escape_string($conn,$_POST['userName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];
    $passwordRep = $_POST['password-rep'];

    if (empty($userName) || empty($email) || empty($password) || empty($passwordRep)) {
        header("Location: ../signup.php?error=emptyfield");
        exit();

    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$userName)) {
        header("Location: ../signup.php?error=emptyfield");
        exit();
    } elseif($password !== $passwordRep) {
        header("Location: ../signup.php?error=passwordmismatch");
        exit();
    } else {
        // check if userName already taken.

        $sql = "SELECT userTeachers FROM teachers WHERE userTeachers = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();            
        } else {
            mysqli_stmt_bind_param($stmt, "s",$userName);
            mysqli_stmt_execute($stmt);
            // storing the result
            mysqli_stmt_store_result($stmt);
            $checkResult = mysqli_stmt_num_rows($stmt);

            if ($checkResult > 0) {
                header("Location: ../signup.php?error=usernametaken&email=".$email);
                exit();
            } else {

                $sql = "INSERT INTO teachers (userTeachers,emailTeachers,passTeachers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();            
                } else {
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss",$userName,$email,$hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();

                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn); 
    }

}
?>
