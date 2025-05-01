<?php
$jsonFile = 'reviews.json';
$uploadDir = 'media/reviews/';

// Kreiranje foldera ako ne postoji
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$reviews = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

// Brisanje recenzije
if (isset($_POST['delete'])) {
    $index = (int)$_POST['delete'];
    if (isset($reviews[$index])) {
        // Brišemo sliku sa servera
        if (!empty($reviews[$index]['image']) && file_exists($reviews[$index]['image'])) {
            unlink($reviews[$index]['image']);
        }
        // Brišemo iz niza
        array_splice($reviews, $index, 1);
        file_put_contents($jsonFile, json_encode($reviews, JSON_PRETTY_PRINT));
    }
    header('Location: admin-reviews.php');
    exit;
}

// Upload nove slike
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete'])) {
    $imagePath = '';

    if (!empty($_FILES['image']['name'])) {
        $target = $uploadDir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $imagePath = $target;
        }
    }

    if ($imagePath) {
        $reviews[] = [
            'image' => $imagePath,
            'created_at' => date('Y-m-d H:i:s')
        ];
        file_put_contents($jsonFile, json_encode($reviews, JSON_PRETTY_PRINT));
    }
    header('Location: admin-reviews.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Reviews - Global Guide</title>
    <link rel="stylesheet" href="styles/admin-reviews.css">
</head>
<body>

<h2>Add a Review Screenshot</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*" required><br><br>
    <button type="submit">Upload Screenshot</button>
</form>

<h3>Existing Reviews</h3>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
<?php foreach ($reviews as $index => $r): ?>
    <div style="width: 200px;">
        <img src="<?= htmlspecialchars($r['image']) ?>" style="width:100%; border-radius:8px;"><br>
        <form method="post" style="margin-top:10px;">
            <input type="hidden" name="delete" value="<?= $index ?>">
            <button type="submit" style="background:#dc3545; color:white; border:none; padding:6px 12px; border-radius:6px;">Delete</button>
        </form>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
