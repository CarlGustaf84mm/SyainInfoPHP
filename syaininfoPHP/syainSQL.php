<?php
/*
syainSQL.php (社員表とのインターフェース)

@author 堀光希
@version 2.0
@date    4/20
*/

header('Content-Type:text/plain; charset=utf-8');

class syainSQL
{

    /*
    *社員表から社員情報を取得する
    *全社員データをArrayListクラスに登録して戻す
    *
    *@param $pdo   データベース接続オブジェクト
    *@return $syainList  全社員データ
    */
    public function selectAll($pdo)
    {
        require_once('syainBeans.php');

        $syainList = array();

        /*SQL文生成*/ //SELECT [表示要素名] FROM [テーブル名] ORDER BY [ソートする要素名] [昇順・降順の指定];
        $sql = 'SELECT syainbangou, syainmei '
            . 'FROM syain '
            . 'ORDER BY syainbangou;';
        $stmt = $pdo->prepare($sql);


        /* SQL文実行 */
        $ret = $stmt->execute();

        /* 検索結果をArrayListに登録 */
        foreach ($stmt as $row) {
            $syainBeans = new SyainBeans();

            $syainBeans->setSyainBangou($row['syainbangou']);
            $syainBeans->setSyainMei($row['syainmei']);

            $syainList[] = $syainBeans; //$syainlistに登録する
        }
        return $syainList;
    }
    /* 実習No.6  社員情報一覧 */
    /* 実習No.7  社員情報検索 */
    /* 実習No.8  社員情報登録 */
    /* 実習No.9  社員情報更新 */
    /* 実習No.10 社員情報削除 */

    /*
    * 社員表から指定した社員情報の件数を数える
    * 検索件数を戻す
    *
    * @param $pdo            データベース接続オブジェクト
    * @param $inSyainBeans   社員検索条件
    * @return                検索件数
    */
    public function selectCnt(
        $pdo,
        $inSyainBeans
    ) {
        require_once('syainBeans.php');

        /* SQL文生成 */
        $sql = 'SELECT syainbangou, syainmei '
            . 'FROM  syain '
            . 'WHERE syainbangou = ?;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $inSyainBeans->getSyainBangou());

        /* SQL文実行 */
        $ret = $stmt->execute();

        /* 件数を取得 */
        $recCount = 0;
        foreach ($stmt as $row) {
            $recCount++;
        }
        return $recCount;
    }

    /*
    *社員表から指定した社員情報を取得する
    *社員データをArrayListクラスに登録して戻す
    *
    *@param $pdo データベース接続オブジェクト
    *@param $inSyainBeans 社員検索条件
    *@return @syainList 検索結果
    */
    public function select(
        $pdo,
        $inSyainBeans
    ) {
        require_once('syainBeans.php');

        $syainList = array();

        /* SQL文生成 */
        $sql = 'SELECT syainbangou, syainmei '
            . 'FROM syain '
            . 'WHERE syainbangou = ?;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $inSyainBeans->getSyainBangou());

        /* SQL実行 */
        $ret = $stmt->execute();

        /* 検索結果をArrayListに登録 */
        foreach ($stmt as $row) {
            $syainBeans = new SyainBeans();

            $syainBeans->setSyainBangou($row['syainbangou']);
            $syainBeans->setSyainMei($row['syainmei']);

            $syainList[] = $syainBeans; //$syainListに登録する
        }

        return $syainList;
    }
    /*実習No.8  社員情報登録 */

    /* 
    *社員表に社員情報を登録する
    *
    *@param $pdo
    *@param $inSyainBeans
    *@return
    */
    public function insert(
        $pdo,
        $inSyainBeans
    ) {
        $recCount = 0;

        /* SQL文生成 INSERT INTO テーブル名 (列名1, 列名2,...) VALUES (値1, 値2,...); */
        $sql = 'INSERT INTO syain(syainbangou, syainmei)'
            .  ' VALUES (?, ?);';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $inSyainBeans->getSyainBangou());
        $stmt->bindValue(2, $inSyainBeans->getSyainMei());

        try {
            /* SQL文実行 */
            $ret = $stmt->execute();

            /* 件数の取得 */
            $recCount = $stmt->rowCount();
        } catch (PDOException $e) {
        }
        return $recCount;
    }

    /* 実習No.9 社員情報更新 */



    /*
        *社員表の社員番号を更新する
        *
        *@param $pdo　　　　　データベース接続オブジェクト
        *@param $inSyainBeans 社員更新情報
        *@return 更新件数
        */
    public function update(
        $pdo,
        $inSyainBeans
    ) {
        $recCount = 0;

        /* SQL文作成  UPDATE (テーブル名) SET (カラム名1) = (値1) WHERE (条件);*/
        $sql = 'UPDATE syain '
            . 'SET syainmei = ? '
            . 'WHERE syainbangou = ?;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $inSyainBeans->getSyainMei());
        $stmt->bindValue(2, $inSyainBeans->getSyainBangou());

        try {
            /* SQL文実行 */
            $ret = $stmt->execute();

            /* 件数を取得 */
            $recCount = $stmt->rowCount();
        } catch (PDOException $e) {
        }
        return $recCount;
    }

/* 実習No.10 社員情報削除 */
/*
*社員表から社員情報を削除する
*
*@param $pdo　　　      データベース接続オブジェクト
*@param　inSyainBeans   社員削除情報
*@return 削除件数
*/
public function delete(
    $pdo,
    $inSyainBeans
) {
    $recCount = 0;

    /* SQL文作成 DELETE FROM (テーブル名)WHERE(主キー項目) = (値) */
    $sql = 'DELETE FROM syain '
         . 'WHERE syainbangou = ?;';
         $stmt = $pdo->prepare($sql);
         $stmt ->bindValue(1,$inSyainBeans->getSyainBangou());


try {
/* SQL文実行 */
$ret = $stmt->execute();

/* 件数を取得 */
$recCount = $stmt->rowCount();
} catch (PDOException $e) {
}
return $recCount;
}
}


