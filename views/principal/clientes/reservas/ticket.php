<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .ticket {
            width: 100%;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .ticket-info {
            margin-bottom: 20px;
        }

        .ticket-info p {
            margin: 5px 0;
        }

        .ticket-footer {
            text-align: center;
        }

        img {
            width: 90px;
            position: absolute;
            top: 1px;
            left: 5px;
        }
    </style>
</head>

<body>

    <img src="<?php echo RUTA_PRINCIPAL . 'assets/img/logo.png'; ?>" alt="Logo" />

    <div class="ticket">
        <div class="ticket-header">
            <h5>Ticket de Reserva</h5>
        </div>

        <div class="ticket-info">
            <p><strong>Cliente:</strong> <?php echo $data['reserva']['cliente']; ?></p>
            <p><strong>Fecha/Hora:</strong> <?php echo $data['reserva']['fecha_reserva']; ?></p>
        </div>
        <hr>
        <div class="ticket-info">
            <p><strong>Código:</strong> <?php echo $data['reserva']['cod_reserva']; ?></p>
            <p><strong>Habitación:</strong> <?php echo $data['reserva']['estilo']; ?></p>
            <p><strong>Precio/Noche:</strong> <?php echo $data['reserva']['precio']; ?></p>
            <p><strong>N° Habitación:</strong> <?php echo $data['reserva']['numero']; ?></p>
            <p><strong>Capacidad:</strong> <?php echo $data['reserva']['capacidad']; ?></p>
            <p><strong>Fecha Ingreso:</strong> <?php echo $data['reserva']['fecha_ingreso']; ?></p>
            <p><strong>Fecha Salida:</strong> <?php echo $data['reserva']['fecha_salida']; ?></p>
            <p><strong>Cantidad:</strong> 2</p>
            <p><strong>Total:</strong> <?php echo $data['reserva']['monto']; ?></p>
        </div>
        <div class="ticket-footer">
            <p>¡Gracias por tu reserva!</p>
        </div>
    </div>

</body>

</html>