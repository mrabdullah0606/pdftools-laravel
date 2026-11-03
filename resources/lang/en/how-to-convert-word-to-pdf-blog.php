<?php

return [
    'title' => 'How to Convert Word to PDF Without Font or Layout Changes',
    'description' => 'Learn how to convert Word to PDF without changing fonts, spacing, or layout. Follow simple steps to preserve your document\'s original look. Convert it now!',
    'main-heading' => 'How to Convert Word to PDF Without Changing the Font or Layout',

    'intro-heading' => 'The Formatting Problem That Catches People by Surprise',
    'intro-p1' => 'You spend time getting a Word document looking exactly right. The fonts are set. The spacing is precise. The headers align properly. You convert it to PDF and something changes. A heading shifts position. Text that fitted on one page now overflows onto a second. A font appears slightly different. The careful formatting from Word does not survive the conversion intact.',
    'intro-p2' => 'This happens more often than it should, and it is almost always preventable. Understanding why it happens and which conversion method avoids it entirely means your PDF will match your Word document exactly, every time.',

    'why-heading' => 'Why Formatting Changes During Word to PDF Conversion',
    'why-p1' => 'The most common cause of formatting changes is font substitution. When you convert a Word document to PDF, the conversion tool needs access to the exact font files used in the document to render it correctly. If the tool converting the document does not have those fonts installed, it substitutes the closest available font. Even a minor font substitution can change letter spacing enough to cause text to reflow across lines, which shifts page breaks and can push content onto additional pages.',
    'why-p2' => 'The second common cause is differences in the page rendering engine. The Print to PDF method uses the operating system\'s print driver, which interprets the document\'s formatting instructions slightly differently from Word itself. Native Word export uses Word\'s own rendering engine, which understands every formatting rule precisely.',
    'why-p3' => 'A third cause is compatibility issues between Word versions. A document created in Word 365 with features not available in older versions may lose those features when opened and converted in an older application.',

    'method1-heading' => 'Method 1: Word\'s Native Export (Best Results, Always)',
    'method1-intro' => 'The most reliable method for Word to PDF conversion, regardless of document complexity, is Microsoft Word\'s own Export function. It uses Word\'s rendering engine directly, which eliminates font substitution and rendering differences.',
    'method1-step1' => 'Open your document in Microsoft Word.',
    'method1-step2' => 'Go to File and select Export.',
    'method1-step3' => 'Choose Create PDF/XPS Document.',
    'method1-step4' => 'In the export dialog, select Standard quality for documents that will be printed, or Minimum size for documents that will only be read on screen.',
    'method1-step5' => 'Click Publish and choose where to save the PDF.',
    'method1-note' => 'This method embeds all fonts used in the document into the PDF, so the formatting looks identical on any device the recipient uses, regardless of whether they have those fonts installed.',

    'method2-heading' => 'Method 2: PDFTools Word to PDF Converter',
    'method2-intro' => 'When you do not have Microsoft Word available, the __WORD_TO_PDF_LINK__ at PDFTools converts DOCX files to PDF without requiring any software installation. This is useful when working on a device without Office, converting files received from others, or processing documents in bulk.',
    'method2-step1' => 'Go to the Word to PDF tool in your browser.',
    'method2-step2' => 'Upload your DOCX or DOC file.',
    'method2-step3' => 'The converter processes the document and generates a PDF.',
    'method2-step4' => 'Download the converted PDF.',
    'method2-note' => 'For most standard business documents, the output quality is excellent. For the full step-by-step walkthrough of this process, see the __WORD_TO_PDF_GUIDE_LINK__ and the __PDF_CONVERSION_GUIDE_LINK__ at PDFTools.',

    'method3-heading' => 'Method 3: Embedding Fonts Before Converting',
    'method3-intro' => 'If you are having font-related formatting issues regardless of which conversion method you use, embedding all fonts in the Word file before conversion solves the problem at the source.',
    'method3-step1' => 'In Word, go to File then Options.',
    'method3-step2' => 'Select Save from the left panel.',
    'method3-step3' => 'Check the option Embed fonts in the file.',
    'method3-step4' => 'Also check Do not embed common system fonts to keep the file size reasonable.',
    'method3-step5' => 'Save the document, then convert to PDF using your preferred method.',
    'method3-note' => 'With all fonts embedded, any conversion tool has access to the exact font data needed to render the document correctly, eliminating substitution as a cause of formatting differences.',

    'method4-heading' => 'Method 4: Google Docs (Free Browser-Based Option)',
    'method4-intro' => 'Google Docs can open DOCX files and export them as PDF, providing a free browser-based alternative for users without Microsoft Office.',
    'method4-step1' => 'Upload your DOCX file to Google Drive.',
    'method4-step2' => 'Right-click and select Open with Google Docs.',
    'method4-step3' => 'Go to File and select Download then PDF Document.',
    'method4-note' => 'Google Docs generally does a good job with standard formatting. Custom fonts that are not available in Google\'s font library will be substituted, and some advanced Word features like SmartArt may render differently. For documents that use only common fonts and standard formatting, the output is usually clean.',

    'checking-heading' => 'Checking the Output Before Sharing',
    'checking-p1' => 'Regardless of which conversion method you use, always open the resulting PDF and review it before sharing. Scroll through every page and check that all fonts appear correctly, that page breaks fall in the expected places, that images and tables are intact, and that headers and footers are present on every page they should appear on.',
    'checking-p2' => 'This review takes two minutes and prevents the more time-consuming problem of receiving a response from a client or reviewer asking why the document looks different from what was sent.',

    'conclusion-heading' => 'Conclusion',
    'conclusion-p1' => 'Formatting changes during Word to PDF conversion are almost always preventable by using the right method. Word\'s native Export function is the most reliable approach and should be the default choice whenever Word is available. Embedding fonts before conversion eliminates the most common source of formatting differences.',
    'conclusion-p2' => 'For conversions without Word installed, the __WORD_TO_PDF_LINK__ at PDFTools handles standard documents reliably and for free. After conversion, if the PDF needs to be reduced in size for emailing, use the __COMPRESS_LINK__. For the reverse conversion, turning a PDF back into an editable Word document, see the __PDF_TO_WORD_LINK__.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'Why does my PDF have an extra blank page at the end?',
    'faq1-a' => 'An extra blank page at the end of a converted PDF almost always comes from a blank paragraph at the end of the Word document. Place your cursor at the very end of the document, select and delete any content after the last real paragraph, and re-export. This removes the blank final page.',
    'faq2-q' => 'Why are my images blurry in the PDF but sharp in Word?',
    'faq2-a' => 'This happens when the Print to PDF method is used instead of Word\'s native export. Print to PDF rasterises the entire page at a fixed resolution, which degrades image quality. Use File then Export then Create PDF/XPS in Word instead, which preserves images at their original resolution.',
    'faq3-q' => 'Can I convert a password-protected Word document to PDF?',
    'faq3-a' => 'Yes, but you need to open the Word document first, which requires the password. Once the document is open in Word, you can export it to PDF normally. The resulting PDF will not inherit the Word document\'s password protection unless you add PDF protection separately.',
    'faq4-q' => 'Does converting to PDF preserve hyperlinks?',
    'faq4-a' => 'Yes, when using Word\'s native export or a quality online converter. Hyperlinks in the Word document remain clickable in the resulting PDF. If your hyperlinks are not preserved, check that you are using the native export option rather than the print driver method.',
];
