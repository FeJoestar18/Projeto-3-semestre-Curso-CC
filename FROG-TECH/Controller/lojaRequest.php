<?php
session_start();
include_once(__DIR__ . '/Conect/conecao.php');
include_once(__DIR__ . '/protect.php');
include_once(__DIR__ . '/Conect/config-url.php');
include_once(__DIR__ . '/func/exibir-modal-verificar-role_id.php');


if (empty($_SESSION['user_id']) || $_SESSION['role_id'] !== 3) {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);
    exit;
}

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

$sql_categorias = "SELECT DISTINCT c.id, c.nome FROM categorias c ORDER BY c.nome ASC";
$stmt_categorias = $pdo->query($sql_categorias);
$categorias = $stmt_categorias->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT p.*, c.nome AS categoria_nome 
          FROM produtos p
          JOIN categorias c ON p.categoria_id = c.id";

$conditions = [];
if (!empty($search)) {
    $conditions[] = "p.nome LIKE :search_nome OR p.descricao LIKE :search_descricao";
}

if (!empty($categoria)) {
    $conditions[] = "p.categoria_id = :categoria";
}

if ($conditions) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

$stmt = $pdo->prepare($query);

if (!empty($search)) {
    $stmt->bindValue(':search_nome', '%' . $search . '%');
    $stmt->bindValue(':search_descricao', '%' . $search . '%');
}

if (!empty($categoria)) {
    $stmt->bindValue(':categoria', $categoria);
}

$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['search'])) {
    if ($produtos) {
        foreach ($produtos as $produto) {
            echo renderProduto($produto);
        }
    } else {
        echo '<p>Nenhum produto encontrado.</p>';
    }
    exit;
}

function renderProduto($produto) {
    return '<div class="produto">' .
        '<img src="' . BASE_URL . 'uploads-files-produtos/' . htmlspecialchars($produto['imagem']) . '" alt="' . htmlspecialchars($produto['nome']) . '" width="100" height="100">' .
        '<h3>' . htmlspecialchars($produto['nome']) . '</h3>' .
        '<p>' . htmlspecialchars($produto['descricao']) . '</p>' .
        '<p>Preço: R$ ' . number_format($produto['preco'], 2, ',', '.') . '</p>' .
        '<a href="produto.php?id=' . $produto['id'] . '">Ver mais</a>' .
        '</div>';
}
?>
