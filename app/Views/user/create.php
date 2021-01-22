<?= $this->extend('layout/template.php'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if (session()->getFlashData('success')) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Data Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="/user/save" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- <input type="hidden" name="user_id" value="<?= session('user_id'); ?>"> -->
                                <div class="form-group">
                                    <label for="nama">User ID</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('user_id')) ? 'is-invalid' : ''; ?>" id="user_id" name="user_id" placeholder="Masukkan User ID yang akan dipakai untuk login" value="<?= old('user_id'); ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('user_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password yang akan dipakai untuk login" value="<?= old('password'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Profil</label>
                                    <input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Masukkan Nama Profil yang ingin ditampilkan" value="<?= old('profile_name'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Role Admin</label>
                                    <select class="form-control" name="user_role" value="<?= old('user_role'); ?>">
                                        <option value="PRIME_ADMIN">Admin Utama</option>
                                        <option value="SECONDARY_ADMIN">Admin Sekunder</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Gambar Profil</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input  <?= ($validation->hasError('profile_img')) ? 'is-invalid' : ''; ?>" id="customFile" name="profile_img"  value="<?= old('profile_img'); ?>"required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('profile_img'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="" class="mt-5 img-preview" width="400" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Masukkan Password Admin <?= session('name'); ?> untuk Autentikasi </label>
                                    <input type="password" class="form-control <?= ($validation->hasError('admin_password')) ? 'is-invalid' : ''; ?>" id="admin_password" name="admin_password" placeholder="Masukkan Password Admin" value="" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('admin_password'); ?>
                                    </div>
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