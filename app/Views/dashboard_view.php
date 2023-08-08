<?php echo $this->extend("master") ?>

<?php helper("teste") ?>

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
        <button type="button" class="btn btn-primary" style="width: 10%;" onclick="redirect()">Update</button>
    </div>

<?php endforeach ?>

<?php echo $pager->links() ?>

<?php echo $this->endSection() ?>