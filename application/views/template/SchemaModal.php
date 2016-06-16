<!-- Modal -->
<div class="modal fade" id="schemaModal<?php echo $id?>" role="dialog">
    <div class="modal-dialog">
        <?php
    $folder=str_replace(" ","_",$name);
        ?>
        <!-- Modal content-->
        <div class="modal-content capitalize">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="name"><?php echo $name ?></h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="myCarousel<?php echo $id?>" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">

                            <li data-target="#myCarousel<?php echo $id?>" data-slide-to="0" class="active"></li>

                            <?php for($i=1; $i<count($images); $i++){
    echo '<li data-target="#myCarousel<?php echo $id?>" data-slide-to="'.$i.'"></li>';
} ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php  if(!empty($images)){
    foreach ($images as $img){
                            ?>

                            <div class="item">
                                <img src="<?php echo site_url("uploads/schema/image/".$folder."/".$img)?>" alt="Chania" width="450" height="345">
                            </div>

                            <?php }}?>
                        </div>

                        <!--                        Ajout de la classe ACTIVE au premier item de la liste -->
                        <script>
                            $('.carousel-inner .item:first-child').addClass("active")
                        </script>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel<?php echo $id?>" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel<?php echo $id?>" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <p id="description">
                    <?php echo $description?>
                </p>
            </div>
            <div class="modal-footer">

                <a id="linkTumbUp" href="<?php echo site_url(" Schematics/tumb/ ".$id."/like ") ?>">
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    <span id="tumbUp"><?php echo $like["like"]?></span>
                </a>
                <a id="linkTumbDown" href="<?php echo site_url(" Schematics/tumb/ ".$id."/dislike ") ?>">
                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <span id="tumbDown"><?php echo $like["dislike"]?></span>
                </a>
                <button type="button" class="btn btn-default my-style size18">
                    <a href="ftp://173.137.63.1/home/schematics/<?php echo str_replace(" ","_ ",$name)?>.zip">Download</a>
                </button>

            </div>
        </div>

    </div>
</div>