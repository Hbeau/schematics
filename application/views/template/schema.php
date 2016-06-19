<div class="data">
    <?php var_dump($category) ?>
    <?php echo "<img src='".site_url("/uploads/avatar/".$author[0]->avatar)."' width='50'>" .$author[0]->username?>
    <a href="#" class="schemaTitle " data-toggle="modal" data-info="<?php echo $id?>" data-target="#schemaModal<?php echo $id?>">
        <div class="images">
            <img src='http://lorempixel.com/350/350' />
        </div>
        <div class="vcenter capitalize">
            <h2>
                <?php echo $name ?>
            </h2>
        </div>
    </a>
</div>