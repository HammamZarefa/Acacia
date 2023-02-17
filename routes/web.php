<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'SiteController@index')->name('home');
Route::post('subscribe', 'SiteController@subscribe')->name('subscribe');
Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit')->name('contact.send');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');
Route::get('blog', 'SiteController@blogs')->name('blog.details');
Route::get('extra/{id}', 'SiteController@extraDetails')->name('extra.details');
Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');
Route::get('projectlist', 'SiteController@projects')->name('project.list');
//Route::get('/{slug}', 'SiteController@pages')->name('pages');
Route::get('blogshow/{id}', 'SiteController@blogShow')->name('blog.show');
Route::get('projectdetails/{id}', 'SiteController@projectdetails')->name('project.show');
//Route::get('blogs', 'SiteController@blog')->name('blogs');
Route::get('about', 'SiteController@about')->name('about');
Route::get('services', 'SiteController@services')->name('services');


//Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
//    Route::post('paypal', 'paypal\ProcessController@ipn')->name('paypal');
//    Route::get('paypal_sdk', 'paypal_sdk\ProcessController@ipn')->name('paypal_sdk');
//    Route::post('perfect_money', 'perfect_money\ProcessController@ipn')->name('perfect_money');
//    Route::post('stripe', 'stripe\ProcessController@ipn')->name('stripe');
//    Route::post('stripe_js', 'stripe_js\ProcessController@ipn')->name('stripe_js');
//    Route::post('stripe_v3', 'stripe_v3\ProcessController@ipn')->name('stripe_v3');
//    Route::post('skrill', 'skrill\ProcessController@ipn')->name('skrill');
//    Route::post('paytm', 'paytm\ProcessController@ipn')->name('paytm');
//    Route::post('payeer', 'payeer\ProcessController@ipn')->name('payeer');
//    Route::post('paystack', 'paystack\ProcessController@ipn')->name('paystack');
//    Route::post('voguepay', 'voguepay\ProcessController@ipn')->name('voguepay');
//    Route::get('flutterwave/{trx}/{type}', 'flutterwave\ProcessController@ipn')->name('flutterwave');
//    Route::post('razorpay', 'razorpay\ProcessController@ipn')->name('razorpay');
//    Route::post('instamojo', 'instamojo\ProcessController@ipn')->name('instamojo');
//    Route::get('blockchain', 'blockchain\ProcessController@ipn')->name('blockchain');
//    Route::get('blockio', 'blockio\ProcessController@ipn')->name('blockio');
//    Route::post('coinpayments', 'coinpayments\ProcessController@ipn')->name('coinpayments');
//    Route::post('coinpayments_fiat', 'coinpayments_fiat\ProcessController@ipn')->name('coinpayments_fiat');
//    Route::post('coingate', 'coingate\ProcessController@ipn')->name('coingate');
//    Route::post('coinbase_commerce', 'coinbase_commerce\ProcessController@ipn')->name('coinbase_commerce');
//    Route::get('mollie', 'mollie\ProcessController@ipn')->name('mollie');
//    Route::post('cashmaal', 'cashmaal\ProcessController@ipn')->name('cashmaal');
//});

// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::get('/', 'TicketController@supportTicket')->name('ticket');
    Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login.auh');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        Route::get('notification/read/{id}','AdminController@notificationRead')->name('notification.read');
        Route::get('notifications','AdminController@notifications')->name('notifications');

//        // Users Manager
//        Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
//        Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
//        Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
//        Route::get('users/email-verified', 'ManageUsersController@emailVerifiedUsers')->name('users.emailVerified');
//        Route::get('users/email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('users.emailUnverified');
//        Route::get('users/sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('users.smsUnverified');
//        Route::get('users/sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('users.smsVerified');
//
//        Route::get('users/{scope}/search', 'ManageUsersController@search')->name('users.search');
//        Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('users.detail');
//        Route::post('user/update/{id}', 'ManageUsersController@update')->name('users.update');
//        Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('users.addSubBalance');
//        Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
//        Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('users.email.single.send');
//        Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
//        Route::get('user/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
//        Route::get('user/deposits/via/{method}/{type?}/{userId}', 'ManageUsersController@depViaMethod')->name('users.deposits.method');
//        // Login History
//        Route::get('users/login/history/{id}', 'ManageUsersController@userLoginHistory')->name('users.login.history.single');
//
//        Route::get('users/send-email', 'ManageUsersController@showEmailAllForm')->name('users.email.all');
//        Route::post('users/send-email', 'ManageUsersController@sendEmailAll')->name('users.email.send');
//

        // Subscriber
        Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
        Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
        Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendmail');



