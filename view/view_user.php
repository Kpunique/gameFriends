<?php include('navigation.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
</head>
<body>
   
        
    
     <main>
        
                  <h1>Profile Page</h1>

     
            <ul>
                <li>
                    GamerTag: <?php echo htmlspecialchars($gamerTag) ?>
                </li>
                <li>
                    Kills: <?php echo htmlspecialchars($kills) ?>
                </li>
                

            </ul>
            

       
            
                
            
                <label>Comment:</label><br>
                <textarea rows='5' cols='50' name='user_comment'></textarea><br>
                <input type='submit' value='comment'> 
           
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


