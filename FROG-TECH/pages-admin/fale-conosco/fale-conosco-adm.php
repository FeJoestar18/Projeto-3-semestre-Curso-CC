<?php
session_start();
include(__DIR__ . '/../../Controller/Conect/conecao.php');
include_once(__DIR__ . '/../../Controller/Conect/config-url.php');
include_once(__DIR__ . '/../../Controller/func/exibir-modal-verificar-role_id.php');


if (isset($_SESSION['user_id']) && ($_SESSION['role_id'] === 1 || $_SESSION['role_id'] === 2)) {
    // echo "Usuário logado com ID: " . $_SESSION['user_id'];
} else {
    $imgUrl = BASE_URL . "/img/Modal-Error.png";
    exibirModal($imgUrl);  
    exit;
}

if (!isset($pdo)) {
    die("Erro ao conectar com o banco de dados.");
}

$stmt = $pdo->prepare("SELECT q.*, u.email FROM questions q JOIN usuarios u ON q.user_id = u.id ORDER BY q.created_at DESC");
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($_SESSION['user_id'])) {
        echo "Usuário logado com ID: " . $_SESSION['user_id'] . "<br>";
        echo "role_id: " . (isset($_SESSION['role_id']) ? $_SESSION['role_id'] : 'Não definido') . "<br>";
    } else {
        echo "Usuário não logado.";
    }
    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin - Responder Perguntas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Painel de Respostas - Admin</h2>

    <h3>Todas as Perguntas</h3>
    <ul class="list-group">
    <?php foreach ($questions as $q) { ?>
        <li class="list-group-item">
            <strong><?php echo isset($q['email']) ? htmlspecialchars($q['email']) : 'Usuário desconhecido'; ?>:</strong>
            <?php echo htmlspecialchars($q['question']); ?><br>
            <?php if ($q['answer']) { ?>
                <strong>Resposta:</strong> <?php echo htmlspecialchars($q['answer']); ?>
            <?php } else { ?>
                <button class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#answerModal" data-id="<?php echo $q['id']; ?>">Responder</button>
            <?php } ?>
        </li>
    <?php } ?>
</ul>

</div>

<div class="modal fade" id="answerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Responder Pergunta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL ?>Controller/admin/process-fale-conosco-adm.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="question_id" id="question_id">
                    <div class="mb-3">
                        <label for="answer" class="form-label">Resposta</label>
                        <textarea name="answer" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar Resposta</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var answerModal = document.getElementById('answerModal');
    answerModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var questionId = button.getAttribute('data-id');
        console.log(questionId); 
        document.getElementById('question_id').value = questionId;
    });
});

</script>
<?php include(__DIR__ . "/../../components/menu-rapido.php"); ?>
</body>
</html>
