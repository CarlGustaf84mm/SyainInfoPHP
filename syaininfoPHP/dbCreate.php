<?php
/*
 dbCreate.php（データベース初期化）

 @author  堀光希
 @version 2.0
 @date    4/19(インポート)
*/

/* インポート */
require_once('utilConnDB.php');
$utilConnDB = new UtilConnDB();

/*
 * 社員（syain）データベース作成
 */
$dbSW  = $utilConnDB->createDB();  // false:not create
/*
 * 社員（syain）データベースに接続
 */
$pdo   = $utilConnDB->connect();   // null:not found

/*
 * 社員（syain）テーブル作成
 */
/* 登録済みの確認 */
$sql    = "show tables like 'syain';";
$ret    = $pdo->query($sql);
$findSW = false;
while ($row = $ret->fetch(PDO::FETCH_NUM)) {
  $tableList[] = $row[0];
  if ($row[0] == 'syain') {
    $findSW = true;
  }
}
if ($findSW == true) {
  $sql   = 'drop table syain;';
  $count = $pdo->query($sql);
}
/* syainテーブル生成          */
$sql   = 'create table syain('
       . 'syainbangou varchar(10)  primary key, '
       . 'syainmei    varchar(50)'
       . ');';
$count = $pdo->query($sql);

/* syainテーブルにデータ登録  */
insSyain($pdo);

/*
 * 資格（sikaku）テーブル作成
 */
/* 登録済みの確認 */
$sql    = "show tables like 'sikaku'";
$ret    = $pdo->query($sql);
$findSW = false;
while ($row = $ret->fetch(PDO::FETCH_NUM)) {
  if ($row[0] == 'sikaku') {
    $findSW = true;
  }
}
if ($findSW == true) {
  $sql   = 'drop table sikaku;';
  $count = $pdo->query($sql);
}
/* sikakuテーブル生成         */
$sql   = 'create table sikaku('
       . 'sikakucode      integer  primary key, '
       . 'sikakumei       varchar(50), '
       . 'sikakuryakusyou varchar(50)'
       . ');';
$count = $pdo->query($sql);

/* sikakuテーブルにデータ登録 */
insSikaku($pdo);

/*
 * スキル（skill）テーブル作成
 */
/* 登録済みの確認             */
$sql    = "show tables like 'skill'";
$ret    = $pdo->query($sql);
$findSW = false;
while ($row = $ret->fetch(PDO::FETCH_NUM)) {
  if ($row[0] == 'skill') {
    $findSW = true;
  }
}
if ($findSW == true) {
    $sql   = 'drop table skill;';
    $count = $pdo->query($sql);
}
/* skillテーブル生成          */
$sql   = 'create table skill('
       . 'syainbangou     varchar(10), '
       . 'sikakucode      integer, '
       . 'sikakusyutokubi date'
       . ');';
$count = $pdo->query($sql);

/* skillテーブルにデータ登録  */
insSkill($pdo);

/* 登録データを確定する       */
$pdo->commit();

/*
 * DBを切断する
 */
$stmt  = null;
$pdo   = null;

/*
 * syainテーブルにデータ登録
 */
function insSyain($pdo) {
    $sql   = "insert into syain values('02001', '青木 一郎');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into syain values('02002', '石田 二郎');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into syain values('03001', '上田 三郎');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into syain values('03002', '遠藤 四郎');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into syain values('04001', '太田 五郎');";
    $count = sql_exec($pdo, $sql);
}

/*
 * sikakuテーブルにデータ登録
 */
