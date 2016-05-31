<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 11/05/2016
 * Time: 17:17
 */
?>
<h1>bonjour</h1>
<p> tu t'appel <?php
    if(isset($nom)) echo $nom;?></p>

<a href="<?php echo site_url('Shematics/test')?>"><?php ?></a>

<?php

echo "<img src='".site_url("assets/img/kdance.png")."'>";
?>

