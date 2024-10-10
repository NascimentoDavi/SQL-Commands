<?php

$server = 'localhost';
$database = 'Default';
$username = '';
$password = '';

$dsn = "sqlsrv:Server=$server;Database=$database";

try {
    // Create PDO Instance
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define Command-Line Options
    $options = getopt("t:c:");

    // Get the Table name and Options from Command-Line Arguments
    if (!isset($options['t']) || !isset($options['c']))
    {
        echo "Usage: php createTable.php -t <table_name> -c '<column_definition1>,<column_definition2>,...'\n";
        exit(1);
    }

    $tableName = $options['t'];
    $columns = explode(',', $options['c']);
    $columnsDefinition = implode(', ', $columns);

    // Build the SQL CREATE TABLE statement    
    $sqlCreateTable = "CREATE TABLE $tableName ($columnsDefinition);";

    // Execute SQL to Create Table
    $connection->exec($sqlCreateTable);
    echo "Tabela '$tableName' criada com sucesso!\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Close the connection
    $connection = null;
}