          <div class="row"  data-ng-controller="SimpleController">
              <div class="col-md-4">
              </div>
            <div class="col-md-4" id="RegistrationForm">
                <form class="form-signin" method="POST" action="checkMail.php" name="myForm" onsubmit="return(validateForm());">
                    <h2 class="form-signin-heading glow"  style ="color:#778554;">Create Account:</h2>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" autofocus>
                    
                    
                    
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email address" autofocus>
                
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="optionsRadios" id="male" value="male" checked>
                        Male
                      </label>
                    </div>
                    
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="optionsRadios" id="female" value="female">
                        Female
                      </label>
                    </div>
                    <input type="text" class="form-control" name="userName" placeholder="User Name" autofocus>
                    <input type="password" class="form-control" id="pasword" name="pasword" placeholder="Password">
                    <input type="password" class="form-control" id="repasword" name="repasword" placeholder="Re-enter Password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register Me</button>
                </form>
            </div>
            
            
            <div class="col-md-4" id="SignIn">
                <form  class="form-signin" method="POST" action="signProcess.php" name="mySignForm" onsubmit="return(validateSignForm());">
                    <h2 class="form-signin-heading glow" style ="color:#778554;">Please sign in</h2>
                    <input type="text" class="form-control" name="userName" placeholder="User Name" autofocus value="<?php echo $username; ?>">
                    <input type="password" class="form-control" name="pasword" placeholder="Password" value="<?php echo $password; ?>">
                    <label class="checkbox">
                      <input type="checkbox" name="remember" value="remember"> Remember me
                    </label>
                    <button id="BtSignIn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    
                </form>
                <div id="addmsz"><p id='mszz1'><?php echo $mszz; ?></p> </div>
            </div>
              
          </div>
