<?php
session_start();
include('db.php');
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM investimento WHERE usuario_email='$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Investimentos</h1>
        <canvas id="investimentosChart"></canvas>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor Atual</th>
                    <th>Retorno</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['valor_atual']; ?></td>
                    <td><?php echo $row['retorno']; ?></td>
                    <td><?php echo $row['data']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="add_investimento.php">Adicionar Investimento</a>
    </div>
    <script src="scripts.js"></script>
</body>
</html>