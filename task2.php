<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task 2</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .section {
            margin-bottom: 40px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h2 {
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        </style>
    </head>

    <body>
        <?php include 'menu.inc'; ?>

        <h1>Task 2</h1>

        <!-- Part A: Form to input a positive integer and display numbers, sum, and average -->
        <div class="section">
            <h2>Part A: Number Sequence Calculator</h2>

            <?php
        // Initialize variables
        $n = $sum = $average = 0;
        $numbers = [];
        $showResult = false;
        
        // Process form data when submitted
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["calculate"])) {
            if (isset($_GET["number"]) && is_numeric($_GET["number"]) && $_GET["number"] > 0) {
                $n = (int)$_GET["number"];
                $showResult = true;
                
                // Generate numbers from 1 to n using a for loop
                $sum = 0;
                for ($i = 1; $i <= $n; $i++) {
                    $numbers[] = $i;
                    $sum += $i;
                }
                
                // Calculate average
                $average = $sum / $n;
            }
        }
        ?>

            <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="number">Enter a positive integer:</label>
                    <input type="number" id="number" name="number" min="1" value="<?php echo $n; ?>" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="calculate" value="Calculate">
                </div>
            </form>

            <?php if ($showResult): ?>
            <div class="result">
                <h3>Results for n = <?php echo $n; ?></h3>
                <p><strong>Numbers:</strong> <?php echo implode(", ", $numbers); ?> (<?php echo count($numbers); ?>
                    numbers)</p>
                <p><strong>Sum:</strong> <?php echo $sum; ?></p>
                <p><strong>Average:</strong> <?php echo $average; ?></p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Part B: Function to calculate final mark using ternary operator -->
        <div class="section">
            <h2>Part B: Final Mark Calculator</h2>

            <?php
        // Function to calculate final mark using ternary operator
        function calculateFinalMark($examMark, $yearMark) {
            // Using ternary operator to determine final mark
            $finalMark = ($examMark < 40) ? $examMark : (0.75 * $examMark + 0.25 * $yearMark);
            
            return round($finalMark, 2); // Round to 2 decimal places
        }
        
        // Test data
        $testData = [
            ['exam' => 35, 'year' => 50],
            ['exam' => 40, 'year' => 55],
            ['exam' => 55, 'year' => 60]
        ];
        ?>

            <p>In ICT2613, you need to obtain a minimum of 40% in the exam for the year mark to be included in the final
                mark.
                If you obtain less than 40% in the exam, your final mark (%) will be equal to the exam mark (%).
                If you obtain greater than or equal to 40% in the exam, your final mark will be 75% of the exam mark
                added to 25% of the year mark.</p>

            <table>
                <tr>
                    <th>Exam Mark (%)</th>
                    <th>Year Mark (%)</th>
                    <th>Final Mark (%)</th>
                    <th>Explanation</th>
                </tr>
                <?php foreach ($testData as $data): ?>
                <tr>
                    <td><?php echo $data['exam']; ?></td>
                    <td><?php echo $data['year']; ?></td>
                    <td><?php echo calculateFinalMark($data['exam'], $data['year']); ?></td>
                    <td>
                        <?php if ($data['exam'] < 40): ?>
                        Exam mark < 40%, so final mark=exam mark <?php else: ?> Exam mark ≥ 40%, so final mark=75% of
                            exam mark + 25% of year mark <?php endif; ?> </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- Part C: Form with SADC countries and switch statement to display capital city -->
        <div class="section">
            <h2>Part C: SADC Countries and Capitals</h2>

            <?php
        // Initialize variables
        $selectedCountry = "";
        $capital = "";
        
        // Process form data when submitted
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["check_capital"])) {
            if (isset($_GET["country"]) && !empty($_GET["country"])) {
                $selectedCountry = $_GET["country"];
                
                // Use switch statement to determine capital city
                switch ($selectedCountry) {
                    case "Angola":
                        $capital = "Luanda";
                        break;
                    case "Botswana":
                        $capital = "Gaborone";
                        break;
                    case "Comoros":
                        $capital = "Moroni";
                        break;
                    case "Democratic Republic of Congo":
                        $capital = "Kinshasa";
                        break;
                    case "Eswatini":
                        $capital = "Mbabane";
                        break;
                    case "Lesotho":
                        $capital = "Maseru";
                        break;
                    case "Madagascar":
                        $capital = "Antananarivo";
                        break;
                    case "Malawi":
                        $capital = "Lilongwe";
                        break;
                    case "Mauritius":
                        $capital = "Port Louis";
                        break;
                    case "Mozambique":
                        $capital = "Maputo";
                        break;
                    case "Namibia":
                        $capital = "Windhoek";
                        break;
                    case "Seychelles":
                        $capital = "Victoria";
                        break;
                    case "South Africa":
                        $capital = "Pretoria";
                        break;
                    case "Tanzania":
                        $capital = "Dodoma";
                        break;
                    case "Zambia":
                        $capital = "Lusaka";
                        break;
                    case "Zimbabwe":
                        $capital = "Harare";
                        break;
                    default:
                        $capital = "Unknown";
                }
            }
        }
        ?>

            <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="country">Select a SADC Country:</label>
                    <select id="country" name="country">
                        <option value="" <?php if ($selectedCountry == "") echo "selected"; ?>>-- Select a Country --
                        </option>
                        <option value="Angola" <?php if ($selectedCountry == "Angola") echo "selected"; ?>>Angola
                        </option>
                        <option value="Botswana" <?php if ($selectedCountry == "Botswana") echo "selected"; ?>>Botswana
                        </option>
                        <option value="Comoros" <?php if ($selectedCountry == "Comoros") echo "selected"; ?>>Comoros
                        </option>
                        <option value="Democratic Republic of Congo"
                            <?php if ($selectedCountry == "Democratic Republic of Congo") echo "selected"; ?>>Democratic
                            Republic of Congo</option>
                        <option value="Eswatini" <?php if ($selectedCountry == "Eswatini") echo "selected"; ?>>Eswatini
                        </option>
                        <option value="Lesotho" <?php if ($selectedCountry == "Lesotho") echo "selected"; ?>>Lesotho
                        </option>
                        <option value="Madagascar" <?php if ($selectedCountry == "Madagascar") echo "selected"; ?>>
                            Madagascar</option>
                        <option value="Malawi" <?php if ($selectedCountry == "Malawi") echo "selected"; ?>>Malawi
                        </option>
                        <option value="Mauritius" <?php if ($selectedCountry == "Mauritius") echo "selected"; ?>>
                            Mauritius</option>
                        <option value="Mozambique" <?php if ($selectedCountry == "Mozambique") echo "selected"; ?>>
                            Mozambique</option>
                        <option value="Namibia" <?php if ($selectedCountry == "Namibia") echo "selected"; ?>>Namibia
                        </option>
                        <option value="Seychelles" <?php if ($selectedCountry == "Seychelles") echo "selected"; ?>>
                            Seychelles</option>
                        <option value="South Africa" <?php if ($selectedCountry == "South Africa") echo "selected"; ?>>
                            South Africa</option>
                        <option value="Tanzania" <?php if ($selectedCountry == "Tanzania") echo "selected"; ?>>Tanzania
                        </option>
                        <option value="Zambia" <?php if ($selectedCountry == "Zambia") echo "selected"; ?>>Zambia
                        </option>
                        <option value="Zimbabwe" <?php if ($selectedCountry == "Zimbabwe") echo "selected"; ?>>Zimbabwe
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="check_capital" value="Check Capital City">
                </div>
            </form>

            <?php if (!empty($selectedCountry) && !empty($capital)): ?>
            <div class="result">
                <p>The capital city of <strong><?php echo htmlspecialchars($selectedCountry); ?></strong> is
                    <strong><?php echo htmlspecialchars($capital); ?></strong>.</p>
            </div>
            <?php endif; ?>
        </div>
        <iframe src="task2.txt" height="400" width="1200">
            Your browser does not support iframes. </iframe>
    </body>

</html>