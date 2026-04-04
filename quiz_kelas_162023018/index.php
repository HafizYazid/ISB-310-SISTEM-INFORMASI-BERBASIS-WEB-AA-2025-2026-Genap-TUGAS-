<?php
$colors = ['red', 'green', 'blue', 'yellow', 'orange'];
$array_angka = [1, 2, 3, 4, 5];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perulangan Color Hover</title>
    <style>
        table {
            width: 20%;
            border-collapse: collapse;
        }
        td {
            width: 100px;
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
            cursor: pointer;
        }
        tr:hover {
            background-color: #ffffff;
        }
        tr {
            position: relative;
            font-size: 16px;
            text-align: center;
            border: 2px solid #333;
        }
        tr:nth-child(1) td:hover {
            background-color: <?= $colors[0] ?>;
        }
        tr:nth-child(2) td:hover {
            background-color: <?= $colors[1] ?>;
        }
        tr:nth-child(3) td:hover {
            background-color: <?= $colors[2] ?>;
        }
        tr:nth-child(4) td:hover {
            background-color: <?= $colors[3] ?>;
        }
        tr:nth-child(5) td:hover {
            background-color: <?= $colors[4] ?>;
        }
    </style>
</head>
<body>
    <center>
    <h1>Perulangan Color Hover</h1>
    <table>
        <?php foreach ($array_angka as $row): ?>
            <tr>
                <?php foreach ($array_angka as $col): ?>
                    <td><?= $row ?>, <?= $col ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    </center>
</body>
</html>