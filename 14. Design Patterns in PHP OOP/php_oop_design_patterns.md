
# PHP OOP Concepts: Design Patterns

## 14. Design Patterns in PHP OOP

### Singleton Pattern

#### Definition:
The **Singleton Pattern** ensures that a class has only one instance and provides a global point of access to that instance. This is useful when exactly one object is needed to coordinate actions across a system.

#### Explanation:
The Singleton Pattern restricts the instantiation of a class to a single object. This is done by making the constructor private, providing a static method that controls access to the single instance.

```php
class Singleton {
    private static $instance = null;

    private function __construct() {
        // Private constructor to prevent direct object creation
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$singleton = Singleton::getInstance();
```

### Key Points:
- Ensures a class has only one instance.
- The instance is accessed through a static method.
- The constructor is private to prevent direct instantiation.

---

### Factory Pattern

#### Definition:
The **Factory Pattern** defines an interface for creating objects, but lets subclasses alter the type of objects that will be created. It decouples the instantiation process from the client code.

#### Explanation:
The Factory Pattern allows you to centralize object creation logic in one place. Instead of calling constructors directly, you use a factory method to create objects. This makes it easier to modify object creation without affecting client code.

```php
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing Square";
    }
}

class ShapeFactory {
    public static function createShape($type) {
        if ($type === 'circle') {
            return new Circle();
        } elseif ($type === 'square') {
            return new Square();
        }
        return null;
    }
}

$shape = ShapeFactory::createShape('circle');
$shape->draw(); // Outputs: Drawing Circle
```

### Key Points:
- The Factory Pattern centralizes object creation.
- It allows you to decouple the instantiation process from the client code.
- New object types can be added without modifying client code.

---

### Observer Pattern

#### Definition:
The **Observer Pattern** defines a one-to-many relationship between objects so that when one object changes state, all of its dependents are notified and updated automatically.

#### Explanation:
In the Observer Pattern, the subject maintains a list of observers, and notifies them of state changes by calling their `update()` method. This pattern is useful in scenarios where changes in one object need to be reflected in multiple other objects.

```php
class Subject {
    private $observers = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class Observer {
    public function update() {
        echo "Observer has been notified.";
    }
}

$subject = new Subject();
$observer = new Observer();
$subject->attach($observer);

$subject->notify(); // Outputs: Observer has been notified.
```

### Key Points:
- The Observer Pattern allows objects to be notified of changes in other objects.
- It defines a one-to-many relationship between objects.
- Useful for implementing event-handling systems.

---

### Strategy Pattern

#### Definition:
The **Strategy Pattern** defines a family of algorithms, encapsulates each one, and makes them interchangeable. This pattern lets the algorithm vary independently from the clients that use it.

#### Explanation:
In the Strategy Pattern, you define a set of algorithms (strategies) and encapsulate each one in a separate class. The context class uses these strategies without needing to know their internal workings. This allows you to change the algorithm dynamically at runtime.

```php
interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid $amount with credit card.";
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid $amount with PayPal.";
    }
}

class PaymentContext {
    private $strategy;

    public function setPaymentStrategy(PaymentStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function pay($amount) {
        $this->strategy->pay($amount);
    }
}

$context = new PaymentContext();
$context->setPaymentStrategy(new PayPalPayment());
$context->pay(100); // Outputs: Paid 100 with PayPal.
```

### Key Points:
- The Strategy Pattern allows you to switch between different algorithms dynamically.
- Encapsulates algorithms in separate classes, making them interchangeable.
- The client code remains unaffected by changes to the algorithm.

---

### Dependency Injection

#### Definition:
**Dependency Injection** is a design pattern in which an object receives its dependencies from an external source rather than creating them internally. This decouples the object from its dependencies and allows for more flexible, testable code.

#### Explanation:
In Dependency Injection, you pass dependencies (such as services or objects) into a class via constructors, setters, or methods. This allows you to easily swap out dependencies, which is particularly useful for testing.

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

$logger = new Logger();
$userService = new UserService($logger);
$userService->createUser("Alice"); 
// Outputs:
// User Alice created.
// Logging message: User Alice was created.
```

### Key Points:
- Dependency Injection allows objects to receive their dependencies from external sources.
- It decouples classes from their dependencies, improving flexibility and testability.
- Commonly used in frameworks for injecting services into classes.

---

## Differences Between Design Patterns

1. **Singleton Pattern**: Ensures only one instance of a class exists. Useful for shared resources like a database connection.

2. **Factory Pattern**: Centralizes object creation logic, allowing you to create objects without specifying the exact class.

3. **Observer Pattern**: Defines a one-to-many dependency between objects, useful for event systems where objects need to be notified of state changes.

4. **Strategy Pattern**: Encapsulates interchangeable algorithms, allowing dynamic changes to the algorithm being used.

5. **Dependency Injection**: Provides a way to supply an object’s dependencies externally, improving code flexibility and making unit testing easier.

---

## Conclusion

Design patterns are fundamental for building flexible, maintainable, and scalable software. Each pattern solves a specific type of problem, and choosing the right one depends on the specific requirements of your application.
