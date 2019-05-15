
<?php
require_once 'DB.php';
class Admin
{
    public $db;
    public $is_logged_in = false;
    public $table = 'Admins';
    public $fields = null;

    // Kopplar upp mot DB och hämtar angiven tabells kolumnnamn.
    function __construct()
    {
        $obj = new DB();
        $this->db = $obj->pdo;
        $this->fields = array_column($this->getFields(), 'Field');
    }

    // Här returnerar vi kolumnnamnen och metainformation om de, men filtrerar
    // bort kolumner som innehåller känslig data.
    public function getFields()
    {
        $fields = $this->db->query("SHOW COLUMNS FROM $this->table;")->fetchAll();
        $filtered_fields = [];
        foreach($fields as $field) {
            if($field['Field'] !== 'id' && $field['Field'] !== 'APIKey') {
                $filtered_fields[]= $field;
            }
        }
        return $filtered_fields;
    }


    // Här skapar vi inputs för log-in sidan. Känns lite onödigt i efterhand.. :)
    public function createInputs()
    {
        $columns = array();
        foreach($this->fields as $field)
        {
            $columns [] = $field;
            if($field === 'Password') {
                echo "<div class=''><input type='password' placeholder='$field' name='$field'></div>";
            }
            elseif($field === 'email') {
                echo "<div class=''><input type='email' placeholder='$field' name='$field'></div>";
            }
                else {
                echo "<div class=''><input type='text' placeholder='$field' name='$field'></div>";
            }

        }
        return $columns;
    }

    // Här skapar vi data till tabellen.
    public function create($data = null)
    {
        // Setup query.
        $sql = "INSERT INTO $this->table (" . implode(',', $this->fields) . ") " .
            'VALUES (:' . implode(', :', $this->fields) . ')';
        // Prepare query.
        $statement = $this->db->prepare($sql);
        // Bind values.
        foreach ($this->fields as $field) {
            if($field !== 'APIKey') {
                if($field === 'Password') {
                    $pass = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
                    // Ser till så att lösenord innehåller minst 4 tecken.
                    if(strlen($pass) > 3) {
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $statement->bindValue($field, $hash, PDO::PARAM_STR);
                    } else {
                        echo "<h4>Password min 4 characters</h4>";
                        return false;
                    }
                } else {
                    $user = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
                    if(strlen($user) > 3) {
                        if(!$this->checkExist($user)) {
                            $statement->bindValue($field, $user, PDO::PARAM_STR);
                        } else {
                            echo "<h4>Username already exists!</h4>";
                            return false;
                        }
                    } else {
                        echo "<h4>Username min 4 characters.</h4>";
                        return false;
                    }
                }
            }
        }
        // Execute query and return result.
        return $statement->execute();
    }

    // ser om användarnamnet redan finns.
    protected function checkExist($username)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE username = '$username';")->fetchAll();
    }

    // Anropas när användaren vill logga in.
    public function login()
    {
        $user = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_MAGIC_QUOTES);
        $pass = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_MAGIC_QUOTES);
        $sql = "SELECT password, id
                FROM $this->table
                WHERE username = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $user);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);
        $hash = $result[0];
        $customerId = $result[1];
        $this->is_logged_in = password_verify($pass, $hash);

        // Lagrar användarens ID, användarnamn, och att den är inloggad.
        if($this->is_logged_in) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = "$user";
            $_SESSION['user_id'] = $customerId;
        }
        return $this->is_logged_in;
    }

    public function api_key_generator() {
        $user_id = $_SESSION['user_id'];
        $api_key = uniqid();
        if(!$this->db->query("SELECT * FROM $this->table WHERE APIKey = '$api_key';")->fetchAll()) {
            $sql = "UPDATE Admins SET APIKey = '$api_key' WHERE id = $user_id;";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();
        } else {
            echo "Try again m8";
        }
    }

    public function getKey()
    {
        $user_id = $_SESSION['user_id'];
        return $this->db->query("SELECT APIKey FROM $this->table WHERE id = $user_id;")->fetchColumn();
    }
}
