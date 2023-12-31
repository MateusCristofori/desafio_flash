<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Flash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        html {
            overflow-x: hidden;
        }
    </style>
    <?php echo $this->renderSection("head") ?>

</head>

<body>

    <?php echo $this->include("navbar") ?>

    <?php echo $this->renderSection("content") ?>


    <script>
        function redirect() {
            return (window.location.href = 'http://localhost:8080/updateDelivery');
        }

        function confirmAction() {
            if (!confirm("Deseja excluir o registro?")) {
                return false;
            }
            return true;
        }
    </script>
</body>

</html>