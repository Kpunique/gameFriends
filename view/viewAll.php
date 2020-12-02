<?php include('navigation.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>All Users</title>
       <link rel="stylesheet" type="text/css" href="view/main.css">  
    </head>
    
        
    
    <body>
        <main>
        <h1>USers on this site</h1>
        <table>
            <tr>
            <th> First Name </th>
            <th>Last name</th>
            <th>UserName</th>
   
            <th>View Profile</th>
            </tr>
            
            <?php foreach ($allMembers as $member): ?>
            
            <tr>
                
                <td><?php echo htmlspecialchars($member->getFirstName()); ?></td>
                <td> <?php echo htmlspecialchars ($member->getLastName()); ?> </td>
                <td> <?php echo htmlspecialchars ($member->getUserName()); ?> </td>
          
            
            <?php  endforeach;?>
                 </tr>
            
        </table>
        </main>
    </body>
 
</html>

