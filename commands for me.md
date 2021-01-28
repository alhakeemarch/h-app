مكتبة الـ PDF
composer require elibyy/tcpdf-laravel

//=========== Visual Studio Code ===============//

<!-- settings.json -->

{
"workbench.colorTheme": "Material Theme Darker High Contrast",
"workbench.iconTheme": "material-icon-theme",
"editor.fontSize": 17,
"editor.minimap.enabled": false,
"blade.format.enable": true,
"editor.wordWrap": "on",
"editor.formatOnSave": true,
"html.format.endWithNewline": true,
"prettier.flattenTernaries": true,
"emmet.triggerExpansionOnTab": true,
"[php]": {
"editor.defaultFormatter": "bmewburn.vscode-intelephense-client"
},
"[html]": {
"editor.defaultFormatter": "vscode.html-language-features"
},
"[blade]": {
"editor.defaultFormatter": "onecentlin.laravel-blade"
},
"[javascript]": {
"editor.defaultFormatter": "vscode.typescript-language-features"
},

"todohighlight.isEnable": true,
"todohighlight.keywords": [
{
"text": "TO:",
"color": "#00BFFF",
"border": "1px solid #F0FFFF",
"borderRadius": "2px", //NOTE: using borderRadius along with `border` or you will see nothing change
"backgroundColor": "rgba(0,0,0,.2)",
},
{
"text": "NOTE:",
"color": "Bisque",
"border": "1px solid #FFCE00",
"borderRadius": "2px", //NOTE: using borderRadius along with `border` or you will see nothing change
"backgroundColor": "rgba(0,0,0,.2)",
},

    ],

    "better-comments.tags": [
        {
            "tag": "!",
            "color": "#FF2D00",
            "strikethrough": false,
            "backgroundColor": "transparent"
        },
        {
            "tag": "?",
            "color": "#3498DB",
            "strikethrough": false,
            "backgroundColor": "transparent"
        },
        {
            "tag": "//",
            "color": "#474747",
            "strikethrough": false,
            "backgroundColor": "transparent"
        },
        {
            "tag": "todo",
            "color": "#FF8C00",
            "strikethrough": false,
            "backgroundColor": "transparent"
        },
        {
            "tag": "*",
            "color": "#000000",
            "strikethrough": false,
            "backgroundColor": "#ffffff"
        },
        {
            "tag": "==",
            "color": "#000000",
            "strikethrough": false,
            "backgroundColor": "#ffff99"
        }
    ]

}

user settings
{
"workbench.iconTheme": "vscode-icons",
"editor.fontSize": 16,
"editor.wordWrap": "on",
"php.validate.run": "onType",
"emmet.triggerExpansionOnTab": true,
"blade.format.enable": true
}

//=========== git commands ===============//
To see Git version
git --version

Tell Git who you are
git config --global user.name "Sam Smith"
git config --global user.email sam@example.com

Create a new local repository
git init

Check out a repository
git clone /path/to/repository
git clone username@host:/path/to/repository

Add files
git add <filename>
git add \*

Commit
git commit -m "Commit message"
git commit -a

Push
git push origin master
git push h-origin master

Status
git status

Connect to a remote repository
git remote add origin https://github.com/*******/******.git
git remote -v

Delete the existing remote repository
git remote rm destination

Rename the existing remote
git remote rename origin destination
git remote rename oldName newName

Change the URL in the local directory of remote repository
git remote set-url origin git@XXXXXXXXXXXX
git remote set-url origin https://github.com/alhakeemarch/h-app.git

Branches
git checkout -b <branchname>
git checkout <branchname>
git branch
git branch -d <branchname>
git push origin <branchname>
git push --all origin
git push origin :<branchname>

Update from the remote repository
git pull
git merge <branchname>
git diff
git diff --base <filename>
git diff <sourcebranch> <targetbranch>
git add <filename>

Tags
git tag 1.0.0 <commitID>
git log
git push --tags origin

Undo local changes
git checkout -- <filename>
git fetch origin
git reset --hard origin/master

Search
git grep "foo()"

//=========== End of git commands ===============//

//=========== composer commands ===============//
composer -v
mv composer.phar /user/local/bin/composer
composer global require laravel/installer

<!-- مكتبة الـ PDF  اللي راح أستخدمها -->

composer require elibyy/tcpdf-laravel

<!-- رابط المكتبة -->

