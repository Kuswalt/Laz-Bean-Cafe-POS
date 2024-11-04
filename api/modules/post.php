<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

class Post {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($data) {
        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        // Check if username already exists
        $query = $this->conn->prepare('SELECT id FROM users WHERE username = ?');
        $query->bind_param('s', $username);
        $query->execute();
        $query->store_result();

        if ($query->num_rows > 0) {
            return ['status' => false, 'message' => 'Username already exists'];
        } else {
            // Insert new user
            $query = $this->conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
            $query->bind_param('ss', $username, $password);
            if ($query->execute()) {
                return ['status' => true, 'message' => 'User registered successfully'];
            } else {
                return ['status' => false, 'message' => 'Registration failed'];
            }
        }
    }

    public function loginUser($data) {
        $username = $data['username'];
        $password = $data['password'];

        // Check user credentials
        $query = $this->conn->prepare('SELECT password FROM users WHERE username = ?');
        $query->bind_param('s', $username);
        $query->execute();
        $query->store_result();
        $hashed_password = '';
        $query->bind_result($hashed_password);

        if ($query->fetch()) {
            if (password_verify($password, $hashed_password)) {
                return ['status' => true, 'message' => 'Login successful'];
            }
        }

        return ['status' => false, 'message' => 'Invalid username or password'];
    }
}

// Usage example
$conn = new mysqli('localhost', 'username', 'password', 'database');
$post = new Post($conn);

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $action = $input['action'];

    if ($action === 'register') {
        echo json_encode($post->registerUser($input));
    } elseif ($action === 'login') {
        echo json_encode($post->loginUser($input));
    } else {
        echo json_encode(['error' => 'Invalid action']);
    }
}

$conn->close();
?>