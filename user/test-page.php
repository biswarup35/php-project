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

echo "Clicked";
echo $_POST['phone'];



} else {
  echo "not clicked";
}
?>

<form action="test-page.php" method="post">
<input type="text" name="phone" max="5" autocomplete="on" list="phones">
<datalist id="phones">
<option value="Samsung">
<option value="Xiomi">
<option value="Apple">
<option value="vivo">
<option value="oppo">
</datalist>
<button type="submit" name="submit">click</button>
</form>

<?php require('../component/footer.php');?>