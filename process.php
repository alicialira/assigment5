<?php
// Recebe os valores do formulário ou URL
$a = isset($_GET['a']) ? intval($_GET['a']) : null;
$b = isset($_GET['b']) ? intval($_GET['b']) : null;
$c = isset($_GET['c']) ? intval($_GET['c']) : null;
$d = isset($_GET['d']) ? intval($_GET['d']) : null;
$e = isset($_GET['e']) ? intval($_GET['e']) : null;

// Valida se todos os valores foram recebidos
if (is_null($a) || is_null($b) || is_null($c) || is_null($d) || is_null($e)) {
    echo "<h3>Error: Please provide values for all inputs.</h3>";
    exit;
}

// Monta a query string para passar os valores para o Python
$query = "a=$a&b=$b&c=$c&d=$d&e=$e";

// Executa o script Python e passa os valores
$command = "echo \"$query\" | python3 data_management.py";
$output = shell_exec($command);

// Exibe os resultados formatados em HTML
echo "<h2>Results:</h2>";
if ($output) {
    echo $output;
} else {
    echo "<p>Error: Unable to process the data.</p>";
}
?>
