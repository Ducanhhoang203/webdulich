<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
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
use App\Http\Controllers\faqs_chitiet;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\Reviewscontroller;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/quanly', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/danh-muc-san-pham/{catgory_id}',[DanhmucController::class,'showcategory_about'])->name('showcategory_about');
Route::get('/khoa-hoc/{brand_id}',[BrandController::class,'showcategory_brand'])->name('showcategory_brand');
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class,'chi_tiet_san_pham'])->name('chi_tiet_san_pham');

//route home
Route::get('/',[HomeController::class,'index'])->name('home');
// Route đăng nhập
Route::post('/dashboard_admin', [AuthController::class, 'dashboard_admin'])->name('dashboard_admin');


//category product
route::get('/add-cartegory-product',[DanhmucController::class,'add_cartegory_product'])->name('add-cartegory-product'); 
route::get('/all-cartegory-product',[DanhmucController::class,'all_cartegory_product'])->name('all-cartegory-product'); 
route::post('/save-cartegory-product',[DanhmucController::class,'save_cartegory_product'])->name('save-cartegory-product');
Route::get('/edit-cartegory-product/{id}', [DanhmucController::class, 'edit_cartegory_product']);
Route::post('/update-cartegory-product/{id}', [DanhmucController::class, 'update_cartegory_product']);
Route::get('/delete-cartegory-product/{id}', [DanhmucController::class, 'delete_cartegory_product']);
//brand
route::get('/add-brand-product',[BrandController::class,'add_brand_product'])->name('add-brand-product'); 
route::get('/all-brand-product',[BrandController::class,'all_brand_product'])->name('all-brand-product'); 
route::post('/save-brand-product',[BrandController::class,'save_brand_product'])->name('save-brand-product');
Route::get('/edit-brand-product/{id}',[BrandController::class, 'edit_brand_product'])->name('edit_brand_product');
Route::post('/update-brand-product/{id}',[BrandController::class, 'update_brand_product'])->name('update-brand-product');
Route::get('/delete-brand-product/{id}',[BrandController::class, 'delete_brand_product'])->name('delete-brand-product');
//product
route::get('/add-product',[ProductController::class,'add_product'])->name('add-product'); 
route::get('/all-product',[ProductController::class,'all_product'])->name('all-product'); 
route::post('/save-product',[ProductController::class,'save_product'])->name('save-product');
Route::get('/edit-product/{id}',[ProductController::class, 'edit_product'])->name('edit_product');
Route::post('/update-product/{id}',[ProductController::class, 'update_product'])->name('update-product');
Route::get('/delete-product/{id}',[ProductController::class, 'delete_product'])->name('delete-product');
route::get('/abouttwo',[AboutController::class,'index'])->name('abouttwo');
//giang viên
route::get('/add-student',[StudentController::class,'add_student'])->name('add-student'); 
route::get('/all-student',[StudentController::class,'all_student'])->name('all-student'); 
route::post('/save-student',[StudentController::class,'save_student'])->name('save-student');
Route::get('/edit-student/{id}',[StudentController::class, 'edit_student'])->name('edit_student');
Route::post('/update-student/{id}',[StudentController::class, 'update_student'])->name('update-student');
Route::get('/delete-student/{id}',[StudentController::class, 'delete_student'])->name('delete-student');
//chitietkhoahoc
Route::get('/chitietkhoahoc/{product_id}', [ProductController::class, 'detail_product'])->name('chitiet');
Route::get('/add-chitietkhoahoc',[ChitietkhoahocController::class,'add_chitietkhoahoc'])->name('add-chitietkhoahoc');
route::get('/all-chitietkhoahoc',[ChitietkhoahocController::class,'all_chitietkhoahoc'])->name('all-chitietkhoahoc'); 
route::post('/save-chitietkhoahoc',[ChitietkhoahocController::class,'save_chitietkhoahoc'])->name('save-chitietkhoahoc');
Route::get('/edit-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'edit_chitietkhoahoc'])->name('edit_chitietkhoahoc');
Route::post('/update-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'update_chitietkhoahoc'])->name('update-chitietkhoahoc');
Route::get('/delete-chitietkhoahoc/{id}',[ChitietkhoahocController::class, 'delete_chitietkhoahoc'])->name('delete-chitietkhoahoc');
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
Route::get('/add-instructors',[InstructorController::class,'add_instructors'])->name('add-instructors');
route::get('/all-instructors',[InstructorController::class,'all_instructors'])->name('all-instructors'); 
route::post('/save-instructors',[InstructorController::class,'save_instructors'])->name('save-instructors');
Route::get('/edit-instructors/{id}',[InstructorController::class, 'edit_instructors'])->name('edit_instructors');
Route::post('/update-instructors/{id}',[InstructorController::class, 'update_instructors'])->name('update-instructors');
Route::get('/delete-instructors/{id}',[InstructorController::class, 'delete_instructors'])->name('delete-instructors');
//bấm chuyển vào trang chi tiết 
Route::get('/add-faqs-chitiet',[faqs_chitiet::class,'add_faqs_chitiet'])->name('add-faqs-chitiet');
route::get('/all-faqs-chitiet',[faqs_chitiet::class,'all_faqs_chitiet'])->name('all-faqs-chitiet'); 
route::post('/save-faqs-chitiet',[faqs_chitiet::class,'save_faqs_chitiet'])->name('save-faqs-chitiet');
Route::get('/edit-faqs-chitiet/{id}',[faqs_chitiet::class, 'edit_faqs_chitiet'])->name('edit-faqs-chitiet');
Route::post('/update-faqs-chitiet/{id}',[faqs_chitiet::class, 'update_faqs_chitiet'])->name('update-faqs-chitiet');
Route::get('/delete-faqs-chitiet/{id}',[faqs_chitiet::class, 'delete_faqs_chitiet'])->name('delete-faqs-chitiet');
// câu hỏi của trang chi tiêt
Route::get('/add-reviews',[Reviewscontroller::class,'add_reviews'])->name('add-reviews');
route::get('/all-reviews',[Reviewscontroller::class,'all_reviews'])->name('all-reviews'); 
route::post('/save-reviews',[Reviewscontroller::class,'save_reviews'])->name('save-reviews');
Route::get('/edit-reviews/{id}',[Reviewscontroller::class, 'edit_reviews'])->name('edit-reviews');
Route::post('/update-reviews/{id}',[Reviewscontroller::class, 'update_reviews'])->name('update-reviews');
Route::get('/delete-reviews/{id}',[Reviewscontroller::class, 'delete_reviews'])->name('delete-reviews');
// 
  









