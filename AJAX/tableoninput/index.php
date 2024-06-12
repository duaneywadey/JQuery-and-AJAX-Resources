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
    <div class="choice"> </div>
    <div class="form-group">
        <div class="col-sm-12">
            <label for="p_type">Type*:</label>
            <select class="form-control" name="qp_type" id="selectType" required>
                <option disabled selected value> -- select an option -- </option>
                <option value="Css">CSS</option>
                <option value="HTML">HTML</option>
                <option value="PhP">PhP</option>
                <option value="Other">Other</option>
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

    <input type="text" class="form-control" id="testInput">

     <div class="jumbotron forInput d-none">
        <h1 class="display-4 here">Hello, world!</h1>
        <p class="lead here">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4 here">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead"><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>

    <div class="jumbotron d-none">
        <h1 class="display-4 choice">Hello, world!</h1>
        <p class="lead choice">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p class="choice">It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>


    <script>
        $(document).ready(function(){
            $('#selectType').on('change', function(){
                if($(this).val() == 'Other') {
                    $('.jumbotron').addClass("d-none");
                    $('#otherType').show();
                    $('#pType').prop('disabled',false);
                }
                else {
                    $('.jumbotron').removeClass("d-none");
                    $('.choice').text($(this).val());
                }
            });
            $('#pType').on('input', function () {
                console.log($(this).val());
            })

            $('#testInput').on('input', function () {
                $('.forInput').removeClass("d-none");
                $('.here').text($(this).val());

                if($(this).val() == "") {
                    $('.forInput').addClass("d-none");
                }
            })

        });
    </script>
</body>
</html>
