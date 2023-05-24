<?php
/*
skillBeans.php(スキル情報Beans)

@author 堀光希
@version 2.0
@date    5/22
 */

class SkillBeans
{

    /* 変数 */
    private $syainBangou;
    private $sikakucode;
    private $sikakusyutokubi;



    /* コンストラクタ */
    public function __construct()//__construct()関数は、クラスがインスタンス化された際に実行されるメソッドであり、
                                 //クラスの初期化を行うために使用される。2つのオブジェクトプロパティである$syainBangouと$sikakucodeを空の文字列で初期化しています。
                                 //これにより、クラスがインスタンス化され、オブジェクトが作成された直後に、これらのプロパティが適切に初期化されることが保証されます。
    {
        $this->syainBangou = ''; 
        $this->sikakucode = ''; 
        $this->sikakusyutokubi = ''; 
    }
    /*　クリアメソッド */
    public function skillBeansClear()
    {
        $this->syainBangou = '';
        $this->sikakucode = '';
        $this->sikakusyutokubi = '';
    }

/* スキル番号 */
    public function getsyainBangou()
    {
        return $this->syainBangou;
    }

    public function setsyainBangou($syainBangou)
    {
        $this->syainBangou = $syainBangou;
    }

    /* 資格コード */
    public function getsikakucode()
    {
        return $this->sikakucode;
    }

    
    public function setsikakucode($sikakucode)
    {
        $this->sikakucode = $sikakucode;
    }
    
    public function getsikakusyutokubi()
    {
        return $this->sikakusyutokubi;
    }

    public function setsikakusyutokubi($sikakusyutokubi)
    {
        $this->sikakusyutokubi = $sikakusyutokubi;
    }
}
?>
