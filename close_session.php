<?php
// Connect to database
$host = 'localhost';
$dbname = 'site2';
$username = 'root';
$password = '';

if (isset($_POST['session_ids'])) 
    $session_ids = $_POST['session_ids'];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
foreach ($session_ids as $id) {
    // Check the status of the session
    $query = $pdo->prepare("SELECT status FROM sessions WHERE id = :id");
    $query->bindValue(':id', $id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $status = $result['status'];

    // Close the session only if it is not already closed
    if ($status != 'Closed') {
        try {
            if (isset($_POST['selected_date']))
                $selected_date = $_POST['selected_date'];
            if (isset($_POST['selected_time']))
                $selected_time = $_POST['selected_time'];
                
            $stmt = $pdo->prepare("UPDATE sessions SET status = 'Closed' WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if (!$stmt->execute()) {
                echo "Error executing statement: " . $stmt->error;
            } else {
                echo "<script type='text/javascript'>alert('Сеанс успешно закрыт!');</script>";
                // Redirect back to main page
                echo "<script>location.href='page2.php';</script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Выбранный сеанс уже был закрыт ранее!');</script>";
        echo "<script>location.href='page2.php';</script>";
        exit();
    }
}

?>
