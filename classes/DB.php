<?php
// Пример классов в PHP. Благодаря нему мы можем упростить взаимодействие с базой и создавать сколько угодно подключений
// примеры его использования найдешь в других файлах

/**
 * Класс для работы с базой данных
 */
class DB {
    /**
     * @var string
     */
    private $host;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $dbName;
    /**
     * @var PDO
     */
    private $_pdo;

    /**
     * Возвращает подключение к базе или создает и возвращает если оно небыло инициарованно
     * @return PDO
     */
    public function getPDO(): PDO
    {
        if($this->_pdo !== null) return $this->_pdo;

        $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            return $this->_pdo = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Конструктор класса
     * @param $host
     * @param $user
     * @param $password
     * @param $dbName
     */
    public function __construct($host, $user, $password, $dbName) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbName = $dbName;

        // не подключаемся к базе заранее, чтобы не делать лишней нагрузки без надобности
    }

    /**
     * Выполнить SQL запрос, не возвращающий результатов
     * @param string $query
     * @param array $params
     * @return false|PDOStatement
     */
    public function query(string $query, array $params = []) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Выполнить SQL запрос, возвращающий несколько результатов
     * @param $query
     * @param $params
     * @return array|false
     */
    public function fetchAll(string $query, array $params = []) {
        $pdo = $this->getPDO();
        $stmt = $pdo->query($query, $params);
        return $stmt->fetchAll();
    }

    /**
     * Выполнить SQL запрос, возвращающий один результат
     * @param $query
     * @param $params
     * @return mixed
     */
    public function fetchOne(string $query, array $params = []) {
        $stmt = $this->query($query, $params);
        return $stmt->fetch();
    }

    /**
     * Возвращает ID, последнего вставленного элемента
     * @return false|string
     */
    public function lastInsertId() {
        $pdo = $this->getPDO();
        return $pdo->lastInsertId();
    }
}
