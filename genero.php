<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo genero</title>
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
                    if(!isset($_POST['genero'])){
                        require "new_genero.php";
                    }else{
                        $genero = $_POST['genero'] ?? null;
                            
                        if(empty($genero)){
                                echo msg_erro('Todos os dados são obrigatórios');
                            }else{
                                $q = "INSERT INTO generos(genero)VALUE('$genero')";
                                if($banco->query($q)){
                                    echo msg_sucesso("Genero $genero cadastrado com sucesso");
                                }else{
                                    echo msg_erro("Não foi possivel criar o Genero $genero");
                                }
                            }
                    }
                }
                echo voltar();
            ?>
        </div> 
    </body>
</html>