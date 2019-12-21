<?php

namespace App;

abstract class Sub
{
    final public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    protected function layBread()
    {
        var_dump('laying down the bread!');
        return $this;
    }

    protected function addLettuce()
    {
        var_dump('add some lettuce');
        return $this;
    }

    abstract protected function addPrimaryToppings();

    protected function addSauces()
    {
        var_dump('add some sauces');
        return $this;
    }
}