https://github.com/elibyy/tcpdf-laravel

//=========== End of composer commands ===============//

//=========== Laravel commands ===============//
composer global require laravel/installer

to use Auth::user()->user_level;
in any contorller
use Illuminate\Support\Facades\Auth;

==============================================================================
app/providers/AppServiceProvider.php
use Illuminate\Support\Facades\Schema;

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

==============================================================================
add soft delet
\$table->timestamp('deleted_at')->nullable();
==============================================================================

## artisan Commands

composer update
composer require laravel/ui "^2.0"

php artisan
php artisan --version
php artisan make:factory PersonFactory -m Person
php artisan migrate:fresh
php artisan cache:clear
php artisan clear-compiled
composer dump-autoload
php artisan clear
php artisan optimize
php artisan vendor:publish

============================

php artisan tinker

> > > factory(\App\User::class, 20)->create();
> > > factory(\App\User::class, 20)->create();

============================
php artisan make:policy PersonPolicy -m Person
php artisan make:policy CountryPolicy -m Country
php artisan make:policy ProjectPolicy -m Project
php artisan make:policy InvoicePolicy -m Invoice

\\ in class function
$this->authorize('viewAny', $person);
or
\$this->authorize('viewAny', Person::class);

============================
php artisan make:model Person -a
php artisan make:model PersonDoc -a

php artisan make:model Employee -crf
php artisan make:model Customer -crf
php artisan make:model Company -a
php artisan make:model Organization -a
php artisan make:model Endowments -a

php artisan make:model Major -a
php artisan make:model Contact -a
php artisan make:model Address -a

php artisan make:model Project -a
php artisan make:model ProjectDoc -a
php artisan make:model Task -a
php artisan make:model Contract -a
php artisan make:model ContractType -a
php artisan make:model Contractfield -a
php artisan make:model ProjectService -a

php artisan make:model Plot -a
php artisan make:model PlotDoc -a

php artisan make:model Invoice -a
php artisan make:model InvoiceItem -a
php artisan make:model InvoiceDetail -a // not used
php artisan make:model InvoiceReturn -a
php artisan make:model InvoiceReturnDetail -a

php artisan make:model Account -a
php artisan make:model ReceiptIn -a
php artisan make:model ReceiptOut -a
php artisan make:model ReceiptDiscount -a

php artisan make:model Import -a
php artisan make:model Export -a
php artisan make:model Letter -a
php artisan make:model Lettertype -a
php artisan make:model Quotation -a

php artisan make:controller UserController -m 'User' -r

# جداول لحفظ الداتا

php artisan make:model OfficeData -a // بيانات المكتب
php artisan make:model Nationality -a // الجنسيات
php artisan make:model Country -a // الدول
php artisan make:model SaudiCity -a // المدن
php artisan make:model District -a // المناطق الرئيسية بالمدينة
php artisan make:model Neighbor -a // الأحياء
php artisan make:model Plan -a // المخططات
php artisan make:model street -a // الشوارع
php artisan make:model MunicipalityBranch -a // البلدية الفرعية
php artisan make:model AllowedBuildingRatio -a // نسبة البناء
php artisan make:model AllowedBuildingHeight -a // الإرتفاعات
php artisan make:model AllowedUsage -a // الإستخدامات
php artisan make:model ProjectStatus -a // حالة المشروع
php artisan make:model OwnerType -a // نوع المالك
php artisan make:model GradeRank -a // تقدير التخرج
php artisan make:model SceMembershipType -a // نوع العضوية بالهيئة السعودية للمهندسين
php artisan make:model Bank -a // قائمة البنوك
php artisan make:model UserType -a // قائمة انواع المستخدمين
php artisan make:model FileSpecialty -a // قائمة انواع المستخدمين
php artisan make:model SoilLaboratory -a // قائمة بمكاتب تحليل التربة
php artisan make:model PersonTitles -a // قائمة بألقاب العملاء السيد الدكتور المهندس
php artisan make:model ContractClass -a // تصنيف لدرجات العقد
php artisan make:model RepresentativeType -a // تصنيف لدرجات العقد
php artisan make:model ProjectDocType -a // اسماء مستندات المشروع
php artisan make:model OrganizationType -a // نوع الجهة
php artisan make:model ProjectBeneficiary -a // مفوضي المشروع

