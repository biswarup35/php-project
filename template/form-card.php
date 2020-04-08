<div class="row">
        <div class="col s12">
            <div class="card grey lighten-3">
                   <div class="card-content">
                    <h6 class="center flow-text">Find Your Teacher</h6>


                    <form action="teachers.php" method="post">
                    <div class="input-field s12">
                     <input type="text" name="location" list="locations" placeholder="Enter location i.e Raghunathpur">
                     <datalist id="locations">
                         <option value="Raghunathpur">
                         <option value="Asansol">
                         <option value="Purulia">
                     </datalist>
                    </div>
                    <div class="input-field s12">
                    <input type="text" name="subject" placeholder="Enter subject stream i.e Arts" list="subjects">
                     <datalist id="subjects">
                         <option value="Arts">
                         <option value="Science">
                         <option value="Computer science"> 
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