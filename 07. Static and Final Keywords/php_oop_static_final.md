
# PHP OOP Concepts: Static and Final Keywords

## 7. Static and Final Keywords

### Static Methods and Properties

#### Definition:
In PHP, a **static** property or method belongs to the class itself rather than any instance of the class. This means that you can call static methods or access static properties without creating an object of the class.

#### Explanation:
Static methods and properties are shared across all instances of a class. They are useful when you need to store data or define behavior that doesn't depend on object-specific data.

```php
class MathOperations {
    public static $pi = 3.1416;

    public static function add($a, $b) {
        return $a + $b;
    }
}

// Accessing static property and method without creating an instance
echo MathOperations::$pi; // Outputs: 3.1416
echo MathOperations::add(5, 7); // Outputs: 12
```

#### Key Points:
- Static methods and properties can be accessed using `ClassName::methodName()` or `ClassName::$propertyName`.
- They belong to the class, not to individual instances.

---

### Final Classes and Methods

#### Definition:
The **final** keyword in PHP is used to prevent a class from being inherited or a method from being overridden. When a class or method is marked as final, it cannot be extended or modified by child classes.

#### Explanation:
A **final class** cannot be extended by any other class, ensuring that its functionality remains unchanged. A **final method** in a class can be used in child classes but cannot be overridden.

```php
final class FinalClass {
    public function sayHello() {
        echo "Hello from a final class!";
    }
}

// This will cause an error, as FinalClass cannot be extended
// class AnotherClass extends FinalClass { }

class ParentClass {
    final public function show() {
        echo "This is a final method.";
    }
}

class ChildClass extends ParentClass {
    // This will cause an error, as the final method cannot be overridden
    // public function show() {}
}
```

#### Key Points:
- A final class cannot be extended.
- A final method cannot be overridden by subclasses.

---

## When to Use Static vs Non-static

### Static Methods and Properties

- Use **static** methods and properties when you need functionality that does not rely on instance-specific data.
- Common use cases include utility or helper methods, constants, and shared data across all instances.
  
```php
class Config {
    public static $appName = "MyApp";

    public static function getAppName() {
        return self::$appName;
    }
}

echo Config::getAppName(); // Outputs: MyApp
```

### Non-static Methods and Properties

- Non-static methods and properties are used when the behavior or data depends on the specific instance of the class.
- Use non-static methods when you want each instance of a class to have its own separate data or behavior.

```php
class Car {
    public $model;

    public function setModel($model) {
        $this->model = $model;
    }

    public function getModel() {
        return $this->model;
    }
}

$car1 = new Car();
$car1->setModel("Toyota");

$car2 = new Car();
$car2->setModel("Honda");

echo $car1->getModel(); // Outputs: Toyota
echo $car2->getModel(); // Outputs: Honda
```

### Key Differences

1. **Static methods** belong to the class itself and can be called without creating an object, while **non-static methods** are tied to instances of the class.
2. **Static properties** are shared across all instances, while **non-static properties** are unique to each object.
3. Use **static** when you need shared functionality, and **non-static** when each instance should have its own data or behavior.

---

## Differences Between Static and Final Keywords

1. **Static**:
   - Used for methods and properties that belong to the class and not to any specific instance.
   - Static methods can be called without creating an object of the class.

2. **Final**:
   - Used to prevent class inheritance or method overriding.
   - Final classes cannot be extended, and final methods cannot be overridden.

3. **Use Cases**:
   - **Static** is useful for utility functions and shared properties.
   - **Final** is useful when you want to lock a class or method to prevent further extension or modification.

```php
// Static example
class Logger {
    public static function log($message) {
        echo $message;
    }
}

// Final example
final class BaseLogger {
    public function logError() {
        echo "Logging error.";
    }
}
```

---

## Conclusion

The static and final keywords in PHP provide powerful ways to control how classes and methods are used. Static methods and properties are great for shared, class-wide functionality, while final methods and classes ensure that certain behaviors cannot be overridden or modified. Choosing between static and non-static depends on whether you need instance-specific behavior or shared functionality.
