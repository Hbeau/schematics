<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 16/05/2016
 * Time: 12:05
 */

$formdata = array(
    'class' => 'form'
);

$userdata=array(

    'class'=>"form-control size18",
    'name'=>'username',
    'id'=>'username'
);
$passdata=array(

    'class'=>"form-control size18",
    'name'=>'password',
    'id'=>'password'
);
$submitdata=array(

    'class'=>"btn btn-default my-style size18",
    'value'=>'Connexion'
);
echo form_open('User/login',$formdata);
echo form_input($userdata);
echo form_password($passdata);
echo form_submit($submitdata);

echo form_close();

echo '
<button type="button" class="btn btn-default my-style size18" data-toggle="modal" data-target="#registeryModal">S\'enregistrer</button>';
?>
