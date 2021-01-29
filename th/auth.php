<?php
include_once '../th-configs/th-config.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fetch_user = mysqli_query($connection, "SELECT user_id, user_password FROM tads_users WHERE user_email LIKE BINARY '$email'");
    if ($fetch_user->num_rows) {
        $user = mysqli_fetch_array($fetch_user);
        if (password_verify($password, $user['user_password'])) {
            session_start();
            $_SESSION['user-id'] = $user['user_id'];
            header('location: dashboard.php');
        } else {
            echo "
            <script>
                alert('Password looks wrong!')
                window.location.href = 'login.php'
            </script>
            ";
        }
    }else{
        echo "
        <script>
            alert('User not found!')
            window.location.href = 'login.php'
        </script>
        ";
    }
}
if (isset($_POST['register'])){
    if (empty($_POST['name']) || empty($_POST['roll']) || empty($_POST['email']) || empty($_POST['password'])){
        echo json_encode(array('status_code'=>0, 'error_msg'=>'<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are mandatory</p>'));
        exit();
    }
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = mysqli_query($connection, "SELECT user_name, user_email FROM tads_users WHERE user_email='$email' OR user_roll='$roll'");
    if ($check->num_rows){
        echo json_encode(array('status_code'=>0, 'error_msg'=>'<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>User already exist with specified email or roll number.</p>'));
        exit();
    }else{
        $user_id = uniqid('td_');
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $insert = mysqli_query($connection, "
        INSERT INTO tads_users (user_id, user_roll, user_name, user_email, user_password)
        VALUES (
                '$user_id',
                '$roll',
                '$name',
                '$email',
                '$hashed'
        )
        ");
        if ($insert){
            echo json_encode(array('status_code'=>1, 'response_content'=>'<p class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Woohoo! Welcome Aboard. Try Logging in.</p>'));
        }
    }
}