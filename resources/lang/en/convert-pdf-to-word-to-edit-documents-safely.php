<?php

return [
    'title' => 'Convert PDF to Word to Edit Documents Safely',
    'description' => 'Learn how to convert a PDF to editable Word format, fix common layout problems, and re-export a clean PDF. Practical steps for contracts, reports, and forms.',
    'main-heading' => 'Convert PDF to Word to Edit Documents Safely',

    'intro-p1' => 'A PDF is designed to stay fixed. That is what makes it reliable for contracts, reports, and forms. But sometimes you receive a PDF that needs a correction, a new date, or a revised paragraph. Retyping the entire document is slow, and copying text by hand often introduces errors. Converting the PDF to Word gives you an editable starting point that you can change and then export again.',
    'intro-p2' => 'The conversion is useful, but it is not perfect. Complex layouts, multi-column text, and scanned pages can produce results that need cleanup. This guide explains how the process works, how to handle common problems, and how to finish with a PDF you can trust.',

    'understanding-heading' => 'Understanding What Conversion Does',
    'understanding-p1' => 'A PDF stores each element at a fixed position on the page. It does not store the structure that a word processor uses, such as paragraphs, headings, and table cells. When you convert to Word, the software tries to rebuild that structure by analyzing the position of text and images.',
    'understanding-p2' => 'For digitally created PDFs with selectable text, the rebuilt result is usually good. For scanned documents, the software must first recognize the characters in an image, and the output quality depends on scan clarity. Knowing which type you have helps you set realistic expectations.',

    'steps-heading' => 'Step by Step: Convert and Edit',
    'steps-p1' => 'Open the __PDF_TO_WORD_LINK__ and upload the file. Wait for the conversion to finish, then download the .docx file. Save it with a new name so the original PDF remains untouched.',
    'steps-p2' => 'Open the Word file and scroll through it from start to finish. Compare each section with the original PDF, either side by side or in a second window. Check headings, numbers, dates, and signature blocks first, because these carry the most risk if they are wrong.',
    'steps-p3' => 'Make your edits in Word. Keep changes focused. If a paragraph needs only one word changed, change that word rather than rewriting the whole paragraph, since rewriting can introduce formatting differences.',

    'layout-heading' => 'Fixing Common Layout Problems',
    'layout-p1' => 'Text that appears in the wrong order often comes from multi-column layouts or text boxes. Cut the affected text and paste it into the correct location. If the problem is widespread, consider retyping that section, since repairing many small misplacements can take longer.',
    'layout-p2' => 'Tables sometimes lose their borders or merge unexpectedly. Rebuild the table in Word using the Insert Table option if the converted version is unusable. Copying the numbers from the original is safer than trusting the converted table.',
    'layout-p3' => 'Fonts may change to the nearest available substitute. Select the affected text and apply the original font if you have it. Otherwise, choose a standard font that matches the look of the document.',

    'scanned-heading' => 'Handling Scanned PDFs',
    'scanned-p1' => 'A scanned PDF is an image of a page. Conversion will attempt to read the text, but accuracy depends on scan quality. Blurry scans, skewed pages, and handwritten notes all reduce accuracy. Always proofread numbers and names carefully.',
    'scanned-p2' => 'If the scan is poor, ask the sender for a digital original. Many organizations have the source file, and a clean digital version saves time and avoids errors.',

    'reexport-heading' => 'Re-Exporting a Clean PDF',
    'reexport-p1' => 'After editing, export the Word document back to PDF for distribution. Use the __WORD_TO_PDF_LINK__ or the export option in Word. Check the new PDF carefully, because the page breaks may have moved compared to the original.',
    'reexport-p2' => 'If the document is part of a larger package, combine it with other files using a __MERGE_LINK__. Make sure you combine the final version, not an older draft.',

    'reviewing-heading' => 'Reviewing Long Documents Before Editing',
    'reviewing-p1' => 'Long contracts and reports can take hours to review line by line. If you need to understand what the document says before editing, use an __SUMMARIZE_LINK__ first. The summary identifies the sections that matter, so you know where to focus your attention. Always verify the summary against the source before making changes based on it.',

    'legal-heading' => 'Legal and Security Considerations',
    'legal-p1' => 'Editing a signed contract creates a new, unsigned document. The original signature does not carry over to the edited version. If the document is legally binding, any change should be reviewed and re-signed according to your organization\'s process.',
    'legal-p2' => 'Keep an audit trail. Save the original PDF, the converted Word file, and the final PDF with clear version numbers. This record helps if someone later asks what changed.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'Will the converted Word file look exactly like the PDF?',
    'faq1-a' => 'Usually it will be close, but not identical. Complex layouts, text boxes, and unusual fonts often need manual adjustment after conversion.',
    'faq2-q' => 'Can I convert a scanned PDF to Word?',
    'faq2-a' => 'Yes, but accuracy depends on scan quality. Proofread the output carefully, especially numbers, dates, and names.',
    'faq3-q' => 'Why did my tables break during conversion?',
    'faq3-a' => 'Tables in PDFs are often just lines and positioned text rather than true table structures. Rebuilding the table in Word is often the most reliable fix.',
    'faq4-q' => 'Is it safe to edit a signed PDF?',
    'faq4-a' => 'Editing a signed document invalidates the signature in most cases. Any changes should be reviewed and re-signed through your normal approval process.',
    'faq5-q' => 'Should I keep the original PDF after converting?',
    'faq5-a' => 'Yes. Always keep the original as a reference and as a record of what the document said before any changes.',
];
