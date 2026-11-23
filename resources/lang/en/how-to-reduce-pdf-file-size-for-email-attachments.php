<?php

return [
    'title' => 'How to Reduce PDF File Size for Email Attachments | PDFTools',
    'description' => 'Learn how to shrink PDF files so they send through email without losing readability. Covers compression levels, quality checks, and when to share a link instead.',
    'main-heading' => 'How to Reduce PDF File Size for Email Attachments',

    // Intro
    'intro-p1' => 'Email is still the most common way people send documents, yet many messages bounce back because the attachment is too large. A scanned contract, a brochure filled with photographs, or a report with dozens of charts can easily exceed the limit set by most mail providers. The good news is that a large PDF is rarely a broken PDF. In most cases the content is fine, and the file simply carries more data than it needs.',
    'intro-p2' => 'Reducing file size is usually a matter of managing images. Text takes up very little space, while a single high-resolution photograph can take several megabytes. The aim is to bring image resolution down to a level that still looks sharp on screen, without touching the text or layout. This guide explains where the size comes from, how to choose a compression level, and how to check the result before you send it.',

    // Why PDFs Get So Large
    'why-heading' => 'Why PDFs Get So Large',
    'why-p1' => 'Most PDF size comes from pictures. Scanned pages are essentially large images, so a fifty-page scan can reach a hundred megabytes even though it contains no selectable text. Photographs embedded in a brochure or product catalog add weight in the same way.',
    'why-p2' => 'Smaller contributors also add up. Embedded fonts, hidden metadata, comments, and form data all take space. Some creation tools embed images at a higher resolution than the page needs. A photograph printed four inches wide does not need the detail of a poster.',

    // Choosing a Compression Level
    'levels-heading' => 'Choosing a Compression Level',
    'levels-p1' => 'Most tools offer three levels. A light setting removes redundant data and reduces images only slightly, usually saving ten to thirty percent. The difference is hard to see on screen, which makes it a safe first choice when the file is only a little over the limit.',
    'levels-p2' => 'A medium setting suits most business documents. It lowers image resolution to a level that looks sharp on monitors and phones, and it typically reduces file size by forty to sixty percent. Text stays crisp because it is stored as vector data rather than pixels.',
    'levels-p3' => 'A strong setting reduces images aggressively. It can cut the size by more than two-thirds, but photographs may look soft and small print inside scans may become hard to read. Reserve this level for files that must be small and will only be viewed on screen.',

    // Step by Step: Compress the File
    'steps-heading' => 'Step by Step: Compress the File',
    'steps-p1' => 'Open the __COMPRESS_LINK__ and upload your file. Wait for the upload to finish before choosing a setting. Start with the medium level, then process the file and download the result.',
    'steps-p2' => 'Save the new file with a distinct name, such as proposal_compressed.pdf. Keep the original as well. This prevents confusion later and gives you a fallback if the compressed version does not meet expectations.',

    // Check the Result Before Sending
    'check-heading' => 'Check the Result Before Sending',
    'check-p1' => 'Open the compressed file on a computer and on a phone. Zoom into a photograph and check whether the edges look smooth. Read several lines of small text. If the document will be printed, print one page to confirm the output is acceptable.',
    'check-p2' => 'Confirm that links, bookmarks, and form fields still work. Most compression tools preserve them, but a quick test takes only a moment.',

    // When the File Is Still Too Large
    'toolarge-heading' => 'When the File Is Still Too Large',
    'toolarge-p1' => 'If the strong setting still produces a file that is too big, the problem may be the number of pages rather than the images. Remove appendices, draft pages, or duplicate sections that the recipient does not need. A __PAGES_LINK__ can help you build a shorter file from only the pages that matter.',
    'toolarge-p2' => 'If the original began as a Word document with large embedded images, re-export it with a __WORD_TO_PDF_LINK__ after reducing image sizes in Word. This often produces a smaller file than compressing an oversized export after the fact.',
    'toolarge-p3' => 'For files that are simply too large for any email system, send a shared link instead. Upload the document to cloud storage, share the link, and the recipient receives the full quality version. Links also make updates easier, since you can replace the file in one place.',

    // Tips for Keeping Files Small From the Start
    'tips-heading' => 'Tips for Keeping Files Small From the Start',
    'tips-p1' => 'Set image resolution before exporting. Word, PowerPoint, and design software all offer options to reduce image quality at export time. Doing this once prevents oversized files from being created in the first place.',
    'tips-p2' => 'Compress the final package rather than each part. If you are combining several documents, a __MERGE_LINK__ can join them first. Compressing the merged file once is more efficient than compressing each piece separately.',

    // Frequently Asked Questions
    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'Will compressing a PDF make the text blurry?',
    'faq1-a' => 'Usually not. Text in a PDF is stored as vector data, so compression mainly reduces the resolution of images. Blurry text typically appears only when a scanned page is compressed too aggressively.',
    'faq2-q' => 'Which compression level should I use for email?',
    'faq2-a' => 'Start with the medium level. It shrinks most business documents enough to attach and keeps images readable on screen. Move to a stronger level only if the file is still too large.',
    'faq3-q' => 'Can I compress a PDF more than once?',
    'faq3-a' => 'You can, but each pass removes a little more quality. Always compress from the original file rather than repeatedly compressing a previous version.',
    'faq4-q' => 'What is the typical email attachment limit?',
    'faq4-a' => 'Most providers allow attachments between about 20 and 25 megabytes, though limits vary. Check your provider\'s current limit before sending large files.',
    'faq5-q' => 'Is it safer to send a link than an attachment?',
    'faq5-a' => 'For sensitive documents, a link with restricted access is often a better choice than an attachment. It also avoids duplicate copies in recipients\' inboxes and lets you update the file without resending it.',

    // Link Texts for Localization
    'compress-tool-text' => 'PDF compression tool',
    'pages-tool-text' => 'pages to PDF tool',
    'word-to-pdf-tool-text' => 'Word to PDF converter',
    'merge-tool-text' => 'merge PDF tool',
];

