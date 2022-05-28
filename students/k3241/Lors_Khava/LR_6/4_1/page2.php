<?php
session_start();

if (isset($_SESSION["products"]) && isset($_SESSION["weight"]))
{
    $products = $_SESSION["products"];
    $weight = $_SESSION["weight"];
    echo "products: $products <br> weight: $weight";
}
