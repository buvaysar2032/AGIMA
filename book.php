<?php

// Создаем класс Book
class Book
{
    // Свойства класса
    public $title;
    public $author;
    public $year;
    public $price;

    // Конструктор класса
    public function __construct($title, $author, $year, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
    }

    // Метод для получения информации о книге
    public function getInfo()
    {
        return "Название: {$this->title}, Автор: {$this->author}, Год выпуска: {$this->year}, Цена: {$this->price}";
    }
}

// Создаем объекты класса Book с разными данными
$book1 = new Book("Три товарища", "Эрих Мария Ремарк", 1936, 500);
$book2 = new Book("Преступление и наказание", "Фёдор Достоевский", 1866, 700);
$book3 = new Book("1984", "Джордж Оруэлл", 1949, 600);

// Выводим информацию о каждой книге с использованием метода getInfo()
echo $book1->getInfo() . "<br>";
echo $book2->getInfo() . "<br>";
echo $book3->getInfo() . "<br>";