<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Escudo Deflector - USS Enterprise</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Orbitron', sans-serif;
            background: #000;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(0, 200, 255, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255, 100, 100, 0.1) 0%, transparent 20%);
            color: #00FFFF;
            min-height: 100vh;
            padding: 2rem;
            overflow-x: hidden;
        }

        .panel {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #FF6B6B;
            border-radius: 16px;
            padding: 2.5rem;
            background: 
                linear-gradient(145deg, rgba(0, 30, 60, 0.8), rgba(0, 10, 30, 0.9));
            box-shadow: 
                0 0 30px rgba(255, 107, 107, 0.5),
                inset 0 0 20px rgba(0, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #FF6B6B, #FFD93D, #00FFFF, #FF6B6B);
            background-size: 200% 100%;
            animation: scanLine 3s linear infinite;
        }

        .panel::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 255, 255, 0.1) 0%, transparent 70%);
            z-index: 0;
        }

        h1 {
            color: #FF6B6B;
            font-size: 2.2rem;
            letter-spacing: 3px;
            margin-bottom: 1.5rem;
            text-shadow: 
                0 0 10px rgba(255, 107, 107, 0.8),
                0 0 20px rgba(255, 107, 107, 0.5);
            position: relative;
        }

        h1::after {
            content: "NCC-1701-D";
            position: absolute;
            top: 100%;
            right: 0;
            font-size: 1rem;
            opacity: 0.7;
        }

        h2 {
            color: #FFD93D;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid rgba(0, 255, 255, 0.3);
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h2::before {
            content: "";
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #00FF00;
            box-shadow: 0 0 8px rgba(0, 255, 0, 0.8);
            animation: pulse 2s infinite;
        }

        pre {
            background: rgba(0, 10, 20, 0.9);
            border: 1px solid #00FFFF;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            font-family: 'Courier New', monospace;
            font-size: 1rem;
            line-height: 1.6;
            overflow-x: auto;
            box-shadow: inset 0 0 15px rgba(0, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        pre::-webkit-scrollbar {
            height: 8px;
        }

        pre::-webkit-scrollbar-thumb {
            background: #FF6B6B;
            border-radius: 4px;
        }

        pre::-webkit-scrollbar-track {
            background: rgba(0, 30, 60, 0.5);
        }

        p {
            color: #FFD93D;
            font-size: 1.1rem;
            letter-spacing: 2px;
            text-align: center;
            margin-top: 1.5rem;
            text-shadow: 0 0 8px rgba(255, 217, 61, 0.6);
            animation: float 4s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes scanLine {
            0% { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .panel {
                padding: 1.5rem;
            }
            h1 {
                font-size: 1.8rem;
            }
            h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="panel">
        <h1>USS Enterprise - Escudo Deflector</h1>
        <h2>Estado del Escudo</h2>
        <?php
        $ufw_status = shell_exec('sudo ufw status');
        if(empty($ufw_status)) {
            $ufw_status = "Estado: Inactivo\nLos escudos están apagados. Activar UFW para proteger el sistema.";
        }
        echo "<pre>$ufw_status</pre>";
        ?>
        <p>Escudos levantados. Solo permitido SSH, HTTP y HTTPS.</p>
    </div>
</body>
</html>
