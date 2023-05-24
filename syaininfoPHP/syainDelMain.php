<?php
/* 
syainDelMain.php (社員情報削除　メイン)

@author 堀光希
@version 2.0
@date    5/15
*/

header('Content-Type:text/plain; charset=utf-8');

/* インポート */
require_once('syainSQL.php');
require_once('syainBeans.php');
require_once('utilConnDB.php');
/* インスタンス生成 */
$syainSQL   = new SyainSQL;
$syainBeans = new SyainBeans;
$utilConnDB = new UtilConnDB;

/* HTMLからデータを受け取る */
$syainBangou = htmlspecialchars($_POST['syainBangou'], ENT_QUOTES, 'utf-8'); //社員番号

/*/* ボタン識別 */
$cmdBtnNo = 0;
for ($cmdBtnNo = 1; $cmdBtnNo <= 3; $cmdBtnNo++) {
    if ($_POST['cmdBtn' . $cmdBtnNo]) {
        break;
    }
}

/* main */
switch ($cmdBtnNo) {
    case 1: //削除ボタン

        /* 入力データをBeansにセット */
        $syainBeans->setSyainBangou($syainBangou); //社員番号

        /* DB接続 */
        $pdo = $utilConnDB->connect();

        /* SQL文実行 */
        $recCount = $syainSQL->delete($pdo, $syainBeans);
        if ($recCount == 1) {
            $utilConnDB->commit($pdo); //コミット
            $syainBeans->syainBeansClear();
        } else {
            $utilConnDB->rollback($pdo); //ロールバック
            $syainBeans->setSyainBangou("社員番号が登録されていません");
        }

        /* DB切断 */
        $utilConnDB->disconnect($pdo);

        /* データを渡す */
        session_start();
        $_SESSION['syainBeans'] = $syainBeans;
        break;

    case 2: //クリアボタン
        /* SESSION変数をクリア */
        session_start();
        unset($_SESSION['syainBeans']);
        break;

    default:
        break;
}

/* 次に実行するモジュール */
header('Location: syainDelMenu.php');
?>
