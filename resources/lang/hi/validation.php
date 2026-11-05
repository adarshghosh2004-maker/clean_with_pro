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

    'accepted' => ':attribute को स्वीकार किया जाना चाहिए।',
    'accepted_if' => ':attribute को स्वीकार किया जाना चाहिए जब :other :value हो।',
    'active_url' => ':attribute एक मान्य URL नहीं है।',
    'after' => ':attribute एक तारीख होनी चाहिए जो :date के बाद हो।',
    'after_or_equal' => ':attribute एक तारीख होनी चाहिए जो :date के बाद या उसके बराबर हो।',
    'alpha' => ':attribute में केवल अक्षर होने चाहिए।',
    'alpha_dash' => ':attribute में केवल अक्षर, संख्याएँ, डैश और अंडरस्कोर होने चाहिए।',
    'alpha_num' => ':attribute में केवल अक्षर और संख्याएँ होने चाहिए।',
    'array' => ':attribute एक सरणी होनी चाहिए।',
    'before' => ':attribute एक तारीख होनी चाहिए जो :date से पहले हो।',
    'before_or_equal' => ':attribute एक तारीख होनी चाहिए जो :date से पहले या उसके बराबर हो।',
    'between' => [
        'numeric' => ':attribute :min और :max के बीच होना चाहिए।',
        'file' => ':attribute :min और :max किलोबाइट के बीच होना चाहिए।',
        'string' => ':attribute :min और :max वर्णों के बीच होना चाहिए।',
        'array' => ':attribute में :min और :max आइटम होने चाहिए।',
    ],
    'boolean' => ':attribute फील्ड सही या गलत होना चाहिए।',
    'confirmed' => ':attribute पुष्टि मेल नहीं खाती।',
    'current_password' => 'पासवर्ड गलत है।',
    'date' => ':attribute एक मान्य तारीख नहीं है।',
    'date_equals' => ':attribute एक तारीख होनी चाहिए जो :date के बराबर हो।',
    'date_format' => ':attribute फॉर्मेट :format से मेल नहीं खाता।',
    'declined' => ':attribute को अस्वीकार किया जाना चाहिए।',
    'declined_if' => ':attribute को अस्वीकार किया जाना चाहिए जब :other :value हो।',
    'different' => ':attribute और :other अलग-अलग होने चाहिए।',
    'digits' => ':attribute :digits अंकों का होना चाहिए।',
    'digits_between' => ':attribute :min और :max अंकों के बीच होना चाहिए।',
    'dimensions' => ':attribute का अमान्य चित्र आयाम है।',
    'distinct' => ':attribute फील्ड का डुप्लिकेट मान है।',
    'email' => ':attribute एक मान्य ईमेल पता होना चाहिए।',
    'ends_with' => ':attribute निम्नलिखित में से किसी एक के साथ समाप्त होना चाहिए: :values।',
    'enum' => 'चयनित :attribute अमान्य है।',
    'exists' => 'चयनित :attribute अमान्य है।',
    'file' => ':attribute एक फ़ाइल होनी चाहिए।',
    'filled' => ':attribute फील्ड का एक मान होना चाहिए।',
    'gt' => [
        'numeric' => ':attribute :value से अधिक होना चाहिए।',
        'file' => ':attribute :value किलोबाइट से अधिक होना चाहिए।',
        'string' => ':attribute :value वर्णों से अधिक होना चाहिए।',
        'array' => ':attribute में :value से अधिक आइटम होने चाहिए।',
    ],
    'gte' => [
        'numeric' => ':attribute :value से अधिक या उसके बराबर होना चाहिए।',
        'file' => ':attribute :value किलोबाइट से अधिक या उसके बराबर होना चाहिए।',
        'string' => ':attribute कम से कम :value वर्णों का होना चाहिए।',
        'array' => ':attribute में :value या अधिक आइटम होने चाहिए।',
    ],
    'image' => ':attribute एक छवि होनी चाहिए।',
    'in' => 'चयनित :attribute अमान्य है।',
    'in_array' => ':attribute फील्ड :other में मौजूद नहीं है।',
    'integer' => ':attribute एक पूर्णांक होना चाहिए।',
    'ip' => ':attribute एक मान्य IP पता होना चाहिए।',
    'ipv4' => ':attribute एक मान्य IPv4 पता होना चाहिए।',
    'ipv6' => ':attribute एक मान्य IPv6 पता होना चाहिए।',
    'json' => ':attribute एक मान्य JSON स्ट्रिंग होनी चाहिए।',
    'lt' => [
        'numeric' => ':attribute :value से कम होना चाहिए।',
        'file' => ':attribute :value किलोबाइट से कम होना चाहिए।',
        'string' => ':attribute :value वर्णों से कम होना चाहिए।',
        'array' => ':attribute में :value से कम आइटम होने चाहिए।',
    ],
    'lte' => [
        'numeric' => ':attribute :value से कम या उसके बराबर होना चाहिए।',
        'file' => ':attribute :value किलोबाइट से कम या उसके बराबर होना चाहिए।',
        'string' => ':attribute :value वर्णों से अधिक नहीं होना चाहिए।',
        'array' => ':attribute में :value से अधिक आइटम नहीं होने चाहिए।',
    ],
    'mac_address' => ':attribute एक मान्य MAC पता होना चाहिए।',
    'max' => [
        'numeric' => ':attribute :max से अधिक नहीं होना चाहिए।',
        'file' => ':attribute :max किलोबाइट से अधिक नहीं होना चाहिए।',
        'string' => ':attribute :max वर्णों से अधिक नहीं होना चाहिए।',
        'array' => ':attribute में :max से अधिक आइटम नहीं होने चाहिए।',
    ],
    'mimes' => ':attribute एक फ़ाइल होनी चाहिए प्रकार: :values।',
    'mimetypes' => ':attribute एक फ़ाइल होनी चाहिए प्रकार: :values।',
    'min' => [
        'numeric' => ':attribute कम से कम :min होना चाहिए।',
        'file' => ':attribute कम से कम :min किलोबाइट होना चाहिए।',
        'string' => ':attribute कम से कम :min वर्णों का होना चाहिए।',
        'array' => ':attribute में कम से कम :min आइटम होने चाहिए।',
    ],
    'multiple_of' => ':attribute :value का गुणज होना चाहिए।',
    'not_in' => 'चयनित :attribute अमान्य है।',
    'not_regex' => ':attribute का फॉर्मेट अमान्य है।',
    'numeric' => ':attribute एक संख्या होनी चाहिए।',
    'password' => 'पासवर्ड गलत है।',
    'present' => ':attribute फील्ड मौजूद होना चाहिए।',
    'prohibited' => ':attribute फील्ड निषिद्ध है।',
    'prohibited_if' => ':attribute फील्ड निषिद्ध है जब :other :value हो।',
    'prohibited_unless' => ':attribute फील्ड निषिद्ध है जब तक :other :values में न हो।',
    'prohibits' => ':attribute फील्ड :other को मौजूद होने से रोकता है।',
    'regex' => ':attribute का फॉर्मेट अमान्य है।',
    'required' => ':attribute फील्ड आवश्यक है।',
    'required_array_keys' => ':attribute फील्ड में :values के लिए प्रविष्टियाँ होनी चाहिए।',
    'required_if' => ':attribute फील्ड आवश्यक है जब :other :value हो।',
    'required_unless' => ':attribute फील्ड आवश्यक है जब तक :other :values में न हो।',
    'required_with' => ':attribute फील्ड आवश्यक है जब :values मौजूद हो।',
    'required_with_all' => ':attribute फील्ड आवश्यक है जब :values मौजूद हों।',
    'required_without' => ':attribute फील्ड आवश्यक है जब :values मौजूद न हो।',
    'required_without_all' => ':attribute फील्ड आवश्यक है जब कोई भी :values मौजूद न हो।',
    'same' => ':attribute और :other मेल खाने चाहिए।',
    'size' => [
        'numeric' => ':attribute :size होना चाहिए।',
        'file' => ':attribute :size किलोबाइट होना चाहिए।',
        'string' => ':attribute :size वर्णों का होना चाहिए।',
        'array' => ':attribute में :size आइटम होने चाहिए।',
    ],
    'starts_with' => ':attribute निम्नलिखित में से किसी एक से शुरू होना चाहिए: :values।',
    'string' => ':attribute एक स्ट्रिंग होनी चाहिए।',
    'timezone' => ':attribute एक मान्य समय क्षेत्र होना चाहिए।',
    'unique' => ':attribute पहले ही लिया जा चुका है।',
    'uploaded' => ':attribute अपलोड करने में विफल रहा।',
    'url' => ':attribute एक मान्य URL होना चाहिए।',
    'uuid' => ':attribute एक मान्य UUID होना चाहिए।',
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

