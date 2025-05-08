<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include(__DIR__ . '/../../Controller/protect.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');
 

if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === 3) {
    echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM questions WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fale Conosco - Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Fale Conosco - Usuário</h2>

    <form action="<?= BASE_URL ?>Controller/process-fale-conosco.php" method="post" class="mb-3">
        <div class="mb-3">
            <label for="question" class="form-label">Sua Pergunta</label>
            <textarea name="question" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Pergunta</button>
    </form>

    <h3>Suas Perguntas</h3>
    <ul class="list-group">
        <?php foreach ($questions as $q) { ?>
            <li class="list-group-item">
                <strong>Você:</strong> <?php echo htmlspecialchars($q['question']); ?><br>
                <?php if ($q['answer']) { ?>
                    <strong>Resposta do Admin:</strong> <?php echo htmlspecialchars($q['answer']); ?>
                <?php } else { ?>
                    <em>Aguardando resposta...</em>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
