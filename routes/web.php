<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
// =======================
// AUTH & ADMIN LOGIN
// =======================
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginuserController;

// =======================
// GENERAL CONTROLLERS
// =======================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChitietkhoahocController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\blogsController;
use App\Http\Controllers\BlogssiderController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\galleryhocvienController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\Reviewscontroller;
use App\Http\Controllers\Baivietcontroller;
use App\Http\Controllers\faqct;
use App\Http\Controllers\faqs_chitiet;
use App\Http\Controllers\SummitController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Desnation2Controller;
use App\Http\Controllers\Destination_detailController;
use App\Http\Controllers\tour_detailController;
use App\Http\Controllers\bs5Controller;
use App\Http\Controllers\Gallery2Controller;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\about_section;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\WishlistController;

// =======================
// BOOKING / PAYMENT / VNPAY
// =======================
use App\Http\Controllers\BookingController;
use App\Http\Controllers\formdk;
use App\Http\Controllers\VnpayController;

// =======================
// SOCIAL LOGIN
// =======================
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudentController;
// =======================
// TOUR LIST
// =======================
use App\Http\Controllers\TourlistController;

// ====================================================================================================
// PUBLIC ROUTES
// ====================================================================================================
use App\Http\Controllers\ChatController;
Route::get('/chat', function () {
    return view('chat');
});



// --- HOME & STATIC PAGES ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'About1'])->name('about');
Route::get('/courses', [CoursesController::class, 'add_courses']);
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/event', [EventController::class,'index'])->name('Event');
Route::get('/gallery', [galleryController::class,'index'])->name('gallery');
Route::get('/Destination', [galleryhocvienController::class,'index'])->name('galleryhocvien');
Route::get('/blogs', [blogsController::class,'index'])->name('blogs');
Route::get('/blogs/search', [blogsController::class, 'search'])->name('blogs.search');
Route::get('/blogsider', [BlogssiderController::class,'add_blogsider'])->name('blogsider');
Route::get('/contact', [ContacController::class, 'index'])->name('contact.form');
Route::post('/contact/send', [ContacController::class, 'send'])->name('contact.send');
Route::get('/formsummit', [SummitController::class,'index'])->name('formsummit');
Route::get('/destail', [formdk::class,'index'])->name('formdk');
Route::post('/tour/{product}/review', [ReviewController::class, 'store'])
     ->name('tour.review.store');
 Route::get('/chitietbaiviet/{id}',[Baivietcontroller::class ,'chitietbaiviet'])->name('chitietbaiviet'); // Đã có route public
// --- PRODUCT/TOUR DETAILS ---
Route::get('/danh-muc-san-pham/{catgory_id}', [DanhmucController::class, 'showcategory_about'])->name('showcategory_about');
Route::get('/khoa-hoc/{brand_id}', [BrandController::class, 'showcategory_brand'])->name('showcategory_brand');
Route::get('/Chi-tiet-tour/{product_id}', [ProductController::class, 'detail_product'])->name('detail_product');
Route::get('/chitietkhoahoc/{product_id}', [ProductController::class, 'detail_product'])->name('chitiet');
Route::get('/tourlist', [TourlistController::class, 'index'])->name('tourlist');
Route::get('/product/search', [HomeController::class, 'search'])->name('search.product');
Route::get('/destination2',[Desnation2Controller::class,'index'])->name('destination2');
Route::get('/Destination-detail', [Destination_detailController::class,'index'])->name('destination_detail');
Route::get('/tour-detail', [tour_detailController::class,'index'])->name('tour_detail');

