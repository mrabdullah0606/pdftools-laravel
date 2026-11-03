<?php

return [
    'title' => 'Are Free Online PDF Tools Safe? File Privacy Explained',
    'description' => 'Wondering if free online PDF tools are safe? Learn what happens to your files after upload, privacy risks, and how to protect your data. Read now!',
    'main-heading' => 'Are Free Online PDF Tools Safe? What Happens to Your Files After Upload',

    // A Reasonable Question Worth Answering Properly
    'intro-heading' => 'A Reasonable Question Worth Answering Properly',
    'intro-para1' => 'Every time you upload a document to a free online tool, a sensible question should come to mind: where does this file actually go, who can access it, and what happens to it once you download the result?',
    'intro-para2' => 'For most people, this question goes unanswered because the process feels automatic and invisible. But documents processed by PDF tools often contain sensitive content: medical records, employment contracts, financial statements, legal agreements, or personal correspondence. Understanding how reputable tools handle your data allows you to make an informed decision about what to upload and what to process locally.',
    'intro-para3' => 'This article explains exactly what happens to your files on a reputable PDF tool, which signals distinguish trustworthy services from risky ones, and which types of documents should never be processed online.',

    // What Happens When You Upload a File
    'upload-heading' => 'What Happens When You Upload a File',
    'upload-para1' => 'The process is more straightforward than most people imagine. When you upload a file to a reputable PDF tool, your browser establishes an encrypted connection to the service\'s servers. The padlock icon and https prefix in your browser\'s address bar confirm this encryption is active. Your file travels over this encrypted connection to the server\'s storage system.',
    'upload-para2' => 'The server processes the file using its software, whether that is a compression engine, a conversion library, or a merging tool. The processed output is stored temporarily and made available for you to download through a unique URL. After a set period, both the original upload and the processed output are deleted automatically from the server.',
    'upload-para3' => 'This is the standard process at reputable services. The encryption during transfer, known as TLS or SSL, prevents your file from being intercepted by a third party while it is in transit. The automatic deletion limits the window during which the file exists on a server you do not control.',

    // How Long Do Files Stay on the Server
    'retention-heading' => 'How Long Do Files Stay on the Server',
    'retention-para1' => 'Deletion policies vary between services and are stated in their privacy policies. PDFTools deletes uploaded files and processed outputs automatically one hour after processing. ILovePDF deletes files within one hour on the free tier. Smallpdf also removes files within one hour. PDF24 processes many operations directly in the browser where possible, meaning some tasks never involve a server upload at all.',
    'retention-para2' => 'The one-hour window is a reasonable balance between giving users time to download their results and minimising the period during which files exist on remote servers. Some services offer shorter windows for users who need faster deletion.',

    // What Encryption Protects Your Files
    'encryption-heading' => 'What Encryption Protects Your Files',
    'encryption-para1' => 'Reputable PDF tools use TLS 1.2 or TLS 1.3 for file transfer. These are the same encryption protocols used by banks, healthcare providers, and e-commerce platforms for sensitive transactions. TLS encryption ensures that your file cannot be read by anyone intercepting the network connection between your device and the server.',
    'encryption-para2' => 'Encryption at rest, which protects files while they are stored on the server during processing, varies by service. Enterprise-tier and business-focused PDF tools typically offer AES-256 encryption at rest. Free consumer tools may use less comprehensive storage protection, though reputable ones store files in access-controlled environments with no broad employee access.',

    // What Reputable Services Do With Your Data
    'reputable-heading' => 'What Reputable Services Do With Your Data',
    'reputable-para1' => 'A clear, service-specific privacy policy is the primary signal of a trustworthy PDF tool. The policy should name the actual service, describe specific data handling practices, state the file deletion timeframe, and make clear that uploaded files are not used for training machine learning models or shared with third parties.',
    'reputable-para2' => 'PDFTools\'s privacy policy states that files are processed solely for the requested operation, deleted automatically after one hour, and not shared with advertisers or third parties. This is the standard you should look for.',
    'reputable-para3' => 'Warning signs in a privacy policy include: vague language about data use without specific timeframes, reserved rights to use anonymised user data for product improvement without an opt-out option, or a policy that appears to have been copied from another service and references a different website name.',

    // Which Documents Should Not Be Uploaded
    'never-upload-heading' => 'Which Documents Should Not Be Uploaded to Any Online Tool',
    'never-upload-intro' => 'Even with the best privacy practices, certain categories of documents carry risks that make cloud processing inadvisable. For these document types, use desktop software that processes files entirely on your own device with no network connection required.',

    'never-upload-item1' => 'Medical records, test results, and health insurance documents',
    'never-upload-item2' => 'Legal documents in active litigation',
    'never-upload-item3' => 'Trade secrets, unreleased product designs, or intellectual property',
    'never-upload-item4' => 'Government-classified or security-clearance documents',
    'never-upload-item5' => 'Financial documents containing full account numbers, social security numbers, or tax identifiers',
    'never-upload-item6' => 'Documents protected by attorney-client privilege',

    'never-upload-note' => 'For these categories, Adobe Acrobat Pro, Preview on Mac, LibreOffice with a PDF extension, and command-line tools like Ghostscript all process files locally without any upload.',

    // How to Evaluate a PDF Tool Before Using It
    'evaluate-heading' => 'How to Evaluate a PDF Tool Before Using It',
    'evaluate-intro' => 'Before uploading sensitive documents to any service you have not used before, check these specific indicators.',

    'evaluate-step1' => 'Read the privacy policy and look for the name of the service you are using. If it mentions a different website, the policy has been copied and the service cannot be trusted.',
    'evaluate-step2' => 'Look for a specific file deletion timeframe. Any reputable service will state exactly when files are deleted, not just use vague language about privacy.',
    'evaluate-step3' => 'Check that the entire site uses HTTPS. The padlock should be present on every page, not just the upload page.',
    'evaluate-step4' => 'Check how long the service has been operating. Long-established services like PDFTools, Smallpdf (since 2013), and ILovePDF (since 2010) have track records that newer services do not.',
    'evaluate-step5' => 'Check the terms of service for clauses that claim a licence to use your uploaded content. Reputable services explicitly disclaim any rights to your files beyond processing the requested operation.',

    // Conclusion
    'conclusion-heading' => 'Conclusion',
    'conclusion-para1' => 'Free online PDF tools are safe for most everyday documents when you use reputable, established services with transparent privacy policies and automatic file deletion. The file transfer is encrypted, the processing is automated, and the files are deleted on a defined schedule.',
    'conclusion-para2' => 'For sensitive documents, the sensible approach is to use desktop software that keeps files local. For everything else, tools like PDFTools provide fast, free processing with the security practices you would expect from a professional service. See the', 
    'a'=>'compress PDF tool',
    'a2'=>', merge PDF tool',
    'a3'=>', and PDF to Word converter,',
     'conclusion-para3' =>'all of which follow the same one-hour deletion policy.',

    // FAQs
    'faqs-heading' => 'Frequently Asked Questions',

    'faq1-question' => 'Can employees of a PDF tool company read my uploaded files?',
    'faq1-answer' => 'System administrators at any cloud service technically have access to server storage. Reputable services have strict access controls, logging of all access, and policies that prohibit viewing user files for any reason other than technical support requested by the user. For documents where any human access would be a problem, use local desktop software.',

    'faq2-question' => 'What if the service is hacked while my file is on the server?',
    'faq2-answer' => 'This risk exists with any cloud service. The combination of short retention windows and high file volumes means the probability of a specific file being targeted in a breach is low. For documents where any exposure would be unacceptable, do not use cloud services regardless of their security practices.',

    'faq3-question' => 'Does using an incognito browser window make online tools safer?',
    'faq3-answer' => 'No. Incognito mode prevents your browser from saving local history and cookies, but it has no effect on what happens on the server. The PDF tool receives and processes your file in exactly the same way regardless of your browser\'s privacy mode.',

    'faq4-question' => 'How do I know if a PDF tool is GDPR compliant?',
    'faq4-answer' => 'Look for a specific GDPR section in the privacy policy that describes your rights under EU data protection law, names a data controller, and provides contact information for data requests. Reputable services operating in or serving EU users will have this. Absence of any GDPR mention from a service that serves EU users is a significant warning sign.',
];