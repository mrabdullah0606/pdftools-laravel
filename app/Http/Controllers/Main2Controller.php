<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        return view('pages.home');
    }
    public function compresspdf()
    {   
        $v["title"] = " PDF Compressor - Reduce PDF File Size Online for Free | PDFTools.net";
        $v['meta_description']='Compress your PDF files easily and quickly with PDFTools.net. Reduce PDF file size without compromising quality. Optimize documents for email or web sharing.';
        return view('pages.compresspdf',$v);
    }
    public function wordToPdf(){
        $v = array();
        $v["title"] = " Online Free Word to PDF Converter - Pdftools.net";
       $v['meta_description']='Pdftools.net offers free Word to PDF converter online. Enjoy the best, secure and user-friendly online tool that ensures high-quality conversions.';
        return view('pages.word-to-pdf', $v);
    }
   public function pdfToWord(){
    $v = array();
    $v["title"] = "Online Free PDF to Word Converter - Pdftools.net";
    $v["meta_description"] = "Pdftools.net offers free PDF to Word converter online. Enjoy the best, user-friendly online tool that ensures high-quality conversions.";
    return view('pages.pdf-to-word', $v);
}
    public function mergePdf(){
        $v = array();
        $v["title"] = " Merge PDF Free | Combine PDF files online - PDFTools.net";
        $v['meta_description']='Merge PDFs online for free with PDFTools.net. Combine multiple files quickly and easily—no file size limits or registration required. Works seamlessly on Mac, Windows, iOS, and Android.';
        return view('pages.merge-pdf', $v);
    }
    public function privacy(){
        $v = array();
        $v["title"] = "";
        return view('pages.privacy', $v);
    }
    public function terms(){
        $v = array();
        $v["title"] = "";
        return view('pages.terms', $v);
    }
    public function pdfEditer(){
        $v = array();
        $v["title"] = "";
        return view('pages.pdf-editer', $v);
    }
    public function blog(){
        $v = array();
        $v["title"] = "PDF Tools Blog – Tips, Tutorials & Best Practices";
        $v["description"] = "Explore our latest blog posts featuring expert tips, how-to guides, and solutions for all your PDF needs – from conversions to editing and more.";
        return view('pages.blog', $v);
    }

    public function blog_post1(){
        $v = array();
        $v["title"] = "How to Convert Word to PDF Without Changing Font";
        $v["description"] = "Learn the easiest methods to convert Word documents to PDF without losing your original fonts and formatting.";
        return view('pages.how-to-convert-word-to-pdf-without-changing-font',$v);
    }
    public function blog_post2()
    {
        $v = array();
        $v["title"] = "How to Use AI PDF Summarizers to Save Time and Boost Productivity";
        $v["description"] = "Reading long documents can be time-consuming. An AI PDF summarizer helps by using smart technology to scan the file and turn it into a short, easy summary. It picks out the important points fast, which helps you save time and stay productive.";
        return view('pages.how-to-use-ai-pdf-summarizers', $v);
    }
     public function blog_post3()
    {
        $v = array();
        $v["title"] = "Top Free AI PDF Summarizer Tools for 2026: Which One Should You Choose?";
        $v["description"] = "Discover the best free AI PDF summarizer tools for 2026. Learn how to use them effectively and compare free vs paid options to find the perfect tool for your needs.";
        return view('pages.how-to-use-ai-pdf-summarizers2', $v);
    }
     public function blog_post4()
    {
        $v = array();
        $v["title"] = "The Best AI Tools to Summarize PDFs: Your 2026 Guide to Cutting-Edge Technology";
        $v["description"] = "Discover the best AI tools to summarize PDFs in 2026. Learn how AI PDF summarizers work, their advantages, and how to choose the right tool for your needs.";
        return view('pages.how-to-use-ai-pdf-summarizers3', $v);
    }
    public function blog_post5()
    {
        $v = array();
        $v["title"] = "How to Convert PDF to Word without Losing Formatting: 2026 Complete Guide";
        $v["description"] = "Learn how to convert PDF to Word without losing formatting in 2026. Discover the best PDF to Word converters, step-by-step guide, and expert tips for perfect conversions.";
        return view('pages.pdf-to-word-blog', $v);
    }
    public function blog_post6()
{
    $v = array();
    $v["title"] = "How to Compress a PDF in Seconds: Best Tools & Tips for 2026";
    $v["description"] = "Learn how to compress PDF files quickly and efficiently. Discover the best PDF compression tools, tips, and step-by-step guides for faster uploads and storage.";
    return view('pages.compress-pdf-guide', $v);
}
public function blog_post7()
{
    $v = array();
    $v["title"] = "How to Merge PDF Files Easily in 2026: Best Free & Paid Tools Explained";
    $v["description"] = "Learn how to merge PDF files easily with the best free and paid tools. Discover step-by-step guides, advanced tips, and solutions to common problems.";
    return view('pages.merge-pdf-guide', $v);
}
public function blog_post8()
{
    $v = array();
    $v["title"] = "How to Convert Word to PDF without Losing Formatting in 2026";
    $v["description"] = "Learn how to convert Word to PDF without losing formatting. Discover the best free and paid Word to PDF converters, step-by-step guides, and expert tips.";
    return view('pages.word-to-pdf-guide', $v);
}
public function blog_post9()
{
    $v = array();
    $v["title"] = "How to Compress PDF Files without Quality Loss in 2026";
    $v["description"] = "Learn how to compress PDF files without losing quality in 2026. Discover the best free and paid PDF compression tools, step-by-step guides, and expert tips.";
    return view('pages.compress-pdf-guide-v2', $v);
}
public function blog_post10()
{
    $v = array();
    $v["title"] = "How to Merge PDF Files Online for Free in 2026";
    $v["description"] = "Learn how to merge PDF files online for free in 2026. Discover the best free PDF merger tools, step-by-step guides, and expert tips for seamless document merging.";
    return view('pages.merge-pdf-guide-v2', $v);
}
public function blog_post11()
{
    $v = array();
    $v["title"] = "How to Convert Images to PDF Easily in 2026: Complete Guide";
    $v["description"] = "Learn how to convert images to PDF easily in 2026. Discover the best image to PDF converter tools, step-by-step guides, and expert tips for perfect conversions.";
    return view('pages.image-to-pdf-guide', $v);
}
public function blog_post12()
{
    $v = array();
    $v["title"] = "Best All-in-One PDF Tools in 2026: Convert, Compress, Merge & Edit";
    $v["description"] = "Discover the best all-in-one PDF tools in 2026 for converting, compressing, merging, and editing PDFs. Compare features, pricing, and security standards.";
    return view('pages.all-in-one-pdf-tools', $v);
}
public function blog_post13()
{
    $v = array();
    $v["title"] = "How to Convert Images to PDF Without Losing Quality in 2026";
    $v["description"] = "How to convert images to PDF without losing quality in 2026. Explore expert tips, free tools, and best practices for perfect PDF output.";
    return view('pages.pdf-without-losing-quality', $v);
}
public function blog_post14()
{
    $v = array();
    $v["title"] = "How to Convert Images to PDF on iPhone and Android in 2026";
    $v["description"] = "Learn how to convert images to PDF on iPhone and Android devices in 2026. Discover built-in methods, best apps, and solutions to common problems.";
    return view('pages.mobile-image-to-pdf', $v);

}
public function blog_post15()
{
    $v = array();
    $v["title"] = "How to Combine Multiple Images into One PDF for Free in 2026";
    $v["description"] = "Learn how to combine multiple images into one PDF for free in 2026. Discover the best tools, step-by-step guide, and tips for professional output.";
    return view('pages.combine-images-to-pdf', $v);
}
public function blog_post16()
{
    $v = array();
    $v["title"] = "How to Convert PDF to Image (JPG PNG TIFF) in 2026";
    $v["description"] = "Learn how to convert PDF to image formats like JPG, PNG, and TIFF in 2026. Discover the best tools, step-by-step guide, and format comparisons.";
    return view('pages.pdf-to-image-guide', $v);
}
public function blog_post17()
{
    $v = array();
    $v["title"] = "How to Add or Insert Images into a PDF Document in 2026";
    $v["description"] = "Learn how to add or insert images into a PDF document in 2026. Discover the best tools, step-by-step guide, and solutions to common placement issues.";
    return view('pages.add-image-to-pdf', $v);
}
public function blog_post18()
{
    $v = array();
    $v["title"] = "How to Extract Images and Text from a PDF in 2026";
    $v["description"] = "Learn how to extract images and text from PDF files in 2026. Discover the best extraction tools, OCR technology, and step-by-step guides.";
    return view('pages.extract-from-pdf', $v);
}
public function blog_post19()
{
    $v = array();
    $v["title"] = "How to Convert PDF to Word without Losing Formatting in 2026";
    $v["description"] = "Learn how to convert PDF to Word without losing formatting in 2026. Discover the best tools, step-by-step guide, and tips for perfect conversions.";
    return view('pages.pdf-to-word-guide-v2', $v);
}
public function blog_post20()
{
    $v = array();
    $v["title"] = "How to Convert Word to PDF Securely in 2026";
    $v["description"] = "Learn how to convert Word documents to PDF securely in 2026. Discover the best tools, step-by-step guide, and tips for perfect conversions.";
    return view('pages.word-to-pdf-v2', $v);
}
public function blog_post21()
{
    $v = array();
    $v["title"] = "How to Compress PDF File Size without Losing Quality in 2026";
    $v["description"] = "PDF is a globally used file format, but large PDF files create delays during uploads and frustrate users across many common digital tasks.";
    return view('pages.compress-pdf-guide-v3', $v);
}
public function blog_post22()
{
    $v = array();
    $v["title"] = "How to Merge Multiple PDF Files into One in 2026";
    $v["description"] = "PDF files appear everywhere, and users face challenges when many documents exist separately in daily work tasks. One merged file offers clarity and control and reduces confusion during document use.";
    return view('pages.merge-pdf-guide-v3', $v);
}
public function blog_post23()
{
    $v = array();
    $v["title"] = "How to Convert PDF to JPG Images in 2026";
    $v["description"] = "PDF files often limit quick access and flexible use across many popular online environments. However, they are not the right fit when it comes to social media or websites.";
    return view('pages.pdf-to-jpg-guide', $v);
}
public function blog_post24()
{
    $v = array();
    $v["title"] = "Are Free Online PDF Tools Safe in 2026? Security & Privacy";
    $v["description"] = "Learn how safe free online PDF tools really are. Discover security risks, privacy protections & how to use PDF tools safely in 2026. Visit now & Read more!";
    return view('pages.free-pdf-tools-safe', $v);
}
    public function pdfSummarize()
    {
        $v = array();
        $v["title"] = "Convert Word to PDF – Free PDF Tools";
        $v["description"] = "Quickly and easily convert your Word documents to PDF using our free tool.";
        return view('pages.pdf-summarize', $v);
    }
    



}
