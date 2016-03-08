# Version
[![Coverage Status](https://coveralls.io/repos/github/Safery/FlyMo/badge.svg?branch=master)](https://coveralls.io/github/Safery/FlyMo?branch=master)

# FlyMo
FlyMo is a PHP website that finds the cheapest flight ticket on given locations.

### Requirements
1. PHP 5.6
    - Windows
        - TODO:
    - Ubuntu
        1. `sudo apt-get update && sudo apt-get install python-software-properties`
        2. `sudo add-apt-repository ppa:ondrej/php5-5.6 && sudo apt-get update && sudo apt-get install php5`
        3. To confirm: `php5 -v`
    - Mac OS X
        1. `curl -s http://php-osx.liip.ch/install.sh | bash -s 5.6`
        2. Write into your ~/.profile file the following `export PATH=/usr/local/php5/bin:$PATH`
2. MYSQL Server
3. Google Flight API
