<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Valida RG</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        <form method="POST" action="../back/validaRg.php">
            <br>
            <input type="text" name="rg" placeholder="Digite seu RG" required>
            <?php 
                if(isset($_SESSION['validaRG'])){
                    echo "<br>".$_SESSION['validaRG']."<br>";
                    unset($_SESSION['validaRG']);
                }
            ?>
            <button>Enviar</button>
        </form>
    </section>
</body>

</html>