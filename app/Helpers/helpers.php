<?php

use App\Models\Translation;

function t(string $group, string $key): string
{
    return Translation::where('group', $group)
        ->where('key', $key)
        ->where('locale', app()->getLocale())
        ->value('value') ?? '';
}

function tf(string $group, string $key): string
{
    return Translation::where('group', $group)
        ->where('key', $key)
        ->where('locale', 'fr')
        ->value('value') ?? '';
}
