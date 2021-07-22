<?php
class SSNBuilder {

    const SSN_MAX_NUM = 999999999;

    private $areaRange;
    private $groupRange;
    private $sequenceRange;

    private $areaNumber;
    private $groupNumber;
    private $sequenceNumber;

    public function __construct()
    {
        $this->areaRange = range(900, 999);
        array_push($this->areaRange, 0, 666);

        $this->groupRange = [0];
        $this->sequenceRange = [0];
        $this->areaNumber = 0;
        $this->groupNumber = 0;
        $this->sequenceNumber = 0;
    }

    /**
     * @return int
     */
    public function getAreaNumber()
    {
        return $this->areaNumber;
    }

    /**
     * @param int $areaNumber
     */
    public function setAreaNumber($areaNumber)
    {
        $this->areaNumber = $areaNumber;
    }

    /**
     * @return int
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @param int $groupNumber
     */
    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;
    }

    /**
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @param int $sequenceNumber
     */
    public function setSequenceNumber($sequenceNumber)
    {
        $this->sequenceNumber = $sequenceNumber;
    }

    /**
     * @return mixed
     */
    public function getAreaRange()
    {
        return $this->areaRange;
    }

    /**
     * @param mixed $areaRange
     */
    public function setAreaRange($areaRange)
    {
        $this->areaRange = $areaRange;
    }

    /**
     * @return int[]
     */
    public function getGroupRange()
    {
        return $this->groupRange;
    }

    /**
     * @param int[] $groupRange
     */
    public function setGroupRange($groupRange)
    {
        $this->groupRange = $groupRange;
    }

    /**
     * @return int[]
     */
    public function getSequenceRange()
    {
        return $this->sequenceRange;
    }

    /**
     * @param int[] $sequenceRange
     */
    public function setSequenceRange($sequenceRange)
    {
        $this->sequenceRange = $sequenceRange;
    }


    /**
     *
     */
    public function increment() {

        if ($this->sequenceNumber < 9999) {
            $this->sequenceNumber++;
        } else {
            $this->sequenceNumber = 0;

            if ($this->groupNumber < 99) {
                $this->groupNumber++;
            } else {
                $this->groupNumber = 0;

                if ($this->areaNumber < 999) {
                    $this->areaNumber++;
                } else {
                    $this->areaNumber = 0;
                }
            }
        }
    }

    /**
     * @return String
     */
    public function getSSN() {
        return
            str_pad($this->areaNumber, 3, '0', STR_PAD_LEFT) . "-" .
            str_pad($this->groupNumber, 2, "0", STR_PAD_LEFT) . "-" .
            str_pad($this->sequenceNumber, 4, "0", STR_PAD_LEFT);
    }

    /**
     * @return int
     */
    public function getSSNInt() {
        return intval(
            str_pad($this->areaNumber, 3, '0', STR_PAD_LEFT) .
            str_pad($this->groupNumber, 2, "0", STR_PAD_LEFT) .
            str_pad($this->sequenceNumber, 4, "0", STR_PAD_LEFT)
        );
    }
}
