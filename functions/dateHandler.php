<?php
function dateHandler(string $from, string $to): string {




    $pipeLineIds = [

        "СТВ" => ["ВЫСОТА" => 5129982, "ПАРКИНГ ВЫСОТА" => 5133513, "1777" => 4551390, "ПАРКИНГ 1777" => 5521488, "РОССИЙСКИЙ" => 1399423],


        "КРД" => ["ГУБЕРНСКИЙ" => 1393867, "ПАРКИНГ ГУБЕРНСКИЙ" => 4551384, "ДОСТОЯНИЕ" => 3302563, "ПАРКИНГ ДОСТОЯНИЕ" => 4703964, "АРХИТЕКТОР" => 6427297, "ПАРКИНГ АРХИТЕКТОР" => 6427333],

        "РНД" => ["ВЕРЕСАЕВО" => 1399426, "ПАРКИНГ ВЕРЕСАЕВО" => 4551393, "ЛБ" => 4242663, "ПАРКИНГ ЛБ" => 5133726]






    ];



//    $check = [];

    $total = [];


    foreach ($pipeLineIds as $city => $pipelinesArr) {

        $cityTotal = [];


        foreach ($pipelinesArr as $jkName => $jkId) {

            $jkTotal = [];



            $page = 1;

            $newLeads = 0;
            $newCelLead = 0;
            $newLeadParking = 0;

            do {

// ищет сделку по дате, воронке
                $getLeads = searchEntity(CRM_ENTITY_LEAD, $from, $to, $jkId, $page);

                sleep(1);






                if(!empty($getLeads)) {


                    foreach ($getLeads["_embedded"]["leads"] as $getLead) {

                        if($getLead["pipeline_id"] == 4551390) {


                            $check[] = $getLead["name"];
                        }




//                если не парковка
                        if(strpos($jkName, "ПАРКИНГ") === false) {

                            if(!empty($getLead["custom_fields_values"])) {


                                $objectSetStatus = null;


                                foreach ($getLead["custom_fields_values"] as $custom_fields_values) {

                                    if($custom_fields_values["field_id"] == 588783) {

                                        $objectSetStatus = true;

                                        switch ($custom_fields_values["values"][0]["enum_id"]) {

                                            case 1262269:
                                            case 1262273:
                                            case 1262275:
                                                $newCelLead ++;
                                                $newLeads ++;
                                                break;

                                            case 1262271:
                                                $newLeadParking ++;
                                                break;

                                            case 1301438:
                                                $newLeads ++;
                                                break;










                                        }
                                    }


                                }

                                if(!isset($objectSetStatus)) {

                                    $newLeads ++;
                                }

                            } else {

                                $newLeads ++;
                            }


                        } else {

//              тут если парковка
                            $newLeadParking ++;
                        }

                    }


                }


                $page ++;



            } while(!empty($getLeads["_links"]["next"]));

            $jkTotal["Новые лиды по парковкам"] = $newLeadParking;



            if(strpos($jkName, "ПАРКИНГ") === false) {

                $jkTotal["Новые лиды"] = $newLeads;
                $jkTotal["Новые целевые лиды"] = $newCelLead;

            }


            $cityTotal[$jkName] = $jkTotal;






        }


        $total[$city] = $cityTotal;


    }





    foreach ($total as $city => $jkArr) {


        foreach ($jkArr as $jkName => $leadsCount) {

            switch ($jkName) {

                case "ПАРКИНГ ВЫСОТА":
                    $total["СТВ"]["ВЫСОТА"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;

                case "ПАРКИНГ 1777":
                    $total["СТВ"]["1777"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;

                case "ПАРКИНГ ГУБЕРНСКИЙ":
                    $total["КРД"]["ГУБЕРНСКИЙ"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;

                case "ПАРКИНГ ДОСТОЯНИЕ":
                    $total["КРД"]["ДОСТОЯНИЕ"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;

                case "ПАРКИНГ АРХИТЕКТОР":
                    $total["КРД"]["АРХИТЕКТОР"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;


                case "ПАРКИНГ ВЕРЕСАЕВО":
                    $total["РНД"]["ВЕРЕСАЕВО"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;


                case "ПАРКИНГ ЛБ":
                    $total["РНД"]["ЛБ"]["Новые лиды по парковкам"] += $leadsCount["Новые лиды по парковкам"];
                    break;


            }




        }






    }



    $res = [];


    foreach ($total as $city => $jkArr) {

        $newJkArr = [];


        $newLeads = 0;
        $newCelLead = 0;
        $newLeadParking = 0;

        foreach ($jkArr as $jkName => $leadsCount) {

            if(strpos($jkName, "ПАРКИНГ") === false) {

                $newLeads += $leadsCount["Новые лиды"];
                $newCelLead += $leadsCount["Новые целевые лиды"];
                $newLeadParking += $leadsCount["Новые лиды по парковкам"];

                $newJkArr[$jkName] = $leadsCount;

            }



        }

        $newJkArr["ИТОГО"] = ["Новые лиды" => $newLeads, "Новые целевые лиды" => $newCelLead,
            "Новые лиды по парковкам" => $newLeadParking];


        $res[$city] = $newJkArr;



    }

//    echo "<pre>";
//    print_r($check);
    return json_encode($res);



}