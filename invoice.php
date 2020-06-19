<?php include_once "./com/base.php";
$period = ceil(date("n") / 2);

$monthStr = [
    '1' => "1、2月",  
    '2' => "3、4月",
    '3' => "5、6月",
    '4' => "7、8月",
    '5' => "9、10月",
    '6' => "11、12月",
];

if (isset($_POST['period'])) {
    $period = $_POST['period'];
}
if (!isset($_POST['year'])) {
    $_POST['year'] = date("Y");
}


?>
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
    <h3 class="text-center text-success  " style="font-family:Microsoft JhengHei; font-size: 2rem;">統一發票開獎號碼單</h3>



    <!-- <script>

    var obj=document.getElementById('selectYear');
    var index=obj.selectedIndex; //序号，取当前选中选项的序号
    var year = obj.options[index].value;
    function qyear(){
        var index=obj.selectedIndex;
        var year = obj.options[index].value;  
        console.log(year);
    };
    
</script> -->



    <form class=" text-center d-flex justify-content-center border-bottom border-danger" style="margin:1rem; padding:1rem" name="invoiceForm" action="invoice.php" method="post">

        <label class="btn btn-outline-secondary" for="year">
            <select class="btn btn-info" name="year" value=<?= $_POST["year"] ?>>
                <option value="2020">2020年</option>
                <option value="2021">2021年</option>
                <option value="2022">2022年</option>
            </select>

            <button class="btn btn-info" type="submit" name="period" value="1">1、2月</button>
            <button class="btn btn-info" type="submit" name="period" value="2">3、4月</button>
            <button class="btn btn-info" type="submit" name="period" value="3">5、6月</button>
            <button class="btn btn-info" type="submit" name="period" value="4">7、8月</button>
            <button class="btn btn-info" type="submit" name="period" value="5">9、10月</button>
            <button class="btn btn-info" type="submit" name="period" value="6">11、12月</button>
        </label>
        <!--  -->

        <script>
            function SetPage(form) {
                form.elements['year'].value = <?= $_POST["year"]; ?>;
            }
            SetPage(document.forms['invoiceForm']);
        </script>


    </form>
    <?php

    $num1 = find('award_number', ['period' => $period, 'year' => $_POST["year"], 'type' => 1]); //單筆
    $num2 = find('award_number', ['period' => $period, 'year' => $_POST["year"], 'type' => 2]); //單筆
    $num3 = all('award_number', ['period' => $period, 'year' => $_POST["year"], 'type' => 3]); //多筆
    $num4 = all('award_number', ['period' => $period, 'year' => $_POST["year"], 'type' => 9]); //多筆

    ?>


    <table class="invoice-table text-center d-flex justify-content-center " style="font-size: 2em; margin:1rem ">
        <tr style="width: 50vw ">
            <td style="width:10vw ">獎項</td>
            <td style="width:30vw "><?= $_POST["year"]; ?> 年 <?= $monthStr[$period]; ?></td>
            <!-- <td style="width:10vw ">修改</td> -->
        </tr>
        <tr>
            <td>特別獎</td>
            <td><?php

                if (!empty($num1['number'])) {
                    echo $num1['number'];
                };

                ?>
                <div style="text-align:left ; font-size: 0.5em">同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</div>
            </td>
            <!-- <td><a href="award.php?aw=1&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>
        <tr >
            <td>特獎</td>
            <td><?php
                if (!empty($num2['number'])) {
                    echo $num2['number'];
                };

                ?>
                <div style="text-align:left ; font-size: 0.5em">同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元</div>
            </td>

            <!-- <td><a href="award.php?aw=2&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>
        <tr>
            <td>頭獎</td>
            <td>
                <?php
                foreach ($num3 as $num) {
                    if (!empty($num['number'])) {
                        echo $num['number'] . "<br>";
                    };                    
                }
                ?>
                <div style="text-align:left ; font-size: 0.5em">同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元</div>

            </td>
            <!-- <td><a class="btn btn-success m-1" href="edit.php?period=<?=$_GET['period']?>&id=<?=$invoice['id']?>">修改</a><a class="btn btn-success m-1" href="my_invoice.php?period=<?=$_GET['period']?>&del=<?=$invoice['id']?>">刪除</a></td> -->
        </tr>
        <tr>
            <td>二獎</td>
            <td style="text-align:left ; font-size: 0.5em">同期統一發票收執聯末7位數號碼與頭獎中獎號碼末7位相同者各得獎金4萬元</td>
    
            <!-- <td><a class="btn btn-success m-1" href="edit.php?period=<?=$_GET['period']?>&id=<?=$invoice['id']?>">修改</a><a class="btn btn-success m-1" href="my_invoice.php?period=<?=$_GET['period']?>&del=<?=$invoice['id']?>">刪除</a></td> -->
        </tr>
        <tr>
            <td>三獎</td>
            <td style="text-align:left ; font-size: 0.5em">同期統一發票收執聯末6位數號碼與頭獎中獎號碼末6位相同者各得獎金1萬元</td>
  
            <!-- <td><a href="award.php?aw=5&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>
        <tr>
            <td>四獎</td>
            <td style="text-align:left ; font-size: 0.5em">同期統一發票收執聯末5位數號碼與頭獎中獎號碼末5位相同者各得獎金4千元</td>
    
            <!-- <td><a href="award.php?aw=6&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>
        <tr>
            <td>五獎</td>
            <td style="text-align:left ; font-size: 0.5em">同期統一發票收執聯末4位數號碼與頭獎中獎號碼末4位相同者各得獎金1千元</td>
    
            <!-- <td><a href="award.php?aw=7&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>
        <tr>
            <td>六獎</td>
            <td style="text-align:left ; font-size: 0.5em">同期統一發票收執聯末3位數號碼與頭獎中獎號碼末3位相同者各得獎金2佰元</td>      
            <!-- <td><a href="award.php?aw=8&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>
        <tr>
            <td style="font-size: 0.7em">增開六獎</td>
            <td>
                <?php
                    foreach ($num4 as $num) {
                        if (!empty($num['number'])) {
                            echo $num['number'] . "<br>";
                        };                    
                    }
               

                ?>
                <div style="text-align:left ; font-size: 0.5em">同期統一發票收執聯末3位數號碼與增開六獎號碼相同者各得獎金2百元</div>
            
            </td>
            <!-- <td><a href="award.php?aw=9&year=<?= $_POST["year"]; ?>&period=<?= $period; ?>">對獎</a></td> -->
        </tr>

    </table>
    <a class="d-flex justify-content-center" href="add_invoice.php?year=<?= $_POST["year"]; ?>&period=<?= $period; ?>" style="font-size: 3rem; margin:1rem; text-decoration:none;"><button>新增/修改</button></a>
</body>

</html>