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
		height: 43px;
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
</style>

<div class="money1">
	<div class="money2">
		<div class="money3" style="margin-top: 8px;">
			<a type="text" style="font-size: 14px;font-weight: bold;position: relative;top: 8px;left: 10px;">
				<img src="<?= base_url('assets/'); ?>img/wallet.png" style="width: 30px;height: 30px;"> Dompet Saya
				<p>
					<?= 'Rp ' . number_format($user['total_saldo']); ?>
				</p>
			</a>
		</div>
	</div>

	<div class="money2" style="width: 25%;text-align: center;">
		<a href="<?= site_url('transaksi/pemasukan'); ?>" type="text" style="position: relative;top: 15px;text-decoration: none;">
			<!--Masukan Link pada bagaian href-->
			<img src="<?= base_url('assets/'); ?>img/pemasukkan.png" style="width: 30px;height: 30px;"><!--Ganti Icon pada bagian src-->
			<p style="font-size: 12px;font-weight: bold;color: black;">
				Pemasukan
			</p>
		</a>
	</div>

	<div class="money2" style="width: 25%;text-align: center;">
		<a href="<?= site_url('transaksi/pengeluaran'); ?>" type="text" style="position: relative;top: 15px;text-decoration: none;">
			<!--Masukan Link pada bagaian href-->
			<img src="<?= base_url('assets/'); ?>img/pengeluaran.png" style="width: 30px;height: 30px;"><!--Ganti Icon pada bagian src-->
			<p style="font-size: 12px;font-weight: bold;color: black;">
				Pengeluaran
			</p>
		</a>
	</div>
</div>

<div class="iklan1">
	<p style="font-size: 12px; font-weight: reguler;">
		Laporan Pengeluaran
	</p>
</div>
<div class="box_laporan">
	<div class="pilihan1">
		<div class="pilihan2">
			<button style="border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('dashboard'); ?>'">
				<p style="font-size: 12px; font-weight: bold;">
					Minggu ini
				</p>
			</button>
		</div>
		<div class="pilihan2" style="background-color: #E8EEF0;">
			<button style="border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('dashboard/bulan'); ?>'">
				<p style="font-size: 12px; font-weight: bold;">
					Bulan ini
				</p>
			</button>
		</div>
	</div>
	<?php
	foreach ($data1 as $minggu) :
		$total += $minggu['jumlah_transaksi'];
	endforeach;
	?>
	<p style="font-size: 14px; font-weight: bold;position: relative;top: 8px;left: 10px;">
		<?= 'Rp ' . number_format($total) ?>
	</p>
	<p style="font-size: 10px; font-weight: reguler;position: relative;top: -4px;left: 10px;">
		Total pengeluaran minggu ini
	</p>
	<p style="font-size: 12px; font-weight: reguler;position: relative;left: 10px;">
		Pengeluaran Teratas
	</p>
	<?php
	foreach ($data2 as $minggu) : ?>
		<div class="laporan" onclick="window.location.href='<?= site_url('transaksi/edit_pengeluaran/' . $minggu['id_transaksi']); ?>'">
			<a style="font-size: 16px;font-weight: bold;position: relative;top: -4px;left: 10px;">
				<img src="<?= base_url('assets/kategori/');
							echo $minggu['icon'] ?>" style="width: 30px;height: 30px;">
			</a>
			<div class="detail_laporan">
				<a type="text" style="font-size: 11px;font-weight: bold;position: relative;;top: -11px;left: 15px;">
					<?= $minggu['catatan_transaksi']; ?><br>
				</a>
				<a type="text" style="font-size: 11px;font-weight: regular;position: relative;;top: -17px;left: 15px;">
					<?= 'Rp ' . number_format($minggu['jumlah_transaksi']); ?>
				</a>
			</div>
		</div>
	<?php
	endforeach;
	?>
</div>

<div class="iklan1">
	<p style="font-size: 12px; font-weight: reguler;">
		Transaksi Terkini
	</p>
</div>

<div class="box_laporan">
	<?php
	foreach ($terkini as $kini) :
		if ($kini['status_kategori'] == 'Pemasukan') {
	?>
			<div class="laporan" onclick="window.location.href='<?= site_url('transaksi/edit_pemasukan/' . $kini['id_transaksi']); ?>'">
			<?php
		} else {
			?>
				<div class="laporan" onclick="window.location.href='<?= site_url('transaksi/edit_pengeluaran/' . $kini['id_transaksi']); ?>'">
				<?php
			} ?>
				<a style="font-size: 16px;font-weight: bold;position: relative;top: 8px;left: 10px;">
					<img src="<?= base_url('assets/kategori/');
								echo $kini['icon'] ?>" style="width: 30px;height: 30px;">
				</a>
				<div class="detail_laporan">
					<a type="text" style="font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 15px;">
						<?= $kini['nama_kategori'] ?><br>
					</a>
					<a type="text" style="font-size: 11px;font-weight: regular;position: relative;top: -4px;left: 15px;">
						<?= $kini['tanggal_transaksi'] ?>
					</a>
				</div>
				<div class="rightt">
					<?php
					if ($kini['status_kategori'] == 'Pemasukan') { ?>
						<a type='text' style='font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 10px;color:#088206'>
							<?= number_format($kini['jumlah_transaksi']); ?>
						</a>
					<?php
					} else { ?>
						<a type='text' style='font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 10px;color:#FF0000'>
							<?= number_format($kini['jumlah_transaksi']); ?>
						</a>
					<?php
					} ?>
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
								<img src="<?= base_url('assets/') ?>img/home.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
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
								<img src="<?= base_url('assets/') ?>img/anggaran1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
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