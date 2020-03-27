<?php include('component/header.php');?>
<?php
include('config.php');
// get inputs
$location = mysqli_real_escape_string($conn, $_POST['location']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);

$setLocation = $_POST['location'];
$setSubject = $_POST['subject'];

   if(isset($setLocation) || isset($setSubject)) {
     // SELECT * FROM teacher WHERE subject = "Subject" AND location = "Location";
     $sql = "SELECT * FROM teacher WHERE subject = '$subject' AND location = '$location' ";
     $result = mysqli_query($conn, $sql);
      if($result == true) {
        // echo "go on";
        $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($conn);
      } else {
         echo $sql;
         exit();
        }
   } else {
     header('Location: index.php?error=emptyfiels');
   }
?>
<div class="container">
<h4 class="flow-text">Result for <?php echo htmlspecialchars($location);?> and <?php echo htmlspecialchars($subject);?>:</h4>
      <table class="centered highlight">
        <thead>
          <tr>
              <th>Name</th>
              <th>Fees</th>
              <th>Location</th>
              <th>Get info</th>
          </tr>
        </thead>
        <?php foreach($teachers as $teacher) {?>
        <tbody>
          <tr>
            <td><?php echo htmlspecialchars($teacher['name']); ?></td>
            <td><?php echo htmlspecialchars($teacher['fees']); ?> </td>
            <td><?php echo htmlspecialchars($teacher['location']); ?></td>
            <td>
              <a class="btn-floating blue darken-4 pulse" href="details.php?id=<?php echo htmlspecialchars($teacher['id']);?>">
                  <i class="material-icons">info</i>
              </a>
            </td>
          </tr>
        </tbody>
        <?php } ?> 
      </table>
</div>
<?php include('component/footer.php');?>