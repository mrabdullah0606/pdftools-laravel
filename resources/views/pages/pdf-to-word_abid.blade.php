<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">

    <!-- Title tag -->
    <title>PDF to Word Converter | Convert PDF to Editable DOCX Online</title>

    <!-- Meta description for SEO -->
    <meta name="description" content="Easily convert PDF files to editable Word documents (DOCX) online for free. No installation required. Secure and fast PDF to Word conversion.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon-96x96.png">
    <!-- OR for .ico format -->
    <!-- <link rel="icon" href="/favicon.ico" type="image/x-icon"> -->

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <style>
        :root {
            --primary: rgb(126, 110, 246);
            --primary-dark: rgb(100, 85, 220);
            --primary-light: rgba(126, 110, 246, 0.1);
            --white: #ffffff;
            --light: #f9fafb;
            --dark: #1f2937;
            --gray: #6b7280;
            --light-gray: #e5e7eb;
            --radius: 16px;
        }

        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f0f2f5 100%);
            color: var(--dark);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(126, 110, 246, 0.05) 0%, rgba(109, 93, 252, 0.02) 100%);
            padding: 1rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-light) 0%, rgba(109, 93, 252, 0.05) 100%);
            z-index: -1;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -100px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(109, 93, 252, 0.05) 0%, var(--primary-light) 100%);
            z-index: -1;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }

        .upload-section {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin: -3rem auto 2rem;
            width: 90%;
            max-width: 900px;
            position: relative;
            z-index: 10;
            border: 1px solid var(--light-gray);
        }

        .upload-area {
            border: 2px dashed var(--light-gray);
            border-radius: var(--radius);
            padding: 3rem 1.5rem;
            background-color: var(--light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover, .upload-area.dragover {
            border-color: var(--primary);
            background-color: var(--primary-light);
        }

        .upload-icon {
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .source-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background-color: var(--light);
            border-radius: 50px;
            font-size: 0.9rem;
            color: var(--gray);
            transition: all 0.3s ease;
            border: 1px solid var(--light-gray);
            flex-shrink: 0;
        }

        .source-item:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-upload {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        /* Feature Cards - Modern Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .feature-card {
            background-color: var(--white);
            border-radius: var(--radius);
            padding: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }
        
        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .feature-text {
            color: var(--gray);
            margin-bottom: 0;
        }
        

        /* How It Works - Timeline Style */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background-color: var(--primary-light);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
            border-radius: 2px;
        }
        
        .step-card {
            padding: 1.5rem 2rem;
            position: relative;
            background-color: var(--white);
            width: 46%;
            border-radius: var(--radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        
        .step-card.left {
            left: 0;
        }
        
        .step-card.right {
            left: 54%;
        }
        
        .step-number {
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(126, 110, 246, 0.3);
            top: 1.5rem;
            z-index: 1;
        }
        
        .step-card.left .step-number {
            right: -75px;
        }
        
        .step-card.right .step-number {
            left: -75px;
        }
        
        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .step-text {
            color: var(--gray);
            margin-bottom: 0;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .step-card {
            background-color: var(--white);
            border-radius: var(--radius);
            padding: 2rem;
            text-align: center;
            height: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--light-gray);
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0 auto 1.25rem;
            box-shadow: 0 5px 15px rgba(126, 110, 246, 0.3);
        }

        .timeline-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-light) 0%, rgba(126, 110, 246, 0.05) 100%);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        footer {
            background-color: #4b4291;
            color: var(--white);
            padding: 5rem 0 2rem;
            margin-top: 5rem;
        }
        
        /* Conversion Options Styles */
        .conversion-section {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin: 2.5rem auto;
            width: 90%;
            max-width: 900px;
            border: 1px solid var(--light-gray);
            display: none;
        }
        
        .conversion-options {
            background: var(--light);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-top: 1.25rem;
        }
        
        .option-group {
            margin-bottom: 1.5rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .option-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.625rem;
        }
        
        .option-title i {
            color: var(--primary);
        }
        
        .option-card {
            background: var(--white);
            border: 2px solid var(--light-gray);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.625rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .option-card.active {
            border-color: var(--primary);
            background-color: var(--primary-light);
        }
        
        .format-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.625rem;
            margin-top: 0.625rem;
        }
        
        .format-option {
            background: var(--white);
            border: 2px solid var(--light-gray);
            border-radius: 10px;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.625rem;
            transition: all 0.3s ease;
        }
        
        .format-option.active {
            border-color: var(--primary);
            background-color: var(--primary-light);
        }
        
        .format-option input {
            accent-color: var(--primary);
        }
        
        .convert-btn {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.875rem;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            margin: 1.875rem auto 0;
            transition: all 0.3s ease;
        }
        
        .convert-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .result-section {
            background: var(--light);
            border-radius: var(--radius);
            padding: 1.875rem;
            margin-top: 1.875rem;
            display: none;
        }
        
        .result-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
        }

        .share-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 500;
}

