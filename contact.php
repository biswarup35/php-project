<?php include('component/header.php');?>
<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3 l6 offset-l3">
            <div class="card white z-depth-0">
                <div class="card-content">
                    <h6 class="center flow-text">Contact us</h6>
                    <form class="center" action="" method="post">
                        <div class="input-field s12">
                            <label for="userName">Full Name<span class="red-text">*</span> </label>
                            <input class="validate" name="userName" id="userName" type="text">
                        </div>
                        <div class="input-field s12">
                            <label for="email">Email address<span class="red-text">*</span> </label>
                            <input class="validate" name="email" id="email" type="email">
                        </div>
                        <div class="input-field s12">
                         <textarea id="icon_prefix2" type="textarea" class="materialize-textarea" data-length="120"></textarea>
                         <label for="icon_prefix2">Your message</label>
                        </div>
                        <button class="btn blue darken-4" name="submit" type="submit">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
<?php include('component/footer.php') ?>