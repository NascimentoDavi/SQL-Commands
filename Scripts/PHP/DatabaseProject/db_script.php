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

    // Remove the table if it exists
    $sqlDropTable = "
    IF OBJECT_ID('TestTable', 'U') IS NOT NULL
    BEGIN
        DROP TABLE TestTable;
    END;
    ";
    $connection->exec($sqlDropTable);

    // Create the table
    $sqlCreateTable = "
    CREATE TABLE TestTable (
        ID INT PRIMARY KEY,
        Name NVARCHAR(50)
    );
    ";
    $connection->exec($sqlCreateTable);

    // Menu Loop
    while (true) {
        echo "\nWelcome to the people registration:\n";
        echo "1 - Insert an user\n";
        echo "2 - Update an user\n";
        echo "3 - Delete an user\n";
        echo "4 - Show all the users\n";
        echo "5 - Exit\n";
        echo "Choose an option: ";
        
        $option = trim(fgets(STDIN)); // Get user input
        
        switch ($option) {
            case 1:
                insertUser($connection);
                break;
            case 2:
                updateUser($connection);
                break;
            case 3:
                deleteUser($connection);
                break;
            case 4:
                showUsers($connection);
                break;
            case 5:
                echo "Exiting...\n";
                exit;
            default:
                echo "Invalid option. Please choose again.\n";
        }
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $connection = null;
}

// Function to insert a user
function insertUser($connection) {
    echo "Enter user ID: ";
    $id = trim(fgets(STDIN));
    echo "Enter user name: ";
    $name = trim(fgets(STDIN));

    $sqlInsert = "INSERT INTO TestTable (ID, Name) VALUES (?, ?)";
    $stmt = $connection->prepare($sqlInsert);
    $stmt->execute([$id, $name]);
    echo "User inserted successfully.\n";
}

// Function to update a user
function updateUser($connection) {
    echo "Enter user ID to update: ";
    $id = trim(fgets(STDIN));
    echo "Enter new name: ";
    $name = trim(fgets(STDIN));

    $sqlUpdate = "UPDATE TestTable SET Name = ? WHERE ID = ?";
    $stmt = $connection->prepare($sqlUpdate);
    $stmt->execute([$name, $id]);
    echo "User updated successfully.\n";
}

// Function to delete a user
function deleteUser($connection) {
    echo "Enter user ID to delete: ";
    $id = trim(fgets(STDIN));

    $sqlDelete = "DELETE FROM TestTable WHERE ID = ?";
    $stmt = $connection->prepare($sqlDelete);
    $stmt->execute([$id]);
    echo "User deleted successfully.\n";
}

// Function to show all users
function showUsers($connection) {
    $sqlSelect = "SELECT * FROM TestTable";
    $stmt = $connection->query($sqlSelect);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
        foreach ($rows as $row) {
            echo "ID: {$row['ID']}, Name: {$row['Name']}\n";
        }
    } else {
        echo "No users found.\n";
    }
}
