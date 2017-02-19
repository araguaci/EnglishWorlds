<?php
   /**
    * Database management / access class: basic abstraction
    *
    * @author Salim Djerbouh
    * @version 0.1
    */
    class Mysqldb {
    /**
    * Allows multiple database connections
    * each connection is stored as an element in the array, and the active connection is maintained in a variable (see below)
    */
    private $connections = array();
    /**
    * Tells the DB object which connection to use
    * setActiveConnection($id) allows us to change this
    */
    private $activeConnection = 0;
    /**
    * Queries which have been executed and the results cached for later, primarily for use within the template engine
    */
    private $queryCache = array();
    /**
    * Data which has been prepared and then cached for later usage, primarily within the template engine
    */
    private $dataCache = array();
    /**
    * Number of queries made during execution process
    */
    private $queryCounter = 0;
    /**
    * Record of the last query
    */
    private $last;
    /**
    * Reference to the registry object
    */
    private $registry;
    /**
    * Construct our database object
    */
    public function __construct(Registry $registry) {
      $this->registry = $registry;
    }
     /**
      * Create a new database connection
      * @param String database hostname
      * @param String database username
      * @param String database password
      * @param String database we are using
      * @return int the id of the new connection
      */
    public function newConnection($host, $user, $password, $database){
      $this->connections[] = new mysqli($host, $user, $password, $database);
      $connection_id = count($this->connections) - 1;
      if (mysqli_connect_errno()) {
        trigger_error('Error connecting to host. ' .$this->connections[$connection_id]->error, E_USER_ERROR);
      }
      return $connection_id;
    }
    /**
     * Change which database connection is actively used for the next operation
     * @param int the new connection id
     * @return void
     */
    public function setActiveConnection(int $new) {
      $this->activeConnection = $new;
    }
    /**
     * Execute a query string
     * @param String the query
     * @return void
     */
    public function executeQuery($queryStr){
      if (!$result = $this->connections[$this->activeConnection]->query($queryStr)) {
        trigger_error('Error executing query: ' . $queryStr . ' - '.$this->connections[$this->activeConnection]->error, E_USER_ERROR);
      } else {
        $this->last = $result;
      }
    }
    /**
     * Get the rows from the most recently executed query, excluding cached queries
     * @return array
     */
    public function getRows(){
      return $this->last->fetch_array(MYSQLI_ASSOC);
    }
?>
