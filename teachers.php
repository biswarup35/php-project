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
      } elseif(empty($location)) {
       $sql = "SELECT * FROM teacher WHERE subject = '$subject'";
      return $sql;
      } elseif(empty($subject)) {
        $sql = "SELECT * FROM teacher WHERE location = '$location'";
      return $sql;
      } else {
        $sql = "SELECT * FROM teacher WHERE subject = '$subject' AND location = '$location'";
        return $sql;
      }
    }

   }

$form = new SearchValidation($setLocation,$setSubject);
// SearchValidation::makeSql($_POST['location'],$_POST['subject']);
// echo($form->makeSql($_POST['location'],$_POST['subject']));
$sql = $form->makeSql($_POST['location'],$_POST['subject']);
$result = mysqli_query($conn, $sql);
$teachers = mysqli_fetch_all($result,MYSQLI_ASSOC);



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