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
    
    // if (isset($_SESSION['user_id'])) {
    //     echo "Usuário logado com ID: " . $_SESSION['user_id'] . "<br>";
    //     echo "role_id: " . (isset($_SESSION['role_id']) ? $_SESSION['role_id'] : 'Não definido') . "<br>";
    // } else {
    //     echo "Usuário não logado.";
    // }
    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin - Responder Perguntas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<style>
   body {
    background-color: #f5f7fb;
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: auto;
    background-color: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 0 12px rgba(0, 168, 107, 0.15);
}

h2, h3 {
    color: #00a86b;
    text-align: center;
    margin-bottom: 25px;
}

.list-group {
    list-style: none;
    padding: 0;
}

.list-group-item {
    background-color: #f0fdf8;
    border: 1px solid #00a86b;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 15px;
    transition: transform 0.2s ease, background-color 0.2s ease;
    color: #333;
}

.list-group-item:hover {
    background-color: #e6fbf0;
    transform: scale(1.01);
}

.list-group-item strong {
    display: block;
    color: #00a86b;
    margin-bottom: 5px;
}

.btn {
    border: none;
    border-radius: 6px;
    padding: 8px 14px;
    font-weight: bold;
    color: white;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #00a86b;
}

.btn-primary:hover {
    background-color: #008f5d;
    transform: scale(1.05);
}

/* Modal */
.modal-content {
    background-color: #fff;
    border-radius: 10px;
    color: #333;
    border: 1px solid #00a86b;
}

.modal-header, .modal-footer {
    border: none;
}

.modal-title {
    color: #00a86b;
}

.btn-close {
    filter: none;
}

.form-label {
    color: #00a86b;
    font-weight: 500;
}

.form-control {
    background-color: #fff;
    border: 1px solid #ccc;
    color: #333;
    border-radius: 6px;
    padding: 10px;
}

.form-control:focus {
    border-color: #00a86b;
    box-shadow: 0 0 6px rgba(0, 168, 107, 0.4);
    background-color: #fefefe;
    color: #333;
}

.modal-footer .btn-primary {
    background-color: #00a86b;
    color: white;
}

.modal-footer .btn-primary:hover {
    background-color: #008f5d;
}

</style>
<body>
<div class="container mt-4">
    <h2>Painel de Respostas</h2>

    <h3>Todas as Perguntas</h3>
    <ul class="list-group">
    <?php foreach ($questions as $q) { ?>
        <li class="list-group-item">
            <strong><?php echo isset($q['email']) ? htmlspecialchars($q['email']) : 'Usuário desconhecido'; ?>:</strong>
            <?php echo htmlspecialchars($q['question']); ?><br>
            <?php if ($q['answer']) { ?>
                <strong>Resposta:</strong> <?php echo htmlspecialchars($q['answer']); ?>
            <?php } else { ?>
                <button class="btn btn-sm btn-primary mt-2" style="background-color: #00a86b;" data-bs-toggle="modal" data-bs-target="#answerModal" data-id="<?php echo $q['id']; ?>">Responder</button>
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
                    <button type="submit" class="btn btn-primary" style="background-color: #00a86b;">Enviar Resposta</button>
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
