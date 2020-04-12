<?php
include('config.php');
$sql = "SELECT location,stream FROM teacherdetails";
$result = mysqli_query($conn,$sql);
$datas = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<div class="row">
        <div class="col s12">
            <div class="card grey lighten-3">
                   <div class="card-content">
                    <h6 class="center flow-text">Find Your Teacher</h6>
                    <form action="teachers.php" method="post">
                    <div class="input-field s12">
                     <input type="text" name="location" list="locations" placeholder="Enter location i.e Raghunathpur">
                     <datalist id="locations">
                         <?php foreach($datas as $data) {?>
                            <option value="<?php echo $data['location']?>">
                         <?php }?>
                     </datalist>
                    </div>
                    <div class="input-field s12">
                    <input type="text" name="subject" placeholder="Enter subject stream i.e Arts" list="subjects">
                     <datalist id="subjects">
                        <?php foreach($datas as $data) {?>
                            <option value="<?php echo $data['stream']?>">
                         <?php }?>
                     </datalist>
                    </div>
                    <input class="btn blue darken-4" type="submit" value="Submit">
                    </div>
                    
                    <!-- <button class="btn waves-effect waves-light" type="submit" value="Submit">Submit</button> -->

                    </form>
                </div>
            </div>
        </div>
    </div>