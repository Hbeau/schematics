<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 16/05/2016
 * Time: 12:05
 */

$formdata = array(
    'class' => 'form-inline'
);

$userdata=array(

    'class'=>"form-control",
    'name'=>'username',
    'id'=>'username'
);
$passdata=array(

    'class'=>"form-control",
    'name'=>'password',
    'id'=>'password'
);
$submitdata=array(

    'class'=>"btn btn-default my-style",
    'value'=>'connexion'
);
echo form_open('User/login',$formdata);
echo form_input($userdata);
echo form_password($passdata);
echo form_submit($submitdata);
echo form_close();
?>

