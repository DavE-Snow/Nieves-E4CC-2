<?php
if ($this->session->userdata('login') == NULL) {
    redirect(base_url());
}
if ($this->session->userdata('role') != 1) {
    redirect(base_url() . "guest");
} ?>

<h1 class="mt-5">Lista de usuarios</h1>
<h2 class="mt-5">Bienvenido</h2>
<h3><?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('lastname') ?></h3>
<div class="text-right">
    <a href="<?php echo base_url(); ?>new-user" class="btn btn-info">
        <i class="material-icons">person_add</i>
    </a>
</div>
<table class="table mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Activo</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <tr>
                <th scope="row"><?php echo $value->id ?></th>
                <td><?php echo $value->name . ' ' . $value->lastname ?></td>
                <td><?php echo $value->email ?></td>
                <td><?php echo $value->role_text ?></td>
                <td><?php echo $value->status_user ? 'Sí' : 'No' ?></td>
                <td>
                    <a href="<?php echo base_url(); ?>user/<?php echo $value->id ?>" class="btn btn-primary">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="<?php echo base_url(); ?>user/delete/<?php echo $value->id ?>" class="btn btn-danger">
                        <i class="material-icons">person_remove</i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>