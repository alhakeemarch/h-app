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
git add *

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

to use  Auth::user()->user_level;
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
$table->timestamp('deleted_at')->nullable();
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
>>> factory(\App\User::class, 20)->create();
>>> factory(\App\User::class, 20)->create();

============================
php artisan make:policy PersonPolicy -m Person
php artisan make:policy CountryPolicy -m Country

\\ in class function
$this->authorize('viewAny', $person);
or
$this->authorize('viewAny', Person::class);





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
php artisan make:model Contractfield -a

php artisan make:model Plot -a
php artisan make:model PlotDoc -a

php artisan make:model Invoice -a
php artisan make:model InvoiceDetail -a
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

php artisan make:controller UserController -m 'User' -r

# جداول لحفظ الداتا
php artisan make:model Nationality -a  // الجنسيات
php artisan make:model Country -a  // الدول
php artisan make:model SaudiCity -a  // المدن
php artisan make:model District -a  // المناطق الرئيسية بالمدينة
php artisan make:model Neighbor -a  // الأحياء
php artisan make:model Plan -a  // المخططات
php artisan make:model street -a  // الشوارع
php artisan make:model MunicipalityBranch -a  // البلدية الفرعية
php artisan make:model AllowedBuildingRatio -a  // نسبة البناء
php artisan make:model AllowedBuildingHeight -a  // الإرتفاعات
php artisan make:model AllowedUsage -a  // الإستخدامات
php artisan make:model OwnerType -a  // نوع المالك
php artisan make:model GradeRank -a  // تقدير التخرج
php artisan make:model SceMembershipType -a  // نوع العضوية بالهيئة السعودية للمهندسين
php artisan make:model Bank -a  // قائمة البنوك
php artisan make:model UserType -a  // قائمة انواع المستخدمين
php artisan make:model FileSpecialty -a  // قائمة انواع المستخدمين

============== 
# to do
php artisan make:model DbLog -a  // الحركات في قاعدة البيانات
php artisan make:model ProjectLog -a  // الحركات على الجداول
php artisan make:model PersonLog -a
php artisan make:model AccuntsLog -a
php artisan make:model Transaction -a
php artisan make:model ReceiptDiscount -a  // سند غير محدد متنوع






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

install composer
=====================================
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

npm install admin-lte@v3.0.0-alpha.2 --save
=====================================
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

/*
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
*/



//=========== Laravel 6.0 commands ===============//

composer global require laravel/installer	Just 1st time
laravel new blog	
=====================================		
composer require laravel/ui	Within your project
php artisan ui vue --auth	Within your project
php artisan migrate	
=====================================
npm install	
npm run watch	To run styles and java
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
// --- plot --- //



=====================================
Maximum execution time of 30 seconds exceeded
https://laracasts.com/discuss/channels/general-discussion/maximum-execution-time-of-30-seconds-exceeded?page=1
=====================================





@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')





<!-- ///////////////////////////////-->
@if ($errors->any())
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
    <x-input name='asd' title="">
        <x-slot name='type'>text, textarea, select</x-slot>
        <x-slot name='title'>cool tital</x-slot>
        <x-slot name='tooltip'>cool tooltip</x-slot>
        <x-slot name='placeholder'>cool placeholder</x-slot>
        {{-- ------------------------------------------------------- --}}
        {{-- <x-slot name='input_class'>text-danger</x-slot> --}}
        {{-- <x-slot name='input_id'>my_id</x-slot> --}}
        {{-- ------------------------------------------------------- --}}
        {{-- <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
        <x-slot name='onkeypress_fun'>userNameString(event)</x-slot>
        <x-slot name='onkeypress_fun'>onlyCapitalString(event)</x-slot>
        <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
        <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
        <x-slot name='onkeypress_fun'>onlyString(event)</x-slot>
        @slot('onkeypress_fun') onlyArabicString(event) @endslot --}}
        {{-- ------------------------------------------------------- --}}
        <x-slot name='is_required'>true</x-slot>
        {{-- <x-slot name='is_readonly'>true</x-slot> --}}
        {{-- //// if it is disabled then it will not be required or readonly --}}
        {{-- <x-slot name='is_disabled'>true</x-slot> --}}
        {{-- <x-slot name='is_hidden'>true</x-slot> --}}
        {{-- ------------------------------------------------------- --}}
        {{-- <x-slot name='input_pattern'>.{2,}</x-slot> --}}
        {{-- ////this is for date:01-01-2020 --}}
        {{-- <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot> --}}

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
# APP_DEBUG = false