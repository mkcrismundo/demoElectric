<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="section-padding bg-light-custom">
    <div class="container-fluid px-4 px-lg-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
                <h2 class="text-primary-custom mb-1">CRUD Dashboard</h2>
                <p class="text-muted mb-0">Welcome, <?= esc(session()->get('username')) ?>.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('dashboard/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Customer
                </a>

                <form method="POST" action="<?= base_url('logout') ?>" class="d-inline">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-outline-secondary">Logout</button>
                </form>
            </div>
        </div>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= esc($success) ?></div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Account No.</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Meter No.</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($customers)): ?>
                                <?php foreach ($customers as $customer): ?>
                                    <tr>
                                        <td><?= esc($customer['id']) ?></td>
                                        <td><?= esc($customer['account_number']) ?></td>
                                        <td><?= esc($customer['customer_name']) ?></td>
                                        <td><?= esc($customer['email'] ?? '') ?></td>
                                        <td><?= esc($customer['phone'] ?? '') ?></td>
                                        <td><?= esc($customer['meter_number'] ?? '') ?></td>
                                        <td><?= esc(ucfirst($customer['connection_type'])) ?></td>
                                        <td><?= esc(ucfirst($customer['status'])) ?></td>

                                        <td class="text-nowrap">

                                            <!-- VIEW -->
                                            <a href="<?= base_url('dashboard/view/' . $customer['id']) ?>"
                                               class="btn btn-sm btn-outline-success">
                                                View
                                            </a>

                                            <!-- EDIT -->
                                            <a href="<?= base_url('dashboard/edit/' . $customer['id']) ?>"
                                               class="btn btn-sm btn-outline-primary">
                                                Edit
                                            </a>

                                            <!-- DELETE -->
                                            <form method="POST"
                                                  action="<?= base_url('dashboard/delete/' . $customer['id']) ?>"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Delete this customer account?');">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="9" class="text-center py-5 text-muted">
                                        No customer accounts found.
                                    </td>
                                </tr>

                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>