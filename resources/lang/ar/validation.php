<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => 'يجب قبول :attribute',
    'active_url'           => ':attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون :attribute ًمصفوفة',
    'before'               => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => ':attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'القيمة المحددة :attribute غير موجودة',
    'file'                 => 'الـ :attribute يجب أن يكون ملفا.',
    'filled'               => ':attribute إجباري',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر',
    ],
    'image'                => 'يجب أن يكون :attribute صورةً',
    'in'                   => ':attribute غير موجود',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => ':attribute موجود',
    'not_regex'            => 'صيغة :attribute غير صحيحة.',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم :attribute',
    'regex'                => 'صيغة :attribute .غير صحيحة',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ':attribute مطلوب إذا توفّر :values.',
    'required_without'     => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط',
    ],
    'string'               => 'يجب أن يكون :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة :attribute مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'name'                  => 'الاسم',
        'name_ar'               => 'الاسم (ع)',
        'name_en'               => 'الاسم(E)',

        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'second_name'           => 'إسم الأب',
        'third_name'            => 'إسم الجد',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة السر',
        'password_confirmation' => 'إعادة كلمة السر',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        // custom validation
        'job_number'            => 'الرقم الوظيفي',
        'branch'                => 'الفرع',
        'branch_id'             => 'الفرع',
        'nationality'           => 'الجنسية',
        'nationality_id'        => 'الجنسية',
        'position'              => 'المنصب الإداري',
        'position_id'           => 'المنصب الإداري',
        'parent'                => 'يتبع إدارة',
        'type'                  => 'النوع',
        'number_of_days'        => 'عدد الأيام',
        'subtract_sick_leave'   => 'خصم الإجازات المرضية من النظامية',
        'subtract_emergency_leave'  => 'خصم الإجازات الطارئة من النظامية',
        'active_vacations_after_monthes' => 'المدة الأشهر للإستفادة من الإجازات',
        'notification_before_end_contract' => 'تنبية الموظف قبل نهاية العقد',

        // vacations
        'types.*.nationality' => 'الجنسية',
        'types.*.paid_days' => 'عدد الأيام المدفوعة',
        'types.*.flight_ticket' => 'يستحق تذكرة طيران',
        'types.*.pay_from_salary' => 'تخصم من الراتب',
        'types.*.pay_entry_return_visa' => 'تأشيرة دخول وعودة',
        'types.*.select_nationality' => 'الجنسية',
        'types.*.pay_allowances' => 'بدل الاجازة',
        'types.*.location' => 'مكان الاجازة',
        'types.*.attachments.*.name' => 'نوع المستند',
        'types.*.unpaid_document' => 'الإقرار',

        // insurance
        'authorize_number' => 'رقم المشتغل المرخص',
        'contact_info' => 'اسم المفوض',
        'company' => 'الشركة',
        'start_at' => 'تاريخ البداية',
        'end_at' => 'تاريخ النهاية',
        'insurance_classification' => 'التصنيف',

        // contract
        'temp_date'                 => 'يوم توقيع العقد',
        'temp_m_date'               => 'يوم توقيع العقد',
        'temp_hijry_date'           => 'يوم توقيع العقد هـ',
        'facility'                  => 'المنشأة',
        'first_name_ar'             => 'الإسم الأول (ع)',
        'second_name_ar'            => 'الإسم الأب (ع)',
        'third_name_ar'             => 'الإسم الجد (ع)',
        'last_name_ar'              => 'الإسم العائلة (ع)',
        'first_name_en'             => 'الإسم الأول (En)',
        'second_name_en'            => 'الإسم الأب (En)',
        'third_name_en'             => 'الإسم الجد (En)',
        'last_name_en'              => 'الإسم العائلة (En)',
//        'country'                   => 'الجنسية',
        'passport_date'             => 'تاريخ الجواز',
        'passport_no'               => 'رقم الجواز',
        'address_ar'                => 'العنوان (ع)',
        'address_en'                => 'العنوان (E)',
