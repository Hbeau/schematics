<?php $this->load->view('template/head'); ?>
<header>
    <div class="navbar navbar-inverse">
        <div class="container header">
            <div class="row logo">
                <h1>Schematics</h1>
            </div>
            <div class="row searchline well well-sm">

                <a href="<?php echo site_url("/schematics") ?>" class="col-sm-1">
                    <button class="btn btn-default btn-block my-style home">
                        <span class="glyphicon glyphicon-home"></span>

                    </button>
                </a>
                <div class="searchbar form-group col-sm-7">
                    <input type="text" class="form-control" id="searchbar">
                </div>
                <div class="dropdown menu col-sm-1">
                    <button class="btn btn-default btn-block dropdown-toggle my-style" type="button" data-toggle="dropdown"> 
                        <img src='<?php echo site_url('assets/img/icon-menu.png') ?>' />
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="size18">Lien 1</a></li>
                        <li><a href="#" class="size18">Lien 2</a></li>
                        <li><a href="#" class="size18">Lien 3</a></li>
                    </ul>
                </div>

                <div class="col-sm-3 connexion">
                    <button class="btn btn-default btn-block my-style size18">
                        <?php 
    if(isset($username)){echo $username;} 
                   else {echo "Connexion";}
                        ?>
                    </button>
                </div>
            </div>

            <div class="connexion-content">

                <div class="connexion-qtip size18 text-center"  style="text-transform:none;">

                    <?php
                    if(isset($username)){
                        echo "<p>Mon compte</p>";
                        //LA Ligne suivante ne fonctionne pas, il faut ajouter l'avatar dans la BDD
                        echo "<img src='".site_url("assets/img/avatar/abstract-1.png")."'>";
                        echo '<a href="'.site_url("User/disconnect").'" class="btn"><button class="btn btn-default btn-block my-style size18">Deconnexion</button></a>';
                    }else{
                        $this->load->view('template/login');
                    }
                    ?>
                </div>
            </div>
            <?php
            if(isset($username) == false){
                $this->load ->view('registery');
            }
            ?>
        </div>

    </div>
</header>