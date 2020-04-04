<?php
require('component/header.php');
include('config.php');

$userName = $_SESSION['userName'];

if (isset($_SESSION['userName'])) {
    // future update - join two table (teacherdetails, teacherimage) for display images
    $sql = "SELECT * FROM teacherdetails WHERE userTeachers = '$userName'";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $details = mysqli_fetch_assoc($result);

    } else {
        header("Location: profile.php?error=norecordsfound");
        exit();        
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $fees = $_POST['fees'];
        $subjects = $_POST['subjects'];
        $location = $_POST['location'];
        $stream = $_POST['subject-stream'];

        $sql = "UPDATE teacherdetails SET 
        name = '$name',
        location = '$location',
        address = '$address',
        contact = '$contact',
        stream = '$stream',
        subjects = '$subjects',
        fees = '$fees'
        WHERE userTeachers = '$userName'
        ";
        $update = mysqli_query($conn,$sql);
        // header("Refresh: 0.1");
      if ($update) {
          $fileName = basename($_FILES['img']['name']);
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //   file type allowed
        $type = array('jpg','png','jpeg','gif');
        if (in_array($fileType,$type)) {
            $image = $_FILES['img']['tmp_name'];
            $imgContenet = addslashes(file_get_contents($image));

            $sql = "UPDATE teacherimage SET img = '$imgContenet' WHERE userTeachers = '$userName'";
            
            if (!mysqli_query($conn,$sql)) {
                header("Location: profile.php?errorimg=failedupload");
                exit();               
            }
            
        } else {
            header("Location: profile.php?img=wrongformat");
            exit();  
        }
          
      } elseif (!$update) {
        header("Location: profile.php?error=sqlerror");
        exit();
      }
    }

} else {
    header('Location: home.php');
}
?>

<div class="container">
    <div class="row" id="profile-deteails">
        <div class="col s12" id="form-container">
            <div class="card z-depth-0 grey lighten-3">
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
                       <input class="file-path validate"  type="text">
                     </div>
                 </div>
                </div>

            </div>
            <div class="row">
                <div class="col s3">
                     <p>Name :</p>
                </div>
                <div class="col s9">
                     <input  value="<?php echo htmlspecialchars($details['name'])?>" id="name" type="text" name="name" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Address :</p>
                </div>
                <div class="col s9">
                     <input value="<?php echo htmlspecialchars($details['address'])?>"  id="Address" type="text" name="address" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Phone :</p>
                </div>
                <div class="col s9">
                      <input value="<?php echo htmlspecialchars($details['contact'])?>" id="contact" type="text" name="contact" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Fees :</p>
                </div>
                <div class="col s9">
                      <input value="<?php echo htmlspecialchars($details['fees'])?>" id="fees" type="number" name="fees" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Subjects :</p>
                </div>
                <div class="col s9">
                     <input value="<?php echo htmlspecialchars($details['subjects'])?>" id="subjects" type="text" name="subjects" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Location :</p>
                </div>
                <div class="col s9">
                     <input value="<?php echo htmlspecialchars($details['location'])?>" id="location" type="text" name="location" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                     <p>Subject Stream :</p>
                </div>
                <div class="col s9">
                     <input value="<?php echo htmlspecialchars($details['stream'])?>" id="subject-stream" type="text" name="subject-stream" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="center col s12">
                    <button class="btn indigo" name="submit" type="submit">Update </button>
                </div>
            </div>
            </form>
                </div>
            </div>


        </div>

    </div>
</div>









<?php require('component/footer.php'); ?>
