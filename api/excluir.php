<?php
// Impede o PHP de enviar erros em formato HTML (evita o erro 'Unexpected token <')
mysqli_report(MYSQLI_REPORT_OFF);
header("Content-Type: application/json; charset=utf-8");

// 1. Configuração da Conexão (Porta 3308)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "desenhos_antigos";
$port = 3308;

$conn = @new mysqli($host, $user, $pass, $db, $port);

// Verifica se a conexão falhou
if ($conn->connect_error) {
    echo json_encode([
        "sucesso" => false, 
        "erro" => "Falha na conexão (Porta 3308): " . $conn->connect_error
    ]);
    exit;
}

// 2. Captura o ID enviado pelo JavaScript (FormData)
$id = $_POST["id"] ?? null;

if (!$id) {
    echo json_encode(["sucesso" => false, "erro" => "ID do desenho não foi recebido pelo PHP."]);
    exit;
}

try {
    // 3. BUSCAR A IMAGEM ANTES DE EXCLUIR O REGISTRO
    // Precisamos do nome do arquivo para deletá-lo da pasta imagens/
    $sqlBusca = "SELECT imagem FROM desenhos WHERE id_desenho = ?";
    $stmtBusca = $conn->prepare($sqlBusca);
    $stmtBusca->bind_param("i", $id);
    $stmtBusca->execute();
    $resultado = $stmtBusca->get_result();
    $dados = $resultado->fetch_assoc();

    if ($dados && !empty($dados['imagem'])) {
        $caminhoArquivo = "../imagens/" . $dados['imagem'];
        
        // Deleta o arquivo físico se ele existir
        if (file_exists($caminhoArquivo)) {
            @unlink($caminhoArquivo);
        }
    }
    $stmtBusca->close();

    // 4. EXCLUIR O REGISTRO DO BANCO DE DADOS
    $sqlDel = "DELETE FROM desenhos WHERE id_desenho = ?";
    $stmtDel = $conn->prepare($sqlDel);
    $stmtDel->bind_param("i", $id);
    
    if ($stmtDel->execute()) {
        // Se deletou pelo menos uma linha
        if ($stmtDel->affected_rows > 0) {
            echo json_encode(["sucesso" => true]);
        } else {
            echo json_encode(["sucesso" => false, "erro" => "Nenhum desenho encontrado com o ID: " . $id]);
        }
    } else {
        echo json_encode(["sucesso" => false, "erro" => "Erro no Banco: " . $stmtDel->error]);
    }
    $stmtDel->close();

} catch (Exception $e) {
    echo json_encode(["sucesso" => false, "erro" => "Exceção: " . $e->getMessage()]);
}

$conn->close();
?>
