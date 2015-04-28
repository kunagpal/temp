<?php
/**
 * Created by PhpStorm.
 * User: Kunal Nagpal
 * Date: 27-04-2015
 * Time: 00:56
 */
    if($_POST['name'] && $_POST['email'])
    {
        $con = mysql_connect('localhost', '', '');
        if(!$con)
        {
            die(mysql_error());
        }
        $ret = mysql_query("update users set token = crypt(now()), expire = now() + 3600000 where name = $_POST['name']", $con);
        if(!$ret)
        {
            echo 'Not found!';
        }
        mysql_close($con);
        $ret = mail($_POST['email'], 'Password reset', 'Please click on the provided link to reset your password');
        if($ret)
        {
            echo 'Success';
        }
        else
        {
            echo 'Failure';
        }
    }
    else
    {
        echo 'One or more fields was empty!';
    }
?>