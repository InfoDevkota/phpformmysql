<?php

/**
 * Class to connect to Database with PDO Driver
 *
 * @author José Luis Cortés <jluis.cortes.cuevas@gmail.com> @lscortesc
 */
class Connection
{
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
    private $pass;

    /**
     * @var string
     */
    private $dbname;

    /**
     * @var PDO
     */
    private $connection;

    /**
     * Connection constructor.
     *
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string $dbname
     * @param bool $connect
     */
    public function __construct(
        $host = '',
        $user = '',
        $pass = '',
        $dbname = ''
    )
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->pass     = $pass;
        $this->dbname   = $dbname;

        if (
            $host != '' &&
            $user != '' &&
            $pass != '' &&
            $dbname != ''
        ) {
            $this->connect();
        }
    }

    /**
     * Get Connection Host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set Host to Connect
     *
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * Get Connection User
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set User to Connect
     *
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Set Pass to Connection
     *
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * Get Database Name
     *
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * Set Database Name
     *
     * @param string $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * Connect to Database
     *
     * @return void
     */
    public function connect()
    {
        $dsn = "mysql:dbname=$this->dbname;host=$this->host";

        try {
            $this->connection = new PDO(
                $dsn,
                $this->user,
                $this->pass
            );

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Run Query Statement
     *
     * @param $sql
     * @return PDOStatement
     */
    public function query($sql)
    {
        return $this->connection->query($sql);
    }
}