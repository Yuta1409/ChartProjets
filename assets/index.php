<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chart Projets</title>

    <!-- JS -->
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/design.css">
</head>
<body>

<a href="../assets/test.php">test</a>
<br>
<br>
<br>

<?php

include_once '../assets/include/connexion.php';

$conn = connexionDB();

?>


inc


<div id='chartCA' style="margin-left: 80px"></div>

<script type="text/javascript">
    var myConfig = {
        "type": "line",
        "background-color": "#333",

        "legend": {
            "background-color": "none",
            "border-width": 2,
            "border-color": "none",
            "border-radius": "5px",
            "padding": "10%",
            "layout": "1x5", //row x column
            "x": "20%",
            "y": "0.5%",
            "item": {"font-color": "white",}
        },

        "preview": {
            "background-color": "none",

        },
        "scale-x": {
            "zooming": true,
            "values": 'date',
            "item": {
                "font-size": 10,
                "font-color": "#fff"
            }
        },
        "scale-y": {
            "guide": {
                "line-color": "none"
            },
            "item": {
                "font-size": 10,
                "font-color": "#fff"
            }
        },
        plot: {
            "border-radius": 15,

        },

        "series": [
            {
                //avec renouvellement
                "values": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                "color": "blue",
                "text": "AVEC RENOUVELLEMENT",

            },
            {
                //sans renouvellement
                "values": [11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                "color": "red",
                "text": "SANS RENOUVELLEMENT",

            },
        ]
    };

    zingchart.render({
        id: 'chartCA',
        data: myConfig,
        height: 500,
        width: "90%"
    });
</script>
</body>