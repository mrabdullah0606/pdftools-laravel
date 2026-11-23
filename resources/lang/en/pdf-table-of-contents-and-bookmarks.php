<?php

return [
    'title' => 'PDF Table of Contents and Bookmarks: Complete Guide',
    'description' => 'Learn how to build a clickable table of contents and bookmarks in PDF reports. Improve navigation for long documents, manuals, and proposals with simple steps.',
    'main-heading' => 'How to Build a Clickable PDF Table of Contents and Bookmarks',

    'intro-p1' => 'A long PDF without navigation is frustrating. Readers scroll through hundreds of pages looking for one section, and many give up before finding it. A clickable table of contents and a set of bookmarks solve this problem. Readers jump directly to the chapter they need, and the document feels organized even when it is very long.',
    'intro-p2' => 'This guide explains how bookmarks work, how to build a table of contents that stays accurate, and how to handle documents assembled from several source files.',

    'what-heading' => 'What Bookmarks Do in a PDF',
    'what-p1' => 'Bookmarks are a navigation panel that appears in most PDF readers. Each bookmark points to a specific page, and clicking it takes the reader there. Bookmarks can be nested, so a chapter can contain several sections, and each section can have its own entries.',
    'what-p2' => 'A table of contents on the first pages is also useful, especially for printed documents. Clickable entries in the table of contents link to the same destinations as the bookmarks, which serves readers who prefer to browse on screen.',

    'plan-heading' => 'Plan the Structure Before You Build',
    'plan-p1' => 'Before adding navigation, decide how the document is organized. A typical report might have an executive summary, several chapters, and appendices. Write the list of headings in order, and check that each one appears only once. Consistent heading names make bookmarks easier to read.',
    'plan-p2' => 'Keep the depth shallow when possible. Two levels, such as chapters and major sections, are usually enough. Deeply nested bookmarks can overwhelm readers who only need the top-level structure.',

    'assemble-heading' => 'Assemble the Document in the Right Order',
    'assemble-p1' => 'Many long documents are created from separate files. A project might include a cover letter, a main report, a financial appendix, and a set of maps. Convert each source to PDF, then arrange them in the final order. A __MERGE_LINK__ joins the files so the page sequence is continuous.',
    'assemble-p2' => 'Check the page numbers after merging. Each section should start on the expected page, and no page should be duplicated. Fixing the order before adding bookmarks prevents you from rebuilding the navigation later.',

    'adding-heading' => 'Adding Bookmarks and a Clickable Table of Contents',
    'adding-p1' => 'Most PDF editors can create bookmarks automatically from the headings in a Word document. If your source file uses heading styles, export it with the bookmark option enabled. Check that every chapter and major section appears in the navigation panel.',
    'adding-p2' => 'For a clickable table of contents, create the list in your word processor with page numbers, export it to PDF, and then insert links to each heading. Many editors let you create links by selecting the entry and choosing the target page. Test every link, because a single incorrect target confuses readers.',

    'separate-heading' => 'Creating Separate Documents From One Report',
    'separate-p1' => 'Sometimes a report needs to be split into sections, such as one file for each chapter. Extracting pages is useful for distribution, but keep the original full version with its navigation intact. A __PAGES_TO_PDF_LINK__ can build a new file from selected pages, which helps when you need to send only part of a document.',
    'separate-p2' => 'Name each extracted section with its chapter number and title, such as chapter_03_market_analysis.pdf. This makes the set easy to navigate even outside the main report.',

    'editing-heading' => 'Editing Source Documents Later',
    'editing-p1' => 'If the original document is a Word file, the most reliable approach is to update that file and export the PDF again. Editing a PDF directly to change headings or page numbers is time consuming. When the source is no longer available, a __PDF_TO_WORD_LINK__ can create an editable copy, though you will need to rebuild the bookmarks and links after making changes.',

    'reducing-heading' => 'Reducing Size Without Losing Navigation',
    'reducing-p1' => 'Large reports with many images can become heavy. Compression usually preserves bookmarks and links, but it is wise to test after compressing. Open the file, click several entries in the table of contents, and confirm that the bookmark panel still lists every section. A __COMPRESS_LINK__ with the medium setting usually keeps navigation intact while reducing file size.',

    'accessibility-heading' => 'Accessibility and Navigation',
    'accessibility-p1' => 'Bookmarks also help readers who use screen readers. A logical structure lets assistive technology jump between sections, which improves usability for everyone. Use clear, descriptive headings, avoid generic labels such as Section 1 without a title, and keep the hierarchy consistent.',

    'mistakes-heading' => 'Common Mistakes',
    'mistakes-p1' => 'Bookmarks that point to the wrong page are the most common error. This happens when a page is inserted after the bookmarks were created. Always add navigation after the final page order is set.',
    'mistakes-p2' => 'Using inconsistent heading names creates confusing navigation. Choose one style, such as Title Case for every heading, and apply it throughout.',
    'mistakes-p3' => 'Forgetting to test the table of contents on a second device is another problem. Some readers handle links differently, so test on at least two viewers.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'What is the difference between bookmarks and a table of contents in a PDF?',
    'faq1-a' => 'Bookmarks appear in a separate navigation panel in the reader. A table of contents is a page within the document. Many professional files include both for the best experience.',
    'faq2-q' => 'Can bookmarks be added automatically?',
    'faq2-a' => 'Yes. If the source file uses heading styles, most export tools can generate bookmarks automatically. Check the result and fix any missing or misnamed entries.',
    'faq3-q' => 'Why do my bookmarks disappear after compressing the file?',
    'faq3-a' => 'Some compression settings remove navigation data. Test the file after compression and choose a setting that preserves bookmarks if they are important.',
    'faq4-q' => 'How many levels of bookmarks should a report use?',
    'faq4-a' => 'Two or three levels are usually enough. Deeper nesting can make the panel hard to use, especially for shorter documents.',
    'faq5-q' => 'Can I add a table of contents to a PDF that already exists?',
    'faq5-a' => 'Yes, but it is easier to create the table of contents in the source file and export again. Editing an existing PDF is possible but time consuming.',
];
