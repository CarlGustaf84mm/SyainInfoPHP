<?php
/* 
syainDelMenu.php


 @author  堀光希
 @version 2.0
 @date    5/15

*/

/* インポート */
require_once('syainBeans.php');

/* データを受け取る */
session_start();
$syainBeans = new SyainBeans();
if (isset($_SESSION['syainBeans'])) {
    $syainBeans = $_SESSION['syainBeans'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Trasitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報削除</title>
</head>

<body>
    <h2>実習No.10 社員情報削除</h2>
    <form name="myForm1" action="syainDelMain.php" method="post">
        社員番号
        <input type="text" name="syainBangou" size="22" value="<?php print($syainBeans->getSyainBangou()); ?>" />
        <p />      
        <input type="submit" name="cmdBtn1" value="削除" onclick="return checkDel()">
        <input type="submit" name="cmdBtn2" value="クリア">
        <input type="button" value="戻る" onclick="location.href='syainMenu.php'">
    </form>
    <form name="myForm2" action="syainDelMain.php" method="post">
        <input type="hidden" name="cmdBtn2" value="クリア" />
    </form>
    <script language="javascript">
        /* 削除ボタン */
        function checkDel() {
            const answer = confirm('削除してもよろしいですか？');
            var flag = answer;
            return flag;

        }
        /* クリアボタン */
        function checkClr() {
            document.myForm2.submit();
        }
    </script>
</body>

</html>