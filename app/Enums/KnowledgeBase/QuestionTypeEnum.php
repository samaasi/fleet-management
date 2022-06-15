<?php

namespace App\Enums\KnowledgeBase;

use App\Enums\Traits\ExtendEnums;

enum QuestionTypeEnum: string
{
    use ExtendEnums;

    case OWNER = "owner";
    case GUARANTOR = "guarantor";
}
