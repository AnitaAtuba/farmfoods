<?php
require_once "../classes/Buyer.php";

$buyer = new Buyer;

// Get filter values (default to empty if not set)
$search   = $_POST['search']   ?? '';
$category = $_POST['category'] ?? '';
$lga      = $_POST['lga']      ?? '';

// If all filters are empty → fetch all products
if (empty($search) && empty($category) && empty($lga)) {
    $products = $buyer->fetch_all_product(); // <-- create this method if not yet in Buyer.php
} else {
    // Use the appropriate filter based on which values are set
    if (!empty($search)) {
        $products = $buyer->filter_search($search);
    } elseif (!empty($category)) {
        $products = $buyer->filter_category($category);
    } elseif (!empty($lga)) {
        $products = $buyer->filter_lga($lga);
    } else {
        $products = $buyer->fetch_all_product(); // Fallback to all products
    }
}

// Load product cards
if (!empty($products)) {
    foreach ($products as $product) {
        require "../partials/product_cards.php";
    }
} else{
   
        // require "../partials/product_cards.php";
      echo "  <p class='alert alert-info'>No Products found</p>";
} 