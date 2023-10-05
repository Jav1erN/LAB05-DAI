<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Gaseosas</title>
</head>
<body>
    <h1>Calculadora de Gaseosas</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precioActual = $_POST["precioActual"];
        $cantidadUnidades = $_POST["cantidadUnidades"];
        $porcentajeDescuentoPrecio = 5 / 100; 
        $nuevoPrecio = $precioActual - ($precioActual * $porcentajeDescuentoPrecio);
        $importeCompra = $nuevoPrecio * $cantidadUnidades;
        $porcentajeDescuento = 7 / 100; 
        $importeDescuento = $importeCompra * $porcentajeDescuento;
        $importeAPagar = $importeCompra - $importeDescuento;
        $obsequio = $cantidadUnidades * 2;
        echo "<h2>Resultados:</h2>";
        echo "Nuevo Precio de la Gaseosa: S/. " . number_format($nuevoPrecio, 2) . "<br>";
        echo "Importe de la Compra: S/. " . number_format($importeCompra, 2) . "<br>";
        echo "Importe del Descuento: S/. " . number_format($importeDescuento, 2) . "<br>";
        echo "Importe a Pagar: S/. " . number_format($importeAPagar, 2) . "<br>";
        echo "Obsequio (Caramelos): " . $obsequio . "<br>";
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="precioActual">Precio actual de la gaseosa (S/.):</label>
        <input type="number" name="precioActual" step="0.01" required><br>

        <label for="cantidadUnidades">Cantidad de unidades adquiridas:</label>
        <input type="number" name="cantidadUnidades" required><br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>