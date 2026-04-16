<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Frequently Asked Questions</h1>
        <p class="lead mb-0">Temukan jawaban atas pertanyaan yang sering diajukan.</p>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="accordion shadow-sm" id="faqAccordion">
                <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Apa itu MyBlog?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            MyBlog adalah platform berbagi pengetahuan seputar dunia teknologi dan programming yang dibangun menggunakan CodeIgniter 4 dan Bootstrap 5.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Bagaimana cara berkontribusi?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Anda dapat berkontribusi dengan mengirimkan artikel melalui menu kontak yang tersedia atau melalui repository GitHub kami.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah platform ini gratis?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Ya, semua konten di MyBlog dapat diakses secara gratis oleh siapa saja yang ingin belajar.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
