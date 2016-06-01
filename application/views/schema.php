<?php

foreach ($data as $item) {
  $this->load->view("template/schema",$item);
}
?>