
<?php 
session_start() ; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="first.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="javascript4.js"></script>
</head>
 
<body>
<nav id="navigation">
    <article class="logo">
        <a href="index.php">
        <img src="logo.png" width="283.2" height="60"></a>
    </article>
</nav>

<section class="content">
    <article class="regform">
        <div class="tab">
  		    <button class="tablinks" onclick="openTab(event, 'signup')">Sign Up</button>
  		    <button class="tablinks" onclick="openTab(event, 'signin')">Sign In</button>
	    </div>
        <div id="signup" class="tabcontent">
	       <form id="msform" action="test.php" method="post">
              <fieldset>

                <h2 class="fs-title">Create your account</h2>
                <input type="text" name="fname" placeholder="First Name" required />
                <input type="text" name="lname" placeholder="Last Name" required />
                <input type="email" name="email" placeholder="Email" title="Please enter a valid email id." required />
                <input type="date" name="bday" required/>
                <input type="password" name="pass" placeholder="Password" required />
                <input type="password" name="cpass" placeholder="Confirm Password" required/>
                <button type="submit" name="Create" id="accnt">Create</button><br><br>
                <a href="#" id="registered" onclick="openTab(event, 'signin')">Already have an account? Sign In</a>
                 <a class="create-error">
                    <?php 
                    if (isset($_SESSION['create-error']))
                    {
                        echo $_SESSION['create-error'];
                        unset($_SESSION['create-error']);
                    } 
                    
                    ?>
                </a>
              </fieldset>
             
           </form>
        </div>
        <div id="signin" class="tabcontent">
            <form id="msform" action="signin.php" method="post">
                <fieldset>
                    <h2 class="fs-title">Sign into your account</h2>
                    
                     
                    <input type="text" name="email" placeholder="Email" required />
                    <input type="Password" name="pwd" placeholder="Password" required />
                    <button type="submit" name="signin" id="accnt">Sign in</button><br><br>
                    <a href="#" id="unregistered" onclick="openTab(event, 'signup')">Don't have an account? Sign Up</a><br><br>
                    <a href="adminlg.html"><input type="button" value="Admin Login" id="adminlg"></a>
                    <a class="login-error">
                    <?php 
                    if (isset($_SESSION['login-error']))
                    {
                        echo $_SESSION['login-error'];
                        unset($_SESSION['login-error']);
                    } 
                    
                    ?>
                </a>
            
                </fieldset>
            </form>
        </div>
    </article>
    <article class="sshow">
        <div id="slider">
            <ul class="slides">
                <li class="slide"><img src="daddypos.jpg" width="720" height="405"/></li>
                <li class="slide"><img src="haseena.jpg" width="720" height="405"/></li>
                <li class="slide"><img src="bhoomi.jpg" width="720" height="405"/></li>
                <li class="slide"><img src="it.jpg" width="720" height="405"/></li>
                <li class="slide"><img src="assassin.jpg" width="720" height="405"/></li>
                <li class="slide"><img src="kingsman.jpg" width="720" height="405"/></li>
                <li class="slide"><img src="daddypos.jpg" width="720" height="405"/></li>

            </ul>
        </div>
    </article>
</section>
</body>
</html>