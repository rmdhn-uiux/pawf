<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="hero-section text-center shadow-lg mb-5">
    <div class="container">
        <h1 class="display-3 fw-extrabold mb-3">Buat Artikel Baru</h1>
        <p class="lead mb-0 opacity-90">Bagikan pengetahuan dan ide cemerlang Anda sekarang.</p>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                            <h6 class="fw-bold mb-2">Mohon perbaiki kesalahan berikut:</h6>
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold text-dark">Judul Artikel</label>
                                    <input type="text" name="title" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" id="title" placeholder="Masukkan judul yang menarik..." required value="<?= old('title') ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="content" class="form-label fw-bold text-dark">Konten Artikel</label>
                                    <textarea name="content" class="form-control bg-light border-0 px-4 py-3 rounded-3" id="content" rows="12" placeholder="Tuliskan isi artikel Anda di sini..." required><?= old('content') ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-light p-4 rounded-4 shadow-sm h-100">
                                    <div class="mb-4">
                                        <label for="category_id" class="form-label fw-bold text-dark small text-uppercase">Kategori</label>
                                        <select name="category_id" id="category_id" class="form-select border-0 px-3 py-2 rounded-3 shadow-sm" required>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['id'] ?>" <?= old('category_id') == $category['id'] ? 'selected' : '' ?>>
                                                    <?= esc($category['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="post_image" class="form-label fw-bold text-dark small text-uppercase">Gambar Unggulan</label>
                                        <div class="input-group">
                                            <input type="file" name="post_image" id="post_image" class="form-control border-0 shadow-sm" accept="image/*" required>
                                        </div>
                                        <small class="text-muted d-block mt-2">Max: 2MB (JPG, PNG, WEBP)</small>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-bold text-dark small text-uppercase d-block mb-3">Status Publikasi</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_published" value="published" checked>
                                            <label class="form-check-label fw-bold text-success" for="status_published">Publish</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_draft" value="draft">
                                            <label class="form-check-label fw-bold text-warning" for="status_draft">Draft</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">Simpan Artikel</button>
                                        <a href="<?= base_url('admin/post') ?>" class="btn btn-light btn-lg rounded-pill fw-bold">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
