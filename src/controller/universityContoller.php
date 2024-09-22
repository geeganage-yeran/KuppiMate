<?php
include_once __DIR__ . '/../model/Dbconnector.php';
include_once __DIR__ . '/../model/University.php';

$university=new University();
$uniList=$university->getUniversities(Dbconnector::getConnection());