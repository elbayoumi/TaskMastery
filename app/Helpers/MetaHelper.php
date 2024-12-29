<?php
use Illuminate\Support\Facades\Cache;

if (!function_exists('get_meta_data')) {
    function get_meta_data()
    {
        // قراءة البيانات من الـ Cache أو من الملف
        $metaData = Cache::remember('meta_data_routes', 60, function () {
            return include resource_path('meta/routes_meta.php');
        });

        // الحصول على الميتا للراوت الحالي
        $currentRoute = \Route::currentRouteName();
        return $metaData[$currentRoute] ?? $metaData['home'];  // استخدم الميتا الافتراضية في حالة عدم العثور على بيانات
    }
}
