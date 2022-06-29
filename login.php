<?php include_once "./partials/header.php"; ?>

<?php 

  include "conn.php";
  include "core.php";

  error_reporting(0);
  
  session_start();

  if (isset($_SESSION['username'])) {
    header("Location: {$home_url}admin/dashboard/index.php");
  }

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];
        header("Location: {$home_url}admin/dashboard/index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
  }

?>

  <div class="container-login text-center">

    <main class="form-signin w-100 m-auto">
      <form action="" method="POST">
        <h1 class="h3 mb-3 fw-normal title-login">SISTEM PERPUSTAKAAN</h1>
          <h1 class="h3 mb-3 fw-normal">Login</h1>

          <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-login" name="submit">Login</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2022–2022</p>
      </form>
    </main>

  </div>

<?php include_once "./partials/footer.php"; ?>
