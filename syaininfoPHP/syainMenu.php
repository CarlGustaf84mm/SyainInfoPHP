<!--
    syainMenu.php(社員情報管理　機能選択)

    @author 堀光希
@version 2.0
@date    4/20
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報管理</title>
</head>

<body>
    <h2>実習No.5 社員情報管理</h2>
    <form name="myForm1" action="syainMenuJmp.php" method="post">
        <input type="radio" name="SyainInfoManagement" value="1">社員情報一覧<br>
        <input type="radio" name="SyainInfoManagement" value="2">社員情報検索<br>
        <input type="radio" name="SyainInfoManagement" value="3">社員情報登録<br>
        <input type="radio" name="SyainInfoManagement" value="4">社員情報更新<br>
        <input type="radio" name="SyainInfoManagement" value="5">社員情報削除<br>
        <input type="submit" value="選択">
        <input type="button" value="戻る" onclick="location.href='index.html'">
    </form>

    
</body>

</html>