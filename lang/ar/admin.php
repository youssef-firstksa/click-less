<?php

return [
    'general' => [
        'dashboard' => 'لوحة التحكم',
        'action' => 'إجراء',
        'create' => 'إنشاء',
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'submit' => 'إرسال',
        'add' => 'إضافة',
        'remove' => 'إزالة',
        'update' => 'تحديث',
        'add_new' => 'إضافة جديد',
        'show' => 'عرض',
        'activated' => 'مفعل',
        'disabled' => 'معطل',
        'status' => 'الحالة',
        'table_id' => '#',
        'search' => 'بحث',
        'all' => 'الكل',
        'select' => 'اختر',
        'back' => 'الرجوع',
        'confirm' => 'تأكيد',
        'cancel' => 'الغاء',
    ],
    'messages' => [
        'success' => [
            'title' => 'تم بنجاح!',
            'created' => 'تم إنشاء :resource بنجاح',
            'updated' => 'تم تحديث :resource بنجاح',
            'deleted' => 'تم حذف :resource بنجاح',
        ],
        'error' => [
            'title' => 'حدث خطأ!',
            'create' => 'فشل في إنشاء :resource',
            'update' => 'فشل في تحديث :resource',
            'delete' => 'فشل في حذف :resource',
        ],
        'confirm' => [
            'delete' => [
                'title' => 'تأكيد عملية الحذف',
                'description' => 'هل أنت متأكد أنك تريد حذف هذا العنصر؟',
            ],
        ],
    ],
    'permissions_management' => [
        'sidebar_title' => 'إدارة الصلاحيات',
        'index_title' => 'قائمة الصلاحيات',
        'create_title' => 'إضافة صلاحية جديدة',
        'edit_title' => 'تعديل الصلاحية',
        'delete_title' => 'حذف الصلاحية',
        'show_title' => 'عرض الصلاحية',

        'form' => [
            'title' => 'العنوان',
            'description' => 'الوصف',
            'status' => 'الحالة',
        ],
    ],
    'admins_management' => [
        'sidebar_title' => 'إدارة المسؤولين',
        'index_title' => 'قائمة المسؤولين',
        'create_title' => 'إضافة مسؤول جديد',
        'edit_title' => 'تعديل بيانات المسؤول',
        'delete_title' => 'حذف المسؤول',
        'show_title' => 'عرض المسؤول',

        'form' => [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة المرور',
            'password_confirmation' => 'تأكيد كلمة المرور',
            'role' => 'الدور',
            'status' => 'الحالة',
        ],
    ],
    'bank_management' => [
        'sidebar_title' => 'إدارة بنك المعرفة',
        'index_title' => 'قائمة البنوك',
        'create_title' => 'إنشاء بنك جديد',
        'edit_title' => 'تعديل بنك',
        'delete_title' => 'Delete Bank',
        'show_title' => 'Show Bank',
        'form' => [

            'title' => 'العنوان',
            'description' => 'وصف البنك',
            'font_color' => 'لون الخط',
            'background_color' => 'لون الخلفية',
            'logo' => 'الشعار',
            'image' => 'الصورة',
            'ai_key' => 'مفتاح الذكاء الاصطناعي',
            'status' => 'الحالة',
        ],
    ],
];
