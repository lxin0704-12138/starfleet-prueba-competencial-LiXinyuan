<!DOCTYPE html>
   <html lang="es">
   <head>
       <meta charset="UTF-8">
       <title>Estado del Escudo Deflector</title>
       <style>
           body { background-color: black; color: #00FFFF; font-family: Arial, sans-serif; }
           .panel { border: 2px solid #FF9999; padding: 20px; margin: 20px auto; max-width: 600px; }
           h1, h2 { color: #FF9999; }
       </style>
   </head>
   <body>
       <div class="panel">
           <h1>USS Enterprise NCC-1701-D - Escudo Deflector</h1>
           <h2>Estado del Escudo</h2>
           <?php
           $ufw_status = shell_exec('sudo ufw status');
           echo "<pre>$ufw_status</pre>";
           ?>
           <p>Escudos levantados. Solo permitido SSH, HTTP y HTTPS.</p>
       </div>
   </body>
   </html>
