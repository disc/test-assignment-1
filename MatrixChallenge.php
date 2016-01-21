<?php

class MatrixChallenge
{

    protected $matrix;
    protected $columnNumber;

    protected $sumByColumn = 0;

    /**
     * @param array $matrix
     * @param int $columnNumber
     * @throws MatrixCalculateException
     */
    public function __construct(array $matrix, $columnNumber = 0)
    {
        if (!is_array($matrix) || count($matrix) === 0) {
            throw new MatrixCalculateException('Wrong a matrix');
        }
        $this->matrix = $matrix;
        if (is_int($columnNumber) && $columnNumber >= 0) {
            $this->columnNumber = (int)$columnNumber;
        } else {
            throw new MatrixCalculateException('Wrong column number');
        }

        $this->sumByColumn = $this->calculateSumByColumn();
    }

    /**
     * @return mixed
     */
    public function getMatrix()
    {
        return $this->matrix;
    }

    /**
     * @return mixed
     */
    public function getColumnNumber()
    {
        return $this->columnNumber;
    }

    /**
     * @return int
     */
    public function getSumByColumn()
    {
        return $this->sumByColumn;
    }

    /**
     * @return number
     */
    protected function calculateSumByColumn()
    {
        return array_sum(array_column($this->getMatrix(), $this->getColumnNumber()));
    }

    /**
     * @param $value
     */
    public function pushValueToMatrix($value)
    {
        $rowsCount = count($this->getMatrix());
        $this->matrix[$rowsCount + 1] = array($value);
    }

    /**
     * check result value after push
     * @return int
     */
    public function getLastRowFirstColumnValue()
    {
        $matrix = $this->getMatrix();
        $rowsCount = count($matrix);

        return array_key_exists($rowsCount, $matrix) ? $matrix[$rowsCount][0] : 0;
    }
}

class MatrixCalculateException extends Exception
{

}