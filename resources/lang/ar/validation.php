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
'accepted' => 'يجب قبول :attribute.',
'active_url' => ':attribute ليس عنوان URL صالحاً.',
'after' => 'يجب أن يكون :attribute تاريخاً بعد :date.',
'after_or_equal' => 'يجب أن يكون :attribute تاريخاً بعد أو يساوي :date.',
'alpha' => 'يجب أن يحتوي :attribute على أحرف فقط.',
'alpha_dash' => 'يمكن أن يحتوي :attribute على أحرف، أرقام، شرطات وشرطات سفلية فقط.',
'alpha_num' => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط.',
'array' => 'يجب أن يكون :attribute مصفوفة.',
'before' => 'يجب أن يكون :attribute تاريخاً قبل :date.',
'before_or_equal' => 'يجب أن يكون :attribute تاريخاً قبل أو يساوي :date.',
'between' => [
    'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
    'file' => 'يجب أن يكون حجم ملف :attribute بين :min و :max كيلوبايت.',
    'string' => 'يجب أن يكون عدد حروف :attribute بين :min و :max.',
    'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
],
'boolean' => 'يجب أن تكون قيمة حقل :attribute إما true أو false.',
'confirmed' => 'تأكيد :attribute غير متطابق.',
'date' => ':attribute ليس تاريخاً صالحاً.',
'date_equals' => 'يجب أن يكون :attribute تاريخاً مطابقاً لـ :date.',
'date_format' => 'لا يتطابق :attribute مع الشكل :format.',
'different' => 'يجب أن يكون :attribute و :other مختلفين.',
'digits' => 'يجب أن يحتوي :attribute على :digits رقماً.',
'digits_between' => 'يجب أن يحتوي :attribute على عدد أرقام بين :min و :max.',
'dimensions' => 'أبعاد صورة :attribute غير صالحة.',
'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحاً.',
'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
'exists' => ':attribute المحدد غير صالح.',
'file' => 'يجب أن يكون :attribute ملفاً.',
'filled' => 'يجب ملء حقل :attribute.',
'gt' => [
    'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
    'file' => 'يجب أن يكون حجم ملف :attribute أكبر من :value كيلوبايت.',
    'string' => 'يجب أن يكون طول نص :attribute أكبر من :value حرفاً.',
    'array' => 'يجب أن يحتوي :attribute على أكثر من :value عنصراً.',
],
'gte' => [
    'numeric' => 'يجب أن تكون قيمة :attribute أكبر من أو تساوي :value.',
    'file' => 'يجب أن يكون حجم ملف :attribute أكبر من أو يساوي :value كيلوبايت.',
    'string' => 'يجب أن يكون طول نص :attribute أكبر من أو يساوي :value حرفاً.',
    'array' => 'يجب أن يحتوي :attribute على :value عنصر أو أكثر.',
],
'image' => 'يجب أن يكون :attribute صورة.',
'in' => ':attribute المحدد غير صالح.',
'in_array' => 'حقل :attribute غير موجود في :other.',
'integer' => 'يجب أن يكون :attribute عدداً صحيحاً.',
'ip' => 'يجب أن يكون :attribute عنوان IP صالحاً.',
'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحاً.',
'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحاً.',
'json' => 'يجب أن يكون :attribute نص JSON صالحاً.',
'lt' => [
    'numeric' => 'يجب أن تكون قيمة :attribute أقل من :value.',
    'file' => 'يجب أن يكون حجم ملف :attribute أقل من :value كيلوبايت.',
    'string' => 'يجب أن يكون طول نص :attribute أقل من :value حرفاً.',
    'array' => 'يجب أن يحتوي :attribute على أقل من :value عنصراً.',
],
'lte' => [
    'numeric' => 'يجب أن تكون قيمة :attribute أقل من أو تساوي :value.',
    'file' => 'يجب أن يكون حجم ملف :attribute أقل من أو يساوي :value كيلوبايت.',
    'string' => 'يجب أن يكون طول نص :attribute أقل من أو يساوي :value حرفاً.',
    'array' => 'لا يجب أن يحتوي :attribute على أكثر من :value عنصراً.',
],
'max' => [
    'numeric' => 'يجب ألا تكون قيمة :attribute أكبر من :max.',
    'file' => 'يجب ألا يكون حجم ملف :attribute أكبر من :max كيلوبايت.',
    'string' => 'يجب ألا يتجاوز نص :attribute :max حرفاً.',
    'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عنصراً.',
],
'mimes' => 'يجب أن يكون ملف :attribute من نوع: :values.',
'mimetypes' => 'يجب أن يكون ملف :attribute من نوع: :values.',
'min' => [
    'numeric' => 'يجب أن تكون قيمة :attribute على الأقل :min.',
    'file' => 'يجب ألا يقل حجم ملف :attribute عن :min كيلوبايت.',
    'string' => 'يجب ألا يقل عدد أحرف :attribute عن :min.',
    'array' => 'يجب أن يحتوي :attribute على الأقل :min عنصراً.',
],
'not_in' => ':attribute المحدد غير صالح.',
'not_regex' => 'صيغة :attribute غير صالحة.',
'numeric' => 'يجب أن يكون :attribute رقماً.',
'password' => 'كلمة المرور غير صحيحة.',
'present' => 'يجب توفر حقل :attribute.',
'regex' => 'صيغة :attribute غير صالحة.',
'required' => 'حقل :attribute مطلوب.',
'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other موجوداً في :values.',
'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجوداً.',
'required_with_all' => 'حقل :attribute مطلوب عندما تكون جميع :values موجودة.',
'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجوداً.',
'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
'same' => 'يجب أن يتطابق :attribute مع :other.',
'size' => [
    'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
    'file' => 'يجب أن يكون حجم ملف :attribute :size كيلوبايت.',
    'string' => 'يجب أن يحتوي :attribute على :size حرفاً.',
    'array' => 'يجب أن يحتوي :attribute على :size عنصراً.',
],
'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
'string' => 'يجب أن يكون :attribute نصاً.',
'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة.',
'unique' => 'قيمة :attribute مستخدمة بالفعل.',
'uploaded' => 'فشل في تحميل :attribute.',
'url' => 'صيغة :attribute غير صالحة.',
'uuid' => 'يجب أن يكون :attribute UUID صالحاً.',


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
