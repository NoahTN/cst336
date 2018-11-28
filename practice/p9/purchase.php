
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Purchase Successful</title>
        <style>
            body {
                text-align: center;
                font-size: 32px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div>Thank you for your purchase! 
            <br> Your items will arrive in <?=$_GET["ship"]?>
            <br> Your credit card has been charged <?=$_GET["total"]?>
        </div>
    </body>
</html>