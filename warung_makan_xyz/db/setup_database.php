<?php
// Database setup script for Warung Makan XYZ

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";

try {
    // Create connection without selecting database first
    $conn = new mysqli($host, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Connected successfully to MySQL server<br>";
    
    // Read SQL file
    $sql_file = 'warung_xyz.sql';
    if (!file_exists($sql_file)) {
        die("SQL file not found: $sql_file");
    }
    
    $sql_content = file_get_contents($sql_file);
    
    // Split SQL content into individual queries
    $queries = explode(';', $sql_content);
    
    $success_count = 0;
    $error_count = 0;
    
    foreach ($queries as $query) {
        $query = trim($query);
        if (!empty($query)) {
            if ($conn->query($query) === TRUE) {
                $success_count++;
                echo "✓ Query executed successfully<br>";
            } else {
                $error_count++;
                echo "✗ Error executing query: " . $conn->error . "<br>";
                echo "Query: " . htmlspecialchars($query) . "<br><br>";
            }
        }
    }
    
    echo "<br><strong>Database setup completed!</strong><br>";
    echo "Successful queries: $success_count<br>";
    echo "Failed queries: $error_count<br>";
    
    // Test the connection to the new database
    $conn->select_db("warung_xyz");
    
    // Check if tables were created
    $tables = ['users', 'kategori_menu', 'menu', 'pesanan', 'detail_pesanan', 'file_upload'];
    echo "<br><strong>Checking created tables:</strong><br>";
    
    foreach ($tables as $table) {
        $result = $conn->query("SHOW TABLES LIKE '$table'");
        if ($result->num_rows > 0) {
            echo "✓ Table '$table' created successfully<br>";
        } else {
            echo "✗ Table '$table' not found<br>";
        }
    }
    
    // Check sample data
    echo "<br><strong>Checking sample data:</strong><br>";
    
    $result = $conn->query("SELECT COUNT(*) as count FROM users");
    $row = $result->fetch_assoc();
    echo "Users: " . $row['count'] . " records<br>";
    
    $result = $conn->query("SELECT COUNT(*) as count FROM kategori_menu");
    $row = $result->fetch_assoc();
    echo "Categories: " . $row['count'] . " records<br>";
    
    $result = $conn->query("SELECT COUNT(*) as count FROM menu");
    $row = $result->fetch_assoc();
    echo "Menu items: " . $row['count'] . " records<br>";
    
    $conn->close();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Database Setup - Warung Makan XYZ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #e67e22;
            text-align: center;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .info {
            background: #e8f4fd;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Setup - Warung Makan XYZ</h1>
        <div class="info">
            <strong>Setup Information:</strong><br>
            - Database: warung_xyz<br>
            - Default admin user: admin / admin123<br>
            - Sample menu items and categories included<br>
        </div>
        
        <p><a href="../index.php">← Back to Application</a></p>
    </div>
</body>
</html>
