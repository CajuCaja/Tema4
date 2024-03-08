
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 200px;
        }

        button {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #resultado {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de IMC</h2>
        <form method="post">
            <input type="text" name="peso" placeholder="Digite o peso (em kg)" required>
            <input type="text" name="altura" placeholder="Digite a altura (em metros). Ex: 1.65" required>
            <button type="submit">Calcular IMC</button>
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            

            $altura =  $_POST['altura'];
            $peso = $_POST['peso'];

            $imc = $peso / ($altura * $altura);

            $dicionario = [
                18.5 => "Abaixo do peso",
                24.9 => "Peso normal",
                29.9 => "Sobrepeso",
                34.9 => "Obesidade grau 1",
                39.9 => "Obesidade grau 2",
                40.0 => "Obesidade grau 3"
            ];

        foreach($dicionario as $key => $value){
            //Se a chave for menor que 40, então testa os valores de acordo com o IMC. 
            if($key < 40.0){
                if($imc <= $key){
                    echo PHP_EOL."$value";
                    break;
                }
                    }else{ //Se a chave for maior ou igual a 40
                        echo PHP_EOL."$value";
                }
            }
			/* AQUI */
			

            echo "<div id='resultado'>Seu IMC é: " . number_format($imc,2) . "</div>";
        }
        ?>
    </div>
</body>
</html>