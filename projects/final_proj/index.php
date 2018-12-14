
<!DOCTYPE html>
<html>
    <head>
        <title>Google Slang</title>
        <meta charset="UTF-8">
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--bootstrap js and css-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!--custom css-->
        <link rel="stylesheet" href = "css/styles.css">
        <!--all custom js-->
        <script language="javascript" type="text/javascript" src="js/functions.js"></script>
        <script language="javascript" type="text/javascript" src="js/navigation.js"></script>
        <script language="javascript" type="text/javascript" src="js/translation.js"></script>
        <script language="javascript" type="text/javascript" src="js/slang.js"></script>
        <script language="javascript" type="text/javascript" src="js/contribution.js"></script>
        <script language="javascript" type="text/javascript" src="js/loginAndSignup.js"></script>
    </head>
    
    <body style="text-align: center">
        <?php include "nav.php" ?>
        <!-- Homepage -->
        <div id="homePage">
          <img id="logo" src="img/logo.png" alt="logo"><br><br>
          <div id="leftSide">
            <br>
            <select id="sourceLang"></select><br>
            <textarea id="sourceMessage" maxlength=250></textarea><br>
          </div>
          <div id="images">
            <img id="rightArrow" src="img/right.png" alt="rightArrow" />
            <img id="swapArrows" src="img/swap.png" alt="swapArrows" />
          </div>
          <div id="rightSide">
            <select id="dialect"><option value="">Dialect</option><option>Standard</option></select><br>
            <select id="targetLang"></select><br>
            <textarea id="targetMessage" disabled="true"></textarea><br>
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Show Original Translated Text
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                  </div>
                </div>
              </div>
            </div>
            <img src="img/googleCredit.png" alt="Powered by Google Translate" />
          </div>
        </div>
        
        <!-- Slang -->
        <!--TODO on search : total number of results, total unique users, total number of contributions in the search results made by current user (or something else for people not logged in)-->
        <div id="slangPage">
            <div id="aggData"><div id="resultsMetadata"></div></div>
            <h1 class="colorHeader">All Slang</h1><br><br>
            Search:  <input type="text" id="slangSearch"></input> 
            Language: <select id="slangLang"><option value="">Select Language...</option></select>
            Dialect: <input type="text" id="slangDialect">
            </select><br/>
            ORDER: 
            <input class="slangOrderBy" id="slangByUser" name="order" type="radio"> User
            <input class="slangOrderBy" id="slangByLang" name="order" type="radio"> Language <br/><br/>
            <div class="contributeBox" id="results" style="text-align: left"></div><br>
        </div>
        
        <!-- Contribute -->
        <div id="contributePage">
          <h1 class="colorHeader">Make A Contribution</h1><br>
          <div class="contributeBox">
              <input id="contributeTextOne" type="text" placeholder="First Language Pair"></input>
                Language: <select id="contributeLangOne">
                </select>
                Dialect: <input type="text" id="contributeDialectOne" value="Standard"></input>
                <br><img id="downArrow" src="img/down.png" alt="downArrow"/><br>
                <input id="contributeTextTwo" type="text" placeholder="Second Language Pair"></input>
                Language: <select id="contributeLangTwo">
              </select>
              Dialect: <input type="text" id="contributeDialectTwo" value="Standard"></input><br>
              <button id="contributeButton" type="button" class="btn btn-success btn-lg">Contribute</button>
          </div> <br>
          <h1 class="display-4">Your Contributions</h1>
          <div class="contributeBox" id="displayUserContributions"></div>
        </div>
        <!--Contributons edit modal-->
        <div id="editModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Contribution</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <input id="editTextOne" type="text" placeholder="First Language Pair" ></input>
                Language: <select id="editLangOne"></select>
                Dialect: <input type="text" id="editDialectOne" value="Standard"></input>
                <br><img id="downArrow" src="img/down.png" alt="downArrow"/><br>
                <input id="editTextTwo" type="text" placeholder="Second Language Pair" ></input>
                Language: <select id="editLangTwo"></select>
                Dialect: <input type="text" id="editDialectTwo" value="Standard"></input><br>
                <button id="editButton" type="button" class="btn btn-success btn-lg" data-dismiss="modal">Submit Edit</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Login -->
        <div id="loginPage">
          <!-- By default -->
          <div id="loginDiv">
            <h1>Log In</h1><br>
            <div id="loginErrorMessage">The information doesn't match our records</div>
            <input type="text" id="loginUsername" placeholder="Enter Username"></input><br>
            <input type="password" id="loginPassword" placeholder="Enter Password"></input> <br><br>
            <button id="tryLoginButton" type="button" class="btn btn-success btn-lg">Login</button>
          </div>
          <div id="signupPrompt">
            <h2>Don't have an account yet?</h2>
            <button id="signupButton" type="button" class="btn btn-primary btn-lg">Sign Up</button>
          </div>
          <!-- If user clicks signup -->
          <div id="signupDiv">
            <h1 style="margin-bottom: 20px">Sign Up</h1>
            Username: <br>
            <div id="usernameDiv">
              <div id="usernameErrorMessage">Username Already Exists</div>
              <input type="text" id="signupUsername"></input><br>  
            </div>
            Password: <br>
            <div id="passwordDiv">
              <div id="passwordErrorMessage">Password Cannot Be Empty</div>
              <input type="password" id="signupPassword"></input> <br>
              Retype Password: <br>
              <input type="password" id="retypedPassword"></input> <br><br>
            </div>
            <button id="trySignupButton" type="button" class="btn btn-primary btn-lg">Sign Up</button>
          </div>
        </div>
    </body>
</html>