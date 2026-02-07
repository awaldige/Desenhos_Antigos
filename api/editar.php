<?php
// Exibir erros para debug no Render
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json; charset=utf-8");

// --- CONFIGURAÇÃO AIVEN (Ajuste a senha aqui) ---
$host = "mysql-63c6648-streaming-desenhos.j.aivencloud.com";
$port = 28840;
$user = "avnadmin";
$pass = "AVNS_y1R_KaHJC0qp4VAHb_k"; 
$dbname = "defaultdb";

// Inicializa a conexão com SSL para o Aiven
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
$conectar = @mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);

if (!$conectar) {
    echo json_encode(["sucesso" => false, "erro" => "Erro de conexão com o banco remoto"]);
    exit;
}
// ------------------------------------------------

$id = $_POST["id"] ?? null;
$nome = $_POST["nome"] ?? '';
$ano = $_POST["ano"] ?? 0;
$desc = $_POST["descricao"] ?? '';
$video_url = $_POST["video_url"] ?? ''; 
$novaImagem = null;

if (!$id) {
    echo json_encode(["sucesso" => false, "erro" => "ID ausente"]);
    exit;
}

// 1. Lógica para Processar Nova Imagem (se houver)
if (!empty($_FILES["imagem"]["name"])) {
    $pasta = "../imagens/";
    
    // Busca a imagem antiga para deletar o arquivo físico
    $res = mysqli_query($conn, "SELECT imagem FROM desenhos WHERE id_desenho = " . (int)$id);
    $antigo = mysqli_fetch_assoc($res);
    if ($antigo && $antigo['imagem'] && file_exists($pasta . $antigo['imagem'])) {
        @unlink($pasta . $antigo['imagem']);
    }

    $ext = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
    $novaImagem = time() . "_" . uniqid() . "." . $ext;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $pasta . $novaImagem);
}

// 2. Execução do UPDATE (considerando se a imagem mudou ou não)
if ($novaImagem) {
    // Atualiza tudo, incluindo a nova imagem e o vídeo
    $stmt = $conn->prepare("UPDATE desenhos SET nome=?, ano_lancamento=?, descricao=?, imagem=?, video_url=? WHERE id_desenho=?");
    $stmt->bind_param("sisssi", $nome, $ano, $desc, $novaImagem, $video_url, $id);
} else {
    // Atualiza apenas os textos e o vídeo, mantendo a imagem atual
    $stmt = $conn->prepare("UPDATE desenhos SET nome=?, ano_lancamento=?, descricao=?, video_url=? WHERE id_desenho=?");
    $stmt->bind_param("sissi", $nome, $ano, $desc, $video_url, $id);
}

$resultado = $stmt->execute();

echo json_encode([
    "sucesso" => $resultado,
    "erro" => $resultado ? null : $stmt->error
]);

$stmt->close();
$conn->close();
?>

