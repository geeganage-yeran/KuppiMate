<?php
session_start();

include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/Notice.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notice = new Notice();
    $noticeFilterCatId = $_POST['noticeFilterCat'] ?? '';
    $createdDate = $_POST['dateFilter'] ?? '';
    $noticeFilterUniId= $_POST['noticeFilterUni'] ?? '';

    if (!empty($noticeFilterCatId)) {
        // Filter by category
        $filterByCategory = $notice->filterNotices(Dbconnector::getConnection(), 'filterByCategory', $noticeFilterCatId, $createdDate,$noticeFilterUniId);
        $_SESSION['filterByCategory'] = $filterByCategory; // Store in session
        $_SESSION['isSearched'] = 1; // Set the isSearched session variable
    } elseif (!empty($createdDate)) {
        // Filter by date
        $filterByDate = $notice->filterNotices(Dbconnector::getConnection(), 'filterByDate', $noticeFilterCatId, $createdDate,$noticeFilterUniId);
        $_SESSION['filterByDate'] = $filterByDate; // Store in session
        $_SESSION['isSearched'] = 2; // Set the isSearched session variable
    }elseif (!empty($noticeFilterUniId)) {
        // Filter by uni
        $filterByUni = $notice->filterNotices(Dbconnector::getConnection(), 'filterByUni', $noticeFilterCatId, $createdDate,$noticeFilterUniId);
        $_SESSION['filterByUni'] = $filterByUni; // Store in session
        $_SESSION['isSearched'] = 3; // Set the isSearched session variable
    } else {
        // No filters selected, clear session
        unset($_SESSION['filterByCategory']);
        unset($_SESSION['filterByDate']);
        unset($_SESSION['filterByUni']);
        unset($_SESSION['isSearched']);
    }

    header("Location:/KuppiMate/src/view/ug-dashboard.php");
    exit();
}