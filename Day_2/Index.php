<?php

class PHPCodeExamples {
    // 13: isset() & empty()
    public function issetEmptyExamples() {
        $var = "";
        if (isset($var)) {
            echo "Variable is set.<br>";
        }
        if (empty($var)) {
            echo "Variable is empty.<br>";
        }
    }

    // 14: Radio buttons
    public function radioButtonsExample() {
        echo '<form method="post" action="">';
        echo '<input type="radio" name="gender" value="male"> Male<br>';
        echo '<input type="radio" name="gender" value="female"> Female<br>';
        echo '<input type="submit" name="submit" value="Submit">';
        echo '</form>';
        if (isset($_POST['submit'])) {
            echo 'Selected Gender: ' . $_POST['gender'];
        }
    }

    // 15: Checkboxes
    public function checkboxesExample() {
        echo '<form method="post" action="">';
        echo '<input type="checkbox" name="vehicle[]" value="Bike"> I have a bike<br>';
        echo '<input type="checkbox" name="vehicle[]" value="Car"> I have a car<br>';
        echo '<input type="submit" name="submit" value="Submit">';
        echo '</form>';
        if (isset($_POST['submit'])) {
            if (!empty($_POST['vehicle'])) {
                foreach ($_POST['vehicle'] as $vehicle) {
                    echo 'Selected Vehicle: ' . $vehicle . '<br>';
                }
            }
        }
    }

    // 16: Functions
    public function basicFunction() {
        function greet($name) {
            return "Hello, " . $name . "!<br>";
        }
        echo greet("Traveler");
    }

    // 17: String functions
    public function stringFunctionsExample() {
        $str = "Hello, World!";
        echo strtoupper($str) . "<br>";
        echo strtolower($str) . "<br>";
        echo strlen($str) . "<br>";
        echo str_replace("World", "PHP", $str) . "<br>";
    }

    // 18: Sanitize/validate input
    public function sanitizeValidateInput() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Valid email: " . $email;
            } else {
                echo "Invalid email.";
            }
        }
        echo '<form method="post" action="">';
        echo 'Email: <input type="text" name="email"><br>';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    }

    // 19: include()
    public function includeExample() {
        include 'included_file.php'; // kind of imports 
        // Content of included_file.php is echoed here
    }

    // 20: $_COOKIE
    public function cookieExample() {
        setcookie("user", "John Doe", time() + (86400 * 30), "/"); // 86400 = 1 day
        if (isset($_COOKIE["user"])) {
            echo "User is: " . $_COOKIE["user"];
        } else {
            echo "Cookie is not set.";
        }
    }

    // 21: $_SESSION
    public function sessionExample() {
        session_start();
        $_SESSION["favcolor"] = "green";
        echo "Favorite color is " . $_SESSION["favcolor"];
    }

    // 22: $_SERVER
    public function serverExample() {
        echo "Server name: " . $_SERVER['SERVER_NAME'] . "<br>";
        echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
    }

    // 23: Password hashing
    public function passwordHashing() {
        $password = "secret";
        $hash = password_hash($password, PASSWORD_DEFAULT);
        echo "Password Hash: " . $hash . "<br>";
        if (password_verify($password, $hash)) {
            echo "Password is valid!";
        } else {
            echo "Invalid password.";
        }
    }

    // 24: PHP Connect to MySQL database
    public function connectToDatabase() {
        $servername = "localhost";
        $username = "root";
        $password = ""; // <-- Ensure this matches your MySQL root password
        $dbname = "myDB";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn; // Return the connection object for reuse
    }
    

    // 25: PHPMyAdmin create a table
    public function createTable() {
        $conn = $this->connectToDatabase();
    
        $sql = "CREATE TABLE IF NOT EXISTS MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    
        if ($conn->query($sql) === TRUE) {
            echo "Table MyGuests created successfully<br>";
        } else {
            echo "Error creating table MyGuests: " . $conn->error . "<br>";
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
    
        if ($conn->query($sql) === TRUE) {
            echo "Table Users created successfully<br>";
        } else {
            echo "Error creating table Users: " . $conn->error . "<br>";
        }
    
        $conn->close();
    }
    
    

    // 26: PHP insert into MySQL database
    public function insertIntoDatabase() {
        $conn = $this->connectToDatabase();
    
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
    
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    

    // 27: PHP query MySQL database
    public function queryDatabase() {
        $conn = $this->connectToDatabase();
    
        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    
        $conn->close();
    }
    

    // 28: PHP registration form project
    public function registrationForm() {
        echo '<form method="post" action="">';
        echo 'Username: <input type="text" name="username"><br>';
        echo 'Password: <input type="password" name="password"><br>';
        echo '<input type="submit" name="register" value="Register">';
        echo '</form>';
    
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
            $conn = $this->connectToDatabase();
    
            // Prepare and bind SQL statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
    
            if ($stmt->execute()) {
                echo "Registration successful";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            $stmt->close();
            $conn->close();
        }
    }
    // It seems it does actually add it to the Users database; Not exactly sure why it adds a new user in Guests, but that's unimportant currently.
    
}

// Instantiate the class
$phpExamples = new PHPCodeExamples();

// Call the methods to demonstrate the examples
//$phpExamples->issetEmptyExamples();
//$phpExamples->radioButtonsExample();
//$phpExamples->checkboxesExample();
//$phpExamples->basicFunction();
//$phpExamples->stringFunctionsExample();
//$phpExamples->sanitizeValidateInput();
//$phpExamples->includeExample(); 
//$phpExamples->cookieExample();
//$phpExamples->sessionExample();
//$phpExamples->serverExample();
//$phpExamples->passwordHashing();
$phpExamples->connectToDatabase();
$phpExamples->createTable();
$phpExamples->insertIntoDatabase();
$phpExamples->queryDatabase();
$phpExamples->registrationForm();

?>
