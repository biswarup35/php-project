<?php require('component/header.php');?>
<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3 l6 offset-l3">
            <div class="card grey lighten-3">
                <div class="card-content">
                    <h6 class="center flow-text">Sign up</h6>
                    <form class="center" action="user/signup.php" method="post">
                        <div class="input-field s12">
                            <label for="userName">User Name<span class="red-text">*</span> </label>
                            <input class="validate" name="userName" id="userName" type="text">
                        </div>
                        <div class="input-field s12">
                            <label for="email">Email address<span class="red-text">*</span> </label>
                            <input class="validate" name="email" id="email" type="email">
                        </div>
                        <div class="input-field s12">
                            <label for="password">Password<span class="red-text">*</span></label>
                            <input class="validate" name="password" id="password" type="password">
                        </div>
                        <div class="input-field s12">
                            <label for="password-rep"> Retype password<span class="red-text">*</span> </label>
                            <input class="validate" name="password-rep" id="password-rep" type="password">
                        </div>
                        <button class="btn blue darken-4" name="submit" type="submit">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require('component/footer.php');?>