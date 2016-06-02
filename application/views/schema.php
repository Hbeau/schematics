<?php

  $this->load->view('template/head');
    $this->load->view('template/header');
foreach ($data as $item) {
  $this->load->view("template/schema",$item);
}
?>