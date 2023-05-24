<?php
/*
skillInsMain.php(スキル情報登録　メイン)

@author 堀光希
@version 2.0
@date    5/22
*/

header('Content-Type:text/plain; charset=utf-8');

/* インポート */
require_once('skillSQL.php');
require_once('skillBeans.php');
require_once('utilConnDB.php');

$utilConnDB = new UtilConnDB();
$pdo = $utilConnDB->connect();

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* インスタンス生成 */
$skillSQL   = new SkillSQL();
$skillBeans = new SkillBeans();
$utilConnDB = new UtilConnDB();
$date       = new DateTime();
$date       = $date->format('y-m-d');


/* 入力値の正規表現 */
const REGEX_SYAINBANGOU = '/^[0-9]{5}$/';          // 社員番号(5桁の数字)
const REGEX_SIKAKUCODE = '/^[0-9]{3,4}$/';        // 資格コード(3~4桁の数字)
const REGEX_SIKAKUSYUTOKUBI = '/^\d{4}-\d{2}-\d{2}$/';  // 資格取得日(YYYY-MM-DD)

/* 入力値の受け取り */



/* HTMLからデータを受け取る */
$syainBangou        = htmlspecialchars($_POST['syainBangou'], ENT_QUOTES, 'utf-8'); //社員番号
$sikakucode         = htmlspecialchars($_POST['sikakucode'], ENT_QUOTES, 'utf-8'); //資格コード
$sikakusyutokubi    = htmlspecialchars($_POST['sikakusyutokubi'], ENT_QUOTES, 'utf-8'); //資格コード

list($syutokubiYear,$syutokubiMonth,$syutokubiDate) = explode('-', $sikakusyutokubi);

/* ボタン識別 */
$skillBtnNo = 0;
for ($skillBtnNo = 1; $skillBtnNo <= 3; $skillBtnNo++) {
    if ($_POST['skillBtn' . $skillBtnNo]) {
        break;
    }
}

/* main */
switch ($skillBtnNo) {
    case 1: //登録ボタン
        /* 入力データをBeansにセット */
        $skillBeans->setSyainBangou($syainBangou);
        $skillBeans->setsikakucode($sikakucode);
        $skillBeans->setsikakusyutokubi($sikakusyutokubi);

        /* DB接続 */
        $pdo = $utilConnDB->connect();

        /* SQL文実行 */
        $success = $skillSQL->insert($pdo, $skillBeans);
        if ($success) {
            $utilConnDB->commit($pdo); //コミット
            $skillBeans->skillBeansClear();
        } else {
            $utilConnDB->rollback($pdo);
            $skillBeans->setsikakucode("スキルが登録済みです");
        }

        /* DB切断 */
        $utilConnDB->disconnect($pdo);

        /* データを渡す */
        session_start();
        $_SESSION['skillBeans'] = $skillBeans;
        break;

    case 2: //クリアボタン
        /* SESSION変数をクリア */
        session_start();

        unset($_SESSION['skillBeans']);
        break;

    default:
        break;
}

/* 次に実行するモジュール */
header('Location: skillInsMenu.php');
