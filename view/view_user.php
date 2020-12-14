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
        
        

        <br><h2>Profile</h2>
        <?php { ?>
            <ul>
            
                
                <li>
                    UserName: <?php echo htmlspecialchars($viewed_user['userName']) ?>
                </li>
                <li>
                    First Name: <?php echo htmlspecialchars($viewed_user['firstName']) ?>
                </li>
                <li>
                    Last Name: <?php echo htmlspecialchars($viewed_user['lastName']) ?>
                </li>

            </ul>
            

        <?php } ?>
            
                
            <form action="controller.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="comment">
                <input type="hidden" name="viewed_user" value="<?php echo htmlspecialchars($viewed_user['username']) ?>"
                <label>Comment:</label><br>
                <textarea rows='5' cols='50' name='user_comment'></textarea><br>
                <input type='submit' value='comment'> 
            </form>
            <?php if (!empty($comment_error)) { ?><p class="error"><?php echo htmlspecialchars($comment_error); ?></p><?php } ?>
            
            <br><h2>Comments</h2><?php if(!empty($comments)){
            
                foreach($comments as $comment) {
                ?><ul>    
                <li><?php echo htmlspecialchars($comment['poster'])?>   <?php echo htmlspecialchars($comment['date'])?></li>
                <li><?php echo htmlspecialchars($comment['comment'])?></li>
                </ul>
                <?php }
            } else { ?>
            <ul>
                <li>No comments yet. Be the first to comment!</li>
            </ul>
            <?php } ?>

            
            
            

            
  
    </main>
</body>
</html>


