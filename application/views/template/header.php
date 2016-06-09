<?php $this->load->view('template/head'); ?>
    <header>
        <div class="navbar navbar-inverse">
            <div class="container header">
                <div class="row logo">
                    <h1>Schematics</h1>
                </div>
                <div class="row searchline well well-sm">

                    <a href="<?php echo site_url(" /schematics ") ?>" class="col-sm-1">
                        <span class="glyphicon glyphicon-home"></span>
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

                </div>

                <div class="round">
                    <a href="#">
                        <span class="glyphicon glyphicon-user "></span>
                    </a>
                </div>
                <div class="round-content">
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