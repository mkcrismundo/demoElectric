<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="section-padding bg-light-custom">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-primary-custom mb-1">Customer Account Details</h2>
                <p class="text-muted mb-0">
                    View customer information
                </p>
            </div>

            <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>

        <div class="card">
            <div class="card-body p-4">

                <h4 class="text-primary-custom mb-4">
                    <?= esc($customer['customer_name']) ?>
                </h4>

                <div class="row g-4">

                    <div class="col-md-6">
                        <strong>ID</strong>
                        <p class="text-muted"><?= esc($customer['id']) ?></p>
                    </div>

                    <div class="col-md-6">
                        <strong>Account Number</strong>
                        <p class="text-muted"><?= esc($customer['account_number']) ?></p>
                    </div>

                    <div class="col-md-6">
                        <strong>Customer Name</strong>
                        <p class="text-muted"><?= esc($customer['customer_name']) ?></p>
                    </div>

                    <div class="col-md-6">
                        <strong>Email</strong>
                        <p class="text-muted"><?= esc($customer['email'] ?? 'N/A') ?></p>
                    </div>

                    <div class="col-md-6">
                        <strong>Phone</strong>
                        <p class="text-muted"><?= esc($customer['phone'] ?? 'N/A') ?></p>
                    </div>

                    <div class="col-md-6">
                        <strong>Meter Number</strong>
                        <p class="text-muted"><?= esc($customer['meter_number'] ?? 'N/A') ?></p>
                    </div>

                    <div class="col-md-6">
                        <strong>Connection Type</strong>
                        <p class="text-muted">
                            <?= esc(ucfirst($customer['connection_type'])) ?>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Status</strong>
                        <p class="text-muted">
                            <?= esc(ucfirst($customer['status'])) ?>
                        </p>
                    </div>

                    <div class="col-12">
                        <strong>Address</strong>
                        <p class="text-muted">
                            <?= esc($customer['address']) ?>
                        </p>
                    </div>

                </div>

                <div class="mt-4">
                    <a href="<?= base_url('dashboard/edit/' . $customer['id']) ?>"
                       class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>Edit Customer
                    </a>

                    <a href="<?= base_url('dashboard') ?>"
                       class="btn btn-outline-secondary">
                        Back to Dashboard
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>