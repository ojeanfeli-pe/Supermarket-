<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$arquivo = fopen('produto.txt', 'r');

if (!$arquivo) {
    die("Erro ao abrir o arquivo.");
}

echo "<h1>Lista de Produtos</h1>";

while (!feof($arquivo)) {
    $linha = fgets($arquivo, 1024);
    echo "<p>" . htmlspecialchars($linha) . "</p>";
}

fclose($arquivo);
?>
