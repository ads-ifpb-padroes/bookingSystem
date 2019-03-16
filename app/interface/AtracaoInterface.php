<?php

namespace App\Event;

interface AtracaoInterface {

    public function createEvent($value);

    public function allEvents();

}