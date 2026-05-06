<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="hero-section text-center shadow-lg mb-5">
    <div class="container">
        <h1 class="display-3 fw-extrabold mb-3">Admin Panel</h1>
        <p class="lead mb-0 opacity-90">Kelola artikel, kategori, dan konten blog Anda di sini.</p>
    </div>
</div>

<div class="container my-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="fw-extrabold mb-0">Daftar <span class="text-primary">Artikel</span></h2>
            <p class="text-muted mb-0">Total artikel yang terdaftar dalam sistem.</p>
        </div>
        <a href="<?= base_url('admin/post/new') ?>" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold shadow">
            <i class="fas fa-plus me-2"></i> Buat Artikel Baru
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center p-4 mb-4" role="alert">
            <i class="fas fa-check-circle fa-2x me-3 text-success"></i>
            <div>
                <h6 class="fw-bold mb-0">Berhasil!</h6>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">Gambar</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Informasi Artikel</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Kategori</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Status</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td class="ps-4">
                                    <?php if ($post['post_image']): ?>
                                        <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" alt="<?= $post['title'] ?>" class="rounded-3 shadow-sm" style="width: 70px; height: 50px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded-3 shadow-sm" style="width: 70px; height: 50px;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($post['title']) ?></div>
                                    <small class="text-muted d-block mt-1"><i class="far fa-clock me-1"></i> <?= date('d M Y', strtotime($post['created_at'] ?? 'now')) ?></small>
                                </td>
                                <td>
                                    <span class="badge rounded-pill px-3 py-2 fw-bold" style="background-color: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                        <?= esc($post['category_name'] ?? 'General') ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($post['status'] === 'published'): ?>
                                        <span class="badge bg-success-soft text-success rounded-pill px-3 py-2 fw-bold" style="background-color: rgba(25, 135, 84, 0.1);">
                                            <i class="fas fa-check-circle me-1"></i> Published
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-soft text-warning rounded-pill px-3 py-2 fw-bold" style="background-color: rgba(255, 193, 7, 0.1);">
                                            <i class="fas fa-pen me-1"></i> Draft
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm rounded-circle shadow-sm" type="button" data-bs-toggle="dropdown" style="width: 35px; height: 35px;">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3">
                                            <li><a class="dropdown-item py-2" href="<?= base_url('admin/post/' . $post['id'] . '/preview') ?>" target="_blank"><i class="fas fa-eye me-2 text-primary"></i> Preview</a></li>
                                            <li><a class="dropdown-item py-2" href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>"><i class="fas fa-edit me-2 text-warning"></i> Edit</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item py-2 text-danger" href="#" onclick="if(confirm('Apakah Anda yakin ingin menghapus artikel ini?')) window.location='<?= base_url('admin/post/' . $post['id'] . '/delete') ?>'"><i class="fas fa-trash-alt me-2"></i> Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if (empty($posts)): ?>
                <div class="text-center py-5">
                    <p class="text-muted mb-0">Belum ada artikel yang dibuat.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
