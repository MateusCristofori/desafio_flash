<?php helper("html") ?>
<?php echo $this->extend("master") ?>

<?php echo $this->section("head") ?>

<head>
    <style>
        .list {
            margin-top: 20px;
            position: relative;
            right: -10%;
            width: 80%;
            justify-content: center;
            align-items: center;
        }

        .pager {
            position: relative;
            right: -10%;
        }

        .pager a {
            border-radius: 7px;
            margin-right: 10px;
        }
    </style>
</head>

<?php echo $this->endSection() ?>

<?php echo $this->section("content") ?>

<?php echo $this->section("search_form") ?>

<form class="d-flex" role="search" method="post" action="<?php echo url_to("dashboard.filter") ?>">
    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="searchBar" value="<?php echo old("searchBar") ?>">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
    <?php echo session()->getFlashdata("errors") ?? "" ?></p>
</form>
<?php echo $this->endSection() ?>

<?php if (isset($deliveries)) : ?>
    <?php foreach ($deliveries as $delivery) : ?>

        <div class="list-group list">
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $delivery->firstName ?> <?php echo $delivery->lastName ?> </h5>
                    <small class="text-body-secondary"><?php echo $delivery->created_at ?></small>
                </div>
                <p class="mb-1"><?php echo $delivery->city ?> - CEP (<?php echo $delivery->cep ?>)</p>
                <p class="text-body-secondary">CPF (<?php echo $delivery->cpf ?>)</p>
                <small class="text-body-secondary"><strong><?php echo $delivery->status ?></strong></small>
            </a>
            <div class="mb-3">
                <?php echo anchor("/updateDelivery/" . $delivery->id, "Update", ["class" => "btn btn-primary mt-1"]) ?>
                <?php echo anchor("/delete/" . $delivery->id, "Delete", ["onclick" => "return confirmAction()", "class" => "btn btn-danger mt-1"]) ?>
            </div>
        </div>

    <?php endforeach ?>
<?php endif ?>

<?php if (isset($filtered)) : ?>
    <?php foreach ($filtered as $delivery) : ?>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $delivery->firstName ?> <?php echo $delivery->lastName ?></h5>
                    <small class="text-body-secondary"><?php echo $delivery->created_at ?></small>
                </div>
                <p class="mb-1"><?php echo $delivery->city ?> - CEP (<?php echo $delivery->cep ?>)</p>
                <p class="mb-1"><?php echo $delivery->cpf ?></p>
                <small class="text-body-secondary"><?php echo $delivery->status ?></small>
            </a>
            <div class="mb-3">
                <?php echo anchor("/updateDelivery/" . $delivery->id, "Update", ["class" => "btn btn-primary mt-1", "style" => "width: 5%"]) ?>
                <?php echo anchor("/delete/" . $delivery->id, "Delete", ["onclick" => "return confirmAction()", "class" => "btn btn-danger mt-1", "style" => "width: 5%"]) ?>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>

<?php if (isset($pager)) : ?>
    <div class="pager">
        <?php echo $pager->links() ?>
    </div>
<?php endif ?>

<?php echo $this->endSection() ?>