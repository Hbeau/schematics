<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 16/05/2016
 * Time: 12:05
 */

$userdata=array(
    'name'=>'username',
    'id'=>'username'
);
$passdata=array(
    'name'=>'password',
    'id'=>'password'
);
echo form_open('User/login');
echo form_input($userdata);
echo form_password($passdata);
echo form_submit();
echo form_close();
?>

