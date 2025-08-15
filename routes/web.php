<?php

use App\Http\Controllers\about_section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Baivietcontroller;
use App\Http\Controllers\ChitietkhoahocController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\clients\AboutTwoController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\clients\ChitietController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\galleryhocvienController;
use App\Http\Controllers\blogsController;

use App\Http\Controllers\BlogssiderController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\formdk;
use App\Http\Controllers\SummitController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\faqct;
use App\Http\Controllers\faqs_chitiet;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\Reviewscontroller;
use App\Http\Controllers\galleries;
use App\Http\Controllers\Gallery2Controller;
use App\Http\Controllers\NewsletterController;



Route::get('/quanly', [AuthController::class, 'showLoginForm'])->name('login.form'); // form login
Route::post('/login', [AuthController::class, 'login'])->name('login'); // xử lý login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // logout

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth:admin'); // dashboard admin

Route::get('/danh-muc-san-pham/{catgory_id}',[DanhmucController::class,'showcategory_about'])->name('showcategory_about')->middleware('auth:admin');
Route::get('/khoa-hoc/{brand_id}',[BrandController::class,'showcategory_brand'])->name('showcategory_brand')->middleware('auth:admin');
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class,'chi_tiet_san_pham'])->name('chi_tiet_san_pham')->middleware('auth:admin');

//route home
Route::get('/',[HomeController::class,'index'])->name('home');
// Route đăng nhập
Route::post('/dashboard_admin', [AuthController::class, 'dashboard_admin'])->name('dashboard_admin');


