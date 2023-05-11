<?php



function showTable(string $data) {




    $resultData = json_decode($data, true);


    foreach ($resultData as $city => $jkArray) {





        foreach ($jkArray as $jkName => $countArray) {

            echo "<tr>";




            switch ($city) {

                case "СТВ":
                    if($jkName == "ИТОГО") {

                        echo "<td class='stv bold'>$jkName $city</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";


                    } else {

                        echo "<td class='stv'>$jkName</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";

                    }




                    break;


                case "КРД":

                    if($jkName == "ИТОГО") {

                        echo "<td class='krd bold'>$jkName $city</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";
                    } else {

                        echo "<td class='krd'>$jkName</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";

                    }

                    break;



                case "РНД":

                    if($jkName == "ИТОГО") {

                        echo "<td class='rnd bold'>$jkName $city</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
                        echo "<td class='bold'>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";
                    } else {

                        echo "<td class='rnd'>$jkName</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды"]}</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые целевые лиды"]}</td>";
                        echo "<td>{$resultData["$city"]["$jkName"]["Новые лиды по парковкам"]}</td>";

                    }


                    break;




            }






        }






        echo "<tr>";






    }











}



















