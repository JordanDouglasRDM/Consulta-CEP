<?php
if(isset($_GET['cep'])) {
  $cep = htmlentities($_GET['cep']);
  $url = "https://viacep.com.br/ws/" . $cep . "/json/";
  $response = file_get_contents($url);
  if (!$response) {
    echo "<script>alert('URL de pesquisa indisponível no momento, tente novamente mais tarde.'); window.location.href='index.html';</script>";
    
  }  
  $data = json_decode($response, true);
  if (isset($data["erro"])) {
    echo "<script>alert('CEP não encontrado, verifique o número digitado e tente novamente.'); window.location.href='index.html';</script>";
      
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados CEP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <table>
    <tr>
          <th>CEP</th>
          <th>Logradouro</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>Estado</th>
        </tr>
        <tr>
          <td><?php echo $data["cep"]; ?></td>
          <td><?php echo $data["logradouro"]; ?></td>
          <td><?php echo $data["bairro"]; ?></td>
          <td><?php echo $data["localidade"]; ?></td>
          <td><?php echo $data["uf"]; ?></td>
        </tr>
      </table>
      <br>
      <form action="index.html" method="post">
        <input type="submit" value="Voltar">
      </form>
    </body>
    </html>