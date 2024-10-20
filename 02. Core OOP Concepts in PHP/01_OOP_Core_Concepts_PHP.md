
# Core OOP Concepts in PHP

## 1. Encapsulation (Hiding Data with Access Modifiers)
**Encapsulation** is the process of bundling data (properties) and methods into a class and controlling access using **access modifiers**.

### Access Modifiers:
- **`public`**: Accessible from anywhere.
- **`private`**: Accessible only within the class.
- **`protected`**: Accessible within the class and child classes.

### Example of Encapsulation:
```php
class BankAccount {
    private $balance;

    public function __construct($initialBalance) {
        $this->balance = $initialBalance;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient funds.<br>";
        }
    }
}
```
### Explanation:
- The `balance` property is private, meaning it cannot be accessed directly.
- Access to the balance is controlled through public methods (`getBalance`, `deposit`, `withdraw`).

---

## 2. Inheritance (Extending a Class)
**Inheritance** allows a class (child) to inherit properties and methods from another class (parent), promoting **code reusability**.

### Example of Inheritance:
```php
class Vehicle {
    public $brand;
    public $year;

    public function __construct($brand, $year) {
        $this->brand = $brand;
        $this->year = $year;
    }

    public function showDetails() {
        echo "This is a {$this->brand} vehicle from {$this->year}.<br>";
    }
}

class Car extends Vehicle {
    public $model;

    public function __construct($brand, $year, $model) {
        parent::__construct($brand, $year);
        $this->model = $model;
    }

    public function showDetails() {
        echo "This is a {$this->brand} {$this->model} from {$this->year}.<br>";
    }
}
```
### Explanation:
- The `Car` class extends the `Vehicle` class and overrides the `showDetails` method.

---

## 3. Polymorphism (Overriding Methods, Interfaces)
**Polymorphism** allows methods to behave differently based on the object calling them. It can be implemented through **method overriding** and **interfaces**.

### Method Overriding Example:
```php
class Animal {
    public function makeSound() {
        echo "Animal makes a sound.<br>";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Dog barks.<br>";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Cat meows.<br>";
    }
}
```
### Interface Example:
```php
interface Shape {
    public function area();
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}
```
---

## 4. Abstraction (Abstract Classes and Interfaces)
**Abstraction** hides implementation details and exposes only essential features. It can be achieved through **abstract classes** and **interfaces**.

### Abstract Class Example:
```php
abstract class Animal {
    abstract public function makeSound();

    public function sleep() {
        echo "Sleeping...<br>";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Dog barks.<br>";
    }
}
```

### Differences: Abstract Class vs Interface
| Feature              | Abstract Class                          | Interface                         |
|---------------------|------------------------------------------|-----------------------------------|
| Methods             | Can have both abstract and concrete methods | Only method signatures (no body) |
| Multiple Inheritance | Not supported                           | A class can implement multiple interfaces |
| Usage               | When you need partial implementation     | When you need to define a contract |

---
