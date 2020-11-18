

<?php
if (!isset($user_name)) {
    $user_name = '';
}
if (!isset($password)) {
    $password = '';
}
if (!isset($firstName)) {
    $firstName = '';
}
if (!isset($lastName)) {
    $lastName = '';
}
if (!isset($userName)) {
    $userName = '';
}

if (!isset($gamerTag)) {
    $gamerTag = '';
}


$password_ = '';
$passwordVerify = '';
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Game Friends</title>
    </head>
    <body>
        <main>

            <h1>Game Friends Login</h1>

            <form action="controller.php" method="post">
                <input type="hidden" name="action" value="login"/>



                <div id="data">

                    <label>User Name:</label>
                    <input type="text" name="user_name" 
                           value="<?php echo htmlspecialchars($user_name); ?>"> &nbsp; 
                    <?php if (!empty($errorMessageLogin)) { ?> <span class="error"><?php echo htmlspecialchars($errorMessageLogin); ?></span> <?php } ?>
                    <br>

                    <label>Password:</label>
                    <input type="password" name="password_"
                           value="<?php echo htmlspecialchars($password_); ?>"> <label>&nbsp;</label>
                    <br>

                </div>

                <div id="buttons">

                    <input type="submit" value="Login">
                    <input type="hidden" name="action" value="login"/><br>

                </div>
                <label>&nbsp;</label>
                <br>
            </form>


            <h1></h1>

            <form action="controller.php" method="post">
                <input type="hidden" name="action" value="registration">



                
                    <label>First Name:</label>
                    <input type="text" name="firstName"
                           value="<?php echo htmlspecialchars($firstName); ?>"> &nbsp; <?php if (!empty($errorMessageFirst)) { ?> <span class="error"><?php echo htmlspecialchars($errorMessageFirst); ?></span> <?php } ?>
                    <br>

                    <label>Last Name:</label>
                    <input type="text" name="lastName"
                           value="<?php echo htmlspecialchars($lastName); ?>"> &nbsp; <?php if (!empty($errorMessageLast)) { ?> <span class="error"><?php echo htmlspecialchars($errorMessageLast); ?></span> <?php } ?>
                    <br>

                    <label>GamerTag:</label>
                    <input type="text" name="gamerTag"
                          value="<?php echo htmlspecialchars($gamerTag); ?>"> <label>&nbsp;</label>  
                    <br>

                    <label>User Name:</label>
                    <input type="text" name="userName"
                           value="<?php echo htmlspecialchars($userName); ?>"> &nbsp; <?php if (!empty($errorMessageUser)) { ?> <span class="error"><?php echo htmlspecialchars($errorMessageUser); ?></span> <?php } ?>
                    <br>

                    <label>Password:</label>
                    <input type="password" name="password"
                           value="<?php echo htmlspecialchars($password); ?>"> &nbsp; <?php if (!empty($errorMessagePassword)) { ?> <span class="error"><?php echo htmlspecialchars($errorMessagePassword); ?></span><?php } ?>
                    <br>

                    <label>Retype password:</label>
                    <input type="password" name="passwordVerify"
                           value="<?php echo htmlspecialchars($passwordVerify); ?>"> &nbsp; <?php if (!empty($errorMessagePassword)) { ?> <span class="error"><?php echo htmlspecialchars($errorMessagePassword); ?></span><?php } ?>
                    <br>


                
                <div id ="buttons">

                    <input type="submit" value="Register">
                    <input type="hidden" name ="action" value="register"/><br>

                </div>
                <label>&nbsp;</label>
                <br>
            </form>

        </main>
    </body>
</html>
