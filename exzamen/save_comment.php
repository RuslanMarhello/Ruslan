<?php
// Подключение к MongoDB
$mongoClient = new MongoDB\Client('mongodb://localhost:27017');

// Выбор базы данных и коллекции
$database = $mongoClient->selectDatabase('my_database');
$collection = $database->selectCollection('my_collection');

// Получение данных из POST-запроса
$name = $_POST['name'];
$email = $_POST['email'];

// Создание документа для вставки в коллекцию
$document = [
  'name' => $name,
  'email' => $email
];

// Вставка документа в коллекцию
$result = $collection->insertOne($document);

if ($result->getInsertedCount() > 0) {
  echo 'Данные успешно сохранены в MongoDB.';
} else {
  echo 'Произошла ошибка при сохранении данных в MongoDB.';
}
?>
