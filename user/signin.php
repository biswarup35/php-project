<?php
require('../config.php');
if (isset($_POST['submit'])) {
    $userName = $_POST['email'];
    $password = $_POST['password'];

    if (empty($userName) || empty($password)) {
        header("Location: ../login.php?error=emptyfield");
        exit();        
    } else {
        $sql = "SELECT * FROM teachers WHERE userTeachers = ? OR emailTeachers = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();            
        } else {
            mysqli_stmt_bind_param($stmt,"ss",$userName,$userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $checkPassword = password_verify($password, $row['passTeachers']);
                if ($checkPassword == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                } elseif ($checkPassword ==  true) {
                    session_start();
                    $_SESSION['userID'] = $row['idTeachers'];
                    $_SESSION['userName'] = $row['userTeachers'];
                    header("Location: /project/home.php?login=successful");
                    exit();
                } else {
                    header("Location: ../login.php?error=worngpassword");
                    exit();
                }
            }

        }


    }
}

?>
