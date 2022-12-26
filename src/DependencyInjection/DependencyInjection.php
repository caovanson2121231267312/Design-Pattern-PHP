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