<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="section-padding bg-light-custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="text-primary-custom mb-1"><?= $action === 'create' ? 'Add Customer Account' : 'Edit Customer Account' ?></h2>
                            <p class="text-muted mb-0">Puihaha Electric Company CRUD</p>
                        </div>
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary">Back</a>
                    </div>

                    <?php if (!empty($validation)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($validation as $message): ?>
                                <div><?= esc($message) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= $action === 'create' ? base_url('dashboard/create') : base_url('dashboard/edit/' . $customer['id']) ?>">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Account Number</label>
                                <input type="text" name="account_number" class="form-control" value="<?= old('account_number', $customer['account_number'] ?? '') ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control" value="<?= old('customer_name', $customer['customer_name'] ?? '') ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" required><?= old('address', $customer['address'] ?? '') ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= old('phone', $customer['phone'] ?? '') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= old('email', $customer['email'] ?? '') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meter Number</label>
                                <input type="text" name="meter_number" class="form-control" value="<?= old('meter_number', $customer['meter_number'] ?? '') ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Connection Type</label>
                                <?php $selectedType = old('connection_type', $customer['connection_type'] ?? 'residential'); ?>
                                <select name="connection_type" class="form-select">
                                    <option value="residential" <?= $selectedType === 'residential' ? 'selected' : '' ?>>Residential</option>
                                    <option value="commercial" <?= $selectedType === 'commercial' ? 'selected' : '' ?>>Commercial</option>
                                    <option value="industrial" <?= $selectedType === 'industrial' ? 'selected' : '' ?>>Industrial</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Status</label>
                                <?php $selectedStatus = old('status', $customer['status'] ?? 'active'); ?>
                                <select name="status" class="form-select">
                                    <option value="active" <?= $selectedStatus === 'active' ? 'selected' : '' ?>>Active</option>
                                    <option value="inactive" <?= $selectedStatus === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    <option value="suspended" <?= $selectedStatus === 'suspended' ? 'selected' : '' ?>>Suspended</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary px-5"><?= $action === 'create' ? 'Create Customer' : 'Update Customer' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
