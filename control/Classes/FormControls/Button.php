<?php

namespace Classes\FormControls;

class Button extends FormBuilder
{
    const BUTTON_HTML = '<button type="%s" class="%s" id="%s">%s</button>';

    /**
     * @param array $attributes
     *
     * @return string
     */
    public function createButton(array $attributes)
    {
        $type = $class = $id = $caption = '';

        if (isset($attributes['type']) && in_array($attributes['type'], self::BUTTON_VALID_TYPES)) {
            $type = $attributes['type'];
        }

        if (isset($attributes['class'])) {
            $class = $attributes['class'];
        }

        if (isset($attributes['id'])) {
            $id = $attributes['id'];
        }

        if (isset($attributes['caption'])) {
            $caption = $attributes['caption'];
        }

        return sprintf(self::BUTTON_HTML, $type, $class, $id, $caption);
    }
}
