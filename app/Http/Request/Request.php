<?php

namespace Request;

class Request implements ValidateRules
{
    private static array $validationErrors = [];
    private static array $validatedFields = [];

    public static function init(): array
    {
        $rules = static::rules();

        if (!empty($rules)){
            self::validate($rules);
        }

        return [
            'payload' => static::$validatedFields,
            'errors' => static::$validationErrors,
        ];
    }

    public static function rules(): array
    {
        return [];
    }

    private static function validate(array $rules)
    {
        foreach ($_POST as $key => $value){

            $rulesByKey = $rules[$key];

            if (in_array('string', $rulesByKey)){
                $isString = is_string($value);

                if (!$isString){
                    static::$validationErrors[$key] = "$key must be a string";
                }
            }

            if (in_array('email', $rulesByKey)){
                $isEmail = filter_var($value, FILTER_VALIDATE_EMAIL);

                if (!$isEmail){
                    static::$validationErrors[$key] = "$key must be email format";
                }
            }

            if (in_array('password', $rulesByKey)){

                if(!(preg_match('/[A-Za-z]/', $value) && preg_match('/[0-9]/', $value))){
                    static::$validationErrors[$key] = "$key must consists of letters and numbers";
                }
            }

            $ruleMax = current(array_filter($rules[$key], fn($value) => str_contains($value, 'max')));

            if (is_string($ruleMax)){
                $length = explode(":", $ruleMax);

                if (strlen($value) > $length[1]){
                    static::$validationErrors[$key] = "$key must be shorter than ". $length[1];
                }
            }

            $ruleMin = current(array_filter($rules[$key], fn($value) => str_contains($value, 'min')));

            if (is_string($ruleMin)){
                $length = explode(":", $ruleMin);

                if (strlen($value) < $length[1]){
                    static::$validationErrors[$key] = "$key must be longer than ". $length[1];
                }
            }

            if (!array_key_exists($key, static::$validationErrors)){
                static::$validatedFields[$key] = $value;
            }

        }
    }
}