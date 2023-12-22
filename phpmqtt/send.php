<?php
require("phpMQTT.php");

$server = "riset.revolusi-it.com"; // Ganti dengan alamat broker MQTT Anda
$port = 1883; // Ganti dengan port broker MQTT Anda
$username = ""; // Ganti dengan username broker MQTT Anda (jika ada)
$password = ""; // Ganti dengan password broker MQTT Anda (jika ada)
$client_id = "phpMQTT-publisher"; // Ganti dengan ID klien yang unik

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
    $topic = "topix/topix"; // Ganti dengan topik MQTT yang Anda inginkan
    $message = "Hello, MQTT!"; // Pesan yang akan dikirim

    $mqtt->publish($topic, $message, 0);
    $mqtt->close();
} else {
    echo "Gagal terhubung ke broker MQTT!";
}
?>

