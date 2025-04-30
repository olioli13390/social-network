<?php

class UserRepositorie extends Db
{
    private static function request($request, $params = [])
    {
        $result = self::getInstance()->prepare($request);
        $result->execute($params);
        return $result;
    }
    public static function getUsers()
    {
        $sql = "SELECT * from user";
        return self::request($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function postUser(User $user)
    {
        $sql = "INSERT INTO user (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)";
        $params = [
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword()
        ];
        return self::request($sql, $params);
    }

    public static function getUserByEmail($email)
    {
        $sql = "SELECT * from user WHERE email = :email";
        $params = [':email' => $email];
        $stmt = self::request($sql, $params);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return new User($userData['id'], $userData['nom'], $userData['prenom'], $userData['email'], $userData['password']);
        }
        return null;
    }
}
