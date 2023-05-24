<?php
/*
srchMain.php(社員スキル検索　メイン)

@author 堀光希
@version 2.0
@date    5/18
*/

header('Content-Type:text/plain; charset=utf-8');

/* インポート */
require_once('srchSQL.php');
require_once('srchBeans.php');
require_once('utilConnDB.php');
/* インスタンス生成 */
$srchSQL   = new SrchSQL();
$srchBeans = new SrchBeans();
$utilConnDB = new UtilConnDB();

/* HTMLからデータを受け取る */
$syainMei    = htmlspecialchars($_POST['syainMei'], ENT_QUOTES, 'utf-8'); //社員名
$sikakuMei   = htmlspecialchars($_POST['sikakuMei'], ENT_QUOTES, 'utf-8'); //資格名
$srchState  = htmlspecialchars($_POST['rdBtn1'],    ENT_QUOTES, 'utf-8'); // 検索方法

/* DB接続 */
$pdo = $utilConnDB->connect();

/* 処理詳細 */
$srchBeans->setSyainMei($syainMei);
$srchBeans->setSikakuMei($sikakuMei);

$srchList =array();
$srchList = $srchSQL->select($pdo, $srchState, $srchBeans);

/* DB切断 */
$utilConnDB->disconnect($pdo);

/* データを渡す */
session_start();
$_SESSION['srchList'] = $srchList;

/* 次に実行するモジュール */
header('Location: srchDsp.php');
?>