<!--here this page is used for dashboard, which will fatched data from loggly -->

<!-- here this php code for checking login-->
<?php
    require_once('auth.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html data-ng-app="dashboardApp">
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
        
<!--        <link href="/dashboardAngular/diQuery-collapsiblePanel.css" rel="stylesheet">-->
<!--        <link href="/dashboardAngular/bootstrap-select/bootstrap-select.css" rel="stylesheet">-->
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" media="screen" href="http://silviomoreto.github.io/bootstrap-select/stylesheets/bootstrap-select.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>-->
        
        <style type="text/css">
            .glyphicon{}
            .menu12
            {
                border-left: 1px solid #180000;
            }
            .ulBullet
            {
              list-style-type: none;
              padding:0;
              margin:0;
            }

            #hrLine{color: #6B8E23;
                    background-color: #6B8E23;
                    height: 2px;
            }

            div.list > span > ul{
              display: none;
            } 
            a {
                 color: red;
              }
           .floatLeft{float: left;}
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
            <a class="navbar-brand" href="#">Log management</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav" data-ng-controller="DashboardController">
                <li class="active" ng-class="{ active: isActive('/')}"><a href="#"><span class="glyphicon glyphicon-dashboard" style="margin-right: 8px;  height: 30px;"></span><span>Dashboard</span></a></li>
                <li ng-class="{ active: isActive('/search.php')}"><a href="#search"><span class="glyphicon glyphicon-search" style="margin-right: 8px;"></span><span>Search</span></a></li>
                <li ng-class="{ active: isActive('/alert.php')}"><a href="#alert"><span class="glyphicon glyphicon-bell "style="margin-right: 8px;"></span><span>Alerts</span></a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
<!--            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>-->
            <li class="active"><a href="logout.php" style="height: 50px;">LogOut</a></li>
          </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
     
        

      <div data-ng-view="">   
            
    
      
      </div>
      
        
        </div>  
        
        
        
        
        <div id="footer">
      <div class="container">
          <p class="text-muted credit">Example Log Managemanent By: &nbsp; <a href="#avnesh">Avnesh Shakya</a> and <a href="#Manager">RKVS Raman</a>.</p>
      </div>
    </div>
        <script type="text/javascript">
            $("div.list span").click(function() {
               $(this).children('ul').toggle();
               $(this).children('p').toggle();
            });
        </script>
        <script type="text/javascript">
            function myCustomTime(){
                var e = document.getElementById("selId");
                var strUser = e.options[e.selectedIndex].value;
                alert(strUser);
                
            }
        </script>
        <script type="text/javascript">
         jQuery(document).ready(function(){

          jQuery('select#selId').val('<?php echo $_POST['selId'];?>');

         });
        </script>
        <script type="text/javascript">
         jQuery(document).ready(function(){

          jQuery('select#selId12').val('<?php echo $_POST['selId12'];?>');

         });
        </script>
        
        <script type="text/javascript" src="/dashboardAngular/angular.min.js"></script>
        <script type="text/javascript">
            var dashboardApp = angular.module("dashboardApp", []);
            
            dashboardApp.config(function ($routeProvider){
                $routeProvider
                .when('/dashboard',
                {
                    controller: 'ParticularlogsController',
                    templateUrl: 'dashboard.php'
                })
                .when('/search',
                {
                    controller: 'DashboardController',
                    templateUrl: 'search.php'
                })
                .when('/alert',
                {
                    controller: 'DashboardController',
                    templateUrl: 'alert.php'
                })
                .otherwise( {redirectTo: '/dashboard'} );
            }
        );
            

            dashboardApp.controller("DashboardController", function ($scope){
                $scope.isActive = function (viewLocation) { 
                    return viewLocation === $location.path();
                };

           });
           
           
           
           
           dashboardApp.controller("ParticularlogsController", function ($scope, $location, $http){
           
           
            
            $scope.submit = function(){
             
                var temp1 = $scope.timing;
                var temp2 = $scope.selectedsize;
                var maindata = {times: temp1, sizes: temp2};
                $http({
                    method : 'POST',
                    url: 'dashboard',
                    data: maindata,
                    headers: {'Content-Type': 'application/json; charset=utf-8'}
                }).
                    success(function(maindata, response) {
                        $location.path("/");
                         
                    }).
                    error(function(response) {
                        $scope.codeStatus = response || "Request failed";
                    });
 
                }
           
           
        });
        
        </script>
        <script type="text/javascript" src="/dashboardAngular/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/dashboardAngular/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/dashboardAngular/assets/js/holder.js"></script>
        <script type="text/javascript" src="/dashboardAngular/eternicode-bootstrap/js/bootstrap-datepicker.js"></script>
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="http://silviomoreto.github.io/bootstrap-select/javascripts/bootstrap-select.js"></script>
    </body>
</html>
