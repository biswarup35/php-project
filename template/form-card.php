<?php
include('config.php');
$sql = "SELECT location,stream FROM teacherdetails";
$result = mysqli_query($conn,$sql);
$datas = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card white z-depth-0">
                   <div class="card-content">
                    <h6 class="center flow-text">Find Your Teacher</h6>
                    <form action="teachers.php" method="post">
                       <div class="input-field s12">
                          <label for="location">Location</label>
                         <input type="text" id="location" class="validate" name="location" list="locations" placeholder="Enter location i.e Raghunathpur">
                         <datalist id="locations">
                         <?php foreach($datas as $data) {?>
                            <option value="<?php echo $data['location']?>">
                         <?php }?>
                        </datalist>
                      </div>
                      <div class="input-field s12">
                         <label for="subject">Subject</label>
                         <input type="text" name="subject" id="subject" class="validate" placeholder="Enter subject stream i.e Arts" list="subjects">
                         <datalist id="subjects">
                          <?php foreach($datas as $data) {?>
                            <option value="<?php echo $data['stream']?>">
                         <?php }?>
                         </datalist>
                      </div>
                    <input class="btn blue darken-4" name="submit" type="submit" value="Submit">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>