==============
لعمل علاقة Many to many
php artisan make:migration create_contract_project_table --create contract_project
DROP TABLE contract_project;
==============

# SQL ==> applyed

**CURRENT_TIMESTAMP()**
ALTER TABLE `projects` CHANGE `owner_type` `owner_type_id` BIGINT(20) UNSIGNED NULL DEFAULT '1';
ALTER TABLE `projects` ADD CONSTRAINT projects_owner_type_id_foreign FOREIGN KEY (owner_type_id) REFERENCES owner_types(id);
ALTER TABLE `projects` CHANGE `representative_type` `representative_type_id` BIGINT(20) UNSIGNED NULL ;
ALTER TABLE `projects` ADD CONSTRAINT projects_representative_type_id_foreign FOREIGN KEY (representative_type_id) REFERENCES representative_types(id);
ALTER TABLE `projects`ADD COLUMN `invoicing_address` VARCHAR(191) NULL AFTER `owner_name_en`;
ALTER TABLE `projects`CHANGE `invoicing_address` `invoicing_address_ar` VARCHAR(191) NULL;
ALTER TABLE `projects`ADD COLUMN `invoicing_address_en` VARCHAR(191) NULL AFTER `invoicing_address_ar`;
ALTER TABLE `projects`ADD COLUMN `invoicing_vat_no` BIGINT(20) UNSIGNED NULL AFTER `invoicing_address_en`;
ALTER TABLE `projects` ADD `is_only_supervision` BOOLEAN NULL AFTER `project_type`;

ALTER TABLE `projects` ADD `organization_id` BIGINT(20) UNSIGNED NULL AFTER `person_id`;
ALTER TABLE `projects` ADD CONSTRAINT projects_organization_id_foreign FOREIGN KEY (organization_id) REFERENCES organizations(id);

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `representative_types`ADD COLUMN `authorization_type_ar` VARCHAR(191) NULL AFTER `name_en`;
ALTER TABLE `representative_types`ADD COLUMN `authorization_type_en` VARCHAR(191) NULL AFTER `authorization_type_ar`;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `db_logs`ADD COLUMN `old_record` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `description`;
ALTER TABLE `db_logs`ADD COLUMN `new_record` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `old_record`;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `people` CHANGE `national_id_issue_date` `national_id_issue_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `national_id_expire_date` `national_id_expire_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `pasport_issue_date` `pasport_issue_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `pasport_expire_date` `pasport_expire_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `ah_birth_date` `ah_birth_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `ad_birth_date` `ad_birth_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `ah_hiring_date` `ah_hiring_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `ad_hiring_date` `ad_hiring_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `SCE_membership_type_id` `SCE_membership_type_id` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `SCE_membership_expire_date` `SCE_membership_expire_date` VARCHAR(191) NULL DEFAULT NULL;
ALTER TABLE `people` CHANGE `SCE_classification_expire_date` `SCE_classification_expire_date` VARCHAR(191) NULL DEFAULT NULL;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `person_titles`ADD COLUMN `suffix_ar` VARCHAR(191) NULL AFTER `description_en`;
ALTER TABLE `person_titles`ADD COLUMN `suffix_en` VARCHAR(191) NULL AFTER `suffix_ar`;
ALTER TABLE `person_titles` ADD `prefix_ar` VARCHAR(191) NULL AFTER `id`;
ALTER TABLE `person_titles` ADD `prefix_en` VARCHAR(191) NULL AFTER `prefix_ar`;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `contract_types`ADD COLUMN `view_template` VARCHAR(191) NULL AFTER `description`;
ALTER TABLE `contract_types` ADD `is_in_quick_add` BOOLEAN default FALSE NULL AFTER `view_template`;
ALTER TABLE `contract_types` ADD `has_visit_fee` BOOLEAN default FALSE NULL AFTER `is_in_quick_add`;
ALTER TABLE `contract_types` ADD `has_monthly_fee` BOOLEAN default FALSE NULL AFTER `has_visit_fee`;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `contracts` ADD `is_in_quotation` BOOLEAN default TRUE NULL AFTER `contract_no_acc`;
ALTER TABLE `contracts` ADD `invoice_id` BIGINT(20) UNSIGNED NULL AFTER `contract_class_id`;
ALTER TABLE `contracts` ADD CONSTRAINT contracts_invoice_id_foreign FOREIGN KEY (invoice_id) REFERENCES invoices(id);
ALTER TABLE `contracts` ADD `is_in_invoice` BOOLEAN default FALSE NULL AFTER `is_in_quotation`;
ALTER TABLE `contracts` ADD `print_count` BIGINT(20) UNSIGNED default 0 NULL AFTER `monthly_fee`;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `invoices` DROP `created_by_name`;
ALTER TABLE `invoices` DROP `last_edit_by_name`;
ALTER TABLE `invoices` ADD `invoice_no` BIGINT(20) UNSIGNED UNIQUE AFTER `id`;
ALTER TABLE `invoices` ADD `invoice_no_prefix` VARCHAR(191) AFTER `invoice_no`;
ALTER TABLE `invoices` ADD `project_id` BIGINT(20) UNSIGNED AFTER `invoice_no_prefix`;
ALTER TABLE `invoices` ADD CONSTRAINT invoices_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id);
ALTER TABLE `invoices` ADD `person_id` BIGINT(20) UNSIGNED AFTER `project_id`;
ALTER TABLE `invoices` ADD CONSTRAINT invoices_person_id_foreign FOREIGN KEY (person_id) REFERENCES people(id);
ALTER TABLE `invoices` ADD `organization_id` BIGINT(20) UNSIGNED AFTER `person_id`;
ALTER TABLE `invoices` ADD CONSTRAINT invoices_organization_id_foreign FOREIGN KEY (organization_id) REFERENCES organizations(id);

