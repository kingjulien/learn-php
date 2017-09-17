<?php namespace Classes;

class User {

    public $id;
    public $meno;
    public $telefon;
    public $email;
    public $adresa;
    public $heslo;

    public function login($login, $pwd) {

      // select hash by login name
      $user = $this->getUserByLogin($login);
      if (!empty($user)) {
        $hash = $user->heslo; // tu je z DB zahashovane heslo
        if ($this->verifyPassword($pwd, $hash)) {
          $_SESSION['user'] = $user;
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }

    public function logout() {
      unset($_SESSION['user']);
    }

    public function isLoggedIn() {

      return isset($_SESSION['user']) && !empty($_SESSION['user']->id);
    }

    public function getLoggedUser() {

      return $_SESSION['user'];
    }

    public function add($userInfo) {
      global $db;
      $hash = $this->hashPassword($userInfo['heslo']);
      
      // insert into DB
      $sql = 'INSERT INTO `users`
        (email, telefon, meno, heslo, adresa)
        VALUES
        ( :email, :telefon, :meno,
          :heslo, :adresa )';
      $query = $db->prepare($sql);
      $query->execute(array(
        ':email' => $userInfo['email'],
        ':telefon' => $userInfo['telefon'],
        ':meno' => $userInfo['meno'] . ' ' . $userInfo['priezvisko'],
        ':adresa' => $userInfo['adresa'],
        ':heslo' => $hash,
      ));

      return true;
    }

    public function getUserByEmail($email) {
      global $db;
      $sql = 'SELECT * FROM `users` WHERE `email` = :email';
      $query = $db->prepare($sql);
      $query->execute(array(':email' => $email));

      return $query->fetchObject(__CLASS__);
    }

    public function hashPassword($pwd) {
      $hash = password_hash($pwd, PASSWORD_BCRYPT);

      return $hash;
    }

    public function verifyPassword($pwd, $hash) {

      return password_verify($pwd, $hash);
    }

    public function getUserById($userId) {
      global $db;
      $sql = 'SELECT * FROM `users` WHERE `id` = :id';
      $query = $db->prepare($sql);
      $query->execute(array(':id' => $userId));

      return $query->fetchObject(__CLASS__);
    }
}
