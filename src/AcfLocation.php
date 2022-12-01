<?php

namespace Freekattema\AdvancedCustomFieldsHelper;

use ZigZagEngine\Classes\Logger;

final class AcfLocation {
    public string $param;
    public string $operator;
    public string $value;

    private function __construct(string $param, string $operator, string $value) {
        $this->param = $param;
        $this->operator = $operator;
        $this->value = $value;
    }

    private static function create(string $param, string $operator, string $value): AcfLocation
    {
        return new AcfLocation($param, $operator, $value);
    }

    public static function post_type(string $post_type): AcfLocation
    {
        return self::create('post_type', '==', $post_type);
    }

    public static function page_template(string $template_name): ?AcfLocation
    {
        $templates = wp_get_theme()->get_page_templates();

        foreach($templates as $location => $name) {
            if ($name === $template_name) {
                return self::create('page_template', '==', $location);
            }
        }

        return null;
    }

    public static function options_page(string $slug = 'acf-options'): AcfLocation
    {
        return self::create('options_page', '==', $slug);
    }

    public static function options(): AcfLocation
    {
        return self::options_page();
    }

    public function to_array(): array
    {
        return [
            [
                'param' => $this->param,
                'operator' => $this->operator,
                'value' => $this->value,
            ]
        ];
    }
}