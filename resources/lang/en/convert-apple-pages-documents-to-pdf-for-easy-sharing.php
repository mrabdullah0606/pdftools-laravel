<?php

return [
    'title' => 'Convert Apple Pages Documents to PDF for Easy Sharing',
    'description' => 'Learn how to convert Apple Pages documents to PDF so layouts, fonts, and images stay consistent. Step-by-step guide with checks for sharing and printing.',
    'main-heading' => 'Convert Apple Pages Documents to PDF for Easy Sharing',

    'intro-p1' => 'Apple Pages is a clean and capable word processor, but its files do not always open the same way on other devices. A Windows user may see different fonts, a colleague using an older version may see shifted images, and a printer may produce pages that do not match the screen. Exporting the document to PDF removes these differences. The recipient sees the same layout you designed, whatever device they use.',
    'intro-p2' => 'This guide covers how to convert a Pages document, what to check before sending it, and how to handle the situations where a Pages file or a PDF is the better choice.',

    'why-heading' => 'Why Pages Documents Need Conversion',
    'why-p1' => 'Pages files rely on fonts and layout settings that may not exist on every system. When a file opens on a device without those fonts, the software substitutes alternatives. Line breaks change, text reflows, and tables may shift. A PDF embeds the fonts and fixes every element on the page, so these changes do not occur.',
    'why-p2' => 'Sharing a PDF also protects the document from accidental edits. Recipients can read and print it, but they cannot change the text as easily as they could in an editable file.',

    'steps-heading' => 'Step by Step: Export the Document',
    'steps-p1' => 'Open the document in Pages and review it from the first page to the last. Confirm that headings, page breaks, and images are where you want them. Fix any problems before exporting, since changes are harder to make once the file is a PDF.',
    'steps-p2' => 'Next, convert the file with the __PAGES_TO_PDF_LINK__. If you prefer to export within Pages, choose File, then Export To, and select PDF. Choose the standard quality setting for documents that will be printed, and a smaller size for documents that will only be read on screen.',
    'steps-p3' => 'Save the file with a descriptive name that includes the title and date, such as annual_report_2026.pdf.',

    'checking-heading' => 'Check the PDF Before Sharing',
    'checking-p1' => 'Open the PDF in a viewer on your computer, then open it on a phone or another computer to confirm that it looks the same. Check page numbers, headers, footers, and the table of contents if the document has one. Table of contents links may not work after conversion, so test them.',
    'checking-p2' => 'Look closely at images. Confirm that they are sharp and positioned correctly. Images with transparent backgrounds sometimes change appearance during export, so check any logos or diagrams carefully.',
    'checking-p3' => 'Test whether the text can be searched. Recipients often search PDFs for a name or term. If text cannot be selected, the document may have been saved as an image, which makes searching and screen reading impossible.',

    'combining-heading' => 'Combining Pages Documents With Other Files',
    'combining-p1' => 'Many projects include several documents. A proposal may include a Pages letter, a spreadsheet summary, and a set of appendices. Convert each Pages file to PDF, then combine them into one package with a __MERGE_LINK__. This creates a single document that recipients can read in order.',
    'combining-p2' => 'Keep the editable Pages files in your project folder. If a section needs revision, you can update the source and export the PDF again rather than editing the combined file.',

    'word-heading' => 'Working With Word Users',
    'word-p1' => 'Recipients who use Microsoft Word sometimes need an editable file rather than a PDF. If the Pages document must be edited in Word, export it as a Word file from Pages first. Then review the result, since complex formatting may change during export.',
    'word-p2' => 'If you need to convert a Word document into PDF after editing, the __WORD_TO_PDF_LINK__ produces a PDF that matches the layout in Word. Using a consistent export method for each project helps avoid surprises.',

    'printing-heading' => 'Printing Considerations',
    'printing-p1' => 'Printing a PDF is usually more reliable than printing directly from a word processor, because the layout is fixed. Before printing a large batch, print one page to check margins, colors, and image quality. Some printers crop the edges of pages, so leave a small margin in the original design to avoid losing content.',
    'printing-p2' => 'If the document is meant for professional printing, ask the print shop for their preferred settings, such as the size of the bleed area or the color profile.',

    'filesize-heading' => 'Keeping File Size Under Control',
    'filesize-p1' => 'Documents with many high-resolution photographs can produce large PDFs. If the file is too big to email, reduce the image size in Pages before exporting, or compress the finished PDF. A __COMPRESS_LINK__ reduces the size while keeping text sharp, which is usually the most effective option.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'Will my Pages layout stay the same in the PDF?',
    'faq1-a' => 'In most cases, yes. Exporting to PDF fixes the layout, so it appears the same on any device. Review the file after export to confirm.',
    'faq2-q' => 'Can I convert a Pages document without owning a Mac?',
    'faq2-a' => 'Yes. Browser-based converters accept Pages files, and you can also export from Pages on a Mac or iPad before uploading the PDF elsewhere.',
    'faq3-q' => 'Why did my images change after exporting?',
    'faq3-a' => 'Transparent images and certain graphic effects can change during export. Replace problematic images with flat versions or check the export settings.',
    'faq4-q' => 'Are links in a Pages document preserved in the PDF?',
    'faq4-a' => 'Most links are preserved, but internal links such as table of contents entries may need testing. Check them after conversion.',
    'faq5-q' => 'Should I send a Pages file or a PDF?',
    'faq5-a' => 'Send a PDF when the recipient only needs to read or print the document. Send the Pages file only when the recipient must edit it and has compatible software.',
];
