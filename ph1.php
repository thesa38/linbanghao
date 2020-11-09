<?php
if ($_COOKIE ['uname'] != '') {
    $CKUNAME = $_COOKIE ['uname'];
}
if ($_COOKIE ['pwd'] != '') {
    $CKPWD = $_COOKIE ['pwd'];
}
echo $CKUNAME;
echo '<br>';
echo $CKPWD;
?>

<form id="form1" name="form1" method="post" action="">
    <input type="text" name="uname" id="uname" value="<?=$CKUNAME;?>" />
    <input type="password" name="pwd" id="pwd" value="<?=$CKPWD;?>" />
    <input name="remember" type="checkbox" value="1" <? if($CKUNAME!=''){?> checked="checked" <? } ?> /> 记住我!
    <input type="submit" name="button" id="button" value="登录" />
</form>

<?
// 登录，将用户名和密码存入到COOKIE
if ($_POST ['button'] != '')
{
    $uname = $_POST ['uname'];
    $pwd = $_POST ['pwd'];

    // 如果输入的加密密码和COOKIE中不一样，那么就加密
    if ($pwd != $CKPWD) {
        $pwd = md5 ( $pwd );
    }
    $remember = $_POST ['remember'];
    if ($remember == 1) {
        setcookie ( "uname", $uname, time () + 3600 * 24 * 30 );
        setcookie ( "pwd", $pwd, time () + 3600 * 24 * 30 );
    }
}
?>



