<link rel="stylesheet" href="styles/admin-tours.css">
<?php
$jsonFile = 'tours.json';
$uploadDir = 'media/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

    // Handle deletion
    if (isset($_POST['delete'])) {
        $index = (int)$_POST['delete'];
        if (isset($data[$index])) {
            if (!empty($data[$index]['image']) && file_exists($data[$index]['image'])) {
                unlink($data[$index]['image']);
            }
            array_splice($data, $index, 1);
            file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
        }
        header('Location: admin-tours.php');
        exit;
    }

    // Handle upload
    $imagePath = '';
    if (!empty($_FILES['image']['name'])) {
        $target = $uploadDir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $imagePath = $target;
        }
    }

    // Add new tour
    $tour = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'category' => $_POST['category'],
        'price' => $_POST['price'],
        'discount' => $_POST['discount'],
        'image' => $imagePath,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $data[] = $tour;
    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
    header('Location: admin-tours.php');
    exit;
}

$tours = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];
?>

<link rel="stylesheet" href="admin-tours.css">

<h2>Add Tour</h2>
<form method="post" enctype="multipart/form-data">
    <input name="title" placeholder="Title" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <select name="category">
        <option value="land">Land</option>
        <option value="sea">Sea</option>
    </select><br>
    <input type="number" step="0.01" name="price" placeholder="Price"><br>
    <input type="number" step="1" name="discount" placeholder="Discount %"><br>
    <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Save</button>
</form>

<hr>
<h3>Existing Tours</h3>
<ul>
<?php foreach ($tours as $index => $t): ?>
    <li>
        <strong><?= htmlspecialchars($t['title']) ?></strong> (<?= $t['category'] ?>) - $<?= $t['price'] ?>
        <?php if (!empty($t['discount'])): ?>
            <span style="color:green;">(-<?= $t['discount'] ?>%)</span>
        <?php endif; ?>
        <form method="post" style="display:inline;">
            <input type="hidden" name="delete" value="<?= $index ?>">
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>
