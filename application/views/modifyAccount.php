<?php


?>


<h2><?php echo $user->username?></h2>
<h2><?php echo $user->mail?></h2>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>nom</th>
        <th>description</th>
        <th>telechargement</th>
    </tr>
    </thead>
    <tbody>
   <?php
   foreach ($schema as $sch){
    echo  "<tr>";
    echo      "<td>".$sch["name"]."</td>";
    echo      "<td>".$sch["description"]."</td>";
    echo    "<td>".$sch["download"]."</td>";
    echo  "</tr>";
   }
?>
    </tbody>
</table>
</div>