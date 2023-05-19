<?php
/*
sayinLstDep.php(社員情報一覧　画面表示)

@author 堀光希
@version 2.0
@date    4/21
*/

/* インポート */
require_once('syainBeans.php');

/* データを受け取る */
session_start();
$syainList = array();
if (isset($_SESSION['syainList'])) {
    $syainList = $_SESSION['syainList'];

    /* SESSION変数をクリア */
    unset($_SESSION['syainList']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報一覧</title>
</head>

<body>
    <h2>実習No.6 社員情報一覧</h2>
    <table border="1">
        <thead>
            <tr>
                <th align="center">No.</th>
                <th align="center">社員番号</th>
                <th align="center">社 員 名</th>
            </tr>
        </thead>

        <?php
        if (is_array($syainList)) {
        for ($i = 0; $i < count($syainList); $i++) {
            $syainBeans = new syainBeans();
            $syainBeans = $syainList[$i];
        
        
        ?>
            <tr>
                <td align="center">
                    <?php print($i + 1); ?>
                </td>
                <td align="center">
                    <?php print($syainBeans->getSyainBangou()); ?><!--社員番号表示 -->
                </td>
                <td>
                    <?php print($syainBeans->getSyainMei()); ?><!-- 社員名表示 -->
                </td>
            </tr>
        <?php
        }
    }
        ?>
    </table>
    <p />
    <form name="myForm1">
    <input type="button" onclick="location.href='syainMenu.php'" value="戻る">
    </form>
</body>

</html>