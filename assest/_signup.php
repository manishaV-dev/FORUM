

<!-- Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalLabel">Create a new account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <form class="row g-3" action="/forum/assest/_handleSignup.php" method="post">
    <div class="col-md-6">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="cname" name="cname">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-6">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="pass">
  </div>

  <div class="col-md-6">
    <label for="cpass" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpass" name="cpass">
  </div>
  
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
  </div>
 
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember Me
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign up</button>
  </div>
</form>
      </div>
    </div>
  </div>
</div>