function insSikaku($pdo) {
    $sql   = "insert into sikaku values( 111, '初級システムアドミニストレータ試験',      '初級シスアド');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 112, '基本情報技術者試験',                      '基本情報');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 113, '応用情報技術者試験',                      '応用情報');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 114, 'データベーススペシャリスト試験',          'データベース');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 115, 'ネットワークスペシャリスト試験',          'ネットワーク');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 116, '情報セキュリティスペシャリスト試験',      'セキュリティ');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 117, 'ITパスポート試験',                        'ITパスポート');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 201, '日商簿記検定試験３級',                    '日商簿記３級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 202, '日商簿記検定試験２級',                    '日商簿記２級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 203, '日商簿記検定試験１級',                    '日商簿記１級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 401, '情報活用試験３級',                        'Ｊ検３級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 402, '情報活用試験２級',                        'Ｊ検２級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 403, '情報活用試験１級',                        'Ｊ検１級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 407, '情報システム試験 プログラマ認定',         'Ｊ検プログラマ認定');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 408, '情報システム試験 システムエンジニア認定', 'J検SE認定');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 921, 'マルチメディア検定３級',                  'ＭＭ３級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 922, 'マルチメディア検定２級',                  'ＭＭ２級');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 951, 'マルチメディア検定ベーシック',            'ＭＭベーシック');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values( 952, 'マルチメディア検定エキスパート',          'ＭＭエキスパート');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(1100, 'ORACLE MASTER Platinum DB 9i',            'OM Platinum DB 9i');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(1110, 'ORACLE MASTER Silver DB 10g',             'OM Silver DB 10g');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(1120, 'ORACLE MASTER Bronze DB 10g',             'OM Bronze DB 10g');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(2101, 'MCAデータベース M20-101',                 'MCAデータベース');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(2201, 'MCAプラットフォーム M20-201',             'MCAプラットフォーム');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(2301, 'MCAアプリケーション M20-301',             'MCAアプリケーション');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(2401, 'MCAセキュリティ M20-401 ',                'MCAセキュリティ');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(3103, 'MOS Microsoft Word Version 2003',         'MOS Word 2003');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(3104, 'MOS Microsoft Word Version 2003 Expert',  'MOS Word 2003 Expert');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(3203, 'MOS Microsoft Excel Version 2003',        'MOS Excel 2003');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(3204, 'MOS Microsoft Excel Version 2003 Expert', 'MOS Excel 2003 Expert');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4001, 'Sun認定 Javaプログラマ  SJC-P 1.4',       'SJC-P 1.4');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4002, 'Oracle認定 Javaプログラマ  OCJ-P 5.0',    'OCJ-P 5.0');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4003, 'Oracle認定 Javaプログラマ  OCJ-P 6.0',    'OCJ-P 6.0');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4011, 'Sun認定Webコンポーネントディベロッパ  SJC-WC 080', 'SJC-WC 080');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4012, 'Sun認定Webコンポーネントディベロッパ  SJC-WC 081', 'SJC-WC 081');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4013, 'Oracle認定WebコンポーネントディベロッパEE 5',      'OCJ-WC');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(4021, 'Oracle認定Javaアソシエイツ OCJ-A',                 'OCJ-A');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(5001, 'ベリサイン認定アソシエイト：電子認証',             'VSJCA-EA');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(7201, 'MCP  Exam ID 030',                        'MCP 030');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(7260, 'MCP  Exam ID 215',                        'MCP 215');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(7270, 'MCP  Exam ID 270',                        'MCP 270');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(7290, 'MCP  Exam ID 290',                        'MCP 290');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(7300, 'MCP  Exam ID 680',                        'MCP 680');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9001, 'XMLマスター:ベーシック',                                 'XMLマスター:ベーシック');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9002, 'XMLマスター:プロフェッショナル（アプリケーション開発）', 'XMLマスター:アプリケーション');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9003, 'XMLマスター:プロフェッショナル（データベース開発）',     'XMLマスター:データベース');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9501, 'Androidアプリケーション技術者認定試験ベーシック',         'Androidアプリケーション（ベーシック）');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9502, 'Androidアプリケーション技術者認定試験プロフェッショナル', 'Androidアプリケーション（プロフェッショナル）');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9503, 'Androidプラットフォーム技術者認定試験ベーシック',         'Androidプラットフォーム（ベーシック）');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into sikaku values(9504, 'Androidプラットフォーム技術者認定試験プロフェッショナル', 'Androidプラットフォーム（プロフェッショナル）');";
    $count = sql_exec($pdo, $sql);
}

/*
 * skillテーブルにデータ登録
 */
function insSkill($pdo) {
    $sql   = "insert into skill values('02001', 112, '2001-04-15');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('02001', 111, '2001-10-21');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('02001', 113, '2003-04-20');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('02002', 112, '2002-04-21');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('02002', 201, '2002-06-09');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('03001', 112, '2001-04-15');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('03001', 111, '2002-10-21');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('03001', 113, '2002-04-21');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('04001', 112, '2002-04-21');";
    $count = sql_exec($pdo, $sql);

    $sql   = "insert into skill values('04001', 111, '2002-10-20');";
    $count = sql_exec($pdo, $sql);
}

/*
 * SQL文実行
 */
function sql_exec($pdo, $sql) {
    $count = $pdo->exec($sql);

    return $count;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>データベース初期化</title>
</head>
<body>
<h2>実習No.3 データベース初期化（デバッグ用）</h2>
　データベースを初期化しました。<p />
<form name="myForm1" action="index.html" method="post">
  <input type="submit" value="戻る" />
</form>
</body>
</html>
