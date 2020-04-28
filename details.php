<?php include('component/header.php');?>
<?php
include('config.php');
// $setId = $_GET['id'];
if(!empty($_GET['user'])) {

       $user = mysqli_real_escape_string($conn,$_GET['user']);
    // $id = mysqli_real_escape_string($conn, $_GET['id'])
    ;
    // make sql query SELECT * FROM teacher WHERE id = '$id';
    // $sql = "SELECT * FROM teacher WHERE id = '$id'";
    $sql = "SELECT teacherdetails.userTeachers,teacherdetails.name,
    teacherdetails.location,teacherdetails.address,teacherdetails.contact,
    teacherdetails.stream,teacherdetails.subjects,teacherdetails.fees,
    teacherimage.img FROM teacherdetails INNER JOIN teacherimage
     ON teacherdetails.userTeachers=teacherimage.userTeachers WHERE teacherdetails.userTeachers = '$user'";
    
    
    // get query result 
    $result = mysqli_query($conn, $sql);
    // fetch the result in array format of a single row;
    // check the number of row if its returns 0 then print error message
    $numOfRow = mysqli_num_rows($result);
    if ($numOfRow > 0) {
        $teacher = mysqli_fetch_assoc($result);
        mysqli_close($conn);
    } else {
        header("Location: details.php?error=norecordsfound");
    }  
} else {
    header('Location: home.php');
}
?>
<div class="container">
<div class="row">
<div class="col s12 m6 offset-m3">
<section id="1">
    <ul class="collection with-header z-depth-0">
        <li class="collection-item blue darken-4">
          <h6 class="white-text center"><b>Teacher Profile</b></h6>
        </li>
        <li class="collection-header avatar">
             <div class="row center">
                 <div class="col s3">
                     <!-- <i class="small material-icons">perm_identity</i> -->
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($teacher['img']); ?>" alt=""height="100" width="100" class="circle responsive-img">
                 </div>
                 <div class="col s9">
                     <p class="flow-text"><?php echo htmlspecialchars($teacher['name']);?></p>
                 </div>
             </div>  
        </li>
        <li class="collection-item">
            <div class="row">
                <div class="col s2">
                <i class="small material-icons">location_on</i>                    
                </div>
                <div class="col s10">
                 <?php echo htmlspecialchars($teacher['location']);?> - <?php echo htmlspecialchars($teacher['address']); ?>
                </div>
            </div>
        </li>
        <li class="collection-item">
          <div class="row">
            <div class="col s2">
               <i class="small material-icons">euro</i>
            </div>
            <div class="col s10">
              <?php echo $teacher['fees'];?>
            </div>
          </div>
         </li>
         <li class="collection-item">
          <div class="row">
            <div class="col s2">
            <i class="small material-icons">menu_book</i>
            </div>
            <div class="col s10">
              <!-- <?php echo $teacher['subject'];?> : -->
              <?php echo $teacher['stream'];?> :
               <ul>
                   <!-- <?php foreach (explode(",",$teacher['otherSubjects']) as $liSubject) { ?>
                     <li><?php echo $liSubject; ?></li>
                   <?php }?> -->
                   <?php foreach (explode(",",$teacher['subjects']) as $liSubject) { ?>
                     <li><?php echo $liSubject; ?></li>
                   <?php }?>
                 </ul>
            </div>
          </div>
         </li>
         <li class="collection-item">
          <div class="row">
            <div class="col s2">
            <i class="small material-icons">phone_iphone</i>
            </div>
            <div class="col s10">
              <!-- <a href="tel:<?php echo $teacher['phoneNumber'];?>"><?php echo $teacher['phoneNumber'];?></a> -->
              <a href="tel:<?php echo $teacher['contact'];?>"><?php echo $teacher['contact'];?></a>
            </div>
          </div>
         </li>
    </ul>
</section>
</div>
</div>
</div>


<?php include('component/footer.php');?>