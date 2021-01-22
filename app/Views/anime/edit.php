<?= $this->extend('layout/template.php'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>General Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Form</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Form Edit Data Anime</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/anime/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $anime['id']; ?>">
            <input type="hidden" name="oldcover" value="<?= $anime['cover']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama">Judul Anime</label>
                  <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $anime['nama']; ?>" placeholder="Masukkan Judul Anime">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tahun_rilis">Tahun Rilis</label>
                  <input type="number" class="form-control" id="tahun_rilis" name="tahun_rilis" value="<?= $anime['tahun_rilis']; ?>"placeholder="Masukkan Tahun Rilis">
                </div>
                <div class="form-group">
                  <label for="jumlah_episode">Jumlah Episode</label>
                  <input type="number" class="form-control" id="jumlah_episode" name="jumlah_episode" value="<?= $anime['jumlah_episode']; ?>" placeholder="Masukkan Jumlah Episode">
                </div>
                <div class="form-group">
                  <label for="penulis">Penulis</label>
                  <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $anime['penulis']; ?>" placeholder="Masukkan Nama Penulis">
                </div>
                <div class="form-group">
                  <label for="plot">Plot</label>
                  <textarea rows="4" class="form-control" id="plot" name="plot"><?= $anime['plot']; ?></textarea>
                </div>
                <div class="form-group">

                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input  <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="customFile" name="cover">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                      </div>
                    </div>
                  </div>
                    <img src="/img/<?= $anime['cover']; ?>" class="mt-5 img-preview" width="400"alt="">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
          <!-- /.card -->

          <!-- Form Element sizes -->

          <!-- /.card -->

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.card -->
<?= $this->endSection(); ?>