<?php
// Configurações de conexão
$host = '127.0.0.1'; // Ou 'localhost'
$port = '3306';      // Porta padrão do MySQL
$db = 'u911899691_db_frog';
$user = 'u911899691_root';
$pass = 'Fe020106@'; // Insira sua senha
$charset = 'utf8mb4';

// Configurações do PDO
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
?>
