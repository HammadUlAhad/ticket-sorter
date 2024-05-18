<?php

use PHPUnit\Framework\TestCase;

class TicketSorterTest extends TestCase
{
    public function testSortTickets()
    {
        $tickets = [
            new Ticket("Innsbruck Hbf", "Innsbruck Airport", "tram", "S5"),
            new Ticket("St. Anton am Arlberg Bahnhof", "Innsbruck Hbf", "train", "RJX 765, Platform 3, Seat 17C"),
            new Ticket("Innsbruck Airport", "Venice Airport", "flight", "AA904, Gate 10, Seat 18B, Self-check-in luggage at counter")
        ];

        $sortedTickets = TicketSorter::sortTickets($tickets);

        $this->assertEquals("St. Anton am Arlberg Bahnhof", $sortedTickets[0]->departure);
        $this->assertEquals("Innsbruck Hbf", $sortedTickets[0]->arrival);
        $this->assertEquals("Innsbruck Hbf", $sortedTickets[1]->departure);
        $this->assertEquals("Innsbruck Airport", $sortedTickets[1]->arrival);
        $this->assertEquals("Innsbruck Airport", $sortedTickets[2]->departure);
        $this->assertEquals("Venice Airport", $sortedTickets[2]->arrival);
    }
}