<!-- ALTER TABLE `invoices` MODIFY COLUMN `organization_id` BIGINT(20) UNSIGNED AFTER `person_id`; -->

ALTER TABLE `invoices` ADD `beneficiary_row_value` VARCHAR(191) AFTER `project_id`;
ALTER TABLE `invoices` ADD `beneficiary_id` VARCHAR(191) AFTER `beneficiary_row_value`;
ALTER TABLE `invoices` ADD `beneficiary_type` VARCHAR(191) AFTER `beneficiary_id`;
ALTER TABLE `invoices` ADD `beneficiary_relation_to_project` VARCHAR(191) AFTER `beneficiary_type`;
ALTER TABLE `invoices` ADD `beneficiary_name_ar` VARCHAR(191) AFTER `beneficiary_relation_to_project`;
ALTER TABLE `invoices` ADD `beneficiary_name_en` VARCHAR(191) AFTER `beneficiary_name_ar`;
ALTER TABLE `invoices` ADD `beneficiary_address_ar` VARCHAR(191) AFTER `beneficiary_name_en`;
ALTER TABLE `invoices` ADD `beneficiary_address_en` VARCHAR(191) AFTER `beneficiary_address_ar`;
ALTER TABLE `invoices` ADD `beneficiary_vat_no` VARCHAR(191) AFTER `beneficiary_address_en`;

ALTER TABLE `invoices` ADD `issued_by_id` BIGINT(20) UNSIGNED AFTER `person_id`;
ALTER TABLE `invoices` ADD CONSTRAINT invoices_issued_by_id_foreign FOREIGN KEY (issued_by_id) REFERENCES people(id);
ALTER TABLE `invoices` ADD `h_date` VARCHAR(191) AFTER `issued_by_id`;
ALTER TABLE `invoices` ADD `g_date` VARCHAR(191) AFTER `h_date`;
ALTER TABLE `invoices` ADD `is_cash` BOOLEAN default FALSE NULL AFTER `g_date`;
ALTER TABLE `invoices` ADD `is_credit` BOOLEAN default FALSE NULL AFTER `is_cash`;
ALTER TABLE `invoices` ADD `total_cost` decimal(12,2) NULL AFTER `is_credit`;
ALTER TABLE `invoices` ADD `vat_percentage` decimal(12,2) NULL AFTER `total_cost`;
ALTER TABLE `invoices` ADD `total_vat_value` decimal(12,2) NULL AFTER `vat_percentage`;
ALTER TABLE `invoices` ADD `total_price_withe_vat` decimal(12,2) NULL AFTER `total_vat_value`;
ALTER TABLE `invoices` ADD `print_count` BIGINT(20) UNSIGNED default 0 NULL AFTER `total_price_withe_vat`;
ALTER TABLE `invoices` ADD `text` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `is_cash`;
ALTER TABLE `invoices` ADD `html` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `is_cash`;
ALTER TABLE `invoices` ADD `html_1` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `is_cash`;

