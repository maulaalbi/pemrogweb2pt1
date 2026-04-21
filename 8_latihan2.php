<html>

<head>
    <title>Contoh Penggunaan UDF</title>
</head>

<body>
    <! Menentukan Form Input>
        <form method="post">
            Masukkan Bilangan Pertama : <br>
            <input type="text" name="A" size=10> <br>
            Masukkan Bilangan Kedua : <br>
            <input type="text" name="B" size=10> <br>
            <input type="submit" name="hitung" value="hitung">
        </form>
        <!membandingkan 2 buah bilangan yang diinput>
            <?php
            if (isset($_POST['hitung'])) {
                $A = $_POST["A"];
                $B = $_POST["B"];

                echo "<br>";
                echo ("Bilangan Pertama : ");
                echo $A;
                echo "<br>";
                echo ("Bilangan Kedua : ");
                echo $B;
                echo "<br> <br>";
                echo "Hasil Penjumlahan 2 buah bilangan ";
                echo "<br>";
                $jumlahbil = jumlah($A, $B);
                printf("Penjumlahan antara :  %d  +  %d  =  %d", $A, $B, $jumlahbil);
                echo "<br><br>";
                echo "Hasil Pengurangan 2 buah bilangan ";
                echo "<br>";
                $kurangbil = kurang($A, $B);
                printf("Pengurangan antara :  %d  -  %d  =  %d ", $A, $B, $kurangbil);
                echo "<br><br>";
                echo "Hasil Perkalian 2 buah bilangan ";
                echo "<br>";
                $kalibil = kali($A, $B);
                printf("Perkalian antara :  %d  *  %d  =  %d ", $A, $B, $kalibil);
                echo "<br><br>";
                echo "Hasil Pembagian 2 buah bilangan ";
                echo "<br>";
                if ($B != 0) {
                    $bagibil = bagi($A, $B);
                    printf("Pembagian antara :  %d  / %d  =  %d ", $A, $B, $bagibil);
                } else {
                    echo "Pembagian tidak dapat dilakukan (pembagi adalah nol)";
                }
                echo "<br><br>";
            }
            ?>
</body>

</html>