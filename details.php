<?php include('component/header.php');?>
<?php
include('config.php');
$setId = $_GET['id'];
if(!empty($setId)) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // make sql query SELECT * FROM teacher WHERE id = '$id';
    $sql = "SELECT * FROM teacher WHERE id = '$id'";
    // get query result 
    $result = mysqli_query($conn, $sql);
    // fetch the result in array format of a single row;
    // check the number of row if its returns 0 then print error message
    $numOfRow = mysqli_num_rows($result);
    if ($numOfRow > 0) {
        $teacher = mysqli_fetch_assoc($result);
        mysqli_close($conn);
    } else {
        header("Location: details.php?error=norecordsfound");
    }  
} else {
    header('Location: home.php');
}
?>
<div class="container">
<div class="row">
<div class="col s12">
<div class="card center z-depth-0 grey lighten-3">

<section id="1">
    <div class="row">
        <div class="col s12">
        <i class="medium  material-icons">perm_identity</i>
             <p> Name : <?php echo htmlspecialchars($teacher['name']); ?>  </p>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
        <i class="medium material-icons">map</i>
             <p> Address : <?php echo htmlspecialchars($teacher['location']); ?>
             <br/>
             <p><?php echo htmlspecialchars($teacher['address']); ?></p>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
        <i class="medium material-icons">phone_iphone</i>
            <p>Contact Number: +91 <?php echo htmlspecialchars($teacher['phoneNumber']); ?></p>
        </div>
        <div class="col s12 m6">
        <i class="medium material-icons">euro</i>
             <p> Fees : <?php echo htmlspecialchars($teacher['fees']); ?> / month </p>
        </div>
    </div>
    <div class="row">
            <div class="col s12">
            <i class="medium material-icons">menu_book</i>
                <p>Also teach: <?php echo htmlspecialchars($teacher['otherSubjects']); ?></p>
            </div>
        </div>
</section>

</div>
</div>
</div>
</div>


<?php include('component/footer.php');?>