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
    <form action="save_number.php" method="post">
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
                <td><input style="width: 25vw" type="number" name="num1"><br>
                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</div>
                </td>

            </tr>
            <tr>
                <td>特獎</td>
                <td><input style="width: 25vw" type="number" name="num2"><br>
                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元</div>
                </td>
            </tr>
            <tr>
                <td>頭獎</td>
                <td>
                    <input style="width: 25vw" type="number" name="num3[]"><br>
                    <input style="width: 25vw" type="number" name="num3[]"><br>
                    <input style="width: 25vw" type="number" name="num3[]"><br>
                    <input style="width: 25vw" type="number" name="num3[]"><br>
                    <input style="width: 25vw" type="number" name="num3[]"><br>
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
                    <input style="width: 25vw" type="number" name="num4[]"><br>
                    <input style="width: 25vw" type="number" name="num4[]"><br>
                    <input style="width: 25vw" type="number" name="num4[]"><br>
                    <input style="width: 25vw" type="number" name="num4[]">
                    <div style="text-align:left ; font-size: 10px">同期統一發票收執聯末3位數號碼與增開六獎號碼相同者各得獎金2百元</div>

                </td>
            </tr>
        </table>
        <div class="d-flex justify-content-center">

            <input href="add_invoice.php" style="font-size: 2rem; margin:1rem; text-decoration:none; width:20vw;" type="submit" value="送出">
        </div>
        <?php
        echo $_GET["year"];
        echo  $_GET["period"];
        $award_numbers = all("award_number", [
            "year" => $_GET["year"],
            "period" => $_GET["period"]
           
            // "type"=>$award_type[1][1]
        ]);
        // echo "<pre>";
        
        // echo  print_r($award_numbers);
        // echo "</pre>";
        ?>
        <script>
    //     function SetPage() {
    //         document.getElementById('year').value = <?= $_GET["year"]; ?>;           
    //         document.getElementById('period').value = <?= $_GET["period"]; ?>;
    //         // document.getElementsByName('code')[0].value = "<?= $_POST['code']; ?>" ;
    //         // document.getElementById('number').value = <?= $_POST["number"]; ?>;
    //         // document.getElementById('expend').value = <?= $_POST["expend"]; ?>;
    //         // document.getElementById('id').value = <?= $_POST["id"]; ?>;
    //         // console.log(form.elements['code'].value);
    //         // console.log(form.elements['number'].value);
    //     };

    //     SetPage();
    // </script>
    </form>
    
</body>

</html>