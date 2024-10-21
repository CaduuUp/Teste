<?php

namespace Source\Models\CafeApp;

use Source\Core\Model;
use Source\Models\User;

/**
 * Class AppWallet
 * @package Source\Models\CafeApp
 */
class AppWallet extends Model
{
    /**
     * AppWallet constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["id"], ["name", "email", "cpf", "telefone", "data_nasc"]);
    }

    /**
     * @param User $user
     * @return AppWallet
     */
    public function start(User $user)
    {
        if (!$this->find("name = :name", "name={$user->id}")->count()) {
            $this->user = $user->id;
            $this->save();
        }
        return $this;
    }
}