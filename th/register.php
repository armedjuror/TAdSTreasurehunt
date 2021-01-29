<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TAdS | Technology Adventure Society - IIT Kharagpur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="auth.php" method="post" id="tads-registration-form">
					<span class="login100-form-title p-b-43">
						Start hiking with TAdS
					</span>

                <div id="alert-box">

                </div>
                <input type="text" name="register" value="register" hidden>
                <div class="wrap-input100 validate-input" data-validate = "Your Name is required">
                    <input class="input100" type="text" name="name">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Name</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Your Roll Number is required">
                    <input class="input100" type="text" name="roll">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Roll Number</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" id="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                       <input class="input-checkbox100" id="show_password" type="checkbox" name="show_password">
                       <label class="label-checkbox100" for="show_password">
                           Show Password
                       </label>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" name="register" type="submit" value="Sign Up">
                </div>

                <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or Log in using
						</span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="login.php" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg-danger m-r-5">
                        <i class="fa fa-google" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

<script>
    const password = document.getElementById('password')
    const show_password = document.getElementById('show_password')
    show_password.addEventListener('click', ()=>{
        let type = password.type
        if (type === 'password'){
            password.type = 'text'
        }else {
            password.type = 'password'
        }
    })

    $('#tads-registration-form').submit(function (e) {
        e.preventDefault()
        let new_user = new XMLHttpRequest()
        let url = "auth.php"
        let varList = $('#tads-registration-form').serialize()
        console.log(varList)
        new_user.open('POST', url, true)
        new_user.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        new_user.onreadystatechange = function () {
            if (new_user.readyState === 4 && new_user.status === 200) {
                console.log(new_user.responseText)
                let response_content = JSON.parse(new_user.responseText);
                if (response_content['status_code']===1){
                    document.getElementById('alert-box').innerHTML = response_content['response_content']
                    setTimeout(()=>{
                        window.location.href = 'login.php'
                    }, 4000)
                }else{
                    document.getElementById('alert-box').innerHTML = response_content['error_msg']
                }

            }
        }
        new_user.send(varList)
    });
</script>

</body>
</html>

