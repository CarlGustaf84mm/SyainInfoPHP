<?php
/*
srchSQL.php(社員スキル情報検索のためのインターフェース)

@author 堀光希
@version 2.0
@date    5/16
*/

header('Content-Type:text/plain; charset=utf-8');

class SrchSQL
{

    /*
    *社員DBから指定した社員情報を取得する
    *社員データをAllayListクラスに登録して戻す
    *
    *@param  $pdo         データベース接続オブジェクト
    *@param  $srchState   検索方法(AND/OR)
    *@param  $inSrchBean  検索条件
    *@return $srchList    検索結果
    */
    public function select($pdo, $srchState, $inSrchBeans)
    {
        require_once('srchBeans.php');

        $srchList = array();

        $syainMei  = $inSrchBeans->getSyainMei();
        $sikakuMei = $inSrchBeans->getSikakuMei();
        $selParm   = 0;
        if ($syainMei != '') {
            $selParm += 1; //重み : 0000 0001
        }
        if ($sikakuMei != '') {
            $selParm += 2; // 0000 0010
        }

        /*
        *SQL文を生成する(生成したいパターンは下記の通り)        
        *
        *WHERE 条件 AND 条件 AND 条件A
        *WHERE 条件 AND 条件 AND 条件B
        *WHERE 条件 AND 条件 AND (条件A AND 条件B)
        *WHERE 条件 AND 条件 AND (条件A AND 条件B)
        *WHERE 条件 AND 条件 
        *
        *例
        * WHERE スキル.社員番号   = 社員.社員番号
        *   AND スキル.資格コード = 資格.資格コード
        *   AND (
        *  社員名 LIKE '%検索する社員名%'
        *   OR
        *   資格名 LIKE '%検索する資格名%'
        *       )
        */

        /* SQL文作成 */
        $sql = "SELECT syain.syainbangou, syain.syainmei, "
            . "skill.sikakusyutokubi, "
            . "sikaku.sikakuryakusyou "
            . "FROM syain, skill, sikaku "
            . "WHERE syain.syainbangou = skill.syainbangou "
            . "AND skill.sikakucode = sikaku.sikakucode ";

        switch ($selParm) {
            case 0: //社員名なし、資格名なし
                break;

            case 1: //社員名のみ
                $sql .= "AND syain.syainmei LIKE '%$syainMei%' ";
                break;

            case 2: //資格名のみ
                $sql .= "AND sikaku.sikakumei LIKE '%$sikakuMei%' ";
                break;

            case 3: //社員名あり、資格名あり
                $sql .= "AND (";
                $sql .= "syain.syainmei LIKE '%$syainMei%' ";
                $sql .= " " . $srchState . " ";
                $sql .= "sikaku.sikakumei LIKE '%$sikakuMei%' ";
                $sql .= ") ";
                break;
        }
        $sql .= "ORDER BY syainbangou, syainmei, sikakuryakusyou, sikakusyutokubi;";
        $stmt = $pdo->prepare($sql);

        /* SQL文実行 */
        $ret = $stmt->execute();

        /* 検索結果をArrayListに登録 */
        foreach ($stmt as $row) {
            $srchBeans = new SrchBeans();

            $srchBeans->setSyainBangou($row['syainbangou']);
            $srchBeans->setSyainMei($row['syainmei']);
            $srchBeans->setSikakuRyakusyou($row['sikakuryakusyou']);
            $srchBeans->setSikakuSyutokubi($row['sikakusyutokubi']);

            $srchList[] = $srchBeans; //$srchListに追加する
        }
        return $srchList;
    }
}
?>
