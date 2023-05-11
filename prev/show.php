<!DOCTYPE html>
<html>
<head>
    <title>Отчет</title>
    <link rel="stylesheet" href="css/tableStyle.css?v=4">

</head>
<body>

<table>
    <tr>
        <th rowspan="2" class="red">По состоянию на <?php
            $formatted_date = date("d.m.Y H:i");
            echo $formatted_date;?></th>
        <th colspan="3" class="orange"><?php $date = $_GET["date"];
            $formatted_date = date("d.m.Y", strtotime($date));
            echo $formatted_date;?></th>
    </tr>
    <tr class="light-pink">
        <td>Новые лиды</td>
        <td>Новые целевые лиды</td>
        <td>Новые лиды по парковкам</td>
    </tr>

    <?php
    const ROOT = __DIR__;

    require ROOT . "/functions/require.php";


    showTable($_GET['resultData']);



    ?>


</table>



<?php




$currentFrom = strtotime(date("Y-m-d 00:00:00"));

$currentTo = strtotime(date("Y-m-d 23:59:59"));


//$get = dateHandler($currentFrom, $currentTo);



// это типа вариант для крона

//if ($currentMinute > 30) {
//    $currentDate = date("Y-m-d H:00", strtotime($currentDate . "+1 hour"));
//} else {
//
//    $currentDate = date("Y-m-d H:00", strtotime($currentDate));
//}
//
//$get = file_get_contents(ROOT."/jsons/$currentDate.json");
//
//$get = json_decode($get, true);
//






?>



<!---->
<!---->
<!--<table class='current'>-->
<!--    <tr>-->
<!--        <th rowspan="2" class="red">По состоянию за текущий час</th>-->
<!--        <th colspan="3" class="orange">--><?php
//            $date = date("d.m.Y");
//            echo $date;?><!--</th>-->
<!--    </tr>-->
<!--    <tr class="light-pink">-->
<!--        <td>Новые лиды</td>-->
<!--        <td>Новые целевые лиды</td>-->
<!--        <td>Новые лиды по парковкам</td>-->
<!--    </tr>-->
<!---->
<!---->
<!--    --><?php
//
//    showTable($get);
//




    //
//    foreach ($get as $city => $jkArray) {
//
//
//
//
//        foreach ($jkArray as $jkName => $countArray) {
//
//            echo "<tr>";
//
//
//
//
//            switch ($city) {
//
//                case "СТВ":
//                    if($jkName == "ИТОГО") {
//
//                        echo "<td class='stv bold'>$jkName $city</td>";
//                    } else {
//
//                        echo "<td class='stv'>$jkName</td>";
//
//                    }
//
//
//
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";
//                    break;
//
//
//                case "КРД":
//
//                    if($jkName == "ИТОГО") {
//
//                        echo "<td class='krd bold'>$jkName $city</td>";
//                    } else {
//
//                        echo "<td class='krd'>$jkName</td>";
//
//                    }
//
//
//
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";
//                    break;
//
//
//
//                case "РНД":
//
//                    if($jkName == "ИТОГО") {
//
//                        echo "<td class='rnd bold'>$jkName $city</td>";
//                    } else {
//
//                        echo "<td class='rnd'>$jkName</td>";
//
//                    }
//
//
//
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
//                    echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";
//
//                    break;
//
//
//
//
//            }
//
//
//
//
//
//
//        }
//
//
//
//
//
//
//        echo "<tr>";
//
//
//
//
//
//
//    }
//
//
//





    ?>







<!--</table>-->

</body>
</html>