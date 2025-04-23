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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>
<body>

<!-- contact -->
<section class="container flex" id="contact">
        <div class="container-title">
            <h2>Contact</h2>
            <img src="./assets/decoration-heading.png" alt="decoration">
        </div>
        <div class="contact-section flex">
            <div class="contact-left flex">
                <h2 class="text-effect">Let's Talk</h2>
                <p>Contact me</p>
                <div class="contact-details flex">
                    <div class="contact-detail flex">
                        <i class="fa-solid fa-envelope"></i>
                        <p>kevinvaladez@gmail.com</p>
                    </div>
                    <div class="contact-detail flex">
                        <i class="fa-solid fa-phone"></i>
                        <p>(832) 800-2131</p>
                    </div>
                    <div class="contact-detail flex">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Houston, Texas USA</p>
                    </div>
                </div>
            </div>
            <form action="https://formsubmit.co/hugobenaviides21@gmail.com" method="POST" class="contact-right flex">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <label for="message">Enter a message</label>
                <textarea name="message" id="message" placeholder="Leave a message"></textarea>
            
                <button type="submit" class="btn animation">Submit</button>
            </form>
        </div>
    </section>


<div class="review-form">
    <h2>Leave a Review</h2>
    <form action="submit_review.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>

        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>

        <button type="submit">Submit Review</button>
    </form>
</div>
</body>

<div class="content-box">
    <footer>
        <div class="footer-left">
            <img src="/assets/logo.png" alt="Next Tow & Recovery Logo" class="footer-logo">
            <p>Next Tow & Recovery LLC</p>
            <p>kevinvaladez@gmail.com</p>
            <p>+1 (832) 800 2131</p>
        </div>
        <div class="footer-right">
            <a href="https://next-tow-recovery.vercel.app/#home">Home</a>
            <a href="https://next-tow-recovery.vercel.app/#services">Services</a>
            <a href="https://next-tow-recovery.vercel.app/#contact">Contact</a>
        </div>
    </footer>

</div>
<div class="footer-bottom">
Next Tow & Recovery LLC. © 2025 <a href="link-to-privacy-policy.html">Privacy Policy</a>
</div>