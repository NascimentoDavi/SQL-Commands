<?php

$server = 'localhost';
$database = 'Default';
$username = '';
$password  = '';

$dsn = "sqlsrv:Server=$server;Database=$database";

try {
    // Create a new PDO instance
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Message indicating successful connection
    echo "Connection successfully established.\n";

    // To remove the table
    $sqlDropTable = "
    IF OBJECT_ID('TestTable', 'U') IS NOT NULL
    BEGIN
        DROP TABLE TestTable;
    END;
    ";

    $connection->exec($sqlDropTable);
    echo "'TestTable' table successfully removed, if exist.\n";

    // To create the Table
    $sqlCreateTable = "
    CREATE TABLE TestTable (
        ID INT PRIMARY KEY,
        Name NVARCHAR(50)
    );
    ";

    $connection->exec($sqlCreateTable);
    echo "'TestTable'! table successfully created\n";

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
    echo "Error: " . $e->getMessage();
} finally {
    $connection = null;
}