<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold"><?= $post['title'] ?></h1>
        <div class="mt-4">
            <span class="badge bg-light text-dark px-3 py-2 rounded-pill me-2">By <?= $post['author'] ?></span>
            <span class="badge bg-light text-dark px-3 py-2 rounded-pill"><?= date('d F Y', strtotime($post['created_at'] ?? 'now')) ?></span>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('post') ?>">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $post['title'] ?></li>
                </ol>
            </nav>
            <div class="bg-white p-5 rounded shadow-sm">
                <div class="content fs-5 text-dark" style="line-height: 1.8;">
                    <?= nl2br($post['content']) ?>
                </div>
                <hr class="my-5">
                <div class="mt-4">
                    <a href="<?= base_url('post') ?>" class="btn btn-secondary rounded-pill px-4">Kembali ke Daftar Blog</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
