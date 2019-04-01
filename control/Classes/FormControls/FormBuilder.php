<?php

namespace Classes\FormControls;

class FormBuilder
{
    const BUTTON_TYPE_SUBMIT = 'submit';
    const BUTTON_TYPE_BUTTON = 'button';
    const BUTTON_VALID_TYPES = [
        self::BUTTON_TYPE_SUBMIT,
        self::BUTTON_TYPE_BUTTON,
    ];

    const INPUT_TYPE_TEXT   = 'text';
    const INPUT_TYPE_DATE   = 'date';
    const INPUT_TYPE_PASS   = 'password';
    const INPUT_VALID_TYPES = [
        self::INPUT_TYPE_DATE,
        self::INPUT_TYPE_PASS,
        self::INPUT_TYPE_TEXT,
    ];

    /**
     * @param array $attributes
     *
     * @return string
     */
    public function buildSelect(array $attributes)
    {
        $select = new Select();

        return $select->createSelect($attributes);
    }

    /**
     * @param $attributes
     *
     * @return string
     */
    public function buildInput($attributes)
    {
        $input = new Input();

        return $input->createInput($attributes);
    }

    /**
     * @param $attributes
     *
     * @return string
     */
    public function buildButton($attributes)
    {
        $button = new Button();

        return $button->createButton($attributes);
    }
}
