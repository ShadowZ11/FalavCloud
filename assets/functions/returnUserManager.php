<?php
session_start();

require_once "functions.php";

$connect = connectFalaDB();

$sqlEmails = $connect->query("SELECT EMAIL FROM USERS");
$emails = $sqlEmails->fetchAll();

function setUSer($userIndex)
{
    $userEmail = $_SESSION['users'][$userIndex]['EMAIL'];

    $rang = $_POST[$userIndex . "-rang"];
    $verifier = $_POST[$userIndex . "-verifier"];

    $status = $GLOBALS["connect"]->prepare("UPDATE USERS SET RANG = :RANG WHERE EMAIL= :EMAIL;");
    $status->execute([":RANG" => $rang, ":EMAIL" => $userEmail]);

    $status = $GLOBALS["connect"]->prepare("UPDATE USERS SET VF = :VF WHERE EMAIL= :EMAIL;");
    $status->execute([":VF" => $verifier, ":EMAIL" => $userEmail]);
}

function deleteUser($userEmail)
{
    $delete = $GLOBALS["connect"]->prepare("DELETE FROM USERS WHERE EMAIL=:EMAIL;");
    $delete->execute([":EMAIL" => $userEmail]);
}

$isModifyButtonClicked = isset($_POST['modify']);
$isDeleteButtonClicked = isset($_POST['delete']);
$isValidationButtonClicked = isset($_POST['validation']);

if ($isDeleteButtonClicked) {
    $userIndex = $_POST['delete'];
    $userEmail = $_SESSION['users'][$userIndex]['EMAIL'];

    deleteUser($userEmail);
} else if ($isModifyButtonClicked) {
    $userIndex = $_POST['modify'];
    setUSer($userIndex);
} else if ($isValidationButtonClicked) {
    $userIndex = 0;
    while (isset($_SESSION['users'][$userIndex]["EMAIL"]) && isset($_SESSION['users'][$userIndex]["PRENOM"])) {
        setUSer($userIndex);
        $userIndex++;
    }
}

header("location:../../usersManager.php");
