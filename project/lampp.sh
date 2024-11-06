#!/usr/bin/bash

# Check if the correct number of arguments is provided
if [ "$#" -ne 2 ]; then
    echo "Usage: $0 {start|stop} {nginx|apache2}"
    exit 1
fi

# Start or stop the web server based on the first argument
sudo systemctl "$1" "$2"

# Start or stop MariaDB and MySQL services
sudo systemctl "$1" mariadb
sudo systemctl "$1" mysql

# Open the corresponding HTML file based on the web server type
if [ "$2" == "nginx" ]; then
    # Start or stop php-fpm
    sudo systemctl "$1" php8.2-fpm
    firefox localhost/indexN.html
elif [ "$2" == "apache2" ]; then
    firefox localhost/indexA.html
else
    echo "Error: Unknown web server type: $2"
    exit 1
fi

