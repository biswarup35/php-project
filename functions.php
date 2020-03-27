<?php
    include('config.php');
    $sql = 'SELECT name,location FROM teachers';
    $result = mysqli_query($conn, $sql);
    $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

    



            

    


























?>