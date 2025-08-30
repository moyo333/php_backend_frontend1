<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task 3</title>
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

        .example {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }

        .code {
            background-color: #f0f0f0;
            padding: 10px;
            border-left: 4px solid #4CAF50;
            font-family: monospace;
            white-space: pre-wrap;
            margin: 10px 0;
        }

        .result {
            background-color: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
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

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

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
        </style>
    </head>

    <body>
        <?php include 'menu.inc'; ?>

        <h1>Task 3</h1>

        <!-- Part A: String Functions Demonstration -->
        <div class="section">
            <h2>Part A: String Functions Demonstration</h2>

            <!-- strrev() function -->
            <div class="example">
                <h3>1. strrev() - String Reverse</h3>
                <p>The <code>strrev()</code> function reverses a string. This is useful for creating palindrome checkers
                    or generating reversed text for creative purposes.</p>

                <div class="code">
                    $original = "Hello, World!";
                    $reversed = strrev($original);
                    echo "Original: $original &lt;br&gt;";
                    echo "Reversed: $reversed";
                </div>

                <div class="result">
                    <?php
                $original = "Hello, World!";
                $reversed = strrev($original);
                echo "Original: $original <br>";
                echo "Reversed: $reversed";
                ?>
                </div>

                <p><strong>Practical Use:</strong> Checking if a word is a palindrome (reads the same forward and
                    backward).</p>

                <div class="code">
                    $word = "racecar";
                    $isPalindrome = ($word === strrev($word)) ? "Yes" : "No";
                    echo "Is '$word' a palindrome? $isPalindrome";
                </div>

                <div class="result">
                    <?php
                $word = "racecar";
                $isPalindrome = ($word === strrev($word)) ? "Yes" : "No";
                echo "Is '$word' a palindrome? $isPalindrome";
                ?>
                </div>
            </div>

            <!-- strtolower() function -->
            <div class="example">
                <h3>2. strtolower() - Convert String to Lowercase</h3>
                <p>The <code>strtolower()</code> function converts all alphabetic characters in a string to lowercase.
                    This is useful for case-insensitive comparisons.</p>

                <div class="code">
                    $mixedCase = "ThIs Is A MiXeD cAsE sTrInG";
                    $lowercase = strtolower($mixedCase);
                    echo "Original: $mixedCase &lt;br&gt;";
                    echo "Lowercase: $lowercase";
                </div>

                <div class="result">
                    <?php
                $mixedCase = "ThIs Is A MiXeD cAsE sTrInG";
                $lowercase = strtolower($mixedCase);
                echo "Original: $mixedCase <br>";
                echo "Lowercase: $lowercase";
                ?>
                </div>

                <p><strong>Practical Use:</strong> Case-insensitive username comparison for login systems.</p>

                <div class="code">
                    $storedUsername = "john.doe";
                    $inputUsername = "John.Doe";
                    $isMatch = (strtolower($storedUsername) === strtolower($inputUsername)) ? "Yes" : "No";
                    echo "Username match? $isMatch";
                </div>

                <div class="result">
                    <?php
                $storedUsername = "john.doe";
                $inputUsername = "John.Doe";
                $isMatch = (strtolower($storedUsername) === strtolower($inputUsername)) ? "Yes" : "No";
                echo "Username match? $isMatch";
                ?>
                </div>
            </div>

            <!-- strlen() function -->
            <div class="example">
                <h3>3. strlen() - String Length</h3>
                <p>The <code>strlen()</code> function returns the length of a string (number of characters). This is
                    useful for validating input length or truncating text.</p>

                <div class="code">
                    $text = "This is a sample text.";
                    $length = strlen($text);
                    echo "Text: $text &lt;br&gt;";
                    echo "Length: $length characters";
                </div>

                <div class="result">
                    <?php
                $text = "This is a sample text.";
                $length = strlen($text);
                echo "Text: $text <br>";
                echo "Length: $length characters";
                ?>
                </div>

                <p><strong>Practical Use:</strong> Password length validation.</p>

                <div class="code">
                    $password = "secureP@ss123";
                    $isValid = (strlen($password) >= 8) ? "Valid" : "Too short";
                    echo "Password: $password &lt;br&gt;";
                    echo "Validation: $isValid";
                </div>

                <div class="result">
                    <?php
                $password = "secureP@ss123";
                $isValid = (strlen($password) >= 8) ? "Valid" : "Too short";
                echo "Password: $password <br>";
                echo "Validation: $isValid";
                ?>
                </div>
            </div>

            <!-- explode() function -->
            <div class="example">
                <h3>4. explode() - Split String into Array</h3>
                <p>The <code>explode()</code> function splits a string into an array by a specified delimiter. This is
                    useful for parsing CSV data or breaking sentences into words.</p>

                <div class="code">
                    $csvData = "apple,banana,orange,grape";
                    $fruits = explode(",", $csvData);
                    echo "CSV Data: $csvData &lt;br&gt;";
                    echo "Array: ";
                    print_r($fruits);
                </div>

                <div class="result">
                    <?php
                $csvData = "apple,banana,orange,grape";
                $fruits = explode(",", $csvData);
                echo "CSV Data: $csvData <br>";
                echo "Array: ";
                echo "<pre>";
                print_r($fruits);
                echo "</pre>";
                ?>
                </div>

                <p><strong>Practical Use:</strong> Extracting components from a date string.</p>

                <div class="code">
                    $dateString = "2023-08-15";
                    $dateParts = explode("-", $dateString);
                    echo "Date string: $dateString &lt;br&gt;";
                    echo "Year: {$dateParts[0]}, Month: {$dateParts[1]}, Day: {$dateParts[2]}";
                </div>

                <div class="result">
                    <?php
                $dateString = "2023-08-15";
                $dateParts = explode("-", $dateString);
                echo "Date string: $dateString <br>";
                echo "Year: {$dateParts[0]}, Month: {$dateParts[1]}, Day: {$dateParts[2]}";
                ?>
                </div>
            </div>

            <!-- str_repeat() function -->
            <div class="example">
                <h3>5. str_repeat() - Repeat a String</h3>
                <p>The <code>str_repeat()</code> function repeats a string a specified number of times. This is useful
                    for creating patterns, separators, or padding.</p>

                <div class="code">
                    $star = "*";
                    $line = str_repeat($star, 20);
                    echo "Single character: $star &lt;br&gt;";
                    echo "Repeated 20 times: $line";
                </div>

                <div class="result">
                    <?php
                $star = "*";
                $line = str_repeat($star, 20);
                echo "Single character: $star <br>";
                echo "Repeated 20 times: $line";
                ?>
                </div>

                <p><strong>Practical Use:</strong> Creating a simple text-based progress bar.</p>

                <div class="code">
                    $progress = 7; // Out of 10
                    $progressBar = "[" . str_repeat("#", $progress) . str_repeat(" ", 10 - $progress) . "]";
                    echo "Progress: $progressBar $progress/10 complete";
                </div>

                <div class="result">
                    <?php
                $progress = 7; // Out of 10
                $progressBar = "[" . str_repeat("#", $progress) . str_repeat(" ", 10 - $progress) . "]";
                echo "Progress: $progressBar $progress/10 complete";
                ?>
                </div>
            </div>
        </div>

        <!-- Part B: DateTime Class Demonstration -->
        <div class="section">
            <h2>Part B: DateTime Class Demonstration</h2>

            <div class="example">
                <h3>Current Date Information</h3>

                <div class="code">
                    // Create DateTime object for current date
                    $currentDate = new DateTime();

                    // Format and display year
                    $year = $currentDate->format('Y');
                    echo "Current Year: $year &lt;br&gt;";

                    // Format and display month (name)
                    $month = $currentDate->format('F');
                    echo "Current Month: $month &lt;br&gt;";

                    // Format and display day of the week
                    $dayOfWeek = $currentDate->format('l');
                    echo "Day of the Week: $dayOfWeek &lt;br&gt;";

                    // Get week number of the year
                    $weekNumber = $currentDate->format('W');
                    echo "Week Number of the Year: $weekNumber &lt;br&gt;";

                    // Calculate days until next Christmas
                    $christmas = new DateTime('2025-12-25');
                    $interval = $currentDate->diff($christmas);
                    $daysUntilChristmas = $interval->days;
                    echo "Days until Christmas (Dec 25, 2025): $daysUntilChristmas days";
                </div>

                <div class="result">
                    <?php
                // Create DateTime object for current date
                $currentDate = new DateTime();
                
                // Format and display year
                $year = $currentDate->format('Y');
                echo "Current Year: $year <br>";
                
                // Format and display month (name)
                $month = $currentDate->format('F');
                echo "Current Month: $month <br>";
                
                // Format and display day of the week
                $dayOfWeek = $currentDate->format('l');
                echo "Day of the Week: $dayOfWeek <br>";
                
                // Get week number of the year
                $weekNumber = $currentDate->format('W');
                echo "Week Number of the Year: $weekNumber <br>";
                
                // Calculate days until next Christmas
                $christmas = new DateTime('2025-12-25');
                $interval = $currentDate->diff($christmas);
                $daysUntilChristmas = $interval->days;
                echo "Days until Christmas (Dec 25, 2025): $daysUntilChristmas days";
                ?>
                </div>
            </div>
        </div>

        <!-- Part C: SADC Countries Array Manipulation -->
        <div class="section">
            <h2>Part C: SADC Countries Array</h2>

            <div class="example">
                <h3>SADC Countries List</h3>

                <div class="code">
                    // Create and populate array with SADC countries
                    $sadcCountries = [
                    "Angola",
                    "Botswana",
                    "Comoros",
                    "Democratic Republic of Congo",
                    "Eswatini",
                    "Lesotho",
                    "Madagascar",
                    "Malawi",
                    "Mauritius",
                    "Mozambique",
                    "Namibia",
                    "Seychelles",
                    "South Africa",
                    "Tanzania",
                    "Zambia",
                    "Zimbabwe"
                    ];

                    // Display countries using foreach loop
                    echo "<strong>SADC Countries (Original Order):</strong><br>";
                    foreach ($sadcCountries as $country) {
                    echo "$country<br>";
                    }

                    // Sort array in descending order (Z to A)
                    rsort($sadcCountries);

                    // Display sorted countries
                    echo "<br><strong>SADC Countries (Sorted Z to A):</strong><br>";
                    foreach ($sadcCountries as $country) {
                    echo "$country<br>";
                    }
                </div>

                <div class="result">
                    <?php
                // Create and populate array with SADC countries
                $sadcCountries = [
                    "Angola",
                    "Botswana",
                    "Comoros",
                    "Democratic Republic of Congo",
                    "Eswatini",
                    "Lesotho",
                    "Madagascar",
                    "Malawi",
                    "Mauritius",
                    "Mozambique",
                    "Namibia",
                    "Seychelles",
                    "South Africa",
                    "Tanzania",
                    "Zambia",
                    "Zimbabwe"
                ];
                
                // Display countries using foreach loop
                echo "<strong>SADC Countries (Original Order):</strong><br>";
                foreach ($sadcCountries as $country) {
                    echo "$country<br>";
                }
                
                // Sort array in descending order (Z to A)
                rsort($sadcCountries);
                
                // Display sorted countries
                echo "<br><strong>SADC Countries (Sorted Z to A):</strong><br>";
                foreach ($sadcCountries as $country) {
                    echo "$country<br>";
                }
                ?>
                </div>
            </div>
        </div>

        <!-- Part D: SADC Countries and Capitals using Associative Array -->
        <div class="section">
            <h2>Part D: SADC Countries and Capitals (Associative Array)</h2>

            <?php
        // Initialize variables
        $selectedCountry = "";
        $capital = "";
        
        // Create associative array of SADC countries and their capitals
        $countriesAndCapitals = [
            "Angola" => "Luanda",
            "Botswana" => "Gaborone",
            "Comoros" => "Moroni",
            "Democratic Republic of Congo" => "Kinshasa",
            "Eswatini" => "Mbabane",
            "Lesotho" => "Maseru",
            "Madagascar" => "Antananarivo",
            "Malawi" => "Lilongwe",
            "Mauritius" => "Port Louis",
            "Mozambique" => "Maputo",
            "Namibia" => "Windhoek",
            "Seychelles" => "Victoria",
            "South Africa" => "Pretoria",
            "Tanzania" => "Dodoma",
            "Zambia" => "Lusaka",
            "Zimbabwe" => "Harare"
        ];
        
        // Process form data when submitted
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["check_capital"])) {
            if (isset($_GET["country"]) && !empty($_GET["country"])) {
                $selectedCountry = $_GET["country"];
                
                // Use associative array to get capital city
                if (array_key_exists($selectedCountry, $countriesAndCapitals)) {
                    $capital = $countriesAndCapitals[$selectedCountry];
                } else {
                    $capital = "Unknown";
                }
            }
        }
        ?>

            <div class="example">
                <h3>Find Capital City Using Associative Array</h3>

                <div class="code">
                    // Create associative array of SADC countries and capitals
                    $countriesAndCapitals = [
                    "Angola" => "Luanda",
                    "Botswana" => "Gaborone",
                    // ... other countries and capitals
                    ];

                    // Get capital for selected country
                    $selectedCountry = "South Africa";
                    $capital = $countriesAndCapitals[$selectedCountry];
                    echo "The capital of $selectedCountry is $capital";
                </div>

                <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="country">Select a SADC Country:</label>
                        <select id="country" name="country">
                            <option value="" <?php if ($selectedCountry == "") echo "selected"; ?>>-- Select a Country
                                --</option>
                            <?php foreach ($countriesAndCapitals as $country => $capital_city): ?>
                            <option value="<?php echo $country; ?>"
                                <?php if ($selectedCountry == $country) echo "selected"; ?>>
                                <?php echo $country; ?>
                            </option>
                            <?php endforeach; ?>
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
        </div>
        <iframe src="task3.txt" height="400" width="1200">
            Your browser does not support iframes. </iframe>
    </body>

</html>