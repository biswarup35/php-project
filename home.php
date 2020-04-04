<?php include('component/header.php') ?>

<?php 
if (isset($_SESSION['userName'])) {
  echo "ok";
}
?>

<div class="container center">
    <div class="hero">
    <img class="responsive-img" src="background.png">
    <a class="test btn-floating btn-large pulse blue darken-4" href="index.php"><i class="material-icons" >search</i></a>
    </div>
</div>
<div class="center">
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
<?php include('component/footer.php') ?>