<?php
session_start();

if(isset($_POST['submit'])) {
    include 'connection.php';
    
    $UserName = $_POST["email"];
    $pass = $_POST["password"];
    $user = $_POST["user_type"];

    switch ($user) {
        case 'admin':
            $sql = "SELECT * FROM admin WHERE email=? AND password=?";
            break;
        case 'staff':
            $sql = "SELECT * FROM staff WHERE email=? AND password=?";
            break;
        case 'customer':
            $sql = "SELECT * FROM customer WHERE email=? AND password=?";
            break;
        default:
            $sql = "";
            break;
    }

    if($sql != "") {
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $UserName, $pass);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['email'] = $row['email'];

                switch ($user) {
                    case 'admin':
                        header("location: admin.html");
                        exit;
                    case 'staff':
                        header("location: staff.html");
                        exit;
                    case 'customer':
                        header("location: customer.html");
                        exit;
                    default:
                        header("location: login.php");
                        exit;
                }
            } else {
                echo '<script>alert("Your email and password is incorrect")</script>'; 
              
            }
        }
    } else {
        echo '<script>alert("Your email and password is incorrect")</script>'; 
      
    }
}
?>

