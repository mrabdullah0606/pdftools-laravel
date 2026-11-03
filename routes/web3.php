<?php

use App\Http\Controllers\aboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\compressPdfController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DisclaimerController;
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
Route::any('{locale}/how-to-convert-word-to-pdf-without-changing-font', function ($locale) {

    // allow only real locales
    $allowedLocales = [
        'it','fr','de','es','ar','hi','bn','id','nl','sv','fi','pt','ru','zh',
        'el','cs','uk','vi','af','hy','th','ko','ja','en'
    ];

    if (! in_array($locale, $allowedLocales)) {
        return redirect('/word-to-pdf-blog', 301);
    }

    return redirect("/{$locale}/word-to-pdf-blog", 301);

})->where('locale', '[a-zA-Z]{2}');

Route::get('/how-to-convert-word-to-pdf-without-changing-font', function () {
    return redirect('/word-to-pdf-blog', 301);
});

Route::any('{locale}/How-To-Use-AI-Pdf-Summarizer', function ($locale) {

    $allowedLocales = [
        'it','fr','de','es','ar','hi','bn','id','nl','sv','fi','pt','ru','zh',
        'el','cs','uk','vi','af','hy','th','ko','ja','en'
    ];

    if (! in_array($locale, $allowedLocales)) {
        return redirect('/How-To-Use-Ai-Pdf-Summarizer', 301);
    }

    return redirect("/{$locale}/How-To-Use-Ai-Pdf-Summarizer", 301);

})->where('locale', '[a-zA-Z]{2}');

Route::get('/How-To-Use-AI-Pdf-Summarizer', function () {
    return redirect('/How-To-Use-Ai-Pdf-Summarizer', 301);
});

// Public Routes (English only)
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/pdf-summarize', [MainController::class, 'pdfSummarize'])->name('pdf-summarize');
Route::get('/contact-us', [ContactController::class, 'showForm'])->name('contact-us');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/word-to-pdf-blog', [MainController::class, 'blog_post1'])->name('blog_post1');
Route::get('/How-To-Use-Ai-Pdf-Summarizer', [MainController::class, 'blog_post2'])->name('blog_post2');
Route::get('/Top-Free-AI-PDF-Summarizer-Tools', [MainController::class, 'blog_post3'])->name('blog_post3');
Route::get('/best-ai-tools-to-summarize-pdfs-2026-guide', [MainController::class, 'blog_post4'])->name('blog_post4');
Route::get('/convert-pdf-to-word-guide', [MainController::class, 'blog_post5'])->name('blog_post5');  
Route::get('/how-to-compress-pdf-guide', [MainController::class, 'blog_post6'])->name('blog_post6');
Route::get('/how-to-merge-pdf-guide', [MainController::class, 'blog_post7'])->name('blog_post7');
Route::get('/how-to-convert-word-to-pdf-guide', [MainController::class, 'blog_post8'])->name('blog_post8');
Route::get('/compress-pdf-without-quality-loss-guide', [MainController::class, 'blog_post9'])->name('blog_post9');
Route::get('/merge-pdf-online-free-guide', [MainController::class, 'blog_post10'])->name('blog_post10');
Route::get('/convert-images-to-pdf-guide', [MainController::class, 'blog_post11'])->name('blog_post11');
Route::get('/best-all-in-one-pdf-tools-guide', [MainController::class, 'blog_post12'])->name('blog_post12');
Route::get('/how-to-convert-images-to-pdf-without-losing-quality-in-2026', [MainController::class, 'blog_post13'])->name('blog_post13');
Route::get('/convert-images-to-pdf-mobile-guide', [MainController::class, 'blog_post14'])->name('blog_post14');
Route::get('/combine-images-to-pdf-free-guide', [MainController::class, 'blog_post15'])->name('blog_post15');
Route::get('/convert-pdf-to-image-guide', [MainController::class, 'blog_post16'])->name('blog_post16');
Route::get('/add-insert-images-to-pdf-guide', [MainController::class, 'blog_post17'])->name('blog_post17');
Route::get('/extract-images-text-from-pdf-guide', [MainController::class, 'blog_post18'])->name('blog_post18');
Route::get('/convert-pdf-to-word-guide-v2', [MainController::class, 'blog_post19'])->name('blog_post19');
Route::get('/convert-word-to-pdf-guide-free', [MainController::class, 'blog_post20'])->name('blog_post20');
Route::get('/how-to-compress-pdf-free-guide', [MainController::class, 'blog_post21'])->name('blog_post21');
Route::get('/how-to-merge-pdf-free-guide', [MainController::class, 'blog_post22'])->name('blog_post22');
Route::get('/how-to-convert-pdf-to-jpg-free-guide', [MainController::class, 'blog_post23'])->name('blog_post23');
Route::get('/safe-pdf-tools-in-2026', [MainController::class, 'blog_post24'])->name('blog_post24');

