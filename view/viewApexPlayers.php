<?php include('navigation.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>All Users</title>
       <link rel="stylesheet" type="text/css" href="view/main.css">  
    </head>
    
        
    
    <body>
        <main>
        <h1>Apex Friends you can play with</h1>
        <table>
            <tr>
            <th>User Name</th>
            <th>Gamer Tag</th>
            <th>kills</th>
            </tr>
            
            <?php foreach ($findFriends as $apex): ?>
            
            <tr>
                
                <td> <?php echo htmlspecialchars ($apex->getUserName()); ?> </td>
                <td><?php echo htmlspecialchars($apex->getGamerTag()); ?></td>
               <td><?php echo htmlspecialchars($apex->getKIlls()); ?></td>
               
            <td><a href="controller.php?action=visit_profile&username=<?php echo htmlspecialchars ($apex->getUserName()); ?>">visit</a></td>
            <?php  endforeach;?>
                 </tr>
            
        </table>
        </main>
    </body>
 
</html>

