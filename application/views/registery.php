<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 08:58
 */



$this->load->view('template/head');
$this->load->view('template/header');

$usernamedata=array(
    'class'=>"form-control size18",
    'name'=>'username',
    'id'=>'username',
    "placeholder"=>"dandre, ecadic ...",
    'value'=>set_value('username')
);
$passdata=array(
    'class'=>"form-control size18",
    'name'=>'password',
    'id'=>'password',
    "placeholder"=>"*****",
);

$confirmpassdata=array(
    'class'=>"form-control size18",
    'name'=>'passwordConfirmation',
    'id'=>'passwordConfirmation',
    "placeholder"=>"*****"
);

$maildata=array(
    'type'=>"email",
    'class'=>"form-control size18",
    'name'=>'mail',
    'id'=>'mail',
    "placeholder"=>"nom.prenom@mail.com",
    'value'=>set_value('mail')
);
?>
<div class="container register">
    <form action="" method="post" >

        <?php

        //######   username   ############//

        echo '<h4><label for="username">Nom d\'utilisateur :</label></h4>';
        if(form_error('username')!=null){

            echo  '<div class="form-group has-error has-feedback">';

            echo form_input($usernamedata);
            echo form_error('username');
            echo ' <span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            echo "</div>";
        }
        else {
            echo form_input($usernamedata);
        }

        //######   password   ############//


        echo '<h4><label for="password" class="size18">Password</label></h4>';
        if(form_error('password')!=null){

            echo  '<div class="form-group has-error has-feedback">';

            echo form_password($passdata);
            echo form_error('password');
            echo ' <span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            echo "</div>";
        }
        else {
            echo form_password($passdata);
        }

        //####  password confirmation  ###//

        echo '<h4><label for="passwordConfirmation">Password</label></h4>';
        if(form_error('passwordConfirmation')!=null){

            echo  '<div class="form-group has-error has-feedback">';

            echo form_password($confirmpassdata);
            echo form_error('passwordConfirmation');
            echo ' <span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            echo "</div>";
        }
        else {
            echo form_password($confirmpassdata);
        }

        //#########   mail    ############//

        echo '<h4><label for="mail">Email</label></h4>';
        if(form_error('mail')!=null){

            echo  '<div class="form-group has-error has-feedback">';

            echo form_input($maildata);
            echo form_error('mail');
            echo ' <span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            echo "</div>";
        }
        else {
            echo form_input($maildata);
        }

        ?>

        <h4>Choisir un avatar :</h4>

        <div class="form-group">
            <label for="sel-avatar">Choisir l'avatar</label>
            <select name="sel-avatar" size=5 id="sel-avatar" class="form-control">
                <?php foreach ($map as $image){
    echo  '
    <option value="'.$image.'"></option>';
}?>
            </select>
        </div>

        <input class="btn btn-default my-style size18" type="submit"value="Register">
    </form>
</div>

<script src="<?php echo site_url('assets/js/avatar.js'); ?>" ></script>

</body>
</html>