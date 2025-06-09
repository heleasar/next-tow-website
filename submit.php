<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $rating = (int)$_POST['rating'];
    $review = htmlspecialchars($_POST['review']);

    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO reviews (name, email, rating, review)
    VALUES ('$name', '$email', '$rating', '$review')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, rating, review FROM reviews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='review-display'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Rating: " . $row["rating"] . "</p>";
        echo "<p>" . $row["review"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No reviews yet!";
}
$conn->close();
?>
<?php
// Handling the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process your form data here
}

// Database retrieval for displaying existing reviews
?>