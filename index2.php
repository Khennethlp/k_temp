<?php 
require 'db/conn.php';
include 'includes/header.php'; 

$redirect = 'pages/admin/index.php';
?>

<!-- <div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="login-form">
        <h2 class="text-center mb-4">Login</h2>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Username" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <a href="login_v2.php" class="btn btn-block">Login V2</a>
        <a href="reg_v2.php" class="btn btn-block">Reg V2</a>
        <a href="register.php" class="btn btn-block"><u> Create new account </u></a>
      </form>
    </div>
  </div>
</div> -->
<div class="">
	<div class="container d-flex justify-content-center">
   
		<div class="row">
			<div class="card">
				<div class="card-header">
					<strong>Login</strong>
				</div>
				<div class="card-body">
					<form action="process/login_process.php" method="POST" name="login" id="login">
						<div class="row">
							<div class="col">
								<span class="profile-img">
									<i class='fas fa-user-circle' style='font-size:100px'></i>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col">
                <?php
                // session_start();
                  // if(isset($_SESSION['msg']) && isset($_SESSION['status'])){
                  //   $status = $_SESSION['status'];
                  //   $msg = $_SESSION['msg'];
                  // }

                  if(isset($_SESSION['status']) == 'success'){
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            '.$_SESSION['msg'].'
                          </div>';
                } elseif (isset($_SESSION['status']) == 'error'){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            '.$_SESSION['msg'].'
                          </div>';
                }
                ?>
               
								<hr> <!-- other content  -->
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class='fas fa-user'></i>
											</span>
										</div>
										<input class="form-control" placeholder="Username" id="loginUsername" name="loginUsername" type="text" autofocus>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class='fas fa-user-secret'></i>
											</span>
										</div>
										<input class="form-control" placeholder="Password" id="loginPassword" name="loginPassword" type="password">
									</div>
								</div>
								<div class="form-group">
									<input type="button" class="btn btn-sm btn-success btn-block submit" name="submit_btn" id="login_m"  value="Sign in" >
								</div>
							</div>
						</div>
					<!-- <a href="#" onClick="">I forgot my password!</a> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'includes/footer.php'; ?>