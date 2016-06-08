<?php $this->load->view('template/head'); ?>
<body>

<header>

    <div class="navbar navbar-inverse" >
        <div class="nav-collapse">

            <ul class="nav">
                <li><a href="#">most recent</a></li>
                <li><a href="#">most popular</a></li>
                <li><a href="#">most downloaded</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>

        </div>
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
    </div>



   

</header>


