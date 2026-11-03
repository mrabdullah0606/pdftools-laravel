<?php

return [
    'title' => 'How to Convert Excel to PDF Without Formatting Issues (2026 Guide)',
    'description' => 'Learn how to convert Excel to PDF without formatting issues. Fix cut-off columns, broken layouts, and blank pages. Read the 2026 guide now!',
    'main-heading' => 'How to Convert Excel to PDF Without Formatting Issues (2026 Guide)',

    // Why Excel to PDF Conversion Goes Wrong
    'intro-heading' => 'Why Excel to PDF Conversion Goes Wrong',
    'intro-para1' => 'Converting an Excel spreadsheet to PDF should be a simple task, but it consistently catches people by surprise. Columns get cut off at the right edge of the page. Rows that looked fine in Excel spill across multiple pages at awkward points. Charts appear on the wrong pages. Text that fitted perfectly in a cell is truncated in the PDF output. Colours shift. The carefully constructed layout you worked on for hours looks like a different document entirely.',
    'intro-para2' => 'These problems are not random. They all stem from the same fundamental mismatch: Excel is a grid-based application that does not think in pages, and PDF is a page-based format. When you convert from one to the other, that mismatch has to be resolved somehow, and if you do not resolve it deliberately, Excel makes its own choices which are often not what you wanted.',
    'intro-para3' => 'The good news is that all of these problems are preventable. This guide walks through the preparation steps that eliminate formatting issues before conversion, and the specific settings that control the output.',

    // Step 1: Define Your Print Area
    'step1-heading' => 'Step 1: Define Your Print Area',
    'step1-para1' => 'The print area is one of the most important and most ignored settings in Excel. When no print area is defined, Excel attempts to include all cells that contain data when converting to PDF. This often includes empty cells that Excel considers part of the used range, resulting in blank pages or extra columns that should not appear in the output.',
    'step1-para2' => 'To set the print area, select exactly the cells you want to appear in the PDF. Then go to Page Layout in the ribbon, click Print Area, and choose Set Print Area. A dashed border will appear around your selection confirming the area is set.',
    'step1-para3' => 'This single step eliminates the most common cause of unexpected blank pages and extra content in Excel PDF output.',

    // Step 2: Set Page Orientation and Size
    'step2-heading' => 'Step 2: Set the Page Orientation and Size',
    'step2-para1' => 'Most Excel spreadsheets are wider than they are tall. Portrait orientation cuts columns off on the right. Switching to Landscape orientation in the Page Layout tab gives you significantly more horizontal space and usually solves the cut-off columns problem immediately.',
    'step2-para2' => 'Set the paper size to match what your recipients will print on. For most countries, A4 is standard. For US recipients, Letter size is the norm. Using the wrong paper size does not affect how the PDF looks on screen, but it causes formatting problems when the recipient tries to print.',

    // Step 3: Use Scale to Fit
    'step3-heading' => 'Step 3: Use Scale to Fit',
    'step3-para1' => 'The Scale to Fit options in the Page Layout tab are specifically designed to resolve the problem of content overflowing the page. The most useful option is Fit All Columns on One Page, which shrinks the horizontal scale of your spreadsheet until all columns fit within the page width. Rows continue to break naturally across pages, but no columns are cut off.',
    'step3-para2' => 'If your spreadsheet has many rows as well as many columns, consider setting both dimensions: Fit Sheet on One Page forces everything onto a single page by shrinking as much as necessary. Be aware that if your spreadsheet is large, this can make the text very small. Always check the result in Print Preview before finalising.',

    // Step 4: Repeat Header Rows
    'step4-heading' => 'Step 4: Repeat Header Rows on Every Page',
    'step4-para1' => 'For spreadsheets that span multiple pages, having column headers appear only on the first page makes the subsequent pages difficult to read. Excel can automatically repeat your header row at the top of every page in the PDF output.',
    'step4-para2' => 'Go to Page Layout and click Print Titles. In the Rows to repeat at top field, enter the reference for your header row. For example, enter dollar sign 1 colon dollar sign 1 to repeat row 1 on every page. This is a small setting that makes a significant difference to the readability of multi-page spreadsheet PDFs.',

    // Step 5: Check Print Preview
    'step5-heading' => 'Step 5: Check Print Preview Before Exporting',
    'step5-para1' => 'This step is skipped more often than any other and accounts for most of the preventable formatting surprises. Before exporting to PDF, go to File then Print. This opens the print preview, which shows exactly what the PDF output will look like, page by page.',
    'step5-para2' => 'Scroll through every page and check: are all columns visible? Do headers repeat? Are charts on the right pages? Is any content truncated? Are there unexpected blank pages? Fixing problems in Print Preview takes a few seconds. Fixing them after sharing the PDF with a client takes much longer.',

    // Step 6: Export Using Native Export
    'step6-heading' => 'Step 6: Export Using Excel\'s Native Export Function',
    'step6-para1' => 'The most important choice in the entire process is how you create the PDF. Excel\'s native export function produces the highest quality and most accurate output because it uses Excel\'s own rendering engine, which understands all of Excel\'s page layout settings exactly.',
    'step6-para2' => 'Go to File, then Export, then Create PDF/XPS. In the dialog that opens, choose Standard quality for documents that will be printed, or Minimum size for documents that will only be read on screen. Click Publish to create the file.',
    'step6-para3' => 'Avoid the Print to PDF method (using a virtual PDF printer) for Excel files. This approach renders the spreadsheet through the operating system\'s print driver rather than Excel\'s own engine, which ignores some layout settings and produces lower quality results.',

    // When to Use an Online Converter
    'online-converter-heading' => 'When to Use an Online Converter',
    'online-converter-para' => 'Online converters like PDFTools are most useful when you need to convert an Excel file on a device that does not have Microsoft Excel installed. The',
    'a'=>' Word to PDF',
     'online-converter-para-1' =>'Word to PDF tool at PDFTools accepts Excel files as well as Word documents and handles straightforward spreadsheets reliably. For complex spreadsheets with conditional formatting, pivot tables, or intricate layout rules, native Excel export is always the more accurate option.',

    // Fixing Common Problems
    'common-problems-heading' => 'Fixing Common Problems',

    'problem1-heading' => 'Columns are still cut off after changing orientation',
    'problem1-text' => 'If landscape orientation is not enough, reduce the width of individual columns, increase the margins slightly, or use a smaller font size for the spreadsheet. You can also consider whether some columns can be hidden for the PDF export without losing essential information.',

    'problem2-heading' => 'Charts appear on the wrong page',
    'problem2-text' => 'Insert manual page breaks before and after the chart by going to Page Layout and clicking Insert Page Break. Alternatively, move charts to dedicated chart sheets by right-clicking the chart and choosing Move Chart, then selecting New Sheet.',

    'problem3-heading' => 'Blank pages appear at the end',
    'problem3-text' => 'Blank pages at the end are almost always caused by the print area including empty cells below your data, or by a manual page break that was not removed. Clear all page breaks by going to Page Layout, clicking Breaks, and choosing Reset All Page Breaks. Then redefine your print area.',

    // Conclusion
    'conclusion-heading' => 'Conclusion',
    'conclusion-para1' => 'Formatting problems in Excel to PDF conversion are almost always caused by settings that were never configured, not by the conversion tool itself. Setting the print area, choosing the right orientation, using Scale to Fit, repeating header rows, and checking Print Preview before export will eliminate the vast majority of issues before they occur.',
    'conclusion-para2' => 'For the export step, always use Excel\'s native Create PDF/XPS function rather than virtual printing. If you need to reduce the resulting file size for emailing, the ',
    'a2'=>'compress PDF',
   'conclusion-para3' => ' tool at PDFTools handles this quickly after export. For combining multiple spreadsheet PDFs into a single document, the ',
   'a3'=>'merge PDF',
   'conclusion-para4' =>'tool is available free at PDFTools.',

    // FAQs
    'faqs-heading' => 'Frequently Asked Questions',

    'faq1-question' => 'Why does the Excel PDF look different on different computers?',
    'faq1-answer' => 'Excel uses system fonts when displaying on screen, but embeds font data in PDF exports. If the PDF was created with Excel\'s native export, it should look identical on every device. If it was created by printing to PDF, font rendering may vary slightly.',

    'faq2-question' => 'Can I convert multiple Excel sheets into one PDF?',
    'faq2-answer' => 'Yes. Right-click any sheet tab and choose Select All Sheets, or Ctrl-click individual tabs to select specific ones. Then use File then Export then Create PDF/XPS. Excel includes all selected sheets as sequential pages in a single PDF file.',

    'faq3-question' => 'Does the PDF keep Excel formulas?',
    'faq3-answer' => 'No. PDF is a presentation format, not a calculation format. The PDF shows the current values of cells that contain formulas, but the formulas themselves are not included. Recipients cannot modify values or recalculate. If recipients need to work with the live data, send the Excel file instead.',

    'faq4-question' => 'How do I make sure charts look sharp in the PDF?',
    'faq4-answer' => 'Charts created natively in Excel are converted to vector graphics in PDF export, which means they remain sharp at any zoom level. Charts that were pasted in as images rather than created in Excel may appear softer. Use native Excel charts wherever possible for the sharpest output.',
];