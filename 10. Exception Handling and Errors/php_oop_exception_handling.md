
# PHP OOP Concepts: Exception Handling and Errors

## 10. Exception Handling and Errors

### `try-catch` Blocks

#### Definition:
The `try-catch` block is used in PHP to handle exceptions. Code that may throw an exception is placed inside the `try` block, and the `catch` block is used to handle the exception if it occurs.

#### Explanation:
When an exception is thrown, the normal flow of the program is interrupted, and control is transferred to the nearest `catch` block that matches the exception type. You can catch multiple exception types or a general `Exception` to handle errors gracefully.

```php
try {
    // Code that may throw an exception
    $num = 5 / 0;
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
}
```

### Key Points:
- The `try` block contains code that may throw exceptions.
- The `catch` block handles the exception when it is thrown.

---

### Creating Custom Exception Classes

#### Definition:
In PHP, you can create custom exception classes by extending the built-in `Exception` class. This allows you to define specific types of exceptions that suit your application's needs.

#### Explanation:
Creating a custom exception class allows for more granular error handling, making it easier to identify and handle specific error scenarios in your code.

```php
class CustomException extends Exception {
    public function errorMessage() {
        return "Custom error: " . $this->getMessage();
    }
}

try {
    throw new CustomException("This is a custom exception!");
} catch (CustomException $e) {
    echo $e->errorMessage(); // Outputs: Custom error: This is a custom exception!
}
```

### Key Points:
- Custom exceptions allow for more precise error handling.
- Extend the `Exception` class to create custom exceptions and override methods as needed.

---

### Using `finally` in Exception Handling

#### Definition:
The `finally` block in PHP is used to execute code after the `try` and `catch` blocks, regardless of whether an exception was thrown or caught. It is typically used for cleanup tasks.

#### Explanation:
The `finally` block always executes, whether an exception is thrown or not. This makes it ideal for tasks like closing file handles or releasing resources.

```php
try {
    // Code that may throw an exception
    echo "Inside try block.";
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
} finally {
    echo "This always runs, no matter what.";
}
```

### Key Points:
- The `finally` block executes after the `try` and `catch` blocks, whether or not an exception is thrown.
- Use `finally` for cleanup tasks that need to run regardless of success or failure.

---

### Error vs Exception Handling

#### Definition:
Errors and exceptions are both used to handle abnormal conditions in PHP, but they are different in nature. **Errors** refer to issues that arise during the execution of the script, such as syntax errors or division by zero, while **exceptions** are objects that can be thrown and caught, providing a structured way to handle specific error conditions.

#### Explanation:
- **Errors**: Fatal issues that usually stop script execution (e.g., syntax errors, memory exhaustion).
- **Exceptions**: Represent unusual conditions that can be caught and handled by the program using `try-catch` blocks.

```php
// Error example: Division by zero
echo 5 / 0; // Fatal error: Division by zero

// Exception example
try {
    throw new Exception("This is an exception.");
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
}
```

### Key Points:
- **Errors** are low-level issues that generally halt script execution.
- **Exceptions** are high-level, more manageable events that can be handled with `try-catch` blocks.

---

### PHP `Throwable` Interface

#### Definition:
The `Throwable` interface in PHP is implemented by both the `Exception` and `Error` classes. It provides a unified way of handling both exceptions and errors in the `try-catch` block.

#### Explanation:
PHP 7 introduced the `Throwable` interface, allowing you to catch both errors and exceptions in a single block. This provides more flexibility in handling both fatal and non-fatal issues.

```php
try {
    // This would normally be an error
    echo 5 / 0;
} catch (Throwable $t) {
    echo "Caught Throwable: " . $t->getMessage();
}
```

### Key Points:
- `Throwable` is a base interface for both exceptions and errors.
- It provides a unified way to catch both errors and exceptions using a single `catch` block.

---

## Differences Between Error and Exception Handling

1. **Errors** are typically unrecoverable and stop script execution, while **Exceptions** provide a mechanism for handling issues without stopping the entire script.

2. **Error handling** is usually done by configuring PHP’s error reporting, while **Exception handling** is managed with `try-catch` blocks.

3. **Throwable** interface unifies the handling of both errors and exceptions starting from PHP 7, allowing them to be caught in a single block.

---

## Conclusion

Exception handling in PHP allows for structured, predictable ways to handle abnormal situations in your code, making it more robust and resilient to errors. By using `try-catch` blocks, creating custom exceptions, and leveraging the `Throwable` interface, PHP developers can manage both errors and exceptions effectively.
