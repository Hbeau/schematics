<body>

<header >
    <div class="login row" >
        <span class="name">
        <?php if(isset($login)){
           echo $login;
        }
        else{
            echo "connexion";
        }
        ?>
        </span>
    </div>
</header>


