<?php
$host = "mysql-63c6648-streaming-desenhos.j.aivencloud.com";
$port = "28840";
$user = "avnadmin";
$pass = "AVNS_y1R_KaHJC0qp4VAHb_k";
$dbname = "defaultdb";

$conn = mysqli_init();

// O Aiven exige conexão criptografada (SSL)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

$conectar = mysqli_real_connect(
    $conn, 
    $host, 
    $user, 
    $pass, 
    $dbname, 
    $port, 
    NULL, 
    MYSQLI_CLIENT_SSL
);

if (!$conectar) {
    die("Erro na conexão com o banco remoto: " . mysqli_connect_error());
}

// Garante que caracteres especiais (acentos) funcionem bem
mysqli_set_charset($conn, "utf8mb4");
?>
