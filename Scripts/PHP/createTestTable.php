<?php

$server = 'localhost';
$database = 'Default';
$username = '';
$password = '';

$dsn = "sqlsrv:Server=$server;Database=$database";

try {
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlDropTable = "
    IF OBJECT_ID('TestTable', 'U') IS NOT NULL
    BEGIN
        DROP TABLE TestTable;
    END;
    ";

    $connection->exec($sqlDropTable);
    echo "Tabela 'TestTable' removida com sucesso, se existia.\n";

    // SQL para criar a tabela
    $sqlCreateTable = "
    CREATE TABLE TestTable (
        ID INT PRIMARY KEY,
        Name NVARCHAR(50)
    );
    ";

    $connection->exec($sqlCreateTable);
    echo "Tabela 'TestTable' criada com sucesso!\n";

    $sqlInsert = "INSERT INTO TestTable (ID, Name) VALUES (?, ?)";
    $stmt = $connection->prepare($sqlInsert);
    $stmt->execute([1, 'Davi Rodrigues']);

    $sqlSelect = "SELECT * FROM TestTable";
    $stmt = $connection->query($sqlSelect);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        echo "ID: {$row['ID']}, Name: {$row['Name']}\n";
    }

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
} finally {
    $connection = null;
}

?>