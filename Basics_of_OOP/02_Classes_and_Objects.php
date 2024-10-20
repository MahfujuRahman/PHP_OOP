<!-- 
#Classes and Objects : 

Class: A class is a blueprint or template for creating objects. It defines the properties (data) and methods (behavior) that the objects will have.

Object: An object is an instance of a class. It represents a real-world entity with properties and behavior. 
-->

<!-- Example 1: Creating a Class and Object in PHP -->
<?php
// Defining a 'Car' class
class Car
{
    // Properties (attributes)
    public $brand;
    public $color;

    // Method (behavior) to display car details
    public function showDetails()
    {
        echo "This car is a {$this->color} {$this->brand}.<br>";
    }
}

// Creating an instance (object) of the Car class
$myCar = new Car(); // Use the new keyword to create an instance of the class.
$myCar->brand = "Toyota";  // Assigning values to properties
$myCar->color = "Red"; // Accessing properties/methods: Use the arrow operator (->) to access them.

// Calling a method on the object
echo "Example 1: <br>";
$myCar->showDetails();  // Output: This car is a Red Toyota.
echo "<br>"; // For line break and readability
?>


<!-- Example 2: Creating Multiple Objects of the Same Class -->

<?php
class Dog
{
    public $name;
    public $breed;

    public function bark()
    {
        echo "{$this->name} is barking!<br>";
    }
}
echo "Example 2: <br>";
// Create objects (instances)
$dog1 = new Dog();
$dog1->name = "Rover";
$dog1->breed = "Labrador";
$dog1->bark();  // Output: Rover is barking!

$dog2 = new Dog();
$dog2->name = "Bella";
$dog2->breed = "Beagle";
$dog2->bark();  // Output: Bella is barking!
echo "<br>";
?>


<!-- Example 3: Constructors and Destructors -->
<!-- 
Constructor: A constructor is a special method that is automatically called when an object is created. It is commonly used to initialize properties.

Destructor: A destructor is a special method that is automatically called when an object is destroyed or goes out of scope. It is used to release resources like database connections or open files.
 -->

<?php
class Person
{
    public $name;

    // Constructor to initialize the name property
    public function __construct($name)
    {
        $this->name = $name;
        echo "Object created for {$this->name}.<br>";
    }

    // Destructor to perform cleanup
    public function __destruct()
    {
        echo "Object for {$this->name} is being destroyed.<br>";
    }

    // Method to greet the person
    public function greet()
    {
        echo "Hello, {$this->name}!<br>";
    }
}

// Create an instance of Person class
$person1 = new Person("John");
$person1->greet();  // Output: Hello, John!

// The destructor is automatically called at the end of the script or when object is destroyed
?>