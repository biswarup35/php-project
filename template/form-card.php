<div class="row">
        <div class="col s12">
            <div class="card grey lighten-3">
                <div class="card-content">
                    <h6 class="center flow-text">Find Your Teacher</h6>


                    <form action="teachers.php" method="post">
                    <div class="input-field s12">
                              <select class="location" name="location">
                                  <option value="" disabled selected>Service available at</option>
                                  <option value="Raghunathpur">Raghunathpur</option>
                                  <option value="Asansol">Asansol</option>
                                  <option value="Purulia">Purulia</option>
                              </select>
                     <label>Select Location</label>
                    </div>
                    <div class="input-field s12">
                              <select class="subject" name="subject">
                                  <option value="" disabled selected>Chose a subject</option>
                                  <option value="Arts">Arts</option>
                                  <option value="Science">Science</option>
                                  <option value="Computer Science">Computer Science</option>
                              </select>
                     <label>Subject</label>
                    </div>
                    <input class="btn blue darken-4" type="submit" value="Submit">
                    <!-- <button class="btn waves-effect waves-light" type="submit" value="Submit">Submit</button> -->

                    </form>

                </div>
            </div>
        </div>
    </div>