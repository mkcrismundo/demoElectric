<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="section-padding bg-light-custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h2 class="text-primary-custom">Login</h2>
                        <p class="text-muted mb-0">Puihaha Electric Company</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= esc($error) ?></div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('login') ?>">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username" value="<?= old('username') ?>" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
