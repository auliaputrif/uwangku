<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                        </div>
                        <form class="user" method="post" action="<?= site_url("auth/registrasi"); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" pattern="[A-Za-z ]+" name="nama" placeholder="Masukkan Nama Lengkap..." value="<?= set_value('nama')?>" required>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email')?>" required>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" minlength="3" id="password1" name="password1" placeholder="Kata Sandi" required>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" minlength="3" id="password2" name="password2" placeholder="Masukkan ulang kata sandi" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Buat Akun
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <p class="small">Sudah punya akun? <a href="<?= base_url('auth'); ?>">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>