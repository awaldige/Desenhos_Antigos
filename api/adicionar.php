<?php
mysqli_report(MYSQLI_REPORT_OFF);
header("Content-Type: application/json; charset=utf-8");

// Conexão na porta 3308
$conn = @new mysqli("localhost", "root", "", "desenhos_antigos", 3308);

if ($conn->connect_error) {
    echo json_encode(["sucesso" => false, "erro" => "Conexão falhou na porta 3308"]);
    exit;
}

// Capturando os dados (incluindo o novo campo video_url)
$nome = $_POST["nome"] ?? '';
$ano = $_POST["ano"] ?? 0;
$descricao = $_POST["descricao"] ?? '';
$video_url = $_POST["video_url"] ?? ''; // NOVO CAMPO
$imagemNome = null;

// Lógica da Imagem
if (!empty($_FILES["imagem"]["name"])) {
    $diretorio = "../imagens/";
    if (!is_dir($diretorio)) mkdir($diretorio, 0777, true);

    $extensao = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
    $imagemNome = time() . "_" . uniqid() . "." . $extensao;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $imagemNome);
}

// Ajuste no Prepare e no Bind_Param (adicionado mais um "s" para a string do vídeo)
$stmt = $conn->prepare("INSERT INTO desenhos (nome, ano_lancamento, descricao, imagem, video_url) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $nome, $ano, $descricao, $imagemNome, $video_url);

$resultado = $stmt->execute();

if ($resultado) {
    echo json_encode(["sucesso" => true]);
} else {
    echo json_encode(["sucesso" => false, "erro" => $stmt->error]);
}

$stmt->close();
$conn->close();
