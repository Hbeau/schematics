<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 08:58
 */

?>
<form action="" method="post">
    <label for="username">Username :</label>
    <input type="text" name="username" value="<?php echo set_value('username'); ?>"/>
    <?php echo form_error('username'); ?>
    <label for="password">Password</label>
    <input type="password" name="password" value=""/>
    <?php echo form_error('password'); ?>
    <label for="passwordConfirmation">Confirm password :</label>

    <input type="password" name="passwordConfirmation" value=""/>
    <?php echo form_error('passwordConfirmation'); ?>
    <label for="mail">Mail :</label>
    <input type="email" name="mail" value=""/>
    <?php echo form_error('mail'); ?>
    <input type="submit"value="register">

</form>
