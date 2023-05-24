<!--
    skillMenu.php(スキル情報管理　機能選択)

    @author 堀光希
@version 2.0
@date    5/22
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>スキル情報管理</title>
</head>

<body>
    <h2>追加課題 スキル情報管理</h2>
    <form name="myForm1" action="skillMenuJmp.php" method="post">
        <input type="radio" name="SkillInfoManagement" value="1">スキル情報追加<br>
        <input type="radio" name="SkillInfoManagement" value="2">スキル情報削除<br>
        <input type="radio" name="SkillInfoManagement" value="3">スキル情報更新<br>
        
        <input type="submit" value="選択">
        <input type="button" value="戻る" onclick="location.href='index.html'">
    </form>

    
</body>

</html>