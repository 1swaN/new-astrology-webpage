<?php
    if (isset($_POST['selected_date']))
      $selected_date = $_POST['selected_date'];
    else {
      echo "<script type='text/javascript'>alert('Вы не выбрали дату для переноса записи!');</script>";
      echo "<script>location.href='page2.php';</script>";
    }
    if (isset($_POST['session_ids'])) {
      $session_ids = $_POST['session_ids'];
      $host = 'localhost';
      $dbname = 'test_db';
      $username = 'root';
      $password = '';
      // Попытка подключиться к бд с помощью PDO
      try {
        $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
        $start_time = "$selected_date";
        // перебор записей по ID для обновления даты и времени
        foreach ($session_ids as $session_id) {
          $check_query = $pdo->prepare("SELECT * FROM sessions WHERE start_time = :start_time AND id != :id");
          $check_query->bindValue(':start_time', $start_time);
          $check_query->bindValue(':id', $session_id);
          $check_query->execute();
          $existing_session = $check_query->fetch(PDO::FETCH_ASSOC);
          if ($existing_session) {
            echo "<script type='text/javascript'>alert('На выбранную дату и время уже имеется запись!');</script>";
            echo "<script>location.href='page2.php';</script>";
            exit();
          }
          else {
            $stmt = $pdo->prepare("UPDATE sessions SET start_time = :start_time WHERE id = :id");
            $stmt->bindValue(':start_time', $start_time);
            $stmt->bindValue(':id', $session_id);
            if (!$stmt->execute()) {
                echo "Error executing statement: " . $stmt->error;
            }
            else {
              echo "<script type='text/javascript'>alert('Сеанс успешно перенесен на выбранную дату!');</script>";
              echo "<script>location.href='page2.php';</script>";
              exit();
            }
          } 
        }
      }
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      } 
    }
    else {
      echo "<script type='text/javascript'>alert('Вы не выбрали ни одну запись для переноса!');</script>";
      echo "<script>location.href='page2.php';</script>";
    }
?>