//        'position'                  => 'نوع الوظيفة',
//        'city'                      => 'المدينة',
        'hours_en'                  => 'عدد ساعات العمل (E)',
        'hours_ar'                  => 'عدد ساعات العمل (ع)',
        'salary'                    => 'الراتب',
        'real_salary'               => 'الراتب الحقيقي',
        'renew_contract_case_ar'    => 'شروط تجديد العقد (ع)',
        'renew_contract_case_en'    => 'شروط تجديد العقد (En)',
        'sp_terminate_contract_ar'  => 'عقوبة فسخ العقد من الطرف الثاني (ع)',
        'sp_terminate_contract_en'  => 'عقوبة فسخ العقد من الطرف الثاني (E)',
        'vacation_punishment_ar'    => 'عقوبة التأخر بالإجازة (ع)',
        'vacation_punishment_en'    => 'عقوبة التأخر بالإجازة (E)',
        'notes_ar'                  => 'ملاحظات أخرى (ع)',
        'notes_en'                  => 'ملاحظات أخرى (E)',
        'vacation'                  => 'الاجازة السنوية',
        'vacation_maturity'         => 'استحقاق الاجازة بعد',
        'contract_type'             => 'نوع العقد',
        'has_residence'             => 'الإقامة',
        'residence_id'              => 'رقم الهوية',
        'residence_finished_at'     => 'تاريخ إنتهاء الإقامة',

//        'start_at' => 'تاريخ بداية العقد',
//        'end_at' => 'تاريخ نهاية العقد',
//        'type' => 'نوع العقد',
        'start_working_at'          => 'تاريخ مباشرة العمل',
//        'salary' => 'الراتب الأساسي',
        'deserved_vacation_after'   => 'إستحقاق الإجازة',
        'tasks'                     => 'المهام',

        'family_members.*.name'     => 'الإسم',
        'family_members.*.type.id'  => 'العلاقة',
        'family_members.*.birthday' => 'تاريخ الميلاد',

        'documents'                 => 'الوثائق',
        'documents.*.name'          => 'عنوان الوثيقة',
        'documents.*.doc.name'      => 'الوثيقة',
        'documents.*.doc.path'      => 'الوثيقة',

        'vacations'                 => 'الإجازات',
        'vacations.*.normal'        => 'نظامية',
        'vacations.*.emergency'     => 'طارئة',
        'vacations.*.sick'          => 'مرضية',
        'vacations.*.unpaid'        => 'بدون أجر',

        'allowances'                => 'البدلات',
        'allowances.*.id'           => 'رقم البدل',
        'allowances.*.type'         => 'نوع البدل',
        'allowances.*.value'        => 'القيمة',
        'allowances.*.months'       => 'صرف البدل كل',

        'privilege'                 => 'المناصب الإدارية',


        //
//        'name_ar' => 'الاسم بالعربي',
//        'name_en' => 'الاسم بالنجليزي',
//        'address' => 'العنوان',
        'commercial_registration_no' => 'رقم السجل التجاري',
        'end_commercial_registration' => 'تاريخ نهاية السجل التجاري',
        'chamber_of_commerce_no' => 'رقم الغرفة التجارية',
        'end_chamber_of_commerce_permit' => 'تاريخ نهاية تصريح الغرفة التجارية',
        'tax_number' => 'الرقم الضريبي',
        'facility_no_in_work_office' => 'رقم المنشأة في مكتب العمل',
        'facility_no_in_insurance' => 'رقم المنشأة في التأمينات',
        'facility_location' => 'موقع المنشأة',
        'chamber_of_commerce_img' => 'صورة الغرفة التجارية',
        'membership_no_img' => 'صورة العضوية',
        'zakka_img' => 'صورة الزكاة',
        'commercial_registration_img' => 'صورة السجل التجاري',
        'has_saudi' => 'صورة السعودة',
        'mailbox' => 'صندوق البريد',
        'tel' => 'رقم التلفون',
        'postcode' => 'الرمز البريدي',
        'number_municipal_license' => 'رقم رخصة البلدية',
        'date_municipal_license_expiry' => 'تاريخ إنتهاء رخصة البلدية',
        'branch_for_vacation' => 'الفرع المطلوب',
        'department' => 'القسم',
        // city
//        'name_ar' => 'الاسم عربي',
//        'name_en' => 'الاسم انجليزي',
        'code' => 'الكود',

        // vacations
        'types.*.attachments' => 'المرفقات',

        //
        'title_ar' => 'العنوان (ar)',
        'title_en' => 'العنوان (en)',
        'description_ar' => 'التفاصيل (ar)',
        'description_en' => 'التفاصيل (en)',

        'charge_user' => 'الموظف المسؤول',

        //
        'insurances.*.age_class.*.age_from' => 'العمر من',
        'insurances.*.age_class.*.age_to' => 'العمر إلى',
        'insurances.*.age_class.*.gender_object.id' => 'الجنس',
        'insurances.*.age_class.*.price' => 'التكلفة',

        //
        'suadipaid' => 'نسبة على السعودي',
        'suadicompany' => 'نسبة على شركة',
        'nonsuadipaid' => 'نسبة على غير السعودي',
        'nonsuadicompany' => 'نسبة على الشركة',
        'number_of_childrens' => 'عدد الأطفال',
