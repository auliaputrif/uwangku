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
        margin-bottom: 10px;
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

    .pilihan2:hover{
        background-color: #FD982E;
    }

    .pilihan3 {
        width: 47.5%;
        flex-shrink: 0;
        margin-right: auto;
        margin-left: auto;
        margin-top: 5px;
        margin-bottom: 5px;
        background-color: #E8EEF0;
        border-radius: 10px;
        text-align: center;
        height: 25px;
    }

    .pilihan3:hover{
        background-color: #FD982E;
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
        position: relative;
        top: 10px;
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

    .btn-1{
        border-style: none;
        background-color: transparent;
    }

</style>

<div class="box_laporan">
    <div class="pilihan1">
        <div class="pilihan3">
            <button class="btn-1" onclick="window.location.href='<?= site_url('profil/k_pemasukan'); ?>'">
                <p style="font-size: 12px; font-weight: bold;">
                    Pemasukan
                </p>
            </button>
        </div>
        <div class="pilihan2" >
            <button class="btn-1" onclick="window.location.href='<?= site_url('profil/k_pengeluaran'); ?>'">
                <p style="font-size: 12px; font-weight: bold;">
                    Pengeluaran
            </button>
        </div>
    </div>
    <?php
    foreach ($pengeluaran as $p) : ?>
        <div class="laporan">
            <a style="position: relative;top: -4px;left: 10px;">
                <img src="<?= base_url('assets/kategori/');
                            echo $p['icon'] ?>" style="width: 30px;height: 30px;">
            </a>
            <div class="detail_laporan">
                <a type="text" style="font-size: 12px;font-weight: bold;position: relative;;top: -11px;left: 20px;">
                    <?= $p['nama_kategori']; ?><br>
                </a>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>