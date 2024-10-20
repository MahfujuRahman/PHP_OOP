
# PHP OOP Concepts

## 5. Inheritance and Code Reuse

### Definition:
Inheritance is a key feature of object-oriented programming that allows a class (child class) to inherit properties and methods from another class (parent class). This helps in code reuse, making programs more modular and easier to maintain.

### Explanation:
When you create a new class that extends an existing class, the new class automatically gets access to all of the public and protected methods and properties of the parent class. This reduces code duplication since shared functionality can be placed in the parent class and reused by all subclasses.

```php
class Animal {
    public \$name;

    public function eat() {
        echo "Eating...";
    }
}

class Dog extends Animal {
    public function bark() {
        echo "Barking!";
    }
}

\$dog = new Dog();
\$dog->name = "Buddy";
\$dog->eat(); // Outputs: Eating...
\$dog->bark(); // Outputs: Barking!
```

### Key Points:
- The child class automatically inherits all **public** and **protected** properties and methods.
- Inheritance improves code reuse and organizes related functionalities into hierarchical structures.

---

## Extending Classes

### Definition:
The process of creating a subclass that inherits the properties and methods of a parent class is known as extending a class.

### Explanation:
By extending a class, a subclass gains the behaviors of the parent class but can also have additional features or override existing ones.

```php
class Vehicle {
    public function drive() {
        echo "Driving...";
    }
}

class Car extends Vehicle {
    public function honk() {
        echo "Honking!";
    }
}

\$car = new Car();
\$car->drive(); // Outputs: Driving...
\$car->honk(); // Outputs: Honking!
```

### Key Points:
- The `extends` keyword is used to indicate inheritance.
- The subclass can have its own methods or override the parent’s methods.

---

## Using the `parent` Keyword

### Definition:
The `parent` keyword is used in a child class to call methods or access properties from the parent class that may be overridden in the child class.

### Explanation:
When a child class overrides a parent method, it can still access the original method in the parent class using `parent::methodName()`. This is helpful when you want to extend the behavior of the parent method rather than completely replace it.

```php
class Human {
    public function speak() {
        echo "Speaking...";
    }
}

class Man extends Human {
    public function speak() {
        parent::speak(); // Call the parent class method
        echo "Hello, I am a man!";
    }
}

\$man = new Man();
\$man->speak(); // Outputs: Speaking...Hello, I am a man!
```

### Key Points:
- `parent::methodName()` calls the parent’s method from a child class.
- This allows you to reuse the parent’s logic and add extra functionality in the child class.

---

## Method Overriding

### Definition:
Method overriding occurs when a child class defines a method with the same name as a method in its parent class, replacing the parent’s method with its own implementation.

### Explanation:
Overriding is a powerful feature that allows subclasses to provide specific implementations for methods that are shared across the hierarchy. It allows polymorphism, where a child class can behave differently while sharing the same interface as the parent.

```php
class Animal {
    public function sound() {
        echo "Some sound";
    }
}

class Dog extends Animal {
    public function sound() {
        echo "Barking!";
    }
}

\$animal = new Animal();
\$animal->sound(); // Outputs: Some sound

\$dog = new Dog();
\$dog->sound(); // Outputs: Barking!
```

### Key Points:
- Overriding allows subclasses to change the behavior of methods inherited from the parent.
- You can still call the parent method using the `parent` keyword.

---

## Multiple Inheritance Alternatives (Using Traits)

### Definition:
PHP does not support multiple inheritance (a class cannot extend more than one class). Instead, PHP provides **Traits** as an alternative to achieve similar functionality by allowing code reuse across multiple classes.

### Explanation:
Traits are like small chunks of reusable code that you can include in multiple classes without the need to inherit from a base class. A class can use one or more traits, and it will inherit the methods defined in those traits.

```php
trait CanFly {
    public function fly() {
        echo "Flying!";
    }
}

trait CanSwim {
    public function swim() {
        echo "Swimming!";
    }
}

class Bird {
    use CanFly;
}

class Fish {
    use CanSwim;
}

class Duck {
    use CanFly, CanSwim;
}

\$bird = new Bird();
\$bird->fly(); // Outputs: Flying!

\$fish = new Fish();
\$fish->swim(); // Outputs: Swimming!

\$duck = new Duck();
\$duck->fly(); // Outputs: Flying!
\$duck->swim(); // Outputs: Swimming!
```

### Key Points:
- **Traits** provide a way to reuse methods across multiple classes without using inheritance.
- A class can use multiple traits, which makes it an alternative to multiple inheritance.
- Traits cannot define properties, only methods.

---

## Differences Between Inheritance and Traits

1. **Inheritance** is a direct relationship between a parent class and child class. A child class can only inherit from one parent class.
   
2. **Traits**, on the other hand, are a mechanism for sharing functionality between classes. A class can use multiple traits, which offers an alternative to multiple inheritance.

3. **Code Organization**:
   - Inheritance structures classes in a hierarchical manner.
   - Traits allow you to organize reusable methods that can be used across different unrelated classes.

4. **Usage**:
   - Inheritance is best used when classes have a clear "is-a" relationship (e.g., Dog is a type of Animal).
   - Traits are better when you want to share methods between classes that don't necessarily share a "parent-child" relationship.

```php
// Inheritance example
class ParentClass {
    // Code
}

class ChildClass extends ParentClass {
    // Inherits from ParentClass
}

// Trait example
trait ReusableMethod {
    public function someMethod() {
        // Code
    }
}

class SomeClass {
    use ReusableMethod;
    // Reuses methods from traits
}
```

---

## Conclusion

Inheritance and Traits are two powerful tools in PHP OOP that help with code reuse, but they serve different purposes. Inheritance creates a clear hierarchy between classes, while Traits allow for the flexible reuse of methods across different classes without the need for direct parent-child relationships.
