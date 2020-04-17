<?php include('component/header.php');
 require('config.php');
?>
<?php
// add !isset($_SESSION)
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
        $imgSize = @getimagesize($_FILES['img']['tmp_name']);
        $width = $imgSize[0]; $height = $imgSize[1];
        $imgData = $_FILES['img']['size'];
    
        if (empty($name) || empty($addresss) || empty($contact)
             || empty($fees) || empty($subjects) ||empty($location)
             || empty($subjectStream) || empty($img)) {

            header("location:javascript://history.go(-1)");
            exit();
        } else {
            $sql = "INSERT INTO teacherdetails (userTeachers,name,location,address,contact,stream,subjects,fees)
            VALUES (?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("Location: insert.php?error=sql");
                exit();
            } else {
                // take image validation
                if ($imgData > 512000) {
                    $response = array (
                        "type" => "error",
                        "msg" => "Image size exeesed 500KB"
                    );
                } else if ($width > 800 || $height > 800) {
                    $response = array (
                        "type" => "error",
                        "msg" => "Image size exeesed 800x800"
                    );
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssssss",$userName,$name,$location,$addresss,$contact,$subjectStream,$subjects,$fees);
                    mysqli_stmt_execute($stmt);
                    $image = $_FILES['img']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                    $sql = "INSERT INTO teacherimage (userTeachers,img) VALUES ('$userName','$imgContent')";
                    if (mysqli_query($conn,$sql)) {
                        header('Location: home.php');
                    }
                }
            }
        }
    }  
}
?>
<div class="container">
    <div class="row" id="profile-deteails">
        <div class="col s12 m8 offset-m2" id="form-container">
            <div <?php echo $style;?> class="test-1">
                <div class="test-1">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <!-- form started -->
                <ul class="collection">
                    <li class="collection-item blue darken-4">
                        <h6 class="center white-text"><b>Complete the form</b></h6>
                    </li>
                 <li class="collection-item">
                     <p><b>Upload Picture</b></p>
                     <p>Select jpeg or png maximum of 500KB</p>
                     <div class="row">
                     <div class="col s12">
                     <div class="file-field input-field">
                     <div class="btn small blue darken-4">
                     <i class="small material-icons ">attachment</i>
                     <input type="file" name="img" accept="image/*">
                     </div>
                     <div class="file-path-wrapper">
                     <input class="file-path validate center " placeholder="" type="text">
                     </div>
                     </div>
                     </div>
                    </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Your Full Name</b></p>
                     <div class="row">
                     <div class="col s12">
                     <input  placeholder="Full name i.e Rahul Benerjee" id="name" type="text" name="name" class="validate">
                     </div>
                     </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Address</b></p>
                     <p>Full address of your tution center</p>
                     <div class="row">
                     <div class="col s12">
                     <input placeholder="Full address"  id="Address" type="text" name="address" class="validate">
                     </div>
                     </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Area location</b></p>
                     <div class="row">
                     <div class="col s12">
                     <input placeholder="i.e Bankura" id="location" type="text" name="location" class="validate">
                     </div>
                     </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Your Phone number</b></p>
                     <div class="row">
                     <div class="col s12">
                      <input placeholder="i.e 9832267362" id="contact" type="tel" name="contact" class="validate">
                     </div>
                     </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Fees</b></p>
                     <p>Fees you are taking per month</p>
                     <div class="row">
                     <div class="col s12">
                     <input placeholder="i.e 500" id="fees" type="number" name="fees" class="validate">
                     </div>
                     </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Subject</b> - (subject stream/trade)</p>
                     <div class="row">
                     <div class="col s12">
                     <input placeholder="i.e Science" id="subject-stream" type="text" name="subject-stream" class="validate">
                     </div>
                     </div>
                 </li>
                 <li class="collection-item">
                     <p><b>Subjects</b></p>
                     <p>Subjects you taught add in coma separet</p>
                     <div class="row">
                     <div class="col s12">
                     <input placeholder="i.e Maths, Physics, Chemistry" id="subjects" type="text" name="subjects" class="validate">
                     </div>
                     </div>
                 </li>
                </ul>
            <div class="row">
                <div class="center col s12">
                    <button class="btn blue darken-4" name="submit" type="submit">Submit</button>
                    <?php if(!empty($response)) {?>
                        <p><?php echo $response["type"]." -". $response["msg"];?></p>
                    <?php } ?>
                </div>
            </div>
            <!-- form closed -->
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('component/footer.php');?>