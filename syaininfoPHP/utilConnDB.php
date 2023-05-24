<?php
/*
utilConnDB.php(データベース関連クラス)

@author 堀光希
@version 2.0
@date    4/17
 */

class UtilConnDB
{
    /* データベース設定 */
    private $dbHostMei = 'localhost';
    private $dbUserMei = 's20217039';
    private $dbPassword = '20030212';
    private $dbDBMei = 'syain_db';

    /*
     *DBを作成する
     */
    public function createDB()
    {
        $dbSW = true;
        try {
            $pdo = new PDO(
                'mysql:host=' . $this->dbHostMei
                . ';dbname='
                . ';charset=utf8mb4',
                $this->dbUserMei,
                $this->dbPassword,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

            $sql = 'CREATE DATABASE ' . $this->dbDBMei
                . ' default character set utf8';
            $count = $pdo->exec($sql);
            if ($count == 0) {
                throw new PDOException();
            }
        } catch (PDOException $e) {
            $dbSW = false;
        }
        return $dbSW;
    }
    /*
     *DBを接続する
     */
    public function connect()
    {
        $pdo = null;
        try {
            $pdo = new PDO(
                'mysql:host=' . $this->dbHostMei
                . ';dbname=' . $this->dbDBMei
                . ';charset=utf8mb4',
                $this->dbUserMei,
                $this->dbPassword,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            $pdo->beginTransaction(); //トランザクション開始
        } catch (PDOException $e) {
        }
        return $pdo;
    }
    /*
     *DBをコミットする
     */
    public function commit($pdo)
    {
        $pdo->commit();
    }

    /*
     *DBをロールバックする
     */
    public function rollback($pdo)
    {
        $pdo->rollback();
    }

    /*
     *DBを切断する
     */
    public function disconnect($pdo)
    {
        $pdo = null;
    }
}
?>