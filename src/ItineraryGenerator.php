<?php

class ItineraryGenerator
{
    public static function generateItinerary(array $tickets): array
    {
        $itinerary = [];
        $itinerary[] = "0. Start.";

        foreach ($tickets as $index => $ticket) {
            $stepNumber = $index + 1;
            $details = self::formatTicketDetails($ticket);
            $itinerary[] = "{$stepNumber}. {$details}";
        }

        $itinerary[] = (count($itinerary)) . ". Last destination reached.";
        return $itinerary;
    }

    private static function formatTicketDetails(Ticket $ticket): string
    {
        $details = "Board {$ticket->type} {$ticket->details} from {$ticket->departure} to {$ticket->arrival}.";
        return $details;
    }
}
