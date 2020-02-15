<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bizou User Portal</title>
    <link rel="stylesheet" href="style\login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
<div id="errorBar">
    <a href="javascript:void(0)" class="closebtn" onclick="close()">&times;</a>
    <p>Error: Username or Password incorrect</p>
</div>

    <div class="logo">
        <a href="/index.php"><img src="logo2.png" alt="logo"></a>
    </div>
  <div class="overlayLogging" id="myNav">
      <div class="overlay-content">
      <div class="container" id="container">
          <div class="form-container sign-up-container">
              <form action="#">
                  <h1>Create Account</h1>
                  <div class="social-container">
                      <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                      <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                  </div>
                  <span>or use your email for registration</span>
                  <input type="text" placeholder="Name" required oninvalid="this.setCustomValidity('Might need to enter your name')" oninput="this.setCustomValidity('')">
                  <input type="email" placeholder="Email" required oninvalid="this.setCustomValidity('And your email as well')" oninput="this.setCustomValidity('')">
                  <input type="password" placeholder="Password" required oninvalid="this.setCustomValidity('Maybe a password too')" oninput="this.setCustomValidity('')">
                  <button>Sign Up</button>
              </form>
          </div>
          <div class="form-container sign-in-container">
              <form method="post" action="#">
                  <h1>Sign in</h1>
                  <div class="social-container">
                      <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                      <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                  </div>
                  <span>or use your account</span>
                  <input type="text" name="username_log" placeholder="username" required oninvalid="this.setCustomValidity('Hey!, You forgot something here')" oninput="this.setCustomValidity('')">
                  <input type="password" name="password_log" placeholder="password" required oninvalid="this.setCustomValidity('Forgot something here too')" oninput="this.setCustomValidity('')">
                  <a href="#">Oups, I forgot my password</a>
                  <input type="submit" name="submit_log">Sign In</input>
              </form>
          </div>
          <div class="overlay-container">
              <div class="overlay">
                  <div class="overlay-panel overlay-left">
                      <h1>Welcome Back!</h1>
                      <p>We might already have you with us, let's check!</p>
                      <button class="ghost" id="signIn">Sign In</button>
                  </div>
                  <div class="overlay-panel overlay-right">
                      <h1>Hey there!</h1>
                      <p>Want to join us? Go ahead. its FREE</p>
                      <button class="ghost" id="signUp">Sign Up</button>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <script src="JS\logSwitch.js"></script>

    



      <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "log";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection Failed: ".mysqli_connect_error);
        }

        if(isset($_POST['submit_log'])){
            $usern = $_POST['username_log'];
            $passw = $_POST['password_log'];
            
            $sql = mysqli_query($conn, "SELECT count(*) as total from details where username = '".$usern."' and password = '".$passw."' ")
            or die(mysqli_error($conn));

            $row = mysqli_fetch_array($sql);
            

            if ($row['total'] > 0){
                
                // echo "<script>alert('Welcome Back!')</script>";
                // echo "<script>window.location.href = 'https://www.google.com'</script>";
                
                header("Location: index.php");
                exit;


            } else {
                echo "<script>alert('Username or password incorrect')</script>";
                echo "<script>document.getElementById('errorBar').style.top = '0'</script>";
            }

        }

        // if(isset($_POST['username'])){
        //     $usern = $_POST['username'];
        //     $passw = $_POST['password'];

        //     $sql = "select * from form where username='".$usern."' AND userpass= '".$passw."' limit 1";

        //     $result = mysqli_query($conn, $sql);

        //     if(mysql_num_rows($result) !== 0){
        //         echo "Success";
        //         exit();
        //     }else{
        //         echo "Failed";
        //         exit();
        //     }
        // }
      
      ?>
    

</body>
</html>