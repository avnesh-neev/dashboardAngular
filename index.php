<!--This page is contained Registration and Login form, After login, user can use dashboard here. -->

<!-- here this php code for check user is already login or not, means he didn't log out then he should be login-->
<?php
session_start();
include 'config.php';
if(isset($_SESSION['SESS_FIRST_NAME']) && isset($_SESSION['SESS_LAST_NAME']))
{
    
    $username = $_SESSION['SESS_FIRST_NAME'];
    $password = $_SESSION['SESS_LAST_NAME'];
    $query = "SELECT * FROM users WHERE usename = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
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
if(isset($_COOKIE['avneshCookUser']) && isset($_COOKIE['avneshCookPass']))
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
        
        <title>Avnesh-dashboardAngular</title>
        <link href="/dashboardAngular/dist/css/bootstrap.css" rel="stylesheet">
        <link href="/dashboardAngular/eternicode-bootstrap/css/datepicker.css" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        
       
        // Javascript code for validation
        
        <script type="text/javascript">
            function validateForm()
            {
              var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
              var email = document.getElementById('email');
              if( document.myForm.name.value == "" )
              {
                alert( "Please Enter your name!");
                document.myForm.name.focus();
                return false;
              }
              if(/^([a­zA­Z ])+$/.test(document.myForm.name.value))
              {
                alert('Name should be alphanumeric');
                document.myForm.name.focus();
                return false;
              }
              if((document.myForm.name.value).length>20)
              {
                alert("Name should be <=20 character");
                return false;
              }
              if( document.myForm.dob.value == "" )
              {
                alert( "Please Enter your D.O.B.!");
                document.myForm.dob.focus();
                return false;
              }
              if (!filter.test(email.value))
              {
                alert('Please provide a valid email address');
                email.focus;
                return false;
              }
              
              if( document.myForm.userName.value == "" )
              {
                alert( "Please enter your User Name!");
                document.myForm.userName.focus();
                return false;
              }
              if(/^([a­zA­Z0­9])+$/.test(document.myForm.userName.value))
              {
                alert('User Name should be alphanumeric');
                document.myForm.userName.focus();
                return false;
              }
              if((document.myForm.userName.value).length>20)
              {
                alert("User Name should be <=20 character");
                return false;
              }
              if( document.myForm.pasword.value == "" )
              {
                alert( "Please enter your password!");
                document.myForm.pasword.focus();
                return false;
              }
              if( document.myForm.repasword.value == "" )
              {
                alert( "Please re-enter your password!");
                document.myForm.repasword.focus();
                return false;
              }
              if( document.myForm.pasword.value != document.myForm.repasword.value)
              {
                alert( "your passwords do not match");
                document.myForm.pasword.focus();
                return false;
              }
            }
            
            
            function validateSignForm()
            {
              if( document.mySignForm.userName.value == "" )
              {
                alert( "Please enter your User Name!");
                document.mySignForm.userName.focus();
                return false;
              }
              if( document.mySignForm.pasword.value == "" )
              {
                alert( "Please enter your password!");
                document.mySignForm.pasword.focus();
                return false;
              }
            }
        </script>
        
        <style type="text/css">
            .menu12
            {
                border-left: 1px solid red;
            }
            .ulBullet
            {
              list-style-type: none;
              padding:0;
              margin:0;
            }
            
            
             .span2{width: 126px;}
            .glyphicon-calendar{width: 400px; height: 200px;}
            .ulBullet
            {
              list-style-type: none;
              padding:0;
              margin:0;
            }
            .leftcol{ float:left }
            .topMAr{margin-top: 5px;}
           
        
        .rightborder {
        
        }
        .vr {
            width: 10px;
            background-color: #000;
           
            top: 0;
            bottom: 0;
            left: 150px;
        }
        .glow {
            text-shadow:-1px 0px 20px #0a008f;
            color:white;
        }
        .dead {
         text-shadow:-1px 0px 20px #575454;
         color:white;
        }
        .btn-primary{background-color:#778554;}
        .btn-primary:hover{background-color: #E6E4D1;}
        .glyphicon-calendar{color: #778554;}
        </style>
        
        
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
              
      
      <div class="container" style="margin-top:-40px;" data-ng-view="">

      </div>
      
        </div>
        <div id="footer">
      <div class="container">
        <p class="text-muted credit">Example courtesy <a href="http://www.neevtech.com/">Avnesh Shakya</a> and <a href="http://www.neevtech.com/">Vinu Vincent</a>.</p>
      </div>
    </div>      
        <script type="text/javascript" src="/dashboardAngular/angular.min.js"></script>
        <script type="text/javascript">
            var demoApp = angular.module("demoApp", []);
            
            demoApp.config(function ($routeProvider){
                $routeProvider
                .when('/login',
                {
                    controller: 'SimpleController',
                    templateUrl: 'login.php'
                })
                .when('/about',
                {
                    controller: 'SimpleController',
                    templateUrl: 'about.php'
                })
                .when('/contact',
                {
                    controller: 'SimpleController',
                    templateUrl: 'contact.php'
                })
                .otherwise( {redirectTo: '/login'} );
            }
        );
            

            demoApp.controller("SimpleController", function ($scope){
                $scope.isActive = function (viewLocation) { 
                    return viewLocation === $location.path();
                };
           });
        
        
        </script>
        
        <script type="text/javascript" src="/dashboardAngular/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/dashboardAngular/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/dashboardAngular/assets/js/holder.js"></script>
        <script type="text/javascript" src="/dashboardAngular/eternicode-bootstrap/js/bootstrap-datepicker.js"></script>
    </body>
</html>
