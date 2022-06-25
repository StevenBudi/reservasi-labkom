<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="card data shadow">
<div class="card-header ">
        <h5 class="text-center"><strong>Data Laboratorium</strong></h5>
    </div>
<!-- Tabs navs -->
<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Ruang RPL</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Ruang Multimedia</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Ruang Jaringan</a>
    </li>
</ul>

<!-- Tabs navs -->

<!-- Tabs content -->
<!-- Tabs content -----RPL---------------------------------------------->
<div class="tab-content" id="ex1-content">
    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">  
    <div class="row">
        <div class="col-lg-6">
        <img src="<?= base_url('images/room1.jpg')?>" class="img-fluid">
        </div>
    <div class="col-lg-6">
    <h1>Software Engineering Laboratory </h1>
			<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
			<strong>Features:</strong>
    <ul>
 				<li class="text-justify ">Jumlah Komputer :<?= $rpl['pc']?></li>
 				<li class="text-justify ">Jumlah Meja :<?= $rpl['meja']?></li>
 				<li class="text-justify ">Jumlah Kursi :<?= $rpl['kursi']?></li>
 				<li class="text-justify ">Jumlah Papan Tulis :<?= $rpl['papan_tulis']?></li>
 				<li class="text-justify ">Jumlah Penghapus :<?= $rpl['penghapus']?></li>
 				<li class="text-justify ">Jumlah Kabel VGA :<?= $rpl['kabel_VGA']?></li>
			</ul>
    </div>
    </div>
</div>
 <!-- Tabs content -----MULMED---------------------------------------------->  
    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    <div class="row">
        <div class="col-lg-6">
        <img src="<?= base_url('images/room2.jpg')?>" class="img-fluid">
        </div>
    <div class="col-lg-6 t">
    <h1>Multimedia Laboratory </h1>
			<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
			<strong>Features:</strong>
    <ul>
 				<li class="text-justify  list">Jumlah Komputer :<?= $mulmed['pc']?></li>
 				<li class="text-justify  list">Jumlah Meja :<?= $mulmed['meja']?></li>
 				<li class="text-justify  list">Jumlah Kursi :<?= $mulmed['kursi']?></li>
 				<li class="text-justify  list">Jumlah Papan Tulis :<?= $mulmed['papan_tulis']?></li>
 				<li class="text-justify  list">Jumlah Penghapus :<?= $mulmed['penghapus']?></li>
 				<li class="text-justify  list">Jumlah Kabel VGA :<?= $mulmed['kabel_VGA']?></li>
			</ul>
    </div>
    </div>
    </div>
 <!-- Tabs content -----TKJ---------------------------------------------->  
    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
    <div class="row">
        <div class="col-lg-6">
        <img src="<?= base_url('images/room3.jpg')?>" class="img-fluid">
        </div>
    <div class="col-lg-6">
    <h1>Network Laboratory </h1>
		<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
		<strong>Features:</strong>
    <ul>
 				<li class="text-justify ">Jumlah Komputer :<?= $tkj['pc']?></li>
 				<li class="text-justify ">Jumlah Meja :<?= $tkj['meja']?></li>
 				<li class="text-justify ">Jumlah Kursi :<?=$tkj['kursi']?></li>
 				<li class="text-justify ">Jumlah Papan Tulis :<?=$tkj['papan_tulis']?></li>
 				<li class="text-justify ">Jumlah Penghapus :<?= $tkj['penghapus']?></li>
 				<li class="text-justify ">Jumlah Kabel VGA :<?= $tkj['kabel_VGA']?></li>
			</ul>
    </div>
    </div>
    </div>
</div>
<!-- Tabs content -->
<?= $this->endSection() ?>