<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center shadow-lg mb-5">
    <div class="container">
        <h1 class="display-3 fw-extrabold mb-3">Daftar Blog</h1>
        <p class="lead mb-0 opacity-90">Jelajahi kumpulan artikel dan tutorial terbaru dari komunitas kami.</p>
    </div>
</div>

<div class="container my-5">
    <!-- Search Bar -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="" method="get">
                <div class="input-group mb-3 shadow-sm rounded-pill overflow-hidden bg-white p-1">
                    <input type="text" name="keyword" class="form-control border-0 px-4" placeholder="Cari artikel menarik..." value="<?= service('request')->getGet('keyword') ?>">
                    <button class="btn btn-primary rounded-pill px-4 fw-bold" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <?php if (empty($posts)) : ?>
            <div class="col-12 text-center py-5">
                <div class="card bg-light border-0 py-5 rounded-4">
                    <div class="card-body">
                        <i class="fas fa-search fa-3x text-muted mb-3 opacity-50"></i>
                        <h4 class="fw-bold">Tidak ada hasil ditemukan</h4>
                        <p class="text-muted mb-4">Maaf, kami tidak menemukan artikel dengan kata kunci "<strong><?= service('request')->getGet('keyword') ?></strong>".</p>
                        <a href="<?= base_url('post') ?>" class="btn btn-primary rounded-pill px-4 fw-bold">Kembali ke Daftar Blog</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-4">
                    <article class="card h-100 shadow-sm border-0 overflow-hidden">
                        <!-- Post Image -->
                        <?php if (!empty($post['post_image'])) : ?>
                            <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" class="card-img-top" alt="<?= esc($post['title']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else : ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                            </div>
                        <?php endif; ?>

                        <div class="card-body p-4">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <span class="badge rounded-pill px-3 py-2 small fw-bold" style="background-color: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                    <?= esc($post['category_name'] ?? 'General') ?>
                                </span>
                                <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($post['created_at'] ?? 'now')) ?></small>
                            </div>
                            
                            <h5 class="card-title fw-bold mb-3 lh-base">
                                <a href="<?= base_url('post/' . $post['slug']) ?>" class="text-decoration-none text-dark stretched-link hover-primary">
                                    <?= esc($post['title']) ?>
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted mb-4 small">
                                <?= esc(substr(strip_tags($post['content']), 0, 100)) ?>...
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                                <span class="small fw-bold text-dark"><i class="far fa-user me-1 text-primary"></i> <?= esc($post['author'] ?? 'Admin') ?></span>
                                <div class="position-relative z-index-2">
                                    <?php if (logged_in()) : ?>
                                        <a href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-bold">Edit</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <?= $pager->links('post', 'bootstrap_pagination') ?>
    </div>
</div>

<style>
    .hover-primary:hover {
        color: #6366f1 !important;
    }
    .z-index-2 {
        z-index: 2;
    }
</style>

<?= $this->endSection() ?>
