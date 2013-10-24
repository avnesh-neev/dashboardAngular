<!--here this page used for searching data by different-2 field names, and give appropriate result-->

<!-- here this php code for checking login-->
<?php
    require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
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
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="http://silviomoreto.github.io/bootstrap-select/stylesheets/bootstrap-select.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

        
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
            <ul class="nav navbar-nav">
                <li class="active"><a href="dash.php"><span class="glyphicon glyphicon-dashboard" style="margin-right: 4px; height: 30px;"></span><span>Dashboard</span></a></li>
                <li><a href="search.php"><span class="glyphicon glyphicon-search" style="margin-right: 4px;"></span><span>Search</span></a></li>
                <li><a href="#alert"><span class="glyphicon glyphicon-bell "style="margin-right: 4px;"></span><span>Alerts</span></a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="logout.php" style="height: 50px;">LogOut</a></li>
          </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
     
        

          
            
    <div style="background-color:#E6E4D1; height: 50px; margin-top: 50px;">
        <div class="container" >
            <div class="row" >
                <div class="col-md-4" >
                    
                </div>
                <div class="col-md-8" style="margin-top: 5px;">
                    <form class="form-signin" method="POST" action="search.php" name="myForm">
                        <span class="floatLeft" style="margin-left: 5px;">
                      <input type="text" class="form-control" name="searchField" placeholder="Field name for Search" value="*" autofocus style="height: 30px;">
                      </span>
                      <span class="floatLeft" style="margin-left: 5px;">
                    <select class="selectpicker" id="selId" name="selId">
                        <option value="-7d" selected="selected">Last 7 days</option>
                        <option value="-5d">Last 5 days</option>
                        <option value="-3d">Last 3 days</option>
                        <option value="-1M">Last 1 month</option>
                        <option value="-2h">Last 2 hours</option>
                        <option value="-1h">last 1 hour</option>
                        <option value="-12h">last 12 hours</option>
                        <option value="-10m">last 10 minutes</option>
                        <option value="-30m">last 30 minutes</option>
                    </select>
                     </span>   
                     <span class="floatLeft" style="margin-left: 5px;">
                    <select class="selectpicker" id="selId12" name="selId12">
                        <option value="10" selected="selected">10 results per page</option>
                        <option value="20">20 results per page</option>
                        <option value="30">30 results per page</option>
                        <option value="50">50 results per page</option>
                        <option value="100">100 results per page</option>
                    </select>
                     </span>
                        <span class="floatLeft" style="margin-left: 5px; margin-top: 5px;">
                    <button class="btn btn-primary" type="submit" style="margin-right: 5px; margin-top: -5px;" type="submit">search</button>
                    </span>
                    </form>
                </div>
            </div>
        </div>
      
    </div>
        
      <div class="container" style="margin-top:-40px;">
          <div class="row">
              <div class="col-md-2">
                  
              </div>
              <div class="col-md-10 menu12" id="serverData">
