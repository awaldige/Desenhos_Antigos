<?php
// 1. Configurações de exibição de erros (ajuda a debugar no Render)
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json; charset=utf-8");

// 2. Dados do Aiven (Ajuste a senha se necessário)
$host = "mysql-63c6648-streaming-desenhos.j.aivencloud.com";
$port = 28840;
$user = "avnadmin";
$pass = "AVNS_y1R_KaHJC0qp4VAHb_k"; 
$dbname = "defaultdb";

// 3. Inicializa a conexão com SSL (Obrigatório para o Aiven)
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

$conectar = @mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);

if (!$conectar) {
    echo json_encode(["erro" => "Falha na conexão com Aiven: " . mysqli_connect_error()]);
    exit;
}

// 4. Define o charset para não quebrar acentos
mysqli_set_charset($conn, "utf8mb4");

// 5. Busca todos os desenhos
$sql = "SELECT * FROM desenhos ORDER BY id_desenho DESC";
$result = mysqli_query($conn, $sql);

$dados = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dados[] = [
            "id_desenho" => $row["id_desenho"],
            "nome" => $row["nome"],
            "ano_lancamento" => $row["ano_lancamento"],
            "descricao" => $row["descricao"] ?? "",
            "imagem" => $row["imagem"] ?? null,
            "video_url" => $row["video_url"] ?? ""
        ];
    }
}

echo json_encode($dados);
mysqli_close($conn);
?>
