<div class="container formulaire">
<fieldset>

<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 24/05/2016
 * Time: 16:20
 */
$namedata=array(
    'placeholder'=>"Nom",
    'class'=>"form-control size18",
    'name'=>'name',
    'id'=>'name',
    'value'=>set_value("name")
);
$descdata=array(
    'placeholder'=>"Description de votre schéma ici",
    'class'=>"form-control size18",
    'name'=>'description',
    'id'=>'description',
    'value'=>set_value("description")
);

echo form_open_multipart('Schematics/insert');
    
echo '<h4>Nom du Schéma</h4>';
echo form_input($namedata);
echo form_error('name');
echo '<div class="form-group ">';

echo '<h4>Description</h4>';
echo form_textarea($descdata);
echo form_error('description');
    
echo "<p><span id='char'>0</span> caracteres sur 350</p>";
echo "</div>";

echo '
<input class="" id="fileSchemaHidden" type="file" multiple=""></input>
<button class="fileSchema btn btn-block btn-default my-style size18">

Cliquez ou déposez vos fichiers ici pour les ajouter

</button>

<br />';
    

echo form_submit(array("class"=>"btn btn-block btn-default my-style size18","value"=>"Envoyer le schéma"));
echo form_close();

?>

</fieldset>
</div>
