
# PHP OOP Concepts: Reflection in PHP

## 15. Reflection in PHP

### Reflection Classes and Methods

#### Definition:
**Reflection** in PHP is a powerful feature that allows you to inspect classes, methods, properties, and parameters at runtime. The Reflection API provides tools to analyze and retrieve metadata about your code dynamically, without directly interacting with the source code.

#### Explanation:
Reflection is especially useful in scenarios such as frameworks, debugging, or metaprogramming where you need to explore the structure and behavior of code at runtime. Using Reflection, you can find out what methods or properties a class has, access private properties, and invoke methods dynamically.

```php
class User {
    public $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    private function getEmail() {
        return $this->email;
    }
}

$reflectionClass = new ReflectionClass('User');
$methods = $reflectionClass->getMethods();

foreach ($methods as $method) {
    echo $method->getName() . "
";
}

// Outputs:
// __construct
// getEmail
```

### Key Points:
- Reflection allows you to inspect classes, methods, properties, and parameters at runtime.
- You can retrieve class information such as methods, properties, and constants without altering the source code.

---

### Introspection of Objects

#### Definition:
**Introspection** refers to the ability to examine the type and properties of an object at runtime. In PHP, Reflection provides a set of tools to perform introspection, allowing you to gather details about objects, methods, properties, and parameters dynamically.

#### Explanation:
Using Reflection, you can perform object introspection to get detailed information about a class or object, such as checking if a class has a specific method or property, retrieving doc comments, or even invoking methods on an object without knowing them beforehand.

```php
class Product {
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

$product = new Product(100);

// Introspection using Reflection
$reflectionClass = new ReflectionClass($product);
if ($reflectionClass->hasMethod('getPrice')) {
    $method = $reflectionClass->getMethod('getPrice');
    echo $method->invoke($product); // Outputs: 100
}
```

### Key Points:
- Introspection allows for examining objects at runtime.
- You can check for the presence of methods or properties and invoke them dynamically.

---

### Modifying Classes Dynamically at Runtime

#### Definition:
Using PHP's Reflection API, you can not only inspect but also manipulate classes and methods at runtime. This includes invoking private methods, setting private properties, and modifying the internal state of an object dynamically.

#### Explanation:
Reflection provides the ability to change the behavior of objects or modify their internal state at runtime. This can be useful in situations where you need to access or modify private or protected properties/methods without changing the source code.

```php
class Order {
    private $status;

    public function __construct() {
        $this->status = 'pending';
    }

    private function completeOrder() {
        $this->status = 'completed';
    }

    public function getStatus() {
        return $this->status;
    }
}

$order = new Order();
$reflectionClass = new ReflectionClass($order);

// Accessing and modifying a private method
$completeOrder = $reflectionClass->getMethod('completeOrder');
$completeOrder->setAccessible(true);
$completeOrder->invoke($order);

echo $order->getStatus(); // Outputs: completed
```

### Key Points:
- Reflection allows for dynamic modification of class properties and methods, including private and protected ones.
- This can be useful for testing, debugging, or meta-programming scenarios where altering behavior dynamically is required.

---

## Differences Between Introspection and Reflection

1. **Introspection**: Refers to examining objects and classes at runtime to gather information about their structure. It is a subset of Reflection, focused on retrieving metadata rather than modifying the object.

2. **Reflection**: Not only includes introspection but also provides tools to modify or interact with classes, methods, and properties dynamically, allowing you to change their state or behavior.

3. **Use Case**:
   - **Introspection**: Ideal for examining objects, checking if certain methods or properties exist, and gathering metadata.
   - **Reflection**: Useful for both inspecting and modifying classes and objects dynamically, such as invoking private methods or changing property values.

```php
// Introspection example
$reflectionClass->hasMethod('getPrice');

// Reflection example (modifying runtime behavior)
$method->setAccessible(true);
$method->invoke($object);
```

---

## Conclusion

Reflection in PHP is a powerful tool for examining and modifying code dynamically. It allows you to inspect classes, methods, and properties at runtime, and even change their behavior without altering the source code. By using Reflection, you can gain more flexibility and control in your applications, especially in scenarios like metaprogramming, debugging, or developing frameworks.
