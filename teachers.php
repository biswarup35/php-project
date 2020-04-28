<?php include('component/header.php');?>
<?php
include('config.php');
// get inputs
$location = mysqli_real_escape_string($conn, $_POST['location']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);

$setLocation = $_POST['location'];
$setSubject = $_POST['subject'];

   class SearchValidation {
    public $location;
    public $subject;
    public $sql;

    function __construct($location, $subject) {
      $this->location = $location;
      $this->subject = $subject;
    }
    public static function makeSql($location,$subject) {
      if (empty($location) && empty($subject)) {
        header('Location: index.php?error=empty');
        // header("location:javascript://history.go(-1)");
      } elseif(empty($location)) {
      //  $sql = "SELECT * FROM teacher WHERE subject = '$subject'";
       $sql = "SELECT * FROM teacherdetails WHERE FIND_IN_SET('$subject',stream)";

      return $sql;
      } elseif(empty($subject)) {
        // $sql = "SELECT * FROM teacher WHERE location = '$location'";
        $sql = "SELECT * FROM teacherdetails WHERE FIND_IN_SET('$location',location)";
      return $sql;
      } else {
        // $sql = "SELECT * FROM teacher WHERE subject = '$subject' AND location = '$location'";
        $sql = "SELECT * FROM teacherdetails WHERE FIND_IN_SET('$subject',stream) AND FIND_IN_SET('$location',location)";
        return $sql;
      }
    }

   }

$form = new SearchValidation($setLocation,$setSubject);
$sql = $form->makeSql($_POST['location'],$_POST['subject']);
$result = mysqli_query($conn, $sql);
$teachers = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<div class="container">
<?php
if (!empty($location) && empty($subject)) {
  echo '<h4 class="center flow-text">All teachers from ' .strtolower($location).'</h4>';
  
} elseif(!empty($subject) && empty($location)) {
  echo '<h4 class="center flow-text">All '.strtolower($subject).' teachers</h4>';
} else {
  echo '<h4 class="center flow-text">Teachers of ' .strtolower($subject).' from '.strtolower($location).'</h4>';
}
?>
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
              <!-- <a class="btn-floating blue darken-4 pulse" href="details.php?id=<?php echo htmlspecialchars($teacher['id']);?>">
                  <i class="material-icons">info</i>
              </a> -->
              <a class="btn-floating blue darken-4 pulse" href="details.php?user=<?php echo htmlspecialchars($teacher['userTeachers']);?>">
                  <i class="material-icons">info</i>
              </a>
            </td>
          </tr>
        </tbody>
        <?php } ?> 
      </table>
</div>
<?php include('component/footer.php');?>