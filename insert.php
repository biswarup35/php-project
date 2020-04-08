<?php include('component/header.php');
 require('config.php');
?>
<?php
 if (!isset($_SESSION['userName'])) {
    header('Location: home.php');
} else {
    $userName = $_SESSION['userName'];
    $sql = "SELECT COUNT(userTeachers) as teachers FROM teacherdetails WHERE userTeachers = '$userName'";
    $result = mysqli_query($conn,$sql);
    $info = mysqli_fetch_assoc($result);

    if ($info['teachers'] == 1) {
        // $style = "style='display:none;'";
        // $style2 = "style='display:block;'";
        header('Location: home.php');
    } elseif ($info['teachers'] == 0) {
        $style = "style='display:block;'";
        $style2 = "style='display:none;'";
    } else {
        $style = "style='display:block;'";
        $style2 = "style='display:none;'";       
    }

    
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $addresss = $_POST['address'];
        $contact = $_POST['contact'];
        $fees = $_POST['fees'];
        $subjects = $_POST['subjects'];
        $location = $_POST['location'];
        $subjectStream = $_POST['subject-stream'];
        $img = $_FILES['img']['name'];
    
        if (empty($name) || empty($addresss) || empty($contact)
             || empty($fees) || empty($subjects) ||empty($location)
             || empty($subjectStream) || empty($img)) {
    
               echo 'empty';
            //    further form validation
        } else {
            $sql = "INSERT INTO teacherdetails (userTeachers,name,location,address,contact,stream,subjects,fees)
            VALUES (?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("Location: insert.php?error=sql");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ssssssss",$userName,$name,$location,$addresss,$contact,$subjectStream,$subjects,$fees);
                mysqli_stmt_execute($stmt);
                echo 'data inserted';
                // further image validation is required
                $image = $_FILES['img']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
                $sql = "INSERT INTO teacherimage (userTeachers,img) VALUES ('$userName','$imgContent')";
                mysqli_query($conn,$sql);

            }

        }
    }

    
}



?>
<div class="container">
    <div class="row" id="profile-deteails">
        <div class="col s12" id="form-container">
            <div <?php echo $style;?> class="card z-depth-0 grey lighten-3">
                <div class="card-content">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col s3">
                     <p>Profile Picture</p>
                </div>
                <div class="col s9">
                <div class="file-field input-field">
                     <div class="btn">
                           <span>File</span>
                           <input type="file" name="img" accept="image/*">
                     </div>
                     <div class="file-path-wrapper">
                       <input class="file-path validate center " placeholder="jpg/jpeg/png 250px by 250px or 150KB" type="text">
                     </div>
                 </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                     <p>Name :</p>
                </div>
                <div class="col s9">
                     <input  placeholder="Full name i.e Rahul Benerjee" id="name" type="text" name="name" class="validate center">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Address :</p>
                </div>
                <div class="col s9">
                     <input placeholder="Full address"  id="Address" type="text" name="address" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Phone :</p>
                </div>
                <div class="col s9">
                      <input placeholder="i.e 9832267362" id="contact" type="text" name="contact" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Fees :</p>
                </div>
                <div class="col s9">
                      <input placeholder="i.e 500" id="fees" type="number" name="fees" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Subjects :</p>
                </div>
                <div class="col s9">
                     <input placeholder="i.e Maths, Physics, Chemistry" id="subjects" type="text" name="subjects" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Location :</p>
                </div>
                <div class="col s9">
                     <input placeholder="i.e Bankura" id="location" type="text" name="location" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Subject Stream :</p>
                </div>
                <div class="col s9">
                     <input placeholder="i.e Science" id="subject-stream" type="text" name="subject-stream" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="center col s12">
                    <button class="btn indigo" name="submit" type="submit">Submit</button>
                </div>
            </div>
            </form>
                </div>
            </div>


        </div>

        <div <?php echo $style2;?> class="col s12">
            <h5>
                you have completed your profile
            </h5>
        </div>

    </div>
</div>
<?php include('component/footer.php');?>