<?php

namespace Freekattema\AdvancedCustomFieldsHelper\FieldTypes;

final class AcfImage extends AcfFieldType {
    function get_additional(): array
    {
        return [
            'return_format' => 'array',
        ];
    }

    function get_type(): string
    {
        return 'image';
    }
}