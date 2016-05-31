<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 24/05/2016
 * Time: 16:20
 */
$namedata=array(
    'name'=>'name',
    'id'=>'name',
    'value'=>set_value("name")
);
$descdata=array(
    'name'=>'description',
    'id'=>'description',
    'value'=>set_value("description")
);
$sizedata=array(
    'name'=>'size',
    'id'=>'size',
    'value'=>set_value("size")
);

echo form_open('Schematics/insert');
echo form_input($namedata);
echo form_error('name');
echo form_textarea($descdata);
echo form_error('description');
echo form_input($sizedata);
echo form_error('size');
echo form_submit();
echo form_close();
?>

