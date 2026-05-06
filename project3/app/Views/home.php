<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section text-center shadow-lg">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill fw-bold text-uppercase tracking-wider shadow-sm">🚀 Platform Belajar Programming</span>
                <h1 class="display-3 fw-extrabold mb-3 lh-sm">Wujudkan Ide Kreatifmu dengan <span class="text-warning">TechnoDaily</span></h1>
                <p class="lead mb-5 opacity-90 px-md-5">Temukan berbagai tutorial eksklusif, berita teknologi terkini, dan tips cerdas untuk meningkatkan skill programming kamu.</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <a href="<?= base_url('post') ?>" class="btn btn-light btn-lg px-5 rounded-pill shadow fw-bold text-primary">Mulai Membaca</a>
                    <a href="<?= base_url('about') ?>" class="btn btn-outline-light btn-lg px-5 rounded-pill fw-bold">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
<div class="container my-5">
    <div class="row mb-5 align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h2 class="fw-extrabold mb-0">Artikel <span class="text-primary">Terbaru</span></h2>
            <p class="text-muted">Jangan lewatkan update konten terbaru dari kami.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
            <a href="<?= base_url('post') ?>" class="btn btn-link text-primary fw-bold text-decoration-none p-0">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>
    
    <?php if (!empty($latest_posts)) : ?>
        <div class="row g-4">
            <?php foreach ($latest_posts as $post) : ?>
                <div class="col-md-4">
                    <article class="card h-100 shadow-sm border-0 overflow-hidden">
                        <?php if (!empty($post['post_image'])) : ?>
                            <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" class="card-img-top" alt="<?= esc($post['title']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else : ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <span class="badge rounded-pill px-3 py-2 small fw-bold" style="background-color: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                    <?= esc($post['category_name'] ?? 'General') ?>
                                </span>
                            </div>
                            <h5 class="card-title fw-bold mb-3 lh-base">
                                <a href="<?= base_url('post/' . $post['slug']) ?>" class="text-decoration-none text-dark stretched-link hover-primary">
                                    <?= esc($post['title']) ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted mb-4 small">
                                <?= esc(substr(strip_tags($post['content']), 0, 100)) ?>...
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
        <div class="card bg-light border-0 text-center py-5">
            <div class="card-body">
                <p class="text-muted mb-0">Belum ada artikel yang tersedia.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Newsletter / CTA Section -->
<div class="container my-5 pt-5">
    <div class="p-5 rounded-5 bg-dark text-white shadow-lg text-center position-relative overflow-hidden" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80'); background-size: cover; background-position: center;">
        <div class="position-relative z-index-1 py-4">
            <h2 class="display-5 fw-bold mb-3">Siap untuk Mulai Belajar?</h2>
            <p class="lead mb-4 opacity-75">Gabung dengan ribuan pembaca lainnya dan dapatkan update terbaru setiap minggu.</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control form-control-lg rounded-pill border-0 px-4" placeholder="Alamat email kamu...">
                        <button type="button" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-primary:hover {
        color: #6366f1 !important;
    }
    .tracking-wider {
        letter-spacing: 0.1em;
    }
    .z-index-1 {
        position: relative;
        z-index: 1;
    }
</style>

<?= $this->endSection() ?>
