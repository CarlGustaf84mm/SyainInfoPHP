<?php
class skillSQL
{
    /* 社員スキル情報（登録、削除、更新） */

/*skillSQL.php(スキル情報登録のためのインターフェース)

*@author 堀光希
*@version 2.0
*@date    5/22

*/

/*----------------------------------------------------------------------------------------------------*/
    public function insert(
        $pdo,
        $inSkillBeans
    ) {
        $skillIns = false;

        /* SQL文生成 INSERT INTO テーブル名 (列名1, 列名2,...) VALUES (値1, 値2,...); */
        $sql = 'INSERT INTO skill (syainbangou, sikakucode, sikakusyutokubi)'
            .  ' VALUES (?, ? ,?);';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $inSkillBeans->getSyainBangou());
        $stmt->bindValue(2, $inSkillBeans->getSikakuCode());
        $stmt->bindValue(3, $inSkillBeans->getSikakuSyutokubi());

        try {
            $ret = $stmt->execute();

            if ($ret === true && $stmt->rowCount() === 1) {
                $skillIns = true;
            }
        } catch (PDOException $e) {
            echo 'データベースへの接続に失敗しました';
        }
        return $skillIns;
    }
/*----------------------------------------------------------------------------------------------------*/
}
?>
