<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center shadow-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white opacity-75 text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('post') ?>" class="text-white opacity-75 text-decoration-none">Blog</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><?= esc($post['title']) ?></li>
                    </ol>
                </nav>
                <h1 class="display-3 fw-extrabold mb-4"><?= esc($post['title']) ?></h1>
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill shadow-sm fw-bold">
                        <i class="far fa-user me-1"></i> <?= esc($post['author'] ?? 'Admin') ?>
                    </span>
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill shadow-sm fw-bold">
                        <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($post['created_at'] ?? 'now')) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-n5 position-relative z-index-2">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <article class="bg-white p-4 p-md-5 rounded-4 shadow-lg border-0">
                
                <!-- Featured Image -->
                <?php if (!empty($post['post_image'])) : ?>
                    <div class="mb-5 rounded-4 overflow-hidden shadow-sm">
                        <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" class="img-fluid w-100" alt="<?= esc($post['title']) ?>" style="max-height: 500px; object-fit: cover;">
                    </div>
                <?php endif; ?>

                <div class="content fs-5 text-dark mb-5" style="line-height: 1.8;">
                    <?= nl2br(esc($post['content'])) ?>
                </div>

                <div class="d-flex flex-wrap gap-2 pt-4 border-top">
                    <a href="<?= base_url('post') ?>" class="btn btn-light rounded-pill px-4 fw-bold">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Blog
                    </a>
                    <?php if (logged_in()) : ?>
                        <a href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>" class="btn btn-warning rounded-pill px-4 fw-bold">
                            <i class="fas fa-edit me-2"></i> Edit Artikel
                        </a>
                    <?php endif; ?>
                </div>
            </article>
        </div>
    </div>
</div>

<style>
    .my-n5 {
        margin-top: -5rem !important;
    }
    .z-index-2 {
        z-index: 2;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,0.5);
    }
</style>

<?= $this->endSection() ?>
