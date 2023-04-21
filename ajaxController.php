<?php

//session_start();
require "./PHPMailer/src/PHPMailer.php";
require "./PHPMailer/src/SMTP.php";
require "./PHPMailer/src/Exception.php";
header ("Content-Type:text/html; charset=UTF-8", false);

// запрет кэширования
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0", false);
header("Cache-Control: max-age=0", false);
header("Pragma: no-cache");

mb_internal_encoding("UTF-8");
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

$ajaxController = new AjaxController();
if(isset($_REQUEST['func'])){
  $func   = $_REQUEST['func'];
  $ajaxController = new AjaxController;
  $ajaxController->$func();
}
global $resultArray;
$resultArray = array();




function sendMail($emailTo, $selectedDate, $selectedLanguage, $SelectedServices)
{
  $to = $emailTo;
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  // настройки для отправки сообщений через SMTP
  $mail->isSMTP();
  $mail->CharSet = 'UTF-8';
  $mail->SMTPDebug = 2;
  $mail->Debugoutput = 'html';
  $smtp_server = $mail->Host = "ssl://smtp.mail.ru";
  $mail->SMTPAuth = true;
  $username = $mail->Username = "dmitriy.kuznecov.99@list.ru";
  $password = $mail->Password = "i5r2VBzARy9K1LP7nQjK";
  $mail->SMTPSecure = 'SSL';
  $smtp_port = $mail->Port = 465;
  $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
  $mail->SetFrom('dmitriy.kuznecov.99@list.ru', 'Dmitriy');
  $mail->isHTML(true);
    // добавляем получателей
  $mail->addAddress($to);
  switch ($selectedLanguage) {
    case "Русский":
      $subject = 'Запись к специалисту по астрологии';
      // устанавливаем параметры сообщения
      $mail->Subject = "Сеанс по астрологии";
      $mail->Body = "
        <html>
            <head>
                 <title>Ваша запись на сеанс</title>
            </head>
            <body>
              <p>Детали записи на сеанс</p>
              <table style='border: 1px; cellpadding: 5; cellspacing: 0;'>
                <tr>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Email заказчика</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>День и дата записи</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Язык сеанса</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Выбранные услуги</th>
                </tr>
                <tr>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$emailTo</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$selectedDate</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$selectedLanguage</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$SelectedServices</td>
                </tr>
              </table>
            </body>
        </html>";
      try {
        // отправляем сообщение
        $mail->Send();
        echo "<script type='text/javascript'>alert('Сообщение со всеми подробностями записи было отправлено Вам на почту!');</script>";
      } catch (Exception $e) {
        echo 'Сообщение не отправлено ', $mail->ErrorInfo;
      }
      exit;
    case "English":
      $subject = 'Запись к специалисту по астрологии';
      // устанавливаем параметры сообщения
      $mail->Subject = "Сеанс по астрологии";
      $mail->Body = "
        <html>
            <head>
                 <title>Ваша запись на сеанс</title>
            </head>
            <body>
              <p>Детали записи на сеанс</p>
              <table style='border: 1px; cellpadding: 5; cellspacing: 0;'>
                <tr>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Email заказчика</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>День и дата записи</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Язык сеанса</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Выбранные услуги</th>
                </tr>
                <tr>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$emailTo</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$selectedDate</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$selectedLanguage</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$SelectedServices</td>
                </tr>
              </table>
            </body>
        </html>";
      try {
        // отправляем сообщение
        $mail->Send();
        echo 'Сообщение со всеми подробностями о записи на сеанс было отправлено Вам на почту!';
      } catch (Exception $e) {
        echo 'Сообщение не отправлено ', $mail->ErrorInfo;
      }
      exit;
    case "Español":
      $subject = 'Запись к специалисту по астрологии';
      // устанавливаем параметры сообщения
      $mail->Subject = "Сеанс по астрологии";
      $mail->Body = "
        <html>
            <head>
                 <title>Ваша запись на сеанс</title>
            </head>
            <body>
              <p>Детали записи на сеанс</p>
              <table style='border: 1px; cellpadding: 5; cellspacing: 0;'>
                <tr>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Email заказчика</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>День и дата записи</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Язык сеанса</th>
                  <th style='border: 1px solid #59178f; padding: 5px;'>Выбранные услуги</th>
                </tr>
                <tr>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$emailTo</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$selectedDate</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$selectedLanguage</td>
                  <td style='border: 1px solid #59178f; padding: 5px;'>$SelectedServices</td>
                </tr>
              </table>
            </body>
        </html>";
      try {
        // отправляем сообщение
        $mail->Send();
        echo 'Сообщение со всеми подробностями о записи на сеанс было отправлено Вам на почту!';
      } catch (Exception $e) {
        echo 'Сообщение не отправлено ', $mail->ErrorInfo;
      }
      exit;
  }
}



