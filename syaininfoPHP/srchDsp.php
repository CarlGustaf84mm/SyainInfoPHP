<?php
/* srchDsp.php(社員スキル検索　表示画面)

@author 堀光希
@version 2.0
@date    5/18
*/

/* インポート */
require_once('srchBeans.php');

/* データを受けとる */
session_start();
$srchList = array();
if(isset($_SESSION['srchList'])) {
    $srchList = $_SESSION['srchList'];
    
    /* SESSION変数をクリア */
    unset($_SESSION['srchList']);
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員スキル検索</title>
</head>
<body>
    <h2>実習No.11 社員スキル検索</h2>
    <table border = "1">
        <tr>
        <th align="center" class="No">No.</th>	
          <th align="center">社員番号</th>
          <th align="center">社 員 名</th>
          <th align="center">資格略称</th>
          <th align="center">資格取得日</th>
        </tr>
        <?php
        for ($i = 0; $i < count($srchList); $i++) {
            $srchBeans = new SrchBeans();
            $srchBeans = $srchList[$i];
?>
<tr>
    <td align="center">
        <?php print($i + 1); ?>
    </td>
    <td align="center">
        <?php print($srchBeans->getSyainBangou()); ?>
    </td>
    <td>
    <?php print($srchBeans->getSyainMei()); ?>
    </td>
    <td>
    <?php print($srchBeans->getSikakuRyakusyou()); ?>
    </td>
    <td align="center">
    <?php print($srchBeans->getSikakuSyutokubi()); ?>
    </td>
</tr>
<?php
        }
        ?>
        </table>
        <p />
        <form name="myForm1">
            <input type="button" value="戻る" onclick="javascript:location='srchMenu.php'">
        </form>
</body>
</html>