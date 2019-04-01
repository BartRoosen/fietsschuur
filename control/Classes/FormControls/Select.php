<?php

namespace Classes\FormControls;

class Select
{
    const SELECT         = '%s<select class="%s" name="%s" %s>%s</select>';
    const OPTIONS        = '<option value="%s" %s>%s</option>';
    const EMPTY_OPTION   = '<option></option>';
    const SELECTED       = 'selected';
    const LABEL          = '<label>%s</label>';
    const DATA_ATTRIBUTE = 'data-%s="%s"';

    /**
     * @param array $attributes
     *
     * @return string
     */
    public function createSelect(array $attributes)
    {
        $name = $optionsHtml = $label = $class = $dataAttribute = '';

        $classes       = ['form-control'];
        $selectedValue = $emptyOption = false;
        $options       = [];
        if (isset($attributes['name'])) {
            $name = $attributes['name'];
        }

        if (isset($attributes['options']) && is_array($attributes['options'])) {
            $options = $attributes['options'];
        }

        if (isset($attributes['empty_option']) && is_bool($attributes['empty_option'])) {
            $emptyOption = $attributes['empty_option'];
        }

        if (isset($attributes['selected'])) {
            $selectedValue = $attributes['selected'];
        }

        if (isset($attributes['label'])) {
            $label = sprintf(self::LABEL, $attributes['label']);
        }

        if (isset($attributes['class']) && is_array($attributes['class'])) {
            foreach ($attributes['class'] as $value) {
                $classes[] = $value;
            }
        }
        $class = implode(' ', $classes);

        if (isset($attributes['dataAttribute']) && is_array($attributes['dataAttribute'])) {
            $da            = $attributes['dataAttribute'];
            $dataAttribute = sprintf(self::DATA_ATTRIBUTE, $da['key'], $da['value']);
        }

        if ($emptyOption) {
            $optionsHtml .= self::EMPTY_OPTION;
        }

        foreach ($options as $key => $value) {
            $selected = '';
            if ((int) $selectedValue === (int) $key) {
                $selected = self::SELECTED;
            }

            $optionsHtml .= sprintf(self::OPTIONS, $key, $selected, $value);
        }

        return sprintf(self::SELECT, $label, $class, $name, $dataAttribute, $optionsHtml);
    }
}
