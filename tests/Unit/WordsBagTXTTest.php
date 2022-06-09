<?php

namespace Tests\Unit;

use App\Classes\WordsBagTXT;
use PHPUnit\Framework\TestCase;

class WordsBagTXTTest extends TestCase
{

    /** @test */
    public function loading_test(): void{
        $wb = new WordsBagTXT();
        $wb->load('../../storage/article.txt');
        $this->assertTrue(true);
    }

    /** @test */
    public function get_bag_test(): void{
        $wb = new WordsBagTXT();
        $wb->load('../../storage/article.txt');
        $bag = $wb->get_bag();
        $expected = [
            'فوتبال' => 1,
            'به' => 1,
            'انگلیسی' => 1,
            'Football' => 1,
            'یک' => 1,
            'ورزش' => 1,
            'تیمی' => 1,
            'و' => 1,
            'محبوب' => 1,
            'ترین' => 1,
            'در' => 1,
            'بیشتر' => 1,
            'کشورهای' => 1,
            'جهان' => 1,
            'است' => 1,
            '۴' => 1,
            'را' => 1,
            'دو' => 1,
            'تیم' => 1,
            'یازده' => 1,
            'نفره' => 1,
            'متشکل' => 1,
            'از' => 1,
            'بازیکنان' => 1,
            'با' => 1,
            'توپ' => 1,
            'بر' => 1,
            'روی' => 1,
            'چمن' => 1,
            'طبیعی' => 1,
            'یا' => 1,
            'مصنوعی' => 1,
            'هدف' => 1,
            'گل' => 1,
            'زدن' => 1,
            'انجام' => 1,
            'می' => 1,
            'دهند' => 1,
            'بازیکن' => 1,
            'هر' => 1,
            'شامل' => 1,
            'چند' => 1,
            'مهاجم' => 1,
            'هافبک' => 1,
            'مدافع' => 1,
            'دروازه' => 1,
            'بان' => 1,
            'شوند' => 1,
            'که' => 1,
            'توسط' => 1,
            'سرمربی' => 1,
            'زمین' => 1,
            'چیده' => 1,
            'مانند' => 1,
            'سیستم' => 1,
            'عمل' => 1,
            'کنند' => 1,
            'نامیده' => 1,
            'شود' => 1,
            'امروزه' => 1,
            'بیش' => 1,
            '۲۵۰' => 1,
            'میلیون' => 1,
            'فوتبالیست' => 1,
            '۲۰۰' => 1,
            'کشور' => 1,
            'وجود' => 1,
            'دارد' => 1,
            'قدمت' => 1,
            'چندین' => 1,
            'سده' => 1,
            'پیش' => 1,
            'میلاد' => 1,
            'چین' => 1,
            'بازمی' => 1,
            'گردد' => 1,
            'تدریج' => 1,
            'یونان' => 1,
            'روم' => 1,
            'نیز' => 1,
            'رواج' => 1,
            'یابد' => 1,
            'مدرن' => 1,
            'امروزی' => 1,
            'سال' => 1,
            '۱۸۶۶' => 1,
            'مدارس' => 1,
            'انگلستان' => 1,
            'شکل' => 1,
            'گرفت' => 1,
            'گستره' => 1,
            'پراکندگی' => 1,
            'آن' => 1,
            'همه' => 1,
            'زیر' => 1,
            'پوشش' => 1,
            'خود' => 1,
            'قرارداد' => 1,
            'گیری' => 1,
            'سازمان' => 1,
            'فیفا' => 1,
            '۱۹۰۴' => 1,
            'ایجاد' => 1,
            'رقابت' => 1,
            'جام' => 1,
            'جهانی' => 1,
            'این' => 1,
            'بسیار' => 1,
            'گسترده' => 1,
            'تر' => 1,
            'شد' => 1,
            'طول' => 1,
            '۹۰' => 1,
            'تا' => 1,
            '۱۲۰' => 1,
            'متر' => 1,
            'عرض' => 1,
            '۴۵' => 1,
            'مسابقه' => 1,
            'نیمه' => 1,
            '۴۵دقیقه' => 1,
            'ای' => 1,
            'گیرد' => 1,
            'بازی' => 1,
            'های' => 1,
            'حذفی' => 1,
            'رفت' => 1,
            'برگشتی' => 1,
            'گاهی' => 1,
            'صورت' => 1,
            'تساوی' => 1,
            'نتیجه' => 1,
            'وقت' => 1,
            'اضافه' => 1,
            'پنالتی' => 1,
            'افزوده' => 1,
            'ضوابطی' => 1,
            'قوانین' => 1,
            'نمی' => 1,
            'توان' => 1,
            'خلاف' => 1,
            'ها' => 1,
            'کرد' => 1,
            'علاوه' => 1,
            'نهاد' => 1,
            'رسمی' => 1,
            'فوتسال' => 1,
            'ساحلی' => 1,
            'هست' => 1,
            'کنفدراسیون' => 1,
            'قاره' => 1,
            'یوفا' => 1,
            'ا' => 1,
            'ی' => 1,
            'ف' => 1,
            'سی' => 1,
            'کونکاکاف' => 1,
            'کونمبول' => 1,
            'اف' => 1,
            'زیرشاخه' => 1,
            'هستند' => 1,
            'بزرگ' => 1,
            'رویدادهای' => 1,
            'ورزشی' => 1,
            'چهار' => 1,
            'بار' => 1,
            'یکی' => 1,
            'دهد' => 1,
            'مسابقات' => 1,
            'بین' => 1,
            'المللی' => 1,
            'دیگری' => 1,
            'المپیک' => 1,
            'تابستانی' => 1,
            'باشگاه' => 1,
            'ملت' => 1,
            'اروپا' => 1,
            'لیگ' => 1,
            'قهرمانان' => 1,
            'رایج' => 1,
            'متعددی' => 1,
            'ازجمله' => 1,
            'لا' => 1,
            'لیگا' => 1,
            'برتر' => 1,
            'مختلف' => 1,
            'آمده' => 1,
            'اند' => 1,
            'نوعی' => 1,
            'داخلی' => 1,
            'محسوب' => 1,
            'بانوان' => 1,
            'اواخر' => 1,
            'نوزدهم' => 1,
            'میلادی' => 1,
            'راه' => 1,
            'افتاد' => 1,
            'ادعا' => 1,
            'کند' => 1,
            'وظیفه' => 1,
            'محافظت' => 1,
            'دوپینگ' => 1,
            'خوبی' => 1,
            'پاک' => 1,
            '۲۰۰۴' => 1,
            'منشور' => 1,
            'اخلاقی' => 1,
            'برای' => 1,
            'اجرای' => 1,
            'جوانمردانه' => 1,
            'تصویب' => 1,
            'رساند' => 1,
            'اما' => 1,
            '۲۰۰۶' => 1,
            'بازنگری' => 1,
            'منجر' => 1,
            'تشکیل' => 1,
            'قضایی' => 1,
            'سوم' => 1,
            'گردید' => 1,
            '۵' => 1,
            '' => 1,
        ];
        $this->assertEquals($expected, $bag);
    }

}
