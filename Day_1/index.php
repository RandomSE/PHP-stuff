<?php
//echo"Hello, World!";  // echo is basically the print / sysout of php The commenting system is similar to java and python. commenting outside of the <> shows the comment.
?>




<?php
/* // generating html with php
echo "<!DOCTYPE html>
<html>
<head>
    <title>PHP HTML Template</title>
</head>
<body>
    <h1>Welcome to my website</h1>
    <p>This is generated using PHP.</p>
</body>
</html>";
*/
?>

<?php
 /*
$integer = 10; // Integer
$string = "Hello, PHP"; // String
$float = 10.5; // Float, doesn't use f at the end unlike some languages.
$boolean = true; // Boolean
$array = array("apple", "banana", "cherry"); // Array

echo $string;
 */
?>

<?php
/*
$a = 10;
$b = 5;

echo $a + $b; // Addition
echo $a - $b; // Subtraction
echo $a * $b; // Multiplication
echo $a / $b; // Division
*/


?>
 

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Handling</title>
</head>
<body>

<?php
// can have HTML and php in the same file, in this case used for a basic form input and output.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    echo "Welcome, $name";
} else {
    // Display the form
    echo '<form method="post" action="">
        Name: <input type="text" name="name">
        <input type="submit">
    </form>';
}
?>

</body>
</html>


<?php
/*
echo abs(-5); // Absolute value
echo pow(2, 3); // Power
echo sqrt(16); // Square root
echo rand(1, 10); // Random number between 1 and 10
*/
?>
<!-- echo "<br>" is a line break. -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP Tutorial Examples</title> 
</head>
<body>

<?php
 /*
// if statements
// 
echo "<h2>If Statements</h2>";
$number = 10;

if ($number > 5) {
    echo "$number is greater than 5";
} else {
    echo "$number is not greater than 5";
}

echo "<br>";
*/

 /*
//  logical operators

echo "<h2>Logical Operators</h2>";
$a = true;
$b = false;

if ($a && $b) {
    echo "Both a and b are true";
} elseif ($a || $b) {
    echo "At least one of a or b is true";
} else {
    echo "Neither a nor b is true";
}

echo "<br>";

*/

 /*
// switches

echo "<h2>Switch Statements</h2>";
$day = "Tuesday";

switch ($day) {
    case "Monday":
        echo "Today is Monday";
        break;
    case "Tuesday":
        echo "Today is Tuesday";
        break;
    case "Wednesday":
        echo "Today is Wednesday";
        break;
    default:
        echo "Today is not Monday, Tuesday, or Wednesday";
}

echo "<br>";

*/

/*
// for loops

echo "<h2>For Loops</h2>";
for ($i = 1; $i <= 5; $i++) {
    echo "Iteration: $i<br>";
}

 */


 /*
//   while loops

echo "<h2>While Loops</h2>";
$i = 1;
while ($i <= 5) {
    echo "Iteration: $i<br>";
    $i++;
}

 */

 /*
// arrays

echo "<h2>Arrays</h2>";
$fruits = array("Apple", "Banana", "Cherry", "Orange", "Tomato");

foreach ($fruits as $fruit) {
    echo "Fruit: $fruit<br>";
}

*/

///*
// associative arrays
// */
echo "<h2>Associative Arrays</h2>";
$person = array(
    "Name" => "John",
    "Age" => 25,
    "City" => "New York",
    "Country" => "USA",
    "Occupation" => "Engineer"
);

foreach ($person as $key => $value) {
    echo "$key: $value<br>";
}
?>

</body>
</html>



