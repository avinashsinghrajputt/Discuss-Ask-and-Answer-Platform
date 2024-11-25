<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container  mx-5 d-flex gap-5 align-items-center">
    <a href="./"><img src="./public/logo.png" alt="logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex align-items-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active h5" aria-current="page" href="/discuss/?c-id=all">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" href="?latest=true">Latest Questions</a>
        </li>

        <!-- If user is logged in, show logout button -->
        <?php
        if(isset($_SESSION['user']['username'])){ ?>
        <li class="nav-item">
          <a class="nav-link h5" href="?ask=true" tabindex="-1" aria-disabled="true">Ask a Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" href="?u-id=<?php echo $_SESSION['user']['user_id']?>" >My Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" href="./server/requests.php?logout=true" tabindex="-1" aria-disabled="true">Logout(<?php echo ucfirst($_SESSION['user']['username']) ?>)</a>
        </li>
        <?php } ?>

        <!-- If user is not logged in, show login button -->
        <?php
        if(!isset($_SESSION['user']['username'])){ ?>
        <li class="nav-item">
          <a class="nav-link h5" href="?login=true" tabindex="-1" aria-disabled="true">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" href="?signup=true" tabindex="-1" aria-disabled="true">SignUp</a>
        </li>
        <?php } ?>
      </ul>
    </div>
    <form class="d-flex" action="" role="search">
        <input class="form-control me-2" name="search" type="search" placeholder="Search Questions">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</nav>