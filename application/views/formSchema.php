<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 24/05/2016
 * Time: 16:20
 */
$namedata=array(
    'placeholder'=>"nom",
    'class'=>"form-control",
    'name'=>'name',
    'id'=>'name',
    'value'=>set_value("name")
);
$descdata=array(
    'class'=>"form-control",
    'name'=>'description',
    'id'=>'description',
    'value'=>set_value("description")
);
$sizedata=array(
    'class'=>"form-control",
    'name'=>'size',
    'id'=>'size',
    'value'=>set_value("size")
);


echo form_open_multipart('Schematics/insert');
echo form_input($namedata);
echo form_error('name');
echo  '<div class="form-group ">';
echo form_textarea($descdata);

echo form_error('description');
echo "<p><span id='char'>0</span> caracteres sur 350</p>";
echo "</div>";



echo '<input name="fileSchema" id="fileSchema" type="file" multiple="" />';
echo form_input($sizedata);
echo form_error('size');
echo form_submit(array("class"=>"btn btn-info","value"=>"Register"));
echo form_close();

echo '<form action="'.site_url("Schematics/uploadImage").'" class="dropzone"></form>';
?>

