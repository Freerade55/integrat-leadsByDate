<?php






const ROOT = __DIR__;

require ROOT . "/functions/require.php";



logs();

//$_POST['inputData'] = "2023-03-22T20:17";


$currentDate = date("Y-m-d H:i:s");
$currentMinute = date("i");


if(empty($_SERVER["HTTP_ACCEPT"])) {


    if ($currentMinute > 30) {
        $currentDate = date("Y-m-d H:00", strtotime($currentDate . "+1 hour"));
    } else {

        $currentDate = date("Y-m-d H:00", strtotime($currentDate));
    }

    $from = strtotime(date("Y-m-d 00:00:00"));
    $to = strtotime(date("Y-m-d 23:59:59"));

    $readyJson = dateHandler($from, $to);

    $ready = json_decode($readyJson, true);

    $ready = json_encode($ready, JSON_UNESCAPED_UNICODE);

    file_put_contents(ROOT . "/jsons/$currentDate.json", $ready);


// если есть T - т.е. если пришла дата со временем
} else if (strpos($_POST['inputData'], "T") !== false) {



    $requestTime = date("Y-m-d H:i", strtotime($_POST['inputData']));
    $requestMinutes = date("i", strtotime($_POST['inputData']));




    if ($requestMinutes > 30) {
        $requestTime = date("Y-m-d H:00", strtotime($requestTime . "+1 hour"));
    } else {

        $requestTime = date("Y-m-d H:00", strtotime($requestTime));
    }


    try {

        if (!file_exists(ROOT."/jsons/$requestTime.json")) {
            throw new Exception('File not found');
        }

        $get = file_get_contents(ROOT."/jsons/$requestTime.json");

        echo $get;



    } catch (Exception $e) {

        $dirPath = ROOT."/jsons/";


        $files = scandir($dirPath);


        $fileName = pathinfo($files[2], PATHINFO_FILENAME);

        echo json_encode($fileName);

    }







} else {



    $from = strtotime("{$_POST['inputData']} 00:00:00");

    $to = strtotime("{$_POST['inputData']} 23:59:59");



    $readyJson = dateHandler($from, $to);

    echo $readyJson;







}




