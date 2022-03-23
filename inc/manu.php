<div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/web_logo.png" alt="" width="100" height="100" class="d-inline-block">
      <span style="font-size: 35px;font-weight: bold;font-style: italic;"> www.domain.com </span>
    </a>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Web Application Security</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($page_name == 'index.php'){ echo 'active'; } ?>" href="index.php"> <i class="fa fa-eyedropper"></i> SQL Injection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($page_name == 'login.php') { echo 'active'; } ?>" href="login.php"> <i class="fa fa-sign-in"></i> Sign-in (Validation/Sanitization) </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <i class="fa fa-unlock"></i> Broken Access Control</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-user-secret"></i> Session Hijacking</a>
        </li><li class="nav-item">
          <a class="nav-link" href="#"> <i class="fa fa-window-restore"></i> Cross-site scripting</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
</div>