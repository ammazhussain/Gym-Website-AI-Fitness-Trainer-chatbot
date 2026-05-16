<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['conversation']) || !is_array($data['conversation'])) {
    echo "Invalid conversation format.";
    exit;
}

$conversationJson = json_encode(['conversation' => $data['conversation']]);

// Send POST request to Flask API
$ch = curl_init('http://localhost:5000/chat');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $conversationJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "Error contacting Flask server: " . curl_error($ch);
} else {
    $decoded = json_decode($response, true);
    echo $decoded['reply'] ?? "Sorry, no response from the AI.";
}

curl_close($ch);
?>
