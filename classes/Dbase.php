<?php
/**
* Clase para la conexion a la base de datos
*/
class Dbase
{

    private $_db_host = 'localhost';
    private $_db_name = 'multilingual';
    private $_db_user = 'root';
    private $_db_password = 'rodrigo';

    private $_db_object = null;
    private $_db_driver_options = array();

    public $_db_last_statement;
    public $_affected_rows;
    public $_id;


    function __construct($dbconn = null)
    {
        $this->setProperties($dbconn);
        $this->connect();
    }

    public function setProperties($array=null)
    {
        if (!empty($array) && is_array($array) && count($array) == 4) {

            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    private function connect()
    {
        $this->setDriversOptions(array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ));
        try {

            $this->_db_object = new PDO (
                "mysql:dbname={$this->_db_name};host={$this->_db_host}",
                $this->_db_user,
                $this->_db_password,
                $this->_db_driver_options
                );

        } catch (PDOExeption $e) {
            $this->$e->getMessage();
            exit;
        }
    }

        public function setDriversOptions($options=null)
        {
            if (!empty($options)) {
                $this->_db_driver_options = $options;
            }
        }

        private function query($sql=null, $params=null)
        {
            if (!empty($sql)) {
                    $this->_db_last_statement = $sql;
            }

            if (!empty($_db_object) == null) {
                $this->connect();
            }

            try {

                $statement = $this->$_db_object->prepare($sql, $this->_db_driver_options);

                $params = Helper::makeArray($params);

                if (!$statement->execute($params) || $statement->errorCode() != '0000') {

                    $error = $statement->errorInfo();
                    throw new PDOException("Database error {$error[0]} : {$error[2]}, driver error  code is {$error[1]}");

                    exit;
                }

                return $statement;

            } catch (PDOExeption $e) {
                echo $this->formatExeption($e);
                exit;
            }


        }





    }
?>