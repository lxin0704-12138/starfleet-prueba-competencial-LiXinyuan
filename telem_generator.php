<?php
   $telemetry = [
       'apache_status' => shell_exec('systemctl is-active apache2'),
       'mysql_status' => shell_exec('systemctl is-active mariadb'),
       'php_version' => phpversion(),
       'docker_version' => shell_exec('docker --version 2>/dev/null') ?: 'Docker no instalado',
       'kernel_version' => shell_exec('uname -r'),
       'uptime' => shell_exec('uptime -p')
   ];

   header('Content-Type: application/json');
   echo json_encode($telemetry, JSON_PRETTY_PRINT);
   ?>
