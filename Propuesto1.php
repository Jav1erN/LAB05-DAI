<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Sueldos</title>
</head>
<body>
    <h1>Calculadora de Sueldo</h1>
    
    <?php
    
    $totalVendido = "";
    $numeroHijosEscolar = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $totalVendido = $_POST["totalVendido"];
        $numeroHijosEscolar = $_POST["numeroHijosEscolar"];
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="totalVendido">Importe total vendido del mes (S/.):</label>
        <input type="number" name="totalVendido" value="<?php echo $totalVendido; ?>" required><br>

        <label for="numeroHijosEscolar">Cantidad de hijos en edad escolar:</label>
        <input type="number" name="numeroHijosEscolar" value="<?php echo $numeroHijosEscolar; ?>" required><br>

        <input type="submit" value="Calcular">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sueldoBasico = 600;
        $porcentajeComision = 7.5 / 100;
        $porcentajeDescuento = 11 / 100;
        $bonificacionPorHijo = 50;
        $comision = $totalVendido * $porcentajeComision;
        $bonificacion = $numeroHijosEscolar * $bonificacionPorHijo;
        $sueldoBruto = $sueldoBasico + $comision + $bonificacion;
        $descuento = $sueldoBruto * $porcentajeDescuento;
        $sueldoNeto = $sueldoBruto - $descuento;

        echo "<h2>Resultados:</h2>";
        echo "Comisión: S/. " . number_format($comision, 2) . "<br>";
        echo "Bonificación: S/. " . number_format($bonificacion, 2) . "<br>";
        echo "Sueldo Bruto: S/. " . number_format($sueldoBruto, 2) . "<br>";
        echo "Descuento: S/. " . number_format($descuento, 2) . "<br>";
        echo "Sueldo Neto: S/. " . number_format($sueldoNeto, 2) . "<br>";
    }
    ?>
</body>
</html>