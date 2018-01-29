<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 25-Jan-18
 * Time: 15:52
 **/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hackathon task</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="manageRow">
                <p>Row</p>
                <i class="fa fa-plus-circle" onclick="addRow()" title="Add row"></i>
                <i class="fa fa-minus-circle" onclick="deleteRow()" title="Delete row"></i>

            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
             <div class="managaColmn">
                <p>Colmn</p>
                <i class="fa fa-plus-circle" onclick="addColmn()" title="Add colmn"></i>
                <i class="fa fa-minus-circle" onclick="deleteColmn()" title="Delete colmn"></i>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <p>Manage</p>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-ellipsis-v">
                    </i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li onclick="resetNumOfClicks()">Reset number of clicks</li>
                    <li onclick="resetTable()">Reset table</li>
                </ul>
            </div>
        </div>
    </div>
</div>



    <table>

    </table>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
