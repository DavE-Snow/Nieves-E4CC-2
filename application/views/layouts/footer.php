</div>

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script>
    <?php if ($this->session->flashdata("success")) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Nice!',
            text: '<?php echo $this->session->flashdata("success"); ?>';
        })
    <?php endif; ?>
</script>
</body>

</html>