class AjaxController
{ 
  function __construct()
  {
    $xml      = simplexml_load_file(__DIR__.'/config/db_conf.xml');
    $host     = $xml->host[0];
    $dbname   = $xml->dbname[0];
    $user     = $xml->user[0];
    $password = $xml->password[0];
    //$email    = $xml->email[0];
    $db       = $this->db = new \PDO('mysql: host='.$host.'; dbname='. $dbname, $user, $password);

    $db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
    $db->exec("SET NAMES 'utf8'");
    $db->exec("SET CHARACTER SET 'utf8'");
    $db->exec("SET SESSION collation_connection = 'utf8_general_ci'");
  }
  
  function ifExistsDate($selectedDate, $dbObject) {
    $sqlQuery = "SELECT COUNT(*) as count FROM sessions WHERE start_time = '$selectedDate'";
    $result = $dbObject->query($sqlQuery);
    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $count = $row["count"];
      
      if ($count > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
  
  
  
  function isDateLessNow($time_Difference) {
    global $resultArray;
    $limitedDate = DateTime::createFromFormat('d.m.Y H:i:s', $time_Difference, new DateTimeZone('UTC')); //Преобразуем дату в UTC, чтобы можно было делать сравнение в дальнейшем с началом и концом дня
      if (!$limitedDate) {
        die('Некорректный формат даты');
      } else {
        // Делим дату на часы и дату, чтобы взять только время и прикрепить к нему выбранную пользователем дату для дальнейшего условия
        $limitedDateStr = $limitedDate->format('d.m.y'); 
        $limitedTimeStr = $limitedDate->format('H:i');
        // echo 'Дата: '.$limitedDateStr.' '.'Время: '.$limitedTimeStr;
        // Клонирование даты, чтобы прибавить к ней полтора часа для добавления записи в базу данных. start_time в бд - начало сеанса, end_time - окончание сеанса спустя полтора часа после его начала
        $limitedEndTime = clone $limitedDate;
        $limitedEndTime->modify('+90 minutes');
        if (!$limitedEndTime) {
          die('Ошибка при создании даты окончания');
        }
        else {
          // описание переменных, отвечающих за начала и конец рабочего дня специалиста в часовом поясе UTC
          $startTime = DateTime::createFromFormat('d.m.y H:i:s', $limitedDateStr . ' 07:30:00', new DateTimeZone('UTC'));
          $endTime   = DateTime::createFromFormat('d.m.y H:i:s', $limitedDateStr . ' 19:30:00', new DateTimeZone('UTC'));
          //echo 'Начало: '.$startTime->format('d.m.y H:i:s').' '.'Конец: '.$endTime->format('d.m.y H:i:s');
          //  $limitedEndTime = DateTime::createFromFormat('d.m.Y H:i:s', strtotime("$timeDifference+90 minutes"), new DateTimeZone('UTC'));
          // объявление переменной, обозначающей сегодняшние дату и время для проверки, является ли выбранные пользователем дата и время прошедшими
          $timeNow = date('Y-m-d H:i:s'); 
          $ifOne = (strtotime($limitedDate->format('Y-m-d H:i:s')) < strtotime($timeNow));
          $ifTwo = ($limitedDate >= $startTime) && ($limitedDate <= $endTime);
          // var_dump($ifOne);
          // var_dump($ifTwo);
          if ($ifOne == false && $ifTwo == true) {
            $resultArray['limitedDate'] = $limitedDate;
            // echo $resultArray['limitedDate']->format('d.m.y H:i:s');
            $resultArray['limitedEndTime'] = $limitedEndTime;
            // echo $resultArray['limitedEndTime']->format('d.m.y H:i:s');
            return true;
          }
          else {
            return false;
          }
        }
      }
    }
  
    function isDateTimeGood($selectedDateTime, $customerFIO, $customerEmail, $selected_Services, $choosen_Language, $Mailing, $Reminder) {
      $ajaxController = new AjaxController();
      global $resultArray;
      $querySQL = "SELECT * FROM sessions WHERE start_time AND end_time BETWEEN '$selectedDateTime' AND 'strtotime($selectedDateTime+90 minutes)'";
      $result = $ajaxController->query($querySQL);
      if ($result->num_rows > 0) {
          return false;
      }
      else {
        $limitedDate = $resultArray['limitedDate'];
        $limitedEndTime = $resultArray['limitedEndTime'];
        var_dump($limitedDate);
        var_dump($limitedEndTime);
        $insert1 = $this->query(
          "INSERT INTO `customers` (`Email`, `Full_Name`, `selected_services`, `language`, `mailing`, `reminder`) 
          VALUES (?, ?, ?, ?, ?, ?)", 
          array($customerEmail, $customerFIO, $selected_Services, $choosen_Language, $Mailing, $Reminder), 1);
        $customer_id = $this->db->lastInsertId();
        $insert2 = $this->query(
          "INSERT INTO `sessions` (`customer_id`, `start_time`, `end_time`, `status`) 
          VALUES (?, ?, ?, ?)", 
          array($customer_id, $limitedDate->format('Y-m-d H:i:s'), $limitedEndTime->format('Y-m-d H:i:s'), 'Open')        
        );
        if ($insert1 !== false && $insert2 !== false) {
          return true;
        }
      }
    }
  

  function setZakaz()
  {
    
    $customer_Name    = $this->escapeStr($_POST['customerName']);
    $customer_Surname = $this->escapeStr($_POST['customerSurname']);
    $customer_FIO     = $customer_Name.' '.$customer_Surname;
    $customer_Email   = $this->escapeStr($_POST['customerEmail']);
    $dateOfSession    = $this->escapeStr($_POST['date-time-picker']);
    $convertedDate    = date('Y-m-d H:i:s', strtotime($dateOfSession));
    $selectedServices = $this->escapeStr($_POST['gadanie']);
    $choosenLanguage  = $this->escapeStr2($_POST['fav_language']);
    $timeDifference   = $this->escapeStr($_POST['timeDifference']);
    $mailing          = ''; 
    $reminder         = '';
    if (isset($_POST['mailing'])) {
      $mailing = $this->escapeStr($_POST['mailing']);
    }
    if (isset($_POST['reminder'])) {
      $reminder = $this->escapeStr($_POST['reminder']);
    }
    $customerTime = $this->escapeStr($_POST['customerTime']);
    $classObject = new AjaxController();
    
    if ($classObject->isDateLessNow($timeDifference) == true) {
      echo "<script type='text/javascript'>alert('Ошибка записи! Выбранная дата уже прошла!');</script>";
    } else if ($classObject->ifExistsDate($convertedDate, $this) === true) {
      echo "<script type='text/javascript'>alert('Ошибка записи! Выбранная дата уже занята!');</script>";
    } else {
      // проверка на то, что выбранная пользователем дата вписывается в нужные временные рамки
      if ($classObject->isDateTimeGood($convertedDate, $customer_FIO, $customer_Email, $selectedServices, $choosenLanguage, $mailing, $reminder)) {
        if (isset($mailing) && $mailing == 'checked') {
          sendMail($customer_Email, $convertedDate, $choosenLanguage, $selectedServices);
          exit;
        }
        else {
          echo "<script type='text/javascript'>alert('Запись была успешно произведена!');</script>";
        }
      }
      else {
      echo "<script type='text/javascript'>alert('Данные даты и время уже заняты!');</script>";
      }
    }
  }
  
  



  // если передаёшь парам то возвращает количество затронутых строк? парам2 вернёт айдишник вставленной строки 
  public function query($query, array $values = array(), $param = false, $param2 = false)
  {
    try
    {
      $stmt       = $this->db->prepare($query);
      $values_len = count($values);

      for($i = 0; $i < $values_len; $i++) {
        $value = trim($values[$i]);
        if(preg_match('/^\d+$/', $value)){
          $stmt->bindValue($i + 1, $value, \PDO::PARAM_INT);
        }
        else
        {
          $stmt->bindValue($i + 1, $value, \PDO::PARAM_STR);
        }
      }
      $stmt->execute($values);
      if(!$param){
        return $stmt->fetchAll();
      }
      else
      {
        if($param2)
        {
          return $this->db->lastInsertId();
        }
        else
        {
          return $stmt->rowCount();
        }
      }
      return $stat;
    } catch(\PDOException $err){
      echo 'Ошибка при выборке из БД ' . $err->getMessage(). '<br>
      в файле '.$err->getFile().", строка ".$err->getLine() . "<br><br>Стэк вызовов: " . preg_replace('/#\d+/', '<br>$0', $err->getTraceAsString());
      exit;
    }

  }

  public function escapeStr2($str, $size = 0)
  {
    $str = trim($str);
    $str = preg_replace('/[`\'\"\(\)\[\]]/', '', $str);
    if($size)$str = mb_substr($str, 0, $size, "UTF-8");
    return $str;
  }

  public function escapeStr($str, $size = 0)
  {
    $str = trim($str);
    $str = preg_replace('/[`\'\"\(\)\[\]]/', '', $str);
    $str = htmlentities($str, ENT_QUOTES, "UTF-8");
    if($size)$str = mb_substr($str, 0, $size, "UTF-8");
    return $str;
  }


}
?>