<?php echo $this->extend("master") ?>


<?php echo $this->section("head") ?>

<head>
    <?php echo $this->include("styles/formStyle") ?>
</head>

<?php echo $this->endSection() ?>


<?php echo $this->section("content") ?>

<form class="row g-3 formRegister" action="<?php echo url_to("home.validation") ?>" method="post">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nome</label>
        <input type="text" class="form-control" id="inputFirstName" name="firstName">
        <?php echo session()->getFlashdata("errors")["firstName"] ?? "" ?>
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Sobrenome</label>
        <input type="text" class="form-control" id="inputLastName" name="lastName">
        <?php echo session()->getFlashdata("errors")["lastName"] ?? "" ?>
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email">
        <?php echo session()->getFlashdata("errors")["email"] ?? "" ?>
        <?php echo session()->getFlashdata("emailcep_error") ?? "" ?>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
        <?php echo session()->getFlashdata("errors")["cpf"] ?? "" ?>
        <?php echo session()->getFlashdata("emailcep_error") ?? "" ?>
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" placeholder="00000-000" name="cep">
        <?php echo session()->getFlashdata("errors")["cep"] ?? "" ?>
        <?php echo session()->getFlashdata("cep_error") ?? "" ?>
    </div>
    <div class="col-6">
        <label for="inputAddress2" class="form-label">Status</label>
        <select name="status" id="" class="form-select" aria-label="Default select example">
            <option value="status" selected>Selecione</option>
            <option value="A confirmar">A confirmar</option>
            <option value="A caminho">A caminho</option>
            <option value="Entregue">Entregue</option>
        </select>
        <?php echo session()->getFlashdata("errors")["status"] ?? "" ?>
    </div>
    <div class="col-12 buttonSubmit">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

<?php echo $this->endSection() ?>