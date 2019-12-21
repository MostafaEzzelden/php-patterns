class HomeChecker {
    constructor() {
        this.successors = null;
    }

    check(home) {
        //
    }

    setSuccessors(successors) {
        if (successors && successors instanceof HomeChecker) {
            this.successors = successors;
        }

        throw new Error(
            "The " +
                (successors && successors.constructor
                    ? successors.constructor.name
                    : "unknown") +
                " constructor not instance of HomeChecker !"
        );
    }

    next(home) {
        if (this.successors) {
            this.successors.check(home);
        }
    }
}

class Locks extends HomeChecker {
    check(home) {
        if (!home.locked) {
            throw new Error("The doors are not locked!!");
        }
        this.next(home);
    }
}

class Alarm extends HomeChecker {
    check(home) {
        if (!home.alarmOn) {
            throw new Error("The alarm has not been set!!");
        }
        this.next(home);
    }
}

class Lights extends HomeChecker {
    check(home) {
        if (!home.lightsOff) {
            throw new Error("The lights still are on!!");
        }
        this.next(home);
    }
}

class HomeStatus {
    constructor() {
        this.locked = true;
        this.alarmOn = true;
        this.lightsOff = false;
    }
}

// Client Code..
locks = new Locks();
alarm = new Alarm();
lights = new Lights();

locks.setSuccessors(alarm);
alarm.setSuccessors(lights);

locks.check(new HomeStatus());
