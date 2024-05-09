<?php include '../includes/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="registration-form">
        <h2 class="text-center mb-4">Register</h2>
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your full name" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="email">Username</label>
          <input type="email" class="form-control" id="Username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
     
        <button type="submit" class="btn btn-primary btn-block">Register</button>
        <button type="button" onclick="history.back();" class="btn btn-block">Back</button>
      </form>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>