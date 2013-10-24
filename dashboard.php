<div data-ng-controller="ParticularlogsController">
<div class ="navbar navbar-default navbar-fixed-top" style="background-color:#E6E4D1; height: 40px; margin-top: 50px;">
        <div class="container">
            <div class="row" >
                <div class="col-md-4" >
                    
                </div>
                <div class="col-md-8" style="margin-top: 10px;">
                    
                    <form class="form-signin" ng-submit="submit()" method="POST" name="myForm">

                                <span class="floatLeft" style="margin-left: 5px;" >
                                    <select name="selId" ng-model="timing">
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
                                    <select  name="selId12" ng-model="selectedsize">
                                            <option value="10" selected="selected">10 results per page</option>
                                            <option value="20">20 results per page</option>
                                            <option value="30">30 results per page</option>
                                            <option value="50">50 results per page</option>
                                            <option value="100">100 results per page</option>
                                    </select>
                             </span>

                            <span class="floatLeft" style="margin-left: 5px;">
                                <button class="btn btn-primary" type="submit" style="margin-right: 5px; margin-top: -5px;">search</button>
                            </span>
                    
                    </form>
                    
                </div>
            </div>
        </div>
      
    </div>
                        
                
           
    <script>alert(<?php 
            $postdata = file_get_contents("php://input");
            echo $postdata;
            $request = json_decode($postdata);
//            echo $email = $request->times;
//            echo $pass = $request->sizes;
    
    ?>);</script>     
        
        
      <div class="container " style="margin-top: <?php if($_POST['selName'] && $_POST['sizeValue']){echo "45px";} else{
        echo '45px';} ?>;">
          <div class="row">
              <div class="col-md-2">
  
              </div>
              <div class="col-md-10 menu12" id="serverData">
<!--                  here this php code will fatch data from server, here curl Php has used-->
                <br><br><br><br><br>{{timing}}
                  <?php    $data = file_get_contents("php://input");
                    $objData = json_decode($data); 
                    echo "avnesh";
                    echo $objData->times."jjjj";
                    echo $objData->sizes;
                    echo $_REQUEST['times'];
                    echo "sachin";
                    echo $_POST['selectedsize'];
                    echo $postdata;
                  ?>
                
                  <?php
