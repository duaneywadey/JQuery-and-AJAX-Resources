<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Arial";
        }
        table, th, td {
          border:1px solid black;
        }

        .redStyle {
            color: red;
            background-color: yellow;
            border-style: solid;
        }
    </style>
</head>
<body>

    <button class="loadJson">Click me</button>
    <ul class="ordersList">Orders List</ul>
    <input type="text" class="orderID">
    <button class="loadOrder">Get order</button>

    <div class="orderInfo">
        <div class="orderCustomerName"></div>
        <div class="orderDate"></div>
        <div class="orderID"></div>
        <div class="orderItem"></div>
        <div class="orderValue"></div>
    </div>



    <script>

        $('.loadJson').on('click', function (e) {
            e.preventDefault();
             $.ajax({
                type:"GET",
                url:"controllers.php",
                dataType:"json",
                data: {
                    getJSONVal: 1
                },
                success: function (res) {
                    console.log(res);
                    $.each(res, function (key,value) {
                        $('.ordersList').append("<li>" + value.order_item + "</li>");
                    })

                }
            })
        })

        $('.loadOrder').on('click',function (e) {
            var orderValue = $('.orderID').val()

            if (orderValue != "") {
                    $.ajax({
                    type:"GET",
                    url:"controllers.php",
                    dataType:"json",
                    data : {
                        getJSONOrder: 1,
                        orderValue: orderValue
                    },
                    success: function (res) {
                        console.log(res);
                        $('.orderInfo').attr("style", "border-style:solid");
                        $('.orderCustomerName').text("Customer Name: " + res.order_customer_name);
                        $('.orderDate').text("Order Date: " + res.order_date);
                        $('.orderID').text("Order ID: " + res.order_id);
                        $('.orderItem').text("Order Item: " + res.order_item);
                        $('.orderValue').text("Order Value: " + res.order_value);
                    }
                })
            }
            else {
                alert("Make sure it's not empty!")
            }
    
        })
    
    </script>
</body>
</html>