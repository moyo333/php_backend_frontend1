<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], select, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .radio-group {
            display: flex;
            gap: 15px;
        }
        .radio-option {
            display: flex;
            align-items: center;
        }
        .error {
            color: red;
            margin-top: 20px;
        }
        .success {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php include 'menu.inc'; ?>
    <h1>Customer Feedback Form</h1>
    
    <?php
    // Initialize variables
    $shopName = $customerName = $customerEmail = $rating = $justification = "";
    $error = "";
    $formSubmitted = false;
    
    // Process form data when submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
        $formSubmitted = true;
        
        // Get form data
        $shopName = isset($_GET["shop"]) ? $_GET["shop"] : "";
        $customerName = isset($_GET["name"]) ? $_GET["name"] : "";
        $customerEmail = isset($_GET["email"]) ? $_GET["email"] : "";
        $rating = isset($_GET["rating"]) ? $_GET["rating"] : "";
        $justification = isset($_GET["justification"]) ? $_GET["justification"] : "";
        
        // Validate form data (all fields except justification are required)
        if (empty($shopName)) {
            $error = "Please select a shop.";
        } elseif (empty($customerName)) {
            $error = "Please enter your name.";
        } elseif (empty($customerEmail)) {
            $error = "Please enter your email.";
        } elseif (empty($rating)) {
            $error = "Please select a rating.";
        }
    }
    ?>
    
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="shop">Select Shop:</label>
            <select id="shop" name="shop">
                <option value="" <?php if ($shopName == "") echo "selected"; ?>>-- Select a Shop --</option>
                <option value="Downtown Branch" <?php if ($shopName == "Downtown Branch") echo "selected"; ?>>Downtown Branch</option>
                <option value="Westside Mall" <?php if ($shopName == "Westside Mall") echo "selected"; ?>>Westside Mall</option>
                <option value="Eastside Plaza" <?php if ($shopName == "Eastside Plaza") echo "selected"; ?>>Eastside Plaza</option>
                <option value="North Station" <?php if ($shopName == "North Station") echo "selected"; ?>>North Station</option>
                <option value="South Harbor" <?php if ($shopName == "South Harbor") echo "selected"; ?>>South Harbor</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($customerName); ?>">
        </div>
        
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($customerEmail); ?>">
        </div>
        
        <div class="form-group">
            <label>Rating (1 = Poor, 5 = Excellent):</label>
            <div class="radio-group">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <div class="radio-option">
                        <input type="radio" id="rating<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" <?php if ($rating == $i) echo "checked"; ?>>
                        <label for="rating<?php echo $i; ?>"><?php echo $i; ?></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="justification">Justification (Optional):</label>
            <textarea id="justification" name="justification" rows="4"><?php echo htmlspecialchars($justification); ?></textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="Submit Feedback">
        </div>
    </form>
    
    <?php if ($formSubmitted && !empty($error)) { ?>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
    <?php } elseif ($formSubmitted && empty($error)) { ?>
        <div class="success">
            <h3>Thank you for your feedback!</h3>
            <p><strong>Shop:</strong> <?php echo htmlspecialchars($shopName); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($customerName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($customerEmail); ?></p>
            <p><strong>Rating:</strong> <?php echo htmlspecialchars($rating); ?> out of 5</p>
            <?php if (!empty($justification)) { ?>
                <p><strong>Justification:</strong> <?php echo htmlspecialchars($justification); ?></p>
            <?php } ?>
        </div>
    <?php } ?>
    <iframe src="task1.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>