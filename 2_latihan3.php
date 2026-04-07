<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana - Latihan 3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-color: #1f2937;
            --label-color: #ef4444; /* Red as shown in the image */
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: var(--text-color);
        }

        .container {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 2rem;
            color: #111827;
        }

        .calculator-form {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-weight: 700;
            color: var(--label-color);
            font-size: 1rem;
        }

        input[type="number"], select {
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            transition: all 0.2s;
            width: 120px;
        }

        input[type="number"]:focus, select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        select {
            width: 70px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%234b5563'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='Link9 5l7 7-7 7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 12px;
            padding-right: 28px;
            text-align: center;
            font-weight: bold;
        }

        button[type="submit"] {
            background-color: #fafafa;
            border: 1px solid #d1d5db;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            color: #374151;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        button[type="submit"]:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
        }

        .result-container {
            margin-top: 2rem;
            padding: 1.5rem;
            border-radius: 12px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            animation: fadeIn 0.4s ease-out;
        }

        .result-label {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
            display: block;
        }

        .result-value {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        footer {
            margin-top: 2rem;
            font-size: 0.8rem;
            color: #6b7280;
            text-align: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Buatlah tampilan dibawah ini</h1>

        <form action="" method="POST" class="calculator-form">
            <div class="input-group">
                <label for="nilai1">Nilai I</label>
                <input type="number" name="nilai1" id="nilai1" step="any" required value="<?php echo isset($_POST['nilai1']) ? $_POST['nilai1'] : ''; ?>">
            </div>

            <div class="input-group">
                <label>&nbsp;</label>
                <select name="operator" id="operator">
                    <option value="+" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '+') ? 'selected' : ''; ?>>+</option>
                    <option value="-" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '-') ? 'selected' : ''; ?>>-</option>
                    <option value="*" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '*') ? 'selected' : ''; ?>>*</option>
                    <option value="/" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '/') ? 'selected' : ''; ?>>/</option>
                </select>
            </div>

            <div class="input-group">
                <label for="nilai2">Nilai II</label>
                <input type="number" name="nilai2" id="nilai2" step="any" required value="<?php echo isset($_POST['nilai2']) ? $_POST['nilai2'] : ''; ?>">
            </div>

            <button type="submit" name="hitung">submit</button>
        </form>

        <?php
        if (isset($_POST['hitung'])) {
            $nilai1 = $_POST['nilai1'];
            $nilai2 = $_POST['nilai2'];
            $operator = $_POST['operator'];
            $hasil = 0;
            $error = "";

            switch ($operator) {
                case '+':
                    $hasil = $nilai1 + $nilai2;
                    break;
                case '-':
                    $hasil = $nilai1 - $nilai2;
                    break;
                case '*':
                    $hasil = $nilai1 * $nilai2;
                    break;
                case '/':
                    if ($nilai2 != 0) {
                        $hasil = $nilai1 / $nilai2;
                    } else {
                        $error = "Kesalahan: Pembagian dengan nol!";
                    }
                    break;
            }

            echo '<div class="result-container">';
            if ($error) {
                echo '<span class="result-label" style="color: #ef4444;">' . $error . '</span>';
            } else {
                echo '<span class="result-label">Hasil Perhitungan:</span>';
                echo '<div class="result-value">' . $nilai1 . ' ' . $operator . ' ' . $nilai2 . ' = ' . $hasil . '</div>';
            }
            echo '</div>';
        }
        ?>

        <footer>
            Program Studi Teknik Informatika, Universitas Pamulang
        </footer>
    </div>

</body>
</html>
