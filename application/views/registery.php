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
    'class'=>"form-control",
    'name'=>'username',
    'id'=>'username',
    "placeholder"=>"dandre, ecadic ...",
    'value'=>set_value('username')
);
$passdata=array(
    'class'=>"form-control",
    'name'=>'password',
    'id'=>'password',
    "placeholder"=>"*****",
);

$confirmpassdata=array(
    'class'=>"form-control",
    'name'=>'passwordConfirmation',
    'id'=>'passwordConfirmation',
     "placeholder"=>"*****"
);

$maildata=array(
    'type'=>"mail",
    'class'=>"form-control",
    'name'=>'mail',
    'id'=>'mail',
    "placeholder"=>"nom.prenom@mail.com",
    'value'=>set_value('mail')
);
?>

<form action="" method="post">



    <?php



    //################################//
    //######   username   ############//
    //################################//

    echo '<label for="username">Nom d\'utilisateur :</label>';
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

    //################################//
    //######   password   ############//
    //################################//


    echo '<label for="password">Password</label>';
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

    //################################//
    //####  password confirmation  ###//
    //################################//

    echo '<label for="passwordConfirmation">Password</label>';
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

    //################################//
    //#########   mail    ############//
    //################################//
    echo '<label for="mail">Email</label>';
    if(form_error('mail')!=null){

        echo  '<div class="form-group has-error has-feedback">';

        echo form_input($maildata);
        echo form_error('mail');
        echo ' <span class="glyphicon glyphicon-remove form-control-feedback"></span>';
        echo "</div>";
    }
    else {
        echo form_password($maildata);
    }

    ?>

    <input class="btn btn-info" type="submit"value="register">

</form>
</body>
</html>