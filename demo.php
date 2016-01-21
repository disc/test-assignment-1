<?php

require_once 'MatrixChallenge.php';

$matrix = array(
    array(1,2,3),
    array(7,8,10),
    array(1,2,3,4),
);

$columnNumber = 1;

$matrixChallenge = new MatrixChallenge($matrix, $columnNumber);
$columnSum = $matrixChallenge->getSumByColumn();
$matrixChallenge->pushValueToMatrix($columnSum);

if ($matrixChallenge->getLastRowFirstColumnValue() === $columnSum) {
    // success
    echo 'Success';
} else {
    echo 'Failed :(';
}