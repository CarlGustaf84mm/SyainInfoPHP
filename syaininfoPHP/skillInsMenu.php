<?php
/*
skillInsMenu.php(社員情報登録　入力画面)

@author 堀光希
@version 2.0
@date    5/22
*/

/* インポート*/
require_once('skillBeans.php');

/* データを受け取る */
session_start();
$skillBeans = new SkillBeans();
if (isset($_SESSION['skillBeans'])) {
    $skillBeans = $_SESSION['skillBeans'];

    /* SESSION変数をクリア */
    unset($_SESSION['skillBeans']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>スキル情報登録</title>
</head>

<body>
    <h2>追加課題 スキル情報登録</h2>
    <form name="myForm1" action="skillInsMain.php" method="post">
        社員番号
        <input type="text" name="syainBangou" size="22" value="<?php print($skillBeans->getsyainBangou()); ?>"required>
        <p />
        資格コード
        <input type="text" name="sikakucode" size="22" value="<?php print($skillBeans->getsikakucode()); ?>"required>
        <p />
        資格取得日
        <input type="date" name="sikakusyutokubi"  size="22" value="<?php print($skillBeans->getsikakusyutokubi()); ?>"required
        >
        <p />
        <br>
        <input type="submit" name="skillBtn1" value="登録">
        <input type="submit" name="skillBtn2" value="クリア">
        <input type="button" value="戻る" onclick="location.href='skillMenu.php'">
    </form>
</body>

</html>