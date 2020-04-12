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
<div class="col s12 m6 offset-m3">
<section id="1">
    <ul class="collection with-header z-depth-0">
        <li class="collection-header avatar">
             <div class="row center">
                 <div class="col s3">
                     <i class="small material-icons">perm_identity</i>
                 </div>
                 <div class="col s9">
                     <p class="flow-text"><?php echo htmlspecialchars($teacher['name']);?></p>
                 </div>
             </div>  
        </li>
        <li class="collection-item">
            <div class="row">
                <div class="col s2">
                <i class="small material-icons">location_on</i>                    
                </div>
                <div class="col s10">
                 <?php echo htmlspecialchars($teacher['location']);?> - <?php echo htmlspecialchars($teacher['address']); ?> 
                </div>
            </div>
        </li>
        <li class="collection-item">
          <div class="row">
            <div class="col s2">
               <i class="small material-icons">euro</i>
            </div>
            <div class="col s10">
              <?php echo $teacher['fees'];?>
            </div>
          </div>
         </li>
         <li class="collection-item">
          <div class="row">
            <div class="col s2">
            <i class="small material-icons">menu_book</i>
            </div>
            <div class="col s10">
              <?php echo $teacher['subject'];?> - <?php echo htmlspecialchars($teacher['otherSubjects']); ?>
            </div>
          </div>
         </li>
         <li class="collection-item">
          <div class="row">
            <div class="col s2">
            <i class="small material-icons">phone_iphone</i>
            </div>
            <div class="col s10">
              <a href="tel:<?php echo $teacher['phoneNumber'];?>"><?php echo $teacher['phoneNumber'];?></a>
            </div>
          </div>
         </li>
    </ul>
</section>
</div>
</div>
</div>


<?php include('component/footer.php');?>