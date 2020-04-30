<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceitado.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'O :attribute deve ser posterior à :date.',
    'after_or_equal' => 'O :attribute deve ser posterior ou mesma data de :date.',
    'alpha' => 'O :attribute só pode ter letras.',
    'alpha_dash' => 'O :attribute só pode ter letras, números, traços e sublinhados.',
    'alpha_num' => 'O :attribute só pode ter letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser anterior à :date.',
    'before_or_equal' => 'O :attribute deve ser a anteior ou mesma data de :date.',
    'between' => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file' => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string' => 'O :attribute deve ser entre :min e :max caracteres.',
        'array' => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O :attribute campo deve ser true ou false.',
    'confirmed' => 'O :attribute não confirma.',
    'date' => 'O :attribute não é uma data válida.',
    'date_format' => 'O :attribute não confere com o formato: :format.',
    'different' => 'O :attribute e :other devem ser differentes.',
    'digits' => 'O :attribute deve ter :digits digitos.',
    'digits_between' => 'O :attribute deve ser entre :min e :max digitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidos.',
    'distinct' => 'O :attribute tem um valor duplicado.',
    'email' => 'O :attribute deve ser um email válido.',
    'exists' => 'O valor selecionado :attribute é inválido.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'string' => 'O :attribute deve ser maior que :value caracteres.',
        'array' => 'O :attribute deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve ser maior que ou igual a  :value.',
        'file' => 'O :attribute deve ser maior que ou igual a  :value kilobytes.',
        'string' => 'O :attribute deve ser maior que ou igual a  :value caracteres.',
        'array' => 'O :attribute deve ter :value items ou mais.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O selected :attribute é inválido.',
    'in_array' => 'O :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um inteiro.',
    'ip' => 'O :attribute deve ser um endereço IP válido',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido',
    'json' => 'O :attribute deve ser um JSON válido.',
    'lt' => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file' => 'O :attribute deve ser menor que :value kilobytes.',
        'string' => 'O :attribute deve ser menor que :value caracteres.',
        'array' => 'O :attribute deve ter menor que :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser menor que ou igual a  :value.',
        'file' => 'O :attribute deve ser menor que ou igual a  :value kilobytes.',
        'string' => 'O :attribute deve ser menor que ou igual a  :value caracteres.',
        'array' => 'O :attribute não deve ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file' => 'O :attribute não deve ser maior que :max kilobytes.',
        'string' => 'O :attribute não deve ser maior que :max caracteres.',
        'array' => 'O :attribute não deve ter mais que :max itens.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser no mínimo :min.',
        'file' => 'O :attribute deve ser no mínimo :min kilobytes.',
        'string' => 'O :attribute deve ser no mínimo :min caracteres.',
        'array' => 'O :attribute deve ter no mínimo :min itens.',
    ],
    'not_in' => 'O :attribute selecionado é inválido.',
    'not_regex' => 'O formato de :attribute é inválido.',
    'numeric' => 'O :attribute deve ser a número.',
    'present' => 'O :attribute field deve ser presente.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'O :attribute é obrigatório.',
    'required_if' => 'O :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'O :attribute é obrigatório unless :other está em :values.',
    'required_with' => 'O :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O :attribute é obrigatório quando :values estão presente.',
    'required_without' => 'O :attribute é obrigatório quando :values está ausente.',
    'required_without_all' => 'O :attribute é obrigatório quando nenhum dos :values está presente.',
    'same' => 'O :attribute e :other devem ser idênticos.',
    'size' => [
        'numeric' => 'O :attribute deve ter :size.',
        'file' => 'O :attribute deve ter :size kilobytes.',
        'string' => 'O :attribute deve ter :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'string' => 'O :attribute deve ser uma string.',
    'timezone' => 'O :attribute deve ser um fuso horário válido .',
    'unique' => 'O :attribute já existe.',
    'uploaded' => 'O :attribute falhou em subir.',
    'url' => 'O formato de :attribute é inválido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