//category product
route::get('/add-cartegory-product',[DanhmucController::class,'add_cartegory_product'])->name('add-cartegory-product')->middleware('auth:admin'); 
route::get('/all-cartegory-product',[DanhmucController::class,'all_cartegory_product'])->name('all-cartegory-product')->middleware('auth:admin'); 
route::post('/save-cartegory-product',[DanhmucController::class,'save_cartegory_product'])->name('save-cartegory-product')->middleware('auth:admin');
Route::get('/edit-cartegory-product/{id}', [DanhmucController::class, 'edit_cartegory_product'])->middleware('auth:admin');
Route::post('/update-cartegory-product/{id}', [DanhmucController::class, 'update_cartegory_product'])->middleware('auth:admin');
Route::get('/delete-cartegory-product/{id}', [DanhmucController::class, 'delete_cartegory_product'])->middleware('auth:admin');
//brand
route::get('/add-brand-product',[BrandController::class,'add_brand_product'])->name('add-brand-product')->middleware('auth:admin'); 
route::get('/all-brand-product',[BrandController::class,'all_brand_product'])->name('all-brand-product')->middleware('auth:admin'); 
route::post('/save-brand-product',[BrandController::class,'save_brand_product'])->name('save-brand-product')->middleware('auth:admin');
Route::get('/edit-brand-product/{id}',[BrandController::class, 'edit_brand_product'])->name('edit_brand_product')->middleware('auth:admin');
Route::post('/update-brand-product/{id}',[BrandController::class, 'update_brand_product'])->name('update-brand-product')->middleware('auth:admin');
Route::get('/delete-brand-product/{id}',[BrandController::class, 'delete_brand_product'])->name('delete-brand-product')->middleware('auth:admin');
//product
route::get('/add-product',[ProductController::class,'add_product'])->name('add-product')->middleware('auth:admin'); 
route::get('/all-product',[ProductController::class,'all_product'])->name('all-product')->middleware('auth:admin'); 
route::post('/save-product',[ProductController::class,'save_product'])->name('save-product')->middleware('auth:admin');
Route::get('/edit-product/{id}',[ProductController::class, 'edit_product'])->name('edit_product')->middleware('auth:admin');
Route::post('/update-product/{id}',[ProductController::class, 'update_product'])->name('update-product')->middleware('auth:admin');
Route::get('/delete-product/{id}',[ProductController::class, 'delete_product'])->name('delete-product')->middleware('auth:admin');
route::get('/abouttwo',[AboutController::class,'index'])->name('abouttwo');
//giang viên
route::get('/add-student',[StudentController::class,'add_student'])->name('add-student')->middleware('auth:admin'); 
route::get('/all-student',[StudentController::class,'all_student'])->name('all-student')->middleware('auth:admin'); 
route::post('/save-student',[StudentController::class,'save_student'])->name('save-student')->middleware('auth:admin');
Route::get('/edit-student/{id}',[StudentController::class, 'edit_student'])->name('edit_student')->middleware('auth:admin');
Route::post('/update-student/{id}',[StudentController::class, 'update_student'])->name('update-student')->middleware('auth:admin');
Route::get('/delete-student/{id}',[StudentController::class, 'delete_student'])->name('delete-student')->middleware('auth:admin');
//chitietkhoahoc
Route::get('/chitietkhoahoc/{product_id}', [ProductController::class, 'detail_product'])->name('chitiet');
Route::get('/add-chitietkhoahoc',[ChitietkhoahocController::class,'add_chitietkhoahoc'])->name('add-chitietkhoahoc')->middleware('auth:admin');
route::get('/all-chitietkhoahoc',[ChitietkhoahocController::class,'all_chitietkhoahoc'])->name('all-chitietkhoahoc')->middleware('auth:admin'); 
route::post('/save-chitietkhoahoc',[ChitietkhoahocController::class,'save_chitietkhoahoc'])->name('save-chitietkhoahoc')->middleware('auth:admin');
Route::get('/edit-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'edit_chitietkhoahoc'])->name('edit_chitietkhoahoc')->middleware('auth:admin');
Route::post('/update-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'update_chitietkhoahoc'])->name('update-chitietkhoahoc')->middleware('auth:admin');
Route::get('/delete-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'delete_chitietkhoahoc'])->name('delete-chitietkhoahoc')->middleware('auth:admin');
// web tinh chua co backend
route::get('/about',[aboutController::class,'About1'])->name('about');
Route::get('/courses',[CoursesController::class,'add_courses']);
route::get('/faq',[FaqController::class,'index'])->name('faq');
route::get('/event',[EventController::class,'index'])->name('Event');
route::get('/gallery',[galleryController::class,'index'])->name('gallery');
route::get('/hocvien',[galleryhocvienController::class,'index'])->name('galleryhocvien');
route::get('/blogs',[blogsController::class,'index'])->name('blogs');
route::get('/blogsider',[BlogssiderController::class,'add_blogsider'])->name('blogsider');
route::get('/contact',[ContacController::class,'index'])->name('contact');
route::get('/Formdk',[formdk::class,'index'])->name('formdk');
route::get('/formsummit',[SummitController::class,'index'])->name('formsummit');
// quản lý giảng viên
// Route::get('/',[ChitietkhoahocController::class,'index']);
Route::get('/add-instructors',[InstructorController::class,'add_instructors'])->name('add-instructors')->middleware('auth:admin');
route::get('/all-instructors',[InstructorController::class,'all_instructors'])->name('all-instructors')->middleware('auth:admin'); 
route::post('/save-instructors',[InstructorController::class,'save_instructors'])->name('save-instructors')->middleware('auth:admin');
Route::get('/edit-instructors/{id}',[InstructorController::class, 'edit_instructors'])->name('edit_instructors')->middleware('auth:admin');
Route::post('/update-instructors/{id}',[InstructorController::class, 'update_instructors'])->name('update-instructors')->middleware('auth:admin');
Route::get('/delete-instructors/{id}',[InstructorController::class, 'delete_instructors'])->name('delete-instructors')->middleware('auth:admin');
//bấm chuyển vào trang chi tiết 
Route::get('/add-faqs-chitiet',[faqs_chitiet::class,'add_faqs_chitiet'])->name('add-faqs-chitiet')->middleware('auth:admin');
route::get('/all-faqs-chitiet',[faqs_chitiet::class,'all_faqs_chitiet'])->name('all-faqs-chitiet')->middleware('auth:admin'); 
route::post('/save-faqs-chitiet',[faqs_chitiet::class,'save_faqs_chitiet'])->name('save-faqs-chitiet')->middleware('auth:admin');
Route::get('/edit-faqs-chitiet/{id}',[faqs_chitiet::class, 'edit_faqs_chitiet'])->name('edit-faqs-chitiet')->middleware('auth:admin');
Route::post('/update-faqs-chitiet/{id}',[faqs_chitiet::class, 'update_faqs_chitiet'])->name('update-faqs-chitiet')->middleware('auth:admin');
Route::get('/delete-faqs-chitiet/{id}',[faqs_chitiet::class, 'delete_faqs_chitiet'])->name('delete-faqs-chitiet')->middleware('auth:admin');
// câu hỏi của trang chi tiêt
Route::get('/add-reviews',[Reviewscontroller::class,'add_reviews'])->name('add-reviews')->middleware('auth:admin');
route::get('/all-reviews',[Reviewscontroller::class,'all_reviews'])->name('all-reviews')->middleware('auth:admin'); 
route::post('/save-reviews',[Reviewscontroller::class,'save_reviews'])->name('save-reviews')->middleware('auth:admin');
Route::get('/edit-reviews/{id}',[Reviewscontroller::class, 'edit_reviews'])->name('edit-reviews')->middleware('auth:admin');
Route::post('/update-reviews/{id}',[Reviewscontroller::class, 'update_reviews'])->name('update-reviews')->middleware('auth:admin');
Route::get('/delete-reviews/{id}',[Reviewscontroller::class, 'delete_reviews'])->name('delete-reviews')->middleware('auth:admin');
// trang chi tiet bai viet
Route::get('/add-baiviet',[Baivietcontroller::class,'add_baiviet'],
      )->name('add-baiviet')->middleware('auth:admin');
route::get('/all-baiviet',[Baivietcontroller::class,'all_baiviet'],)->name('all.baiviet')->middleware('auth:admin'); 
route::post('/save-baiviet',[Baivietcontroller::class,'save_baiviet']
)->name('save-baiviet')->middleware('auth:admin');
Route::get('/edit-baiviet/{id}',[Baivietcontroller::class, 'edit_baiviet'])->name('edit-baiviet')->middleware('auth:admin');
Route::post('/upload-baiviet/{id}',[Baivietcontroller::class, 'upload_baiviet'])->name('upload-baiviet')->middleware('auth:admin');
Route::get('/delete-baiviet/{id}',[Baivietcontroller::class, 'delete_baiviet'])->name('delete-baiviet')->middleware('auth:admin');
Route::get('/chitietbaiviet/{id}',[Baivietcontroller::class ,'chitietbaiviet'])->name('chitietbaiviet')->middleware('auth:admin');
//trang cau hoi
Route::get('/add-faqct',[faqct::class,'add_faqct'])->name('add-faqct')->middleware('auth:admin');
route::get('/all-faqct',[faqct::class,'all_faqct'])->name('all.faqct')->middleware('auth:admin'); 
route::post('/save-faqct',[faqct::class,'save_faqct'])->name('save-faqct')->middleware('auth:admin');
Route::get('/edit-faqct/{id}',[faqct::class, 'edit_faqct'])->name('edit-faqct')->middleware('auth:admin');
Route::post('/update-faqct/{id}',[faqct::class, 'update_faqct'])->name('upload-faqct')->middleware('auth:admin');
Route::get('/delete-faqct/{id}',[faqct::class, 'delete_faqct'])->name('delete-faqct')->middleware('auth:admin');
// trang event
Route::get('/add-event',[EventsController::class,'add_event'])->name('add-event')->middleware('auth:admin');
route::get('/all-event',[EventsController::class,'all_event'])->name('all-event')->middleware('auth:admin'); 
route::post('/save-event',[EventsController::class,'save_event'])->name('save-event')->middleware('auth:admin');
Route::get('/edit-event/{id}',[EventsController::class, 'edit_event'])->name('edit-event')->middleware('auth:admin');
Route::post('/update-event/{id}',[EventsController::class, 'update_event'])->name('upload-event')->middleware('auth:admin');
Route::get('/delete-event/{id}',[EventsController::class, 'delete_event'])->name('event-faqct')->middleware('auth:admin');
Route::get('/blogs/search', [blogsController::class, 'search'])->name('blogs.search');
Route::get('/contact', [ContacController::class, 'index'])->name('contact.form');


Route::post('/contact/send', [ContacController::class, 'send'])->name('contact.send');

// trang section
//trang cau hoi
Route::get('/add-section',[about_section::class,'add_section'])->name('add-section')->middleware('auth:admin');
Route::post('/save-section',[about_section::class,'save_section'])->name('save-section')->middleware('auth:admin');
Route::get('about_sections', [about_section::class, 'all_section'])->name('admin.all_section')->middleware('auth:admin');
Route::get('/admin/about_sections/edit/{id}', [about_section::class, 'edit_section'])->name('admin.edit_section')->middleware('auth:admin');
Route::post('/admin/about_sections/update/{id}', [about_section::class, 'update_section'])->name('admin.update_section')->middleware('auth:admin');
Route::delete('/admin/about_sections/delete/{id}', [about_section::class, 'delete_section'])->name('admin.delete_section')->middleware('auth:admin');
//footer
Route::get('/add-footer',[FooterController::class,'add_footer'])->name('add-reviews')->middleware('auth:admin');
route::get('/all-footer',[FooterController::class,'all_footer'])->name('all-reviews')->middleware('auth:admin'); 
route::post('/save-footer',[FooterController::class,'save_footer'])->name('save-reviews')->middleware('auth:admin');
Route::get('/edit-footer/{id}',[FooterController::class, 'edit_footer'])->name('edit-reviews')->middleware('auth:admin');
Route::post('/update-footer/{id}',[FooterController::class, 'update_footer'])->name('update-reviews')->middleware('auth:admin');
Route::get('/delete-footer/{id}',[FooterController::class, 'delete_footer'])->name('delete-reviews')->middleware('auth:admin');
//hoc vien
Route::get('/add-hocvien', [Gallery2Controller::class, 'add_hocvien'])->middleware('auth:admin');
Route::get('/all-hocvien', [Gallery2Controller::class, 'all_hocvien'])->middleware('auth:admin');
Route::post('/save-hocvien', [Gallery2Controller::class, 'save_hocvien'])->middleware('auth:admin');
Route::get('/edit-hocvien/{id}', [Gallery2Controller::class, 'edit_hocvien'])->middleware('auth:admin');
Route::post('/update-hocvien/{id}', [Gallery2Controller::class, 'update_hocvien'])->middleware('auth:admin');
Route::get('/delete-hocvien/{id}', [Gallery2Controller::class, 'delete_hocvien'])->middleware('auth:admin');
Route::post('/newsletter', [NewsletterController::class, 'sendEmail'])->name('newsletter.send');












