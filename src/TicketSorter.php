<?php

class TicketSorter
{
    public static function sortTickets(array $tickets): array
    {
        $ticketMap = [];
        $startPoints = [];
        $endPoints = [];

        // Create maps and sets to track tickets
        foreach ($tickets as $ticket) {
            $ticketMap[$ticket->departure] = $ticket;
            $startPoints[$ticket->departure] = true;
            $endPoints[$ticket->arrival] = true;
        }

        // Find the starting point
        $start = null;
        foreach ($startPoints as $point => $value) {
            if (!isset($endPoints[$point])) {
                $start = $point;
                break;
            }
        }

        if ($start === null) {
            throw new InvalidTicketException("Invalid ticket data: unable to determine the starting point.");
        }

        // Sort tickets
        $sortedTickets = [];
        while (isset($ticketMap[$start])) {
            $ticket = $ticketMap[$start];
            $sortedTickets[] = $ticket;
            $start = $ticket->arrival;
        }

        return $sortedTickets;
    }
}
