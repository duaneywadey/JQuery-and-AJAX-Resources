<?php require_once 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <table style="width: 100%;">
        <tr>
            <th>Description</th>
            <th>Date Added</th>
        </tr>
        <?php 
        $showAllPosts = showAllPosts($conn);
        foreach ($showAllPosts as $row) {
        ?>
        <tr class="rowToClick">
            <td id="descriptionRow">
                <p id="desc"><a href="post.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['description']; ?></a></p>
            </td>
            <td><?php echo $row['date_posted']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <script>
        $(document).ready(function (e) {
            $('#description').on("input", function (e) {
                e.preventDefault();
                var post_id = $('#post_id').val();
                var description = $('#description').val();

                if(description!="") {
                        $.ajax({
                            url:"dbcon.php",
                            method:"POST",
                            data: {
                                description:description,
                                post_id:post_id
                            },
                        dataType:"text",
                        success: function (data) {
                            console.log(data);
                        }
                    })
                }
                else {
                    alert("Make sure the fields are complete!");
                }
                
            })
        })

    </script>
</body>
</html>