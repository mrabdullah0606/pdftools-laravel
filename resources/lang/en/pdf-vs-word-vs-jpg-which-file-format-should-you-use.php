<?php

return [
    'title' => 'PDF vs Word vs JPG: Which File Format Should You Use?',
    'description' => 'Compare PDF, Word, and JPG formats to choose the right file for sharing, editing, and printing. Practical guidance on when to convert and when to keep the original format.',
    'main-heading' => 'PDF vs Word vs JPG: Which File Format Should You Use?',

    'intro-p1' => 'Every document has a best format, but the right choice depends on what you need to do with the file. A Word document is best for writing and editing. A PDF is best for sharing and printing a fixed layout. A JPG is best for displaying a page as a picture. Choosing the wrong format creates problems that are often avoidable, such as a contract that recipients accidentally edit, or a report that cannot be searched because it was saved as an image.',
    'intro-p2' => 'This guide compares the three formats, explains when each one fits, and shows how to convert between them when your needs change.',

    'understanding-heading' => 'Understanding Each Format',
    'understanding-p1' => 'A Word file, typically with the .docx extension, stores text, formatting, and structure in a form that can be edited. Paragraphs, headings, tables, and styles all remain adjustable. The drawback is that the appearance depends partly on the software and fonts available on the viewer\'s device.',
    'understanding-p2' => 'A PDF stores the layout as a fixed page. Fonts are embedded, and every element is placed exactly. PDFs are reliable for sharing and printing, and they can still contain searchable text. Editing a PDF is possible but usually less convenient than editing a Word file.',
    'understanding-p3' => 'A JPG stores a page as a single picture. It is easy to display anywhere, and it works well for social posts, websites, and image galleries. Because it is a picture, the text inside cannot be selected or searched, and quality can decline if the image is compressed too heavily.',

    'word-heading' => 'When to Use Word',
    'word-p1' => 'Choose Word when the document will change. Drafts, proposals still under negotiation, templates, and any file that multiple people will edit should remain in Word. Word also preserves the structure that makes long documents easier to navigate, such as heading styles and automatic tables of contents.',
    'word-p2' => 'Keep the Word file as the master copy even after you produce a PDF for distribution. The editable source is what you will return to when revisions are needed.',

    'pdf-heading' => 'When to Use PDF',
    'pdf-p1' => 'Choose PDF when the layout must stay fixed. Contracts, invoices, resumes, forms, and published reports are typical examples. PDFs look the same on every device and print predictably. They also discourage casual editing, which matters for documents that should not change once issued.',
    'pdf-p2' => 'Use PDF when you need searchable text. A properly created PDF allows readers to search for names, dates, and terms, which is valuable for reference documents. Scanned PDFs, however, are images, so their text is not searchable unless the scan has been processed with text recognition.',

    'jpg-heading' => 'When to Use JPG',
    'jpg-p1' => 'Choose JPG when the page is primarily a visual item. An infographic, a chart, a poster, or a single page for a social post works well as an image. JPG files are also simple to insert into presentations, websites, and messaging apps.',
    'jpg-p2' => 'Avoid JPG for text-heavy documents that need to be searched, quoted, or printed at high quality. Each conversion can reduce sharpness, and the text cannot be selected.',

    'converting-heading' => 'Converting Between Formats',
    'converting-p1' => 'Sometimes you must change formats. A client may send a PDF and ask for a Word version, or you may need to turn a finished Word document into a fixed PDF before distribution.',
    'converting-p2' => 'To convert a PDF into an editable file, use a __PDF_TO_WORD_LINK__. Review the output carefully, since layouts with columns, text boxes, or complex tables often need manual adjustment.',
    'converting-p3' => 'To turn a finished Word document into a fixed file, use a __WORD_TO_PDF_LINK__. Check that fonts, images, and page breaks appear as expected before sending the file.',
    'converting-p4' => 'To convert a PDF page into an image, use a __PDF_TO_JPG_LINK__. To go the other way, a __JPG_TO_PDF_LINK__ combines images into a fixed document, which is useful for turning a set of scanned pages into a single file.',

    'decision-heading' => 'A Practical Decision Guide',
    'decision-p1' => 'Ask three questions before choosing a format. Will the recipient need to edit this file? Does the layout need to stay exactly the same? Is the content mostly a picture rather than text?',
    'decision-p2' => 'If the answer to the first question is yes, use Word. If the answer to the second is yes, use PDF. If the answer to the third is yes, use JPG. Many documents need more than one format, and that is normal. A common approach is to keep the Word file for editing, share a PDF for review, and provide JPG images for social or web use.',

    'mistakes-heading' => 'Mistakes to Avoid',
    'mistakes-p1' => 'Sending an editable Word file when you meant to send a final version is a common error. Recipients may edit the text, and you lose control over what the final document says. Convert to PDF before distribution when the content is final.',
    'mistakes-p2' => 'Converting a document to JPG when it needs to be searched is another mistake. Once the text is an image, it cannot be found with a search function.',
    'mistakes-p3' => 'Assuming that a PDF will never change is also risky. PDFs can be edited with the right tools, so critical documents should be protected through permissions or distributed through controlled channels.',

    'maintaining-heading' => 'Maintaining Consistent Formats',
    'maintaining-p1' => 'Create a simple standard for your team. For example, drafts stay in Word, final versions go out as PDF, and visual assets are shared as JPG. A clear rule reduces confusion, especially when several people work on the same project.',
    'maintaining-p2' => 'Store the master files in a predictable folder structure with version numbers in the file names. This makes it easier to find the right format later, whether you need the editable source or the final fixed version.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'Which format is best for sharing a document with clients?',
    'faq1-a' => 'PDF is usually best because it keeps the layout consistent and discourages unintended edits. Share a Word version only when the client needs to revise the text.',
    'faq2-q' => 'Can I convert a JPG back into Word?',
    'faq2-a' => 'Not directly in a useful way. A JPG is a picture, so you would need text recognition first, and the result may need significant cleanup. Keep the original Word file whenever possible.',
    'faq3-q' => 'Does converting a Word file to PDF lose any information?',
    'faq3-a' => 'Usually not, but some features such as certain interactive elements or comments may not carry over. Check the PDF carefully before sending.',
    'faq4-q' => 'Is PDF always better than Word for final documents?',
    'faq4-a' => 'For final documents that should not change, yes. For documents that will continue to evolve, keep the Word version as the working file.',
    'faq5-q' => 'Which format uses the least storage?',
    'faq5-a' => 'It depends on content. A JPG may be small for a simple page, while a PDF with embedded fonts and images can be larger. Compressing the file in whichever format you use is often the most effective way to reduce size.',
];
