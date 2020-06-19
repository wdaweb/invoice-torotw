<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增開獎獎號</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php include_once "com/base.php"; ?>
    <?php include "./include/header.php"; ?>




    <form action="?" method="post">
        <table class="invoice-table text-center d-flex justify-content-center ">
            <tr>
                <td style="width:10vw ;">年月份</td>
                <td style="width:25vw ;">
                    <select class="btn btn-dark" name="year" id="year">
                        <option value="2020">2020年</option>
                        <option value="2021">2021年</option>
                        <option value="2022">2022年</option>
                    </select>
                    <select class="btn btn-dark" name="period" id="period">
                        <option value="1">1,2月</option>
                        <option value="2">3,4月</option>
                        <option value="3">5,6月</option>
                        <option value="4">7,8月</option>
                        <option value="5">9,10月</option>
                        <option value="6">11,12月</option>

                    </select>

                </td>
            </tr>
            <tr>
                <td>特別獎</td>
                <td><input style="width: 25vw" type="number" id="num0"><br>
                    <input type="hidden" name="no0" id="no0">
                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</div>
                </td>

            </tr>
            <tr>
                <td>特獎</td>
                <td><input style="width: 25vw" type="number" id="num1"><br>
                    <input type="hidden" name="no1" id="no1">
                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元</div>
                </td>
            </tr>
            <tr>
                <td>頭獎</td>
                <td>
                    <input style="width: 25vw" type="number" id="num2"><br>
                    <input style="width: 25vw" type="number" id="num3"><br>
                    <input style="width: 25vw" type="number" id="num4"><br>
                    <input style="width: 25vw" type="number" id="num5"><br>
                    <input style="width: 25vw" type="number" id="num6"><br>
                    <input type="hidden" name="no2" id="no2">
                    <input type="hidden" name="no3" id="no3">
                    <input type="hidden" name="no4" id="no4">
                    <input type="hidden" name="no5" id="no5">
                    <input type="hidden" name="no6" id="no6">

                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元</div>
                </td>
            </tr>
            <tr>
                <td>二獎</td>
                <td style="text-align:left ; font-size: 10px">同期統一發票收執聯末7位數號碼與頭獎中獎號碼末7位相同者各得獎金4萬元</td>
            </tr>
            <tr>
                <td>三獎</td>
                <td style="text-align:left ; font-size: 10px">同期統一發票收執聯末6位數號碼與頭獎中獎號碼末6位相同者各得獎金1萬元</td>
            </tr>
            <tr>
                <td>四獎</td>
                <td style="text-align:left ; font-size: 10px">同期統一發票收執聯末5位數號碼與頭獎中獎號碼末5位相同者各得獎金4千元</td>
            </tr>
            <tr>
                <td>五獎</td>
                <td style="text-align:left ; font-size: 10px">同期統一發票收執聯末4位數號碼與頭獎中獎號碼末4位相同者各得獎金1千元</td>
            </tr>
            <tr>
                <td>六獎</td>
                <td style="text-align:left ; font-size: 10px">同期統一發票收執聯末3位數號碼與頭獎中獎號碼末3位相同者各得獎金2佰元</td>

            </tr>
            <tr>
                <td>增開六獎</td>
                <td>
                    <input style="width: 25vw" type="number" id="num7"><br>
                    <input style="width: 25vw" type="number" id="num8"><br>
                    <input style="width: 25vw" type="number" id="num9"><br>
                    <input style="width: 25vw" type="number" id="num10">
                    <input type="hidden" name="no7" id="no7">
                    <input type="hidden" name="no8" id="no8">
                    <input type="hidden" name="no9" id="no9">
                    <input type="hidden" name="no10" id="no10">
                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯末3位數號碼與增開六獎號碼相同者各得獎金2百元</div>

                </td>
            </tr>
        </table>
        <div class="d-flex justify-content-center">

            <input style="font-size: 2rem; margin:1rem; text-decoration:none; width:20vw;" type="submit" value="送出">
        </div>
        <?php
        echo $_POST["year"];
        echo  $_POST["period"] . "<hr>";
        $award_numbers = all("award_number", [
            "year" => $_POST["year"],
            "period" => $_POST["period"]
            // "type"=>$award_type[1][1]
        ]);
     
        echo $award_numbers[1]["id"] . "前面啦";
        echo "<pre>";

        print_r($award_numbers);
        echo "</pre>";
        ?>
        <script>
            function SetPage() {

                document.getElementById('year').value = <?= $_POST["year"]; ?>;
                document.getElementById('period').value = <?= $_POST["period"]; ?>;
                 <?php 
                 
                 if(!empty($award_numbers)){
                 for ($i = 0; $i <= 10; $i++) {
                  
                    $str = $award_numbers[$i]['number'];
                    $id = $award_numbers[$i]['id'];
                
                    
                    
                    if (!empty($str)) {
                        echo "document.getElementById('num".$i."').value =" . $str . ";";
                    }
                    if (!empty($id)) {
                        echo "document.getElementById('no" . $i . "').value =" . $id . ";";
                    }
                }
                }
           

                ?>



                // console.log(22324324);


            };

            SetPage();
        </script>
    </form>

    <?php
    for ($i = 0; $i <= 10; $i++) {
        $data = [
            'id' => $_POST["no0"],
            // 'number' => $_POST["num['$i']"]
        ];

        echo $data["id"];
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        // save("award_number", $data);

    }

    ?>



</body>

</html>