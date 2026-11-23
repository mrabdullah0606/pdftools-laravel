<?php

return [
    'title' => 'Print Ready PDF for Brochures and Flyers: Step by Step',
    'description' => 'Learn how to create print-ready PDFs for brochures and flyers. Covers resolution, margins, color, file size, and how to check your file before sending it to print.',
    'main-heading' => 'How to Create a Print-Ready PDF for Brochures and Flyers',

    'intro-p1' => 'A brochure that looks perfect on screen can print with cut-off text, dull colors, or blurry photographs. Printing exposes problems that screens hide. Resolution, margins, color mode, and file structure all affect the final result. A print-ready PDF prepares the file for the press or office printer so the output matches your design.',
    'intro-p2' => 'This guide explains the settings that matter, how to export a file from a word processor or design tool, and how to check the PDF before you send it to a print shop.',

    'what-heading' => 'What Makes a PDF Print Ready',
    'what-p1' => 'A print-ready PDF has fonts embedded, images at sufficient resolution, and a layout that accounts for the physical limits of the printer. Most office printers cannot print all the way to the edge of the paper, so designers leave margins. Professional presses need bleed, which is extra image area that extends beyond the trim line.',
    'what-p2' => 'Print shops typically ask for a PDF that matches their specifications. Always confirm their requirements before exporting, because a file prepared for a desktop printer may not suit a commercial press.',

    'setup-heading' => 'Set Up the Document Correctly',
    'setup-p1' => 'Start with the correct page size. A standard tri-fold brochure, for example, uses a letter or A4 sheet folded into three panels. Set the page size and orientation before designing, since changing them later can shift every element.',
    'setup-p2' => 'Keep important text at least a quarter inch from the trim edge. This safe zone prevents cut-off words after trimming. Background colors and photographs that run to the edge should extend into the bleed area, usually an eighth of an inch beyond the trim line.',

    'resolution-heading' => 'Choose Resolution and Image Quality',
    'resolution-p1' => 'Images should be at least 300 pixels per inch at the printed size. A photograph that looks sharp on screen may be too low in resolution for print. Check each image before placing it in the layout, and replace any that appear pixelated when enlarged.',
    'resolution-p2' => 'Vector graphics such as logos and icons scale without losing quality, so use them when possible. Text should be live rather than converted to images, which keeps it crisp and searchable.',

    'color-heading' => 'Color and Fonts',
    'color-p1' => 'Professional printing usually uses CMYK color, while screens use RGB. Colors that look bright on a monitor may print duller, especially bright blues and greens. Ask the print shop whether they want a CMYK file or whether they will convert it themselves.',
    'color-p2' => 'Embed all fonts in the export. Missing fonts cause the printer to substitute typefaces, which can change line lengths and break layouts. Most export dialogs include an option to embed fonts, and it should be enabled by default.',

    'export-heading' => 'Export the File',
    'export-p1' => 'Once the layout is complete, export it as a PDF. If you designed the piece in Word, use the __WORD_TO_PDF_LINK__ or export directly from Word with the print quality setting. Confirm that bleed and crop marks are included if the printer requires them.',
    'export-p2' => 'For multi-page flyers or booklets, check the page order carefully. Booklets often need pages arranged in a specific sequence for folding, and the print shop may request an imposed file. Ask them which format they prefer before preparing the final export.',

    'checking-heading' => 'Check the PDF Before Printing',
    'checking-p1' => 'Open the PDF and zoom into several areas, especially photographs and small text. Look for pixelation, unexpected color shifts, and text that appears too close to the edge. Print a test page on your office printer to check the layout at actual size. Keep in mind that office printers will not show bleed accurately.',
    'checking-p2' => 'Verify the page count and the order of panels. A brochure with a missing page or swapped panels is expensive to reprint. Checking the PDF thoroughly takes minutes and can save a great deal of money.',

    'reducing-heading' => 'Reduce the File Size Without Harming Print Quality',
    'reducing-p1' => 'Print-ready files are often large because they include high-resolution images. Compression can reduce the size, but it must be done carefully. Aggressive compression can lower image resolution below print standards. Use a __COMPRESS_LINK__ with a light or medium setting, then check the output at full size before sending it to print.',
    'reducing-p2' => 'If the file is being shared digitally as well, create a second, smaller version for email and web use. Keep the high-resolution file for the printer.',

    'images-heading' => 'Turn Print Pages Into Images for Social Sharing',
    'images-p1' => 'After the print run, many businesses post pages from the brochure online. Converting selected pages to images allows them to appear directly in social feeds. A __PDF_TO_JPG_LINK__ creates image files for each page, which you can resize for each platform.',

    'combine-heading' => 'Combine Multiple Print Files',
    'combine-p1' => 'Some projects include a brochure, a price sheet, and a reply card. Combining them into a single PDF can simplify approval, although print shops often prefer separate files for each component. Ask the printer before merging. If they accept a combined file, use a __MERGE_LINK__ and confirm that every page keeps its correct size.',

    'problems-heading' => 'Common Print Problems',
    'problems-p1' => 'Text too close to the trim line is the most common issue. It is caused by ignoring the safe zone during design. Move the text inward before exporting.',
    'problems-p2' => 'Low-resolution images produce soft printouts. Replace them with higher-resolution originals whenever possible.',
    'problems-p3' => 'Using RGB colors without converting to CMYK can produce unexpected results. Confirm the color profile with the printer.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'What resolution should a print-ready PDF use?',
    'faq1-a' => 'Images should be 300 pixels per inch at the final printed size. Lower resolutions may appear acceptable on screen but look soft in print.',
    'faq2-q' => 'What is bleed, and do I need it?',
    'faq2-a' => 'Bleed is extra image area beyond the trim line. Professional printers usually require it for backgrounds and photos that run to the edge. Check the printer\'s specifications.',
    'faq3-q' => 'Should I send a CMYK or RGB PDF to the printer?',
    'faq3-a' => 'Most professional printers prefer CMYK. Confirm the requirement with the print shop before exporting.',
    'faq4-q' => 'Why does my printed flyer look different from my screen?',
    'faq4-a' => 'Screens use RGB colors, while printers use CMYK inks. Bright screen colors may print duller, so adjust the design or confirm color settings before printing.',
    'faq5-q' => 'Can I print a PDF directly from my office printer?',
    'faq5-a' => 'Yes, but office printers cannot print to the edge of the page and do not show bleed. For commercial printing, follow the print shop\'s specifications instead.',
];
