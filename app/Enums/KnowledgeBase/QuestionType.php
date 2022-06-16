<?php

namespace App\Enums\KnowledgeBase;

use App\Enums\Traits\ExtendEnums;

enum QuestionType: string
{
    use ExtendEnums;

    case OWNER = "owner";
    case GUARANTOR = "guarantor";
}
