<?php
// Përfshi klasën User që është përgjegjëse për marrjen e të dhënave nga DB
require_once 'user.php';

// Krijo instancën e klasës User
$user = new User();

// Merr përdoruesit nga DB
$users = $user->getUsers();

// Kontrollo nëse ka të dhëna dhe kthe si JSON
if (!empty($users)) {
    echo json_encode($users);  // Kthe përdoruesit si JSON
} else {
    echo json_encode([]);  // Nëse nuk ka përdorues, kthe një array bosh
}
?>
