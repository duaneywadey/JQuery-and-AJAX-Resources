<?php require_once 'dbcon.php'; ?>
<?php require_once 'controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .numberField {
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php $returnAllNames = returnAllNames($conn); ?>
    <?php foreach ($returnAllNames as $name) { ?>
        <div class="numberField" data-userid=<?php echo $name['id']; ?>>
            <label for="quantity"><?php echo "<br>" . $name['first_name'] . "<br>"; ?></label>
            <input type="number" name="numberInputField" value="<?php echo $name['net_worth']; ?>" class="numberInputField">
        </div> 
    <?php } ?>
    <script>
        $('.numberInputField').on('change', function (e) {
            var userID = $(this).closest('div').data('userid');
            var numberInputField = $(this).val();
            $.ajax({
                url:'controller.php',
                method: 'POST',
                data: {
                    changeNetWorth:1,
                    numberInputField:numberInputField,
                    userID: userID
                },
                dataType:'text',
                success: function (data) {
                    location.reload();
                }
            })
        })
    </script>
</body>
</html>