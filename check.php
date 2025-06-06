<?php
// Simpele gebruikersdatabase
$users = [
    "Semkroon" => [
        "password" => "geheim123",
        "group" => "g6",
        "hwid" => "ABCDEF-123456"
    ],
    "TestUser" => [
        "password" => "test",
        "group" => "g4",
        "hwid" => ""
    ]
];

// Waarden uit URL
$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';
$hwid     = $_GET['hwid'] ?? '';

// Kijk of gebruiker bestaat
if (!isset($users[$username])) {
    echo "invalid";
    exit;
}

// Controleer wachtwoord
if ($users[$username]['password'] !== $password) {
    echo "invalid";
    exit;
}

// p1 = wachtwoord correct
echo "p1 ";

// Controleer groep
echo $users[$username]['group'] . " ";

// HWID check
$registeredHwid = $users[$username]['hwid'];

if ($registeredHwid === '') {
    // Eerste keer HWID registreren
    $users[$username]['hwid'] = $hwid;
    echo "h3";
} else if ($registeredHwid === $hwid) {
    echo "h1"; // HWID klopt
} else {
    echo "h2"; // Foute HWID
}
?>
