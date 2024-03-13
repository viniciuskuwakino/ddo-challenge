<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
    <h2>Formulário da empresa</h2>

    <form id="forms" action="" method="POST">
        <label for="cnpj">CNPJ:</label><br>
        <input type="text" id="cnpj_input" name="cnpj" value="" placeholder="" required><br>
        <button onclick="loadCnpj(event)">Load CNPJ</button><br>

        <label for="razao_social">Nome/Razão Social:</label><br>
        <input type="text" id="razao_social" name="razao_social" value="" placeholder=""><br>

        <label for="nome_fantasia">Nome Fantasia:</label><br>
        <input type="text" id="nome_fantasia" name="nome_fantasia" value="" placeholder=""><br>

        <label for="logradouro">Logradouro:</label><br>
        <input type="text" id="logradouro" name="logradouro" value="" placeholder=""><br>

        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero" value="" placeholder=""><br>

        <label for="bairro">Bairro:</label><br>
        <input type="text" id="bairro" name="bairro" value="" placeholder=""><br>

        <label for="complemento">Complemento:</label><br>
        <input type="text" id="complemento" name="complemento" value="" placeholder=""><br>

        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais" value="" placeholder=""><br>

        <label for="uf">Estado:</label><br>
        <input type="text" id="uf" name="uf" value="" placeholder=""><br>

        <label for="municipio">Cidade:</label><br>
        <input type="text" id="municipio" name="municipio" value="" placeholder=""><br>

        <label for="cep">CEP:</label><br>
        <input type="text" id="cep" name="cep" value="" placeholder=""><br>

        <input type="submit"></input>

        <hr>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $company = array(
                    "cnpj" => $_POST['cnpj'],
                    "razao_social" => $_POST['razao_social'],
                    "nome_fantasia" => $_POST['nome_fantasia'],
                    "logradouro" => $_POST['logradouro'],
                    "numero" => $_POST['numero'],
                    "bairro" => $_POST['bairro'],
                    "complemento" => $_POST['complemento'],
                    "pais" => $_POST['pais'],
                    "uf" => $_POST['uf'],
                    "municipio" => $_POST['municipio'],
                    "cep" => $_POST['cep'],
                );


                if (!file_exists("data.json")){
                    $temp[] = $company;
                    $json_data = json_encode($temp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    echo $json_data;
                    file_put_contents("data.json", $json_data);
                } else {
                    $file = file_get_contents("data.json");
                    $temp = json_decode($file, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    $temp[] = $company;
                    $json_data = json_encode($temp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    file_put_contents("data.json", $json_data);
                }
            }

        ?>

    </form>
</body>
</html>