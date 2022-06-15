<?php

namespace App\Policies\KnowledgeBase;

use App\Models\Account\User;
use App\Models\KnowledgeBase\Question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        return true;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Question $question): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Question $question): bool
    {
        return true;
    }

    public function delete(User $user, Question $question): bool
    {
        return true;
    }

    public function restore(User $user, Question $question): bool
    {
        return true;
    }

    public function forceDelete(User $user, Question $question): bool
    {
        return true;
    }
}
