<?php
/*
syainLstMain.php(社員情報一覧　メイン)

@author 堀光希
@version 2.0
@date    4/21
*/

header('Content-Type:text/plain; charset=utf-8');

/* インポート */
require_once('syainSQL.php');
require_once('utilConnDB.php');

/* インスタンス生成 */
$syainSQL =   new SyainSQL();
$utilConnDB = new UtilConnDB();

/* main */
/* DB接続 */
$pdo = $utilConnDB->connect();

/*
*SQL文実行
* 社員表を読込、ArrayListクラスに登録して戻す
*/
$syainList = array();
$syainList =  $syainSQL->selectAll($pdo);

/* DB切断 */
$utilConnDB->disconnect($pdo);

/* データを渡す */
session_start();
$_SESSION["syainList"] = $syainList;

/* 次に実行するモジュール */
header('Location: syainLstDsp.php ');
?>