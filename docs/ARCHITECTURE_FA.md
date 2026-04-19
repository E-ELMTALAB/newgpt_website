# معماری پروژه فروشگاه اشتراک دیجیتال (Laravel + Blade + Filament)

## 1) معماری کلان
- **Monolith ساده Laravel**: بدون فرانت‌اند جداگانه.
- **SSR با Blade**: خروجی سریع و SEO-friendly.
- **Filament** برای مدیریت محصولات، سفارش‌ها، محتوا و تنظیمات.
- **MySQL/SQLite** برای داده‌های اصلی کسب‌وکار.

## 2) مدل داده
- Category ← hasMany → Product
- Order ← hasMany → OrderItem → belongsTo Product
- BlogPost, Page, Faq, ContactMethod, SiteSetting

## 3) مسیرهای عمومی
- `/` خانه
- `/products` لیست محصولات
- `/products/{slug}` جزئیات محصول
- `/checkout/{product}` تسویه مستقیم تک‌محصول
- `/checkout/result/{order}` نتیجه پرداخت
- `/blog`، `/blog/{slug}`
- `/contact`
- `/page/{slug}`

## 4) فلو بدون سبد خرید
Product Detail → Checkout → Order Create → Payment Callback (simulated) → Success

## 5) نکات عملیاتی
- دیپلوی استاندارد Laravel روی Apache یا Nginx.
- بدون وابستگی به معماری headless.
- قابل اجرا با `php artisan serve` برای محیط ساده.
