<?php 
// require('../component/header.php');
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/project/component/header.php';
echo $path;
include($path);

?>
<?php
if (isset($_POST['submit'])) {
  include('../config.php');

  $str = explode(",",$_POST['name']);
  $str2 = preg_replace('/\s*,\s*/', ',', implode(",",$str));

$sql = "INSERT INTO test(subjects) VALUES ('$str2')";
mysqli_query($conn,$sql);





} else {
  echo "not clicked";
}
?>

<div class="container">
<div class="col s12 m6 offset-m3">
<form action="test-page.php" method="post">
  <input type="text" name="name" id="name">
  <label for="name">Enter Name</label>

<button type="submit" name="submit">click</button>
</form>
</div>
</div>

<?php require('../component/footer.php');?>