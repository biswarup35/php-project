<?php require('component/header.php');?>
<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3 l6 offset-l3">
            <div class="card white z-depth-0">
                <div class="card-content">
                    <h6 class="center flow-text">Login</h6>
                    <form class="center" action="user/signin.php" method="post">
                        <div class="input-field s12">
                            <label for="email">Email or Username<span class="red-text">*</span> </label>
                            <input class="validate" name="email" id="email" type="text">
                        </div>
                        <div class="input-field s12">
                            <label for="password">Password<span class="red-text">*</span></label>
                            <input class="validate" name="password" id="password" type="password">
                        </div>
                        <button class="btn blue darken-4" name="submit" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="note center">
                <p>Not have account? please <a href="signup.php">signup</a></p>
            </div>
        </div>
    </div>
</div>
<?php require('component/footer.php');?>