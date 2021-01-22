<?= $this->extend('layout/template.php'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Anime List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">My Anime List</li>
          </ol>
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
          <?php if(session()->getFlashData('success')):?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
          </div>
          <?php elseif(session()->getFlashData('error')): ?>
            <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error'); ?>
          </div>
          <?php endif; ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Ultimate Anime List ^_^</h3>
            </div>
            <div class="box-body">
              <div class="pull-right">
                <a href="/anime/addData" class="btn btn-primary float-right mr-3 mt-2">Tambah Anime +</a>
              </div>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Cover</th>
                    <th>Tahun Rilis</th>
                    <th>Jumlah Episode</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $index = 1; ?>
                  <?php foreach ($animes as $anime) : ?>
                    <tr>
                      <td><?= $index++; ?></td>
                      <td><?= $anime['nama']; ?></td>
                      <td><img src="img/<?= $anime['cover']; ?>" width="50"></td>
                      <td><?= $anime['tahun_rilis']; ?></td>
                      <td><?= $anime['jumlah_episode']; ?></td>
                      <td><?= $anime['penulis']; ?></td>
                      <td>
                        <div class="box-body">
                          <div class="pull-right">
                            <span data-toggle="tooltip" data-original-title="Detail Anime">
                              <a class="btn bg-success" href="anime/detail/<?= $anime['id']; ?>">
                                <i class="fas fa-info-circle fa-1x"></i>
                              </a>
                            </span>
                            <span data-toggle="tooltip" data-original-title="Edit Anime">
                              <a class="btn bg-warning" href="anime/edit/<?= $anime['id']; ?>">
                                <i class="fas fa-edit fa-1x"></i>
                              </a>
                            </span>
                            <span data-toggle="tooltip" data-original-title="Delete Anime">
                              <form action="anime/<?= $anime['id']; ?>" method="POST" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn bg-danger" onclick="return confirm('Apa anda yakin untuk menghapus data?');">
                                  <i class="fas fa-trash fa-1x"></i>
                                </button>
                              </form>
                            </span>
                          </div>
                        </div>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Cover</th>
                    <th>Tahun Rilis</th>
                    <th>Jumlah Episode</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
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