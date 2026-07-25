<?php
// This script reads menu_data.php and outputs SQL-like insert statements
// or can be used to generate seed data programmatically.

$data = require __DIR__ . '/data/menu_data.php';

echo "=== MAD DELIVERY DATA CONVERTED TO PHP ===\n\n";

echo "BRANDS (" . count($data['brands']) . "):\n";
foreach ($data['brands'] as $b) {
    echo "  - {$b['name']} ({$b['slug']}) | {$b['description']}\n";
}

echo "\nCHEEZ! PIZZA PRODUCTS (" . count($data['cheez_pizza']) . "):\n";
foreach ($data['cheez_pizza'] as $p) {
    echo "  [{$p['category']}] {$p['name']} | ৳{$p['price']} | slug: {$p['slug']}\n";
}

echo "\nMADCHEF PRODUCTS (" . count($data['madchef']) . "):\n";
foreach ($data['madchef'] as $p) {
    echo "  [{$p['category']}] {$p['name']} | ৳{$p['price']} | slug: {$p['slug']}\n";
}

echo "\n=== TOTAL PRODUCTS ===\n";
echo "Cheez! Pizza: " . count($data['cheez_pizza']) . "\n";
echo "Madchef: " . count($data['madchef']) . "\n";
echo "Total: " . (count($data['cheez_pizza']) + count($data['madchef'])) . "\n";
