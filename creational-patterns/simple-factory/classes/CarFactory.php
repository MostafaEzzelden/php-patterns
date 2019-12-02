<?php


class CarFactory
{
    public const BMW_TYPE   = 1;
    public const SEDAN_TYPE = 2;

    /**
     * build new car type
     *
     * @param integer $type
     * @return Car
     */
    public static function build(int $type): Car
    {
        switch ($type) {
            case self::BMW_TYPE:
                return new BmwCar();
            case self::SEDAN_TYPE:
                return new SedanCar();
        }

        throw new Exception('Car type not found.');
    }
}