<!-- ------------------------------------------------------------------------ -->

ALTER TABLE `organizations` DROP `created_by_name`, DROP `last_edit_by_name`;
ALTER TABLE `organizations`
ADD `fax_no` varchar(191) NULL AFTER `id`,
ADD `main_phone` varchar(191) NULL AFTER `id`,
ADD `zip_code` bigint(20) NULL AFTER `id`,
ADD `POBox_no` bigint(20) NULL AFTER `id`,
ADD `VAT_account_no` bigint(20) NULL AFTER `id`,
ADD `chamber_of_commerce_id` varchar(191) NULL AFTER `id`,
ADD `is_sub_commercial_registration` tinyint(1) DEFAULT NULL AFTER `id`,
ADD `is_primary_commercial_registration` tinyint(1) DEFAULT NULL AFTER `id`,
ADD `issue_place` varchar(191) NULL AFTER `id`,
ADD `end_date` varchar(191) NULL AFTER `id`,
ADD `issue_date` varchar(191) NULL AFTER `id`,
ADD `headquarter` varchar(191) NULL AFTER `id`,
ADD `authorised_person_name` varchar(191) NULL AFTER `id`,
ADD `nationality_code` varchar(191) NULL AFTER `id`,
ADD `owner_national_id` bigint(20) NULL AFTER `id`,
ADD `owner_name` varchar(191) NULL AFTER `id`,
ADD `commercial_name` varchar(191) NULL AFTER `id`,
ADD `commercial_registration_no` bigint(20) NULL AFTER `id`,
ADD `license_number` varchar(191) NULL AFTER `id`,
ADD `unified_code` varchar(191) NULL AFTER `id`;
ALTER TABLE `organizations`
ADD UNIQUE KEY `organizations_license_number_unique` (`license_number`),
ADD UNIQUE KEY `organizations_unified_code_unique` (`unified_code`),
ADD UNIQUE KEY `organizations_commercial_registration_no_unique` (`commercial_registration_no`);

ALTER TABLE `organizations` ADD `special_code` BIGINT(20) NULL AFTER `commercial_registration_no`;
ALTER TABLE `organizations` ADD UNIQUE KEY `organizations_special_code_unique` (`special_code`);

ALTER TABLE `organizations` ADD `organization_type_id` BIGINT(20) UNSIGNED NULL AFTER `id` ;
ALTER TABLE `organizations` ADD CONSTRAINT organizations_organization_type_id_foreign FOREIGN KEY (organization_type_id) REFERENCES organization_types(id);
ALTER TABLE `organizations` ADD `invoice_address_ar` varchar(191) NULL AFTER `VAT_account_no`;
ALTER TABLE `organizations` ADD `invoice_address_en` varchar(191) NULL AFTER `invoice_address_ar`;

<!-- ------------------------------------------------------------------------ -->

==============

# to do

php artisan make:model DbLog -a // الحركات في قاعدة البيانات
php artisan make:model ProjectLog -a // الحركات على الجداول
php artisan make:model PersonLog -a
php artisan make:model AccuntsLog -a
php artisan make:model Transaction -a
php artisan make:model ReceiptDiscount -a // سند غير محدد متنوع

not neded
php artisan make:model Person -mcr
php artisan make:model Project -mcrf

==============================================================================
// Custom Validations
php artisan make:rule ValidDistrict // حي
php artisan make:rule ValidMunicipalityBranch // بلدية فرعية
php artisan make:rule ValidPlan // مخطط
php artisan make:rule ValidDate // تاريخ
php artisan make:rule ValidGregorianDate // تاريخ ميلادي
php artisan make:rule ValidHijriDate // تاريخ هجري

==============================================================================
for crating Localization middleware
php artisan make:middleware Localization
go to app/Http/middleware/Localization.php
edit as fowing:
public function handle($request, Closure $next)
{
if($request->session()->has('locale')){
        // if(\Session::has('locale')){
            \App::setlocale(\Session::get('locale'));
        }
        return $next($request);
    }
