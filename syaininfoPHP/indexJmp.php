<?php
/*
indexJmp.php (社員スキル管理　ジャンプテーブル)

@author 堀光希
@version 2.0
@date    4/18
 */

header('Content-Type:text/plain; charset=utf-8');
require_once('function.php');

/* 次に実行するモジュールを設定する変数 */
$nextModule = '';

/* HTMLからデータを受けとる */
if (empty($_POST['skill'])) {

    echo '選択してください';
    
    
    }else{

        $rdBtn1 = $_POST['skill'];

    }


switch ($rdBtn1) {
    case 1: //社員スキル検索
        /* 実習No.11 */
        $nextModule = 'srchMenu.php';
        break;
        
    case 2: // 社員スキル
        $nextModule = 'skillMenu.php';
        break;

    case 3: //社員情報管理
        $nextModule = 'syainMenu.php';
        break;

    case 4: //資格情報管理
        $nextModule = 'sikakuMenu.php';
        break;

    case 5: //データベース初期化(デバッグ用) 実習No.3で作成する
        $nextModule = 'dbCreate.php';
        break;
    default;
        break;
}

/* 次に実行するモジュール */
header('Location:' . $nextModule);
?>
