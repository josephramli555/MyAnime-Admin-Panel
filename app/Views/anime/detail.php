<?= $this->extend('layout/template.php'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Detail Anime</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="font-weight-bold"><?= $anime['nama']; ?></h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <img src="/img/<?= $anime['cover']; ?>" width="300" class="img-fluid">
                            <h4 class="card-subtitle mb-2 text-muted mt-3">Plot</h4>
                            <p class="card-text"><?= $anime['plot']; ?></p>

                            <h4 class="card-subtitle mb-2 text-muted mt-3">Tahun Rilis</h4>
                            <p class="card-text"><?= $anime['tahun_rilis']; ?></p>

                            <h4 class="card-subtitle mb-2 text-muted mt-3">Total Episode</h4>
                            <p class="card-text"><?= $anime['jumlah_episode']; ?></p>

                            <h4 class="card-subtitle mb-2 text-muted mt-3">Penulis</h4>
                            <p class="card-text"><?= $anime['penulis']; ?></p>

                            <a href="/home" class="btn btn-success">Back to Home</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>
<!-- /.content-wrapper -->