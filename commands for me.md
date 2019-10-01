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
 ## artisan Commands

php artisan
php artisan make:factory PersonFactory -m Person
php artisan migrate:fresh
php artisan cache:clear

============================

php artisan tinker
>>> factory(\App\User::class, 20)->create();
>>> factory(\App\User::class, 20)->create();

============================
php artisan make:policy PersonPolicy -m Person

\\ in class function
$this->authorize('viewAny', $person);
or
$this->authorize('viewAny', Person::class);





============================
php artisan make:model Person -a
php artisan make:model PersonDoc -a

php artisan make:model Employee -crf
php artisan make:model Customer -crf

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

============== 
# to do
php artisan make:model ProjectActivity -a  // الحركات على الجداول
php artisan make:model PersonActivity -a
php artisan make:model AccuntsActivity -a
php artisan make:model Transaction -a

php artisan make:model ReceiptDiscount -a  // سند غير محدد متنوع




not neded 
php artisan make:model Person -mcr
php artisan make:model Project -mcrf

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














INSERT INTO `people` (`id`, `national_id`, `is_employee`, `is_customer`, `ar_name1`, `ar_name2`, `ar_name3`, `ar_name4`, `ar_name5`, `en_name1`, `en_name2`, `en_name3`, `en_name4`, `en_name5`, `mobile`, `phone`, `phone_extension`, `email`, `nationaltiy_id`, `nationaltiy_ar`, `nationaltiy_en`, `hafizah_no`, `national_id_issue_date`, `national_id_exp_date`, `national_id_issue_place`, `pasport_no`, `pasport_issue_date`, `pasport_id_exp_date`, `pasport_id_issue_place`, `ah_birth_date`, `ad_birth_date`, `birth_place`, `birth_city`, `created_at`, `updated_at`) VALUES (NULL, '1000676971', '1', '0', 'عبدالرزاق', NULL, NULL, NULL, 'حكيم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'athakim@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);