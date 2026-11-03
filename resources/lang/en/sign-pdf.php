<?php

return [
    'title' => 'How to Sign a PDF Digitally Without Printing It Guide',
    'description' => 'Learn how to sign a PDF digitally without printing it. Follow simple steps to add secure e-signatures fast. Read the guide today!',
    'main-heading' => 'How to Sign a PDF Digitally Without Printing It: A Step-by-Step Guide',

    // The Print-Sign-Scan Cycle Is Unnecessary
    'intro-heading' => 'The Print-Sign-Scan Cycle Is Unnecessary',
    'intro-para1' => 'A remarkable amount of office time is spent on a completely unnecessary process. Someone sends a PDF that needs a signature. The recipient prints it, signs it with a pen, scans it back into a digital file, and emails the resulting scan. The whole cycle takes 5 to 10 minutes, requires a printer and a scanner, and produces a lower quality document than what was originally sent.',
    'intro-para2' => 'Digital PDF signing has made this process redundant for most document types. In most countries, electronic signatures carry the same legal weight as handwritten ones. The tools needed are free, fast, and available on every major device. This guide covers the most reliable methods for every platform so you can eliminate the print-sign-scan workflow permanently.',

    // Electronic Signature vs Digital Signature
    'esig-vs-dsig-heading' => 'Electronic Signature vs Digital Signature: Understanding the Difference',
    'esig-vs-dsig-intro' => 'These two terms are used interchangeably in everyday conversation, but they are technically different, and the difference matters for high-stakes documents.',
    'esig-para' => 'An electronic signature is any digital mark that indicates intent to sign. This includes typing your name, clicking an I Agree button, drawing your signature with a mouse, or placing a scanned image of your handwritten signature onto a document. Electronic signatures are legally valid in most jurisdictions for most commercial document types under legislation such as the US ESIGN Act, the EU eIDAS Regulation, and similar laws in the UK and Commonwealth countries.',
    'dsig-para' => 'A digital signature is a specific type of electronic signature that uses cryptography to link the signature to both the signer\'s identity and the document content. If anyone modifies the document after signing, the digital signature becomes mathematically invalid and readers are notified immediately. Digital signatures require a certificate issued by a trusted Certificate Authority and are typically used for high-value contracts, regulated documents, and government submissions.',
    'esig-vs-dsig-note' => 'For everyday business documents such as employment agreements, service contracts, and NDAs, an electronic signature is legally sufficient. For notarised documents, court filings, and regulated financial instruments, consult a legal professional about what is required in your jurisdiction.',

    // Method 1: Adobe Acrobat Reader
    'method1-heading' => 'Method 1: Adobe Acrobat Reader (Free, All Platforms)',
    'method1-intro' => 'Adobe Acrobat Reader, the free version, includes a basic signing feature called Fill and Sign that works on Windows, Mac, iOS, and Android.',
    'method1-step1' => 'Open your PDF in Adobe Acrobat Reader.',
    'method1-step2' => 'Click Tools in the menu bar and select Fill and Sign.',
    'method1-step3' => 'Click the Sign button in the toolbar that appears.',
    'method1-step4' => 'Choose whether to type your name, draw your signature with a mouse or touchscreen, or upload an image of your handwritten signature.',
    'method1-step5' => 'Click where you want to place the signature on the document.',
    'method1-step6' => 'Go to File and Save As to save the signed version.',
    'method1-note' => 'This creates an electronic signature embedded in the PDF. The document will open normally for any recipient without requiring them to have a specific app. The signature is visible and permanent, though it does not carry cryptographic verification.',

    // Method 2: DocuSign
    'method2-heading' => 'Method 2: DocuSign (Industry Standard for Business)',
    'method2-intro' => 'DocuSign is the most widely accepted e-signature service in business settings, particularly in the US, UK, and EU. Its free personal plan allows three signature requests per month, which is sufficient for occasional use.',
    'method2-step1' => 'Create a free account at docusign.com.',
    'method2-step2' => 'Upload your PDF from your device, Google Drive, or Dropbox.',
    'method2-step3' => 'Add signature fields to the document by dragging them to the correct locations.',
    'method2-step4' => 'If others need to sign, add their email addresses as recipients.',
    'method2-step5' => 'Complete the signing process by clicking your signature field, choosing your signature style, and applying it.',
    'method2-step6' => 'Download the signed document. It includes a completion certificate with an audit trail showing who signed, when, and from what IP address.',
    'method2-note' => 'The audit trail is particularly valuable for legally sensitive documents. If a signature is ever disputed, the DocuSign Certificate of Completion provides timestamped evidence of who signed the document and when.',

    // Method 3: iPhone and iPad
    'method3-heading' => 'Method 3: iPhone and iPad (Built-In, No App Needed)',
    'method3-intro' => 'iOS and iPadOS have native PDF signing built into the Files app and the Mail app, with no third-party tools required.',
    'method3-step1' => 'Open the PDF in the Files app, or tap and hold an attachment in Mail and choose Markup.',
    'method3-step2' => 'Tap the pencil icon to open the Markup toolbar.',
    'method3-step3' => 'Tap the plus button at the bottom right and choose Signature.',
    'method3-step4' => 'Draw your signature with your finger or Apple Pencil. You can save it for future use.',
    'method3-step5' => 'Drag the signature to the correct position and resize it as needed.',
    'method3-step6' => 'Tap Done to save the signed PDF.',
    'method3-note' => 'This method processes everything on your device. Nothing is uploaded to any server, which makes it well suited for confidential documents that you do not want to send to a cloud service.',

    // Method 4: Android Devices
    'method4-heading' => 'Method 4: Android Devices',
    'method4-para1' => 'Android does not have a universal built-in PDF signing tool, but Adobe Acrobat Reader for Android is free and provides the same Fill and Sign feature described in Method 1. The Adobe Fill and Sign app is also available separately and is optimised specifically for mobile form completion.',
    'method4-para2' => 'For Samsung device users, Samsung Notes and Samsung Internet both include annotation tools that can be used to place a signature on a PDF page, though the workflow is less streamlined than Acrobat Reader.',

    // Method 5: Mac Using Preview
    'method5-heading' => 'Method 5: Mac Using Preview (Completely Free, No Upload)',
    'method5-intro' => 'macOS Preview has a signature feature that is one of the most convenient free signing options available on any platform.',
    'method5-step1' => 'Open the PDF in Preview.',
    'method5-step2' => 'Click the Markup Toolbar button (the pencil icon in the top right).',
    'method5-step3' => 'Click the Signature button in the markup toolbar.',
    'method5-step4' => 'You can create a signature using your Mac\'s camera by holding a signed piece of paper to the camera, or by drawing on the trackpad.',
    'method5-step5' => 'Once created, click the saved signature to insert it into the document.',
    'method5-step6' => 'Drag it to the correct position and save the file.',
    'method5-note' => 'Preview stores your signature for reuse, which makes subsequent signings even faster. Like the iOS method, everything stays on your device.',

    // Which Documents Cannot Be Signed Digitally
    'cannot-sign-heading' => 'Which Documents Cannot Be Signed Digitally',
    'cannot-sign-para1' => 'Electronic signatures are not valid for all document types. The following categories typically require witnessed handwritten signatures, notarisation, or specific formal procedures: wills and testaments, adoption papers, certain property transfer documents in some jurisdictions, court orders, and negotiable instruments like cheques and promissory notes.',
    'cannot-sign-para2' => 'If you are unsure whether an electronic signature is legally valid for a specific document in your jurisdiction, get legal advice before relying on it. This is particularly important for international contracts where multiple countries\' laws may apply simultaneously.',

    // Conclusion
    'conclusion-heading' => 'Conclusion',
    'conclusion-para1' => 'Digital PDF signing is mature, legal, and available for free on every major device. For everyday business documents, Adobe Acrobat Reader\'s Fill and Sign feature or your device\'s built-in tools handle the job in under two minutes. For high-value contracts or documents that need an audit trail, DocuSign and Adobe Sign provide the additional security and documentation that those situations require.',
    'conclusion-para2' => 'If you need to prepare a PDF for signing by adding form fields, see the guide on how to make a PDF fillable. For ',
    'a'=>'<a href="' . localized_route('compress-pdf') . '">compressing a signed PDF</a>',
    'b' =>'before sending, use the free compression tool at PDFTools.',

    // FAQs
    'faqs-heading' => 'Frequently Asked Questions',

    'faq1-question' => 'Are digital signatures legally binding?',
    'faq1-answer' => 'In most countries, yes. The EU eIDAS Regulation, the US ESIGN Act and UETA, the UK Electronic Communications Act, and equivalent legislation in most jurisdictions give electronic signatures legal validity for most commercial agreements. The key requirement is evidence of intent to sign, which all the methods described above satisfy.',

    'faq2-question' => 'What happens if the document is modified after signing?',
    'faq2-answer' => 'With a simple electronic signature placed as an image, the document can be modified without detection. With a cryptographic digital signature from a service like DocuSign or Adobe Sign, any modification invalidates the signature immediately and PDF readers display a warning. For documents where integrity is critical, use a service that provides cryptographic signing.',

    'faq3-question' => 'Can I sign a password-protected PDF?',
    'faq3-answer' => 'Generally no, not without entering the correct password first. Once you unlock the document with its password, you can proceed with signing. Some protected PDFs have permissions that restrict signing even after the password is entered, in which case you need the document creator to provide an unlocked version.',

    'faq4-question' => 'How do I request that someone else sign a PDF?',
    'faq4-answer' => 'Services like DocuSign, Adobe Sign, and Dropbox Sign allow you to upload a PDF, specify where each person needs to sign, and send signing requests by email. Each recipient clicks a link, signs electronically, and all parties receive the completed document automatically when everyone has signed.',
];