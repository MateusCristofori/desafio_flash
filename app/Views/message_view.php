<?php echo $this->extend("master") ?>

<?php echo $this->section("content") ?>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $message ?>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>