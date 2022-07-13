<?php
if ($this->session->userdata('login') == NULL) {
    redirect(base_url());
}
if ($this->session->userdata('role') != 1) {
    redirect(base_url() . "guest");
} ?>
<!doctype html>
<html lang="es">

<h1 class="mt-5">Nuevo usuario</h1>
<form action="<?php echo base_url(); ?>new-user/save" method="post" class="mt-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control <?php echo form_error('name') ? 'is-invalid' : ''; ?>" placeholder="Nombre completo" value="<?php echo set_value('name') ?>">
                <div class=" invalid-feedback">
                    <?php echo form_error('name'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Apellidos</label>
                <input type="text" name="lastname" class="form-control <?php echo form_error('lastname') ? 'is-invalid' : ''; ?>" placeholder="Apellidos" value="<?php echo set_value('lastname') ?>">
                <div class="invalid-feedback">
                    <?php echo form_error('lastname'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Correo eléctronico" value="<?php echo set_value('email') ?>">
                <div class="invalid-feedback">
                    <?php echo form_error('email'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Password" value="<?php echo set_value('password') ?>">
                <div class="invalid-feedback">
                    <?php echo form_error('confirm'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control <?php echo form_error('confirmPassword') ? 'is-invalid' : ''; ?>" placeholder="Confirm Password" value="<?php echo set_value('confirmPassword') ?>">
                <div class="invalid-feedback">
                    <?php echo form_error('confirmPassword'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>