<html>
<head>
    <meta name="description" content="Código referente ao seguinte vídeo: https://youtu.be/EPlDrd6MXFc">
    <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<?php
//Valendo Grid e Valendo List fornecem o estado de 'checado' nos radio buttons.
$valendogrid = '';
$valendolist = '';
// Nos retorna se será GRID ou LIST
$view = '';
//Nos retorna qual pasta será exibida
$nivelpagina = '';
//Informa a ID da pasta que será exibido
$id = '';

// Pegando o retorno do input feito pelo usuário (Pasta)
if (isset($_GET['nivel'])) {
    $nivelpagina = $_GET['nivel'];
}
//Pegando o retorno do input feito pelo usuário (List ou Grid)
if (isset($_POST['view'])) {
    $view = $_POST['view'];
}

//Coloca o estado 'checado' no radio correspondente
if ($view == 'grid') {
    $valendogrid = 'checked';
} else if ($view == 'list') {
    $valendolist = 'checked';
} else {
    $valendolist = 'checked';
}

//Aqui você informa os IDs das pastas, se forem muitos, cogite informar via Array
$outronivelid = 'EXEMPLO_DE_ID_DE_PASTA1';
$subnivelid =  'EXEMPLO_DE_ID_DE_PASTA2';

//Após retornar qual pasta você quer exibir, informa a variável ID qual é
switch ($nivelpagina) {
    case 1:
        $id = $outronivelid;
        break;
    case 2:
        $id = $subnivelid;
        break;
}

//Constrói o layout do iframe
$iframe = '<iframe src="https://drive.google.com/embeddedfolderview?id=' . $id . '#' . $view . '" style="width:100%;height:500px; border:0;"></iframe>';
?>

<body>
<!-- Formulário com id Checkbox que na realidade é um form com inputs do tipo radio (Desatenção o nome disso), para que o usuário selecione se quer visualizar como List ou como Grid
O PHP dentro do input retorna o estado de 'checked' para a opção selecionada -->
    <form method="post" id="checkbox">
        <input type="radio" name="view" value="list" <?php echo $valendolist ?>> Ver como List <br />
        <input type="radio" name="view" value="grid" <?php echo $valendogrid ?>> Ver como Grid <br />
    </form>
<!-- Botão que navega entre pastas, gerando um evento 'onclick' informando o nível da pasta -->
    <input type="button" class="btn btn-primary btn-lg active" onclick="mudanivel(1)" value="Nível Anterior">
    <input type="button" class="btn btn-primary btn-lg active" onclick="mudanivel(2)" value="Nível Posterior">
    <?php
// retorna o layout do iframe
    echo $iframe;
    ?>
</body>
<script>
// Atualizaa página informando qual botão foi pressionado
    function mudanivel(codigo) {
        window.location.href = '?nivel=' + codigo;
    }

//Realiza um submit do formulário automaticamente a cada alteração realizada nele
    $(document).ready(function() {
        $("#checkbox").on("change", "input:radio", function() {
            $("#checkbox").submit();
        });
    });
</script>
</html>