<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    protected array $availableIncludes = [
        'role'
    ];

    public function transform(User $user):array {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'role_id' => $user->role_id,
        ];
    }

    public function includeRole(User $user) {
        $role = $user->role;
        return $this->item($role, new RoleTransformer);
    }
}
