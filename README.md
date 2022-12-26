# Design Pattern 
* Design Pattern sử dụng nền tảng của lập trình hướng đối tượng, áp dụng các tính chất như tính kế thừa, hàm khởi tạo, tính đa hình, ... để làm nên những kiến trúc phần mềm đáp ứng cho project. Design Pattern giúp bạn giải quyết vấn đề một cách tối ưu nhất, cung cấp cho bạn các giải pháp trong lập trình OOP.

* **Phân loại:**

    * Creational Design Pattern: các mẫu này chuyên sử dụng cho khởi tạo đối tượng có thể kể đến như Singleton, Factory, Builder, Prototype...

    * Strutural Design Pattern: các mẫu liên quan đến cấu trúc, kết cấu các đối tượng, ví dụ Composite, Decorator, Facade, Adapter, Proxy...

    * Behavioral Design Pattern: các mẫu giải quyết các vấn đề về hành vi đối tượng như Strategy, Iterator, State, Observer...

    * Architectural Design Pattern: các mẫu liên quan đến kiến trúc ứng dụng: MVC, SOA (Service-Oriented Architecture), microservice...

## Singleton pattern

* Singleton pattern thuộc về Creational Design Pattern là một mẫu áp dụng cho việc khởi tạo đối tượng, áp dung pattern này khi ứng dụng của bạn muốn tạo ra một thực thể duy nhất từ một class và dùng chung nó cho nhiều trường hợp. Ví dụ, website cần một đối tượng kết nối đến database nhưng chỉ cần duy nhất một đối tượng cho toàn bộ ứng dụng, sử dụng Singleton Pattern sẽ giải quyết được vấn đề này.

* Singleton Pattern được sử dụng để bảo đảm rằng mỗi một lớp (class) chỉ có được một thể hiện (instance) duy nhất và mọi tương tác đều thông qua thể hiện này.

```php
class Config {
    static private $instance = NULL;
    private $settings = array();

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new Config();
        }
        return self::$instance;
    }
    
    public function set($index, $value) {
        $this->settings[$index] = $value;
    }
    
    public function get($index) {
        return $this->settings[$index];
    }
}

// Tạo một đối tượng Config
$config = Config::getInstance();
$config->set('database_connected', true);
echo '<p>$config["database_connected"]: ' . $config->get('database_connected') . '</p>'."\n";


$test = Config::getInstance();
echo '<p>$test["database_connected"]: ' . $test->get('database_connected') . '</p>'."\n";
```

## Factory

* Factory pattern cũng như Singleton pattern thuộc về dạng Creational Design Pattern, tuy nhiên có một chút khác biệt. Singleton pattern áp dụng để tạo và quản lý một đối tượng duy nhất của một class trong khi Factory pattern được sử dụng để có thể tạo ra nhiều đối tượng khác nhau từ nhiều class. 

* Factory Method định nghĩa một phương thức, nên được sử dụng để tạo các đối tượng thay vì gọi hàm dựng trực tiếp (toán tử new). Các lớp con có thể ghi đè phương thức này để thay đổi lớp đối tượng sẽ được tạo.

```php
class ShapeFactory {
    static function Create($type, array $sizes) {
        switch ($type) {
            case 'rectangle':
                return new Rectangle($sizes[0], $sizes[1]);
                break;
            case 'triangle':
                return new Triangle($sizes[0], $sizes[1], $sizes[2]);
                break;
        }  
    }
}
```

## Facade

* Facade Pattern là một trong những Pattern thuộc nhóm cấu trúc (Structural Pattern). Mẫu thiết kế này cung cấp một giao diện chung đơn giản thay cho một nhóm các giao diện có trong một hệ thống phức tạp. Hệ thống phức tạp này có thể là 1 thư viện (library), 1 framework, hay tập hợp các class phức tạp. Facade Pattern định nghĩa một giao diện ở một cấp độ cao hơn để giúp cho người dùng có thể dễ dàng sử dụng hệ thống này. Mục đích của Facade Pattern là che giấu sự phức tạp của hệ thống con đằng sau. Thông qua Facade các hoạt động trở nên dễ dàng hơn.

```php
namespace Caova\DesignPatternPhp\Facade;

class Facade
{
    protected $system1;
    protected $system2;

    public function __construct()
    {
        $this->system1 = new System1();
        $this->system2 = new System2();
    }

    public function operation()
    {
        $result = "Khởi tạo hệ thống:\n". "<br>";
        $result .= $this->system1->operation1(). "<br>";
        $result .= $this->system2->operation1(). "<br>";
        $result .= "Khởi động hệ thống:\n". "<br>";
        $result .= $this->system1->operationN(). "<br>";
        $result .= $this->system2->operationZ(). "<br>";
        return $result;
    }
}

class System1 {
    function operation1()
    {
        return "system1: sẵn sàng!\n";
    }

    function operationN()
    {
        return "system1: khởi động!\n";
    }
}

class System2 {
    public function operation1()
    {
        return "system2: sẵn sàng!\n";
    }

    public function operationZ()
    {
        return "system2: khởi động!\n";
    }
}
```
## Dependency Injection

* Dependency Injection là một phương pháp thiết kế phần mềm cho phép tránh các phụ thuộc mã

