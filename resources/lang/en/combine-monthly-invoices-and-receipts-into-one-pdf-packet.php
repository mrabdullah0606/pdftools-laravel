<?php

return [
    'title' => 'Combine Monthly Invoices and Receipts Into One PDF Packet',
    'description' => 'Learn how to combine monthly invoices, receipts, and expense records into a single organized PDF packet. Covers naming, compression, and accounting workflows.',
    'main-heading' => 'Combine Monthly Invoices and Receipts Into One PDF Packet',

    'intro-p1' => 'Month-end is a predictable source of stress for many small businesses and freelancers. Invoices arrive as Word files, receipts come as phone photos, and bank statements are downloaded as PDFs. Accountants and bookkeepers then ask for everything in one place. Sending twenty separate attachments is untidy, and important documents often get lost in the process. A single organized PDF packet solves this problem.',
    'intro-p2' => 'This guide explains how to gather, convert, order, and combine monthly records into one file that is easy to review and archive. The same method works for expense reports, client billing, and tax preparation.',

    'gather-heading' => 'Gather Everything in One Folder',
    'gather-p1' => 'Start by creating a folder for the month, such as 2026-06 Records. Move every invoice, receipt, and statement into it. Include documents from email attachments, downloads, and phone photos. A complete folder prevents last-minute searching and reduces the risk of missing an expense.',
    'gather-p2' => 'Check that nothing is duplicated. Duplicate invoices can distort totals, and a packet with repeated pages wastes the reviewer\'s time. Sort by date and by vendor to spot duplicates quickly.',

    'convert-heading' => 'Convert Files to PDF',
    'convert-p1' => 'Most records will already be PDFs, but some will not. Invoices created in Word can be exported with the __WORD_TO_PDF_LINK__. Make sure the export shows the full invoice, including totals, tax lines, and payment instructions.',
    'convert-p2' => 'Receipts saved as photos should be converted with a __JPG_TO_PDF_LINK__. Combine the receipts for each vendor or each day into a single file, rather than converting every photo separately, since this keeps the packet organized and reduces page count.',
    'convert-p3' => 'Name each converted file in a consistent way, such as 2026-06-03_office-supplies_receipt.pdf. Date-first naming sorts files chronologically, and the category in the name helps reviewers find items quickly.',

    'order-heading' => 'Order the Packet Logically',
    'order-p1' => 'A useful packet follows a clear order. Many bookkeepers prefer this structure: a cover sheet with the month and total amounts, then the bank statement, then invoices grouped by type, then receipts in date order. Some prefer invoices first, then receipts. Ask the person who will review the packet which order they use.',
    'order-p2' => 'Create a simple cover page listing the contents. A short summary with the number of invoices, receipts, and total amounts helps the reviewer confirm that nothing is missing.',
    'order-p3' => 'Once the order is decided, rename the files with numbers, such as 01_cover.pdf, 02_statement.pdf, and 03_invoice_acme.pdf. Numbered names ensure that the merge tool arranges them correctly.',

    'merge-heading' => 'Merge the Packet',
    'merge-p1' => 'Open the __MERGE_LINK__ on PDFTools. Upload the files in the order you set. Check the sequence in the preview, then start the merge and download the combined document.',
    'merge-p2' => 'Name the final file clearly, such as June_2026_Financial_Packet.pdf. Store the individual files as well, since they are useful if a single document needs to be replaced or re-sent.',

    'compress-heading' => 'Compress the Final File',
    'compress-p1' => 'Scanned receipts and phone photos can make a packet large. A file of fifty megabytes or more may be impossible to email. Run the final packet through a __COMPRESS_LINK__ using the medium setting, then check that receipt amounts and dates remain readable.',
    'compress-p2' => 'Compress the merged file rather than each receipt separately. One compression pass on the packet is usually more efficient and less likely to reduce quality in a way that makes totals hard to read.',

    'quality-heading' => 'Quality Checks Before Sending',
    'quality-p1' => 'Before sending the packet, open the file and scroll through every page. Confirm that each receipt is legible, that no page is blank, and that the cover sheet totals match the documents. A quick comparison of the summary against the bank statement can catch errors early.',
    'quality-p2' => 'Check the file name and the document properties. Make sure the packet is clearly labeled with the company name, the month, and the year.',

    'archiving-heading' => 'Archiving and Retention',
    'archiving-p1' => 'Keep the packet and the source files for the period your accounting rules require. Many businesses keep financial records for several years. Store them in a secure location with a consistent folder structure, such as one folder per year and one subfolder per month.',
    'archiving-p2' => 'Backing up the archive is important. A single lost hard drive should not erase years of records. Use a secondary copy in cloud storage or an external drive.',

    'mistakes-heading' => 'Common Mistakes',
    'mistakes-p1' => 'Waiting until the end of the quarter to gather records makes the work much harder. Collecting documents weekly keeps the process manageable and reduces the chance of missing receipts.',
    'mistakes-p2' => 'Mixing personal and business receipts creates problems for tax preparation. Keep separate folders or use distinct naming conventions for each category.',
    'mistakes-p3' => 'Forgetting to check that the merged file opens correctly is another frequent error. Open the final packet on a second device before sending it to the accountant.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'Should I combine invoices and receipts into one PDF or keep them separate?',
    'faq1-a' => 'Combining them into one packet is convenient for review, but keep the individual files as well. Separate files are easier to replace or re-send if needed.',
    'faq2-q' => 'How do I organize a packet with many receipts?',
    'faq2-a' => 'Group receipts by vendor or category, then order them by date within each group. A cover sheet listing the contents helps the reviewer find items quickly.',
    'faq3-q' => 'Can I combine files that are in different formats?',
    'faq3-a' => 'Yes, but convert all files to PDF first. Once everything is in PDF form, the merge is straightforward.',
    'faq4-q' => 'What if a receipt is too faint to read?',
    'faq4-a' => 'Retake the photo with better lighting, or request a digital copy from the vendor. Faint receipts can cause problems during audits, so resolve them early.',
    'faq5-q' => 'How long should I keep these records?',
    'faq5-a' => 'The retention period depends on your country and business type. Check with your accountant or local tax authority for the rules that apply to you.',
];