add the new middleware to
app/Http/middleware/kernel.php
to end of this array
protected $middlewareGroups = [
\App\Http\Middleware\Localization::class,
add new rout to:
routes/web.php
Route::get('/locale/{locale}', function ($locale) {
            Session::put('locale', $locale);
return redirect()->back();
});

add link whare you wont
@if (App::isLocale('ar'))
<a href= "locale/en"> English</a>
@else
<a href="locale/ar"> العربية</a>  
 @endif

add language JSON files in
resources/lang/
ar.json
en.json

putt words in json file and call thim by thire keys in your pages
{{__('key')}}
or
@lang('key')
for more details go to:
https://laravel.com/docs/5.7/localization
==============================================================================
php artisan make:middleware isUserActive

==============================================================================

# install composer

install laravel
laravel new hakeemapp
=====================================
app/providers/AppServiceProvider.php

use Illuminate\Support\Facades\Schema;

public function boot()
{
Schema::defaultStringLength(191);
}

=====================================
php artisan make:auth
php artisan maigrate:fresh
=====================================
install nod js
npm install

npm run watch

# npm install admin-lte@v3.0.0-alpha.2 --save

php artisan rout:list

=====================================

Route::resources([
'person' => 'PersonController',
'employee' => 'EmployeeController',
'major' => 'MajorController',
'contact' => 'ContactController',
'banking' => 'BankingController',
'addresse' => 'AddressController',

    'projects' => 'ProjectController',
    'tasks' => 'TaskController',
    'contracts' => 'ContractController',
    'contractfields' => 'ContractfieldController',

    'bills' => 'BillController',
    'paymentin' => 'PaymentinController',
    'paymentout' => 'PaymentoutController',

    'imports' => 'ImportController',
    'exports' => 'ExportController',
    'letters' => 'LetterController',
    'lettertypes' => 'LettertypeController',

]);

/\*
not needed canceld :)

php artisan make:controller PersonController --resource --model=person
php artisan make:controller EmployeesController --resource --model=employee
php artisan make:controller MajorsController --resource --model=major
php artisan make:controller ContactsController --resource --model=contact
php artisan make:controller AddressesController --resource --model=address

php artisan make:controller ProjectsController --resource --model=project
php artisan make:controller TasksController --resource --model=task
php artisan make:controller ContractsController --resource --model=contract
php artisan make:controller ContractfieldsController --resource --model=contractfield

php artisan make:controller BillController --resource --model=bill
php artisan make:controller PaymentinController --resource --model=paymentin
php artisan make:controller PaymentoutController --resource --model=paymentout

php artisan make:controller ImportController --resource --model=import
php artisan make:controller ExportController --resource --model=export
php artisan make:controller LetterController --resource --model=letter
php artisan make:controller LettertypeController --resource --model=lettertype
\*/

//=========== Laravel 6.0 commands ===============//

composer global require laravel/installer Just 1st time
laravel new blog
=====================================
composer require laravel/ui Within your project
php artisan ui vue --auth Within your project
php artisan migrate
=====================================
npm install
npm run watch To run styles and java
=====================================
Create db In database folder
database.sqlite

set a db in .env file

DB_CONNECTION=sqlite

# DB_CONNECTION=mysql

# DB_HOST=127.0.0.1

# DB_PORT=3306

# DB_DATABASE=laravel

# DB_USERNAME=root

# DB_PASSWORD=

=====================================

//=========== End of Laravel 6.0 commands ===============//

//=========== End of Laravel commands ===============//

# to do in app

=====================================
// --- person or employee or customer --- //
soft delet

=====================================
Maximum execution time of 30 seconds exceeded
https://laracasts.com/discuss/channels/general-discussion/maximum-execution-time-of-30-seconds-exceeded?page=1
=====================================

**LIVEWIRE**
composer require livewire/livewire

</head>
@section('head')
    @livewireStyles
@endsection
</head>

<body>
@section('script')
    @livewireScripts
@endsection
</body>

php artisan make:livewire counter

=====================================

@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<!-- ///////////////////////////////-->

@if (\$errors->any())
@include('layouts.errors')
@endif

<!-- ///////////////////////////////-->

@endsection

