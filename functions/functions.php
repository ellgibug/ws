<?php
require_once ("connection.php");

//загрузка всех данных из БД
function fetchAllData($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM workers 
      JOIN professions ON workers.profession_id = professions.id 
      LEFT JOIN payment ON payment.worker_id = workers.id ORDER BY workers.id");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//загрузка профессий
function fetchProfessions($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM professions");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//функция для фильтрации курса валюты
function changePaymentFromRubToUSD()
{
    if ($_GET['money'] == 'rub'){
        return 1;
    } elseif ($_GET['money'] == 'usd'){
        return 0.017;
    }
}

//функция для выбора столбца в таблице с запрлатой
function chooseMonth()
{
    switch ($_GET['month']){
        case 0: return 'payment'; break;
        case 1: return 'january'; break;
        case 2: return 'february'; break;
        case 3: return 'march'; break;
        case 4: return 'april'; break;
        case 5: return 'may'; break;
        case 6: return 'june'; break;
        case 7: return 'july'; break;
        case 8: return 'august'; break;
        case 9: return 'september'; break;
        case 10: return 'october'; break;
        case 11: return 'november'; break;
        case 12: return 'december'; break;
        default: return 'payment'; break;
    }
}

//функция для выдачи премии
function setPremium($pdo, $month, $profession)
{
    $stmt = $pdo->prepare("UPDATE payment JOIN workers ON payment.worker_id = workers.id 
      SET $month = ($month+5000)*1.2 WHERE workers.profession_id = ".$profession);
    
    return $stmt->execute();
}

