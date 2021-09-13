<div class="container mt-3">


    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off" > 
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                        </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            

            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-pill badge-danger float-right ml-1" onclick=" return confirm('Anda yakin ingin menghapus data ?');">Hapus</a>
                        <a href="<?= BASEURL ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-pill badge-warning float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#exampleModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-pill badge-primary float-right ml-1">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa">
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="nrp" class="form-label">NRP</label>
                                <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP Mahasiswa">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Mahasiswa">
                            </div>
                        </div>
                        <div class="form-grup">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value=""></option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informatika">Sistem Informatika</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>