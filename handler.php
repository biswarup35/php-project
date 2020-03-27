<?php include('component/header.php');?>

<?php
include('config.php');

$subject =  mysqli_real_escape_string($conn,$_POST['option1']);
// echo $subject;

$location = mysqli_real_escape_string($conn, $_POST['option']);
// echo $location;
$sql = "SELECT name,location FROM teachers WHERE location = '$location' ";
echo $sql;
$result = mysqli_query($conn, $sql);
if($result) {
  $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  echo "not ok";
}
// mysqli_free_result($result);
// mysqli_close($conn);

$sql1 = "SELECT name,subject FROM teacher WHERE subject = '$subject' ";
$subjectResult = mysqli_query($conn, $sql1);
$names = mysqli_fetch_all($subjectResult, MYSQLI_ASSOC);

echo $sql1;

foreach($names as $name ) {
  echo htmlspecialchars($name['name']);
}

?>

<?php
// include('config.php');
// $option = $_post['option1'];

// echo $option;

// class Subject {
//   public $subject;

//   function __construct($subject) {
//     $this->$subject = $subject;
//   }

//   function checkOption($option) {
//     if(isset($option)) {
//       $subject = mysqli_real_escape_string($GLOBALS['conn'],$option);

//       $sql = "SELECT * FROM teacher WHERE subject = '$subject'";
//       $result = mysqli_query($GLOBALS['conn'], $sql);
//       $names = mysqli_fetch_all($result,MYSQLI_ASSOC);

//       foreach($names as $name) {
//         echo htmlspecialchars($name['name']);
//       }
//     }

//   }

   

// }
// $subject = new Subject($option);
//  $subject->checkOption($option);

// ?>

<table>
        <thead>
          <tr>
            <th>Name</th>
            <th>From</th>
          </tr>
          
        </thead>
        <?php foreach($teachers as $teacher) { ?>
        <tbody>
              <td><?php echo htmlspecialchars($teacher['name']); ?></td>
              <td><?php echo htmlspecialchars($teacher['location']); ?></td>
              <!-- <td><a href="details.php?<?php echo $teacher['id']?>" class="btn">Get Details</a></td> -->
        </tbody>
        <?php } ?>
      </table>
</div>

<?php include('component/footer.php');?>