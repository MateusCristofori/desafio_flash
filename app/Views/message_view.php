<?php echo $this->extend("master") ?>

<?php echo $this->section("head") ?>

<head>
    <style>
        .message-card {
            margin-top: 20px;
            position: relative;
            right: -10%;
            width: 80%;
            justify-content: center;
            align-items: center;
        }

        .link {
            width: 100%;
        }
    </style>
</head>

<?php echo $this->endSection() ?>

<?php echo $this->section("content") ?>

<div class="card message-card">
    <div class="card-body">
        <h4 class="card-title">Entregador deletado</h4>
        <a href="<?php echo url_to("dashboard.index") ?>" class="btn btn-primary link">Voltar para a página inicial</a>
    </div>
</div>

<?php echo $this->endSection() ?>