# Prime-SSN-Gen

This is a simple prime number generator with a twist: Must be in Social Security Number format.  The criteria is listed below.

    1. Social Security Numbers are in the format of ###-##-####

    2. The first 3-digit piece of the SSN is a prime number

    3. The second 2-digit piece of the SSN is a prime number

    4. The third 4-digit piece of the SSN is a prime number

    5. The entire 9-digit number is a prime number

**NOTE: I included an additional criteria to further correct social security standards for the results.  There will be two files generated along with default stdout of the criteria above (you can view the files locally; if you are using docker, you will need fetch the files from within the container).**

    Any number beginning with "000", "666", "900-999", has a middle "00", or ends in "0000" will never be a valid SSN.

## Installation

```bash
sudo apt install docker.io

OR

sudo apt install php
```

**Build**

```bash
docker build -t prime-ssn-gen .
```

**Run Application with docker**
```bash
docker run -it --rm --name psg prime-ssn-gen
```


**Execute just the php script**
```bash
cd /src
php primeSSNGen.php
```

**Copy Files from Container**
```bash
docker cp [container id]:/usr/src/[file name] [host location for file dump]
```

**Resources**

* https://hub.docker.com/_/php

* https://www.geeksforgeeks.org/php-check-number-prime/
  
* https://www.lavasurfer.com/info/socialsecurity.html