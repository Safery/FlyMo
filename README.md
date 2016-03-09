# Version
[![Coverage Status](https://img.shields.io/badge/Version-0.345-yellow.svg)](#)
[![Coverage Status](https://img.shields.io/badge/Project%20Complete-31%25-yellow.svg)](#)
[![Coverage Status](https://img.shields.io/travis/rust-lang/rust.svg)](#)
[![Coverage Status](https://img.shields.io/pypi/status/Django.svg)](#)
[![Coverage Status](https://img.shields.io/badge/Latest%20Commit-False-red.svg)](#)
[![Coverage Status](https://img.shields.io/badge/PHP-5.6-blue.svg)](#)


# FlyMo
FlyMo main purpose is to create a fully functioning Web Application using various of API to compare flight tickets based on certain conditions and reveal to the users along with bunch of other useful information. Phase II of the project is to develop a functioning Android Application that is fully working modelof the web application along with various of other features such as push notifications and reminders. This project will be fully autonomous once finished. Feel free to use this Git for your personal use or business use.

**Phase I - Web Application:** ETD is awebsite that has only 2 page. One is the index page which holds all the information displayed in a minimal format for users display. Users will have 6inputoption and finite conditions.

* **Input:**
    *  **From Airport**
        *  From which airport the plane will take off. Input is in Airport code (If User puts location, it brings Error but shows all Airport code in that city”.
    *  **To Airport**
        *  To which airport the plane will land. Input is in Airport code (If User puts location, it brings Error but shows all Airport code in that city”
    *  **Departing Time**
        *  Date format only (YYYY-MM-DD)
    *  **Returning Time (IFF round-trip is selected)**
        *  Date format only (YYYY-MM-DD)
    *  **Travel days” (IFF auto suggest is selecte)**
        *  Takes integer as input, and this input will be used to automatically suggest users flight based on cheap tickets in FUTURE or PREVIOUS month of user choosing.

When Algorithm gets all the Inputs, It will use those information to get pricing informationfrom 2-3 API (Google Flight API, TBD, TBD). Compare the pricing and take the cheapest deal and save it temporarily. If user defined “Travel Days”, Algorithm will also look for same flight (7, 16, 27, 38) days ahead of its given time. If one of those result revealed price less than the current saved price, it will give option to the user saying that it found a cheaper deal than its given input.Algorithm will reveal all information from cheapest to highest (5 dropdown box with Ticket and flight information). When user clicks on dropdown box, it generates several of other useless information like Plane specification, Plane path on a map, temperature on destination etc).Users will only be redirected to their ticket source WHEN they click on the title of plane(eg: Toront to Mumbai –Air Canada 786)


### Requirements
1. PHP 5.6
    - Windows
        - Use WAMP.
    - Ubuntu
        1. `sudo apt-get update && sudo apt-get install python-software-properties`
        2. `sudo add-apt-repository ppa:ondrej/php5-5.6 && sudo apt-get update && sudo apt-get install php5`
        3. To confirm: `php5 -v`
    - Mac OS X
        1. `curl -s http://php-osx.liip.ch/install.sh | bash -s 5.6`
        2. Write into your ~/.profile file the following `export PATH=/usr/local/php5/bin:$PATH`
2. MYSQL Server
3. Google Flight API
