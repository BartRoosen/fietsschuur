<?php

namespace Classes\FormControls;

/**
 * Class Input
 *
 * @package Classes\FormControls
 */
class Input extends FormBuilder
{
    const INPUT_LABEL = '<label>%s</label>';
    const INPUT_HTML  = '%s<input type="%s" name="%s" value="%s" class="%s" id="%s"/>';

    public function createInput(array $attributes)
    {
        $type = $name = $value = $label = $class = $id = '';

        $classes = ['form-control'];

        if (isset($attributes['type']) && in_array($attributes['type'], self::INPUT_VALID_TYPES)) {
            $type = $attributes['type'];
        }

        if (isset($attributes['name'])) {
            $name = $attributes['name'];
        }

        if (isset($attributes['value'])) {
            $value = $attributes['value'];
        }

        if (isset($attributes['label'])) {
            $label = sprintf(self::INPUT_LABEL, $attributes['label']);
        }

        if (isset($attributes['class']) && is_array($attributes['class'])) {
            foreach ($attributes['class'] as $classValue) {
                $classes[] = $classValue;
            }
        }

        if (isset($attributes['id'])) {
            $id = $attributes['id'];
        }

        $class = implode(' ', $classes);

        return sprintf(self::INPUT_HTML, $label, $type, $name, (string) $value, $class, $id);
    }
}
