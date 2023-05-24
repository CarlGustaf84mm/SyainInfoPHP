<?php
/*
syainBeans.php(社員情報Beans)

@author 堀光希
@version 2.0
@date    4/20
 */

class SyainBeans
{

    /* 変数 */
    private $syainBangou;
    private $syainMei;



    /* コンストラクタ */
    public function __construct()//__construct()関数は、クラスがインスタンス化された際に実行されるメソッドであり、
                                 //クラスの初期化を行うために使用される。2つのオブジェクトプロパティである$syainBangouと$syainMeiを空の文字列で初期化しています。
                                 //これにより、クラスがインスタンス化され、オブジェクトが作成された直後に、これらのプロパティが適切に初期化されることが保証されます。
    {
        $this->syainBangou = ''; 
        $this->syainMei = ''; 
    }
    /*　クリアメソッド */
    public function syainBeansClear()
    {
        $this->syainBangou = '';
        $this->syainMei = '';
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
    
}
?>
