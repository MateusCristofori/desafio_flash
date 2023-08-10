<?php echo $this->extend("master") ?>

<?php echo $this->section("head") ?>

<head>
    <?php echo $this->include("styles/listStyle.php") ?>
</head>

<?php echo $this->endSection() ?>

<?php echo $this->section("content") ?>

<div class="card list">
    <div class="card-body">
        <h4 class="card-title">Entregador deletado</h4>
        <a href="<?php echo url_to("dashboard.index") ?>" class="btn btn-primary link">Voltar para a página inicial</a>
    </div>
</div>

<?php echo $this->endSection() ?>