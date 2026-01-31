<?php
header('Content-Type: application/json; charset=utf-8');

$baseDir = __DIR__ . '/images/gallery/';
$allowedCategories = ['nature','abstract','modern','boho'];
$allowedExtensions = ['jpg','jpeg','png','webp'];

$data = [];

if (!is_dir($baseDir)) {
  echo json_encode([]);
  exit;
}

foreach ($allowedCategories as $cat) {
  $catDir = $baseDir . $cat;
  if (!is_dir($catDir)) continue;

  foreach (scandir($catDir) as $file) {
    if ($file === '.' || $file === '..') continue;

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExtensions)) continue;

    $data[] = [
      "src" => "images/gallery/$cat/$file",
      "cat" => $cat
    ];
  }
}

echo json_encode($data);
exit;
