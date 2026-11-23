<?php

use App\Http\Controllers\aboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\compressPdfController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\ExceltoPdfController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PdftoJpgController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JpgToPdfController;
use App\Http\Controllers\MergePdfController;
use App\Http\Controllers\pdfSummerizeController;
use App\Http\Controllers\pdftoWordController;
use App\Http\Controllers\WordConverterController;
use App\Http\Controllers\PagestoPdfController;
use App\Http\Controllers\PptToPdfController;

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
        'it',
        'fr',
        'de',
        'es',
        'ar',
        'hi',
        'bn',
        'id',
        'nl',
        'sv',
        'fi',
        'pt',
        'ru',
        'zh',
        'el',
        'cs',
        'uk',
        'vi',
        'af',
        'hy',
        'th',
        'ko',
        'ja',
        'en'
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
        'it',
        'fr',
        'de',
        'es',
        'ar',
        'hi',
        'bn',
        'id',
        'nl',
        'sv',
        'fi',
        'pt',
        'ru',
        'zh',
        'el',
        'cs',
        'uk',
        'vi',
        'af',
        'hy',
        'th',
        'ko',
        'ja',
        'en'
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
Route::withoutMiddleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');
    Route::get('/security', [MainController::class, 'security'])->name('security');
    Route::get('/terms', [MainController::class, 'terms'])->name('terms');
    Route::get('/faq', [MainController::class, 'faq'])->name('faq');
    Route::get('/status', [MainController::class, 'status'])->name('status');
    Route::get('/blog', [MainController::class, 'blog'])->name('blog');
    // This is new or changings route
    Route::get('/blog/{category}', [MainController::class, 'blogCategory'])->name('blog.category');
});
Route::get('/pdf-summarize', [MainController::class, 'pdfSummarize'])->name('pdf-summarize');
Route::get('/contact-us', [ContactController::class, 'showForm'])->name('contact-us');
// This is new or changings route
Route::get('/blog/{category}', [MainController::class, 'blogCategory'])->name('blog.category');
Route::get('/word-to-pdf-blog', [MainController::class, 'blog_post1'])->name('blog_post1');
Route::get('/How-To-Use-Ai-Pdf-Summarizer', [MainController::class, 'blog_post2'])->name('blog_post2');
Route::get('/Top-Free-AI-PDF-Summarizer-Tools', [MainController::class, 'blog_post3'])->name('blog_post3');
Route::get('/best-ai-tools-to-summarize-pdfs-2026-guide', [MainController::class, 'blog_post4'])->name('blog_post4');
Route::get('/convert-pdf-to-word-guide', [MainController::class, 'blog_post5'])->name('blog_post5');
Route::get('/how-to-compress-pdf-guide', [MainController::class, 'blog_post6'])->name('blog_post6');
Route::get('/how-to-merge-pdf-guide', [MainController::class, 'blog_post7'])->name('blog_post7');
Route::redirect('/how-to-convert-word-to-pdf-guide', '/word-to-pdf-blog', 301);
Route::redirect('/compress-pdf-without-quality-loss-guide', '/how-to-compress-pdf-guide', 301);
Route::redirect('/merge-pdf-online-free-guide', '/how-to-merge-pdf-guide', 301);
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
Route::get('/choose-right-pdf-tool-in-2026', [MainController::class, 'blog_post25'])->name('blog_post25');
Route::get('/how-to-convert-jpg-to-pdf-without-losing-quality-in-2026', [MainController::class, 'blog_post26'])->name('blog_post26');
Route::get('/build-faster-pdf-workflow-without-software-in-2026', [MainController::class, 'blog_post27'])->name('blog_post27');
Route::get('/common-pdf-tool-mistakes-to-avoid-2026', [MainController::class, 'blog_post28'])->name('blog_post28');
Route::get('/convert-images-to-pdf-online-in-2026', [MainController::class, 'blog_post29'])->name('blog_post29');
Route::get('/how-to-share-pdf-files-safely-in-2026', [MainController::class, 'blog_post30'])->name('blog_post30');
Route::get('/online-pdf-tools-vs-desktop-software-in-2026', [MainController::class, 'blog_post31'])->name('blog_post31');
Route::get('/beginner-guide-to-using-online-pdf-tools-effectively-in-2026', [MainController::class, 'blog_post32'])->name('blog_post32');
Route::get('/how-online-pdf-tools-save-you-hours-every-week-2026', [MainController::class, 'blog_post33'])->name('blog_post33');
Route::get('/best-free-online-pdf-tools-2026', [MainController::class, 'blog_post34'])->name('blog_post34');
Route::get('/best-online-pdf-compression-tools-2026', [MainController::class, 'blog_post35'])->name('blog_post35');
Route::get('/how-industries-use-online-pdf-tools-2026', [MainController::class, 'blog_post36'])->name('blog_post36');
Route::get('/free-vs-paid-pdf-tools-2026', [MainController::class, 'blog_post37'])->name('blog_post37');
Route::get('/edit-pdf-online-without-losing-formatting-2026', [MainController::class, 'blog_post38'])->name('blog_post38');
Route::get('/merge-pdf-files-online-free-2026', [MainController::class, 'blog_post39'])->name('blog_post39');
Route::get('/how-to-summarize-pdf-documents-using-ai-in-2026', [MainController::class, 'blog_post40'])->name('blog_post40');
Route::get('/7-common-pdf-mistakes-that-waste-time', [MainController::class, 'blog_post41'])->name('blog_post41');
Route::get('/pdf-myths-vs-reality-in-2026', [MainController::class, 'blog_post42'])->name('blog_post42');
Route::get('/pdf-handling-for-beginners-in-2026', [MainController::class, 'blog_post43'])->name('blog_post43');
Route::get('/ultimate-pdf-workflow-checklist-2026', [MainController::class, 'blog_post44'])->name('blog_post44');
Route::get('/before-after-online-pdf-tools-2026', [MainController::class, 'blog_post45'])->name('blog_post45');
Route::get('/ai-pdf-document-processing-2026', [MainController::class, 'blog_post46'])->name('blog_post46');
Route::get('/google-ai-overviews-pdf-content-2026', [MainController::class, 'blog_post47'])->name('blog_post47');
Route::get('/ai-evaluates-trust-authority-pdf-documents', [MainController::class, 'blog_post48'])->name('blog_post48');
Route::get('/how-ai-detects-low-quality-pdf-documents', [MainController::class, 'blog_post49'])->name('blog_post49');
Route::get('/how-to-unlock-password-protected-pdf-in-2026', [MainController::class, 'blog_post50'])->name('blog_post50');
Route::get('/how-to-protect-pdf-files-with-passwords-in-2026', [MainController::class, 'blog_post51'])->name('blog_post51');
Route::get('/why-pdf-standardization-matters-for-ai-document-understanding', [MainController::class, 'blog_post52'])->name('blog_post52');
Route::get('/ai-builds-topic-authority-from-documents-over-time', [MainController::class, 'blog_post53'])->name('blog_post53');
Route::get('/ai-document-indexing-lifecycle-2026', [MainController::class, 'blog_post54'])->name('blog_post54');
Route::get('/pages-to-pdf-converter-online', [MainController::class, 'blog_post55'])->name('blog_post55');
Route::get('/pages-vs-pdf-which-file-format-is-better-for-sharing', [MainController::class, 'blog_post56'])->name('blog_post56');
Route::get('/how-to-convert-pages-to-pdf-for-professional-and-academic-use', [MainController::class, 'blog_post57'])->name('blog_post57');
Route::get('/common-pages-to-pdf-conversion-problems-and-how-to-fix-them', [MainController::class, 'blog_post58'])->name('blog_post58');
Route::get('/paperless-workflow-guide-2026', [MainController::class, 'blog_post59'])->name('blog_post59');
Route::get('/digital-document-security-best-practices-2026', [MainController::class, 'blog_post60'])->name('blog_post60');
Route::get('/reduce-pdf-file-size-without-losing-quality', [MainController::class, 'blog_post61'])->name('blog_post61');
Route::get('/pdf-vs-docx-which-format-to-use', [MainController::class, 'blog_post62'])->name('blog_post62');
Route::get('/how-to-sign-pdf-digitally', [MainController::class, 'blog_post63'])->name('blog_post63');
Route::get('/how-to-split-pdf-files-into-multiple-pages-2026-guide', [MainController::class, 'blog_post64'])->name('blog_post64');
Route::get('/convert-excel-to-pdf-without-formatting-issues-2026-guide', [MainController::class, 'blog_post65'])->name('blog_post65');
Route::get('/are-free-online-pdf-tools-safe-file-privacy-explained', [MainController::class, 'blog_post66'])->name('blog_post66');
Route::get('/how-to-password-protect-pdf-on-any-device-2026-guide', [MainController::class, 'blog_post67'])->name('blog_post67');
Route::get('/pdf-encryption-explained-128-bit-vs-256-bit-aes-guide', [MainController::class, 'blog_post68'])->name('blog_post68');
// This is new or changings route
Route::get('/how-to-send-large-pdf-files-by-email', [MainController::class, 'blog_post69'])->name('blog_post69');
Route::get('/pdf-workflow-hacks-remote-workers', [MainController::class, 'blog_post70'])->name('blog_post70');
Route::get('/how-to-merge-pdf-files-complete-guide-2026', [MainController::class, 'blog_post71'])->name('blog_post71');
Route::get('/how-to-convert-pdf-to-jpg', [MainController::class, 'blog_post72'])->name('blog_post72');
Route::get('/how-to-convert-jpg-to-pdf', [MainController::class, 'blog_post73'])->name('blog_post73');
Route::get('/how-to-pdf-summerize', [MainController::class, 'blog_post74'])->name('blog_post74');
Route::get('/how-to-convert-ppt-to-pdf', [MainController::class, 'blog_post75'])->name('blog_post75');
Route::get('/pdf-vs-word-when-to-use-each-format', [MainController::class, 'blog_post76'])->name('blog_post76');
Route::get('/how-to-protect-pdf-files-with-passwords-complete-guide-2026', [MainController::class, 'blog_post77'])->name('blog_post77');
Route::get('/how-to-convert-word-to-pdf-blog', [MainController::class, 'blog_post78'])->name('blog_post78');
Route::get('/online-pdf-tools-vs-desktop-software-guide-2026', [MainController::class, 'blog_post79'])->name('blog_post79');
Route::get('/convert-pdf-to-word-guide-v3', [MainController::class, 'blog_post80'])->name('blog_post80');
Route::get('/pdf-security-password-protection-guide-2026', [MainController::class, 'blog_post81'])->name('blog_post81');
Route::get('/batch-pdf-processing-for-teams-guide-2026', [MainController::class, 'blog_post82'])->name('blog_post82');
Route::get('/creating-fillable-pdf-forms-guide-2026', [MainController::class, 'blog_post83'])->name('blog_post83');
Route::get('/ocr-text-extraction-from-pdfs-guide-2026', [MainController::class, 'blog_post84'])->name('blog_post84');
Route::get('/optimizing-pdfs-for-web-guide-2026', [MainController::class, 'blog_post85'])->name('blog_post85');
Route::get('/pdf-metadata-management-guide-2026', [MainController::class, 'blog_post86'])->name('blog_post86');
Route::get('/pdf-workflows-for-remote-teams-guide-2026', [MainController::class, 'blog_post87'])->name('blog_post87');
Route::get('/pdf-archiving-long-term-storage-guide-2026', [MainController::class, 'blog_post88'])->name('blog_post88');
Route::get('/merge-and-split-pdfs-guide-2026', [MainController::class, 'blog_post89'])->name('blog_post89');
Route::get('/pdf-accessibility-inclusive-documents-guide-2026', [MainController::class, 'blog_post90'])->name('blog_post90');
Route::get('/how-to-reduce-pdf-file-size-for-email-attachments', [MainController::class, 'blog_post91'])->name('blog_post91');
Route::get('/convert-resume-to-pdf-before-applying-for-jobs', [MainController::class, 'blog_post92'])->name('blog_post92');
Route::get('/convert-powerpoint-to-pdf-for-presentations-and-handouts', [MainController::class, 'blog_post93'])->name('blog_post93');
Route::get('/convert-pdf-to-word-to-edit-documents-safely', [MainController::class, 'blog_post94'])->name('blog_post94');
Route::get('/turn-photos-into-a-pdf-document-on-any-device', [MainController::class, 'blog_post95'])->name('blog_post95');
Route::get('/convert-pdf-pages-to-jpg-for-social-media-and-websites', [MainController::class, 'blog_post96'])->name('blog_post96');
Route::get('/summarize-research-papers-with-ai-without-missing-key-points', [MainController::class, 'blog_post97'])->name('blog_post97');
Route::get('/convert-apple-pages-documents-to-pdf-for-easy-sharing', [MainController::class, 'blog_post98'])->name('blog_post98');
Route::get('/combine-monthly-invoices-and-receipts-into-one-pdf-packet', [MainController::class, 'blog_post99'])->name('blog_post99');
Route::get('/pdf-vs-word-vs-jpg-which-file-format-should-you-use', [MainController::class, 'blog_post100'])->name('blog_post100');
Route::get('/pitch-deck-to-pdf-for-investors', [MainController::class, 'blog_post101'])->name('blog_post101');
Route::get('/pdf-table-of-contents-and-bookmarks', [MainController::class, 'blog_post102'])->name('blog_post102');
Route::get('/print-ready-pdf-for-brochures-and-flyers', [MainController::class, 'blog_post103'])->name('blog_post103');
Route::get('/about/authors/{authorSlug}', [aboutController::class, 'authorProfile'])->name('author.profile');
Route::get('/word-to-pdf', [WordConverterController::class, 'index'])->name('word-to-pdf');
// Route::get('/merge-pdf', [MainController::class, 'mergePdf'])->name('merge-pdf');
Route::get('/pdf-editor', [MainController::class, 'pdfEditer'])->name('pdf-editor');

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
    Route::get('/security', [MainController::class, 'security'])->name('localized.security');
    Route::get('/terms', [MainController::class, 'terms'])->name('localized.terms');
    Route::get('/faq', [MainController::class, 'faq'])->name('localized.faq');
    Route::get('/status', [MainController::class, 'status'])->name('localized.status');
    Route::get('/blog', [MainController::class, 'blog'])->name('localized.blog');
    // This is new or changings route
    Route::get('/blog/{category}', [MainController::class, 'blogCategory'])->name('localized.blog.category');
    Route::get('/word-to-pdf-blog', [MainController::class, 'blog_post1'])->name('localized.blog_post1');
    Route::get('/How-To-Use-Ai-Pdf-Summarizer', [MainController::class, 'blog_post2'])->name('localized.blog_post2');
    Route::get('/Top-Free-AI-PDF-Summarizer-Tools', [MainController::class, 'blog_post3'])->name('localized.blog_post3');
    Route::get('/best-ai-tools-to-summarize-pdfs-2026-guide', [MainController::class, 'blog_post4'])->name('localized.blog_post4');
    Route::get('/convert-pdf-to-word-guide', [MainController::class, 'blog_post5'])->name('localized.blog_post5');
    Route::get('/how-to-compress-pdf-guide', [MainController::class, 'blog_post6'])->name('localized.blog_post6');
    Route::get('/how-to-merge-pdf-guide', [MainController::class, 'blog_post7'])->name('localized.blog_post7');
    Route::get('/how-to-convert-word-to-pdf-guide', function ($locale) {
        return redirect("/{$locale}/word-to-pdf-blog", 301);
    });
    Route::get('/compress-pdf-without-quality-loss-guide', function ($locale) {
        return redirect("/{$locale}/how-to-compress-pdf-guide", 301);
    });
    Route::get('/merge-pdf-online-free-guide', function ($locale) {
        return redirect("/{$locale}/how-to-merge-pdf-guide", 301);
    });
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
    Route::get('/choose-right-pdf-tool-in-2026', [MainController::class, 'blog_post25'])->name('localized.blog_post25');
    Route::get('/how-to-convert-jpg-to-pdf-without-losing-quality-in-2026', [MainController::class, 'blog_post26'])->name('localized.blog_post26');
    Route::get('/build-faster-pdf-workflow-without-software-in-2026', [MainController::class, 'blog_post27'])->name('localized.blog_post27');
    Route::get('/common-pdf-tool-mistakes-to-avoid-2026', [MainController::class, 'blog_post28'])->name('localized.blog_post28');
    Route::get('/convert-images-to-pdf-online-in-2026', [MainController::class, 'blog_post29'])->name('localized.blog_post29');
    Route::get('/how-to-share-pdf-files-safely-in-2026', [MainController::class, 'blog_post30'])->name('localized.blog_post30');
    Route::get('/online-pdf-tools-vs-desktop-software-in-2026', [MainController::class, 'blog_post31'])->name('localized.blog_post31');
    Route::get('/beginner-guide-to-using-online-pdf-tools-effectively-in-2026', [MainController::class, 'blog_post32'])->name('localized.blog_post32');
    Route::get('/how-online-pdf-tools-save-you-hours-every-week-2026', [MainController::class, 'blog_post33'])->name('localized.blog_post33');
    Route::get('/best-free-online-pdf-tools-2026', [MainController::class, 'blog_post34'])->name('localized.blog_post34');
    Route::get('/best-online-pdf-compression-tools-2026', [MainController::class, 'blog_post35'])->name('localized.blog_post35');
    Route::get('/how-industries-use-online-pdf-tools-2026', [MainController::class, 'blog_post36'])->name('localized.blog_post36');
    Route::get('/free-vs-paid-pdf-tools-2026', [MainController::class, 'blog_post37'])->name('localized.blog_post37');
    Route::get('/edit-pdf-online-without-losing-formatting-2026', [MainController::class, 'blog_post38'])->name('localized.blog_post38');
    Route::get('/merge-pdf-files-online-free-2026', [MainController::class, 'blog_post39'])->name('localized.blog_post39');
    Route::get('/how-to-summarize-pdf-documents-using-ai-in-2026', [MainController::class, 'blog_post40'])->name('localized.blog_post40');
    Route::get('/7-common-pdf-mistakes-that-waste-time', [MainController::class, 'blog_post41'])->name('localized.blog_post41');
    Route::get('/pdf-myths-vs-reality-in-2026', [MainController::class, 'blog_post42'])->name('localized.blog_post42');
    Route::get('/pdf-handling-for-beginners-in-2026', [MainController::class, 'blog_post43'])->name('localized.blog_post43');
    Route::get('/ultimate-pdf-workflow-checklist-2026', [MainController::class, 'blog_post44'])->name('localized.blog_post44');
    Route::get('/before-after-online-pdf-tools-2026', [MainController::class, 'blog_post45'])->name('localized.blog_post45');
    Route::get('/ai-pdf-document-processing-2026', [MainController::class, 'blog_post46'])->name('localized.blog_post46');
    Route::get('/google-ai-overviews-pdf-content-2026', [MainController::class, 'blog_post47'])->name('localized.blog_post47');
    Route::get('/ai-evaluates-trust-authority-pdf-documents', [MainController::class, 'blog_post48'])->name('localized.blog_post48');
    Route::get('/how-ai-detects-low-quality-pdf-documents', [MainController::class, 'blog_post49'])->name('localized.blog_post49');
    Route::get('/how-to-unlock-password-protected-pdf-in-2026', [MainController::class, 'blog_post50'])->name('localized.blog_post50');
    Route::get('/how-to-protect-pdf-files-with-passwords-in-2026', [MainController::class, 'blog_post51'])->name('localized.blog_post51');
    Route::get('/why-pdf-standardization-matters-for-ai-document-understanding', [MainController::class, 'blog_post52'])->name('localized.blog_post52');
    Route::get('/ai-builds-topic-authority-from-documents-over-time', [MainController::class, 'blog_post53'])->name('localized.blog_post53');
    Route::get('/ai-document-indexing-lifecycle-2026', [MainController::class, 'blog_post54'])->name('localized.blog_post54');
    Route::get('/pages-to-pdf-converter-online', [MainController::class, 'blog_post55'])->name('localized.blog_post55');
    Route::get('/pages-vs-pdf-which-file-format-is-better-for-sharing', [MainController::class, 'blog_post56'])->name('localized.blog_post56');
    Route::get('/how-to-convert-pages-to-pdf-for-professional-and-academic-use', [MainController::class, 'blog_post57'])->name('localized.blog_post57');
    Route::get('/common-pages-to-pdf-conversion-problems-and-how-to-fix-them', [MainController::class, 'blog_post58'])->name('localized.blog_post58');
    Route::get('/paperless-workflow-guide-2026', [MainController::class, 'blog_post59'])->name('localized.blog_post59');
    Route::get('/digital-document-security-best-practices-2026', [MainController::class, 'blog_post60'])->name('localized.blog_post60');      
    Route::get('/reduce-pdf-file-size-without-losing-quality', [MainController::class, 'blog_post61'])->name('localized.blog_post61');      
    Route::get('/pdf-vs-docx-which-format-to-use', [MainController::class, 'blog_post62'])->name('localized.blog_post62');      
    Route::get('/how-to-sign-pdf-digitally', [MainController::class, 'blog_post63'])->name('localized.blog_post63');      
    Route::get('/how-to-split-pdf-files-into-multiple-pages-2026-guide', [MainController::class, 'blog_post64'])->name('localized.blog_post64');      
    Route::get('/convert-excel-to-pdf-without-formatting-issues-2026-guide', [MainController::class, 'blog_post65'])->name('localized.blog_post65'); 
    Route::get('/are-free-online-pdf-tools-safe-file-privacy-explained', [MainController::class, 'blog_post66'])->name('localized.blog_post66');
    Route::get('/how-to-password-protect-pdf-on-any-device-2026-guide', [MainController::class, 'blog_post67'])->name('localized.blog_post67');
    Route::get('/pdf-encryption-explained-128-bit-vs-256-bit-aes-guide', [MainController::class, 'blog_post68'])->name('localized.blog_post68');
    // This is new or changings route
    Route::get('/how-to-send-large-pdf-files-by-email', [MainController::class, 'blog_post69'])->name('localized.blog_post69');      
    Route::get('/pdf-workflow-hacks-remote-workers', [MainController::class, 'blog_post70'])->name('localized.blog_post70');
    Route::get('/how-to-merge-pdf-files-complete-guide-2026', [MainController::class, 'blog_post71'])->name('localized.blog_post71');
    Route::get('/how-to-convert-pdf-to-jpg', [MainController::class, 'blog_post72'])->name('localized.blog_post72');
    Route::get('/how-to-convert-jpg-to-pdf', [MainController::class, 'blog_post73'])->name('localized.blog_post73');
    Route::get('/how-to-pdf-summerize', [MainController::class, 'blog_post74'])->name('localized.blog_post74');
    Route::get('/how-to-convert-ppt-to-pdf', [MainController::class, 'blog_post75'])->name('localized.blog_post75');
    Route::get('/pdf-vs-word-when-to-use-each-format', [MainController::class, 'blog_post76'])->name('localized.blog_post76');
    Route::get('/how-to-protect-pdf-files-with-passwords-complete-guide-2026', [MainController::class, 'blog_post77'])->name('localized.blog_post77');
    Route::get('/how-to-convert-word-to-pdf-blog', [MainController::class, 'blog_post78'])->name('localized.blog_post78');
    Route::get('/online-pdf-tools-vs-desktop-software-guide-2026', [MainController::class, 'blog_post79'])->name('localized.blog_post79');
    Route::get('/convert-pdf-to-word-guide-v3', [MainController::class, 'blog_post80'])->name('localized.blog_post80');
    Route::get('/pdf-security-password-protection-guide-2026', [MainController::class, 'blog_post81'])->name('localized.blog_post81');
    Route::get('/batch-pdf-processing-for-teams-guide-2026', [MainController::class, 'blog_post82'])->name('localized.blog_post82');
    Route::get('/creating-fillable-pdf-forms-guide-2026', [MainController::class, 'blog_post83'])->name('localized.blog_post83');
    Route::get('/ocr-text-extraction-from-pdfs-guide-2026', [MainController::class, 'blog_post84'])->name('localized.blog_post84');
    Route::get('/optimizing-pdfs-for-web-guide-2026', [MainController::class, 'blog_post85'])->name('localized.blog_post85');
    Route::get('/pdf-metadata-management-guide-2026', [MainController::class, 'blog_post86'])->name('localized.blog_post86');
    Route::get('/pdf-workflows-for-remote-teams-guide-2026', [MainController::class, 'blog_post87'])->name('localized.blog_post87');
    Route::get('/pdf-archiving-long-term-storage-guide-2026', [MainController::class, 'blog_post88'])->name('localized.blog_post88');
    Route::get('/merge-and-split-pdfs-guide-2026', [MainController::class, 'blog_post89'])->name('localized.blog_post89');
    Route::get('/pdf-accessibility-inclusive-documents-guide-2026', [MainController::class, 'blog_post90'])->name('localized.blog_post90');
    Route::get('/how-to-reduce-pdf-file-size-for-email-attachments', [MainController::class, 'blog_post91'])->name('localized.blog_post91');
    Route::get('/convert-resume-to-pdf-before-applying-for-jobs', [MainController::class, 'blog_post92'])->name('localized.blog_post92');
    Route::get('/convert-powerpoint-to-pdf-for-presentations-and-handouts', [MainController::class, 'blog_post93'])->name('localized.blog_post93');
    Route::get('/convert-pdf-to-word-to-edit-documents-safely', [MainController::class, 'blog_post94'])->name('localized.blog_post94');
    Route::get('/turn-photos-into-a-pdf-document-on-any-device', [MainController::class, 'blog_post95'])->name('localized.blog_post95');
    Route::get('/convert-pdf-pages-to-jpg-for-social-media-and-websites', [MainController::class, 'blog_post96'])->name('localized.blog_post96');
    Route::get('/summarize-research-papers-with-ai-without-missing-key-points', [MainController::class, 'blog_post97'])->name('localized.blog_post97');
    Route::get('/convert-apple-pages-documents-to-pdf-for-easy-sharing', [MainController::class, 'blog_post98'])->name('localized.blog_post98');
    Route::get('/combine-monthly-invoices-and-receipts-into-one-pdf-packet', [MainController::class, 'blog_post99'])->name('localized.blog_post99');
    Route::get('/pdf-vs-word-vs-jpg-which-file-format-should-you-use', [MainController::class, 'blog_post100'])->name('localized.blog_post100');
    Route::get('/pitch-deck-to-pdf-for-investors', [MainController::class, 'blog_post101'])->name('localized.blog_post101');
    Route::get('/pdf-table-of-contents-and-bookmarks', [MainController::class, 'blog_post102'])->name('localized.blog_post102');
    Route::get('/print-ready-pdf-for-brochures-and-flyers', [MainController::class, 'blog_post103'])->name('localized.blog_post103');
    Route::get('/about/authors/{authorSlug}', [aboutController::class, 'authorProfile'])->name('localized.author.profile');
    // Route::get('/word-to-pdf', [MainController::class, 'wordtopdf'])->name('localized.word-to-pdf');
    // Route::get('/pdf-to-word', [MainController::class, 'pdfToWord'])->name('localized.pdf-to-word');
    // Route::get('/merge-pdf', [MainController::class, 'mergepdf'])->name('localized.merge-pdf');
    Route::get('/pdf-editor', [MainController::class, 'pdfEditer'])->name('localized.pdf-editor');
    // Route::get('/jpg-to-pdf', [JPG::class, 'index'])->name('localized.jpg-to-pdf');

});

