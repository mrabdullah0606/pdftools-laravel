<?php

return [
    'title' => 'The Best Way to Send Large PDF Files by Email (Without Getting Bounced)',
    'description' => 'Learn the best ways to send large PDF files by email without them bouncing back. Discover compression, cloud links, splitting files, and resolving root causes.',
    'main-heading' => 'The Best Way to Send Large PDF Files by Email (Without Getting Bounced)',
    
    'intro-heading' => 'The Attachment Bounce Problem',
    'intro-p1' => 'You spend time preparing a document, attach it to an email, click Send, and receive an automated error message minutes later. The attachment was too large. The email bounced back undelivered. Now you need to figure out an alternative and contact the recipient to explain the delay.',
    'intro-p2' => 'This happens routinely with large PDFs, and it happens because email attachment limits have not kept up with the growing size of modern documents. High-resolution images, multiple pages, embedded fonts, and scanned content all contribute to PDF file sizes that regularly exceed what email systems allow.',
    'intro-p3' => 'The solutions range from simple (compressing the file in two minutes) to slightly more involved (using cloud storage links). Knowing which solution fits which situation saves time and prevents the bounce problem from happening repeatedly.',
    
    'limits-heading' => 'Email Attachment Size Limits in 2026',
    'limits-p1' => 'Gmail allows attachments up to 25 MB per message for personal accounts and most Google Workspace accounts. Microsoft Outlook and Microsoft 365 typically allow 20 to 25 MB, though some organisations set lower limits through IT policy. Yahoo Mail allows 25 MB. Apple Mail supports 20 MB for direct attachments, with larger files handled through Mail Drop.',
    'limits-p2' => 'Corporate email systems deserve special attention. Organisations in healthcare, legal, financial services, and government frequently enforce attachment limits as low as 5 to 10 MB for security and storage management reasons. When sending to a professional in these industries, assume the limit may be 10 MB and compress your file accordingly.',
    
    'solution1-heading' => 'Solution 1: Compress the PDF Before Attaching',
    'solution1-p1' => 'For most oversized PDFs, compression is the right starting point. Image-heavy PDFs typically compress by 60 to 75 percent at medium quality settings, bringing a 30 MB file down to 7 to 12 MB without any visible quality change on screen.',
    'solution1-p2' => 'The process using PDFTools is straightforward. Go to __LINK__, upload your file, wait for the compression to complete (usually under 30 seconds), and download the compressed version. The original on your device is unchanged. The whole process takes under two minutes.',
    'solution1-p3' => 'If the file is still above 10 MB after medium compression, try maximum compression and assess whether the quality reduction is acceptable for the document\'s purpose. For screen-only documents, maximum compression is usually fine. For documents that will be printed, keep compression moderate.',
    
    'solution2-heading' => 'Solution 2: Share via Cloud Storage Link',
    'solution2-p1' => 'For files that are genuinely too large to compress sufficiently, or for cases where quality cannot be compromised, sharing via a cloud storage link bypasses attachment limits entirely.',
    'solution2-p2' => 'With Google Drive, upload the file, click the Share button, set the permission to Anyone with the link can view, and copy the link. Paste it into your email body with a brief note explaining the link. Recipients can click to view in their browser or download, and they do not need a Google account.',
    'solution2-p3' => 'Dropbox works similarly. Upload, click Share, create a link, and copy it. Links expire on a configurable schedule or you can set them to permanent.',
    'solution2-p4' => 'WeTransfer is worth knowing for recipients who may not use cloud storage. The free tier allows files up to 2 GB, generates a download link valid for seven days, and requires no account from either the sender or the recipient. The link is sent automatically to the recipient\'s email by WeTransfer.',
    
    'solution3-heading' => 'Solution 3: Split the PDF into Smaller Parts',
    'solution3-p1' => 'If the document is naturally divisible into logical sections, splitting it into smaller files solves the attachment size problem while preserving full quality. Each section is a separate attachment, each within the size limit.',
    'solution3-p2' => 'Use the PDF splitter at __LINK__ to extract specific page ranges. Label each file clearly, such as Report_Section1.pdf and Report_Section2.pdf, and send them together in a single email. Including a brief note explaining the structure helps the recipient navigate the sections.',
    'solution3-p3' => 'This approach is well suited for large reports, multi-chapter documents, and anything that recipients will read section by section rather than all at once.',
    
    'solution4-heading' => 'Solution 4: Reduce Image Resolution Before Creating the PDF',
    'solution4-p1' => 'If you regularly create PDFs that are too large, addressing the root cause is more efficient than compressing after the fact. Most oversized PDFs contain images that were inserted at far higher resolution than necessary for the intended use.',
    'solution4-p2' => 'For screen-distributed documents, images only need to be 96 to 150 DPI. Insert images at this resolution rather than at the full 300 DPI camera or scanner output. For scanned documents, set your scanner to 150 DPI for digital distribution rather than 300 DPI. For documents that will also be printed, 200 to 250 DPI provides a good balance between print quality and file size.',
    
    'choice-heading' => 'Choosing the Right Solution for Your Situation',
    'choice-p1' => 'For most situations, compression solves the problem and should be the first thing you try. It takes two minutes, preserves the attachment workflow your recipient expects, and produces a file that opens and reads like the original.',
    'choice-p2' => 'Use a cloud link when the file cannot be compressed sufficiently without unacceptable quality loss, when the recipient has indicated a particularly low attachment limit, or when you want to ensure the recipient always has access to the latest version of a document without re-sending.',
    'choice-p3' => 'Use splitting when the document has natural divisions and different parts are relevant to different recipients, or when you want to keep the attachment workflow but need to distribute a very large document.',
    
    'conclusion-heading' => 'Conclusion',
    'conclusion-p1' => 'Email attachment bounces caused by oversized PDFs are a solved problem. Compression handles most cases in under two minutes and produces a file that looks identical to the original on screen. Cloud storage links handle everything else without any size restriction.',
    'conclusion-p2' => 'The habit to develop is checking file size before attaching and compressing anything above 10 MB as a default. With the free compress PDF tool at PDFTools, this adds under two minutes to the process and eliminates the much more time-consuming problem of handling bounced emails and resending. See also the guide on __LINK__ for more ways to reduce document handling time.',
    
    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'What is the safest attachment size to avoid bounces with any email provider?',
    'faq1-a' => 'For a message that will deliver reliably to any email provider, keep attachments under 10 MB. This is below the limit of every major provider and below the threshold set by most corporate IT policies. Compressing a PDF to under 10 MB takes under two minutes and eliminates bounce risk.',
    'faq2-q' => 'Will recipients need to log in to access a Google Drive or Dropbox link?',
    'faq2-a' => 'Not if the sharing settings are set correctly. Both Google Drive and Dropbox offer Anyone with the link access options that allow anyone to view or download without signing in. Always test the link in a private browser window before sending to confirm it is accessible without a login.',
    'faq3-q' => 'Is sending a cloud link instead of an attachment less professional?',
    'faq3-a' => 'No. Cloud links are the standard approach for large files in professional settings. Most business recipients prefer them to large attachments because they do not consume email storage. The only context where an attachment may be specifically required is legal correspondence where attachment delivery confirmation is part of the formal record.',
    'faq4-q' => 'What is the fastest way to check a PDF size before emailing?',
    'faq4-a' => 'Right-click the file in Windows Explorer or Mac Finder and select Properties or Get Info. The file size appears in the dialog. If it is above 10 MB, run it through the compression tool before attaching.',
];
