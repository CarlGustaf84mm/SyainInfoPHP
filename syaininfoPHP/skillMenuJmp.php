<?php
/*
skillMenuJmp.php (スキル情報管理メニュー　ジャンプテーブル)

@author 堀光希
@version 2.0
@date    5/22
*/

header('Content-Type:text/plain; charset=utf-8');


/* 次に実行するモジュールを設定する変数 */
$nextModule='';

require_once('function.php');

/* MENUからデータを受け取る */
if (empty($_POST['SkillInfoManagement'])) {
    echo '<script>alert("選択してください");history.back();</script>';

    
    }else{

        $skillBtn1 = $_POST['SkillInfoManagement'];

    }


    switch ($skillBtn1) {
        case 1: //スキル情報追加
            $nextModule = 'skillInsMain.php';
            break;

            case 2: //スキル情報削除
                $nextModule = 'skillDelMenu.php';
                break;
        
            case 3: //スキル情報更新
                $nextModule = 'skillUpdMenu.php';
                break;

            default;
                break;
    }

    /* 次に実行するモジュール */
    header('Location: ' . $nextModule);
