

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Sign in to iFORUM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        
      <form action="/forum/assest/_handlelogin.php" method="post">
      <div class="modal-body">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="loginEmail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Enter your email address</div>
            </div>
            <div class="mb-3">
                <label for="loginPass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="loginPass">
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
        
        </div>
      </form>
    </div>
  </div>
</div>