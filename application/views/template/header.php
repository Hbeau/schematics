<?php $this->load->view('template/head'); ?>
<header>
    <div class="navbar">
        <div class="container">
            <div class="row logo">
                <div class="fake-logo"></div>
            </div>
            <div class="row searchline well well-sm">
                <!--                      Inserer le lien vers home ici-->
                <a href="#">
                    <span class="glyphicon glyphicon-home col-lg-1"></span>
                </a>
                <div class="searchbar form-group col-lg-8">
                    <input type="text" class="form-control" id="searchbar">
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Lien 1</a></li>
                        <li><a href="#">Lien 2</a></li>
                        <li><a href="#">Lien 3</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!--
<span class="name">

<?php
if(isset($username)){
    echo $username;
    echo "<a href='".site_url("User/disconect")."' class='btn'>deconnexion</a>";
}
else{
    $this->load->view('template/login.php');;
}
?>
</span>
-->
    </div>    
</header>