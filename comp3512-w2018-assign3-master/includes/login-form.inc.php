 <main class="container">
        <form method="post" action="check-login.php" role="login">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-login">
                        <h3 class="navbar-brand"><span class="glyphicon glyphicon-leaf"></span>  Welcome back.</h3>
                        <input id="email" type="email" name="email" value="<?php echo "$email"; ?>" placeholder="Email" required class="form-control input-lg" />
                        </br>
                        <input id="passw" type="password" name="pass" class="form-control input-lg" id="password" placeholder="Password" required="" />
                        </br>
                        <div class="wrapper">
                            <span class="group-btn">     
                            <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function(){
                $("#email").click(function(){
                    $("#banner").fadeOut(750)
                });
                $("#passw").click(function(){
                    $("#banner").fadeOut(750)
                });
            });
        </script>
    </main>