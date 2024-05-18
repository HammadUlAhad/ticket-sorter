<?php
require 'vendor/autoload.php';

// Use the classes from the src directory
require 'src/Ticket.php';
require 'src/TicketSorter.php';
require 'src/ItineraryGenerator.php';
require 'src/exceptions/InvalidTicketException.php';
require 'src/exceptions/MissingTicketDataException.php';

// Define the tickets
$tickets = [
    new Ticket("Innsbruck Hbf", "Innsbruck Airport", "tram", "S5"),
    new Ticket("St. Anton am Arlberg Bahnhof", "Innsbruck Hbf", "train", "RJX 765, Platform 3, Seat 17C"),
    new Ticket("Innsbruck Airport", "Venice Airport", "flight", "AA904, Gate 10, Seat 18B, Self-check-in luggage at counter")
];

// Sort the tickets
try {
    $sortedTickets = TicketSorter::sortTickets($tickets);
    $itinerary = ItineraryGenerator::generateItinerary($sortedTickets);

    // Output the itinerary
    foreach ($itinerary as $step) {
        echo $step . PHP_EOL;
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
