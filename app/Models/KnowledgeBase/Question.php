<?php

namespace App\Models\KnowledgeBase;

use Illuminate\Database\Eloquent\Model;
use App\Enums\KnowledgeBase\QuestionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => QuestionType::class,
    ];
}
