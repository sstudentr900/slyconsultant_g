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

    'accepted' => "必須接受 :attribute。",
    'accepted_if' => "當 :other 是 :value 時，必須接受 :attribute。",
    'active_url' => ":attribute 並非一個有效的網址。",
    'after' => ":attribute 必須要晚於 <b>:date</b>。",
    'after_or_equal' => ":attribute 必須要等於 <b>:date</b> 或更晚。",
    'alpha' => ":attribute 只能以字母組成。",
    'alpha_dash'           => ":attribute 只能以字母、數字、連接線(-)及底線(_)組成。",
    'alpha_num'            => ":attribute 只能以字母及數字組成。",
    'array'                => ":attribute 必須為陣列。",
    'before'               => ":attribute 必須要早於 <b>:date</b>。",
    'before_or_equal'      => ":attribute 必須要等於 <b>:date</b> 或更早。",
    'between'              => [
        'numeric' => ":attribute 必須介於 <b>:min</b> 至 :max 之間。",
        'file'    => ":attribute 必須介於 <b>:min</b> 至 :max KB 之間。 ",
        'string'  => ":attribute 必須介於 <b>:min</b> 至 :max 個字元之間。",
        'array'   => ":attribute: 必須有 <b>:min</b> - :max 個元素。",
    ],
    'boolean'              => ":attribute 必須為布林值。",
    'confirmed'            => ":attribute 確認欄位的輸入不一致。",
    'current_password' => "密碼不正確。",
    'date' => ":attribute 不是有效日期。",
    'date_equals'          => ":attribute 必須等於 <b>:date</b>。",
    'date_format'          => ":attribute 不符合 :format 的格式。",
    'different'            => ":attribute 與 :other 必須不同。",
    'digits'               => ":attribute 必須是 :digits 位數字。",
    'digits_between'       => ":attribute 必須介於 <b>:min</b> 至 :max 位數字。",
    'dimensions'           => ":attribute 圖片尺寸不正確。",
    'distinct'             => ":attribute 已經存在。",
    'email'                => ":attribute 必須是有效的電子郵件位址。",
    'ends_with' => ":attribute 必須以下列之一結束: :values。",
    'exists'               => "所選擇的 :attribute 選項無效。",
    'file'                 => ":attribute 必須是一個檔案。",
    'filled'               => ":attribute 必須填寫。",
    'gt'                   => [
        'numeric' => ":attribute 必須大於 <b>:value</b>。",
        'file'    => ":attribute 必須大於 <b>:value</b> KB。",
        'string'  => ":attribute 必須多於 <b>:value</b> 個字元。",
        'array'   => ":attribute 必須多於 <b>:value</b> 個元素。",
    ],
    'gte'                  => [
        'numeric' => ":attribute 必須大於或等於 <b>:value</b>。",
        'file'    => ":attribute 必須大於或等於 <b>:value</b> KB。",
        'string'  => ":attribute 必須多於或等於 <b>:value</b> 個字元。",
        'array'   => ":attribute 必須多於或等於 <b>:value</b> 個元素。",
    ],
    'image'                => ":attribute 必須是一張圖片。",
    'in'                   => "所選擇的 :attribute 選項無效。",
    'in_array'             => ":attribute 沒有在 :other 中。",
    'integer'              => ":attribute 必須是一個整數。",
    'ip'                   => ":attribute 必須是一個有效的 IP 位址。",
    'ipv4'                 => ":attribute 必須是一個有效的 IPv4 位址。",
    'ipv6'                 => ":attribute 必須是一個有效的 IPv6 位址。",
    'json'                 => ":attribute 必須是正確的 JSON 字串。",
    'lt'                   => [
        'numeric' => ":attribute 必須小於 <b>:value</b>。",
        'file'    => ":attribute 必須小於 <b>:value</b> KB。",
        'string'  => ":attribute 必須少於 <b>:value</b> 個字元。",
        'array'   => ":attribute 必須少於 <b>:value</b> 個元素。",
    ],
    'lte'                  => [
        'numeric' => ":attribute 必須小於或等於 <b>:value</b>。",
        'file'    => ":attribute 必須小於或等於 <b>:value</b> KB。",
        'string'  => ":attribute 必須少於或等於 <b>:value</b> 個字元。",
        'array'   => ":attribute 必須少於或等於 <b>:value</b> 個元素。",
    ],
    'max'                  => [
        'numeric' => ":attribute 不能大於 :max。",
        'file'    => ":attribute 不能大於 :max KB。",
        'string' => ":attribute 限制最多 :max 個字元。",
        'array'   => ":attribute 最多有 :max 個元素。",
    ],
    'mimes'                => ":attribute 必須為 <b>:values</b> 的檔案。",
    'mimetypes'            => ":attribute 必須為 <b>:values</b> 的檔案。",
    'min'                  => [
        'numeric' => ":attribute 不能小於 <b>:min</b>。",
        'file'    => ":attribute 不能小於 <b>:min</b> KB。",
        'string' => ":attribute 請輸入至少 <b>:min</b> 個字元。",
        'array'   => ":attribute 至少有 <b>:min</b> 個元素。",
    ],
    'multiple_of' => ":attribute 必須是 :value 的倍數。",
    'not_in'               => "所選擇的 :attribute 選項無效。",
    'not_regex'            => ":attribute 的格式錯誤。",
    'numeric'              => ":attribute 必須為一個數字。",
    'password'             => "密碼不正確。",
    'present'              => ":attribute 必須存在。",
    'regex'                => ":attribute 的格式錯誤。",
    'required'             => ":attribute 必須填寫。",
    'required_if'          => "當 :other 是 <b>:value</b> 時 :attribute 必須填寫。",
    'required_unless'      => "當 :other 不是 <b>:values</b> 時 :attribute 必須填寫。",
    'required_with'        => "當 <b>:values</b> 出現時 :attribute 必須填寫。",
    'required_with_all'    => "當 <b>:values</b> 出現時 :attribute 不能為空。",
    'required_without'     => "當 <b>:values</b> 未填寫時 :attribute field 必須填寫。",
    'required_without_all' => "當 <b>:values</b> 未填寫時 :attribute 必須填寫。",
    'prohibited' => "禁止 :attribute 字段。",
    'prohibited_if' => "當 :other 為 :value 時，禁止 :attribute 字段。",
    'prohibited_unless' => "禁止 :attribute 字段，除非 :other 在 :values 中。",
    'same'                 => ":attribute 與 :other 必須相同。",
    'size'                 => [
        'numeric' => ":attribute 的大小必須是 :size。",
        'file'    => ":attribute 的大小必須是 :size KB。",
        'string'  => ":attribute 必須是 :size 個字元。",
        'array'   => ":attribute 必須是 :size 個元素。",
    ],
    'starts_with'          => ":attribute 必須以 <b>:values</b> 其中之一開頭。",
    'string'               => ":attribute 必須是一個字串。",
    'timezone'             => ":attribute 必須是一個正確的時區值。",
    'unique'               => ":attribute 已經存在。",
    'uploaded'             => ":attribute 上傳失敗。",
    'url'                  => ":attribute 的格式錯誤。",
    'uuid'                 => ":attribute 必須是有效的 UUID。",
    'captcha'              => ":attribute 錯誤。",

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
            'rule-name' => "custom-message",
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
        'username'              => "姓名",
        'city'                  => "縣市",
        'township'              => "鄉鎮市區",
        'address'               => "街道地址",
        'phone'                 => "連絡電話",
        'email'                 => "電子郵件",
        'tel'                   => "連絡電話",
        'pid'                   => "身分證",
        'birth'                 => "出生日",
        'textarea'              => "內容",
        'tinymce'               => "內文",
        'account'               => "帳號",
        'age'                   => "年齡",
        'available'             => "可用的",
        'content'               => "內容",
        'country'               => "國家",
        'date'                  => "日期",
        'day'                   => "天",
        'description'           => "描述",
        'excerpt'               => "摘要",
        'firstName'             => "名",
        'gender'                => "性別",
        'hour'                  => "時",
        'lastName'              => "姓",
        'minute'                => "分",
        'mobile'                => "手機",
        'month'                 => "月",
        'name'                  => "名稱",
        'password'              => "密碼",
        'password_confirmation' => "確認密碼",
        'second'                => "秒",
        'sex'                   => "性別",
        'size'                  => "大小",
        'time'                  => "時間",
        'title'                 => "標題",
        'year'                  => "年",
        'captcha'               => "驗證碼",
        'release'               => "狀態",
        'cover'                 => "圖片",
        'link'                  => "連結",
        'link_name'             => "名稱",
        'pdf'                   => "附件",
        'className'             => "職務",
        'school'                => "學歷",
        'captcha'               => "驗證碼", 
    ],

];
