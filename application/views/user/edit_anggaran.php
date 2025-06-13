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
				max-width: 420px;
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

			.hapus {
				width: 100%;
				background: #FF0000;
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
				margin-top: 10px;
			}

			.hapus:hover {
				background: white;
				color: black;
				border-style: 1px;
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
		<form method="post" action="<?= site_url('anggaran/aksi_edit_anggaran/' . $anggaran['id_anggaran']); ?>">
			<div class="box_laporan"><a type='text' style='font-size: 12px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
					Edit Anggaran
				</a>
				<hr>
				<?= form_error('jumlah', '<small class="animation a4 text-danger pl-3">', '</small>'); ?>
				<input name="jumlah" type="number" class="feedback-input" placeholder="Rp" style="color: #3059E8;" min="10000" value="<?= $anggaran['jumlah_anggaran'] ?>" required />
				<?= form_error('kategori', '<small class="animation a4 text-danger pl-3">', '</small>'); ?>
				<select class="feedback-input" name="kategori" required>
					<option selected disabled value="">Pilih Kategori:</option>
					<?php
					foreach ($kategori as $key) : ?>
						<option value="<?= $key['id_kategori']; ?>"><?= $key['nama_kategori']; ?> </option>
					<?php
					endforeach;
					?>
				</select>
				<a type="text" style="font-size: 11px;position:relative;left:2px">Waktu mulai</a>
				<?= form_error('awal', '<small class="animation a4 text-danger pl-3">', '</small>'); ?>
				<input name="awal" type="date" class="feedback-input" value="<?= $anggaran['periode_awal'] ?>" required />
				<a type="text" style="font-size: 11px;position:relative;left:2px">Waktu berakhir</a>
				<?= form_error('akhir', '<small class="animation a4 text-danger pl-3">', '</small>'); ?>
				<input name="akhir" type="date" class="feedback-input" value="<?= $anggaran['periode_akhir'] ?>" min="<?= date('Y-m-d')?>" required />
				<textarea name="catatan" class="feedback-input" placeholder="Catatan"></textarea>
				<input type="submit" value="Simpan" />
		</form>
		<button class="hapus" onclick="window.location.href='<?= site_url('anggaran/hapus_anggaran/' . $anggaran['id_anggaran']); ?>'">
			<img src="<?= base_url('assets/') ?>img/hapus.png" style="width: 25px;height: 25px;">
		</button>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>