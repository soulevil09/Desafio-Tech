<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clientes";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo "Banco conectado";
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST["nome"];
        $empresa = $_POST["empresa"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

    
        try{
            $sql = "INSERT INTO cliente(nome, empresa, email, mensagem)
            VALUES ('$nome', '$empresa', '$email', '$mensagem');";
    
            $conn->exec($sql);
    
            #echo "<script>alert('Cadastrado com sucesso')</script>";
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        header("Location: index.html");
        #echo "Redirecionamento executado com sucesso";
        exit;
    }
?>


