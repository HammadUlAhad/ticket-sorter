<?php

class Ticket
{
    public $departure;
    public $arrival;
    public $type;
    public $details;

    public function __construct(string $departure, string $arrival, string $type, string $details)
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->type = $type;
        $this->details = $details;
    }
}
