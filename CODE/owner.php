<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $ownerName = $conn->real_escape_string($_GET['id']);
    $ownerQuery = "
        SELECT name, email, phone 
        FROM owners 
        WHERE name = '$ownerName'
    ";
    $result = $conn->query($ownerQuery);

    if ($result->num_rows > 0) {
        $owner = $result->fetch_assoc();
    } else {
        die("Owner not found.");
    }
} else {
    die("No owner specified.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Owner Details</title>
</head>
<body>
    <h1>Owner Details</h1>
    <p><strong>Name:</strong> <?= htmlspecialchars($owner['name']) ?></p>
    <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($owner['email']) ?>"><?= htmlspecialchars($owner['email']) ?></a></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($owner['phone']) ?></p>
    <a href="index.php">Back to Main Page</a>
</body>
</html>
