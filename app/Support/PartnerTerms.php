<?php

namespace App\Support;

class PartnerTerms
{
    public static function document(): array
    {
        return json_decode(file_get_contents(resource_path('content/channel-partner-terms.json')), true, 512, JSON_THROW_ON_ERROR);
    }

    public static function version(): string
    {
        return self::document()['version'];
    }
}
