<?php
require_once 'DB.php';
class CRUD
{
    protected $db;
    protected $table;
    protected $fields;

    public function __construct()
    {
        $obj = new DB();
        $this->db = $obj->pdo;
        $this->fields = array_column($this->getFields(), 'Field');
    }

    public function create($data)
    {
        if($this->check_valid_api()) {
            // Setup query.
            $sql = "INSERT INTO $this->table (" . implode(',', $this->fields) . ") " .
                'VALUES (:' . implode(', :', $this->fields) . ')';
            // Prepare query.
            $statement = $this->db->prepare($sql);
            // Bind values.
            foreach ($this->getFields() as $field) {
                // Different filter and pdo type depending on wether the field is string or number.
                // Not fool proof, but a beginning.
                $filter = FILTER_SANITIZE_NUMBER_INT;
                $pdo_type = PDO::PARAM_INT;
                // If the field type starts with one of the array items, then it's probably a string.
                if (in_array(substr($field['Type'], 0, 4), ['varc', 'char', 'text'])) {
                    $filter = FILTER_SANITIZE_STRING;
                    $pdo_type = PDO::PARAM_STR;
                }
                $statement->bindValue($field['Field'], filter_var($data->{$field['Field']}, FILTER_SANITIZE_STRING), $pdo_type);
            }
            // Execute query and return result.
            return $statement->execute();
        }
    }

    public function get($id = null)
    {
        if($this->check_valid_api()) {
            // Setup query.
            $sql = "SELECT * FROM $this->table";
            $parameters = null;
            if ($id !== null) {
                // If caller has provided id, then let's just look for that one product.
                $sql .= " WHERE id = :table_id ";
                $parameters = ['table_id' => $id];
            }
            $statement = $this->db->prepare($sql);
            $statement->execute($parameters);
            // Return all posts.
            return $statement->fetchAll();
        }
    }

    public function getFields()
    {
        $fields = $this->db->query("SHOW COLUMNS FROM $this->table;")->fetchAll();
        return array_splice($fields, 1);
    }

    public function update($data)
    {
        if($this->check_valid_api()) {
            $id = null;
            if (isset($data->{'id'})) {
                $id = $data->{'id'};
            } else {
                return false;
            }
            // Setup query.
            $arr_fields = [];
            $sql = "UPDATE $this->table SET ";
            foreach ($data as $field_name => $field_value) {
                if ($field_name != 'id') {
                    $arr_fields[] = $field_name . " = '" . $field_value . "' ";
                }
            }
            $sql .= implode(', ', $arr_fields);
            $sql .= " WHERE id = :table_id ";
            // Prepare query.
            $statement = $this->db->prepare($sql);
            // Bind values.
            $statement->bindValue('table_id', $id, PDO::PARAM_STR);
            // Execute query and return result.
            return $statement->execute();
        } else {
            echo "API-KEY NOT VALID";
            return false;
        }
    }

    public function remove($data)
    {
      if($this->check_valid_api()) {
          $id = null;
          if (isset($data->{'id'})) {
              $id = $data->{'id'};
          } else {
              return false;
          }
          // Setup query.
          $arr_fields = [];
          $sql = "DELETE FROM $this->table WHERE id = :table_id";

          // Prepare query.
          $statement = $this->db->prepare($sql);
          // Bind values.
          $statement->bindValue('table_id', $id, PDO::PARAM_INT);
          // Execute query and return result.
          $statement->execute();
          return $statement->rowCount();
          
      } else {
          echo "API-KEY NOT VALID";
          return false;
      }
    }

    public function check_valid_api()
    {
        $valid_user = false;
        if (isset($_GET['apikey'])) {
            // Check if apikey is valid.
            $apikey = filter_input(INPUT_GET, 'apikey', FILTER_SANITIZE_STRING);
            var_dump($apikey);
            $sql = 'SELECT * FROM Admins WHERE APIKey = :apikey';
            $statement = $this->db->prepare($sql);
            $statement->bindValue('apikey', $apikey, PDO::PARAM_STR);
            $data = $statement->execute();

            var_dump($data);
            if ($data) {
                // Apikey is valid.
                $valid_user = true;
                $_SESSION['apikey'] = $apikey;
                return true;
            }
        }
        if (!$valid_user) {
            http_response_code(401);
            return false;
        }
    }
}


 ?>