//        // Deposit Gateway
//        Route::name('gateway.')->prefix('gateway')->group(function(){
//            // Automatic Gateway
//            Route::get('automatic', 'GatewayController@index')->name('automatic.index');
//            Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
//            Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
//            Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
//            Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
//            Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');
//
//
//
//            // Manual Methods
//            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
//            Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
//            Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store');
//            Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
//            Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
//            Route::post('manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
//            Route::post('manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
//        });


//        // DEPOSIT SYSTEM
//        Route::name('deposit.')->prefix('deposit')->group(function(){
//            Route::get('/', 'DepositController@deposit')->name('list');
//            Route::get('pending', 'DepositController@pending')->name('pending');
//            Route::get('rejected', 'DepositController@rejected')->name('rejected');
//            Route::get('approved', 'DepositController@approved')->name('approved');
//            Route::get('successful', 'DepositController@successful')->name('successful');
//            Route::get('details/{id}', 'DepositController@details')->name('details');
//
//            Route::post('reject', 'DepositController@reject')->name('reject');
//            Route::post('approve', 'DepositController@approve')->name('approve');
//            Route::get('via/{method}/{type?}', 'DepositController@depViaMethod')->name('method');
//            Route::get('/{scope}/search', 'DepositController@search')->name('search');
//            Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');
//
//        });

//        // Report
//        Route::get('report/transaction', 'ReportController@transaction')->name('report.transaction');
//        Route::get('report/transaction/search', 'ReportController@transactionSearch')->name('report.transaction.search');
//        Route::get('report/login/history', 'ReportController@loginHistory')->name('report.login.history');
//        Route::get('report/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('report.login.ipHistory');
//
//
        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');
        Route::get('/language/search', 'LanguageController@searchForStrings')->name('language.search');



        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');


//        //API settings
//        Route::get('api-settings', 'GeneralSettingController@apiSettings')->name('apiSettings');
//        Route::post('api-settings-update', 'GeneralSettingController@apiSettingsUpdate')->name('apiSettings.update');
//        Route::get('api-test', 'GeneralSettingController@apiTest')->name('apiTest');

        // General Setting
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon.store');

        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');

//
//        // Email Setting
//        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
//        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global.update');
//        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
//        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting.update');
//        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
//        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
//        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
//        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.sendTestMail');


//        // SMS Setting
//        Route::get('sms-template/global', 'SmsTemplateController@smsSetting')->name('sms.template.global');
//        Route::post('sms-template/global', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.global.update');
//        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
//        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
//        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
//        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.sendTestSMS');

        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');

        //Projects
        Route::resource('projects',ProjectController::class);

//Project Category
        Route::resource('project-categories', ProjectCategoryController::class);

        //Post Categories
        Route::resource('pcategories', PcategoryController::class);
        //Tag
        Route::resource('tags', TagController::class);
        //Posts
        Route::resource('posts',PostController::class);
        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');



            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });
});




/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/

//
//Route::name('user.')->group(function () {
//    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//    Route::post('/login', 'Auth\LoginController@login');
//    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//
//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');
//
//    Route::group(['middleware' => ['guest']], function () {
//        Route::get('register/{reference}', 'Auth\RegisterController@referralRegister')->name('refer.register');
//    });
//    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code_verify');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');
//});
//
//Route::name('user.')->prefix('user')->group(function () {
//    Route::middleware('auth')->group(function () {
//        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
//        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send_verify_code');
//        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify_email');
//        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify_sms');
//        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');
//
//        Route::middleware(['checkStatus'])->group(function () {
//            Route::get('dashboard', 'UserController@home')->name('home');
//
//            Route::get('profile-setting', 'UserController@profile')->name('profile-setting');
//            Route::post('profile-setting', 'UserController@submitProfile');
//            Route::get('change-password', 'UserController@changePassword')->name('change-password');
//            Route::post('change-password', 'UserController@submitPassword');
//
//            //2FA
//            Route::get('twofactor', 'UserController@show2faForm')->name('twofactor');
//            Route::post('twofactor/enable', 'UserController@create2fa')->name('twofactor.enable');
//            Route::post('twofactor/disable', 'UserController@disable2fa')->name('twofactor.disable');
//
//        });
//    });
//});
//


