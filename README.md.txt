# Charitize Platform 🌍❤️

**Charitize** هي منصة تقنية متكاملة تهدف إلى رقمنة العمل الخيري وتسهيل وصول التبرعات للمشاريع الإنسانية عبر حلول برمجية آمنة وشفافة.

## 🎯 أهداف المشروع (Project Objectives)
* **تسهيل التبرع:** واجهة بسيطة تمكن المتبرع من دعم أي مشروع خلال ثوانٍ.
* **الشفافية المالية:** تتبع دقيق لكل عملية تبرع وربطها بمشروع محدد.

## 🏗️ التصميم الهندسي وقاعدة البيانات
تم بناء هيكلية البيانات بناءً على علاقات هندسية متينة لضمان كفاءة النظام:

![مخطط قاعدة البيانات (ERD)](screenshots/database_schema.png)

* **العلاقات (Relationships):**
    * **Users & Donations:** علاقة (One-to-Many).
    * **Projects & Donations:** علاقة (One-to-Many).
    * **Payments:** استخدام (Polymorphic Relations) لربط بوابات الدفع (Stripe/PayPal).

## 🛠️ التقنيات المستخدمة (Tech Stack)
* **Framework:** Laravel 12 (PHP 8.x)
* **Database:** MySQL
* **Payment Integration:** Stripe API & PayPal SDK

## 👨‍💻 المطور
**محمد إيهاب (Mohammed Bin Ehab)** - طالب هندسة برمجيات - جامعة الأزهر.