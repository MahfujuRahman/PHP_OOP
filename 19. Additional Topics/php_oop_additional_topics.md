
# PHP OOP: Additional Topics

## 1. Unit Testing and Test-Driven Development (TDD) in PHP OOP

### Understanding Unit Tests
Unit testing involves writing small, isolated tests for individual methods or classes to ensure they function correctly. **PHPUnit** is the most widely used testing framework in PHP for writing unit tests.

#### Example:
```php
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {
    public function testAdd() {
        $calculator = new Calculator();
        $this->assertEquals(4, $calculator->add(2, 2));
    }
}
```

### Test-Driven Development (TDD)
TDD is a software development process where tests are written before the actual implementation. The cycle consists of:
1. Write a failing test.
2. Write the minimum amount of code to pass the test.
3. Refactor the code while ensuring all tests still pass.

TDD helps create robust and maintainable code because it forces you to define the expected behavior before writing the actual implementation.

---

## 2. Design Patterns Beyond the Basics

### Decorator Pattern
The **Decorator Pattern** allows behavior to be added to individual objects dynamically, without affecting the behavior of other objects from the same class.

#### Example:
```php
interface Coffee {
    public function cost();
}

class SimpleCoffee implements Coffee {
    public function cost() {
        return 2;
    }
}

class MilkDecorator implements Coffee {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost() {
        return $this->coffee->cost() + 1;
    }
}

$coffee = new MilkDecorator(new SimpleCoffee());
echo $coffee->cost(); // Outputs: 3
```

### Adapter Pattern
The **Adapter Pattern** allows incompatible interfaces to work together by creating an intermediary class that converts calls from one interface to another.

#### Example:
```php
interface MediaPlayer {
    public function play($file);
}

class Mp3Player implements MediaPlayer {
    public function play($file) {
        echo "Playing MP3: " . $file;
    }
}

class Mp4Player {
    public function playMp4($file) {
        echo "Playing MP4: " . $file;
    }
}

class Mp4Adapter implements MediaPlayer {
    protected $mp4Player;

    public function __construct(Mp4Player $mp4Player) {
        $this->mp4Player = $mp4Player;
    }

    public function play($file) {
        $this->mp4Player->playMp4($file);
    }
}
```

### Command Pattern
The **Command Pattern** encapsulates a request as an object, allowing you to parameterize clients with queues, requests, and operations.

---

## 3. Dependency Injection Frameworks

### Overview
PHP frameworks like **Laravel** have built-in **Dependency Injection Containers (DIC)**, allowing developers to resolve class dependencies automatically. The service container is responsible for managing and injecting these dependencies.

#### Example:
```php
class UserController {
    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function index() {
        return $this->service->getAllUsers();
    }
}

// Laravel resolves dependencies automatically
Route::get('/users', [UserController::class, 'index']);
```

Using DIC allows for inversion of control (IoC), promoting modularity and making the codebase easier to test.

---

## 4. Advanced Error Handling with Exception Hierarchies

### Custom Exception Hierarchies
Instead of relying solely on PHP's built-in exceptions, you can create your own **exception hierarchies** for better error management and debugging.

#### Example:
```php
class ApplicationException extends Exception {}

class DatabaseException extends ApplicationException {}
class ValidationException extends ApplicationException {}

try {
    throw new ValidationException("Invalid input");
} catch (ApplicationException $e) {
    echo $e->getMessage();
}
```

This makes error handling more flexible, as you can catch exceptions at various levels of the hierarchy.

---

## 5. Security Best Practices in PHP OOP

### Input Validation and Sanitization
Always validate and sanitize user input to avoid security vulnerabilities like **SQL injection** or **Cross-Site Scripting (XSS)**.

#### Example (SQL Injection Prevention):
```php
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
```

### Object-Oriented Security
- Use OOP concepts like **encapsulation** to limit access to sensitive data.
- Always follow **principle of least privilege**: expose only necessary methods or properties.

---

## 6. Event-Driven Programming

### Introduction
**Event-driven programming** allows your application to trigger events and react to them using **listeners**. In PHP, event dispatchers and listeners are commonly used in frameworks like Laravel to decouple components.

#### Example:
```php
class UserCreated {
    public $user;

    public function __construct($user) {
        $this->user = $user;
    }
}

class SendWelcomeEmail {
    public function handle(UserCreated $event) {
        // Send email to $event->user
    }
}

// Registering event listener in Laravel
Event::listen(UserCreated::class, SendWelcomeEmail::class);
```

This decouples your components, making your code more flexible and maintainable.

---

## Conclusion

These advanced OOP topics extend your knowledge beyond basic concepts, helping you write more maintainable, secure, and scalable code. From **unit testing** with PHPUnit to **event-driven programming** in modern frameworks, mastering these concepts will significantly improve your proficiency in PHP OOP.
