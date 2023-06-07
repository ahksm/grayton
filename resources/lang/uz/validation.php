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

    "accepted" => ":attribute qabul qilinishi kerak.",
    "active_url" => ":attribute haqiqiy URL emas.",
    "after" => ":attribute :date dan keyin bir sana bo'lishi kerak.",
    "after_or_equal" => ":attribute :date dan keyin yoki unga teng sana bo'lishi kerak.",
    "alpha" => ":attribute faqat harflardan iborat bo'lishi mumkin.",
    "alpha_dash" => ":attribute faqat harflar, raqamlar, tirelar va pastki chiziqlardan iborat bo'lishi mumkin.",
    "alpha_num" => ":attribute faqat harflar va raqamlardan iborat bo'lishi mumkin.",
    "array" => ":attribute massiv bo'lishi kerak.",
    "before" => ":attribute :date dan oldin bir sana bo'lishi kerak.",
    "before_or_equal" => ":attribute :date dan oldin yoki unga teng sana bo'lishi kerak.",
    "between" => [
        "numeric" => ":attribute :min va :max orasida bo'lishi kerak.",
        "file" => ":attribute :min va :max kilobayt orasida bo'lishi kerak.",
        "string" => ":attribute :min va :max belgi orasida bo'lishi kerak.",
        "array" => ":attribute :min va :max elementlardan iborat bo'lishi kerak.",
    ],
    "boolean" => ":attribute maydoni faqat haqiqiy yoki yolg'on bo'lishi kerak.",
    "confirmed" => ":attribute tasdiqlovchi bilan mos kelmadi.",
    "date" => ":attribute haqiqiy sana emas.",
    "date_equals" => ":attribute :date ga teng sana bo'lishi kerak.",
    "date_format" => ":attribute :format formatga mos kelmayapti.",
    "different" => ":attribute va :other bir-biridan farqli bo'lishi kerak.",
    "digits" => ":attribute :digits raqamdan iborat bo'lishi kerak.",
    "digits_between" => ":attribute :min va :max raqamlar orasida bo'lishi kerak.",
    "dimensions" => ":attribute haqiqiy tasvir o'lchamlari emas.",
    "distinct" => ":attribute maydoni takrorlanuvchi qiymatga ega.",
    "email" => ":attribute haqiqiy elektron pochta manzili bo'lishi kerak.",
    "ends_with" => ":attribute quyidagi qiymatlardan biri bilan tugashi kerak: :values.",
    "exists" => "Tanlangan :attribute haqiqiy emas.",
    "file" => ":attribute fayl bo'lishi kerak.",
    "filled" => ":attribute maydoni qiymatga ega bo'lishi kerak.",
    "gt" => [
        "numeric" => ":attribute :value dan katta bo'lishi kerak.",
        "file" => ":attribute :value kilobaytdan katta bo'lishi kerak.",
        "string" => ":attribute :value belgidan katta bo'lishi kerak.",
        "array" => ":attribute :value elementdan ko'p bo'lishi kerak.",
    ],
    "gte" => [
        "numeric" => ":attribute :value dan katta yoki teng bo'lishi kerak.",
        "file" => ":attribute :value kilobaytdan katta yoki teng bo'lishi kerak.",
        "string" => ":attribute :value belgidan katta yoki teng bo'lishi kerak.",
        "array" => ":attribute :value element yoki undan ko'p bo'lishi kerak.",
    ],
    "image" => ":attribute tasvir bo'lishi kerak.",
    "in" => "Tanlangan :attribute haqiqiy emas.",
    "in_array" => ":attribute maydoni :other da mavjud emas.",
    "integer" => ":attribute butun son bo'lishi kerak.",
    "ip" => ":attribute haqiqiy IP manzil bo'lishi kerak.",
    "ipv4" => ":attribute haqiqiy IPv4 manzil bo'lishi kerak.",
    "ipv6" => ":attribute haqiqiy IPv6 manzil bo'lishi kerak.",
    "json" => ":attribute haqiqiy JSON qatori bo'lishi kerak.",
    "lt" => [
        "numeric" => ":attribute :value dan kichik bo'lishi kerak.",
        "file" => ":attribute :value kilobaytdan kichik bo'lishi kerak.",
        "string" => ":attribute :value belgidan kichik bo'lishi kerak.",
        "array" => ":attribute :value elementdan kam bo'lishi kerak.",
    ],
    "lte" => [
        "numeric" => ":attribute :value dan kichik yoki teng bo'lishi kerak.",
        "file" => ":attribute :value kilobaytdan kichik yoki teng bo'lishi kerak.",
        "string" => ":attribute :value belgidan kichik yoki teng bo'lishi kerak.",
        "array" => ":attribute :value elementdan ortiq bo'lishi kerak.",
    ],
    "max" => [
        "numeric" => ":attribute :max dan katta bo'lmaydi.",
        "file" => ":attribute :max kilobaytdan katta bo'lmaydi.",
        "string" => ":attribute :max belgidan ortiq bo'lmaydi.",
        "array" => ":attribute :max elementdan ko'p bo'lmaydi.",
    ],
    "mimes" => ":attribute fayl turidan bo'lishi kerak: :values.",
    "mimetypes" => ":attribute fayl turidan bo'lishi kerak: :values.",
    "min" => [
        "numeric" => ":attribute kamida :min bo'lishi kerak.",
        "file" => ":attribute kamida :min kilobayt bo'lishi kerak.",
        "string" => ":attribute kamida :min belgi bo'lishi kerak.",
        "array" => ":attribute kamida :min elementdan iborat bo'lishi kerak.",
    ],
    "not_in" => "Tanlangan :attribute haqiqiy emas.",
    "not_regex" => ":attribute formati noto'g'ri.",
    "numeric" => ":attribute raqam bo'lishi kerak.",
    "password" => "Noto'g'ri parol.",
    "present" => ":attribute maydoni mavjud bo'lishi kerak.",
    "regex" => ":attribute formati noto'g'ri.",
    "required" => ":attribute maydoni talab qilinadi.",
    "required_if" => ":attribute maydoni :other qiymatiga :value bo'lganda talab qilinadi.",
    "required_unless" => ":attribute maydoni :values ichida bo'lmaganda talab qilinadi.",
    "required_with" => ":attribute maydoni :values mavjud bo'lganda talab qilinadi.",
    "required_with_all" => ":attribute maydoni :values mavjud bo'lganda talab qilinadi.",
    "required_without" => ":attribute maydoni :values mavjud bo'lmasa talab qilinadi.",
    "required_without_all" => ":attribute maydoni :values lardan hech biri mavjud bo'lmasa talab qilinadi.",
    "same" => ":attribute va :other bir xil bo'lishi kerak.",
    "size" => [
        "numeric" => ":attribute :size bo'lishi kerak.",
        "file" => ":attribute :size kilobayt bo'lishi kerak.",
        "string" => ":attribute :size belgi bo'lishi kerak.",
        "array" => ":attribute :size elementdan iborat bo'lishi kerak.",
    ],
    "starts_with" => ":attribute quyidagi qiymatlardan biri bilan boshlanishi kerak: :values.",
    "string" => ":attribute qator bo'lishi kerak.",
    "timezone" => ":attribute haqiqiy vaqt mintaqasi bo'lishi kerak.",
    "unique" => ":attribute allaqachon olingan.",
    "uploaded" => ":attribute yuklash muvaffaqiyatsiz tugallandi.",
    "url" => ":attribute formati noto'g'ri.",
    "uuid" => ":attribute haqiqiy UUID bo'lishi kerak.",

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

    "custom" => [
        "attribute-name" => [
            "rule-name" => "custom-message",
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

    "attributes" => [],

];
