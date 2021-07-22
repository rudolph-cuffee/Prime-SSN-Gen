<?php
    foreach (glob("./Utils/*.php") as $filename) {
        require_once $filename;
    }

    $allPrimeFile = fopen("allPrimeFile.txt", "w") or die("Unable to open file!");
    $realPrimeFile = fopen("realPrimeFile.txt", "w") or die("Unable to open file!");

    $ssnBuilder = new SSNBuilder();
    $primeCheck = new PrimeCheck();

    $ssn = 0;
    while ($ssn < SSNBuilder::SSN_MAX_NUM) {
        $ssnBuilder->increment();

        if (
            $primeCheck->isPrime($ssnBuilder->getAreaNumber()) &&
            $primeCheck->isPrime($ssnBuilder->getGroupNumber()) &&
            $primeCheck->isPrime($ssnBuilder->getSequenceNumber()) &&
            $primeCheck->isPrime($ssnBuilder->getSSNInt())
        ) {
            echo $ssnBuilder->getSSN() . "\n";
            fwrite($allPrimeFile, $ssnBuilder->getSSN() . "\n");

            if (
                !in_array($ssnBuilder->getAreaNumber(), $ssnBuilder->getAreaRange()) &&
                !in_array($ssnBuilder->getGroupNumber(), $ssnBuilder->getGroupRange()) &&
                !in_array($ssnBuilder->getSequenceNumber(), $ssnBuilder->getSequenceRange())
            ) {
                fwrite($realPrimeFile, $ssnBuilder->getSSN() . "\n");
            }
        }

        $ssn++;
    }

    fclose($allPrimeFile);
    fclose($realPrimeFile);
