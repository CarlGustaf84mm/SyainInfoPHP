<?php
/*
srchMenu.php(社員スキル検索　入力画面)

@author 堀光希
@version 2.0
@date    5/18
*/

/* インポート */
require_once('srchBeans.php');

/* データを受けとる */
session_start();
$srchBeans = new SrchBeans();
if (isset($_SESSION['srchBeans'])) {
    $srchBeans = $_SESSION['srchBeans'];

    /* SESSION変数をクリア */
    unset($_SESSION['srchBeans']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員スキル検索</title>
</head>

<body>
    <h2>実習No.11 社員スキル検索</h2>

    <form name="myForm1" action="srchMain.php" method="post">
        社 員 名
        <input type="text" name="syainMei" size="40" value="<?php print($srchBeans->getSyainMei()); ?>" />
        <p />
        資 格 名
        <input type="text" name="sikakuMei" size="40" value="<?php print($srchBeans->getSikakuMei()); ?>" />
        <p />
        <input type="radio" name="rdBtn1" value="AND" checked="checked" />AND検索&nbsp;&nbsp;
        <input type="radio" name="rdBtn1" value="OR" />OR検索<br />
        <br />
        <input type="submit" name="cmdBtn1" value="検索" />
        <input type="reset" name="cmdBtn2" value="クリア" />
        <input type="button" value="戻る" onclick="javascript:location='index.html'" />
        </form>
    </body>
</html>