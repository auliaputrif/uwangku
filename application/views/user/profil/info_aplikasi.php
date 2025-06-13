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
		<div class="box_laporan">
		    <div class="row row-cols-1" style="text-align: center;">
		        <div class="col" style="text-align: center;position: relative;">
		            <img src="<?= base_url('assets/'); ?>img/logo.png">

		        </div> <a type="text" style="font-size: 16px;position:relative; font-weight:bold">Oleh AR TEAM</a>
		    </div>

		    <hr>
		    <div class="row row-cols-2" style="margin-bottom: 9px;">
		        <div class="col">
		            <button style="border-style: none;background-color: transparent;" onclick="window.open('https://instagram.com/ridwannn.sr?igshid=OGQ5ZDc2ODk2ZA==', '_blank')"> <!--Masukan Link pada bagian href-->
		                <img src="<?= base_url('assets/'); ?>img/ig.png" style="position: relative;width: 20px;height: 20px;">
		                <a type="text" style="font-size: 12px;position:relative;left:5px; font-weight:bold">Ridhwan Shodiq</a>
		            </button>
		        </div>
		        <div class="col" style="text-align: right;">
		            <button style="border-style: none;background-color: transparent;" onclick="window.open('https://instagram.com/ridwannn.sr?igshid=OGQ5ZDc2ODk2ZA==', '_blank')"><!--Masukan Link pada bagian href-->
		                <img src="<?= base_url('assets/'); ?>img/kanan.png" style="position: relative;width: 20px;height: 20px;">
		            </button>
		        </div>
		    </div>
		    <div class="row row-cols-2" style="margin-bottom: 9px;">
		        <div class="col">
		            <button style="border-style: none;background-color: transparent;" onclick="window.open('https://instagram.com/auliaputriff?igshid=OGQ5ZDc2ODk2ZA==', '_blank')"><!--Masukan Link pada bagian href-->
		                <img src="<?= base_url('assets/'); ?>img/ig.png" style="position: relative;width: 20px;height: 20px;">
		                <a type="text" style="font-size: 12px;position:relative;left:5px; font-weight:bold">Aulia Putri</a>
		            </button>
		        </div>
		        <div class="col" style="text-align: right;">
		            <button style="border-style: none;background-color: transparent;" onclick="window.open('https://instagram.com/auliaputriff?igshid=OGQ5ZDc2ODk2ZA==', '_blank')"><!--Masukan Link pada bagian href-->
		                <img src="<?= base_url('assets/'); ?>img/kanan.png" style="position: relative;width: 20px;height: 20px;">
		            </button>
		        </div>
		    </div>
		    <div class="col" style="text-align:center">
		        <a type="text" style="font-size: 12px;position:relative;left:2px; font-weight:bold">Dibuat November 2023 </a>
		    </div>

		</div>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>