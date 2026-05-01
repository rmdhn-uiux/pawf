<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>">MyBlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('post') ?>">Blog</a>
        </li>
        <?php if (logged_in()) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/post') ?>">Admin</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a>
        </li>
      </ul>
      <form class="d-flex me-2" action="<?= base_url('post') ?>" method="get">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search" value="<?= service('request')->getGet('keyword') ?>">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <div class="navbar-nav">
        <?php if (logged_in()) : ?>
            <a class="btn btn-outline-danger" href="<?= base_url('logout') ?>">Logout</a>
        <?php else: ?>
            <a class="btn btn-outline-success" href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
