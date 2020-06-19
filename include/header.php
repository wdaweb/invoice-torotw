<!-- <link rel="stylesheet" href="/Public/img/main.css"> -->



<?php
    if (!isset($_POST['year'])) {
        $_POST['year'] = date("Y");
        $_POST['period'] = ceil(date("n") / 2);
    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 <h1 class="p-4 text-center bg-dark text-warning">~集合啦!!大家來對發票~</h1>
 
<div class="header" >
    <ul class="d-flex justify-content-center  ">
    <li class="btn-primary border border-secondary " ><a href="index.php" class="text-warning ">輸入發票</a></li>
        <li class="btn-primary border border-secondary"><a href="list.php" class="text-warning">發票列表</a></li>
        <li class="btn-primary border border-secondary" ><a href="invoice.php" class="text-warning">各期獎號</a></li>
        <li class="btn-primary border border-secondary" ><a href="add_invoice.php" class="text-warning">修改開獎號碼</a></li>
        <li class="btn-primary border border-secondary" ><a href="award.php" class="text-warning">對獎</a></li>
        
    </ul>
</div>
<form class=" text-center d-flex justify-content-center border-bottom border-danger" style="margin:1rem; padding:1rem" name="invoiceForm" action="?" method="post">

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
             let year=<?= $_POST["year"]; ?>;
             let period=<?= $_POST["period"]; ?>;
                    form.elements['year'].value =year;    
                    form.elements['period'].value =period;
    
            }
            SetPage(document.forms['invoiceForm']);
            
        </script>


    </form>