<?php

namespace EMS\FormBundle\Security;

class HashcashToken
{
    /** @var string */
    private $hash;
    /** @var string */
    private $nonce;
    /** @var string */
    private $data;
    /** @var string */
    private $token;

    public function __construct(string $header, string $token)
    {
        list($hash, $nonce, $data) = explode('|', $header);

        $this->hash = $hash;
        $this->nonce = $nonce;
        $this->data = $data;
        $this->token = $token;
    }

    public function isValid(int $difficulty): bool
    {
        if ($this->data !== $this->token) {
            return false;
        }

        if ('0' !== substr($this->hash, 0, 1)) {
            return false;
        }

        $data = ['difficulty' => $difficulty, 'data' => $this->data, 'nonce' => $this->nonce];

        return $this->hash === hash('sha256', \implode('|', $data));
    }
}
