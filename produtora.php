<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Nova Produtora</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>

        <div id="corpo">

            <?php
                if(!is_admin()){
                    echo msg_erro('Área restrita! Você não é administrador!');
                }else{
                    if(!isset($_POST['produtora'])){
                        require "new_produtora.php";
                    }else{
                        $produtora = $_POST['produtora'] ?? null;
                        $pais = $_POST['pais'] ?? null;
                            
                        if(empty($produtora)||empty($pais)){
                                echo msg_erro('Todos os dados são obrigatórios');
                            }else{
                                $q = "INSERT INTO produtoras(produtora,pais)VALUES('$produtora','$pais')";
                                if($banco->query($q)){
                                    echo msg_sucesso("produtora $produtora cadastrado com sucesso");
                                }else{
                                    echo msg_erro("Não foi possivel criar a produtora $produtora");
                                }
                            }
                    }
                }
                echo voltar();
            ?>
        </div> 
    </body>
</html>