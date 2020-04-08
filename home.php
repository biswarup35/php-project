<?php include('component/header.php');
require('config.php');
?>
<?php
if (isset($_SESSION['userName'])) {
  $style = "style='display:none;'";
  $style2 = "style='display:block;'";
  $userName = $_SESSION['userName'];

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
<div class="col s12">
  <div class="row">
    <div class="col s12">
      <div class="row center">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($details['img']); ?>" alt="" height="100" width="100" class="circle responsive-img">
      </div>
      <div class="row center">
        <h6>Welcome : <?php echo $details['userTeachers'];?></h6>
      </div>
    </div>

  </div>
  <div class="row">
    <a class="btn blue darken-4 right" href="profile-edit.php">Edit Details</a>
 <button class="btn blue darken-4 left">views as public</button>
  </div>
  <div class="row center">
    <div class="col s12 m3">
     <i class="small  material-icons">perm_identity</i>
      <p> <strong>Name :</strong> <?php echo $details['name'];?></p>
    </div>
    <div class="col s12 m3">
    <i class="small material-icons">location_on</i>
    <p> <strong>Location :</strong> <?php echo $details['location'];?> </p>
    </div>
     <div class="col s12 m3">
     <i class="small material-icons">euro</i>
    <p><strong>Fess :</strong> <?php echo $details['fees'];?></p>
    </div>
     <div class="col s12 m3">
     <i class="small material-icons">phone_iphone</i>
     <p><strong>Phone :</strong><a href="tel:<?php echo $details['contact'];?>"> <?php echo $details['contact'];?></a></p>
    </div>
  </div>
  <div class="row center">
    <div class="col s12 m4">
    <i class="small material-icons">map</i>
     <p><strong>Address :</strong> <?php echo $details['address'];?></p>
    </div>
     <div class="col s12 m4">
       <i class="small material-icons">menu_book</i>
      <p> <strong>subjects :</strong> <?php echo $details['subjects'];?></p>
    </div>
      <div class="col s12 m4">
      <i class="small material-icons">settings</i>
      <p><strong>stream :</strong> <?php echo $details['stream'];?></p>
    </div>
  </div>
</div>
</div>
<?php include('component/footer.php') ?>