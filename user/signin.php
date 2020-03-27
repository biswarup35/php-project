<?php require('../component/header.php');?>
<?php
require('../config.php');
if (isset($_POST['submit'])) {
    $userName = $_POST['email'];
    $password = $_POST['password'];

    if (empty($userName) || empty($password)) {
        header("Location: signin.php?error=emptyfield");
        exit();        
    } else {
        $sql = "SELECT * FROM teachers WHERE userTeachers = ? OR emailTeachers = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: signin.php?error=sqlerror");
            exit();            
        } else {
            mysqli_stmt_bind_param($stmt,"ss",$userName,$userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $checkPassword = password_verify($password, $row['passTeachers']);
                if ($checkPassword == false) {
                    header("Location: signin.php?error=wrongpassword");
                    exit();
                } elseif ($checkPassword ==  true) {
                    session_start();
                    $_SESSION['userID'] = $row['idTeachers'];
                    $_SESSION['userName'] = $row['userTeachers'];
                    header("Location: /project/home.php?login=successful");
                    exit();
                } else {
                    header("Location: signin.php?error=worngpassword");
                    exit();
                }
            }

        }


    }
}

?>

<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3 l6 offset-l3">
            <div class="card grey lighten-3">
                <div class="card-content">
                    <h6 class="center flow-text">Login</h6>
                    <form class="center" action="signin.php" method="post">
                        <div class="input-field s12">
                            <label for="email">Email or Username<span class="red-text">*</span> </label>
                            <input class="validate" name="email" id="email" type="text">
                        </div>
                        <div class="input-field s12">
                            <label for="password">Password<span class="red-text">*</span></label>
                            <input class="validate" name="password" id="password" type="password">
                        </div>
                        <button class="btn blue darken-4" name="submit" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="note center">
                <p>Not have account? please <a href="signup.php">signup</a></p>
            </div>
        </div>
    </div>

</div>
<?php require('../component/footer.php');?>