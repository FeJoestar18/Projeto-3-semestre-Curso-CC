<?php
include_once(__DIR__ . '/../Conect/conecao.php');
include_once(__DIR__ . '/../Conect/config-url.php');

error_log("Tamanho máximo permitido para upload: " . ini_get('upload_max_filesize') . "B");
error_log("Tamanho máximo permitido para POST: " . ini_get('post_max_size') . "B");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $preco = floatval($_POST['preco']);
    $descricao = trim($_POST['descricao']);
    $quantidade = intval($_POST['quantidade']);

    $pastaDestino = __DIR__ . '/../../uploads-files-produtos/'; 

if (!is_dir($pastaDestino)) {
    if (mkdir($pastaDestino, 0777, true)) {
        error_log("Diretório criado com sucesso: $pastaDestino");
    } else {
        error_log("Falha ao criar o diretório: $pastaDestino");
        echo "Erro ao criar diretório.";
        exit();
    }
}

$imagem = null;
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {

    error_log("Código de erro do arquivo: " . $_FILES['imagem']['error']);

    $tamanhoMaximo = 5 * 1024 * 1024; 
    $tamanhoArquivo = $_FILES['imagem']['size'];

    error_log("Tamanho do arquivo: " . $tamanhoArquivo . " bytes");

    if ($tamanhoArquivo > $tamanhoMaximo) {
        error_log("Erro: Arquivo muito grande. Tamanho máximo permitido: " . $tamanhoMaximo . " bytes.");
        echo "Erro: O arquivo é muito grande. O tamanho máximo permitido é 5MB.";
        exit();
    }

    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $nomeImagem = uniqid() . '.' . $extensao;
    $caminhoImagem = $pastaDestino . $nomeImagem;

    error_log("Tentando mover o arquivo para: $caminhoImagem");

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
        $imagem = 'uploads/' . $nomeImagem; 
        error_log("Imagem carregada com sucesso: $imagem");
    } else {
        error_log("Erro ao mover o arquivo para o diretório: $caminhoImagem");
        echo "Erro ao fazer upload da imagem.";
        exit();
    }
} else {
    error_log("Erro ao enviar a imagem. Código de erro: " . $_FILES['imagem']['error']);
    echo "Erro ao enviar a imagem.";
    exit();
}

    $sql = "INSERT INTO produtos (nome, preco, descricao, quantidade, imagem) VALUES (:nome, :preco, :descricao, :quantidade, :imagem)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':preco' => $preco,
        ':descricao' => $descricao,
        ':quantidade' => $quantidade,
        ':imagem' => $imagem
    ]);

    header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?sucesso=1');
    exit();
}
?>
