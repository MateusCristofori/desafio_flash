<?php echo $this->extend("master") ?>

<?php echo $this->section("content") ?>

<form class="row g-3" action="<?php echo url_to("dashboard.updateDelivery") ?>" method="post">

    <?php if (session()->has("errors")) : ?>
        <?php echo session()->getFlashdata("errors") ?>
    <?php endif ?>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nome</label>
        <input type="text" class="form-control" id="inputFirstName" name="firstName">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Sobrenome</label>
        <input type="text" class="form-control" id="inputLastName" name="lastName">
    </div>
    <div class="col-6">
        <label for="inputAddress2" class="form-label">Status</label>
        <select name="status" id="" class="form-select" aria-label="Default select example">
            <option value="status" selected>Selecione</option>
            <option value="A confirmar">A confirmar</option>
            <option value="A caminho">A caminho</option>
            <option value="Entregue">Entregue</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>

<?php echo $this->endSection() ?>