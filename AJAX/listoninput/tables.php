<?php require_once 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <ul>
            <?php $showAllPosts = showAllPosts($conn); ?>
        	<?php foreach ($showAllPosts as $post) { ?>
            <li class="postDescription">
                <p class="postDesc"><?php echo $post['description']; ?></p>
                <form action="dbcon.php" method="POST" class="updateForm d-none">
                    <input type="hidden" value="<?php echo $post['post_id']; ?>" name="postID">
                    <input type="text" value="<?php echo $post['description']; ?>" name="postDescription">
                </form>        
            </li>
        	<?php } ?>
        </ul>
    </div>
    <script>
        $(document).ready(function(){
        	$('.postDescription').on('dblclick', function (e) {
                // (this) means inside the parent element/find the child element
                $(this).find('.postDesc').addClass('d-none');
        		$(this).find('.updateForm').removeClass('d-none');
        	})
        });
    </script>
</body>
</html>
