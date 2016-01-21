<?php

require_once 'MatrixChallenge.php';

class MatrixChallengeTest extends PHPUnit_Framework_TestCase
{
    protected static $testMatrix = array(
        array(1,2,3),
        array(7,99,10),
        array(1,2,3,4),
    );

    /**
     * @expectedException MatrixCalculateException
     * @expectedExceptionMessage Wrong a matrix
     */
    public function testConstructThrowException1()
    {
        // empty matrix
        $matrixCalculate = new MatrixChallenge(array());
    }
    /**
     * @expectedException MatrixCalculateException
     * @expectedExceptionMessage Wrong column number
     */
    public function testConstructThrowException2()
    {
        // bad column number
        $matrixCalculate = new MatrixChallenge(self::$testMatrix, 'asd');
    }

    /**
     * @dataProvider getSumByColumnDataProvider
     */
    public function testGetSumByColumn($matrix, $columnNumber, $expected) {
        $matrixCalculate = new MatrixChallenge($matrix, $columnNumber);
        $this->assertEquals($expected,$matrixCalculate->getSumByColumn());
    }

    public function testPushValueToMatrix()
    {
        $matrixCalculate = new MatrixChallenge(self::$testMatrix, 1);
        $matrixColumnSum = $matrixCalculate->getSumByColumn();
        $matrixCalculate->pushValueToMatrix($matrixColumnSum);

        $this->assertEquals($matrixColumnSum, $matrixCalculate->getLastRowFirstColumnValue());
    }

    public function getSumByColumnDataProvider() {
        return array(
            array(
                self::$testMatrix, 0, 9
            ),
            array(
                self::$testMatrix, 1, 103
            ),
            array(
                self::$testMatrix, 2, 16
            ),
            array(
                self::$testMatrix, 99, 0
            )
        );
    }
}