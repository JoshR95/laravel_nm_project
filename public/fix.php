<?php
// Clear all caches
shell_exec('cd .. && php artisan config:clear');
shell_exec('cd .. && php artisan cache:clear');
shell_exec('cd .. && php artisan view:clear');
shell_exec('cd .. && php artisan route:clear');

// Check build directory
if (!is_dir(__DIR__ . '/build')) {
    echo "Error: build directory not found\n";
} else {
    echo "Build directory exists\n";
    if (file_exists(__DIR__ . '/build/manifest.json')) {
        echo "Manifest file exists\n";
        echo "Manifest contents:\n";
        echo file_get_contents(__DIR__ . '/build/manifest.json');
    } else {
        echo "Error: manifest.json not found\n";
    }
}

// Check permissions
echo "\nChecking permissions:\n";
echo "Build directory permissions: " . substr(sprintf('%o', fileperms(__DIR__ . '/build')), -4) . "\n";

// Display environment
echo "\nEnvironment:\n";
echo "APP_ENV: " . getenv('APP_ENV') . "\n";
echo "APP_URL: " . getenv('APP_URL') . "\n";
echo "ASSET_URL: " . getenv('ASSET_URL') . "\n"; 