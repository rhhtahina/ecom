<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>This is home page</h1>
            <img src="<?= base_url('public/assets/images/butterfly.jpg') ?>" alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>