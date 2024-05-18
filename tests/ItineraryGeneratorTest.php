<?php

use PHPUnit\Framework\TestCase;

class ItineraryGeneratorTest extends TestCase
{
    public function testGenerateItinerary()
    {
        $tickets = [
            new Ticket("St. Anton am Arlberg Bahnhof", "Innsbruck Hbf", "train", "RJX 765, Platform 3, Seat 17C"),
            new Ticket("Innsbruck Hbf", "Innsbruck Airport", "tram", "S5"),
            new Ticket("Innsbruck Airport", "Venice Airport", "flight", "AA904, Gate 10, Seat 18B, Self-check-in luggage at counter")
        ];

        $expectedItinerary = [
            "0. Start.",
            "1. Board train RJX 765, Platform 3, Seat 17C from St. Anton am Arlberg Bahnhof to Innsbruck Hbf.",
            "2. Board tram S5 from Innsbruck Hbf to Innsbruck Airport.",
            "3. Board flight AA904, Gate 10, Seat 18B, Self-check-in luggage at counter from Innsbruck Airport to Venice Airport.",
            "4. Last destination reached."
        ];

        $this->assertEquals($expectedItinerary, ItineraryGenerator::generateItinerary($tickets));
    }
}
