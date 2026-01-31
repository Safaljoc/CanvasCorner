<?php
header("Content-Type: application/json");

$testimonials = [
  ["name" => "Suman K.", "text" => "Amazing quality and fast delivery."],
  ["name" => "Anisha R.", "text" => "Premium finish, looks stunning on my wall."],
  ["name" => "Prabin S.", "text" => "Highly recommended for custom canvas work."],
  ["name" => "Rita P.", "text" => "Exceptional service and quality."]
];

echo json_encode($testimonials);
