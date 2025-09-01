<?php
include 'db_connect.php';

// Query to get xx, yy, zz
$result = $conn->query("
    SELECT 
        (SELECT COUNT(DISTINCT owner_id) FROM dogs) AS owners,
        (SELECT COUNT(*) FROM dogs) AS total_dogs,
        (SELECT COUNT(*) FROM events) AS total_events
");
$data = $result->fetch_assoc();
$owners = $data['owners'];
$total_dogs = $data['total_dogs'];
$total_events = $data['total_events'];

// Query to get top 10 dogs
$topDogsQuery = "
    SELECT 
        d.name AS dog_name, 
        b.name AS breed,  -- Join with the 'breeds' table to get breed name
        AVG(e.score) AS avg_score, 
        o.name AS owner_name, 
        o.email
    FROM dogs d
    JOIN breeds b ON d.breed_id = b.id  -- Join with 'breeds' table using 'breed_id'
    JOIN entries e ON d.id = e.dog_id  -- Join 'entries' table using 'dog_id'
    JOIN owners o ON d.owner_id = o.id
    JOIN events ev ON e.competition_id = ev.id  -- Join 'events' table using 'competition_id'
    GROUP BY d.id
    HAVING COUNT(e.competition_id) > 1  -- Ensure the dog has entered more than one event
    ORDER BY avg_score DESC
    LIMIT 10
";

$topDogs = $conn->query($topDogsQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Poppleton Dog Show</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        h2 {
            color: #34495e;
            margin-top: 30px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Welcome to Poppleton Dog Show!</h1>
    <p>This year <?= $owners ?> owners entered <?= $total_dogs ?> dogs in <?= $total_events ?> events!</p>

    <h2>Top 10 Dogs</h2>
    <ul>
        <?php while ($row = $topDogs->fetch_assoc()): ?>
            <li>
                <?= htmlspecialchars($row['dog_name']) ?> (<?= htmlspecialchars($row['breed']) ?>) - 
                Avg Score: <?= number_format($row['avg_score'], 2) ?>
                <br>
                Owner: <a href="owner.php?id=<?= urlencode($row['owner_name']) ?>"><?= htmlspecialchars($row['owner_name']) ?></a> - 
                <span>Email address: </span><a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