//                    class LogglyClass
//                    {
//                        public function extractData()
//                        {
//                           if($_POST['selId'] && $_POST['selId12'] && $_POST['searchField'])
//                           {
//                             $ch = curl_init();
//
//                             //here all credentials has put for login in loggly account, so that It can fatch data
//                             curl_setopt_array($ch, array(
//                               CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/search?q='.$_POST['searchField'].'&from='.$_POST['selName'].'&until=now&size='.$_POST['sizeValue'],
//                               CURLOPT_RETURNTRANSFER => true,
//                               CURLOPT_USERPWD => 'avnesh:loggly18'
//                             ));
//
//                             //here it has got data from loggly, and will hold in a variable   
//                             $output = curl_exec($ch);
//                             $jsonData = json_decode($output,true);
//                             $id = $jsonData["rsid"]["id"];
//
//                             curl_setopt_array($ch, array(
//                               CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/events?rsid='.$id,
//                               CURLOPT_RETURNTRANSFER => true,
//                               CURLOPT_USERPWD => 'avnesh:loggly18'
//                             ));
//                           }
//                           else
//                           {
//                             $ch = curl_init();
//                             curl_setopt_array($ch, array(
//                               CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/search?q=*&from=-7d&until=now&size=500',
//                               CURLOPT_RETURNTRANSFER => true,
//                               CURLOPT_USERPWD => 'avnesh:loggly18'
//                             ));
//
//                             $output = curl_exec($ch);
//                             $jsonData = json_decode($output,true);
//                             $id = $jsonData["rsid"]["id"];
//                             curl_setopt_array($ch, array(
//                               CURLOPT_URL => 'http://avneshshakya.loggly.com/apiv2/events?rsid='.$id,
//                               CURLOPT_RETURNTRANSFER => true,
//                               CURLOPT_USERPWD => 'avnesh:loggly18'
//                             ));
//                           }
//                           $_POST['selId'] = NULL;
//                           $_POST['selId12'] = NULL;
//                           $_POST['searchField'] = NULL;  
//                           $totalLogData = curl_exec($ch);
//                           return json_decode($totalLogData, true);
//                        }
//
//
//                          
//
//                        public function diplayDataUI()
//                        {
//                            $jsons = $this->extractData();
//
//                            // code for showing data on UI
//                            foreach ($jsons as $key=>$value)
//                            { 
//                               if($key=="total_events")
//                               {
//                                 echo "<div style='margin-top=-100px;'><p style='font-size: 30px;'>".$value." Events</p></div>";
//                               }
//
//                               if($key == "events")
//                               {
//                                 echo "<div style='background-color:#E6E4D1; height: 30px;'><p style='margin-left:10px;'>Events:</p>"."</div>";
//                                 $k = json_decode($value, true);
//                                 foreach ($value as $arr) 
//                                 {
//                                    echo "<div style='margin-top:6px;' class='list'>";
//                                    echo "<span>";
//                                    foreach ($arr as $key1 => $value1)
//                                    {
//                                        if($key1=="logmsg")
//                                        {
//                                            echo "<p class='glyphicon glyphicon-chevron-right'>&nbsp;"."\"".$value1."\""."</p>";
//                                        }
//                                    }
//                                    echo "<ul class='ulBullet glyphicon glyphicon-chevron-down'>";
//
//                                    foreach ($arr as $key1 => $value1) 
//                                    {
//                                        echo "<li>";
//                                        if($key1 == "tags")
//                                        {
//                                            echo "<p style='font-size: 15px;'>".$key1.":</p>";
//                                            echo "<ul class='ulBullet' style='margin-left:9px;'>[";
//                                            foreach ($value1 as $value2) 
//                                            {
//                                                echo "<li>\"";
//                                                echo $value2;
//                                                echo "\"".","."</li>";
//                                            }
//                                            echo "],</ul>";
//                                        }
//
//                                        if($key1=="timestamp")
//                                        {
//                                            echo "<p style='font-size: 15px;'  style='margin-left:9px;'>".$key1.":</p>"."<p style='margin-left:9px;'>"."\"".$value1."\""."</p>";
//                                        }
//
//                                        if($key1=="logmsg")
//                                        {
//                                            echo "<p style='font-size: 15px;'>".$key1.":</p>"."<p style='margin-left:9px;'>"."\"".$value1."\""."</p>";
//                                        }
//
//                                        if($key1=="event")
//                                        {
//                                            echo "<p style='font-size: 15px;'>".$key1.":</p>";
//                                            echo "<ul class='ulBullet' style='margin-left:9px;'>{";
//                                            foreach ($value1 as $key2=>$value2) 
//                                            {
//                                                echo "<li>".$key2.":{"."\"";
//                                                echo "<ul class='ulBullet' style='margin-left:9px;'>";
//                                                foreach ($value2 as $key3=>$value3)
//                                                {
//                                                    echo "<li>".$key3.":"."\"";
//                                                    echo "$value3";
//                                                    echo "\"".","."</li>";
//                                                }
//                                                echo "</ul>";
//                                                echo "\"".","."}</li>";
//                                            }
//                                            echo "}</ul>";
//                                        }
//
//                                        if($key1=="logtypes")
//                                        {
//                                            echo "<p style='font-size: 15px;'>".$key1.":</p>";
//                                            echo "<ul class='ulBullet' style='margin-left:9px;'>";
//                                            foreach ($value1 as $value3) 
//                                            {
//                                                echo "<li>\"";
//                                                echo $value3;
//                                                echo "\"".","."</li>";
//                                            }
//                                            echo "</ul>";
//                                        }
//
//
//                                        if($key1=="id")
//                                        {
//                                            echo "<p style='font-size: 15px;'>".$key1.":</p>"."<p>"."<p style='margin-left:9px;'>"."\"".$value1."\""."</p>";
//                                        }
//                                        echo "</li>";
//                                    }
//                                    echo "</ul>";
//                                    echo "</span>";
//                                    echo "<hr id='hrLine'></hr>";
//                                    echo "</div>";
//                                }
//                             }
//
//                           }
//                        }
//                    }
//                    $objUI = new LogglyClass();
//                    $objUI->diplayDataUI();
                ?>
                    
              </div>
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
    
<!--       <script></script>-->
    
<!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="http://silviomoreto.github.io/bootstrap-select/javascripts/bootstrap-select.js"></script>-->
</div>