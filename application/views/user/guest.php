<?php
if ($this->session->userdata('login') == NULL) {
    redirect(base_url());
} ?>

<h1 class="mt-5">Bienvenido</h1>
<h2><?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('lastname') ?></h2>