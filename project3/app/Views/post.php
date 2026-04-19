<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Daftar Blog</h1>
        <p class="lead mb-0">Baca artikel terbaru dari komunitas kami.</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php if (empty($posts)) : ?>
            <div class="col-12">
                <div class="alert alert-info text-center py-5">
                    <h4 class="alert-heading">Tidak ada hasil ditemukan</h4>
                    <p class="mb-0">Maaf, kami tidak menemukan artikel dengan kata kunci "<strong><?= service('request')->getGet('keyword') ?></strong>".</p>
                    <a href="<?= base_url('post') ?>" class="btn btn-primary mt-3">Kembali ke Daftar Blog</a>
                </div>
            </div>
        <?php else : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary rounded-pill"><?= $post['status'] ?></span>
                                <small class="text-muted"><?= date('d M Y', strtotime($post['created_at'] ?? 'now')) ?></small>
                            </div>
                            <h5 class="card-title fw-bold mb-3"><?= $post['title'] ?></h5>
                            <p class="card-text text-muted small mb-4">
                                <?= substr(strip_tags($post['content']), 0, 120) ?>...
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="small fw-bold text-dark">By <?= $post['author'] ?></span>
                                <a href="<?= base_url('post/' . $post['slug']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('post', 'bootstrap_pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>
