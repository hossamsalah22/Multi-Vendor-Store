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
    'active_url' => 'حقل :attribute لا يُمثّل رابطًا صحيحًا.',
    'after' => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا لتاريخ :date.',
    'after_or_equal' => 'حقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً لتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي حقل :attribute سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي حقل :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي حقل :attribute على حروفٍ وأرقامٍ فقط.',
    'array' => 'يجب أن يكون حقل :attribute ًمصفوفة.',
    'attached' => 'حقل :attribute تم إرفاقه بالفعل.',
    'before' => 'يجب على حقل :attribute أن يكون تاريخًا سابقًا لتاريخ :date.',
    'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا لتاريخ :date.',
    'between' => [
        'array' => 'يجب أن يحتوي حقل :attribute على عدد من العناصر بين :min و :max.',
        'file' => 'يجب أن يكون حجم ملف حقل :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute بين :min و :max.',
        'string' => 'يجب أن يكون عدد حروف نّص حقل :attribute بين :min و :max.',
    ],
    'boolean' => 'يجب أن تكون قيمة حقل :attribute إما true أو false .',
    'confirmed' => 'حقل التأكيد غير مُطابق لحقل :attribute.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'حقل :attribute ليس تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون حقل :attribute مطابقاً لتاريخ :date.',
    'date_format' => 'لا يتوافق حقل :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits' => 'يجب أن يحتوي حقل :attribute على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي حقل :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions' => 'الحقل:attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'لحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values',
    'exists' => 'القيمة المحددة :attribute غير موجودة.',
    'file' => 'الحقل :attribute يجب أن يكون ملفا.',
    'filled' => 'حقل :attribute إجباري.',
    'gt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم ملف حقل :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من :value.',
        'string' => 'يجب أن يكون طول نّص حقل :attribute أكثر من :value حروفٍ/حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :value عُنصرًا/عناصر.',
        'file' => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر من :value.',
        'string' => 'يجب أن يكون طول نص حقل :attribute على الأقل :value حروفٍ/حرفًا.',
    ],
    'image' => 'يجب أن يكون حقل :attribute صورةً.',
    'in' => 'حقل :attribute غير موجود.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون حقل :attribute نصًا من نوع JSON.',
    'lt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم ملف حقل :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أصغر من :value.',
        'string' => 'يجب أن يكون طول نّص حقل :attribute أقل من :value حروفٍ/حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم ملف حقل :attribute :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر من :value.',
        'string' => 'يجب أن لا يتجاوز طول نّص حقل :attribute :value حروفٍ/حرفًا.',
    ],
    'max' => [
        'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :max عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم ملف حقل :attribute :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر من :max.',
        'string' => 'يجب أن لا يتجاوز طول نّص حقل :attribute :max حروفٍ/حرفًا.',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عُنصرًا/عناصر.',
        'file' => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر من :min.',
        'string' => 'يجب أن يكون طول نص حقل :attribute على الأقل :min حروفٍ/حرفًا.',
    ],
    'multiple_of' => 'حقل :attribute يجب أن يكون من مضاعفات :value',
    'not_in' => 'عنصر الحقل :attribute غير صحيح.',
    'not_regex' => 'صيغة حقل :attribute غير صحيحة.',
    'numeric' => 'يجب على حقل :attribute أن يكون رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب تقديم حقل :attribute.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور إذا كان :other هو :value.',
    'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other ضمن :values.',
    'regex' => 'صيغة حقل :attribute .غير صحيحة.',
    'relatable' => 'حقل :attribute قد لا يكون مرتبطا بالمصدر المحدد.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب في حال ما إذا كان :other :value.',
    'required_unless' => 'حقل :attribute مطلوب في حال ما لم يكن :other :values.',
    'required_with' => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_with_all' => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_without' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :size عنصرٍ/عناصر بالضبط.',
        'file' => 'يجب أن يكون حجم ملف حقل :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية لـ :size.',
        'string' => 'يجب أن يحتوي نص حقل :attribute على :size حروفٍ/حرفًا بالضبط.',
    ],
    'starts_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون حقل :attribute نصًا.',
    'timezone' => 'يجب أن يكون حقل :attribute نطاقًا زمنيًا صحيحًا.',
    'unique' => 'قيمة حقل :attribute مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل الـ :attribute.',
    'url' => 'صيغة رابط حقل :attribute غير صحيحة.',
    'uuid' => 'حقل :attribute يجب أن يكون بصيغة UUID سليمة.',
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
        'addr.*.type' => [
            'required' => 'حقل نوع العنوان مطلوب.',
            'in' => 'القيمة المحددة لـ نوع العنوان غير صالحة.',
        ],
        'addr.*.first_name' => [
            'required' => 'حقل الاسم الأول مطلوب.',
            'string' => 'يجب أن يكون الاسم الأول نصًا.',
        ],
        'addr.*.last_name' => [
            'required' => 'حقل الاسم الأخير مطلوب.',
            'string' => 'يجب أن يكون الاسم الأخير نصًا.',
        ],
        'addr.*.email' => [
            'required' => 'حقل البريد الإلكتروني مطلوب.',
            'email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
        ],
        'addr.*.phone_number' => [
            'required' => 'حقل رقم الهاتف مطلوب.',
            'numeric' => 'يجب أن يكون رقم الهاتف رقمًا.',
        ],
        'addr.*.address' => [
            'required' => 'حقل العنوان مطلوب.',
            'string' => 'يجب أن يكون العنوان نصًا.',
        ],
        'addr.*.city' => [
            'required' => 'حقل المدينة مطلوب.',
            'string' => 'يجب أن تكون المدينة نصًا.',
        ],
        'addr.*.state' => [
            'required' => 'حقل الولاية مطلوب.',
            'string' => 'يجب أن تكون الولاية نصًا.',
        ],
        'addr.*.country' => [
            'required' => 'حقل البلد مطلوب.',
            'string' => 'يجب أن يكون البلد نصًا.',
        ],
        'addr.*.postal_code' => [
            'required' => 'حقل الرمز البريدي مطلوب.',
            'string' => 'يجب أن يكون الرمز البريدي نصًا.',
        ],
        'category_id' => [
            'exists' => 'القيمة المحددة لـ القسم غير موجودة.',
        ],
        'store_id' => [
            'required' => 'حقل المتجر مطلوب.',
            'exists' => 'القيمة المحددة لـ المتجر غير موجودة.',
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

    'attributes' => [
        'email' => 'البريد الالكتروني',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'name' => 'الاسم',
        'name_ar' => 'الاسم بالعربية',
        'name_en' => 'الاسم بالانجليزية',
        'phone_number' => 'رقم الهاتف',
        'address' => 'العنوان',
        'image' => 'الصورة',
        'description_ar' => 'الوصف بالعربية',
        'description_en' => 'الوصف بالانجليزية',
        'title_ar' => 'العنوان بالعربية',
        'title_en' => 'العنوان بالانجليزية',
        'price' => 'السعر',
        'compare_price' => 'سعر المقارنة',
        'quantity' => 'الكمية',
        'category_id' => 'القسم',
        'product_id' => 'المنتج',
        'status' => 'الحالة',
        'store_id' => 'المتجر',
        "first_name" => "الاسم الاول",
        "last_name" => "الاسم الاخير",
        "country" => "الدولة",
        "city" => "المدينة",
        "postal_code" => "الرمز البريدي",
        "username" => "اسم المستخدم",
        "title" => "العنوان",
        "current_password" => "كلمة السر الحالية"
    ],

];

