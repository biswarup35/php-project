<?php include('component/header.php');
require('config.php');
?>
<?php
if (isset($_SESSION['userName'])) {
  $style = "style='display:none;'";
  $style2 = "style='display:block;'";
  $userName = $_SESSION['userName'];

  $sql = "SELECT COUNT(userTeachers) as teachers FROM teacherdetails WHERE userTeachers = '$userName'";
  $result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_assoc($result);
  if($info['teachers'] == 0) {
    header('Location: insert.php');
  }

  $sql = "SELECT teacherdetails.id,teacherdetails.name,teacherdetails.userTeachers,teacherdetails.location,
  teacherdetails.address,teacherdetails.contact,teacherdetails.stream,
  teacherdetails.subjects,teacherdetails.fees,teacherimage.img FROM teacherdetails
   INNER JOIN teacherimage on teacherdetails.userTeachers = teacherimage.userTeachers
    WHERE teacherdetails.userTeachers = '$userName'";
  
  $result = mysqli_query($conn, $sql);
  $details = mysqli_fetch_assoc($result);
} else {
  $style = "style='display:block;'";
  $style2 = "style='display:none;'"; 
}
?>
<div <?php echo $style?> class="container center">
    <div class="hero">
    <img class="responsive-img" src="background.png">
    <a class="test btn-floating btn-large pulse blue darken-4" href="index.php"><i class="material-icons" >search</i></a>
    </div>
</div>
<div <?php echo $style?> class="center">
<div class="row">
<div class="col s12 m6 l4">
     <div class="card light-blue lighten-2">
        <div class="card-content black-text">
          <span class="card-title">We are for</span>
          <p>We will help you find your Teacher. Many of us always lands up finding wrong teacher and that drains our productivity as well as our motive.</p>
          <p>Here we are proving a list of teacher based on your location and subject stream.</p>
        </div>
        <div class="card-action">
          <a class="btn blue darken-4" href="about.php">Know more about us</a>
        </div>
      </div>
</div>
<div class="col s12 m6 l4">
      <div class="card light-blue lighten-2">
        <div class="card-content black-text">
          <span class="card-title">How it works?</span>
          <p>It works in such a way we are asking you for your desired location, and we will provide a list of teachers with some informations.</p>
          <p>i.e how much fees he/she is taking, which subjects he/she taughts, his/her address and contact details.</p>
        </div>
        <div class="card-action">
          <a class="btn blue darken-4" href="privacy">Terms & conditions</a>
        </div>
      </div>
</div>
<div class="col s12 m6 l4">
<div class="card light-blue lighten-2">
        <div class="card-content black-text">
          <span class="card-title">Get started</span>
          <p>Click the search icon, the above teacher is pointing. He is waiting for your response.</p>
          <p>On the very next page he will ask your location and subject steam. Then he will let you explore a list of teachers, click on get info for further exploration.</p>
        </div>
        <div class="card-action">
          <a class="btn blue darken-4" href="team.php">Explore the team members</a>
        </div>
      </div>
</div>
</div>
</div>
<div <?php echo $style2;?> class="container">
<div class="row">
  <div class="col s12 m6 offset-m3">
  <ul class="collection with-header" >
    <li class="collection-item blue darken-4">
      <h6 class="center white-text"><b>Profile</b></h6>
      <a class="btn-floating tooltipped light-blue lighten-2 right" data-position="top" data-tooltip="edit profile" href="profile-edit.php"><i class="material-icons">create</i></a>
    </li>
  <li class="collection-header avatar" >
    <div class="row center">
      <div class=" center col s3">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($details['img']); ?>" alt=""height="100" width="100" class="circle responsive-img">
      </div>
      <div class="col s9">
      <p class="flow-text"><?php echo $details['name'];?></p>
      </div>
    </div>

  </li>
  <li class="collection-item">
    <div class="row">
    <div class="col s2">
    <i class="small material-icons">location_on</i>
    </div>
    <div class="col s10">
    <?php echo $details['location'];?> - <?php echo $details['address'];?>
    </div>
    </div>
  </li>
  <li class="collection-item">
    <div class="row">
    <div class="col s2">
    <i class="small material-icons">euro</i>
    </div>
    <div class="col s10">
    <?php echo $details['fees'];?>
    </div>
    </div>
  </li>
  <li class="collection-item">
    <div class="row">
    <div class="col s2">
    <i class="small material-icons">menu_book</i>
    </div>
    <div class="col s10">
    <?php echo $details['stream'];?> :
    <ul>
      <?php foreach(explode(",",$details['subjects']) as $subs) {?>
        <li><?php echo $subs; ?></li>
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
    <a href="tel:<?php echo $details['contact'];?>"> <?php echo $details['contact'];?></a>
    </div>
    </div>
  </li>
</ul>
  </div>
</div>
</div>
<?php include('component/footer.php') ?>