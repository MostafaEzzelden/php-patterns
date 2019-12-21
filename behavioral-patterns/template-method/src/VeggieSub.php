<?php

namespace App;

use App\Sub;

class VeggieSub extends Sub
{
    /**
     * add Primary Toppings
     *
     * @return VeggieSub
     */
    protected function addPrimaryToppings(): VeggieSub
    {
        var_dump('add some veggies');
        return $this;
    }
}
