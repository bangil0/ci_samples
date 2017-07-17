<?php
class Install_Database {

    private $_mysqli;


    private function _connect_to_db($data) {
        // Connect to the database
        $mysqli = new mysqli($data['hostname'], $data['username'], $data['password'], $data['database'], $data['dbport']);
        // Check for errors
        if(mysqli_connect_errno()) {
            return false;
        }


        return $mysqli;
    }

    // Function to create the tables and fill them with the default data
    public function create_tables($data)
    {

        if ($this->_mysqli = $this->_connect_to_db($data)) {
            // Open the default SQL file
            $query = file_get_contents('cim310.sql');

            // Execute a multi query
            $this->_mysqli->multi_query($query);
            // Close the connection
            $this->_mysqli->close();
            return true;
        }

        return false;

    }

    /*public function create_administrator($data) {
        // Connect to the database
        $this->_mysqli = $this->_connect_to_db($data);

        // Execute a multi query
        $this->_mysqli->multi_query($query);
        // Close the connection
        $this->_mysqli->close();
        return true;
    }*/
}