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
    $categoria_id = intval($_POST['categoria_id']);

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
        $tamanhoMaximo = 10 * 1024 * 1024;  
        $tamanhoArquivo = $_FILES['imagem']['size'];

        if ($tamanhoArquivo > $tamanhoMaximo) {
            echo "Erro: O arquivo é muito grande. O tamanho máximo permitido é 5MB.";
            exit();
        }

        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $nomeImagem = uniqid() . '.' . $extensao;
        $caminhoImagem = $pastaDestino . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            $imagem = $nomeImagem;  
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    $sql = "INSERT INTO produtos (nome, preco, descricao, quantidade, imagem, categoria_id) VALUES (:nome, :preco, :descricao, :quantidade, :imagem, :categoria_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':preco' => $preco,
        ':descricao' => $descricao,
        ':quantidade' => $quantidade,
        ':imagem' => $imagem,
        ':categoria_id' => $categoria_id
    ]);

    header('Location: ' . BASE_URL . 'pages-admin/produtos/lista-produtos.php?sucesso=1');
    exit();
}
?>
