#!/bin/bash
clear
echo "=== Menú de gestión de Starfleet ==="
echo "1) Servicios"
echo "2) Telemetría del sistema"
echo "3) Escaneo Docker"
echo "4) Explorador de archivos"
read -p "Selección: " choice

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
    sudo find / -name "*starfleet*" 2>/dev/null
    ;;
  *)
    echo "selección no válida"
    ;;
esac
