<?php
use App\Http\Controllers\Admin\{CategoryController,SubCategoryController, PostController, PageController, SiteSettingController, InboxController, SliderController};
use App\Http\Controllers\{FrontendController, BackendController, UserController};
use Illuminate\Support\Facades\Route;

// Category Routes
Route::get("/category/index", [CategoryController::class, 'index'])->name("category.index");
Route::get("/category/create", [CategoryController::class, 'create'])->name("category.create");
Route::post("/category/store", [CategoryController::class, 'store'])->name("category.store");
Route::get("/category/edit/{id}", [CategoryController::class, 'edit'])->name("category.edit");
Route::post("/category/update/{id}", [CategoryController::class, 'update'])->name("category.update");
Route::get("/category/delete/{id}", [CategoryController::class, 'destroy'])->name("category.delete");

// subcategory routes
Route::get("/subcategory/index", [SubCategoryController::class, 'index'])->name("subcategory.index");
Route::get("/subcategory/create", [SubCategoryController::class, 'create'])->name("subcategory.create");
Route::post("/subcategory/store", [SubCategoryController::class, 'store'])->name("subcategory.store");
Route::get("/subcategory/edit/{id}", [SubCategoryController::class, 'edit'])->name("subcategory.edit");
Route::post("/subcategory/update/{id}", [SubCategoryController::class, 'update'])->name("subcategory.update");
Route::get("/subcategory/delete/{id}", [SubCategoryController::class, 'destroy'])->name("subcategory.delete");
//__ posts routes __//
Route::get("/admin.posts/index", [PostController::class, "index"])->name("post.index");
Route::get("/admin.posts/create", [PostController::class, "create"])->name("post.create");
Route::post("/admin.posts/store", [PostController::class, "store"])->name("post.store");
Route::get("/admin.posts/edit/{id}", [PostController::class, 'edit'])->name("post.edit");
Route::post("/admin.posts/update/{id}", [PostController::class, 'update'])->name("post.update");
Route::get("/admin.posts/delete/{id}", [PostController::class, 'destroy'])->name("post.delete");
// change theme routes
Route::get("/admin.themes", [BackendController:: class, "showThemes"])->name("admin.themes");
Route::post("/admin.theme/store", [BackendController:: class, "updateTheme"])->name("theme.store");
// users routes
Route::get("/admin.users", [UserController:: class, "index"])->name("admin.users");
Route::get("/admin/user/delete/{id}", [UserController:: class, "destroy"])->name("admin.user.delete");

// pages routes
Route::resource('pages', PageController::class);

//site_setting routes
Route::get("site/edit/logo_&_favicon", [SiteSettingController::class, "editLogoFavicon"])->name("site.edit-logo_favicon");
Route::put("site/update/logo_&_favicon", [SiteSettingController::class, "updateLogoFavicon"])->name("site.update-logo_favicon");

Route::get("site/edit/social-media", [SiteSettingController::class, "editSocialMedia"])->name("site.edit-social");
Route::put("site/update/social-media", [SiteSettingController::class, "updateSocialMedia"])->name("site.update-social");

Route::get("site/edit/copyright", [SiteSettingController::class, "editCopyright"])->name("site.edit-copyright");
Route::put("site/update/copyright", [SiteSettingController::class, "updateCopyright"])->name("site.update-copyright");

// inbox routes
Route::get("/admin/mail/mailbox",  [InboxController::class, "index"])->name("admin.mailbox");
Route::get("/admin/mail/read/{id}",  [InboxController::class, "show"])->name("admin.readmail");
Route::get("/admin/mail/compose",  [InboxController::class, "create"])->name("admin.composemail");
Route::get("/admin/mail/reply/{id}",  [InboxController::class, "replyMail"])->name("admin.replymail");
Route::get("/admin/mail/delete/{id}",  [InboxController::class, "delete"])->name("admin.deletemail");

// slider route
Route::resource('slider', SliderController::class);