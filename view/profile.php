<?php include('navigation.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Game Friends</title>

    </head>
    <body>
        <main>
            <div id="data">
                <h1> Welcome Home Gamer </h1>
                If you haven't already <a href="view/enterNewApex.php"> ADD MY APEX KILLS</a><br>
                You can now <a href="view/enterApexInfo.php"> UPDATE APEX KILLS</a>
  
              <div id="buttons">

            <form action="controller.php" method="POST" >
                <input type="hidden" name="action" value="find_friends">
                <input type="submit" value="Find Apex Friends">
            </form>
                </div>
                <label>&nbsp;</label>
                <br>
              
          
                <h2> Following</h2>
                <table>
                    <tr>
                        <th>gamerTag </th>
                        
                   

                    </tr>

                    <?php foreach ($memberFollowing as $following): ?>

                        <tr>

                            <td><?php echo htmlspecialchars($following['following']); ?></td>
                           
<td><a href="controller.php?action=visit_profile&gamerTag=<?php echo htmlspecialchars ($following['following']); ?>">visit</a></td>
<td><a href="controller.php?action=unfollow&gamerTag=<?php echo htmlspecialchars ($following['following']); ?>">Unfollow</a></td>
                        <?php endforeach; ?>
                    </tr>

                </table>
               
            </div>     
        </main>
    </body>

</html>

