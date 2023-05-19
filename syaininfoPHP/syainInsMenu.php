<?php
/*
syainInsMenu.php(社員情報登録　入力画面)

@author 堀光希
@version 2.0
@date    4/28
*/

/* インポート*/
require_once('syainBeans.php');

/* データを受け取る */
session_start();
$syainBeans = new SyainBeans();
if (isset($_SESSION['syainBeans'])) {
    $syainBeans = $_SESSION['syainBeans'];

    /* SESSION変数をクリア */
    unset($_SESSION['syainBeans']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報登録</title>
</head>

<body>
    <h2>実習No.8 社員情報登録</h2>
    <form name="myForm1" action="syainInsMain.php" method="post">
        社員番号
        <input type="text" name="syainBangou" size="22" value="<?php print($syainBeans->getSyainBangou()); ?>" />
        <p />
        社 員 名
        <input type="text" name="syainMei" size="22" value="<?php print($syainBeans->getSyainMei()); ?>" />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <p />
        <br>
        <input type="submit" name="cmdBtn1" value="登録">
        <input type="submit" name="cmdBtn2" value="クリア">
        <input type="button" value="戻る" onclick="location.href='syainMenu.php'">
    </form>
</body>

</html>