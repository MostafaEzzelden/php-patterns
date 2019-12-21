<?php

namespace App;

class TurkeySub extends Sub
{
    /**
     * add Primary Toppings
     *
     * @return TurkeySub
     */
    protected function addPrimaryToppings(): TurkeySub
    {
        var_dump('add some turkey');
        return $this;
    }
}
