<?php
session_start();
define("BASE_URL", "/rental/");
include("../connection.php");

$login_error = "";

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username'] ?? "");
  $pass = mysqli_real_escape_string($conn, $_POST['password'] ?? "");

  $select = "SELECT username, password, level FROM account WHERE username='$username' AND password='$pass'";
  $answer = mysqli_query($conn, $select);
  $row = mysqli_fetch_array($answer);

  if ($row) {
    $_SESSION['id'] = $username;
    if ($row['level'] == "1") {
      header("Location: " . BASE_URL . "dashboard/dashboard.php");
      exit;
    }
    if ($row['level'] == "2") {
      header("Location: " . BASE_URL . "tenant/tenant-details.php");
      exit;
    }
  }

  $login_error = "Invalid username or password.";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/css/all.min.css"/>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css">
    
    <style>
      body{
        background-color:#f9f9f9;
      }
        .btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}


.profile-image-pic{
  height: 100x;
  width: 100px;
  object-fit: cover;
  position:absolute !important;
  margin-top:-170px !important;
  margin-left:-50px !important;
}



.cardbody-color{
  background-color: #64a7ad   ;
  height:450px !important;

}

a{
  text-decoration: none;
}
.card_{
  margin:auto;
  width:400px;
  /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
  transition:none;
  transform:none;
  margin-top:130px !important;
  
  
}
.btn-color{
  /* background:linear-gradient(to left,#EB8921,yellow); */
  border-radius:5px;
  border:#EB8921;
  height:30px;
}
.btn- :hover{
  background-color:none;
  color:white;
  
}
.image-fluid{
 margin-top:0;
}
form i {
    margin-left: -30px;
    cursor: pointer;
}
.button.btn :hover{
background-color:#EB8921;
}
.mb-3 input[type=text],
.mb-3 input[type=password]
{
  width:95%;
  margin:auto;
}
.button{
  width:95%;
  margin:auto;
}
.forgot-username-text{
  color:white;
  text-align:center;
}
.logo{
  width:100px;
  height:100px;
  margin-bottom:20px;
}
.form-fields{
  margin-top:100px !important;
}
.form-control{
  width:300px !important;
}
    </style>
</head>
<body>
        <div class="card_ ">

          <form class="card-body cardbody-color p-lg-5" name="form" action="index.php" method="POST">

            <div class="text-center">
              <img src="/rental/img/logo3.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle logo"
               alt="profile">
            </div>
             <div class="form-fields">
            <div class="mb-3 mt-3" >
            

                <select class="form-select form-control" aria-label="Default select example" name="username" id="username">
  <option selected disabled>Username</option>
  <option value="Admin">Property Owner</option>
  <option value="Tenant">Tenant</option>

</select>
            </div>
            <div class="mb-3">
              <input type="password" name="password"  class="form-control" id="password" placeholder="Password" required/>
             
            </div>
            <div class="text-center button">
        <button type="submit" name="login" class="btn-color px-4 mb-5 w-100" style="margin-bottom:20px">
         <span style="padding-left:50px;padding-top:20px;font-size:15px;margin-lef:20px">Login</button>
      </div>
</div>
      <hr style="color:white">
      <div class="forgot-username-text">Forgot Username or Password? </div>
        <div class="forgot-username-text">Kindly Contact Administrator</div>
      </form>
     
        </div>
        <div style="width:400px;margin:auto;font-weight:bold;font-size:20px;color:blue">
        <?php if ($login_error !== ""): ?>
          <p class="text-danger text-center mb-0"><?php echo htmlspecialchars($login_error); ?></p>
        <?php endif; ?>
        </div>
    
 
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("fa-eye");
        });

    
       
    </script>
</body>
</html>