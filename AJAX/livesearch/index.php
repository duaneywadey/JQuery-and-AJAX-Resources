<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Live MySQL Database Search</title>
    <style>
        body{
            font-family: Arail, sans-serif;
            font-size: 2em;
        }
        /* Formatting search box */
        .search-box{
            width: 300px;
            position: relative;
            display: inline-block;
            font-size: 14px;
        }
        .search-box input[type="text"]{
            height: 32px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
        }

        #searchInput {
            height: auto;
            width: 500px;
            font-size: 2em;
        }

        #cardSibling {
            background-color: #e6fff8;
            width: 500px;
            height: auto;
            font-size: 2em;
        }

    </style>
</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search country..." id="searchInput" />
        <div class="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){

            $('#searchInput').keyup(function(){
                /* Get input value on change */
                var searchInput = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(searchInput.length){
                    $.ajax({
                        method: "GET",
                        url: "backend-search.php",
                        data: {searchInput: searchInput}
                    }).done(function (data) {
                        $('.result').html(data);
                    });
                } 
                else{
                    resultDropdown.empty();
                }
            });

        });
    </script>
</body>
</html>