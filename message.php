<!-- alert message -->
<?php if(isset($_SESSION['message']) && isset($_SESSION['message_type'])): ?>
    <?php $alertClass = $_SESSION['message_type'] === 'success' ? 'alert-success' : 'alert-danger'; ?>
    <?php $alertIcon = $_SESSION['message_type'] === 'success' ? 'Success' : 'Error'; ?>

    <div class="d-flex justify-content-center">
        <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert" style="max-width: 600px;">
            <strong><?= $alertIcon ?>:</strong> <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <?php unset($_SESSION['message']); ?>
    <?php unset($_SESSION['message_type']); ?>
<?php endif; ?>


