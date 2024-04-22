

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920, initial-scale=1.0">
    <title>Westprime Horizon Institute Schedule Plotting System</title>
</head>
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/chart.js/chart.js">
<link rel="stylesheet" href="assets/css/style.css">

<body>
    <div class="container">

        <div class="form-group login_form">
            <img src="./assets/img/school_logo_sample.png" alt="" srcset="" height="100px">
            <h3>West Prime Horizon Institute</h3>
            <hr>
            <h5>Schedule Plotting System</h5>
            <h3>Log in</h3>
            <label for="username">Username</label>
            <input type="text" class="form-control bg-dark text-white" name="username" id="username"  placeholder="Enter your username here...">
            <label for="password">Password</label>
            <input type="password" class="form-control bg-dark text-white" name="password" id="password"  placeholder="Enter your password here...">
            <button id="btn_login">Log in</button>
            <a href="password_reset">Forgot Password</a>
            <center>OR</center>
            <button id="btn_signup">Sign up</button>
        </div>
    </div>
</body>
<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/jasonday-printThis-23be1f8/printThis.js"></script>
<script>
    $(document).ready(()=>{
        $("#btn_login").click(()=>{
            var username = $("#username").val();
            var password = $("#password").val();
            $.post("ajax.php",{action:"login",username:username,password:password},(data)=>{
                var login_response =JSON.parse(data);
                if (login_response.username != undefined) {
                    alert("Logged in!");
                    window.location = "admin/index.php";
                }
                else{
                    alert("Login Failed. Incorrect username and password.");
                }
            });
        });
    });
</script>
</html>