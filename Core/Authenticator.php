<?php

namespace Core;

class Authenticator
{
    protected $conn;

    public function __construct()
    {
        $this->conn = App::resolve(Database::class);
    }

    public function attempt($user_name, $password)
    {
        $user = $this->conn->query('SELECT * FROM users WHERE user_name = :user_name', ['user_name' => $user_name])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $token = $this->generateToken();
                $this->updateAuthenticationToken($user, $token);

                return [
                    'status' => 200,
                    'token' => $token,
                    'user' => [
                        'id' => $user['id'],
                        'name' => $user['user_name'],
                    ]
                ];
            }
            return [
                'status' => 422,
                'message' => "Invalid Credential!",
            ];
        }
        return [
            'status' => 422,
            'message' => "There is no user with this data!",
        ];
    }

    public function isAuthenticated()
    {
        // Check if the user is authenticated based on the token in the request
        $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
        $token = str_replace('Bearer ', '', $token);

        // Query the database to check if the user exists
        return $this->conn->query('SELECT id, api_token FROM users WHERE api_token = :api_token', ['api_token' => $token])->find();
    }

    protected function updateAuthenticationToken($user, $token)
    {
        $this->conn->query( "UPDATE users SET api_token='$token' WHERE id='{$user['id']}'" );
    }

    protected function generateToken()
    {
        return bin2hex(random_bytes(32)); // Generate a random token
    }
}