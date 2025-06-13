		<!--Money-->

		<style>
			.money1 {
				width: 90%;
				height: 80px;
				background-color: #FFFFFF;
				margin-right: auto;
				margin-left: auto;
				margin-top: 20px;
				box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
				border-radius: 10px;
			}

			.money2 {
				width: 50%;
				height: 80px;
				float: left;
			}

			.money3 {
				width: 85%;
				height: 65px;
				background-color: transparent;
				margin-right: auto;
				margin-left: auto;
				border-radius: 10px;
			}

			.iklan1 {
				width: 90%;
				margin-right: auto;
				margin-left: auto;
				margin-top: 20px;
				display: flex;
			}

			.iklan2 {
				width: 90%;
				margin-right: auto;
				margin-left: auto;
				border-radius: 10px;
				box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
			}

			.pilihan1 {
				width: 100%;
				border-bottom-right-radius: 10px;
				border-bottom-left-radius: 10px;
				display: flex;
				overflow: auto;
				margin-right: auto;
				margin-left: auto;
				background-color: #E8EEF0;
				height: 42px;
			}

			.pilihan2 {
				width: 47.5%;
				flex-shrink: 0;
				margin-right: auto;
				margin-left: auto;
				margin-top: 5px;
				margin-bottom: 5px;
				background-color: #FFFFFF;
				border-radius: 10px;
				text-align: center;
				height: 25px;
			}

			.box_laporan {
				width: 90%;
				background-color: #FFFFFF;
				margin-right: auto;
				margin-left: auto;
				box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
				border-radius: 10px;
			}

			.laporan {
				width: 90%;
				margin-right: 0;
				margin-left: 0;
				margin-bottom: 10px;
				display: flex;
			}

			.detail_laporan {
				margin: 0px;
				padding: 0px;
			}

			.rightt {
				position: absolute;
				right: 10%;
				text-align: right;
			}

			.iklan3 {
				width: 90%;
				margin-right: auto;
				margin-left: auto;
				margin-top: 40px;
			}

			.iklan4 {
				width: 90%;
				margin-right: auto;
				margin-left: auto;
				border-radius: 10px;
				box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
			}

			.modal {
				visibility: hidden;
				opacity: 0;
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				display: flex;
				align-items: center;
				justify-content: center;
				background: rgba(77, 77, 77, .7);
				transition: all .4s;
			}

			.modal:target {
				visibility: visible;
				opacity: 1;
			}

			.modal__content {
				border-radius: 4px;
				position: relative;
				width: 500px;
				max-width: 90%;
				background: #fff;
				padding: 1em 2em;
			}

			.modal__footer {
				text-align: right;

				a {
					color: #585858;
				}

				i {
					color: #d02d2c;
				}
			}

			.modal__close {
				position: absolute;
				top: 10px;
				right: 10px;
				color: #585858;
				text-decoration: none;
			}
		</style>

		<div class="iklan1">
			<p style="font-size: 12px; font-weight: reguler;">
				Anggaran biaya pengeluaran
			</p>
			<?php
			if ($user['status_pengguna'] == '1') { ?>
				<button type="text" style="font-size: 12px; font-weight: reguler;position:absolute;right:5%;text-align:right;color:#088206;border-style: none;background-color: transparent;" onclick="window.location.href='#demo-modal'">
					Tambah Anggaran +
				</button>
				<div id="demo-modal" class="modal">
					<div class="modal__content">
						<h1>Maaf....</h1>
						<p>
							Dapatkan fitur ini dengan berlangganan
						</p>
						<a href="#" class="modal__close">&times;</a>
					</div>
				</div>
			<?php
			} else { ?>
				<button type="text" style="font-size: 12px; font-weight: reguler;position:absolute;right:5%;text-align:right;color:#088206;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('anggaran/tambah'); ?>'">
					Tambah Anggaran +
				</button>
			<?php
			} ?>

		</div>
		<div class="box_laporan">
			<?php
			foreach ($anggaran as $key) : ?>
				<div class="laporan" onclick="window.location.href='<?= site_url('anggaran/edit_anggaran/' . $key['id_anggaran']); ?>'">
					<a style="font-size: 16px;font-weight: bold;position: relative;top: 8px;left: 10px;">
						<img src="<?= base_url('assets/kategori/');
									echo $key['icon'] ?>" style="width: 30px;height: 30px;">
					</a>
					<div class="detail_laporan">
						<a type="text" style="font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 15px;">
							<?= $key['nama_kategori']; ?><br>
						</a>
						<a type="text" style="font-size: 11px;font-weight: regular;position: relative;top: -4px;left: 15px;">
							<?= $key['periode_awal']; ?> / <?= $key['periode_akhir']; ?>
						</a>
					</div>
					<div class="rightt">

						<?php
						if ($key['anggaran_digunakan'] >= $key['jumlah_anggaran']) { ?>
							<a type="text" style="font-size: 11px;font-weight: bold;position: relative;top: 8px;left: 10px;color:#FF0000;">
								<?= 'Rp ' . number_format($key['anggaran_digunakan']); ?>
							</a>
						<?php
						} else { ?>
							<a type="text" style="font-size: 11px;font-weight: bold;position: relative;top: 8px;left: 10px;color:#3059E8;">
								<?= 'Rp ' . number_format($key['anggaran_digunakan']); ?>
							</a>
						<?php
						} ?>

						<a type="text" style="font-size: 11px;font-weight: bold;position: relative;top: 8px;left: 10px;">
							/
						</a>
						<a type="text" style="font-size: 11px;font-weight: bold;position: relative;top: 8px;left: 10px;">
							<?= 'Rp ' . number_format($key['jumlah_anggaran']); ?>
						</a>
					</div>
				</div>
			<?php
			endforeach; ?>
		</div>


		<!--Footer-->

		<style>
			.footer1 {
				width: 100%;
				height: 7%;
				background-color: #FFFFFF;
				box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
				position: fixed;
				bottom: 0px;
				border-top-right-radius: 10px;
				border-top-left-radius: 10px;

			}

			.footer2 {
				width: 100%;
				height: 70px;
			}
		</style>

		<div class="footer1">
			<div class="container text-center">
				<div class="row row-cols-4">
					<div class="col">
						<button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('dashboard'); ?>'"><!--Masukan Link pada bagian href-->
							<img src="<?= base_url('assets/') ?>img/home1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
							<p style="font-size: 12px;color: black;">
								Beranda
							</p>
						</button>
					</div>
					<div class="col">
						<button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('transaksi'); ?>'"><!--Masukan Link pada bagian href-->
							<img src="<?= base_url('assets/') ?>img/transaksi1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
							<p style="font-size: 12px;color: black;">
								Transaksi
							</p>
						</button>
					</div>
					<div class="col">
						<button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('anggaran'); ?>'"><!--Masukan Link pada bagian href-->
							<img src="<?= base_url('assets/') ?>img/anggaran.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
							<p style="font-size: 12px;color: black;">
								Anggaran
							</p>
						</button>
					</div>
					<div class="col">
						<button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('profil'); ?>'"><!--Masukan Link pada bagian href-->
							<img src="<?= base_url('assets/') ?>img/akun1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
							<p style="font-size: 12px;color: black;">
								Profil
							</p>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="footer2"></div>

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>