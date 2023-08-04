<?php echo $this->extend("master") ?>

<?php echo $this->section("content") ?>

<form class="row g-3" action="<?php echo url_to("home.validation") ?>" method="post">

    <?php if (session()->has("errors")) : ?>
        <?php echo session()->getFlashdata("errors") ?>
    <?php endif ?>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4" name="password">
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="CEP" name="cep">
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Complemento</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartmento, Torre, Número" name="infoAdditional">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

<?php echo $this->endSection() ?>