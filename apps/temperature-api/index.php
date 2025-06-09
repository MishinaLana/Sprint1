<?php

$temperature = rand(11, 80);


echo json_encode([
    'value' => $temperature,
    'status' => 'active',
    'timestamp' => (new DateTime())->format(\DateTime::ATOM)
]);
