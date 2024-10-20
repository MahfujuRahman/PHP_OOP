
# Access Modifiers in PHP OOP

## 1. Public
- **`public`** properties and methods can be accessed from **anywhere**—both inside and outside the class.
- By default, all class members are public unless specified otherwise.

### Example:
```php
class Example {
    public $name;

    public function sayHello() {
        echo "Hello, {$this->name}!<br>";
    }
}

$obj = new Example();
$obj->name = "Alice";  // Accessible from outside the class
$obj->sayHello();  // Output: Hello, Alice!
```
---

## 2. Protected
- **`protected`** properties and methods can be accessed **within the class** and **its child classes**, but **not from outside** the class.

### Example:
```php
class Animal {
    protected $type;

    public function __construct($type) {
        $this->type = $type;
    }
}

class Dog extends Animal {
    public function getType() {
        return "This is a {$this->type}.<br>";
    }
}

$dog = new Dog("Mammal");
echo $dog->getType();  // Output: This is a Mammal.
// echo $dog->type;  // Error: Cannot access protected property.
```
---

## 3. Private
- **`private`** members can only be accessed **within the class** where they are defined. They cannot be inherited or accessed by child classes.

### Example:
```php
class BankAccount {
    private $balance;

    public function __construct($initialBalance) {
        $this->balance = $initialBalance;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount(1000);
echo "Balance: " . $account->getBalance() . "<br>";  // Output: Balance: 1000
// echo $account->balance;  // Error: Cannot access private property.
```
---

## 4. Static (Class-level properties and methods)
- **`static`** properties and methods belong to the **class** rather than any specific instance.
- They are shared among all instances of the class and can be accessed without creating an object.
- Use the **`self`** keyword to access static members from within the class, and the **`::`** operator for access outside.

### Example:
```php
class Counter {
    public static $count = 0;

    public static function increment() {
        self::$count++;
    }
}

Counter::increment();  // Accessing static method without creating an object
Counter::increment();
echo "Count: " . Counter::$count . "<br>";  // Output: Count: 2
```
### Explanation:
- **Static properties and methods** are accessed using `ClassName::property` or `ClassName::method()`.
- No need to create an instance to use static members.

---

## Summary of Access Modifiers:
| Modifier   | Access Within Class | Access in Child Class | Access from Outside |
|------------|---------------------|-----------------------|---------------------|
| `public`   | Yes                 | Yes                   | Yes                 |
| `protected`| Yes                 | Yes                   | No                  |
| `private`  | Yes                 | No                    | No                  |
| `static`   | Shared across all instances | N/A | Access using `ClassName::` |

---
