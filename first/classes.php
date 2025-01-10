<?php

declare(strict_types=1);

class Person {
  public string $name;
  public int $age;

  public function __construct(
    // public string $name, public int $age
    string $name, int $age
  ) {
    $this->name = $name;
    $this->age = $age;
  }

  public function introduce(): string {
    return "Hello, my name is $this->name and I am $this->age years old.";
  }
}

$person1 = new Person("Alice", 30);
$person2 = new Person("Piotr", 37);

class Employee extends Person {
  public function __construct(
    public string $name, 
    public int $age,
    public string $position
  ) {}
  
  public function introduce(): string {
    return parent::introduce() . "I work as a {$this->position}.";
  }
}

$people = [
  new Employee("Jerry", 45, "Manager"),
  $person1,
  $person2
];

function introduce(Person $person): void {
  echo $person->introduce() . "\n";
}

foreach ($people as $person) {
  introduce($person);
}

class BankAccount {
  private float $balance = 0;

  public function getBalance(): float {
    return $this->balance;
  }

  public function deposit(float $amount): bool {
    if (0 > $amount) return false;
    $this->balance += $amount;
    return true;
  }

  public function withdraw(float $amount): bool {
    if (0 > $amount) return false;
    $this->balance -= $amount;
    return true;
  }
}

$account = new BankAccount();
// $account->balance = 400; // throw an error

var_dump(
  $account->deposit(1000),
  $account->withdraw(500),
  $account->getBalance()
);

class MathUtils {
  public static float $pi = 3.14159;

  public static function square(float $num): float {
    return $num * $num;
  }
}

var_dump(
  MathUtils::$pi,
  MathUtils::square(4)
);

class Connection {
  private static $instance = null;
  private function __construct() {}

  public static function singleton() {
    if (null === Connection::$instance) {
      Connection::$instance = new Connection();
    }

    return Connection::$instance;
  }
}

$connection = Connection::singleton();

interface PaymentProcessor {
  public function processPayment(float|int $amount): bool;
  public function refundPayment(float|int $amount): bool;
}

// abstract class PaymentProcessor {
//   abstract public function processPayment(float|int $amount): bool;
//   abstract public function refundPayment(float|int $amount): bool;
// }

abstract class OnlinePaymentProcessor implements PaymentProcessor {
   public function __construct(
    protected readonly string $apiKey,
   ) {}

   abstract protected function validateApiKey(): bool;
   abstract protected function executePayment(float|int $amount): bool;
   abstract protected function executeRefund(float|int $amount): bool;
   

   public function processPayment(float|int $amount): bool {
    if (!$this->validateApiKey()) {
      throw new Exception("Invalid API Key");
    }
    return $this->executePayment($amount);
   }
   public function refundPayment(float|int $amount): bool {
    if (!$this->validateApiKey()) {
      throw new Exception("Invalid API Key");
    }
    return $this->executeRefund($amount);
   }
}

final class StripeProcessor extends OnlinePaymentProcessor {
  protected function validateApiKey(): bool {
    return strpos($this->apiKey, "sk_") === 0;
  }

  protected function executePayment(float|int $amount): bool {
    echo "Processing Stripe payment of $amount\n";
    return true;
  }

  protected function executeRefund(float|int $amount): bool {
    echo "Processing Stripe refund of $amount\n";
    return true;
  }
}
final class PayPalProcessor extends OnlinePaymentProcessor {
  protected function validateApiKey(): bool {
    return strlen($this->apiKey) === 32;
  }

  protected function executePayment(float|int $amount): bool {
    echo "Processing PayPal payment of $amount\n";
    return true;
  }

  protected function executeRefund(float|int $amount): bool {
    echo "Processing PayPal refund of $amount\n";
    return true;
  }
}

final class CashPaymentProcessor implements PaymentProcessor {
  public function processPayment(float|int $amount): bool {
    echo "Processing Cash payment of $amount\n";
    return true;
  }
  public function refundPayment(float|int $amount): bool {
    echo "Processing Cash refund of $amount\n";
    return true;
  }
}

class OrderProcess {
  public function __construct(
    private PaymentProcessor $paymentProcessor
  ) {}

    public function processOrder(float|int $amount): bool {
      if($this->paymentProcessor->processPayment($amount)){
        echo "Order processed successfully\n";
        return true;
      }
      echo "Order processed failed\n";
      return false;
    }

    public function refundOrder(float|int $amount): bool {
      if($this->paymentProcessor->refundPayment($amount)){
        echo "Order refund successfully\n";
        return true;
      }
      echo "Order refund failed\n";
      return false;
    }
}

$stripeProcessor = new StripeProcessor("sk_test");
$paypalProcessor = new PayPalProcessor("valid_paypal_api_key_32charslong");
$cashProcessor = new CashPaymentProcessor();

$stripeOrder = new OrderProcess($stripeProcessor);
$paypalOrder = new OrderProcess($paypalProcessor);
$cashOrder = new OrderProcess($cashProcessor);

$stripeOrder->processOrder(100.00);
$paypalOrder->processOrder(150.00);
$cashOrder->processOrder(50.00);

$stripeOrder->refundOrder(25.00);
$paypalOrder->refundOrder(50.00);
$cashOrder->refundOrder(10.00);

interface Logger {
  public function log(string $message): void;
}

trait Loggable {
  public function log(string $message): void {
    echo "Logging: $message\n";
  }
}

class User implements Logger {

  use Loggable;

  public function __construct(
    public string $name
  ) {}

  public function save() {
    $this->log("User {$this->name} saved");
  }
}

$user = new User("Piotr");
$user->save();

enum DaysOfWeek {
  case MONDAY;
  case TUESDAY;
  case WEDNESDAY;
  case THURSDAY;
  case FRIDAY;
  case SATURDAY;
  case SUNDAY;
}

enum Colour: string {
  case RED = "#FF0000";
  case GREEN = "#00FF00";
  case BLUE = "#0000FF";
}

echo Colour::RED->value."\n";

function isWeekend(DaysOfWeek $day):bool {
  return $day === DaysOfWeek::SATURDAY || $day === DaysOfWeek::SUNDAY;
}

$today = DaysOfWeek::WEDNESDAY;
if ($today === DaysOfWeek::WEDNESDAY) {
  echo "It is wednesday!\n";
}

echo (isWeekend(DaysOfWeek::MONDAY) ? "Yes" : "No") . "\n";
