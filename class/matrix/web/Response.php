<?php //>

namespace matrix\web;

use matrix\utility\ValueObject;

class Response {

    use ValueObject;

    public function send() {
        return $this;
    }

}
