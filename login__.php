<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <title>Assistance - Main page.</title>
    </head>
    <body>
        <h1>Welcome to our website.</h1>
        <!-- Login module -->
        <form class ="log" action="login_Controller.php" method="post">
        <div class="login-block">
            <h2>Login</h2>
            <p>Already registered? Sign in.</p>
            <input type="text" placeholder="Phone, email or username" name="username" />
            <input type="password" placeholder="Password" name="password" required/>
           <!-- <button>Login</button>-->
           <input type="submit" name="log" value="Login">
        </div>
        </form>
        <!-- End of login module -->
        
        <!-- Register module -->
        <form class ="reg" action="login_Controller.php" method="post">
        <div class="reg-block">
            <h2>Register</h2>
            <p>Create new account? Sign up.</p>
            <input type="text" placeholder="First name" name="fname"/>
            <input type="text" placeholder="Last name" name="lname"/>
            <input type="email" placeholder="E-mail" name="email"/>
            <select name="reg_as" size="1"> 
            <option value="0">Register as : </option>
            <option value="1">Normal user</option>
            <option value="2">Instructor</option>
            <option value="3">Company</option>
            </select>
            <select name="reg_ass" size="1"> 
            <option value="0">Gender :</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
            </select>
            <input type="password" placeholder="Password" name="password" required/>
            <input type="password" placeholder="Re-Password" name="password1" required/>
            <input type="submit"  name="regi" value="Sign up now !">
        </div>
        </form>
        <footer>
            <p>Copyrights &copy; 2017 - 2018 All Rights Reserved.</p>
        </footer>
        <!-- End of register module -->
    </body>
</html>