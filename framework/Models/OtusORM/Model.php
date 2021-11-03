<?php
namespace Otus\Mvc\Models\OtusORM;
use PDO;

abstract class Model
{
    private static array $config = [
        'type' => 'mysql',
        'host' => 'db',
        'db' => 'mvc',
        'user' => 'root',
        'password' => 'root'
    ];

    private static $connectonInstance;

    private static function getInstance() {
        if(self::$connectonInstance === null)
        {
            self::$connectonInstance = new PDO(sprintf("%s:host=%s;dbname=%s",
                                                        self::$config['type'],
                                                        self::$config['host'],
                                                        self::$config['db']),
                self::$config['user'],
                self::$config['password'],
                [
                    // При возврате результатов запроса - возвращать в виде ассоциативного массива
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
                ]);
        }
        return self::$connectonInstance;
    }

    public function Model()
    {
        self::getInstance();
    }

    protected static $table;

    private static function getTableName() {
        return static::$table;
    }

    public static function get($parameter, $value)
    {
        $modelName = static::class;
        $model = new $modelName();
        $tableName = self::getTableName();
        $sql = "SELECT * FROM $tableName where $parameter = ? limit 1";
        $statement = self::getInstance()->prepare($sql);
        $statement->execute([$value]);
        $result = $statement->fetchAll();
        if($statement->rowCount() === 0)
            return;
        foreach ($result[0] as $i => $v)
        {
            $model->{$i} = $v;
        }
        $model->isInserted = true;
        return $model;
    }

    private $isInserted = false;

    public function save()
    {
        $parameters = get_object_vars($this);
        unset($parameters['isInserted']);
        $tableName = self::getTableName();

        if($this->isInserted)
        {
            $params = array_keys($parameters);
            $values = array_values($parameters);
            $values[] = array_shift($values);
            $update = "";
            unset($params[0]);
            foreach ($params as $key)
            {
                $update .= "$key = ?,";
            }
            $update = substr($update,0,-1);
            $query = "update $tableName set $update where id = ?";
            $statement = self::getInstance()->prepare($query);
            $statement->execute($values);
        } else {
            $params = array_keys($parameters);
            $templ = substr(str_repeat('?,',sizeof($params)),0,-1);
            $columns = implode(',',$params);
            $values = array_values($parameters);
            $query = "insert into $tableName ($columns) values ($templ)";
            $statement = self::getInstance()->prepare($query);
            $statement->execute($values);
            $this->id = self::getInstance()->lastInsertId();
        }
    }

    public function delete()
    {
        $modelName = static::class;
        $model = new $modelName();
        $tableName = self::getTableName();
        $sql = "DELETE FROM $tableName where id = ?";
        $statement = self::getInstance()->prepare($sql);
        $statement->execute([$this->id]);
    }
}
