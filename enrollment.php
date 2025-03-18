<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(197, 236, 252);
            padding: 20px;

        }
        .form-container {
            background-color: rgb(197, 236, 252);
            padding: 20px;
            border: 2px solid;
            max-width: 500px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
            display: grid;
            align-items: center;
        }
        .result-container {
            margin-top: 20px;
            background-color:rgb(197, 236, 252);
            padding: 20px;
            border: 2px solid;
            max-width: 500px;
            margin: 20px auto;
        }
        textarea {
            width: 100%;
            height: 100px;
            max-width: 500px;
        }
        .submit-btn {
            background-color: #ddd;
            padding: 5px;
            border: 1px solid;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Enrollment Form (by: ANZANO)</h1>
    <hr color = "white">
    
    <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label>Name :</label>
                <input type="text" name="name" required>
            </div>
            
            <div class="form-group">
                <label>Gender :</label>
                <div>
                    <input type="radio" name="gender" value="Female" required> Female
                    <input type="radio" name="gender" value="Male"> Male
                </div>
            </div>
            
            <div class="form-group">
                <label>Organization(s) :</label>
                <div>
                    <input type="checkbox" name="org[]" value="CCS"> CCS
                    <input type="checkbox" name="org[]" value="SSC"> SSC
                    <input type="checkbox" name="org[]" value="English"> English
                </div>
            </div>
            
            <div class="form-group">
                <label>Course :</label>
                <select name="course" required>
                    <option value="">--Select a Course--</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSIS">BSIS</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Comments :</label>
                <textarea name="comments"></textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Submit" name="submit" class="submit-btn">
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['submit'])) {
        //form data
        //If $_POST['name'] is empty then it outputs " "
        $name = $_POST['name'] ?: '';
        $gender = $_POST['gender'] ?: '';
        $course = $_POST['course'] ?: '';
        $comments = $_POST['comments'] ?: '';
        //f $_POST['org'] is set, assign its value to $organizations; otherwise, assign an empty array ([])
        $organizations = isset($_POST['org']) ? $_POST['org'] : [];
        
        //FEE
        $tuition_fee = 8000.00;
        $org_fee = count($organizations) * 100.00;
        $total = $tuition_fee + $org_fee;
        
        // Result
        echo "<div class='result-container'>";
        echo "<h3><u>Enrollment Details:</u></h3>";
        echo "<table>";
        echo "<tr><td>Name:</td><td>$name</td></tr>";
        echo "<tr><td>Gender:</td><td>$gender</td></tr>";
        echo "<tr><td>Course:</td><td>$course</td></tr>";
        echo "<tr><td>Organization:</td><td>" . implode(", ", $organizations) . "</td></tr>";
        echo "<tr><td>Comments:</td><td>$comments</td></tr>";
        echo "<tr><td>Tuition Fee:</td><td>" . number_format($tuition_fee, 2) . "</td></tr>";
        echo "<tr><td>Org Fee:</td><td>" . number_format($org_fee, 2) . "</td></tr>";
        echo "<tr><td>Total:</td><td>" . number_format($total, 2) . "</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>
</body>
</html>