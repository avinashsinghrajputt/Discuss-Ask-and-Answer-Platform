<div class="container">
    <h1 class="center mt-2 mb-3">Signup</h1>
<form class="col-6 offset-sm-3" method="post" action="./server/requests.php">
  <div class="mb-3 ">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username"  placeholder="Enter username">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter your Email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password">
  </div>
  <button type="submit" class="btn btn-primary" name="signup">SignUp</button>
</form>
</div>