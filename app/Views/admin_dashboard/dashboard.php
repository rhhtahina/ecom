<?= $this->extend('private_layout') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Welcome to admin dashboard</h1>
            <div class="row">
                <div class="col-sm-2">
                    <div class="list-group">
                        <a href="<?= base_url("users") ?>" class="list-group-item">Users</a>
                    </div>
                </div>
                <div class="col-sm-8"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>