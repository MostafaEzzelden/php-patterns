<?php

/**
 * Template Method is a behavioral design pattern that defines the skeleton of an
 * algorithm in the superclass but lets subclasses override specific steps of the
 * algorithm without changing its structure.
 */

require 'vendor/autoload.php';

(new App\VeggieSub)->make();
(new App\TurkeySub)->make();
