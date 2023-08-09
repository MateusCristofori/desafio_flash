<?php helper("html") ?>
<?php echo $this->extend("master") ?>

<?php echo $this->section("content") ?>


<?php echo $this->section("search_form") ?>

<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<?php echo $this->endSection() ?>


<?php foreach ($deliveries as $delivery) : ?>

    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $delivery->firstName ?> <?php echo $delivery->lastName ?> </h5>
                <small class="text-body-secondary"><?php echo $delivery->created_at ?></small>
            </div>
            <p class="mb-1"><?php echo $delivery->city ?> - CEP (<?php echo $delivery->cep ?>)</p>
            <small class="text-body-secondary"><?php echo $delivery->status ?></small>
        </a>
        <div class="mb-3">
            <?php echo anchor("/updateDelivery/" . $delivery->id, "Update", ["class" => "btn btn-primary mt-1", "style" => "width: 5%"]) ?>
            <?php echo anchor("/delete/" . $delivery->id, "Delete", ["onclick" => "return confirmAction()", "class" => "btn btn-danger mt-1", "style" => "width: 5%"]) ?>
        </div>
    </div>

<?php endforeach ?>

<?php echo $pager->links() ?>

<?php echo $this->endSection() ?>