* Lợi ích khi dùng Dependency Injection:

    * Dễ test và viết Unit Test: Dễ hiểu là khi ta có thể Inject các dependency vào trong một class thì ta cũng dễ dàng “tiêm” các mock object vào class (được test) đó.

    * Dễ dàng thấy quan hệ giữa các object: Dependency Injection sẽ inject các object phụ thuộc vào các interface thành phần của object bị phụ thuộc nên ta dễ dàng thấy được các dependency của một object.

    * Dễ dàng hơn trong việc mở rộng các ứng dụng hay tính năng.

    * Giảm sự kết dính giữa các thành phần, tránh ảnh hưởng quá nhiều khi có thay đổi nào đó.

```php
<?php
namespace Caova\DesignPatternPhp\DependencyInjection;

class DependencyInjection {
    private $author;
    private $question;
    
    public function __construct($question, Author $author) {
        $this->author = $author;
        $this->question = $question;
    }

    public function __toString() {
        return $this->author . " " . $this->question;
    }

    public function getAuthor() {
        return $this->author;
    }
    
    public function getQuestion() {
        return $this->question;
    }
}

class Author {
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString() {
        return $this->lastName . " " . $this->firstName;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    
    public function getLastName() {
        return $this->lastName;
    }
}

$dependencyInjection = new DependencyInjection("Tại sao ??", new Author("sơn", "cao"));
echo $dependencyInjection;
?>
```

## Builder

* Builder pattern cho phép lập trình viên tạo ra những đối tượng phức tạp nhưng chỉ cần thông qua các câu lệnh đơn giản để tác động nên các thuộc tính của nó.

* Builder pattern có lợi khi:

    * Muốn thay đổi thiết kế cho việc lồng nhau của các hàm khởi tạo.
    * Cần tạo ra một đối tượng phức tạp, một đối tượng mà thuật toán để tạo tạo lập các thuộc tính là độc lập đối với các thuộc tính khác.

## Observer

* Observer Pattern là một mẫu thiết kế thuộc nhóm Behavioral Pattern.

* Định nghĩa mối phụ thuộc một - nhiều giữa các đối tượng để khi mà một đối tượng có sự thay đổi trạng thái, tất cả các thành phần phụ thuộc của nó sẽ được thông báo và cập nhật một cách tự động.

* Một đối tượng có thể thông báo đến một số lượng không giới hạn các đối tượng khác.

* **Sử dụng Observer Patern khi chúng ta muốn**:

    * Sự thay đổi trạng thái ở 1 đối tượng cần được thông báo đến các đối tượng khác mà không phải giữ chúng liên kết quá chặt chẽ.

    * Cần mở rộng dự án với ít sự thay đổi nhất.

    * Khi abstraction có 2 khía cạnh, cái này phụ thuộc cái kia. Đóng gói các khía cạnh này trong các đối tượng khác nhau cho phép bạn thay đổi và tái sử dụng chúng độc lập.

    * Khi thay đổi một đối tượng yêu cầu việc thay đổi đến các đối tượng khác, và bạn không biết số lượng đối tượng cần thay đổi.

    * Khi một đối tượng thông báo các đối tượng khác mà không cần biết đối tượng đó là gì hay nói cách khác là tránh tính liên kết chặt chẽ.

* **Ưu điểm**

    * Đảm bảo nguyên tắc Open/Closed Principle (OCP): Cho phép thay đổi Subject và Observer một cách độc lập. Chúng ta có thể tái sử dụng các Subject mà không cần tái sử dụng các Observer và ngược lại. Nó cho phép thêm Observer mà không sửa đổi Subject hoặc Observer khác.

    * Thiết lập mối quan hệ giữa các objects trong thời gian chạy.

    * Sự thay đổi trạng thái ở 1 đối tượng có thể được thông báo đến các đối tượng khác mà không phải giữ chúng liên kết quá chặt chẽ.

    * Không giới hạn số lượng Observer.

* **Nhược điểm**

    * Unexpected update: Bởi vì các Observer không biết về sự hiện diện của nhau, nó có thể gây tốn nhiều chi phí của việc thay đổi Subject.

    * Subscriber được thông báo theo thứ tự ngẫu nhiên.

```php
<?php
interface Observer
{
	public function update(User $user);
}

interface Subject
{
	public function attach(Observer $observer);
	public function detach(Observer $observer);
	public function notify();
}

class SendEmail implements Observer{
    public function update(User $user)
    {
        $data = $user->getData();
        echo "email " . $user->email ." đã được gửi! <br>";
    }
}

class Login implements Observer{
    public function update(User $user)
    {
        $data = $user->getData();
        echo "email " . $user->email ." đã được đăng nhập! <br>";
    }
}

class User implements Subject {
    public string $name;
    public int $age;
    public string $email;
    public string $password;
    public $data;

	public function __construct($name, $age)
	{
		$this->name = $name;
		$this->age = $age;
        $this->data = array();
	}

	public function attach(Observer $observer)
	{
		$isContain = array_search($observer, $this->data);
        if ($isContain === false) {
            $this->data[] = $observer;
        }
	}

	public function detach(Observer $observer)
	{
      foreach($this->data as $key => $val) {
        if ($val == $observer) {
          unset($this->data[$key]);
        }
      }
    }
    
    public function notify() {
	    foreach($this->data as $observer) {
            //dd($this);
	     	$observer->update($this);
	    }
    }

    public function login($email, $password)
    {
    	$this->email = $email;
    	$this->password = $password;
    	echo "Nguoi dung dang dang nhap voi email: " . $email . " mat khau: " . $password . "<br>";
    	$this->notify();
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}

$user = new User("cao sơn", 21);
$login = new Login();
$user->attach(new SendEmail());
$user->attach($login);
$user->login("caoson@gmail.com", "12345678");
// $user->detach($login);
$user->login('caovanson@gmail.com', '123');
?>
```