Route::get('/compress-pdf', [MainController::class, 'compresspdf'])->name('compress-pdf');
Route::get('/word-to-pdf', [MainController::class, 'wordToPdf'])->name('word-to-pdf');
// Route::get('/pdf-to-word', [MainController::class, 'pdfToWord'])->name('pdf-to-word');
Route::get('/merge-pdf', [MainController::class, 'mergePdf'])->name('merge-pdf');
Route::get('/pdf-editor', [MainController::class, 'pdfEditer'])->name('pdf-editor');
// Route::get('/jpg-to-pdf', [JPG::class, 'index'])->name('jpg-to-pdf');

// POST routes
Route::post('/contact-us', [ContactController::class, 'submitContactForm'])->name('contact.submit');

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
    Route::get('/word-to-pdf-blog', [MainController::class, 'blog_post1'])->name('localized.blog_post1');
    Route::get('/How-To-Use-Ai-Pdf-Summarizer', [MainController::class, 'blog_post2'])->name('localized.blog_post2');    
    Route::get('/Top-Free-AI-PDF-Summarizer-Tools', [MainController::class, 'blog_post3'])->name('localized.blog_post3');    
    Route::get('/best-ai-tools-to-summarize-pdfs-2026-guide', [MainController::class, 'blog_post4'])->name('localized.blog_post4');    
    Route::get('/convert-pdf-to-word-guide', [MainController::class, 'blog_post5'])->name('localized.blog_post5');    
    Route::get('/how-to-compress-pdf-guide', [MainController::class, 'blog_post6'])->name('localized.blog_post6');    
    Route::get('/how-to-merge-pdf-guide', [MainController::class, 'blog_post7'])->name('localized.blog_post7');    
    Route::get('/how-to-convert-word-to-pdf-guide', [MainController::class, 'blog_post8'])->name('localized.blog_post8');    
    Route::get('/compress-pdf-without-quality-loss-guide', [MainController::class, 'blog_post9'])->name('localized.blog_post9'); 
    Route::get('/merge-pdf-online-free-guide', [MainController::class, 'blog_post10'])->name('localized.blog_post10'); 
    Route::get('/convert-images-to-pdf-guide', [MainController::class, 'blog_post11'])->name('localized.blog_post11');
    Route::get('/best-all-in-one-pdf-tools-guide', [MainController::class, 'blog_post12'])->name('localized.blog_post12');
    Route::get('/how-to-convert-images-to-pdf-without-losing-quality-in-2026', [MainController::class, 'blog_post13'])->name('localized.blog_post13');
    Route::get('/compress-pdf-without-quality-loss-guide', [MainController::class, 'blog_post9'])->name('localized.blog_post9');    
    Route::get('/merge-pdf-online-free-guide', [MainController::class, 'blog_post10'])->name('localized.blog_post10');    
    Route::get('/convert-images-to-pdf-guide', [MainController::class, 'blog_post11'])->name('localized.blog_post11');    
    Route::get('/best-all-in-one-pdf-tools-guide', [MainController::class, 'blog_post12'])->name('localized.blog_post12');    
    Route::get('/convert-images-to-pdf-mobile-guide', [MainController::class, 'blog_post14'])->name('localized.blog_post14');    
    Route::get('/combine-images-to-pdf-free-guide', [MainController::class, 'blog_post15'])->name('localized.blog_post15');    
    Route::get('/convert-pdf-to-image-guide', [MainController::class, 'blog_post16'])->name('localized.blog_post16');    
    Route::get('/add-insert-images-to-pdf-guide', [MainController::class, 'blog_post17'])->name('localized.blog_post17');    
    Route::get('/extract-images-text-from-pdf-guide', [MainController::class, 'blog_post18'])->name('localized.blog_post18');    
    Route::get('/convert-pdf-to-word-guide-v2', [MainController::class, 'blog_post19'])->name('localized.blog_post19');    
    Route::get('/convert-word-to-pdf-guide-free', [MainController::class, 'blog_post20'])->name('localized.blog_post20');    
    Route::get('/how-to-compress-pdf-free-guide', [MainController::class, 'blog_post21'])->name('localized.blog_post21'); 
    Route::get('/how-to-merge-pdf-free-guide', [MainController::class, 'blog_post22'])->name('localized.blog_post22');       
    Route::get('/how-to-convert-pdf-to-jpg-free-guide', [MainController::class, 'blog_post23'])->name('localized.blog_post23');    
    Route::get('/safe-pdf-tools-in-2026', [MainController::class, 'blog_post24'])->name('localized.blog_post24');    
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
    Route::get('/about-us',[aboutController::class,'about'])->name('localized.about');
    Route::get('/disclaimer',[DisclaimerController::class,'index'])->name('localized.disclaimer');
});
Route::get('/about-us',[aboutController::class,'about'])->name('about');
Route::get('/disclaimer',[DisclaimerController::class,'index'])->name('disclaimer');

