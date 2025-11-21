<?php
function getCommandOutput($command) {
    $output = shell_exec("sudo {$command} 2>/dev/null");
    return trim($output) ?: 'DESCONOCIDO';
}

$telemetry = [
    'apache' => [
        'active' => getCommandOutput('systemctl is-active apache2'),
        'enabled' => getCommandOutput('systemctl is-enabled apache2'),
        'full_status' => nl2br(getCommandOutput('systemctl status apache2 | head -n 3'))
    ],
    'mysql' => [
        'active' => getCommandOutput('systemctl is-active mysql'),
        'enabled' => getCommandOutput('systemctl is-enabled mysql'),
        'full_status' => nl2br(getCommandOutput('systemctl status mysql | head -n 3'))
    ],
    'ufw' => [
        'active' => getCommandOutput('systemctl is-active ufw'),
        'enabled' => getCommandOutput('systemctl is-enabled ufw'),
        'full_status' => nl2br(getCommandOutput('systemctl status ufw | head -n 3'))
    ],
    'system' => [
        'kernel_version' => getCommandOutput('uname -r'),
        'uptime' => getCommandOutput('uptime -p'),
        'memory_usage' => nl2br(getCommandOutput('free -h | grep Mem')),
        'docker_containers' => nl2br(getCommandOutput('docker ps -a')),
        'php_version' => phpversion(),
        'docker_version' => getCommandOutput('docker --version') ?: 'Docker no instalado'
    ]
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($telemetry, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
