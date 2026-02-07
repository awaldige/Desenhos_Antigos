<?php
session_start();
header("Content-Type: application/json; charset=utf-8");

// --- CONFIGURAÇÃO AIVEN ---
$host = "mysql-63c6648-streaming-desenhos.j.aivencloud.com";
$port = 28840;
$user = "avnadmin";
$pass = "AVNS_y1R_KaHJC0qp4VAHb_k"; 
$dbname = "defaultdb";

// Inicializa a conexão com SSL (Obrigatório para o Aiven)
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

$conectar = @mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);

if (!$conectar) {
    echo json_encode(["sucesso" => false, "erro" => "Falha na conexão com o banco remoto"]);
    exit;
}
// --------------------------

$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';

// Prepara a consulta (Usando a conexão $conn inicializada acima)
$stmt = $conn->prepare("SELECT id_usuario, senha, nivel FROM usuarios WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$resultado = $stmt->get_result()->fetch_assoc();

// Verifica a senha (Hash ou texto puro para garantir o teste)
if ($resultado) {
    if (password_verify($senha, $resultado['senha']) || $senha === $resultado['senha']) {
        $_SESSION['usuario_id'] = $resultado['id_usuario'];
        $_SESSION['nivel'] = $resultado['nivel'];
        
        echo json_encode([
            "sucesso" => true, 
            "isAdmin" => ($resultado['nivel'] === 'admin')
        ]);
    } else {
        echo json_encode(["sucesso" => false, "erro" => "Senha incorreta"]);
    }
} else {
    echo json_encode(["sucesso" => false, "erro" => "Usuário não encontrado"]);
}

$conn->close();
?>
