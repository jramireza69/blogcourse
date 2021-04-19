<?php

use App\Helpers\RouteResource;

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::post(
    'stripe/webhook',
    'StripeWebHookController@handleWebhook'
);

Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
    Route::get('/', 'CourseController@index')->name('index');
    Route::post('/search', 'CourseController@search')->name('search');
    Route::get('/{course}', 'CourseController@show')->name('show');
    Route::get('/{course}/learn', 'CourseController@learn')
        ->name('learn')->middleware("can_access_to_course");

    Route::get('/{course}/review', 'CourseController@createReview')
        ->name('reviews.create');
    Route::post('/{course}/review', 'CourseController@storeReview')
        ->name('reviews.store');

    Route::get('/category/{category}', 'CourseController@byCategory')
        ->name('category'); 
        Route::group(["prefix" => "{course}/topics", 'as' => 'topics.', "middleware" => ["can_access_to_course"]], function () {
            Route::get('/', 'TopicController@index')->name('index');
            Route::get('/json', 'TopicController@json')->name('json');
            Route::post('/', 'TopicController@store')->name('store');
        });
});

Route::group(['prefix' => 'teacher', 'as' => 'teacher.', 'middleware' => ['teacher']], function () {
    Route::get('/', 'TeacherController@index')
        ->name('index');

    /**
     * COURSE ROUTES
     */
    (new RouteResource([
        "controller" => "TeacherController",
        "path" => "courses",
        "routes" => ["index", "create", "store", "edit", "update"]
    ]))->generator();

    /**
     * UNIT ROUTES
     */
    (new RouteResource([
        "controller" => "TeacherController",
        "path" => "units",
        "routes" => ["index", "create", "store", "edit", "update", "destroy"]
    ]))->generator();

    /**
     * COUPONS
     */
    (new RouteResource([
        "controller" => "TeacherController",
        "path" => "coupons",
        "routes" => ["index", "create", "store", "edit", "update", "destroy"]
    ]))->generator();

    (new RouteResource([
        "controller" => "TeacherController",
        "path" => "profits",
        "routes" => ["index"]
    ]))->generator();
});

Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth']], function () {
    Route::get('/', 'StudentController@index')->name('index');

    Route::get("credit-card", 'BillingController@creditCardForm')
        ->name("billing.credit_card_form");
    Route::post("credit-card", 'BillingController@processCreditCardForm')
        ->name("billing.process_credit_card");

    Route::get('/courses', 'StudentController@courses')
        ->name('courses');

    Route::get('/orders', 'StudentController@orders')
        ->name('orders');
    Route::get('/orders/{order}', 'StudentController@showOrder')
        ->name('orders.show');
    Route::get('/orders/{order}/download_invoice', 'StudentController@downloadInvoice')
        ->name('orders.download_invoice');

    Route::put('/wishlist/{course}/toggle', 'StudentController@toggleItemOnWishlist')
        ->name('wishlist.toggle');

    Route::get('/wishlists', 'StudentController@meWishlist')
        ->name('wishlist.me');
    Route::get('/wishlists/{id}/destroy', 'StudentController@destroyWishlistItem')
        ->name('wishlist.destroy');
});

Route::get('/add-course-to-cart/{course}', 'StudentController@addCourseToCart')
    ->name('add_course_to_cart');
Route::get('/cart', 'StudentController@showCart')
    ->name('cart');
Route::get('/remove-course-from-cart/{course}', 'StudentController@removeCourseFromCart')
    ->name('remove_course_from_cart');

Route::post('/apply-coupon', 'StudentController@applyCoupon')
    ->name('apply_coupon');

Route::group(["middleware" => ["auth"]], function () {
    Route::get('/checkout', 'CheckoutController@index')
        ->name('checkout_form');
    Route::post('/checkout', 'CheckoutController@processOrder')
        ->name('process_checkout');
});
