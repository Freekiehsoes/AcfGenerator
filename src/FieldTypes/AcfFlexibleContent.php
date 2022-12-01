<?php

namespace Freekattema\AdvancedCustomFieldsHelper\FieldTypes;

use ZigZagEngine\Classes\Logger;

final class AcfFlexibleContent extends AcfFieldType {
    /** @var AcfLayout[] */
    private array $layouts;

    function get_additional(): array
    {
        return [
            'layouts' => $this->get_layouts(),
        ];

    }

    private function get_layouts(): array
    {
        $output = [];

        foreach($this->layouts as $layout) {
            $output[$layout->get_key()] = $layout->to_array();
        }

        return $output;
    }

    function get_type(): string
    {
        return 'flexible_content';
    }

    public function add_layout(AcfLayout $layout): self
    {
        $this->layouts[] = $layout;
        return $this;
    }

    public function add_layouts(array $layouts): self
    {
        foreach ($layouts as $layout) {
            $this->add_layout($layout);
        }
        return $this;
    }
}