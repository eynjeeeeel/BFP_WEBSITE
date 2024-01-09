<?php

// Simulated database or data source
$sampleData = [
    ['id' => 1, 'title' => 'Sample Result 1'],
    ['id' => 2, 'title' => 'Sample Result 2'],
    ['id' => 3, 'title' => 'Sample Result 3'],
    // Add more data as needed
];

// Get the search term from the GET parameter
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Perform a simple search (you can replace this with your actual search logic)
$results = [];
foreach ($sampleData as $item) {
    // Case-insensitive search by title
    if (stripos($item['title'], $searchTerm) !== false) {
        $results[] = $item;
    }
}

// Return the results in JSON format
header('Content-Type: application/json');
echo json_encode($results);

?>
