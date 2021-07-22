<?php
class PrimeCheck {
    public function isPrime($number) {
        if ($number == 1)
            return 0;

        for ($i = 2; $i <= sqrt($number); $i++){
            if ($number % $i == 0)
                return 0;
        }

        return 1;
    }
}
