<?php

// return [
//     "/"=>"controllers/index.php",
//     "/get-a-quote/"=>"controllers/quote.php",
// ];

$router->get("/","controllers/index.php");
$router->get("/get-a-quote","controllers/quote.php");

$router->post("/career","controllers/career/store.php");
$router->post("/quote","controllers/quote/store.php");
$router->post("/contact-us","controllers/contact-us/store.php");