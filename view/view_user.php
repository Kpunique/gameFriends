<?php include('navigation.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="view/main.css"/>
</head>
<body>
    <header>
        <h1>Profile Page</h1>
    </header>
    <main>
        
        

     
            <ul>
            
                
                <li>
                    UserName: <?php echo htmlspecialchars($viewed_user['username']) ?>
                </li>
                <li>
                    First Name: <?php echo htmlspecialchars($viewed_user['first_name']) ?>
                </li>
                <li>
                    Last Name: <?php echo htmlspecialchars($viewed_user['last_name']) ?>
                </li>

            </ul>
          
    </main>
</body>
</html>