@section('script')
{{-- // for javascript --}}
@endsection

# stander input structure

<div class="col-md">
    <label for="area">{{__( 'Area')}} <span class="small text-danger">({{__('required')}})</span>
        :</label>
    <input type="text" name="area" class="form-control @error ('area') is-invalid @enderror"
        value="{{old('area') ?? $plot->area }}" onkeypress="onlyNumber(event)" required
        placeholder="{{__( 'Area')}}.." onfocus="this.placeholder=''"
        onblur="this.placeholder='{{__( 'Area')}}..'">
    @error('area')
    <small class="text-danger"> {{$errors->first('area')}} </small>
    @enderror
</div>

================================
required title -----> to add
<x-input name='asd' title="">
<x-slot name='type'>text, textarea, tel, select</x-slot>
<x-slot name='title'>cool tital</x-slot>
<x-slot name='tooltip'>cool tooltip</x-slot>
<x-slot name='placeholder'>cool placeholder</x-slot>
{{-- ------------------------------------------------------- --}}
<x-slot name='input_class'>text-danger</x-slot>
<x-slot name='input_id'>my_id</x-slot>
{{-- ------------------------------------------------------- --}}
<x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
<x-slot name='onkeypress_fun'>userNameString(event)</x-slot>
<x-slot name='onkeypress_fun'>onlyCapitalString(event)</x-slot>
<x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
<x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
<x-slot name='onkeypress_fun'>onlyString(event)</x-slot>
@slot('onkeypress_fun') onlyArabicString(event) @endslot
{{-- ------------------------------------------------------- --}}
<x-slot name='is_required'>true</x-slot>
<x-slot name='is_readonly'>true</x-slot>
{{-- //// if it is disabled then it will not be required or readonly --}}
<x-slot name='is_disabled'>true</x-slot>
<x-slot name='is_hidden'>true</x-slot>
{{-- ------------------------------------------------------- --}}
<x-slot name='input_pattern'>.{2,}</x-slot>
{{-- ////this is for date:01-01-2020 --}}
<x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
{{-- ------------------------------------------------------- --}}
<x-slot name='input_min'>5</x-slot>
<x-slot name='input_max'>10</x-slot>
{{-- ------------------------------------------------------- --}}
<x-slot name='input_value'>{{$person->ar_name1}}</x-slot>
{{-- ------------------------------------------------------- --}}
this is main slot
</x-input>

<hr>

    <x-input name='new' title="2nd title" />

================================

<x-select name='municipality_branche_id' :resource=$project :list=$municipality_branches>
        <x-slot name='option_name'>ar_name</x-slot>
        <x-slot name='title'>{{__('municipality branche')}}</x-slot>
        <x-slot name='is_disabled'>true</x-slot>
        <x-slot name='is_hidden'>true</x-slot>
        <x-slot name='is_required'>true</x-slot>
</x-select>

================================
<x-search_input name='asd'>
{{-- ------------------------------------------------------- --}}
{{-- <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot> --}}
{{-- <x-slot name='onkeypress_fun'>userNameString(event)</x-slot> --}}
{{-- <x-slot name='onkeypress_fun'>onlyCapitalString(event)</x-slot> --}}
{{-- <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot> --}}
{{-- <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot> --}}
{{-- <x-slot name='onkeypress_fun'>onlyString(event)</x-slot> --}}
{{-- @slot('onkeypress_fun') onlyArabicString(event) @endslot  --}}
{{-- ------------------------------------------------------- --}}
</x-search_input>
================================
<x-search_input name='asd' />
================================
<x-select_searchable name='is_address_to_before_owner' title="before owner" :resource=$quotation :list=$municipality_branchs>
<x-slot name='db_data_field'>id</x-slot>
<x-slot name='show_field'>ar_name</x-slot>
<x-slot name='resource_field'>is_address_to_before_owner</x-slot>
<x-slot name='title'>cool tital</x-slot>
<x-slot name='is_required'>true</x-slot>
<x-slot name='is_readonly'>true</x-slot>
</x-select_searchable>
================================
<x-btn btnText=''>
<x-slot name='btn_text'>ok</x-slot>
<x-slot name='btn_text'>
search|view|add|new|save|ok|submit|apply|next|cancel|back|delet|edit|print|download|upload|refresh|reload|re-rendr|sync|reset|toggle-off|toggle-on
</x-slot>
<x-slot name='btn_type'>true</x-slot>
<x-slot name='is_disabled'>true</x-slot>
<x-slot name='is_btn_link'>true</x-slot>
<x-slot name='btn_only_icon'>true</x-slot>
<x-slot name='btn_no_loader'>true</x-slot>
</x-btn>
================================
<x-form-cancel />
<x-form-edit route='organization.edit' :resource=$organization />
<x-form-delete route='organization.destroy' :resource=$organization />

================================

# APP_DEBUG = false