//routes for excel to pdf
Route::get('/excel-to-pdf', [ExceltoPdfController::class, 'index'])->name('excel-to-pdf');
Route::post('/excel-to-pdf/convert', [ExcelToPdfController::class, 'excelToPdf'])->name('excel.pdf.convert');
Route::get('/excel-to-pdf/download', [ExcelToPdfController::class, 'downloadPdf'])->name('excel.pdf.download');

// routes for pdf to word
Route::get('/pdf-to-word', [pdftoWordController::class, 'index'])->name('pdf-to-word');
Route::post('/pdf-to-word', [pdftoWordController::class, 'convert'])->name('convert.pdf');
Route::post('/pdf-to-word/convert-from-url', [pdftoWordController::class, 'convertFromUrl'])->name('pdf.convert.url');
Route::post('/pdf-to-word/check-status', [pdftoWordController::class, 'checkStatus'])->name('pdf.checkStatus');
Route::get('/pdf-to-word/proxy-download', [pdftoWordController::class, 'proxyDownload'])->name('pdf.proxy.download');
Route::get('/pdf-to-word/download', [pdftoWordController::class, 'downloadFile'])->name('pdf.word.download');

// routes for word to pdf
Route::post('/word-to-pdf', [WordConverterController::class, 'convert'])->name('convert.word');
Route::post('/word-to-pdf/convert-from-url', [WordConverterController::class, 'convertFromUrl'])->name('word.convert.url');
Route::post('/word-to-pdf/check-status', [WordConverterController::class, 'checkStatus'])->name('word.checkStatus');
Route::get('/word-to-pdf/download', [WordConverterController::class, 'downloadFile'])->name('word.pdf.download');