// --- USER AUTH ---
Route::get('/dangnhap', [UserAuthController::class, 'showLogin'])->name('dangnhap');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
Route::post('/dangnhap', [UserAuthController::class, 'login'])->name('dangnhap.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
Route::get('/loginuser', [LoginuserController::class, 'index'])->name('loginuser');
// routes/api.php



// --- SOCIAL LOGIN ---
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

// --- FORGOT PASSWORD ---
Route::get('/quen-mat-khau', [ForgotPasswordController::class,'showForgotForm'])->name('password.forgot');
Route::post('/quen-mat-khau', [ForgotPasswordController::class,'sendCode'])->name('password.sendCode');
Route::get('/xac-nhan-ma', [ForgotPasswordController::class,'showVerifyForm'])->name('password.verifyForm');
Route::post('/xac-nhan-ma', [ForgotPasswordController::class,'verifyCode'])->name('password.verifyCode');
Route::get('/dat-lai-mat-khau', [ForgotPasswordController::class,'showResetForm'])->name('password.resetForm');
Route::post('/dat-lai-mat-khau', [ForgotPasswordController::class,'resetPassword'])->name('password.reset');
 Route::get('/my-bookings', [BookingController::class, 'userHistory'])->name('user.bookings');
Route::middleware(['auth'])->group(function () {
    Route::put('/bookinguser/cancel/{id}', [BookingController::class, 'canceluser'])->name('bookinguser.cancel');
});
// --- NEWSLETTER ---
Route::post('/newsletter', [NewsletterController::class,'sendEmail'])->name('newsletter.send');


// ====================================================================================================
// USER-AUTHENTICATED ROUTES (Cần đăng nhập USER)
// ====================================================================================================
Route::middleware('auth')->group(function () {
    // --- BOOKING ---
    Route::post('/booking/{product_id}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/checkout/{id}', [BookingController::class, 'checkout'])->name('booking.checkout');
    Route::post('/booking/process-offline', [BookingController::class,'processOffline'])->name('booking.process_offline');
    Route::get('/booking/success', function () {
        return view('clients.booking_success');
    })->name('booking.success');
    Route::get('/booking/{id}/confirmation', [BookingController::class,'confirmation'])->name('booking.confirmation');

    // --- WISHLIST ---
    Route::get('/yeu-thich/{id}', [WishlistController::class,'addToWishlist'])->name('wishlist.add');
    Route::get('/yeu-thich', [WishlistController::class,'showWishlist'])->name('wishlist.show');
    Route::get('/top-yeu-thich', [WishlistController::class,'topWishlist'])->name('wishlist.top');

    // --- PROFILE (USER PANEL) ---
    Route::get('/bs5', [bs5Controller::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [bs5Controller::class, 'update'])->name('profile.update');
    Route::post('/profile/update-avatar', [bs5Controller::class, 'updateAvatar'])->name('profile.updateAvatar');
    Route::post('/profile/password', [bs5Controller::class, 'updatePassword'])->name('profile.password');

    // --- VNPAY PAYMENT ---
    Route::get('/vnpay/demo', function () {
        return view('clients.vnpay.demo');
    });
    Route::post('/vnpay/create-payment', [VnPayController::class,'createPayment'])->name('vnpay.create');
    Route::get('/vnpay/return', [VnPayController::class,'vnpayReturn'])->name('vnpay.return');
});

// ====================================================================================================
// ADMIN ROUTES - LOGIN & DASHBOARD
// ====================================================================================================
use App\Http\Middleware\CheckAdminLevel;
use Symfony\Component\Routing\Router;

Route::get('/quanly', [AuthController::class,'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class,'login'])->name('login');



// Admin Logout cần được bảo vệ để chỉ admin đã đăng nhập mới gọi được
Route::post('/admin/logout', [AuthController::class,'logout'])->name('admin.logout')->middleware('auth:admin');

// Dashboard: Tối thiểu Level 2 (tất cả admin đều xem được)
Route::get('/dashboard', [AuthController::class,'dashboard'])
    ->middleware(CheckAdminLevel::class . ':2')
    ->name('dashboard');

// ====================================================================================================
// ADMIN ROUTES - PHÂN QUYỀN THEO LEVEL
// ====================================================================================================


// ----------------------------------------------------------------------------------------------------
// NHÓM 1: LEVEL 0 (TOÀN QUYỀN: CRUD + XÓA/DUYỆT NHẠY CẢM)
// ----------------------------------------------------------------------------------------------------
Route::middleware(['auth:admin', CheckAdminLevel::class . ':0'])->group(function () {

    // --- CATEGORY ---
    route::get('/add-cartegory-product',[DanhmucController::class,'add_cartegory_product'])->name('add-cartegory-product'); 
    route::post('/save-cartegory-product',[DanhmucController::class,'save_cartegory_product'])->name('save-cartegory-product');
    Route::get('/edit-cartegory-product/{id}', [DanhmucController::class, 'edit_cartegory_product'])->name('edit-cartegory-product');
    Route::post('/update-cartegory-product/{id}', [DanhmucController::class, 'update_cartegory_product'])->name('update-cartegory-product');
    Route::get('/delete-cartegory-product/{id}', [DanhmucController::class, 'delete_cartegory_product'])->name('delete-cartegory-product');
    
    // --- BRAND ---
    route::get('/add-brand-product',[BrandController::class,'add_brand_product'])->name('add-brand-product'); 
    route::post('/save-brand-product',[BrandController::class,'save_brand_product'])->name('save-brand-product');
    Route::get('/edit-brand-product/{id}',[BrandController::class, 'edit_brand_product'])->name('edit_brand_product');
    Route::post('/update-brand-product/{id}',[BrandController::class, 'update_brand_product'])->name('update-brand-product');
    Route::get('/delete-brand-product/{id}',[BrandController::class, 'delete_brand_product'])->name('delete-brand-product');
    
    // --- PRODUCT ---
    route::get('/add-product',[ProductController::class,'add_product'])->name('add-product'); 
    route::post('/save-product',[ProductController::class,'save_product'])->name('save-product');
    Route::get('/edit-product/{id}',[ProductController::class, 'edit_product'])->name('edit_product');
    Route::post('/update-product/{id}',[ProductController::class, 'update_product'])->name('update-product');
    Route::get('/delete-product/{id}',[ProductController::class, 'delete_product'])->name('delete-product');
    
    // --- STUDENT (Giảng viên) ---
    route::get('/add-student',[StudentController::class,'add_student'])->name('add-student'); 
    route::post('/save-student',[StudentController::class,'save_student'])->name('save-student');
    Route::get('/edit-student/{id}',[StudentController::class, 'edit_student'])->name('edit_student');
    Route::post('/update-student/{id}',[StudentController::class, 'update_student'])->name('update-student');
    Route::get('/delete-student/{id}',[StudentController::class, 'delete_student'])->name('delete-student');

    // --- CHI TIẾT KHÓA HỌC ---
    Route::get('/add-chitietkhoahoc',[ChitietkhoahocController::class,'add_chitietkhoahoc'])->name('add-chitietkhoahoc');
    route::post('/save-chitietkhoahoc',[ChitietkhoahocController::class,'save_chitietkhoahoc'])->name('save-chitietkhoahoc');
    Route::get('/edit-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'edit_chitietkhoahoc'])->name('edit_chitietkhoahoc');
    Route::post('/update-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'update_chitietkhoahoc'])->name('update-chitietkhoahoc');
    Route::get('/delete-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'delete_chitietkhoahoc'])->name('delete-chitietkhoahoc');
    //
     Route::get('/add-admin', [AuthController::class, 'add_admin_form'])->name('add_admin.form');
    Route::post('/add-admin', [AuthController::class, 'store_admin'])->name('store_admin');
    // --- INSTRUCTOR ---
    Route::get('/add-instructors',[InstructorController::class,'add_instructors'])->name('add-instructors');
    route::post('/save-instructors',[InstructorController::class,'save_instructors'])->name('save-instructors');
    Route::get('/edit-instructors/{id}',[InstructorController::class, 'edit_instructors'])->name('edit_instructors');
    Route::post('/update-instructors/{id}',[InstructorController::class, 'update_instructors'])->name('update-instructors');
    Route::get('/delete-instructors/{id}',[InstructorController::class, 'delete_instructors'])->name('delete-instructors');

    // --- REVIEW ---
    Route::get('/add-reviews',[Reviewscontroller::class,'add_reviews'])->name('add-reviews');
    route::post('/save-reviews',[Reviewscontroller::class,'save_reviews'])->name('save-reviews');
    Route::get('/edit-reviews/{id}',[Reviewscontroller::class, 'edit_reviews'])->name('edit-reviews');
    Route::post('/update-reviews/{id}',[Reviewscontroller::class, 'update_reviews'])->name('update-reviews');
    Route::get('/delete-reviews/{id}',[Reviewscontroller::class, 'delete_reviews'])->name('delete-reviews');

    // --- BÀI VIẾT (Blog) ---
    Route::get('/add-baiviet',[Baivietcontroller::class,'add_baiviet'])->name('add-baiviet');
    route::post('/save-baiviet',[Baivietcontroller::class,'save_baiviet'])->name('save-baiviet');
    Route::get('/edit-baiviet/{id}',[Baivietcontroller::class, 'edit_baiviet'])->name('edit-baiviet');
    Route::post('/upload-baiviet/{id}',[Baivietcontroller::class, 'upload_baiviet'])->name('upload-baiviet');
    Route::get('/delete-baiviet/{id}',[Baivietcontroller::class, 'delete_baiviet'])->name('delete-baiviet');
   

    // --- FAQ DETAIL ---
    Route::get('/add-faqs-chitiet',[faqs_chitiet::class,'add_faqs_chitiet'])->name('add-faqs-chitiet');
    route::post('/save-faqs-chitiet',[faqs_chitiet::class,'save_faqs_chitiet'])->name('save-faqs-chitiet');
    Route::get('/edit-faqs-chitiet/{id}',[faqs_chitiet::class, 'edit_faqs_chitiet'])->name('edit-faqs-chitiet');
    Route::post('/update-faqs-chitiet/{id}',[faqs_chitiet::class, 'update_faqs_chitiet'])->name('update-faqs-chitiet');
    Route::get('/delete-faqs-chitiet/{id}',[faqs_chitiet::class, 'delete_faqs_chitiet'])->name('delete-faqs-chitiet');

    // --- FAQ CT ---
    Route::get('/add-faqct',[faqct::class,'add_faqct'])->name('add-faqct');
    route::post('/save-faqct',[faqct::class,'save_faqct'])->name('save-faqct');
    Route::get('/edit-faqct/{id}',[faqct::class, 'edit_faqct'])->name('edit-faqct');
    Route::post('/update-faqct/{id}',[faqct::class, 'update_faqct'])->name('upload-faqct');
    Route::get('/delete-faqct/{id}',[faqct::class, 'delete_faqct'])->name('delete-faqct');

    // --- EVENT ---
    Route::get('/add-event',[EventsController::class,'add_event'])->name('add-event');
    route::post('/save-event',[EventsController::class,'save_event'])->name('save-event');
    Route::get('/edit-event/{id}',[EventsController::class, 'edit_event'])->name('edit-event');
    Route::post('/update-event/{id}',[EventsController::class, 'update_event'])->name('upload-event');
    Route::get('/delete-event/{id}',[EventsController::class, 'delete_event'])->name('delete-event');

    // --- ABOUT SECTION ---
    Route::get('/add-section',[AboutSectionController::class,'create'])->name('add-section');
    Route::post('/save-section',[AboutSectionController::class,'store'])->name('save-section');
    Route::get('/admin/about_sections/edit/{id}', [AboutSectionController::class, 'edit'])->name('admin.edit_section');
    Route::post('/admin/about_sections/update/{id}', [AboutSectionController::class, 'update'])->name('admin.update_section');
    Route::delete('/admin/about_sections/delete/{id}', [AboutSectionController::class, 'destroy'])->name('admin.delete_section');

    // --- FOOTER ---
    Route::get('/add-footer',[FooterController::class,'add_footer'])->name('add-footer');
    route::post('/save-footer',[FooterController::class,'save_footer'])->name('save-footer');
    Route::get('/edit-footer/{id}',[FooterController::class, 'edit_footer'])->name('edit-footer');
    Route::post('/update-footer/{id}',[FooterController::class, 'update_footer'])->name('update-footer');
    Route::get('/delete-footer/{id}',[FooterController::class, 'delete_footer'])->name('delete-footer');

    // --- HỌC VIÊN (Gallery 2) ---
    Route::get('/add-hocvien', [Gallery2Controller::class, 'add_hocvien'])->name('add-hocvien');
    Route::post('/save-hocvien', [Gallery2Controller::class, 'save_hocvien'])->name('save-hocvien');
    Route::get('/edit-hocvien/{id}', [Gallery2Controller::class, 'edit_hocvien'])->name('edit-hocvien');
    Route::post('/update-hocvien/{id}', [Gallery2Controller::class, 'update_hocvien'])->name('update-hocvien');
    Route::get('/delete-hocvien/{id}', [Gallery2Controller::class, 'delete_hocvien'])->name('delete-hocvien');

    // --- MENU ---
    Route::get('menus/add', [MenuController::class,'create'])->name('menus.create');
    Route::post('menus/store', [MenuController::class,'store'])->name('menus.store');
    Route::get('menus/edit/{id}', [MenuController::class,'edit'])->name('menus.edit');
    Route::post('menus/update/{id}', [MenuController::class,'update'])->name('menus.update');
    Route::get('menus/delete/{id}', [MenuController::class,'destroy'])->name('menus.destroy');

    // --- BANNER ---
    Route::get('/add-banner', [BannerController::class, 'add_banner'])->name('add-banner');
    Route::post('/save-banner', [BannerController::class, 'save_banner'])->name('save-banner');
    Route::get('/edit-banner/{id}', [BannerController::class, 'edit_banner'])->name('edit-banner');
    Route::post('/update-banner/{id}', [BannerController::class, 'update_banner'])->name('update-banner');
    Route::get('/delete-banner/{id}', [BannerController::class, 'delete_banner'])->name('delete-banner');
    // --- ADMIN MANAGEMENT ---
   Route::get('/edit-admin/{id}', [AuthController::class, 'edit_admin'])->name('edit_admin');
Route::post('/update-admin/{id}', [AuthController::class, 'update_admin'])->name('update_admin');
Route::get('/delete-admin/{id}', [AuthController::class, 'delete_admin'])->name('delete_admin');
    // --- DUYỆT BOOKING NHẠY CẢM ---
    Route::post('/admin/bookings/{id}/approve', [BookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::post('/admin/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('admin.bookings.cancel');

    // --- RESOURCE ROUTES (CRUD đầy đủ, cho các Controller chưa có route lẻ) ---
    Route::resource('/faqs-chitiet', faqs_chitiet::class);
    Route::resource('/reviews', Reviewscontroller::class);
    // Route::resource('/baiviet', Baivietcontroller::class); // Đã có route lẻ
    Route::resource('/faqct', faqct::class);
    Route::resource('/events', EventsController::class);
    Route::resource('/about_sections', AboutSectionController::class)->except(['index', 'show']); // Index/Show đã có ở Level 2
    Route::resource('/footer', FooterController::class)->except(['index', 'show']);
    Route::resource('/hocvien', Gallery2Controller::class)->except(['index', 'show']);
    Route::resource('/menus', MenuController::class)->except(['index', 'show']);
    Route::resource('/banner', BannerController::class)->except(['index', 'show']);
    route::resource('/all-faqs-chitiet',faqs_chitiet::class);
      Route::resource('discount', App\Http\Controllers\Admin\DiscountCodeController::class);

});


// ----------------------------------------------------------------------------------------------------
// NHÓM 2: LEVEL 1 (QUẢN LÝ NỘI DUNG: Thêm/Sửa/Cập nhật)
// ----------------------------------------------------------------------------------------------------
Route::middleware(['auth:admin', CheckAdminLevel::class . ':1'])->group(function () {

    // Cho phép Level 1 thực hiện các hành động Create/Store/Edit/Update cho Bài viết
  Route::get('/add-baiviet', [Baivietcontroller::class,'add_baiviet'])->name('add-baiviet');
Route::post('/save-baiviet', [Baivietcontroller::class,'save_baiviet'])->name('save-baiviet');
Route::get('/edit-baiviet/{id}', [Baivietcontroller::class,'edit_baiviet'])->name('edit-baiviet');
Route::post('/update-baiviet/{id}', [Baivietcontroller::class,'update_baiviet'])->name('update-baiviet');
 route::get('/add-product',[ProductController::class,'add_product'])->name('add-product'); 
    route::post('/save-product',[ProductController::class,'save_product'])->name('save-product');
    Route::get('/edit-product/{id}',[ProductController::class, 'edit_product'])->name('edit_product');
    Route::post('/update-product/{id}',[ProductController::class, 'update_product'])->name('update-product');


});


// ----------------------------------------------------------------------------------------------------
// NHÓM 3: LEVEL 2 (XEM/ĐỌC DỮ LIỆU) - Dành cho tất cả Admin (0, 1, 2)
// ----------------------------------------------------------------------------------------------------
Route::middleware(['auth:admin', CheckAdminLevel::class . ':2'])->group(function () {

    // --- VIEW ONLY LISTS (all-*) ---
    Route::get('/all-cartegory-product', [DanhmucController::class,'all_cartegory_product'])->name('all-cartegory-product');
    Route::get('/all-brand-product', [BrandController::class,'all_brand_product'])->name('all-brand-product');
    Route::get('/all-product', [ProductController::class,'all_product'])->name('all-product');
    Route::get('/all-student', [StudentController::class,'all_student'])->name('all-student');
    Route::get('/all-chitietkhoahoc', [ChitietkhoahocController::class,'all_chitietkhoahoc'])->name('all-chitietkhoahoc');
    Route::get('/all-instructors', [InstructorController::class,'all_instructors'])->name('all-instructors');
    route::get('/all-reviews',[Reviewscontroller::class,'all_reviews'])->name('all-reviews'); 
    route::get('/all-baiviet',[Baivietcontroller::class,'all_baiviet'])->name('all.baiviet'); 
    route::get('/all-faqct',[faqct::class,'all_faqct'])->name('all.faqct'); 
    route::get('/all-event',[EventsController::class,'all_event'])->name('all-event'); 
    Route::get('about_sections', [AboutSectionController::class, 'index'])->name('admin.all_section');
    route::get('/all-footer',[FooterController::class,'all_footer'])->name('all-footer'); 
    Route::get('/all-hocvien', [Gallery2Controller::class, 'all_hocvien'])->name('all-hocvien');
    Route::get('/all-banner', [BannerController::class, 'all_banner'])->name('all-banner');
    Route::get('/all-menus', [MenuController::class,'index'])->name('menus.index');
    Route::get('/all_admin', [AuthController::class,'all_admin'])->name('all_admin'); 
    // --- BOOKING VIEW (Level 2) ---
    Route::get('/admin/bookings', [BookingController::class,'index'])->name('admin.bookings.index');
    Route::get('/offline-waiting', [BookingController::class,'indexwating'])->name('offline-waiting');

    // --- RESOURCE INDEX/SHOW (View Only) ---
    Route::resource('/faqs-chitiet', faqs_chitiet::class)->only(['index', 'show']);
    // Route::resource('/reviews', Reviewscontroller::class)->only(['index', 'show']); // đã có all-reviews
    // Route::resource('/baiviet', Baivietcontroller::class)->only(['index', 'show']); // đã có all-baiviet
    // Route::resource('/faqct', faqct::class)->only(['index', 'show']); // đã có all-faqct
    // Route::resource('/events', EventsController::class)->only(['index', 'show']); // đã có all-event
    Route::resource('/about_sections', AboutSectionController::class)->only(['index', 'show']);
    Route::resource('/footer', FooterController::class)->only(['index', 'show']);
    Route::resource('/hocvien', Gallery2Controller::class)->only(['index', 'show']);
    Route::resource('/menus', MenuController::class)->only(['index', 'show']);
    Route::resource('/banner', BannerController::class)->only(['index', 'show']);
    
    
});