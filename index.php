<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body style="background:url('doc/homeback.jpg')">
    <div id="login">
        <h3 class="text-center text-white pt-5"><img src="doc/logo.jpg" class="rounded" /></h3>
        <div class="container" >
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Childline Login Form</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <!--<label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span>
								</label><br>-->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <!--<div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>-->
                        </form>
						<?php if(isset($_POST['submit'])){
							   require('config.php');
							   $sql = mysqli_query($conn,"select * from admin where username='".$_POST['username']."' and password='".$_POST['password']."'");
							   $fetchdata = mysqli_fetch_assoc($sql);
							   if($fetchdata['id'] !=''){
							   session_start();
							   $_SESSION['username']= $fetchdata['username'];
							   $_SESSION['password']= $fetchdata['password'];
							   $_SESSION['user_id'] = $fetchdata['id'];
							   if($_SESSION['user_id'] !=''){
								   header('location:home.php');
							   }
							   }
								
                                								
						} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
