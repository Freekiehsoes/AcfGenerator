<?php

namespace Freekattema\AdvancedCustomFieldsHelper\FieldTypes;

use Freekattema\AdvancedCustomFieldsHelper\Traits\HasOptions;

class AcfText extends \Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfFieldType {
    use HasOptions;

    function get_additional(): array
    {
        return $this->get_options();
    }

    public function default_value(string $value): AcfText
    {
        return $this->set_option('default_value', $value);
    }

    function get_type(): string
    {
        return 'text';
    }
}