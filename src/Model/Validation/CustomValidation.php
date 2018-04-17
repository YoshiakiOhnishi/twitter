<?php
namespace App\Model\Validation;
use Cake\Validation\Validation;

class CustomValidation extends Validation {
  /**
   * 緯度
   * @param string $value
   * @return bool
   */
    public function alphaNumeric2($check) {
        $_this =& Validation::getInstance();
        $_this->__reset();
        $_this->check = $check;
        if (is_array($check)) {
            $_this->_extract($check);
        }
        if (empty($_this->check) && $_this->check != '0') {
            return false;
        }
        $_this->regex = '/^[a-zA-Z0-9]+$/';
        return $_this->_check();
    }
}