<!--                  here this php code will fatch data from server, here curl Php has used--> 

             <?php
             
                class LogglySearchClass
                {
                    public function extractData()
                    {
                       if($_POST['selId'] && $_POST['selId12'] && $_POST['searchField'])
                       {
                         $ch = curl_init();

                         //here all credentials has put for login in loggly account, so that It can fatch data
                         curl_setopt_array($ch, array(
                           CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/search?q='.$_POST['searchField'].'&from='.$_POST['selName'].'&until=now&size='.$_POST['sizeValue'],
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_USERPWD => 'avnesh:loggly18'
                         ));

                         //here it has got data from loggly, and will hold in a variable   
                         $output = curl_exec($ch);
                         $jsonData = json_decode($output,true);
                         $id = $jsonData["rsid"]["id"];

                         curl_setopt_array($ch, array(
                           CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/events?rsid='.$id,
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_USERPWD => 'avnesh:loggly18'
                         ));
                       }
                       else
                       {
                         $ch = curl_init();
                         curl_setopt_array($ch, array(
                           CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/search?q=*&from=-7d&until=now&size=500',
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_USERPWD => 'avnesh:loggly18'
                         ));

                         $output = curl_exec($ch);
                         $jsonData = json_decode($output,true);
                         $id = $jsonData["rsid"]["id"];
                         curl_setopt_array($ch, array(
                           CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/events?rsid='.$id,
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_USERPWD => 'avnesh:loggly18'
                         ));
                       }
                       $_POST['selId'] = NULL;
                       $_POST['selId12'] = NULL;
                       $_POST['searchField'] = NULL;  
                       $totalLogData = curl_exec($ch);
                       return json_decode($totalLogData, true);
                    }

                    public function diplayDataUI()
                    {
                        $jsons = $this->extractData();

                        // code for showing data on UI
                        foreach ($jsons as $key=>$value)
                        { 
                           if($key=="total_events")
                           {
                             echo "<div style='margin-top=-100px;'><p style='font-size: 30px;'>".$value." Events</p></div>";
                           }

                           if($key == "events")
                           {
                             echo "<div style='background-color:#E6E4D1; height: 30px;'><p style='margin-left:10px;'>Events:</p>"."</div>";
                             $k = json_decode($value, true);
                             foreach ($value as $arr) 
                             {
                                echo "<div style='margin-top:6px;' class='list'>";
                                echo "<span>";
                                foreach ($arr as $key1 => $value1)
                                {
                                    if($key1=="logmsg")
                                    {
                                        echo "<p class='glyphicon glyphicon-chevron-right'>&nbsp;"."\"".$value1."\""."</p>";
                                    }
                                }
                                echo "<ul class='ulBullet glyphicon glyphicon-chevron-down'>";

                                foreach ($arr as $key1 => $value1) 
                                {
                                    echo "<li>";
                                    if($key1 == "tags")
                                    {
                                        echo "<p style='font-size: 15px;'>".$key1.":</p>";
                                        echo "<ul class='ulBullet' style='margin-left:9px;'>[";
                                        foreach ($value1 as $value2) 
                                        {
                                            echo "<li>\"";
                                            echo $value2;
                                            echo "\"".","."</li>";
                                        }
                                        echo "],</ul>";
                                    }

                                    if($key1=="timestamp")
                                    {
                                        echo "<p style='font-size: 15px;'  style='margin-left:9px;'>".$key1.":</p>"."<p style='margin-left:9px;'>"."\"".$value1."\""."</p>";
                                    }

                                    if($key1=="logmsg")
                                    {
                                        echo "<p style='font-size: 15px;'>".$key1.":</p>"."<p style='margin-left:9px;'>"."\"".$value1."\""."</p>";
                                    }

                                    if($key1=="event")
                                    {
                                        echo "<p style='font-size: 15px;'>".$key1.":</p>";
                                        echo "<ul class='ulBullet' style='margin-left:9px;'>{";
                                        foreach ($value1 as $key2=>$value2) 
                                        {
                                            echo "<li>".$key2.":{"."\"";
                                            echo "<ul class='ulBullet' style='margin-left:9px;'>";
                                            foreach ($value2 as $key3=>$value3)
                                            {
                                                echo "<li>".$key3.":"."\"";
                                                echo "$value3";
                                                echo "\"".","."</li>";
                                            }
                                            echo "</ul>";
                                            echo "\"".","."}</li>";
                                        }
                                        echo "}</ul>";
                                    }

                                    if($key1=="logtypes")
                                    {
                                        echo "<p style='font-size: 15px;'>".$key1.":</p>";
                                        echo "<ul class='ulBullet' style='margin-left:9px;'>";
                                        foreach ($value1 as $value3) 
                                        {
                                            echo "<li>\"";
                                            echo $value3;
                                            echo "\"".","."</li>";
                                        }
                                        echo "</ul>";
                                    }


                                    if($key1=="id")
                                    {
                                        echo "<p style='font-size: 15px;'>".$key1.":</p>"."<p>"."<p style='margin-left:9px;'>"."\"".$value1."\""."</p>";
                                    }
                                    echo "</li>";
                                }
                                echo "</ul>";
                                echo "</span>";
                                echo "<hr id='hrLine'></hr>";
                                echo "</div>";
                            }
                         }

                       }
                    }
                }
                $objUI = new LogglySearchClass();
                $objUI->diplayDataUI();
                
           ?>
              </div>
          </div>
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
        
        
        

        <script type="text/javascript" src="/dashboardAngular/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/dashboardAngular/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/dashboardAngular/assets/js/holder.js"></script>
        <script type="text/javascript" src="/dashboardAngular/eternicode-bootstrap/js/bootstrap-datepicker.js"></script>
        
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://silviomoreto.github.io/bootstrap-select/javascripts/bootstrap-select.js"></script>
    </body>
</html>

