<?php
include "./com/base.php";

/* $sql="insert into invoice (
    `period`,
    `year`,
    `code`,
    `number`,
    `expend`) values(
    '".$_POST['period']."',
    '".$_POST['year']."',
    '".$_POST['code']."',
    '".$_POST['number']."',
    '".$_POST['expend']."')";

    echo $sql;
    $res=$pdo->exec($sql); */

$data = [  
    'id' => $_POST['id'],
    'period' => $_POST['period'],
    'year' => $_POST['year'],
    'code' => $_POST['code'],
    'number' => $_POST['number'],
    'expend' => $_POST['expend'],
];
$res = save("invoice", $data);
if ($res == 1) {
    echo "<h1 class='m-2 p-2 btn-success border-bottom  d-flex justify-content-center'>新增成功</h1><br>";
} else {
    echo "<h1 class='m-2 p-2 btn-danger border-bottom  d-flex justify-content-center'>新增失敗</h1><br>";
}


?>
<div class="container text-center d-flex justify-content-center ">
<form class="m-1"  action="index.php" method="post">
    <button class="btn btn-info" type="submit">繼續輸入</button>
</form>
<form class="m-1"  action="list.php" method="post">
    <button class="btn btn-info" type="submit" >發票列表</button>
    <input type="hidden" name="period" value="<?=$_POST['period']?>">
    <input type="hidden" name="year" value="<?=$_POST['year']?>">
</form>
</div>