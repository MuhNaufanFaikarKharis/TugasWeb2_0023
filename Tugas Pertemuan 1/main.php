<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Calculator</title>
   <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    color: #555;
}

input, select, button {
    margin-top: 5px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    margin-top: 20px;
}

button:hover {
    background-color: #45a049;
}

.result {
    margin-top: 20px;
    padding: 15px;
    background-color: #e7f4e4;
    border-left: 5px solid #4CAF50;
}

.result p {
    margin: 5px 0;
    color: #333;
}

   </style>
</head>
<body>
    <div class="container">
        <h2>Shopping Discount Calculator</h2>
        <form method="POST">
            <label for="membership">Are you a member?</label>
            <select name="membership" id="membership">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            
            <label for="amount">Total Shopping Amount (IDR):</label>
            <input type="number" name="amount" id="amount" required>
            
            <button type="submit">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $membership = $_POST['membership'];
            $amount = $_POST['amount'];
            $discount = 0;

            if ($membership == "yes") {
                if ($amount > 1000000) {
                    $discount = 15; 
                } elseif ($amount >= 500000) {
                    $discount = 10; 
                } else {
                    $discount = 10; 
                }
            } else {
                if ($amount >= 1000000) {
                    $discount = 10; 
                } elseif ($amount >= 500000) {
                    $discount = 5; 
                }
            }

            $discountAmount = ($discount / 100) * $amount;
            $totalAmount = $amount - $discountAmount;

            echo "<div class='result'>";
            echo "<p>Original Amount: IDR " . number_format($amount, 0, ',', '.') . "</p>";
            echo "<p>Discount: $discount%</p>";
            echo "<p>Amount to Pay: IDR " . number_format($totalAmount, 0, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
