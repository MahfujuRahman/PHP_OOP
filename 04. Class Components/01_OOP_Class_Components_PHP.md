
# Class Components in PHP OOP

## 1. Properties and Methods
- **Properties** are variables that belong to a class. They store the state or data of an object.
- **Methods** are functions defined within a class that describe the behavior of an object.

### Example:
```php
class Car {
    public \$brand;  // Property
    public \$color;  // Property

    public function describe() {  // Method
        echo "This car is a {\$this->color} {\$this->brand}.<br>";
    }
}

\$car = new Car();
\$car->brand = "Toyota";
\$car->color = "Blue";
\$car->describe();  // Output: This car is a Blue Toyota.
```

## 2. Constants (Class Constants)
Class Constants are immutable values that belong to a class. They are defined using the `const` keyword and must be initialized when declared.  
Constants are accessed using the `::` operator.

### Example:
```php
class Circle {
    const PI = 3.14159;  // Class constant

    public function getArea(\$radius) {
        return self::PI * \$radius * \$radius;
    }
}

\$circle = new Circle();
echo "Area: " . \$circle->getArea(5) . "<br>";  // Output: Area: 78.53975
```

### Explanation:
- Constants cannot be changed once defined.
- Use `self::CONSTANT_NAME` inside the class and `ClassName::CONSTANT_NAME` outside.

## 3. \$this Keyword (Referring to the Current Instance)
The `\$this` keyword refers to the current instance of the class.  
It is used to access properties and methods within the same object.

### Example:
```php
class Person {
    public \$name;

    public function greet() {
        echo "Hello, " . \$this->name . "!<br>";
    }
}

\$person = new Person();
\$person->name = "Alice";
\$person->greet();  // Output: Hello, Alice!
```

## 4. Self vs Static vs Parent
### self: 
Refers to the current class (not the instance).  
It is used to access static properties, constants, or methods.

### Example of `self`:
```php
class Demo {
    const MESSAGE = "Hello from self!";

    public static function showMessage() {
        echo self::MESSAGE . "<br>";
    }
}

Demo::showMessage();  // Output: Hello from self!
```

### static:
Refers to the called class (late static binding).  
It allows child classes to inherit the context of the class from which the method was called.

### Example of `static`:
```php
class A {
    public static function who() {
        echo "Class A<br>";
    }

    public static function test() {
        static::who();  // Late static binding
    }
}

class B extends A {
    public static function who() {
        echo "Class B<br>";
    }
}

B::test();  // Output: Class B
```

### parent:
Refers to the parent class.  
It is used to call a parent class's method or constructor from the child class.

### Example of `parent`:
```php
class Animal {
    public function sound() {
        echo "Some generic animal sound.<br>";
    }
}

class Dog extends Animal {
    public function sound() {
        parent::sound();  // Call the parent method
        echo "Dog barks.<br>";
    }
}

\$dog = new Dog();
\$dog->sound();  // Output: Some generic animal sound. Dog barks.
```

## Summary of self vs static vs parent:

| Keyword | Usage                         | Behavior                                   |
|---------|-------------------------------|--------------------------------------------|
| self    | Refers to the current class    | No inheritance (early binding)             |
| static  | Refers to the called class     | Allows child class context (late binding)  |
| parent  | Refers to the parent class     | Calls methods or constructors of parent    |
