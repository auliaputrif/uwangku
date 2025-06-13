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
		</style>

		<div class="iklan1">
			<p style="font-size: 14px; font-weight: bold;">
				Transaksi bulan <?= $bulan5 ?>
			</p>
		</div>

		<div class="box_laporan">
			<div class="laporan">
				<div class="detail_laporan">
					<a type="text" style="font-size: 12px;font-weight: regular;position: relative;top: 2px;left: 15px;">
						Pemasukan<br>
					</a>
					<a type="text" style="font-size: 12px;font-weight: regular;position: relative;top: -4px;left: 15px;">
						Pengeluaran
					</a><br>
					<a type="text" style="font-size: 12px;font-weight: regular;position: relative;top: -5px;">
						ㅤ
					</a>
				</div>
				<div class="rightt">
					<?php
					foreach ($laporan as $pemasukan) if ($pemasukan['status_kategori'] == 'Pemasukan') {
						$t_pemasukan += $pemasukan['jumlah_transaksi'];
					}
					foreach ($laporan as $pengeluaran) if ($pengeluaran['status_kategori'] == 'Pengeluaran') {
						$t_pengeluaran += $pengeluaran['jumlah_transaksi'];
					} ?>
					<a type="text" style="font-size: 12px;font-weight: regular;position: relative;top: 2px;color: #088206">
						<?= 'Rp ' . number_format($t_pemasukan) ?><br>
					</a>
					<a type="text" style="font-size: 12px;font-weight: regular;position: relative;top: -4px;color: #FF0000">
						<?= 'Rp ' . number_format($t_pengeluaran) ?><br>
					</a>
					<?php
					if ($t_pemasukan - $t_pengeluaran <= 0) { ?>
						<a type="text" style="font-size: 12px;font-weight: bold;position: relative;top: -5px;color:#FF0000">
							<?= 'Rp ' . number_format($t_pemasukan - $t_pengeluaran) ?>
						</a>
					<?php
					} else { ?>
						<a type="text" style="font-size: 12px;font-weight: bold;position: relative;top: -5px;">
							<?= 'Rp ' . number_format($t_pemasukan - $t_pengeluaran) ?>
						</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="iklan1">
			<p style="font-size: 12px; font-weight: reguler;">
				Riwayat Transaksi
			</p>
		</div>
		<?php
		foreach ($tgl as $t) : ?>
			<div class='box_laporan'>
				<a type='text' style='font-size: 12px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
					<?php echo $t['tanggal_transaksi']; ?>
				</a>
				<hr>
				<?php
				foreach ($transaksi as $tf) if ($tf['tanggal_transaksi'] == $t['tanggal_transaksi']) {
					if ($tf['status_kategori'] == 'Pemasukan') {
				?>
						<div class="laporan" onclick="window.location.href='<?= site_url('transaksi/edit_pemasukan/' . $tf['id_transaksi']); ?>'">
						<?php
					} else {
						?>
							<div class="laporan" onclick="window.location.href='<?= site_url('transaksi/edit_pengeluaran/' . $tf['id_transaksi']); ?>'">
							<?php
						} ?>
							<a style='font-size: 16px;font-weight: bold;position: relative;top: 8px;left: 10px;'>
								<img src='<?= base_url('assets/kategori/');
											echo $tf['icon'] ?>' style='width: 30px;height: 30px;'>
							</a>
							<div class='detail_laporan'>
								<a type='text' style='font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 15px;'>
									<?= $tf['nama_kategori']; ?><br>
								</a>
								<a type='text' style='font-size: 11px;font-weight: regular;position: relative;top: -4px;left: 15px;'>
									<?= $tf['catatan_transaksi']; ?>
								</a>
							</div>
							<div class='rightt'>
								<?php
								if ($tf['status_kategori'] == 'Pemasukan') { ?>
									<a type='text' style='font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 10px;color:#088206'>
										<?= number_format($tf['jumlah_transaksi']); ?>
									</a>
								<?php
								} else { ?>
									<a type='text' style='font-size: 11px;font-weight: bold;position: relative;top: 2px;left: 10px;color:#FF0000'>
										<?= number_format($tf['jumlah_transaksi']); ?>
									</a>
								<?php
								} ?>
							</div>
							</div>
						<?php
					} ?>
						</div><?php
							endforeach;
								?>


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
										<img src="<?= base_url('assets/') ?>img/transaksi.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
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