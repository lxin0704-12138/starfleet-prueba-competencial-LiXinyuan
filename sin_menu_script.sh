#!/bin/bash

if [ $# -ne 1 ]; then
  echo "Uso: $0 <1-4>"
  exit 1
fi

choice=$1
case $choice in
  1)
    echo "=== Servicios ==="
    systemctl status apache2
    systemctl status mysql
    systemctl status ufw
    ;;
  2)
    echo "=== Telemetría del sistema ==="
    uname -r
    uptime -p
    free -h
    ;;
  3)
    echo "=== Escaneo Docker ==="
    sudo docker ps -a
    ;;
  4)
    echo "=== Explorador de archivos ==="
    sudo find / -name "*starfleet*"
    ;;
  *)
    echo "selección no válida"
    ;;
esac