//routes for compress pdf
Route::get('/compress-pdf', [compressPdfController::class, 'index'])->name('compress-pdf');
Route::post('/compress-pdf', [compressPdfController::class, 'compress'])->name('compress.pdf.process');
Route::post('/compress-pdf/convert-from-url', [compressPdfController::class, 'compressFromUrl'])->name('compress.convert.url');
Route::post('/compress-pdf/check-status', [compressPdfController::class, 'checkStatus'])->name('compress.checkStatus');
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
Route::get('/pdf-to-jpg', [PdftoJpgController::class, 'index'])->name('pdf-to-jpg');
Route::post('/pdf-to-jpg', [PdftoJpgController::class, 'convert'])->name('convert-jpg');
Route::get('/pdf-to-jpg/download', [PdftoJpgController::class, 'downloadFile'])->name('jpg.download');

//routes for summerize pdf

Route::get('/pdf-summerize', [pdfSummerizeController::class, 'index'])->name('pdf.summerize');
Route::post('/pdf-summerize', [pdfSummerizeController::class, 'summarize'])->name('pdf.summerize.process');
Route::get('/pdf-summarizer/download', [pdfSummerizeController::class, 'downloadFile'])->name('pdf.summarizer.download');



//  All localized tool routes in one group with middleware
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {

    
    // PDF Tools
    Route::get('/pdf-to-word', [pdftoWordController::class, 'index'])->name('localized.pdf-to-word');
    Route::post('/pdf-to-word', [pdftoWordController::class, 'convert'])->name('localized.convert.pdf');
    Route::post('/pdf-to-word/convert-from-url', [pdftoWordController::class, 'convertFromUrl'])->name('localized.pdf.convert.url');
    Route::get('/pdf-to-word/download', [pdftoWordController::class, 'downloadFile'])->name('localized.pdf.word.download');
    Route::get('/word-to-pdf', [WordConverterController::class, 'index'])->name('localized.word-to-pdf');
    Route::post('/word-to-pdf', [WordConverterController::class, 'convert'])->name('localized.convert.word');
    Route::get('/word-to-pdf/download', [WordConverterController::class, 'downloadFile'])->name('localized.word.pdf.download');
    Route::get('/compress-pdf', [compressPdfController::class, 'index'])->name('localized.compress-pdf');
    Route::post('/compress-pdf', [compressPdfController::class, 'compress'])->name('localized.compress.pdf.process');
    Route::get('/compress-pdf/download', [compressPdfController::class, 'downloadFile'])->name('localized.compress.download');
    Route::get('/merge-pdf', [MergePdfController::class, 'index'])->name('localized.merge-pdf');
    Route::post('/merge-pdf', [MergePdfController::class, 'merge'])->name('localized.merge.pdf.process');
    Route::get('/merge-pdf/download', [MergePdfController::class, 'downloadMergedFile'])->name('localized.merge.download');
    Route::get('/pdf-to-jpg', [PdftoJpgController::class, 'index'])->name('localized.pdf-to-jpg');
    Route::post('/pdf-to-jpg', [PdftoJpgController::class, 'convert'])->name('localized.convert-jpg');
    Route::get('/jpg-to-pdf', [JpgToPdfController::class, 'index'])->name('localized.jpg-to-pdf');
    Route::post('/jpg-to-pdf', [JpgToPdfController::class, 'convert'])->name('localized.convert.jpg');
    Route::get('/jpg-to-pdf/download', [JpgToPdfController::class, 'downloadFile'])->name('localized.jpg.pdf.download');
    Route::get('/pdf-summerize', [pdfSummerizeController::class, 'index'])->name('localized.pdf.summerize');
    Route::post('/pdf-summerize', [pdfSummerizeController::class, 'summarize'])->name('localized.pdf.summerize.process');
    Route::get('/about-us', [aboutController::class, 'about'])->name('localized.about');
    Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('localized.disclaimer');
    Route::get('/pages-to-pdf', [PagestoPdfController::class, 'index'])->name('localized.pages-to-pdf');
    Route::get('/ppt-to-pdf', [PptToPdfController::class, 'index'])->name('localized.ppt-to-pdf');
    Route::post('/ppt-to-pdf/convert-from-url', [PptToPdfController::class, 'convertFromUrl'])->name('localized.ppt.convert.url');
});
Route::get('/about-us', [aboutController::class, 'about'])->name('about');
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');

Route::get('/pages-to-pdf', [PagestoPdfController::class, 'index'])->name('pages-to-pdf');

Route::post('/convert-pages', [PagestoPdfController::class, 'convert'])->name('convert.pages');

Route::post('/convert-pages-url', [PagestoPdfController::class, 'convertFromUrl'])->name('convert.pages.url');

Route::post('/check-pages-status', [PagestoPdfController::class, 'checkStatus'])->name('check.pages.status');

Route::get('/download-pages-pdf', [PagestoPdfController::class, 'downloadFile'])->name('download.pages.pdf');
//routes for the ppt to pdf
Route::get('/ppt-to-pdf', [PptToPdfController::class, 'index'])->name('ppt-to-pdf');
Route::post('/ppt-to-pdf', [PptToPdfController::class, 'convert'])->name('convert.ppt');
Route::post('/ppt-to-pdf/convert-from-url', [PptToPdfController::class, 'convertFromUrl'])->name('ppt.convert.url');
Route::post('/ppt-to-pdf/check-status', [PptToPdfController::class, 'checkStatus'])->name('ppt.checkStatus');
Route::get('/ppt-to-pdf/download', [PptToPdfController::class, 'downloadFile'])->name('ppt.download');
