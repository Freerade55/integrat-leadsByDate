<?php





const ROOT = __DIR__;

require ROOT . "/functions/require.php";



logs();


// вариант через крон
//if(empty($_SERVER["HTTP_ACCEPT"])) {


//$currentDate = date("Y-m-d H:i:s");
//$currentMinute = date("i");
//
//if ($currentMinute > 30) {
//    $currentDate = date("Y-m-d H:00", strtotime($currentDate . "+1 hour"));
//} else {
//
//    $currentDate = date("Y-m-d H:00", strtotime($currentDate));
//}
//
//$from = strtotime(date("Y-m-d 00:00:00"));
//$to = strtotime(date("Y-m-d 23:59:59"));
//
//$readyJson = dateHandler($from, $to);
//
//$ready = json_decode($readyJson, true);
//
//$ready = json_encode($ready, JSON_UNESCAPED_UNICODE);
//
//file_put_contents(ROOT . "/jsons/$currentDate.json", $ready);



//}

//
//else {
//

    $from = strtotime("{$_POST['inputData']} 00:00:00");

    $to = strtotime("{$_POST['inputData']} 23:59:59");



    $readyJson = dateHandler($from, $to);

    echo $readyJson;


//
//
//
//
//
//
//}


