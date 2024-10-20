
# PHP OOP Concepts: Advanced OOP Concepts

## 16. Advanced OOP Concepts

### Dependency Injection Containers

#### Definition:
A **Dependency Injection Container (DIC)** is a special type of object used to manage and resolve dependencies automatically. It is responsible for creating, managing, and injecting objects into the appropriate classes, ensuring that objects have access to the dependencies they need without explicitly passing them in the code.

#### Explanation:
In large applications, manually injecting dependencies can become cumbersome. Dependency Injection Containers automate this process by storing class definitions and their dependencies. When a class is needed, the container resolves and injects the required dependencies automatically.

```php
class Logger {
    public function log($message) {
        echo "Logging message: $message";
    }
}

class UserService {
    private $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function createUser($name) {
        echo "User $name created.";
        $this->logger->log("User $name was created.");
    }
}

// Example of a simple Dependency Injection Container
class Container {
    private $instances = [];

    public function set($name, $closure) {
        $this->instances[$name] = $closure;
    }

    public function get($name) {
        return $this->instances[$name]($this);
    }
}

// Register dependencies
$container = new Container();
$container->set('logger', function() {
    return new Logger();
});
$container->set('userService', function($container) {
    return new UserService($container->get('logger'));
});

// Resolve and use the UserService
$userService = $container->get('userService');
$userService->createUser('Alice');
```

### Key Points:
- A DIC automates dependency resolution, reducing the need to manually inject dependencies.
- It manages the lifecycle of objects and their dependencies.
- Widely used in frameworks like Laravel and Symfony.

---

### ORM (Object-Relational Mapping)

#### Definition:
**Object-Relational Mapping (ORM)** is a programming technique that allows you to map objects in your application to records in a relational database. ORM tools enable developers to interact with the database using object-oriented principles rather than writing SQL queries.

#### Explanation:
ORMs abstract away database operations by allowing developers to work with objects, which represent database tables and rows. The ORM handles translating object actions into SQL queries behind the scenes, making it easier to manage database interactions in an object-oriented manner.

```php
// Example using an ORM like Eloquent (Laravel)

class User {
    protected $table = 'users';

    public function getName() {
        return $this->name;
    }
}

// Fetching data using ORM methods
$user = User::find(1); // Finds a user with ID 1
echo $user->getName();  // Outputs user's name
```

### Key Points:
- ORMs map database records to objects, reducing the need to write SQL queries manually.
- Common ORM libraries in PHP include Doctrine and Eloquent (in Laravel).
- ORMs simplify data manipulation and retrieval using object-oriented techniques.

---

### Dynamic Object Creation with Factory and Builder Patterns

#### Factory Pattern

The **Factory Pattern** is a design pattern used to encapsulate the creation of objects. Instead of calling constructors directly, the factory method decides which class to instantiate, making it easier to manage complex object creation.

```php
interface Vehicle {
    public function drive();
}

class Car implements Vehicle {
    public function drive() {
        echo "Driving a car.";
    }
}

class Motorcycle implements Vehicle {
    public function drive() {
        echo "Riding a motorcycle.";
    }
}

class VehicleFactory {
    public static function create($type) {
        if ($type === 'car') {
            return new Car();
        } elseif ($type === 'motorcycle') {
            return new Motorcycle();
        }
        return null;
    }
}

$vehicle = VehicleFactory::create('car');
$vehicle->drive(); // Outputs: Driving a car.
```

### Key Points:
- The Factory Pattern centralizes object creation logic, making it easier to manage complex objects.
- The client code does not need to know the specific class it is working with, just the factory.

#### Builder Pattern

The **Builder Pattern** is a design pattern that allows for the step-by-step construction of complex objects. It separates the construction process from the object itself, allowing for different configurations of the object to be created easily.

```php
class House {
    public $walls;
    public $doors;
    public $windows;

    public function show() {
        echo "This house has $this->walls walls, $this->doors doors, and $this->windows windows.";
    }
}

class HouseBuilder {
    private $house;

    public function __construct() {
        $this->house = new House();
    }

    public function setWalls($count) {
        $this->house->walls = $count;
        return $this;
    }

    public function setDoors($count) {
        $this->house->doors = $count;
        return $this;
    }

    public function setWindows($count) {
        $this->house->windows = $count;
        return $this;
    }

    public function build() {
        return $this->house;
    }
}

// Using the Builder Pattern
$builder = new HouseBuilder();
$house = $builder->setWalls(4)->setDoors(2)->setWindows(6)->build();
$house->show(); // Outputs: This house has 4 walls, 2 doors, and 6 windows.
```

### Key Points:
- The Builder Pattern simplifies the creation of complex objects by providing a step-by-step construction process.
- It allows for different configurations of an object without needing to use multiple constructors.

---

## Differences Between Factory and Builder Patterns

1. **Factory Pattern**: Centralizes and encapsulates object creation, making it easier to manage the instantiation of different classes without exposing the client to the specific class types.

2. **Builder Pattern**: Focuses on creating complex objects step by step, providing more control over the construction process, especially when multiple configurations are required.

---

## Conclusion

Advanced OOP concepts like Dependency Injection Containers, ORM, and design patterns such as Factory and Builder are essential for building scalable, maintainable, and flexible software systems. They provide powerful tools for managing dependencies, abstracting database interactions, and simplifying object creation processes.
