<!--here this php code used for sending mail if user register-->

<?php
    require_once "Mail.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
   
    $gen = $_POST['optionsRadios'];
    $username = $_POST['userName'];
    $pass = $_POST['pasword'];

    include 'config.php';
    $confirmCode = md5(uniqid(rand()));

    $sql ="INSERT INTO verifyMail (confirm_code, user_name, email, gender, password, usename) VALUES('$confirmCode', '$name','$email','$gen','$pass','$username')";

    if (!mysqli_query($con, $sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo 'Information is sucsessfully updated....';


    

    $from = '<bloggshakya@gmail.com>';
    $to = "<$email>";
    $subject = 'Welcome Message';
    $body = "Hi $name, welcome in my dashboardAngular sites....\r\n";
    $body .= "Click on this link to activate your account \r\n";
    $body .= "http://10.132.161.1/dashboardAngular/confirmation.php?passkey=$confirmCode";

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );

    $smtp = Mail::factory('smtp', array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => '465',
            'auth' => true,
            'username' => 'ajay36423@gmail.com',
            'password' => 'ajaykumar1234'
        ));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {
        echo('<p>database has updated..</p>');
    }

    $mszForVer = "please Now check your email for verifying email address";
    header("location: index.php?msz=$mszForVer");
    mysqli_close($con);
?>



