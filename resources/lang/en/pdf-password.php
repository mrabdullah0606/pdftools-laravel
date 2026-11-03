<?php

return [
    'title' => 'How to Password Protect a PDF on Any Device (2026)',
    'description' => 'Learn how to password protect a PDF for free on Windows, Mac, iPhone, and Android. Follow simple steps to secure your files. Read now!',
    'main-heading' => 'How to Password Protect a PDF: Free Methods for Windows, Mac, and Mobile',

    // Why Password Protection Matters
    'intro-heading' => 'Why Password Protection Matters for Everyday Documents',
    'intro-para1' => 'Most people treat PDF password protection as something only companies or governments need. In practice, it is relevant to anyone who emails documents containing personal information. A payslip sent to an employee, a medical referral forwarded between offices, a legal agreement shared with multiple parties, or a personal tax return submitted through an email system are all documents that would cause real problems if they were read by someone unintended.',
    'intro-para2' => 'PDF password protection is free, takes under a minute to apply, and works across all major platforms and PDF readers. This guide covers the best free method for each platform so you can apply protection with whatever tools you already have.',

    // Two Types of PDF Passwords
    'types-heading' => 'Two Types of PDF Passwords and What Each Does',
    'types-intro' => 'PDF supports two distinct password types that serve different purposes, and understanding the difference helps you choose the right one.',
    'types-opening' => 'An opening password, sometimes called a user password or document-open password, prevents anyone from opening the file at all without knowing the password. The document is fully encrypted and appears as unreadable binary data to anyone who does not have the key. This is what most people mean when they talk about password protecting a PDF.',
    'types-permissions' => 'A permissions password, sometimes called an owner password or master password, allows the document to be opened and read without a password, but restricts what the reader can do with it. With a permissions password, you can prevent the document from being printed, prevent text from being copied, prevent annotation, or prevent editing. The recipient sees the content but cannot do certain things with it.',
    'types-note' => 'For protecting confidential content from unauthorised access, you want an opening password. For distributing reference documents that should be read but not copied or modified, a permissions password is more appropriate.',

    // Method 1: Preview on Mac
    'method1-heading' => 'Method 1: Preview on Mac (Free, No Software Required)',
    'method1-intro' => 'Mac users have the most convenient free option built directly into the operating system. Preview can add password protection during PDF export without any third-party tools.',
    'method1-step1' => 'Open the PDF in Preview.',
    'method1-step2' => 'Go to File in the menu bar and choose Export as PDF.',
    'method1-step3' => 'In the export dialog, check the box labelled Encrypt at the bottom of the panel.',
    'method1-step4' => 'Enter a password in the Password field and re-enter it in the Verify field.',
    'method1-step5' => 'Click Save.',
    'method1-note' => 'The resulting PDF requires the password to open in any PDF reader on any device. Preview uses AES-128 encryption by default, which is secure for all practical purposes and compatible with any modern PDF reader.',

    // Method 2: LibreOffice
    'method2-heading' => 'Method 2: LibreOffice (Free, Windows, Mac, and Linux)',
    'method2-intro' => 'LibreOffice is a free, open-source office suite that provides comprehensive PDF export options including password protection. It is available for all major desktop platforms and produces professionally encrypted PDFs.',
    'method2-step1' => 'Open your document in LibreOffice. This works with Writer for text documents, Calc for spreadsheets, and Impress for presentations.',
    'method2-step2' => 'Go to File and choose Export as PDF.',
    'method2-step3' => 'In the PDF Options dialog that appears, click the Security tab.',
    'method2-step4' => 'Enter an opening password in the Set open password field. Optionally enter a permissions password and configure specific restrictions.',
    'method2-step5' => 'Choose AES-256 from the encryption level options for the strongest available protection.',
    'method2-step6' => 'Click Export and save your file.',
    'method2-note' => 'LibreOffice also works with existing PDFs if you open them first and then re-export with security settings applied.',

    // Method 3: Microsoft Word
    'method3-heading' => 'Method 3: Microsoft Word (Free for Office Users)',
    'method3-intro' => 'If you have Microsoft Word 2010 or later, you can add a password to a Word document before exporting to PDF. On some newer versions of Office, the PDF export dialog includes a security option.',
    'method3-step1' => 'Open your document in Microsoft Word.',
    'method3-step2' => 'Go to File then Export then Create PDF/XPS.',
    'method3-step3' => 'In the Publish as PDF dialog, click the Options button.',
    'method3-step4' => 'Look for an Encrypt the document with a password option and check it.',
    'method3-step5' => 'Enter and confirm your password.',
    'method3-step6' => 'Click OK and then Publish.',
    'method3-note' => 'The availability of this option varies by Office version. If you do not see the password option in the PDF export dialog, use LibreOffice or an online tool instead.',

    // Method 4: Online PDF Protection Tools
    'method4-heading' => 'Method 4: Online PDF Protection Tools',
    'method4-para1' => 'For PDFs that already exist in their final form, online tools allow adding password protection without creating the document from scratch. ILovePDF\'s Protect PDF tool, PDF24\'s online protector, and similar services upload your file, apply encryption, and return a protected version. Files are processed securely and deleted automatically after the session. For PDFTools users, the protect PDF feature applies AES encryption to any uploaded PDF with no registration required.',
    'method4-para2' => 'As with any online file processing, consider the sensitivity of the document before uploading. For the most confidential documents, use the local desktop methods described above.',

    // How to Choose a Strong PDF Password
    'strong-password-heading' => 'How to Choose a Strong PDF Password',
    'strong-password-para1' => 'The security of a password-protected PDF depends entirely on the strength of the password chosen. PDF encryption with AES-256 is effectively unbreakable by brute force, but a weak password like a name, date, or common word can be cracked quickly using dictionary attack tools that are freely available.',
    'strong-password-para2' => 'For a PDF password that provides real protection, use at least 12 characters combining uppercase letters, lowercase letters, numbers, and symbols. Avoid anything personally identifiable, any word found in a dictionary, and especially avoid reusing passwords from other accounts.',
    'strong-password-para3' => 'Store PDF passwords in a password manager rather than in an email, a text file, or on a sticky note. If you forget the password, there is no recovery mechanism. The encryption is designed so that even the service that created the PDF cannot recover access without the original password.',

    // Sharing Passwords Securely
    'sharing-heading' => 'Sharing Passwords Securely',
    'sharing-para' => 'Sending a password in the same email as the protected PDF defeats the purpose of the protection. If the email is intercepted, both the file and the key are captured together. Send the PDF by email and the password through a different channel: a text message, a phone call, or a secure messaging app. This ensures that intercepting one channel alone is not enough to access the document.',

    // FAQs
    'faqs-heading' => 'Frequently Asked Questions',

    'faq1-question' => 'Can a password-protected PDF be cracked?',
    'faq1-answer' => 'With a weak or common password, yes. There are tools designed to attempt dictionary attacks and common password patterns against PDF files. With a strong random password and AES-256 encryption, cracking is computationally infeasible with any technology currently available. The password strength is the single most important security factor.',

    'faq2-question' => 'What happens if I forget the PDF password?',
    'faq2-answer' => 'There is no built-in recovery mechanism for PDF password protection. If you lose the password, professional data recovery services can attempt to crack it, but success depends entirely on how strong the password was. Always store PDF passwords in a password manager when you create them.',

    'faq3-question' => 'Does password protection prevent printing?',
    'faq3-answer' => 'An opening password prevents viewing entirely, which also prevents printing. A permissions password can prevent printing specifically while still allowing the document to be opened and read. However, permissions restrictions are easier to bypass than opening password encryption and should not be relied upon for high-security documents.',

    'faq4-question' => 'Is PDF encryption the same as document rights management?',
    'faq4-answer' => 'No. PDF encryption controls access to the document itself. Digital rights management, or DRM, is a more complex system that can control access remotely, revoke access, and track usage. PDF encryption is a simpler, self-contained protection that does not require a server connection after the file is created.',

    // Conclusion
    'conclusion-heading' => 'Conclusion',
    'conclusion-para1' => 'Password protecting a PDF is a free, quick, and effective way to add meaningful security to documents containing sensitive information. Mac users have the easiest option with Preview\'s built-in export encryption. Windows users get comprehensive control through LibreOffice. Both platforms support online tools for PDFs that are already in their final form.',
    'conclusion-para2' => 'The most important element is choosing a strong password. For documents that need to be shared securely, combine the protection applied at PDFTools with the guidance above on password strength and secure password delivery. See also the article on PDF encryption standards explained for a deeper understanding of what these protection levels actually mean technically.',
];