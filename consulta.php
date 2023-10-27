<?php 
    //inicia conexao
    include('conexao.php');

    //inclui a proteção
    include('protect.php');

    //verifica e inicia a sessão
    if (!isset($_SESSION)){
    session_start();
    }

    //Consultar itens no banco
    $sql ="SELECT * FROM cadastro";
    $query = mysqli_query($mysqli, $sql );
    //print_r($query);
    $resultado = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    
</head>
<body>
    
    <div class="m-5">
    <table class="table text-white" style="border-radius: 15px 15px 0 0;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Descrição</th>
            <th scope="col">NF</th>
            <th scope="col">Valor</th>
            <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($resultado = mysqli_fetch_array($query))
            {
                echo "<tr>";
                echo "<td>" .$resultado['idProduto']. "</td>";
                echo "<td>" .$resultado['Nome']. "</td>";
                echo "<td>" .$resultado['CNPJ']. "</td>";
                echo "<td>" .$resultado['Descricao']. "</td>";
                echo "<td>" .$resultado['NF']. "</td>";
                echo "<td>" .$resultado['Valor']. "</td>";

                echo "<td> 

                <a class=\"btn-sm  btn btn-primary\"            href=\"editar.php?id=$resultado[idProduto]\"> 

                <i class=\" bi-pencil\"></i> 
                </a>   
                    </td>";

                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
    </div>

    <p>
        <a href="logout.php" class="btn btn-danger me-5">Sair</a>
     </p>

</body>
</html>



