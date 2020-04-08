<?php require('../component/header.php');?>
<?php
if (isset($_POST['submit'])) {
  include('../config.php');
  $userName = $_SESSION['userName'];

  $sql = "SELECT teacherdetails.userTeachers,teacherdetails.name,teacherdetails.location,teacherdetails.address,teacherdetails.contact,teacherdetails.stream,teacherdetails.subjects,teacherdetails.fees,teacherimage.img FROM teacherdetails INNER JOIN teacherimage ON teacherdetails.userTeachers = teacherimage.userTeachers WHERE teacherdetails.userTeachers = '$userName'";
  $result = mysqli_query($conn, $sql);
  $details = mysqli_fetch_assoc($result);







} else {
  echo "not clicked";
}

















?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<button class="btn" name="submit" type="submit">Click Me</button>
</form>
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($details['img']); ?>" /> 

<?php require('../component/footer.php');?>