<?php
/*
syainMenuJmp.php (社員情報管理メニュー　ジャンプテーブル)

@author 堀光希
@version 2.0
@date    4/20

header('Content-Type:text/plain; charset=utf-8');


/* 次に実行するモジュールを設定する変数 */
$nextModule='';

require_once('function.php');

/* MENUからデータを受け取る */
if (empty($_POST['SyainInfoManagement'])) {
    echo '<script>alert("選択してください");history.back();</script>';

    
    }else{

        $rdBtn1 = $_POST['SyainInfoManagement'];

    }


    switch ($rdBtn1) {
        case 1: //社員情報一覧
            $nextModule = 'syainLstMain.php';
            break;

            case 2: //社員情報検索
                $nextModule = 'syainSrchMenu.php';
                break;
        
            case 3: //社員情報登録
                $nextModule = 'syainInsMenu.php';
                break;
        
            case 4: //社員情報更新
                $nextModule = 'syainUpdMenu.php';
                break;
        
            case 5: //社員情報削除
                $nextModule = 'syainDelMenu.php';
                break;
            default;
                break;
    }

    /* 次に実行するモジュール */
    header('Location: ' . $nextModule);