//        'user_id' => 'المسؤول عن زياد الحد الأقصى للأولاد',

        'reason' => 'سبب',
        'value' => 'قيمة',
        'payment_time' => 'موعد الصرف',

        //
        'approved_user' => 'المسؤول',

        //
        'avatar' => 'صورة',

        //
//        'phone' => 'الموبايل العام',
        'tax' => 'الرقم الضريبي',
        'commercial_number' => 'رقم السجل التجاري',
        'charge_phone' => 'رقم المسؤول',
        'charge_name' => 'اسم المسؤول',
        'visit_type' => 'نوع الزيارة',
        'first_visit_at' => 'تاريخ أول زيارة',
        'priority' => 'مستوى الأهمية',
        'lat' => 'الموقع على الخريطة (خط الطول)',
        'lng' => 'الموقع على الخريطة (خط العرض)',
        'material_type' => 'نوع مواد المستودع',
        'products.*.id' => 'المنتج',
        'products.*.initial_qty' => 'الكمية الأدنى',
        'products.*.max_qty' => 'الكمية الأقصى',


        'interface_image.path' => 'واجهة المتجر',
        'inside_image.path' => 'صورة من داخل المتجر',
        'panel_image.path' => 'صورة اليافطة',

        'products.*.current_qty' => 'الكمية الحالية',

        //
        'branches_merchandiser' => 'العملاء',
        'branches_merchandiser.*.id' => 'العميل',

        //
//        'start_at' => 'بداية العمل',
        'start_at.A' => 'بداية العمل (صباحا مساءا)',
        'start_at.hh' => 'بداية العمل (الساعة)',
        'start_at.mm' => 'بداية العمل (الدقيقة)',
        'end_at.A' => 'نهاية العمل (صباحا مساءا)',
        'end_at.hh' => 'نهاية العمل (الساعة)',
        'end_at.mm' => 'نهاية العمل (الدقيقة)',
//        'end_at' => 'نهاية العمل',
        'delay' => 'الحد الأقصى للتأخير',
        'danger_color' => 'أهمية قصوى',
        'warning_color' => 'أهمية عالية جداً',
        'medium_color' => 'أهمية عالية',
        'normal_color' => 'أهمية عادية',
        'time_edit_visit' => 'الوقت المسموح فيه لتعديل الزيارة',
        'notifications_to' => 'موظف التنبيهات',
        'warehouse_notifications_to' => 'تبيهات الموظفين للمستودعات الفارغة',
        'warehouse_notifications_to.*.id' => 'تبيهات الموظفين للمستودعات الفارغة',

        'm_branches' => 'الفروع',
        'emails' => 'المرسل إليهم',

        'merchandiser' => 'ماشيندايزر',
        'from' => 'من ',
        'to' => 'إلى ',
        'rdate' => 'التاريخ',

        'charge' => 'الموظف المسؤول',
        'facility_id' => 'المنشأة',

        'warehouse_receive' => 'المستودع المرسل له',
        'delegate' => 'المندوب المرسل له',

//        'branches_merchandiser' => 'العملاء',
//        'branches_merchandiser.*.id' => 'العميل',
        'has_discount' => 'له خصم على الفواتير',
        'discount_value' => 'نسبة الخصم',

        'clients' => 'العملاء',
        'clients.*.id' => 'العميل',

        //
        'bill_format_start' => 'شكل الفاتورة',
        'bill_format_number' => 'شكل الفاتورة',

        'latt' => 'الموقع',
        'langg' => 'الموقع',
        'img_warehouse' => 'صورة المستودع',
        'img_befor' => 'صورة الرف',

        'bill_type' => 'نوع الفاتورة',

        'receipt_value' => 'المبلغ',
        'receive_way' => 'طريقة السداد',

        'admin_note' => 'ملاحظات',
        'sale_id' => 'مندوب المبيعات',

        'deduction_from_salary' => 'خصم من الراتب',

        'max_non_payment_bills_for_day' => 'عدد الأيام',
        'date_first_collection' => 'تاريخ أول التحصيل',
        'send_receipt_way' => 'الألية',
        'warehouse_id' => 'المستودع',
        'qty' => 'الكمية',
        'qty_sent' => 'الكمية المرسلة',


        'price' => 'السعر',

        'piece_num' => 'عدد القطع',
        'piece_price' => 'سعر القطعة الواحدة',

        'id_no' => 'رقم الهوية',
        'id_expired_at' => 'تاريخ إنتهاء الهوية',

        'sale_manger_monthly_visits_target' => 'الهدف الشهري لزيارات مدير المبيعات',

//        'purchase_order' => [
//            'order_number'=> 'Order number',
//            'release_date'=> 'تاريخ الإصدار',
//        ],


    ],

];