.share-btn i {
    font-size: 1.1rem;
}
        
        .uploaded-file-info {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
        
        .file-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
         .download-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 300px;
            margin: 50px auto;
        }
        button {
            padding: 10px;
            cursor: pointer;
        }
        
        .file-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .file-size {
            color: var(--gray);
            margin-bottom: 1.25rem;
        }
        
        .change-file-btn {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            border-radius: 50px;
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }
        
        .change-file-btn:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .logo-wrapper {
            height: 30px;
        }
        
         /* URL Input Styles */
    .url-input-container {
        display: none;
        width: 100%;
        margin-top: 1rem;
        position: relative;
    }
    
    .url-input-group {
        display: flex;
        width: 100%;
    }
    
    .url-input {
        flex: 1;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        padding: 0.5rem 1rem;
        outline: none;
        padding-right: 2.5rem;
    }
    
    .url-submit-btn {
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 0 8px 8px 0;
        padding: 0.5rem 1rem;
        cursor: pointer;
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
    }
    
    .url-submit-btn:hover {
        background-color: var(--primary-dark);
    }

    .url-close-btn {
        position: absolute;
        right: 60px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--gray);
        cursor: pointer;
        font-size: 1rem;
    }

    .url-close-btn:hover {
        color: var(--dark);
    }

        /* Responsive dropdown styles */
        .dropdown-menu.language-dropdown {
            width: 100%;
            left: 0 !important;
            right: 0 !important;
            margin-top: 0.5rem !important;
            padding: 1rem;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .language-grid {
            display: grid;
            gap: 0.5rem;
        }
        
        /* Mobile (default) */
        .language-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        /* Small tablets */
        @media (min-width: 576px) {
            .language-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        /* Tablets and small desktops (900px range) */
        @media (min-width: 768px) {
            .dropdown-menu.language-dropdown {
                width: 90vw;
                max-width: 1200px;
                left: 50% !important;
                right: auto !important;
                transform: translateX(-50%) !important;
            }
            
            .language-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        /* Medium desktops (900-1199px) */
        @media (min-width: 900px) and (max-width: 1199px) {
            .dropdown-menu.language-dropdown {
                width: 95vw;
                max-width: 1100px;
            }
            
            .language-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }
        
        /* Large desktops (1200px and up) */
        @media (min-width: 1200px) {
            .dropdown-menu.language-dropdown {
                width: 1300px;
                left: auto !important;
                right: 0 !important;
                transform: none !important;
            }
            
            .language-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }
        
        .language-item {
            width: 100%;
        }
        
        .language-item .dropdown-item {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0.5rem 1rem;
        }
        .card-body i {
            color: var(--primary);
        }
        
        /* Mobile navbar specific adjustments */
        @media (max-width: 767.98px) {
            .navbar-collapse {
                padding-bottom: 1rem;
            }
            
            .navbar-collapse .dropdown-menu.language-dropdown {
                position: static !important;
                transform: none !important;
                margin-top: 0.5rem;
                width: 100% !important;
            }
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .upload-section {
                width: 95%;
                padding: 1.25rem;
            }
            
            .upload-area {
                padding: 2rem 1rem;
            }
            
            .source-item {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }
            
            .feature-card, .step-card {
                padding: 1.5rem;
            }
            
            .format-options {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section {
                padding: 3rem 0 1.5rem;
            }
            
            .hero-title {
                font-size: 1.75rem;
            }
            
            .source-item {
                padding: 0.5rem 0.75rem;
                font-size: 0.75rem;
            }
            
            .btn-upload {
                padding: 0.375rem 0.75rem;
                font-size: 0.8125rem;
            }
            
            .col-md-4, .col-md-6, .col-lg-3, .col-lg-4 {
                margin-bottom: 1.25rem;
            }
            
            .d-flex .timeline-icon {
                margin-right: 1rem;
                margin-bottom: 0;
            }
            
            footer {
                padding: 3rem 0 1.25rem;
            }
            
            .conversion-section {
                padding: 1.5rem;
                width: 95%;
            }
        }

         /* Add this to your style section */
 .language-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 0.75rem;
    }

        /* New Sections */
        .comparison-section {
            background-color: var(--white);
            padding: 4rem 0;
            border-top: 1px solid var(--light-gray);
            border-bottom: 1px solid var(--light-gray);
        }

        .comparison-table {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .comparison-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1rem;
            font-weight: 600;
        }

        .comparison-row {
            display: flex;
            border-bottom: 1px solid var(--light-gray);
        }

        .comparison-row:last-child {
            border-bottom: none;
        }

        .comparison-feature {
            flex: 1;
            padding: 1rem;
            font-weight: 500;
        }

        .comparison-value {
            flex: 1;
            padding: 1rem;
            text-align: center;
        }

        .comparison-value.good {
            color: var(--primary);
            font-weight: 600;
        }

        .faq-section {
            padding: 4rem 0;
            background-color: var(--light);
        }

        .faq-card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .faq-header {
            padding: 1.25rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }
        .faq-header i {
            color: var(--primary);
        }

        .faq-content {
            padding: 0 1.25rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-content.show {
            padding: 0 1.25rem 1.25rem;
            max-height: 500px;
        }

        .use-cases-section {
            padding: 4rem 0;
        }

        .use-case-card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
        }

        .use-case-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .use-case-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

       
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--light-gray);
            margin-right: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 600;
        }

       
        .preview-section {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin: 2.5rem auto;
            width: 95%;
            max-width: 1200px;
            border: 1px solid var(--light-gray);
            display: none;
        }
        
        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .preview-container {
            display: flex;
            gap: 1.5rem;
            min-height: 500px;
        }
        
        .preview-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius);
            overflow: hidden;
        }
        
        .preview-header-bar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0.75rem 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .preview-content {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            background-color: var(--light);
            position: relative;
        }
        
        .preview-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
            color: var(--gray);
        }
        
        .preview-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .preview-placeholder.pdf .preview-icon {
            color: #ff5252;
        }
        
        .preview-placeholder.word .preview-icon {
            color: #2b579a;
        }
        
        .preview-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .preview-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .preview-btn.download {
            background-color: var(--primary);
            color: white;
            border: none;
        }
        
        .preview-btn.download:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .preview-btn.convert-another {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .preview-btn.convert-another:hover {
            background-color: var(--primary-light);
        }
        
        .preview-info {
            background-color: var(--light);
            padding: 0.75rem;
            border-top: 1px solid var(--light-gray);
            font-size: 0.9rem;
            color: var(--gray);
            display: flex;
            justify-content: space-between;
        }
        
        .comparison-section {
            background-color: var(--white);
            padding: 4rem 0;
            border-top: 1px solid var(--light-gray);
            border-bottom: 1px solid var(--light-gray);
        }
        
        .comparison-table {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .comparison-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1rem;
            font-weight: 600;
        }
        
        .comparison-row {
            display: flex;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .comparison-row:last-child {
            border-bottom: none;
        }
        
        .comparison-feature {
            flex: 1;
            padding: 1rem;
            font-weight: 500;
        }
        
        .comparison-value {
            flex: 1;
            padding: 1rem;
            text-align: center;
        }
        
        .comparison-value.good {
            color: var(--primary);
            font-weight: 600;
        }
        .uploaded-files-container {
    width: 100%;
}

.files-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.files-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 15px;
}

.uploaded-file-box {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    background: #f8f9fa;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.file-info {
    display: flex;
    align-items: center;
    flex: 1;
}

.file-details {
    margin-left: 10px;
}

.remove-file-btn {
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.remove-file-btn:hover {
    background: #c82333;
}
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .preview-container {
                flex-direction: column;
            }
            
            .preview-column {
                min-height: 300px;
            }
        }
        
        @media (max-width: 768px) {
            .preview-section {
                width: 100%;
                padding: 1.5rem;
            }
            
            .preview-container {
                min-height: auto;
            }
            
            .preview-info {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-3">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <div class="d-inline-block">
                            <img src="images/logo.png" alt="Logo" class="img-fluid" width="136" height="30">
                        </div>
                    </a>

                    <!-- Mobile Toggle Button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Links -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link fw-medium" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link fw-medium" href="#">Blog</a></li>
                            <li class="nav-item"><a class="nav-link fw-medium" href="#">Contact us</a></li>
                        </ul>

                         <div class="dropdown position-relative">
                            <!-- Dropdown Toggle Button -->
                            <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown" type="button" data-bs-toggle="collapse" data-bs-target="#languageCollapse" aria-expanded="false" aria-controls="languageCollapse">
                               🌐 Language
                            </button>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
     <div class="collapse mt-2" id="languageCollapse">
        <div class="container-fluid py-2 px-5">
            <div class="language-grid">
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/us.png" width="20" class="me-2"> English</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/es.png" width="20" class="me-2"> Spanish</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/fr.png" width="20" class="me-2"> French</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/de.png" width="20" class="me-2"> German</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/it.png" width="20" class="me-2"> Italian</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/et.png" width="20" class="me-2"> Amharic</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/za.png" width="20" class="me-2"> Afrikaans</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/ae.png" width="20" class="me-2"> Arabic</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/cn.png" width="20" class="me-2"> Chinese</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/jp.png" width="20" class="me-2"> Japanese</a></div>
                <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/kr.png" width="20" class="me-2"> Korean</a></div>
                 <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/tr.png" width="20" class="me-2"> Turkish</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/fi.png" width="20" class="me-2"> Finnish</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/bd.png" width="20" class="me-2"> Bengali</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/cz.png" width="20" class="me-2"> Czech</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/id.png" width="20" class="me-2"> Indonesian</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/dk.png" width="20" class="me-2"> Danish</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/gr.png" width="20" class="me-2"> Greek</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/in.png" width="20" class="me-2"> Hindi</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/am.png" width="20" class="me-2"> Armenian</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/my.png" width="20" class="me-2"> Malay</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/nl.png" width="20" class="me-2"> Dutch</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/no.png" width="20" class="me-2"> Norwegian</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/pl.png" width="20" class="me-2"> Polish</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/pt.png" width="20" class="me-2"> Portuguese</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/ro.png" width="20" class="me-2"> Romanian</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/ru.png" width="20" class="me-2"> Russian</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/se.png" width="20" class="me-2"> Swedish</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/th.png" width="20" class="me-2"> Thai</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/vn.png" width="20" class="me-2"> Vietnamese</a></div>
                    <div class="language-item"><a class="dropdown-item border rounded py-2 px-2" href="#"><img src="https://flagcdn.com/w40/ua.png" width="20" class="me-2"> Ukrainian</a></div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center py-4">
            <h1 class="hero-title mb-3">PDF to Word Converter</h1>
            <p class="lead mb-5">Our tool to convert PDF files into Word is free, secure, and reliable.</p>
        </div>
        <form action="{{route('convert.pdf')}}" method="POST" enctype="multipart/form-data" >
        <!-- Upload Section -->
        <div class="upload-section" id="upload">
            <div class="container">
                <div class="upload-area" id="dropZone">
                    <div class="text-center" id="initialUpload">
                        <i class="fas fa-cloud-upload-alt upload-icon"></i>
                        <h3 class="mb-2">Drop Your PDF Here!</h3>
                        <p class="text-muted mb-4">or select a file from your device</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary btn-upload" type="button" id="uploadBtn">
                                <i class="fas fa-upload me-1"></i> Upload PDF
                            </button>
                        </div>
                        <input type="file" id="fileInput" accept=".pdf" class="d-none">
                        
                        <!-- URL Input Container -->
                        <div class="url-input-container" id="urlInputContainer">
                            <div class="url-input-group">
                                <input type="text" class="url-input" id="urlInput" placeholder="Enter PDF URL...">
                                <button class="url-close-btn" id="urlCloseBtn">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button class="url-submit-btn" id="urlSubmitBtn">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                    <div class="source-item" id="googleDriveBtn">
                        <i class="fab fa-google-drive"></i>
                        <span>Google Drive</span>
                    </div>
                    <div class="source-item" id="dropboxBtn">
                        <i class="fab fa-dropbox"></i>
                        <span>Dropbox</span>
                    </div>
                    <div class="source-item" id="urlSourceBtn">
                        <i class="fas fa-link"></i>
                        <span>From URL</span>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>

    <!-- Conversion Section -->
    <section class="conversion-section" id="conversionSection">
        <div class="container">
            <div class="text-center mb-4">
                <h3><i class="fas fa-file-word me-2"></i> Conversion Options</h3>
                <p class="text-muted">Customize how you want your PDF converted to Word</p>
            </div>
            
            <div class="conversion-options">
                <div class="option-group">
                    <div class="option-title">
                        <i class="fas fa-file-alt"></i>
                        <span>Output Format</span>
                    </div>
                    
                    <div class="format-options">
                        <div class="format-option active" id="docxOption">
                            <input type="radio" id="docxFormat" name="format" checked>
                            <label for="docxFormat">
                                <i class="fas fa-file-word me-1"></i> DOCX (Modern Word Format)
                            </label>
                        </div>
                        <div class="format-option" id="docOption">
                            <input type="radio" id="docFormat" name="format">
                            <label for="docFormat">
                                <i class="fas fa-file-word me-1"></i> DOC (Legacy Word Format)
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="option-group">
                    <div class="option-title">
                        <i class="fas fa-cog"></i>
                        <span>Conversion Settings</span>
                    </div>
                    
                    <div class="option-card active">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                            <label class="form-check-label" for="preserveFormatting">Preserve original formatting</label>
                        </div>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="extractImages" checked>
                            <label class="form-check-label" for="extractImages">Extract images</label>
                        </div>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="ocrOption">
                            <label class="form-check-label" for="ocrOption">Enable OCR for scanned PDFs</label>
                        </div>
                    </div>
                </div>
                
                <button class="btn convert-btn" id="convertBtn" type="submit">
                    <i class="fas fa-exchange-alt me-1"></i> Convert to Word
                </button>
            </div>
            <!-- Progress Section (initially hidden) -->
<div class="progress-section" id="progressSection" style="display: none;">
    <div class="progress-container">
        <div class="progress-header">
            <h5><i class="fas fa-cog fa-spin me-2"></i> Converting Your Files...</h5>
            <span class="progress-percentage" id="progressPercentage">0%</span>
        </div>
        <div class="progress-bar-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="progress-status" id="progressStatus">Initializing conversion...</div>
    </div>
</div>
            
            <div class="result-section" id="resultSection">
                <div class="result-header">
                    
                    <h4><i class="fas fa-file-word me-2"></i> Conversion Result</h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download me-1"></i> Download Word
                        </button>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-redo me-1"></i> Convert Another
                        </button>
                    </div>
                </div>
                
                <div class="result-content mt-3">
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i> Your PDF has been successfully converted to Word format!
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <div>
                            <h6>Original PDF</h6>
                            <p class="text-muted mb-0">document.pdf (2.4 MB)</p>
                        </div>
                        <i class="fas fa-arrow-right text-muted mx-3"></i>
                        <div>
                            <h6>Converted Word</h6>
                            <p class="text-muted mb-0">document.docx (1.8 MB)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section class="preview-section" id="previewSection">
        <div class="container">
            <div class="preview-header">
                <h3><i class="fas fa-eye me-2"></i> Conversion Preview</h3>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-expand-alt me-1"></i> Fullscreen
                    </button>
                </div>
            </div>
            
            <div class="preview-container">
                <!-- Original PDF Preview -->
                <div class="preview-column">
                    <div class="preview-header-bar">
                        <div>
                            <i class="fas fa-file-pdf me-2"></i> Original PDF
                        </div>
                        <div class="text-sm">Page: 1 of 5</div>
                    </div>
                    
                    <div class="preview-content">
                        <div class="preview-placeholder pdf">
                            <i class="fas fa-file-pdf preview-icon"></i>
                            <h4>Original PDF Preview</h4>
                            <p class="mt-2">Your PDF content would appear here</p>
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-download me-1"></i> Download Original
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="preview-info">
                        <div class="file-info">
                            <span class="file-name">document.pdf</span>
                            <span class="file-size">(2.4 MB)</span>
                        </div>
                        <div class="file-pages">5 pages</div>
                    </div>
                </div>
                
                <!-- Converted Word Preview -->
                <div class="preview-column">
                    <div class="preview-header-bar">
                        <div>
                            <i class="fas fa-file-word me-2"></i> Converted Word Document
                        </div>
                        <div class="text-sm">Page: 1 of 5</div>
                    </div>
                    
                    <div class="preview-content">
                        <div class="preview-placeholder word">
                            <i class="fas fa-file-word preview-icon"></i>
                            <h4>Word Document Preview</h4>
                            <p class="mt-2">Your converted Word content would appear here</p>
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit me-1"></i> Edit in Browser
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="preview-info">
                        <div class="file-info">
                            <span class="file-name">document.docx</span>
                            <span class="file-size">(1.8 MB)</span>
                        </div>
                        <div class="file-pages">5 pages</div>
                    </div>
                </div>
            </div>
            
            <div class="preview-actions">
                <button class="preview-btn download" id="downloadWordBtn">
                    <i class="fas fa-download me-1"></i> Download Word File
                </button>
                <button class="preview-btn convert-another" id="convertAnotherBtn">
                    <i class="fas fa-redo me-1"></i> Convert Another File
                </button>
            </div>

            <div class="share-options mt-4">
    <h5 class="mb-3">Save or Share:</h5>
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary share-btn" id="saveToDrive">
            <i class="fab fa-google-drive"></i> Save to Drive
        </button>
        <button class="btn btn-outline-primary share-btn" id="saveToDropbox">
            <i class="fab fa-dropbox"></i> Save to Dropbox
        </button>
        <button class="btn btn-outline-primary share-btn" id="shareOnWhatsApp">
            <i class="fab fa-whatsapp"></i> Share on WhatsApp
        </button>
        <!-- <button class="btn btn-primary share-btn" id="directDownload">
            <i class="fas fa-download"></i> Download Now
        </button> -->
    </div>
</div>
        </div>
    </section>
    

     <!-- Related Tools Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">More Helpful PDF Tools</h2>
                <p class="text-muted">Discover our full suite of document utilities</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4 col-lg-2">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-word fa-2x mb-3"></i>
                            <h5 class="card-title">PDF to Word</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-pdf fa-2x mb-3"></i>
                            <h5 class="card-title">Word to PDF</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-image fa-2x mb-3"></i>
                            <h5 class="card-title">JPG to PDF</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-object-group fa-2x mb-3"></i>
                            <h5 class="card-title">Merge PDF</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-lock fa-2x mb-3"></i>
                            <h5 class="card-title">Protect PDF</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-scroll fa-2x mb-3"></i>
                            <h5 class="card-title">Summarize PDF</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="section bg-light">
        <div class="container p-5">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose Our PDF Converter</h2>
                <p class="section-subtitle">Professional-grade conversion with exceptional results</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3 class="feature-title">Perfect Formatting</h3>
                    <p class="feature-text">Preserves fonts, tables, images, and layout from your original PDF with industry-leading accuracy.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Lightning Fast</h3>
                    <p class="feature-text">Convert documents in seconds with our optimized cloud-based processing engine.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="feature-title">Secure Processing</h3>
                    <p class="feature-text">Military-grade encryption with automatic file deletion after conversion for your privacy.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="feature-title">OCR Technology</h3>
                    <p class="feature-text">Convert scanned PDFs into editable Word documents with advanced text recognition.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Mobile Friendly</h3>
                    <p class="feature-text">Works perfectly on all devices including smartphones and tablets.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h3 class="feature-title">No Limits</h3>
                    <p class="feature-text">Convert as many files as you need with no watermarks or hidden fees.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Mobile Friendly</h3>
                    <p class="feature-text">Works perfectly on all devices including smartphones and tablets.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h3 class="feature-title">No Limits</h3>
                    <p class="feature-text">Convert as many files as you need with no watermarks or hidden fees.</p>
                </div>
            </div>
        </div>
    </section>
     <!-- How It Works Section -->
    <section class="section">
        <div class="container p-5">
            <div class="text-center mb-5">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">Convert PDF to Word in just 3 simple steps</p>
            </div>
            
            <div class="timeline">
                <div class="step-card left">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Upload Your PDF</h3>
                    <p class="step-text">Drag and drop your PDF file or click to browse your device. You can also import from cloud storage or paste a URL.</p>
                </div>
                
                <div class="step-card right">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Customize Conversion</h3>
                    <p class="step-text">Choose your output format (DOCX or DOC) and adjust settings like OCR for scanned documents.</p>
                </div>
                
                <div class="step-card left">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Download Your Word File</h3>
                    <p class="step-text">Your converted document will be ready in seconds. Download it directly to your device.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Use Cases Section -->
    <section class="use-cases-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Why Convert PDF to Word File?</h2>
                <p class="text-muted">When you need to edit or repurpose PDF content</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h3>Easy to Edit and Format</h3>
                        <p class="text-muted">Convert research papers or theses to Word for further editing or collaboration</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Academic Work</h3>
                        <p class="text-muted">Convert research papers or theses to Word for further editing or collaboration</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Business Reports</h3>
                        <p class="text-muted">Update annual reports or business plans while maintaining original formatting</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>Books & Manuals</h3>
                        <p class="text-muted">Convert eBooks or manuals to Word for translation or republication</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3>Forms & Applications</h3>
                        <p class="text-muted">Make fillable PDF forms editable in Word for easier completion</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <h3>Archived Documents</h3>
                        <p class="text-muted">Revive old scanned documents by converting them to editable Word files</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Everything you need to know about PDF to Word conversion</p>
            </div>
            
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span>How accurate is the PDF to Word conversion?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-content">
                            <p>Our converter provides industry-leading accuracy in preserving fonts, formatting, tables, and layout. Simple documents convert with near-perfect accuracy, while complex layouts may require minor adjustments. We maintain the highest possible fidelity to your original PDF.</p>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span>Can I convert scanned PDFs to Word?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-content">
                            <p>Yes! Enable the OCR (Optical Character Recognition) option when converting scanned PDFs. This will analyze the scanned images and convert them to editable text in your Word document. Note that OCR accuracy depends on scan quality.</p>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span>Is there a file size limit for conversion?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-content">
                            <p>Our free service supports files up to 50MB. For larger files or batch processing, consider our premium plans which support files up to 500MB and multiple file conversions simultaneously.</p>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span>How secure is my document during conversion?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-content">
                            <p>Your security is our top priority. All files are encrypted during transfer and automatically deleted from our servers within 1 hour of processing. We never store or access your documents after conversion.</p>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span>What's the difference between DOC and DOCX formats?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-content">
                            <p>DOC is the older Word format (97-2003), while DOCX is the modern XML-based format (2007+). DOCX offers better compatibility, smaller file sizes, and more features. We recommend DOCX unless you specifically need the older format.</p>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span>Can I convert password-protected PDFs?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-content">
                            <p>For security reasons, we cannot convert password-protected PDFs. Please remove the password protection before uploading your file for conversion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
   
    <!-- Footer -->
    <footer class="text-white py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div class="logo">
                        <a class="navbar-brand d-flex align-items-center py-2" href="#">
                            <img src="images/pdf-tool.png" alt="Logo" class="img-fluid" width="200" height="30">
                        </a>
                    </div>
                </div>
                <p class="lead mb-5">Intelligent document processing for the modern professional</p>
                
                <div class="d-flex flex-wrap justify-content-center gap-4 mb-5">
                    <a href="#" class="text-white text-decoration-none text-hover-primary">Home</a>
                    <a href="#" class="text-white text-decoration-none text-hover-primary">Features</a>
                    <a href="#" class="text-white text-decoration-none text-hover-primary">How It Works</a>
                    <a href="#" class="text-white text-decoration-none text-hover-primary">Pricing</a>
                    <a href="#" class="text-white text-decoration-none text-hover-primary">Contact</a>
                    <a href="#" class="text-white text-decoration-none text-hover-primary">Privacy Policy</a>
                    <a href="#" class="text-white text-decoration-none text-hover-primary">Terms of Service</a>
                </div>
                
                <div class="d-flex justify-content-center gap-3 mb-5">
                    <a href="#" class="text-white text-decoration-none bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-3">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-3">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                
                <div class="text-white-50 pt-4 border-top border-white-10">
                    <p class="mb-0">&copy; 2023 PDFTools. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const fileInput = document.getElementById('fileInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const urlSourceBtn = document.getElementById('urlSourceBtn');
    const dropZone = document.getElementById('dropZone');
    const initialUpload = document.getElementById('initialUpload');
    const urlInputContainer = document.getElementById('urlInputContainer');
    const urlInput = document.getElementById('urlInput');
    const urlSubmitBtn = document.getElementById('urlSubmitBtn');
    const urlCloseBtn = document.getElementById('urlCloseBtn');
    const conversionSection = document.getElementById('conversionSection');
    const previewSection = document.getElementById('previewSection');
    const downloadWordBtn = document.getElementById('downloadWordBtn');
    const convertAnotherBtn = document.getElementById('convertAnotherBtn');
    
    // Format options
    const docxOption = document.getElementById('docxOption');
    const docOption = document.getElementById('docOption');
    
    // Convert button
    const convertBtn = document.getElementById('convertBtn');
    
    // Result section
    const resultSection = document.getElementById('resultSection');
    
    // Current files array
    let currentFiles = [];

    // Allow multiple file selection
    fileInput.setAttribute('multiple', 'multiple');

    // Handle click on upload button
    uploadBtn.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Handle file selection
    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            handleMultipleFileUpload(Array.from(e.target.files));
        }
    });
    
    // Handle drag and drop
    // dropZone.addEventListener('dragover', function(e) {
    //     e.preventDefault();
    //     dropZone.classList.add('dragover');
    // });
    
    // dropZone.addEventListener('dragleave', function() {
    //     dropZone.classList.remove('dragover');
    // });
    
    // dropZone.addEventListener('drop', function(e) {
    //     e.preventDefault();
    //     dropZone.classList.remove('dragover');
        
    //     if (e.dataTransfer.files.length > 0) {
    //         handleMultipleFileUpload(Array.from(e.dataTransfer.files));
    //     }
    // });
    
    // // Handle URL button click
    // urlSourceBtn.addEventListener('click', function(e) {
    //     e.preventDefault();
    //     showUrlInput();
    // });
    
    // urlCloseBtn.addEventListener('click', function() {
    //     urlInputContainer.style.display = 'none';
    //     urlInput.value = '';
    // });
    
    // // Show URL input field
    // function showUrlInput() {
    //     initialUpload.querySelector('h3').textContent = 'Enter PDF URL';
    //     initialUpload.querySelector('p').textContent = 'Paste the URL of the PDF you want to convert';
    //     urlInputContainer.style.display = 'block';
    //     uploadBtn.style.display = 'none';
    // }
    
    // // Handle URL submission
    // urlSubmitBtn.addEventListener('click', function() {
    //     const url = urlInput.value.trim();
    //     if (url) {
    //         // Validate URL (simple check)
    //         if (url.endsWith('.pdf') || url.includes('.pdf?')) {
    //             // Simulate file upload with URL
    //             const fakeFile = {
    //                 name: url.split('/').pop().split('?')[0] || 'document.pdf',
    //                 size: 0,
    //                 type: 'application/pdf'
    //             };
    //             handleMultipleFileUpload([fakeFile]);
    //         } else {
    //             alert('Please enter a valid PDF URL');
    //         }
    //     }
    // });

    // // Share/download buttons
    // document.getElementById('saveToDrive').addEventListener('click', function() {
    //     alert('This would save to Google Drive in a real implementation');
    // });

    // document.getElementById('saveToDropbox').addEventListener('click', function() {
    //     alert('This would save to Dropbox in a real implementation');
    // });

    // document.getElementById('shareOnWhatsApp').addEventListener('click', function() {
    //     const message = "Check out this PDF I converted: ";
    //     const url = window.location.href;
    //     window.open(`https://wa.me/?text=${encodeURIComponent(message + url)}`);
    // });
    
    function handleMultipleFileUpload(files) {
        // Filter only PDF files
        const pdfFiles = files.filter(file => 
            file.type === 'application/pdf' || file.name.endsWith('.pdf')
        );
        
        if (pdfFiles.length === 0) {
            alert('Please upload PDF files only');
            return;
        }
        
        // Add new files to current files array
        currentFiles = [...currentFiles, ...pdfFiles];
        
        // Display all files
        displayUploadedFiles();
        
        // Show conversion section
        conversionSection.style.display = 'block';
        
        // Scroll to conversion section
        setTimeout(() => {
            conversionSection.scrollIntoView({ behavior: 'smooth' });
        }, 300);
    }
    
    function displayUploadedFiles() {
        const filesHtml = currentFiles.map((file, index) => `
            <div class="uploaded-file-box" data-index="${index}">
                <div class="file-info">
                    <i class="fas fa-file-pdf file-icon"></i>
                    <div class="file-details">
                        <div class="file-name">${file.name}</div>
                        <div class="file-size">${file.size > 0 ? (file.size / 1024 / 1024).toFixed(2) + ' MB' : 'Remote PDF'}</div>
                    </div>
                </div>
                <button class="remove-file-btn" onclick="removeFile(${index})">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `).join('');
        
        initialUpload.innerHTML = `
            <div class="uploaded-files-container">
                <div class="files-header">
                    <h3 class="mb-2">Uploaded Files (${currentFiles.length})</h3>
                    <button class="btn btn-outline-primary btn-sm add-more-btn" id="addMoreBtn">
                        <i class="fas fa-plus me-1"></i> Add More Files
                    </button>
                </div>
                <div class="files-grid">
                    ${filesHtml}
                </div>
            </div>
            <div class="url-input-container" id="urlInputContainer">
                <div class="url-input-group">
                    <input type="text" class="url-input" id="urlInput" placeholder="Enter PDF URL...">
                    <button class="url-close-btn" id="urlCloseBtn">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="url-submit-btn" id="urlSubmitBtn">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        `;
        
        // Reattach add more button event listener
        document.getElementById('addMoreBtn').addEventListener('click', function() {
            fileInput.click();
        });
        
        // Reattach URL close button event listener
        const newUrlCloseBtn = document.getElementById('urlCloseBtn');
        if (newUrlCloseBtn) {
            newUrlCloseBtn.addEventListener('click', function() {
                document.getElementById('urlInputContainer').style.display = 'none';
                document.getElementById('urlInput').value = '';
            });
        }
    }
    
    // Global function to remove file
    window.removeFile = function(index) {
        currentFiles.splice(index, 1);
        
        if (currentFiles.length === 0) {
            resetUploadInterface();
        } else {
            displayUploadedFiles();
        }
    }
    
    function resetUploadInterface() {
        initialUpload.innerHTML = `
            <i class="fas fa-cloud-upload-alt upload-icon"></i>
            <h3 class="mb-2">Drop Your PDF Here!</h3>
            <p class="text-muted mb-4">or select files from your device</p>
            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary btn-upload" id="uploadBtn">
                    <i class="fas fa-upload me-1"></i> Upload PDFs
                </button>
            </div>
            <div class="url-input-container" id="urlInputContainer">
                <div class="url-input-group">
                    <input type="text" class="url-input" id="urlInput" placeholder="Enter PDF URL...">
                    <button class="url-close-btn" id="urlCloseBtn">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="url-submit-btn" id="urlSubmitBtn">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        `;
        conversionSection.style.display = 'none';
        previewSection.style.display = 'none';
        resultSection.style.display = 'none';
        fileInput.value = '';
        currentFiles = [];
        
        // Reattach event listeners
        document.getElementById('uploadBtn').addEventListener('click', function() {
            fileInput.click();
        });
        
        document.getElementById('urlCloseBtn').addEventListener('click', function() {
            document.getElementById('urlInputContainer').style.display = 'none';
            document.getElementById('urlInput').value = '';
        });
    }
    
    // Set up event listeners for options
    docxOption.addEventListener('click', function() {
        setActiveOption(docxOption, [docOption]);
    });
    
    docOption.addEventListener('click', function() {
        setActiveOption(docOption, [docxOption]);
    });
    
    // Convert button click
    convertBtn.addEventListener('click', function() {
        if (currentFiles.length === 0) {
            alert('Please upload files first');
            return;
        }
        
        // Show processing animation
        convertBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Converting...';
        convertBtn.disabled = true;
        
        // Simulate processing delay
        setTimeout(() => {
            // Show both result and preview sections
            resultSection.style.display = 'block';
            previewSection.style.display = 'block';
            
            // For multiple files, show first file info in preview
            const firstFile = currentFiles[0];
            document.querySelector('.preview-placeholder.pdf h4').textContent = 
                currentFiles.length > 1 ? `${firstFile.name} (+${currentFiles.length - 1} more)` : firstFile.name;
            document.querySelector('.preview-placeholder.pdf .file-name').textContent = firstFile.name;
            document.querySelector('.preview-placeholder.pdf .file-size').textContent = 
                firstFile.size > 0 ? `(${(firstFile.size / 1024 / 1024).toFixed(2)} MB)` : '(Remote PDF)';
            
            // Generate Word file name
            const wordFileName = firstFile.name.replace('.pdf', 
                document.getElementById('docxFormat').checked ? '.docx' : '.doc');
            
            document.querySelector('.preview-placeholder.word h4').textContent = 
                currentFiles.length > 1 ? `${wordFileName} (+${currentFiles.length - 1} more)` : wordFileName;
            document.querySelector('.preview-placeholder.word .file-name').textContent = wordFileName;
            document.querySelector('.preview-placeholder.word .file-size').textContent = 
                firstFile.size > 0 ? `(${(firstFile.size / 1024 / 1024 * 0.75).toFixed(2)} MB)` : '(Remote DOCX)';
            
            // Scroll to preview section
            previewSection.scrollIntoView({ behavior: 'smooth' });
            
            // Reset convert button
            convertBtn.innerHTML = '<i class="fas fa-exchange-alt me-1"></i> Convert to Word';
            convertBtn.disabled = false;
        }, 2000);
    });
    
    // Download button click
    downloadWordBtn.addEventListener('click', function() {
        if (currentFiles.length === 0) return;
        
        if (currentFiles.length === 1) {
            const wordFileName = currentFiles[0].name.replace('.pdf', 
                document.getElementById('docxFormat').checked ? '.docx' : '.doc');
            alert(`This would download ${wordFileName} in a real implementation`);
        } else {
            alert(`This would download ${currentFiles.length} converted Word files in a ZIP archive in a real implementation`);
        }
        
        // In a real implementation, you would:
        // 1. Get the converted files from your server
        // 2. Create download links or ZIP file
    });
    
    // Convert another button click
    convertAnotherBtn.addEventListener('click', function() {
        resetUploadInterface();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Helper function to set active option
    function setActiveOption(activeElement, inactiveElements) {
        activeElement.classList.add('active');
        inactiveElements.forEach(el => el.classList.remove('active'));
    }
});

// FAQ toggle function
function toggleFaq(header) {
    const content = header.nextElementSibling;
    const icon = header.querySelector('i');
    
    content.classList.toggle('show');
    icon.classList.toggle('fa-chevron-down');
    icon.classList.toggle('fa-chevron-up');
}
</script>
</body>
</html>