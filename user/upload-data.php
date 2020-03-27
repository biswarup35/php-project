<?php include('component/header.php');?>

<?php
include('config.php');
$name = mysqli_real_escape_string($conn, $_POST['name']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$otherSubjects = mysqli_real_escape_string($conn, $_POST['otherSubjects']);
$fees = mysqli_real_escape_string($conn, $_POST['fees']);

$sql = "INSERT INTO teacher (name,location,address,phoneNumber,subject,otherSubjects,fees) VALUES ('$name', '$location','$address','$phoneNumber','$subject','$otherSubjects','$fees')";

echo $sql;

$insert = mysqli_query($conn, $sql);

if($insert == true) {
    echo "values inserted";
} else {
    echo "values are not inserted";
}



?>


<div class="container">
    <form action="upload-data.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="location">Location:</label>
        <input type="text" name="location" id="location">

        <label for="address">Address:</label>
        <input type="text" name="address" id="address">

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" id="phoneNumber">

        <label for="subject">Subject Stream:</label>
        <input type="text" name="subject" id="subject">

        <label for="otherSubjects">Also Teach:</label>
        <input type="text" name="otherSubjects" id="otherSubjects">


        <label for="fees">Fees</label>
        <input type="number" name="fees" id="fees">

        <input type="submit" value="submit">
    </form>
</div>




<?php include('component/footer.php');?>