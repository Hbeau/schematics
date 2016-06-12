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
<<<<<<< HEAD
                    </button>
                </a>
                <div class="searchbar form-group col-sm-7">
                    <input type="text" class="form-control" id="searchbar">
                </div>
=======

                    </a>

                    <div class="searchbar form-group col-sm-8">
                        <input type="text" class="form-control" id="searchbar">
                    </div>

                    <div class="dropdown col-sm-3">
                        <button class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">Menu <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lien 1</a></li>
                            <li><a href="#">Lien 2</a></li>
                            <li><a href="#">Lien 3</a></li>
                        </ul>
                    </div>
>>>>>>> refs/remotes/origin/developpement

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

<<<<<<< HEAD
                <div class="col-sm-3 connexion">
                    <button class="btn btn-default btn-block my-style size18">Connexion</button>
=======
                <div class="round">
                    <a href="#">
                       <?php if(isset($avatar)){
                      echo  "<img src='".site_url("/assets/img/avatar/".$avatar)."' width='100'>";
                       }
                       else{
                         echo '  <span class="glyphicon glyphicon-user "></span>';
                       }
                    ?>
                    </a>
>>>>>>> refs/remotes/origin/developpement
                </div>
            </div>

            <div class="connexion-content">
                <span class="name">
                    <?php
    if(isset($username)){
        echo $username;
        echo "<a href='".site_url("User/disconect")."' class='btn'>deconnexion</a>";
    }else{
        $this->load->view('template/login.php');;
    }
                    ?>
                </span>
            </div>
        </div>


    </div>
</header>