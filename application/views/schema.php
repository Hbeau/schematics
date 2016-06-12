<div class="container-fluid wrapper-schema">
    <?php
    /*$this->load->view('template/header');*/
    for ($i=0 ; $i<5 ; $i++) {
        foreach ($data as $item) {
            echo '<div id="'.$item['id'].'" class="schema">' ;
            $this->load->view("template/schema",$item);
            $this->load->view("template/SchemaModal",$item);
            echo '</div>';
        }
    }
    ?>
</div>