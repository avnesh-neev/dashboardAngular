<!--This page is contained Registration and Login form, After login, user can use dashboard here. -->

<!-- here this php code for check user is already login or not, means he didn't log out then he should be login-->

<?php

session_start();
include 'config.php';

if (isset($_SESSION['SESS_FIRST_NAME']) && isset($_SESSION['SESS_LAST_NAME'])) 
{
    $username = $_SESSION['SESS_FIRST_NAME'];
    $password = $_SESSION['SESS_LAST_NAME'];
    $query = "SELECT * FROM users WHERE usename = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0)
    {
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_USER_ID'] = $member['user_id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['usename'];
        $_SESSION['SESS_LAST_NAME'] = $member['password'];

        // Set the session 'loggedin' to 1 and forward the user to the admin page
        header('Location: dash.php');
        exit();
    }
}
?>

<!-- here this php code for check stored cookie for remember me-->
<?php

session_start();
include 'config.php';
if (isset($_COOKIE['avneshCookUser']) && isset($_COOKIE['avneshCookPass']))
{
    $username = $_COOKIE['avneshCookUser'];
    // Select the username from the cookie

    $password = $_COOKIE['avneshCookPass'];
    // Select the password from the cookie
}
?>

<?php $mszz = $_GET['msz']; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html data-ng-app="demoApp">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/dashboardAngular/assets/ico/favicon.png">
        <link href="/dashboardAngular/dist/css/sticky-footer-navbar.css" rel="stylesheet">
        <link href="/dashboardAngular/dist/css/bootstrap.css" rel="stylesheet">
        <link href="/dashboardAngular/eternicode-bootstrap/css/datepicker.css" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script type="text/javascript" src="/dashboardAngular/scripts/customScripts/validations.js"></script>
        <link type="text/css" href="/dashboardAngular/customCss/main.css" rel="stylesheet">
        <title>Avnesh-dashboardAngular</title>
    </head>
    
    <body>
        <div id="wrap">
            <!-- Fixed navbar -->
            <div class="navbar navbar-default navbar-fixed-top" style="background-color:#444444">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Neev Tech</a>
                    </div>
                    <div class="collapse navbar-collapse" data-ng-controller="SimpleController">
                        <ul class="nav navbar-nav">
                            <li class="active" ng-class="{ active: isActive('/')}"><a href="#">Log Management</a></li>
                            <li ng-class="{ active: isActive('/about.php')}"><a href="#about">About</a></li>
                            <li ng-class="{ active: isActive('/contact.php')}"><a href="#contact">Contact</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
            
            <div class="navbar navbar-default" style="background-color:#E6E4D1; height: 80px;">
                <div class="row">
                </div>
            </div>
<!--            here all different views will be added with different code-->
            <div class="container" style="margin-top:-40px;" data-ng-view="">
            </div>
        </div>
        
      
        <div id="footer">
            <div class="container">
                <p class="text-muted credit">Example courtesy <a href="http://www.neevtech.com/">Avnesh Shakya</a> and <a href="http://www.neevtech.com/">Vinu Vincent</a>.</p>
            </div>
        </div>
        
        <script type="text/javascript" src="/dashboardAngular/angular.min.js"></script>
        <script type="text/javascript" src="/dashboardAngular/scripts/app.js"></script>
        <script type="text/javascript" src="/dashboardAngular/scripts/controllers/simpleCntrl.js"></script>
        <script type="text/javascript" src="/dashboardAngular/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/dashboardAngular/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/dashboardAngular/assets/js/holder.js"></script>
    </body>
</html>
