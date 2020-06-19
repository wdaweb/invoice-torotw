<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/style.css">
   
</head>
<body>


<?php include "./include/header.php";?>
<h3 class="text-center text-success border-bottom border-danger" style="font-family:Microsoft JhengHei; font-size: 2rem; padding-bottom:1rem">新增發票</h3>



<div class="d-flex justify-content-center form-control form-control-lg border-0" placeholder=".form-control-lg " >
<form name="invoiceForm"  action="save_invoice.php" method="post">
<form class=" text-center d-flex justify-content-center border-bottom border-danger" style="margin:1rem; padding:1rem" name="invoiceForm"  method="post">
<label for="period">期別:</label>
    <select  name="period" >
        <option value="1" >1,2月</option>
        <option value="2">3,4月</option>
        <option value="3">5,6月</option>
        <option value="4">7,8月</option>
        <option value="5">9,10月</option>
        <option value="6">11,12月</option>
    </select>
    
    <label for="year">年份:</label>
    <select  name="year">
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
    </select>
    <br>
    
    <label for="period">獎號:</label>
    <input class="text-center" type="text" size=2 name="code" placeholder="英文">
    <input type="number" name="number" placeholder="請輸入發票的數字">   
    
    <br>
    <label for="period" >花費:</label>
    <input type="number" name="expend" placeholder="請輸入消費金額">
    <input type="submit" value="儲存">

   
</form>
</div>

</body>
</html>