<?php
/* 
srchBeans.php(検索データ)

@author 堀光希
@version 2.0
@date    5/16
 */

class SrchBeans
{

    /*変数*/
    private $syainBangou;        //社員番号
    private $syainMei;           //社員名
    private $sikakuCode;         //資格コード
    private $sikakuMei;          //資格名
    private $sikakuRyakusyou;    //資格略称
    private $sikakuSyutokubi;    //資格取得日

    /* コンストラクタ */
    public function __construct()
    { // 「_(アンダースコア)」2個
        $syainBangou     = '';
        $syainMei        = '';
        $sikakuCode      = 0;
        $sikakuMei       = '';
        $sikakuRyakusyou = '';
        $sikakuSyutokubi = null;
    }
    /* クリアメソッド */
    public function srchBeansClear()
    {
        $syainBangou     = '';
        $syainMei        = '';
        $sikakuCode      = 0;
        $sikakuMei       = '';
        $sikakuRyakusyou = '';
        $sikakuSyutokubi = null;
    }

    /* 社員番号 */
    public function getSyainBangou()
    {
        return $this->syainBangou;
    }
    public function setSyainBangou($syainBangou)
    {
        $this->syainBangou = $syainBangou;
    }
    /* 社員名 */
    public function getSyainMei()
    {
        return $this->syainMei;
    }
    public function setSyainMei($syainMei)
    {
        $this->syainMei = $syainMei;
    }
    /* 資格コード */
    public function getSikakuCode()
    {
        return $this->sikakuCode;
    }
    public function setSikakuCode($sikakuCode)
    {
        $this->sikakuCode = $sikakuCode;
    }
    /* 資格名 */
    public function getSikakuMei()
    {
        return $this->sikakuMei;
    }
    public function setSikakuMei($sikakuMei)
    {
        $this->sikakuMei = $sikakuMei;
    }
    /* 資格略称 */
    public function getSikakuRyakusyou()
    {
        return $this->sikakuRyakusyou;
    }
    public function setSikakuRyakusyou($sikakuRyakusyou)
    {
        $this->sikakuRyakusyou = $sikakuRyakusyou;
    }
    /* 資格取得日 */
    public function getSikakuSyutokubi()
    {
        return $this->sikakuSyutokubi;
    }
    public function setSikakuSyutokubi($sikakuSyutokubi)
    {
        $this->sikakuSyutokubi = $sikakuSyutokubi;
    }
}
?>
