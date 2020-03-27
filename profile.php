<?php
require('component/header.php');
if (isset($_SESSION['userName'])) {
    echo "you are logged in!";
} else {
    header('Location: home.php');
}
?>

<div class="container">
     <div class="row">
         <div class="col s12">
             <ul class="collection">
                 <li class="collection-item">Name : Rajan</li>
                 <li class="collection-item">Contact : 1234567890</li>
                 <li class="collection-item">Address : abcd xyz</li>

             </ul>
         </div>
         </div>
        </div>

        <a href="#test" class="btn indigo modal-trigger">Prees it</a>
        <div class="modal" id="test">
            <h1>hello</h1>
        </div>
<?php require('component/footer.php'); ?>
