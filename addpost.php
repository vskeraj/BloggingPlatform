<?php

$errors = [];

// Sanitizimi dhe validimi i titullit
if (empty($_POST['title'])) {
    $errors['title'] = 'Title is required!';
} else {
    $title = trim($_POST['title']);
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must be letters and spaces only';
    }
}

// Verifikimi i përmbajtjes
if (empty($_POST['content'])) {
    $errors['content'] = 'Content is required!';
} else {
    $content = htmlspecialchars(trim($_POST['content']));
}

// Verifikimi i autorit
if (empty($_POST['author'])) {
    $errors['author'] = 'Author is required!';
} else {
    $author = htmlspecialchars(trim($_POST['author']));
}

// Verifikimi i imazhit
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);
    
    // Verifikimi i llojit të skedarit
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowedTypes)) {
        $errors['image'] = 'Only JPG, PNG, and GIF files are allowed.';
    } else {
        // Verifikimi i madhësisë së skedarit (p.sh., 5MB max)
        $maxSize = 5 * 1024 * 1024; // 5MB
        if ($image['size'] > $maxSize) {
            $errors['image'] = 'Image size must be less than 5MB.';
        } else {
            // Krijimi i rrugës për ruajtjen e imazhit
            move_uploaded_file($image['tmp_name'], $imagePath);
        }
    }
} else {
    $errors['image'] = 'Image is required!';
}

if (empty($errors)) {
    // Nëse nuk ka gabime, ruaj në databazë
    $db = new mysqli('localhost', 'root', '', 'blog');
    
    if ($db->connect_error) {
        die('Database connection failed: ' . $db->connect_error);
    }

    // Përdorimi i deklaratës të përgatitur për siguri
    $stmt = $db->prepare("INSERT INTO posts (title, content, author, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $title, $content, $author, $imagePath);

    if ($stmt->execute()) {
        // Postimi është shtuar me sukses
        header('Location: MyPosts.html');
        exit;
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $db->close();
} else {
    // Kthe gabimet si JSON për klientin
    echo json_encode($errors);
}
?>
