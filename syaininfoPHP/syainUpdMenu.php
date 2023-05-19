<?php
/*
syainUpdMenu.php (社員情報更新　入力画面)

@author 堀光希
@version 2.0
@date    5/10
*/

/* インポート */
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Trasitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報更新</title>
</head>
<body>
<h2>実習No.9 社員情報更新</h2>
<form name ="myForm1" action = "syainUpdMain.php" method = "post">
        社員番号<input type="text" name="syainBangou" size="22" value="<?php print($syainBeans->getSyainBangou()); ?>" />
        <p />
        <p />
        社 員 名
        <input type="text" name="syainMei" size="22" value="<?php print($syainBeans->getSyainMei()); ?>" />
        <p />
        <input type="submit" name="cmdBtn1" value="更新">
        <input type="submit" name="cmdBtn2" value="クリア">
        <input type="button" onclick="location.href='syainMenu.php'" value="戻る">
</form>
</body>
</html>