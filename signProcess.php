<!--here this php code used for checking credentials, correct password and username, if it is correct then redirect to a page-->

<?php
    session_start();
    include 'config.php';

    //Array to store validation errors
    $errmsg_arr = array();

    //Validation error flag
    $errflag = false;

    
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str)
    {
        $str = @trim($str);
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }
    
    
    //Sanitize the POST values
    $username = clean($_POST['userName']);
    $password = clean($_POST['pasword']);
    
    
    
    // Select the password from the cookie

    $time = time();
    $check = $_POST['remember']; 
    

    $sql ="SELECT * FROM users WHERE usename='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        if(mysqli_num_rows($result) > 0) 
        {
            //Login Successful
            session_regenerate_id();
            $member = mysqli_fetch_assoc($result);
            $_SESSION['SESS_USER_ID'] = $member['user_id'];
            $_SESSION['SESS_FIRST_NAME'] = $member['usename'];
            $_SESSION['SESS_LAST_NAME'] = $member['password'];

            if($check)
            {
                // Check to see if the 'setcookie' box was ticked to remember the user
                setcookie("avneshCookUser", $_POST['userName'], $time + 3600); // Sets the cookie username
                setcookie("avneshCookPass", $_POST['pasword'], $time + 3600); // Sets the cookie password
            }


            //session_write_close();
            header("location: dash.php");
            exit();
        }
        else 
        {
            //Login failed
            $errmsg = 'user name and password not found';
            header("location: index.php?msz=$errmsg");
            exit();
        }
    }
    else
    {
        die('Error: '.mysqli_error($result));
    }
?>
