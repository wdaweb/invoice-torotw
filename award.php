<?php include_once "com/base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "./include/header.php"; ?>
    <h3 class="text-center text-success  " style="font-family:Microsoft JhengHei; font-size: 2rem;">選擇統一發票對獎年月份</h3>

    <?php
    $period = ceil(date("n") / 2);
    // 預設為最近的年月份
    if (isset($_POST['period'])) {
        $period = $_POST['period'];
    } else {
        $_POST['period'] = ceil(date("n") / 2);
    }
    if (!isset($_POST['year'])) {
        $_POST['year'] = date("Y");
    }
    //$sql="select * from invoice where period='$period'";


    ?>
    <table class="text-center d-flex justify-content-center  m-1">
        <tr style="width: 30vw; font-size: 3rem">
            <td class="border" colspan="4">
                <?php

                echo $_POST["year"] . " 年 ";
                switch ($_POST["period"]) {
                    case 1:
                        echo "1、2 月";
                        break;

                    case 2:
                        echo "3、4 月";
                        break;

                    case 3:
                        echo "5、6 月";
                        break;

                    case 4:
                        echo "7、8 月";
                        break;

                    case 5:
                        echo "9、10 月";
                        break;

                    case 6:
                        echo "11、12 月";
                        break;
                }

                ?>
            </td>
        </tr>
        <tr class="border" style="width: 30vw; font-size: 2rem">
            <td class="border" style="width:5rem "> 中獎發票號碼 </td>
            <td class="border" style="width:5rem"> 中獎金額 </td>


        </tr>
        <?php
        $award_type = [
            1 => ["特別獎", 1, 8],
            2 => ["特獎", 2, 8],
            3 => ["頭獎", 3, 8],
            4 => ["二獎", 3, 7],
            5 => ["三獎", 3, 6],
            6 => ["四獎", 3, 5],
            7 => ["五獎", 3, 4],
            8 => ["六獎", 3, 3],
            9 => ["增開六獎", 4, 3],
        ];
        // 抓出對獎號碼
        $award_numbers = all("award_number", [
            "year" => $_POST["year"],
            "period" => $_POST["period"]
            // "type"=>$award_type[1][1]
        ]);





        // 抓出發票
        $invoices = all("invoice", [
            "year" => $_POST["year"],
            "period" => $_POST["period"]
            // "type"=>$award_type[1][1]
        ]);




        // echo "<pre>獎號";
        // print_r($award_numbers);
        // echo "</pre>";



        // echo "<pre>發票";
        // print_r($invoices);
        // echo "</pre>";


        // 對選擇的期數的發票





        // foreach ($invoices as $in) {
        //     // 對開獎號碼
        //     foreach ($award_numbers as $index) {
        //         $len = $award_type[$index['type']][2];
        //         $start = 8 - $len;
        //          echo "<pre>";
        // print_r($award_numbers["nmuber"]);
        // echo "</pre>";
        //         if ($award_numbers['type']!= 9) {
        //             $target_num = mb_substr($$award_numbers["nmuber"], $start, $len);
        //         } else {
        //             $target_num = $award_numbers["nmuber"];
        //         }
        //     //  echo   $invoices."12313131321321";
        //         if (mb_substr($in['number'], $start, $len) == $target_num) {
        //             // echo "<span style='color:red;font-size:20px'>" . $invoices['number'] . "中獎了</span>";
        //             // echo "<br>";
        //             $nn = $in['number'];
        //         }
        //     }





        // echo $award_numbers;

        // $t_num = [];
        // foreach ($award_numbers as $num) {
        //     if (!empty($num['number'])) {
        //         echo $award_type[$num['type']][0];
        //         echo ":   " . $num['number'] . "<br>";
        //     }

        //     // $t_num[]=$num['number'];
        // }


        // foreach ($invoices as $ins) {

        //     foreach ($t_num as $tn) {

        //         $len = $award_type[$aw][2];
        //         $start = 8 - $len;

        //         //針對增開六獎號特別處理
        //         if ( != 9) {
        //             $target_num = mb_substr($tn, $start, $len);
        //         } else {
        //             $target_num = $tn;
        //         }

        //         if (mb_substr($ins['number'], $start, $len) == $target_num) {
        //             echo "<span style='color:red;font-size:20px'>" . $ins['number'] . "中獎了</span>";
        //             echo "<br>";
        //            $nn= $ins['number'] ;
        //         }
        //     }
        // }


        foreach ($invoices as $ins) {
            // echo "<pre>票號";
            // print_r($ins["number"]);
            // echo "</pre>";

            foreach ($award_numbers as $aw) {

                if ($ins["number"] == $aw["number"]) {                    // echo "中獎";

                    echo "<tr class='border' style='width: 30vw; font-size: 2rem'>";
                    echo "<td class='border' style='width:8rem'>" . $ins['number'] . "</td>";
                    echo "<td class='border' style='width:8rem'>中大獎</td></tr>";

                    //   $winNum=$ins["number"];
                }
                // echo "<pre>獎號";
                // print_r($aw["number"]);
                // echo "</pre>";
            }
        }
        ?>

        
    </table>


</body>

</html>