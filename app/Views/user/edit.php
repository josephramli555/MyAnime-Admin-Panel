<?= $this->extend('layout/template.php'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Admin Page</li>
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
              <h3 class="card-title">Form Ubah Data Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/user/update" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <!-- <input type="hidden" name="user_id" value="<?= session('user_id'); ?>"> -->
                <div class="form-group">
                  <label for="nama">Nama Profil</label>
                  <input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Masukkan Nama Profil yang ingin ditampilkan" value="<?= session('name'); ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar Profil</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input  <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="customFile" name="cover">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      <div class="invalid-feedback">
                        <?= $validation->getError('cover'); ?>
                      </div>
                    </div>
                  </div>
                  <img src="/img/user/<?= session('img'); ?>" class="mt-5 img-preview" width="400" alt="">

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