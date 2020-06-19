<?php include_once "./com/base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php include "./include/header.php";
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

    ?>

    <h3 class="text-center text-success" style="font-family:Microsoft JhengHei; font-size: 2rem;">已輸入發票總覽</h3>
    
    <?php

    //$sql="select * from invoice where period='$period'";
    $rows = all('invoice', ['period' => $period]);

    ?>
    <table class="text-center d-flex justify-content-center " style=" margin:1rem;font-size: 3em ">
        <tr style="width: 50vw;  font-size: 1em">
            <td class="border" colspan="6">
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
        <tr class="border" style="width: 40vw; font-size: 0.7em">
            <td class="border"> 編號 </td>
            <td class="border"> 標記 </td>
            <td class="border"> 號碼 </td>
            <td class="border"> 花費 </td>
            <td class="border"> 編輯 </td>

        </tr>
        <?php
        foreach ($rows as $row) {
        ?>
            <tr class="border" style="width: 50vw; font-size: 0.7em">
                <td class="border"><?= $row['id']; ?></td>
                <td class="border"><?= $row['code']; ?></td>
                <td class="border"><?= $row['number']; ?></td>
                <td class="border"><?= $row['expend']; ?></td>
                
                    <td class="border">
                        <form name="invoiceForm" action="edit.php" method="post">
                        <button class="btn btn-success m-1 d-inline-block" style="font-size: 0.4em;" type="submit">修改</button>                       
                        <input type="hidden" name="period" value="<?= $row['period'] ?>">
                        <input type="hidden" name="year" value="<?= $_POST['year'] ?>">
                        <!-- <?php
                        echo $row['year'];
                        ?> -->
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="code" value="<?= $row['code'] ?>">
                        <input type="hidden" name="number" value="<?= $row['number'] ?>">
                        <input type="hidden" name="expend" value="<?= $row['expend'] ?>">
                        </form>




                        <form name="invoiceForm" action="edit.php" method="post">
                         <button class="btn btn-success m-1 d-inline-block" style="font-size: 0.4em;" type="submit">刪除</button>                     
                        <input type="hidden" name="period" value="<?= $row['period'] ?>">
                        <input type="hidden" name="year" value="<?= $row['year'] ?>">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        </form>

                    </td>

                   
                
            </tr>
        <?php
        }
        ?>
    </table>


</body>

</html>