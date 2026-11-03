<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\compressPdfController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExceltoPdfController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\pdftojpgController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JpgToPdfController;
use App\Http\Controllers\MergePdfController;
use App\Http\Controllers\pdfSummerizeController;
use App\Http\Controllers\pdftoWordController;
use App\Http\Controllers\WordConverterController;

// use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Public Routes (English only)
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/pdf-summarize', [MainController::class, 'pdfSummarize'])->name('pdf-summarize');
Route::get('/contact-us', [ContactController::class, 'showForm'])->name('contact-us');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/how-to-convert-word-to-pdf-without-changing-font', [MainController::class, 'blog_post1'])->name('blog_post1');

Route::get('/compress-pdf', [MainController::class, 'compresspdf'])->name('compress-pdf');
Route::get('/word-to-pdf', [MainController::class, 'wordToPdf'])->name('word-to-pdf');
// Route::get('/pdf-to-word', [MainController::class, 'pdfToWord'])->name('pdf-to-word');
Route::get('/merge-pdf', [MainController::class, 'mergePdf'])->name('merge-pdf');
Route::get('/pdf-editor', [MainController::class, 'pdfEditer'])->name('pdf-editor');
// Route::get('/jpg-to-pdf', [JPG::class, 'index'])->name('jpg-to-pdf');

// POST routes
Route::post('/contact-us', [ContactController::class, 'submitContactForm']);

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '^(?!en$)[a-zA-Z]{2}$'],
    'middleware' => 'setlocale'
], function () {
    Route::get('/', [MainController::class, 'index'])->name('localized.home');
    Route::get('/contact-us', [ContactController::class, 'showForm'])->name('localized.contact-us');
    Route::get('/privacy', [MainController::class, 'privacy'])->name('localized.privacy');
    Route::get('/terms', [MainController::class, 'terms'])->name('localized.terms');
    Route::get('/blog', [MainController::class, 'blog'])->name('localized.blog');
    Route::get('/how-to-convert-word-to-pdf-without-changing-font', [MainController::class, 'blog_post1'])->name('localized.blog_post1');

    Route::get('/compress-pdf', [MainController::class, 'compresspdf'])->name('localized.compress-pdf');
    Route::get('/word-to-pdf', [MainController::class, 'wordtopdf'])->name('localized.word-to-pdf');
    // Route::get('/pdf-to-word', [MainController::class, 'pdfToWord'])->name('localized.pdf-to-word');
    Route::get('/merge-pdf', [MainController::class, 'mergepdf'])->name('localized.merge-pdf');
    Route::get('/pdf-editor', [MainController::class, 'pdfEditer'])->name('localized.pdf-editor');
    // Route::get('/jpg-to-pdf', [JPG::class, 'index'])->name('localized.jpg-to-pdf');

});

//routes for excel to pdf
Route::get('/excel-to-pdf', [ExceltoPdfController::class, 'index'])->name('excel-to-pdf');
Route::post('/excel-to-pdf/convert', [ExcelToPdfController::class, 'excelToPdf'])->name('excel.pdf.convert');
Route::get('/excel-to-pdf/download', [ExcelToPdfController::class, 'downloadPdf'])->name('excel.pdf.download');
// routes for pdf to word
Route::get('/pdf-to-word',[pdftoWordController::class,'index'])->name('pdf-to-word');
Route::post('/pdf-to-word', [PdfToWordController::class, 'convert'])->name('convert.pdf');
// Route::post('/pdf-to-word/convert-from-url', [pdftoWordController::class, 'convertFromUrl'])->name('pdf.convert.url');

Route::get('/word-to-pdf',[wordConverterController::class,'index'])->name('word-to-pdf');
Route::post('/word-to-pdf', [WordConverterController::class, 'convert'])->name('convert.word'); 
Route::get('/download-pdf', [WordConverterController::class, 'downloadFile'])->name('download.pdf');


//routes for compress pdf
Route::get('/compress-pdf',[compressPdfController::class,'index'])->name('compress-pdf');
Route::post('/compress-pdf', [compressPdfController::class, 'compress'])->name('compress.pdf.process');
Route::get('/compress/download', [compressPdfController::class, 'downloadFile'])
    ->name('compress.download');

//routes for merge pdf 
Route::get('/merge-pdf', [MergePdfController::class, 'index'])->name('merge-pdf');
Route::post('/merge-pdf', [MergePdfController::class, 'merge'])->name('merge.pdf.process');
Route::get('/merge/download', [MergePdfController::class, 'downloadMergedFile'])->name('merge.download');
Route::post('/merge-pdf/from-url', [MergePdfController::class, 'mergeFromUrl'])->name('merge.fromUrl');
Route::post('/merge-pdf/check-status', [MergePdfController::class, 'checkStatus'])->name('merge.checkStatus');

//routes for the jpg to pdf
Route::get('/jpg-to-pdf', [JpgToPdfController::class, 'index'])->name('jpg-to-pdf');
Route::post('/jpg-to-pdf', [JpgToPdfController::class, 'convert'])->name('convert.jpg');
Route::get('/jpg-to-pdf/download', [JpgToPdfController::class, 'downloadFile'])->name('pdf.download');
//routes for pdf to jpg  
Route::get('/pdf-to-jpg',[pdftojpgController::class,'index'])->name('pdf-to-jpg');
Route::post('/pdf-to-jpg',[pdftojpgController::class,'convert'])->name('convert-jpg');
Route::get('/pdf-to-jpg/download',[pdftojpgController::class,'downloadFile'])->name('jpg.download');

//routes for summerize pdf

Route::get('/pdf-summerize',[pdfSummerizeController::class,'index'])->name('pdf.summerize');
Route::post('/pdf-summerize', [pdfSummerizeController::class, 'summarize'])->name('pdf.summerize.process');
Route::post('/pdf-summarizer/download', [pdfSummerizeController::class, 'downloadFile'])->name('pdf.summarizer.download');



// ✅ All localized tool routes in one group with middleware
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {

    // PDF Tools
    Route::get('/pdf-to-word', [pdftoWordController::class, 'index'])->name('localized.pdf-to-word');
    Route::get('/word-to-pdf', [WordConverterController::class, 'index'])->name('localized.word-to-pdf');
    Route::get('/compress-pdf', [compressPdfController::class, 'index'])->name('localized.compress-pdf');
    Route::get('/merge-pdf', [MergePdfController::class, 'index'])->name('localized.merge-pdf');
    Route::get('/pdf-to-jpg', [pdftojpgController::class, 'index'])->name('localized.pdf-to-jpg');
    Route::get('/jpg-to-pdf', [JpgToPdfController::class, 'index'])->name('localized.jpg-to-pdf');
    Route::get('/pdf-summerize', [pdfSummerizeController::class, 'index'])->name('localized.pdf.summerize');
});
