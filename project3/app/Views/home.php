<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-3 fw-extrabold mb-3">Selamat Datang di <span class="text-warning">MyBlog</span></h1>
                <p class="lead mb-5 opacity-90">Temukan berbagai tutorial, berita, dan tips seputar dunia programming dan teknologi terbaru yang dikemas secara menarik.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="<?= base_url('post') ?>" class="btn btn-light btn-lg px-5 rounded-pill shadow-sm fw-bold">Jelajahi Blog</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
<div class="container">
    <div class="row mb-5">
        <div class="col-12 text-center mb-5">
            <h2 class="fw-bold position-relative d-inline-block pb-3">
                Artikel Terbaru
                <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary rounded" style="width: 60px; height: 4px;"></span>
            </h2>
        </div>
        
        <?php if (!empty($latest_posts)) : ?>
            <div class="row">
                <?php foreach ($latest_posts as $post) : ?>
                    <div class="col-md-4 mb-4">
                        <article class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <span class="badge bg-primary-soft text-primary rounded-pill px-3 py-2 small fw-bold" style="background-color: rgba(13, 110, 253, 0.1);">Blog Post</span>
                                </div>
                                <h5 class="card-title fw-bold mb-3">
                                    <a href="<?= base_url('post/' . $post['slug']) ?>" class="text-decoration-none text-dark stretched-link">
                                        <?= esc($post['title']) ?>
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-4">
                                    <?= esc(substr(strip_tags($post['content']), 0, 110)) ?>...
                                </p>
                                <div class="d-flex align-items-center mt-auto pt-3 border-top">
                                    <div class="small">
                                        <span class="text-muted"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($post['created_at'] ?? 'now')) ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else : ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted italic">Belum ada artikel yang dipublikasikan.</p>
            </div>
        <?php endif; ?>

        <div class="col-12 text-center mt-5">
            <a href="<?= base_url('post') ?>" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow-sm">
                Lihat Semua Artikel
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
