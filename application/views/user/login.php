
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="login-box ">
        <!-- /.login-logo -->
        <div class="card col col-lg-6">
            <div class="card-body">
                <h5 class="card-title">Login</h5>

                <p class="login-box-msg">Introduzca sus datos de ingreso</p>
                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger">
                        <p><?php echo $this->session->flashdata("error") ?></p>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>control" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Usuario" name="username">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
        </div>
        <!-- /.login-box-body -->
    </div>