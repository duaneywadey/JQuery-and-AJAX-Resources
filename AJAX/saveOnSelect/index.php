<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
 <div class="form-group">
    <div class="col-sm-12">
        <label for="p_type">Type*:</label>
        <select class="form-control" name="qp_type" id="p_type" required>
            <option  value="Css">CSS</option>
            <option  value="HTML">HTML</option>
            <option  value="PhP">PhP</option>
            <option  value="Other">Other</option>
        </select>
    </div>
</div>

<div class="form-group" id="otherType" style="display:none;">
    <div class="col-sm-12">
        <label for="pType">If you chose ‘Other’, please describe below:</label>
        <input id="pType" type="text">
    </div>
</div>

<div class="form-group" id="otherType" style="display:none;">
    <div class="col-sm-12">
        <label for="pType">If you chose 'Other', please describe below:</label>
        <!-- START OFF WITH THIS ONE DISABLED, NAME IT THE SAME AS ABOVE --->
        <input id="pType" type="text" name="qp_type" disabled>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('select[name=qp_type]').on('change', function(){
            if($(this).val() == 'Other') {
                $('#otherType').show();
                $('#pType').prop('disabled',false);
            }
            else {
                $('#otherType').hide();
                $('#pType').prop('disabled',true);
                console.log($(this).val());
            }
        });
        $('#pType').on('input', function () {
            console.log($(this).val());
        })
    });
</script>
</body>
</html>
