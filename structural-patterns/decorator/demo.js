class CarService {
    getCost() {
        //
    }

    getDescription() {
        //
    }
}

class BasicInspection extends CarService {
    getCost() {
        return 10;
    }

    getDescription() {
        return "Basic service";
    }
}

class OilChange extends CarService {
    constructor(carService) {
        if (!(carService instanceof CarService))
            throw new Error(
                "The parameter should must the same contract CarService"
            );

        super();
        this.carService = carService;
    }

    getCost() {
        return this.carService.getCost() + 30;
    }

    getDescription() {
        return this.carService.getDescription() + ", and a oil change";
    }
}

class TireRotation extends CarService {
    constructor(carService) {
        if (!(carService instanceof CarService))
            throw new Error(
                "The parameter should must the same contract CarService"
            );

        super();
        this.carService = carService;
    }

    getCost() {
        return this.carService.getCost() + 50;
    }

    getDescription() {
        return this.carService.getDescription() + ", and a tire rotation";
    }
}

// Client code...
service = new TireRotation(new OilChange(new BasicInspection()));
console.log("* Cost: %s \n", service.getCost());
console.log("* Description: %s \n", service.getDescription());
