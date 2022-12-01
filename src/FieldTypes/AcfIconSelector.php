<?php

namespace Freekattema\AdvancedCustomFieldsHelper\FieldTypes;

use Freekattema\AdvancedCustomFieldsHelper\Traits\HasOptions;

class AcfIconSelector extends \Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfFieldType {
    use HasOptions;

    function get_additional(): array
    {
        return $this->get_options();
    }

    public function default_value(string $value)
    {
        $this->set_option('default_value', $value);
        return $this;
    }

    function get_type(): string
    {
        return 'font_awesome_selector';
    }
}