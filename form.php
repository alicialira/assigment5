<?php
// This file is part of a project being versioned with Git.
// Changes and updates to this code will be managed through branches,
// allowing us to work on new features without affecting the main version of the project.
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Input Form</title>
</head>
<body>
    <h2>Enter Five Numbers</h2>
    <form action="form.php" method="GET">
        <label for="a">Number a:</label>
        <input type="number" name="a" id="a" required><br><br>
        
        <label for="b">Number b:</label>
        <input type="number" name="b" id="b" required><br><br>
        
        <label for="c">Number c:</label>
        <input type="number" name="c" id="c" required><br><br>
        
        <label for="d">Number d:</label>
        <input type="number" name="d" id="d" required><br><br>
        
        <label for="e">Number e:</label>
        <input type="number" name="e" id="e" required><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) && isset($_GET['d']) && isset($_GET['e'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];
        $d = $_GET['d'];
        $e = $_GET['e'];

        echo "<h3>Submitted Values:</h3>";
        echo "a = $a<br>";
        echo "b = $b<br>";
        echo "c = $c<br>";
        echo "d = $d<br>";
        echo "e = $e<br>";
    }
    ?>
</body>
</html>
