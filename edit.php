<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>編輯</title>
</head>

<body>
    <?php include "./include/header.php"; ?>
    <h3 class="text-center text-success border-bottom border-danger" style="font-family:Microsoft JhengHei; font-size: 2rem; padding-bottom:1rem">修改發票</h3>

    <div class="d-flex justify-content-center form-control form-control-lg border-0" placeholder=".form-control-lg ">
        <form name="invoiceForm" action="save_invoice.php" method="post">
            <label for="period">期別:</label>
            <select name="period">
                <option value="1">1,2月</option>
                <option value="2">3,4月</option>
                <option value="3">5,6月</option>
                <option value="4">7,8月</option>
                <option value="5">9,10月</option>
                <option value="6">11,12月</option>
            </select>

            <label for="year">年份:</label>
            <select name="year">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>

            <br>

            <label for="period">獎號:</label>
            <input class="text-center" type="text" size=2 name="code" id="code" >
            <!-- <?php echo $row['expend'] ?> -->
            <input type="number" name="number" value="111" id="number" >

            <br>
            <label for="period">花費:</label>
            <input type="number" name="expend" id="expend" >
            <input type="hidden" name="id" id="id" >
            <input type="submit" value="修改">

            <script>
            function SetPage(form) {
                form.elements['year'].value = <?= $_POST["year"]; ?>;
               
                form.elements['period'].value = <?= $_POST["period"]; ?>;               
                document.getElementsByName('code')[0].value = "<?= $_POST['code'];?>" ;
                document.getElementById('number').value = <?= $_POST["number"]; ?>;
                document.getElementById('expend').value = <?= $_POST["expend"]; ?>;
                document.getElementById('id').value = <?= $_POST["id"]; ?>;
                console.log(form.elements['code'].value);
                console.log(form.elements['number'].value);
            }
            SetPage(document.forms['invoiceForm']);
        </script>
        </form>
       
    </div>
    </div>

</body>

</html>