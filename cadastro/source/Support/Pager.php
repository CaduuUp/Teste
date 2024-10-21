<?php

namespace Source\Support;

use CoffeeCode\Paginator\Paginator;

/**
 * FSPHP | Class Pager
 *
 * @author Robson V. Leite <cursos@upinside.com.br>
 * @package Source\Support
 */
class Pager extends Paginator
{
    /**
     * @param string|null $name
     * @param array|null $email
     * @param array|null $cpf
     * @param array|null $telefone
     * @param array|null $data_nasc
     * @param array|null $status
     */
    public function __construct(?string $name = null, ?array $email = null, ?array $cpf = null, ?array $telefone = null, ?array $data_nasc = null, ?array $status = null)
    {
        parent::__construct($name, $email, $cpf, $telefone, $data_nasc, $status);
    }
}