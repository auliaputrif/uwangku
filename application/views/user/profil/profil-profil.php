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
				padding: 20px;
				background-color: #FFFFFF;
				margin: 50px auto;
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

			@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);


			form {
				max-width: 420px;
				margin: 50px auto;
			}

			.feedback-input {
				font-size: 12px;
				border-radius: 5px;
				border: 1px solid #9F9F9F;
				transition: all 0.3s;
				padding: 7px;
				margin-bottom: 15px;
				width: 100%;
				box-sizing: border-box;

			}

			.feedback-input:focus {
				border: 2px solid #3059E8;
			}

			textarea {
				height: 150px;
				line-height: 150%;
				resize: vertical;
			}

			[type="submit"] {
				width: 100%;
				background: #FD982E;
				border-radius: 10px;
				border: 0;
				cursor: pointer;
				color: white;
				font-size: 14px;
				padding-top: 8px;
				padding-bottom: 8px;
				transition: all 0.3s;
				margin-top: -4px;
				font-weight: 400;
			}

			[type="submit"]:hover {
				background: #5100FD;
			}

			* {
				user-select: none;
			}

			*:focus {
				outline: none;
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
				border-radius: 10px;
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
		<?= $this->session->flashdata('pesan'); ?>
		<div class="box_laporan">
			<a type='text' style='font-size: 12px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
				Profil Pengguna
			</a>
			<hr>
			<div class="row row-cols-2" style="margin-bottom: 10px;">
				<div class="col">
					<a type="text" style="font-size: 12px;position:relative;left:2px; font-weight:bold">Email</a>
				</div>
				<div class="col" style="text-align: right;">
					<a type="text" style="font-size: 12px;position:relative;"><?= $user['email'] ?></a>
				</div>
			</div>
			<div class="row row-cols-2" style="margin-bottom: 10px;">
				<div class="col">
					<a type="text" style="font-size: 12px;position:relative;left:2px; font-weight:bold">Nama Lengkap</a>
				</div>
				<div class="col" style="text-align: right;">
					<a type="text" style="font-size: 12px;position:relative;"><?= $user['nama_lengkap'] ?></a>
				</div>
			</div>
			<div class="row row-cols-2" style="margin-bottom: 9px;">
				<div class="col">
					<a type="text" style="font-size: 12px;position:relative;left:2px; font-weight:bold">Kata Sandi</a>
				</div>
				<div class="col" style="text-align: right;">
					<button style="border-style: none;background-color: transparent;" onclick="window.location.href='#change'"><!--Masukan Link pada bagian href-->
						<a type="text" style="font-size: 12px;font-weight:bold;color:#5F5F5F ">
							******
						</a>
					</button>
				</div>
			</div>
			<div class="row row-cols-2">
				<div class="col">
					<a type="text" style="font-size: 12px;position:relative;left:2px; font-weight:bold">No Telepon</a>
				</div>
				<div class="col" style="text-align: right;">
					<?php
					if ($user['no_tlp'] == null) { ?>
						<button style="border-style: none;background-color: transparent;" onclick="window.location.href='#no_tlp'"><!--Masukan Link pada bagian href-->
							<a type="text" style="font-size: 12px;font-weight:bold;color:#5F5F5F ">
								[ Masukkan ]
							</a>
						</button>
					<?php
					} else { ?>
						<button style="border-style: none;background-color: transparent;" onclick="window.location.href='#change_no_tlp'"><!--Masukan Link pada bagian href-->
							<a type="text" style="font-size: 12px;position:relative;"><?= $user['no_tlp'] ?></a>
						</button>
					<?php
					} ?>
				</div>
			</div>

			<!-- Popup -->
			<div id="change" class="modal">
				<div class="modal__content">
					<form method="post" action="<?= site_url('profil/aksi_ubah_pw') ?>">
						<a type='text' style='font-size: 12px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
							Ubah Kata Sandi
						</a>
						<hr>
						<input name="email" type="hidden" class="feedback-input" value="<?= $user['email'] ?>" />
						<a type="text" style="font-size: 11px;position:relative;left:2px">Masukkan Kata sandi lama</a>
						<input name="awal" type="password" class="feedback-input" maxlength="120" minlength="3" title="Kata sandi minimal terdiri dari 3 huruf" required />
						<a type="text" style="font-size: 11px;position:relative;left:2px">Masukkan Kata sandi baru</a>
						<input name="baru" type="password" class="feedback-input" maxlength="120" minlength="3" title="Kata sandi minimal terdiri dari 3 huruf" required />
						<input type="submit" value="Ubah" />
					</form>
					<a href="#" class="modal__close">&times;</a>
				</div>
			</div>

			<div id="no_tlp" class="modal">
				<div class="modal__content">
					<form method="post" action="<?= site_url('profil/aksi_no_tlp') ?>">
						<a type='text' style='font-size: 12px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
							Masukkan No Telepon
						</a>
						<hr>
						<input name="email" type="hidden" class="feedback-input" value="<?= $user['email'] ?>" />
						<input name="no" type="text" id="angka" pattern="\d{9,13}" class="feedback-input" title="Masukkan angka dengan panjang 9-13 digit" required />
						<input type="submit" value="Simpan" />
					</form>
					<a href="#" class="modal__close">&times;</a>
				</div>
			</div>

			<div id="change_no_tlp" class="modal">
				<div class="modal__content">
					<form method="post" action="<?= site_url('profil/aksi_ubah_no_tlp') ?>">
						<a type='text' style='font-size: 12px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
							Ubah No Telepon
						</a>
						<hr>
						<input name="email" type="hidden" class="feedback-input" value="<?= $user['email'] ?>" />
						<input name="no" type="text" id="angka" pattern="\d{9,13}" class="feedback-input" value="<?= $user['no_tlp'] ?>" title="Masukkan angka dengan panjang 9-13 digit" required />
						<input type="submit" value="Ubah" />
					</form>
					<a href="#" class="modal__close">&times;</a>
				</div>
			</div>

		</div>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>