<?php
namespace App\Exceptions;

use Exception;

class UserException extends Exception {
    private $type;

    public function __construct($message = "Utilisateur inconnue", $code = 0, $type = "unknown")
    {
        parent::__construct($message, $code);
        $this->setType($type);
    }

    public function getType() {
        return $this->type;
    }
    public function setType($values) {
        $this->type = $values
    }

}
?>
