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

    'accepted' => 'Поле :attribute должно быть принято.',
    'active_url' => 'Поле :attribute не является допустимым URL.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть датой после или равной :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефисы и подчеркивания.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal' => 'Поле :attribute должно быть датой до или равной :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file' => 'Поле :attribute должно быть между :min и :max килобайт.',
        'string' => 'Поле :attribute должно быть между :min и :max символов.',
        'array' => 'Поле :attribute должно содержать от :min до :max элементов.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => 'Поле :attribute не является допустимой датой.',
    'date_equals' => 'Поле :attribute должно быть равным :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны быть разными.',
    'digits' => 'Поле :attribute должно быть :digits цифр.',
    'digits_between' => 'Поле :attribute должно быть между :min и :max цифрами.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть допустимым адресом электронной почты.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values.',
    'exists' => 'Выбранное значение для :attribute недопустимо.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute должно быть заполнено.',
    'gt' => [
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'file' => 'Поле :attribute должно быть больше :value килобайт.',
        'string' => 'Поле :attribute должно быть длиннее :value символов.',
        'array' => 'Поле :attribute должно содержать более :value элементов.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute должно быть больше или равно :value.',
        'file' => 'Поле :attribute должно быть больше или равно :value килобайт.',
        'string' => 'Поле :attribute должно быть длиннее или равно :value символов.',
        'array' => 'Поле :attribute должно содержать :value элементов или более.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute недопустимо.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть допустимым IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть допустимым IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть допустимым IPv6-адресом.',
    'json' => 'Поле :attribute должно быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'file' => 'Поле :attribute должно быть меньше :value килобайт.',
        'string' => 'Поле :attribute должно быть короче :value символов.',
        'array' => 'Поле :attribute должно содержать менее :value элементов.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
        'file' => 'Поле :attribute должно быть меньше или равно :value килобайт.',
        'string' => 'Поле :attribute должно быть короче или равно :value символов.',
        'array' => 'Поле :attribute не должно содержать более :value элементов.',
    ],
    'max' => [
        'numeric' => 'Поле :attribute не может быть больше :max.',
        'file' => 'Поле :attribute не может быть больше :max килобайт.',
        'string' => 'Поле :attribute не может быть длиннее :max символов.',
        'array' => 'Поле :attribute не может содержать более :max элементов.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом типа: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом типа: :values.',
    'min' => [
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'file' => 'Поле :attribute должно быть не менее :min килобайт.',
        'string' => 'Поле :attribute должно быть не короче :min символов.',
        'array' => 'Поле :attribute должно содержать не менее :min элементов.',
    ],
    'not_in' => 'Выбранное значение для :attribute недопустимо.',
    'not_regex' => 'Формат :attribute недопустим.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => 'Неверный пароль.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат :attribute недопустим.',
    'required' => 'Поле :attribute является обязательным.',
    'required_if' => 'Поле :attribute является обязательным, когда :other имеет значение :value.',
    'required_unless' => 'Поле :attribute является обязательным, если :other не находится в :values.',
    'required_with' => 'Поле :attribute является обязательным, когда присутствует :values.',
    'required_with_all' => 'Поле :attribute является обязательным, когда присутствуют :values.',
    'required_without' => 'Поле :attribute является обязательным, когда отсутствует :values.',
    'required_without_all' => 'Поле :attribute является обязательным, когда отсутствуют все значения :values.',
    'same' => 'Поля :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Поле :attribute должно быть :size.',
        'file' => 'Поле :attribute должно быть :size килобайт.',
        'string' => 'Поле :attribute должно быть длиной :size символов.',
        'array' => 'Поле :attribute должно содержать :size элементов.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть допустимой временной зоной.',
    'unique' => 'Поле :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'url' => 'Формат :attribute недопустим.',
    'uuid' => 'Поле :attribute должно быть допустимым UUID.',

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
