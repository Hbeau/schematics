
<script>
    var aviableCategory= <?php echo json_encode($data);?>;
    console.log(aviableCategory);
</script>

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
$catdata =array(
    "name"=>"category",
    "id"=>"category"
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

//echo "<input type='text' id='category' class='form-control'>";

echo '<input type="hidden" id="category" name="category">';
echo ' <input type = "file" name = "fileSchema" size = "20" /> ';

echo form_submit(array("class"=>"btn btn-block btn-default my-style size18","value"=>"Envoyer le schéma"));
echo form_close();

?>

</fieldset>
</div>
