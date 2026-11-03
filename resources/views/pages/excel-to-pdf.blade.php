@extends('main')
{{-- @section('meta_canonical', 'http://127.0.0.1:8000/pdf-to-jpg') --}}
@section('title', __('excel-to-pdf.title'))
@section('description', __('excel-to-pdf.description'))


@push('head')
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

        .section {
            padding: 5rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--gray);
            margin-bottom: 3rem;
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

        .upload-area:hover,
        .upload-area.dragover {
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
            ;
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

        .card-body i {
            color: var(--primary);
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
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

        /* Timeline/Steps */
        .timeline {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            max-width: 800px;
            margin: 0 auto;
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

        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .step-text {
            color: var(--gray);
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

        /* Conversion Section */
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

        .result-section {
            background: var(--light);
            border-radius: var(--radius);
            padding: 1.875rem;
            margin-top: 1.875rem;
            display: none;
        }

        /* Preview Section */
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
            min-height: 300px;
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

        .preview-placeholder.word .preview-icon {
            color: #2b579a;
        }

        .preview-placeholder.pdf .preview-icon {
            color: #ff5252;
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

        /* Language Grid */
        .language-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 0.75rem;
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

        /* usecase */

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

        .faq-card {
            color: var(--primary);
        }

        /* Footer */
        footer {
            background-color: #4b4291;
            color: var(--white);
            padding: 5rem 0 2rem;
            margin-top: 5rem;
        }

        /* Responsive adjustments */
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

            .section {
                padding: 3rem 0;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.75rem;
            }

            .preview-actions {
                flex-direction: column;
            }

            .preview-btn {
                width: 100%;
                justify-content: center;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .section-subtitle {
                font-size: 1rem;
            }
        }

        .uploaded-files-info {
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 20px;
        }

        .files-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .files-icon {
            font-size: 2rem;
            color: #007bff;
        }

        .files-count {
            font-weight: bold;
            font-size: 1.1rem;
            color: #333;
        }

        .files-total-size {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .files-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .uploaded-file-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .uploaded-file-item:hover {
            border-color: #007bff;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.1);
        }

        .uploaded-file-item .file-icon {
            font-size: 1.5rem;
            color: #2e86ab;
            min-width: 24px;
        }

        .file-details {
            flex: 1;
        }

        .file-name {
            font-weight: 500;
            color: #333;
            margin-bottom: 2px;
            word-break: break-all;
        }

        .file-size {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .remove-file-btn {
            min-width: auto;
            width: 30px;
            height: 30px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-file-btn:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .uploading-state {
            text-align: center;
            padding: 30px;
        }

        .uploading-state .upload-icon {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        .conversion-summary {
            max-height: 400px;
            overflow-y: auto;
        }

        .conversion-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .original-file,
        .converted-file {
            text-align: center;
            flex: 1;
        }

        .original-file h6,
        .converted-file h6 {
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .original-file i {
            color: #2e86ab;
        }

        .converted-file i {
            color: #dc3545;
        }

        .file-actions {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .download-single-btn {
            font-size: 0.8rem;
            padding: 5px 10px;
            white-space: nowrap;
        }

        .url-input-container {
            margin-top: 20px;
            display: none;
        }

        .url-input-group {
            display: flex;
            align-items: center;
            background: white;
            border: 2px solid #dee2e6;
            border-radius: 25px;
            overflow: hidden;
            max-width: 400px;
            margin: 0 auto;
        }

        .url-input {
            flex: 1;
            border: none;
            padding: 12px 20px;
            outline: none;
            font-size: 0.9rem;
        }

        .url-input:focus {
            outline: none;
        }

        .url-close-btn,
        .url-submit-btn {
            background: none;
            border: none;
            padding: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .url-close-btn:hover {
            background-color: #f8f9fa;
            color: #dc3545;
        }

        .url-submit-btn:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .source-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            background: white;
        }

        .source-item:hover {
            border-color: #007bff;
            background-color: #f8f9ff;
            color: #007bff;
        }

        .source-item i {
            font-size: 1.2rem;
        }

        .dragover {
            border-color: #007bff !important;
            background-color: #f8f9ff !important;
        }

        .share-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .share-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .conversion-item {
                flex-direction: column;
                text-align: center;
            }

            .conversion-item .fas.fa-arrow-right {
                transform: rotate(90deg);
                margin: 10px 0;
            }

            .file-actions {
                margin-top: 15px;
                flex-direction: row;
                justify-content: center;
            }

            .files-header {
                flex-direction: column;
                text-align: center;
            }

            .uploaded-file-item {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
@endpush
@section('page')
    <!-- Hero Section -->

    <section class="hero-section">
        <div class="container text-center py-4">
            <h1 class="hero-title mb-3">EXCEL to PDF Converter</h1>
            <p class="lead mb-5">Convert Excel documents to PDF Files instantly - free, secure, and easy to use.</p>
        </div>

        <!-- Upload Section -->
        <form id="exceltopdf" action="{{ route('excel.pdf.convert') }}" method="post" enctype="multipart/form-data">
            @csrf

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('message', 'Operation completed successfully!') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="upload-section" id="upload">
                <div class="container">
                    <div class="upload-area" id="dropZone">
                        <div class="text-center" id="initialUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <h3 class="mb-2">Drop Your File Here!</h3>
                            <p class="text-muted mb-4">or select a file from your device</p>
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-primary btn-upload" id="uploadBtn">
                                    <svg style="width:16px;height:16px;margin-right:4px;" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                    </svg>
                                    Upload Excel File
                                </button>
                            </div>
                            <input type="file" id="fileInput" name="files[]"
                                accept=".xls,.xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                class="d-none" multiple>


                            <!-- URL Input Container -->
                            <div class="url-input-container" id="urlInputContainer">
                                <div class="url-input-group">
                                    <input type="text" class="url-input" id="urlInput"
                                        placeholder="Enter Document URL...">
                                    <button type="button" class="url-close-btn" id="urlCloseBtn">
                                        <svg style="width:16px;height:16px;" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="url-submit-btn" id="urlSubmitBtn">
                                        <svg style="width:16px;height:16px;" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                        </svg>
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
    <section class="conversion-section" id="conversionSection" style="display: none;">
        <div class="container">
            <div class="text-center mb-4">
                <h3><i class="fas fa-file-pdf me-2"></i> Conversion Options</h3>
                <p class="text-muted">Customize your PDF output settings</p>
            </div>

            <div class="conversion-options">
                <div class="option-group">
                    <div class="option-title">
                        <i class="fas fa-cog"></i>
                        <span>PDF Settings</span>
                    </div>

                    <div class="option-card active">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                            <label class="form-check-label" for="preserveFormatting">Preserve original formatting</label>
                        </div>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="optimizeForWeb">
                            <label class="form-check-label" for="optimizeForWeb">Optimize for web</label>
                        </div>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="passwordProtect">
                            <label class="form-check-label" for="passwordProtect">Password protect PDF</label>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-lg w-100 mt-3" id="convertBtn">
                    <i class="fas fa-exchange-alt me-1"></i> Convert to PDF
                </button>
            </div>

            <div class="result-section" id="resultSection" style="display: none;">
                <div class="result-header">
                    <h4><i class="fas fa-file-pdf me-2"></i> Conversion Result</h4>
                    <div class="d-flex gap-2">
                        {{-- <button type="button" class="btn btn-sm btn-outline-primary" id="previewPdfBtn">
    <i class="fas fa-eye me-1"></i> Preview PDF
</button> --}}
                        <button type="button" class="btn btn-sm btn-outline-primary" id="convertAnotherBtn">
                            <i class="fas fa-redo me-1"></i> Convert Another
                        </button>
                    </div>
                </div>

                <div class="result-content mt-3">
                    <!-- This will be populated by JavaScript -->
                </div>

                <!-- Share options -->
                <div class="share-options mt-4">
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-outline-primary share-btn" id="saveToDrive">
                            <i class="fab fa-google-drive"></i> Save to Drive
                        </button>
                        <button type="button" class="btn btn-outline-primary share-btn" id="saveToDropbox">
                            <i class="fab fa-dropbox"></i> Save to Dropbox
                        </button>
                        <button type="button" class="btn btn-outline-primary share-btn" id="shareOnWhatsApp">
                            <i class="fab fa-whatsapp"></i> Share on WhatsApp
                        </button>
                        {{-- <button type="button" class="btn btn-primary share-btn" id="directDownload">
                            <i class="fas fa-download"></i> Download Now
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const previewBtn = document.getElementById("previewPdfBtn");

        previewBtn.addEventListener("click", function() {
            if (convertedFileUrl) {
                window.open(convertedFileUrl, "_blank"); // open PDF in new tab
            } else {
                alert("No converted file available for preview.");
            }
        });
    </script>



    <!-- Preview Section -->
    {{-- <section class="preview-section" id="previewSection" style="display: none;">
        <div class="container">
            <div class="preview-header">
                <h3><i class="fas fa-eye me-2"></i> Conversion Preview</h3>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-expand-alt me-1"></i> Fullscreen
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="preview-header-bar">
                            <div>
                                <i class="fas fa-file-pdf me-2"></i> Original PDF Document
                            </div>
                        </div>

                        <div class="preview-content">
                            <div class="preview-placeholder word">
                                <i class="fas fa-file-pdf preview-icon"></i>
                                <h4>PDF Document Preview</h4>
                                <p class="mt-2">Your PDF content would appear here</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="preview-header-bar">
                            <div>
                                <i class="fas fa-file-pdf me-2"></i> converted JPG
                            </div>
                        </div>

                        <div class="preview-content">
                            <div class="preview-placeholder pdf">
                                <i class="fas fa-file-Image preview-icon"></i>
                                <h4>Image preview</h4>
                                <p class="mt-2">Your converted JPG content would appear here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="preview-actions">
                <button type="button" class="preview-btn download" id="downloadPdfBtn2">
                    <i class="fas fa-download me-1"></i> Download JPG File
                </button>
                <button type="button" class="preview-btn convert-another" id="convertAnotherBtn2">
                    <i class="fas fa-redo me-1"></i> Convert Another File
                </button>
            </div>
        </div>
    </section> --}}

    <!-- Related Tools Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">More Helpful Document Tools</h2>
                <p class="text-muted">Discover our full suite of document utilities</p>
            </div>

            <div class="row g-4 mx-auto justify-content-center">
                <div class="col-md-4 col-lg-2">
                    <a href="{{ route('pdf-to-word') }}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-pdf fa-2x mb-3"></i>
                            <h5 class="card-title">PDF to word</h5>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-md-4 col-lg-2">
                    <a href="{{route('convert.pdf-to-jpg')}}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-pdf fa-2x mb-3"></i>
                            <h5 class="card-title">PDF to JPG</h5>
                        </div>
                    </a>
                </div> --}}
                <div class="col-md-4 col-lg-2">
                    <a href="{{ route('jpg-to-pdf') }}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-image fa-2x mb-3"></i>
                            <h5 class="card-title">JPG to PDF</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2">
                    <a href="{{ route('merge-pdf') }}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-object-group fa-2x mb-3"></i>
                            <h5 class="card-title">Merge PDF</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2">
                    <a href="#" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-compress fa-2x mb-3"></i>
                            <h5 class="card-title">Compress PDF</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2">
                    <a href="{{ route('pdf-summarize') }}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-scroll fa-2x mb-3"></i>
                            <h5 class="card-title">Summarize PDF</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section bg-light">
        <div class="container p-4">
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
                    <p class="feature-text">Preserves fonts, tables, images, and layout from your original PDF with
                        industry-leading accuracy.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Lightning Fast</h3>
                    <p class="feature-text">Convert documents in seconds with our optimized cloud-based processing engine.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="feature-title">Secure Processing</h3>
                    <p class="feature-text">Military-grade encryption with automatic file deletion after conversion for
                        your privacy.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="feature-title">OCR Technology</h3>
                    <p class="feature-text">Convert scanned PDFs into editable PDF documents with advanced text
                        recognition.</p>
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
        <div class="container p-3">
            <div class="text-center mb-5">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">Convert to Excel to PDF in just 3 simple steps</p>
            </div>

            <div class="timeline">
                <div class="step-card left">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Upload Your Excel</h3>
                    <p class="step-text">Drag and drop your Excel File or click to browse your device. You can also import
                        from cloud storage or paste a URL.</p>
                </div>

                <div class="step-card right">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Customize Conversion</h3>
                    <p class="step-text">Choose your output format (PDF or DOC) and adjust settings like OCR for scanned
                        documents.</p>
                </div>

                <div class="step-card left">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Download Your PDF files?</h3>
                    <p class="step-text">Your converted document will be ready in seconds. Download it directly to your
                        device.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- usecase -->

    <section class="use-cases-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Why Convert to JPG to PDF files??</h2>
                <p class="text-muted">When you need to edit or repurpose PDF content</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h3>Easy to Edit and Format</h3>
                        <p class="text-muted">Convert research papers or theses to PDF for further editing or collaboration
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Academic Work</h3>
                        <p class="text-muted">Convert research papers or theses to PDF for further editing or collaboration
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Business Reports</h3>
                        <p class="text-muted">Update annual reports or business plans while maintaining original formatting
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>Books & Manuals</h3>
                        <p class="text-muted">Convert eBooks or manuals to PDF for translation or republication</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3>Forms & Applications</h3>
                        <p class="text-muted">Make fillable PDF forms editable in PDF for easier completion</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="use-case-card">
                        <div class="use-case-icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <h3>Archived Documents</h3>
                        <p class="text-muted">Revive old scanned documents by converting them to editable PDF files?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Everything you need to know about PDF to JPG conversion</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3 border-0 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    How accurate is the PDF to JPG conversion?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our converter provides near-perfect accuracy in preserving fonts, formatting, tables,
                                    and layout from your original PDF document. Complex elements like headers, footers, and
                                    page numbers are maintained with high fidelity.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    What PDF formats can I convert?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We support both modern PDF files and legacy DOC format. You can also convert RTF and TXT
                                    files to PDF with our tool.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    Is there a file size limit?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our free service supports files up to 50MB. For larger files or batch processing,
                                    consider our premium plans which support files up to 500MB.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4">
                                    How secure is my document?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Your security is our top priority. All files are encrypted during transfer and
                                    automatically deleted from our servers within 1 hour of processing. We never store or
                                    access your documents after conversion.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5">
                                    Can I convert password-protected PDF files??
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    For security reasons, we cannot convert password-protected PDF documents. Please remove
                                    the password protection before uploading your file for conversion.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <script>
        document.getElementById("uploadBtn").addEventListener("click", function() {
            document.getElementById("fileInput").click();
        });
    </script> --}}

    <script>
        // Pass server-side data to JavaScript
        @if (session('convertedFiles'))
            window.convertedFilesData = @json(session('convertedFiles'));
        @endif

        // Set CSRF token for all AJAX requests
        document.addEventListener('DOMContentLoaded', function() {
            // Set up CSRF token for all AJAX requests
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Add CSRF token to all fetch requests
            const originalFetch = window.fetch;
            window.fetch = function(url, options = {}) {
                if (options.method && options.method.toUpperCase() !== 'GET') {
                    options.headers = {
                        ...options.headers,
                        'X-CSRF-TOKEN': csrfToken
                    };
                }
                return originalFetch.call(this, url, options);
            };

            // Get DOM elements
            const fileInput = document.getElementById('fileInput');
            const uploadBtn = document.getElementById('uploadBtn');
            const dropZone = document.getElementById('dropZone');
            const urlSourceBtn = document.getElementById('urlSourceBtn');
            const initialUpload = document.getElementById('initialUpload');
            const conversionSection = document.getElementById('conversionSection');
            const convertBtn = document.getElementById('convertBtn');
            const resultSection = document.getElementById('resultSection');
            const previewSection = document.getElementById('previewSection');
            const previewPdfBtn = document.getElementById('previewPdfBtn');
            const urlSubmitBtn = document.getElementById('urlSubmitBtn');
            const urlCloseBtn = document.getElementById('urlCloseBtn');
            const convertAnotherBtn = document.getElementById('convertAnotherBtn');
            const convertAnotherBtn2 = document.getElementById('convertAnotherBtn2');
            const urlInputContainer = document.getElementById('urlInputContainer');
            const urlInput = document.getElementById('urlInput');
            const exceltopdf = document.getElementById('exceltopdf');

            let currentFile = null;
            let convertedFiles = [];

            // Handle click on upload button
            if (uploadBtn) {
                uploadBtn.addEventListener('click', function() {
                    fileInput.click();
                });
            }

            // Handle file selection
            if (fileInput) {
                fileInput.addEventListener('change', function(e) {
                    if (e.target.files.length > 0) {
                        handleFileUpload(e.target.files[0]);
                    }
                });
            }

            // URL input functionality
            function showUrlInput() {
                if (initialUpload) {
                    const h3 = initialUpload.querySelector('h3');
                    const p = initialUpload.querySelector('p');
                    if (h3) h3.textContent = 'Enter Document URL';
                    if (p) p.textContent = 'Paste the URL of the PDF document you want to convert';
                    if (urlInputContainer) urlInputContainer.style.display = 'block';
                }
            }

            if (urlSourceBtn) {
                urlSourceBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    showUrlInput();
                });
            }

            if (urlCloseBtn) {
                urlCloseBtn.addEventListener('click', function() {
                    if (urlInputContainer) urlInputContainer.style.display = 'none';
                    if (urlInput) urlInput.value = '';
                    resetToInitialState();
                });
            }

            if (urlSubmitBtn) {
                urlSubmitBtn.addEventListener('click', function() {
                    const url = urlInput ? urlInput.value.trim() : '';
                    if (url) {
                        handleUrlUpload(url);
                    } else {
                        alert('Please enter a valid URL');
                    }
                });
            }

            // Handle drag and drop
            if (dropZone) {
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('dragover');
                });

                dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('dragover');
                });

                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('dragover');

                    if (e.dataTransfer.files.length > 0) {
                        handleFileUpload(e.dataTransfer.files[0]);
                    }
                });
            }

            // Handle file upload
            function handleFileUpload(file) {
                const validTypes = [
                    'application/vnd.ms-excel', // .xls
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' // .xlsx
                ];
                const validExtensions = ['.xls', '.xlsx'];
                const fileExt = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();

                if (validTypes.includes(file.type) || validExtensions.includes(fileExt)) {
                    currentFile = file;
                    showUploadedFileInfo(file);
                } else {
                    alert('Please upload an Excel document (.xls or .xlsx)');
                    if (fileInput) fileInput.value = '';
                }
            }


            // Handle URL upload
            function handleUrlUpload(url) {
                try {
                    new URL(url);
                    if (urlInput) urlInput.disabled = true;
                    if (urlSubmitBtn) urlSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                    // Make request to convert from URL
                    fetch('{{ route('convert.from.url') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                url: url
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                convertedFiles = data.convertedFiles;
                                showUrlFileInfo(url);
                                showConversionResult(data);
                            } else {
                                throw new Error(data.message || 'URL conversion failed');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('URL conversion failed: ' + error.message);
                        })
                        .finally(() => {
                            if (urlInput) urlInput.disabled = false;
                            if (urlSubmitBtn) {
                                urlSubmitBtn.innerHTML = `
                        <svg style="width:16px;height:16px;" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                        </svg>
                    `;
                            }
                            if (urlInputContainer) urlInputContainer.style.display = 'none';
                        });
                } catch (e) {
                    alert('Please enter a valid URL');
                }
            }

            // Show uploaded file info
            function showUploadedFileInfo(file) {
                if (initialUpload) {
                    initialUpload.innerHTML = `
                <div class="uploaded-file-info">
                    <i class="fas fa-file-PDF files?-icon"></i>
                    <div class="file-name">${file.name}</div>
                    <div class="file-size">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                    <button type="button" class="btn btn-outline-primary mt-2" id="changeFileBtn">
                        <i class="fas fa-exchange-alt me-1"></i> Change File
                    </button>
                </div>
            `;
                }

                if (conversionSection) conversionSection.style.display = 'block';

                const changeFileBtn = document.getElementById('changeFileBtn');
                if (changeFileBtn) {
                    changeFileBtn.addEventListener('click', resetUploadForm);
                }
            }

            // Show URL file info
            function showUrlFileInfo(url) {
                const fileName = url.split('/').pop() || 'document.docx';
                if (initialUpload) {
                    initialUpload.innerHTML = `
                <div class="uploaded-file-info">
                    <i class="fas fa-link file-icon"></i>
                    <div class="file-name">${fileName}</div>
                    <div class="file-url text-muted small">${url}</div>
                    <button type="button" class="btn btn-outline-primary mt-2" id="changeFileBtn">
                        <i class="fas fa-exchange-alt me-1"></i> Change Source
                    </button>
                </div>
            `;
                }

                if (conversionSection) conversionSection.style.display = 'block';

                const changeFileBtn = document.getElementById('changeFileBtn');
                if (changeFileBtn) {
                    changeFileBtn.addEventListener('click', resetUploadForm);
                }
            }

            // Reset to initial state
            function resetToInitialState() {
                if (initialUpload) {
                    initialUpload.innerHTML = `
                <i class="fas fa-cloud-upload-alt upload-icon"></i>
                <h3 class="mb-2">Drop Your File Here!</h3>
                <p class="text-muted mb-4">or select a file from your device</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-primary btn-upload" id="uploadBtn">
                        <svg style="width:16px;height:16px;margin-right:4px;" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                        </svg>
                        Upload PDF File
                    </button>
                </div>
                <div class="url-input-container" id="urlInputContainer">
                    <div class="url-input-group">
                        <input type="text" class="url-input" id="urlInput" placeholder="Enter Document URL...">
                        <button type="button" class="url-close-btn" id="urlCloseBtn">
                            <svg style="width:16px;height:16px;" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                            </svg>
                        </button>
                        <button type="button" class="url-submit-btn" id="urlSubmitBtn">
                            <svg style="width:16px;height:16px;" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
                }

                reattachEventListeners();
            }

            // Reattach event listeners after DOM changes
            function reattachEventListeners() {
                const newUploadBtn = document.getElementById('uploadBtn');
                const newUrlSourceBtn = document.getElementById('urlSourceBtn');
                const newUrlCloseBtn = document.getElementById('urlCloseBtn');
                const newUrlSubmitBtn = document.getElementById('urlSubmitBtn');
                const newUrlInput = document.getElementById('urlInput');
                const newUrlInputContainer = document.getElementById('urlInputContainer');

                if (newUploadBtn) {
                    newUploadBtn.addEventListener('click', function() {
                        fileInput.click();
                    });
                }

                if (newUrlSourceBtn) {
                    newUrlSourceBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        showUrlInput();
                    });
                }

                if (newUrlCloseBtn) {
                    newUrlCloseBtn.addEventListener('click', function() {
                        if (newUrlInputContainer) newUrlInputContainer.style.display = 'none';
                        if (newUrlInput) newUrlInput.value = '';
                        resetToInitialState();
                    });
                }

                if (newUrlSubmitBtn) {
                    newUrlSubmitBtn.addEventListener('click', function() {
                        const url = newUrlInput ? newUrlInput.value.trim() : '';
                        if (url) {
                            handleUrlUpload(url);
                        } else {
                            alert('Please enter a valid URL');
                        }
                    });
                }
            }

            // Reset upload form
            function resetUploadForm() {
                currentFile = null;
                convertedFiles = [];
                if (fileInput) fileInput.value = '';
                if (conversionSection) conversionSection.style.display = 'none';
                if (resultSection) resultSection.style.display = 'none';
                if (previewSection) previewSection.style.display = 'none';
                resetToInitialState();

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            // Convert button click - Handle form submission via AJAX
            if (convertBtn) {
                convertBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (!currentFile) {
                        alert('Please select a file first');
                        return;
                    }

                    convertBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Converting...';
                    convertBtn.disabled = true;

                    const formData = new FormData();
                    formData.append('files[]', currentFile);
                    formData.append('_token', csrfToken);

                    // Add conversion options
                    const preserveFormatting = document.getElementById('preserveFormatting');
                    const optimizeForWeb = document.getElementById('optimizeForWeb');
                    const passwordProtect = document.getElementById('passwordProtect');

                    if (preserveFormatting) formData.append('preserveFormatting', preserveFormatting
                        .checked);
                    if (optimizeForWeb) formData.append('optimizeForWeb', optimizeForWeb.checked);
                    if (passwordProtect) formData.append('passwordProtect', passwordProtect.checked);

                    fetch(exceltopdf.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                convertedFiles = data.convertedFiles;
                                showConversionResult(data);
                            } else {
                                throw new Error(data.message || 'Conversion failed');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Conversion failed: ' + error.message);
                        })
                        .finally(() => {
                            convertBtn.innerHTML =
                                '<i class="fas fa-exchange-alt me-1"></i> Convert to PDF';
                            convertBtn.disabled = false;
                        });
                });
            }

            // Show conversion result
            function showConversionResult(data) {
                const resultContent = document.querySelector('#resultSection .result-content');
                if (resultContent && data.convertedFiles.length > 0) {
                    const firstFile = data.convertedFiles[0];
                    const originalFileName = currentFile ? currentFile.name : (firstFile.originalFileName ||
                        'excel.xlsx');
                    const fileSize = currentFile ? (currentFile.size / 1024 / 1024).toFixed(2) : 'Unknown';
                    const pdfFileName = originalFileName.replace(/\.(xls|xlsx)$/i, '.pdf');

                    resultContent.innerHTML = `
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i> Your Excel document has been successfully converted to PDF!
            </div>
            <div class="d-flex align-items-center justify-content-between mt-3">
                <div>
                    <h6>Original Excel</h6>
                    <p class="text-muted mb-0">${originalFileName} ${currentFile ? `(${fileSize} MB)` : ''}</p>
                </div>
                <i class="fas fa-arrow-right text-muted mx-3"></i>
                <div>
                    <h6>Converted PDF</h6>
                    <p class="text-muted mb-0">${pdfFileName}</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('download.pdf') }}?url=${encodeURIComponent(firstFile.convertedFile)}&filename=${encodeURIComponent(pdfFileName)}"
                   class="btn btn-success btn-sm">
                   <i class="fas fa-download me-1"></i> Download PDF
                </a>
                <a href="${firstFile.convertedFile}" target="_blank" class="btn btn-outline-primary btn-sm ms-2">
                   <i class="fas fa-eye me-1"></i> Preview PDF
                </a>
            </div>
            `;
                }

                if (resultSection) resultSection.style.display = 'block';
                if (previewSection) previewSection.style.display = 'block';

                if (previewSection) {
                    previewSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }

            // // Download JPG buttons
            // if (previewPdfBtn) {
            //     previewPdfBtn.addEventListener('click', function() {
            //         if (convertedFiles.length > 0) {
            //             window.open(convertedFiles[0].convertedFiles, '_blank');
            //         } else {
            //             alert('No converted file available');
            //         }
            //     });
            // }

            // if (downloadPdfBtn2) {
            //     downloadPdfBtn2.addEventListener('click', function() {
            //         if (convertedFiles.length > 0) {
            //             window.open(convertedFiles[0].convertedFilePath, '_blank');
            //         } else {
            //             alert('No converted file available');
            //         }
            //     });
            // }

            // Convert another buttons
            if (convertAnotherBtn) {
                convertAnotherBtn.addEventListener('click', function() {
                    resetUploadForm();
                });
            }

            // if (convertAnotherBtn2) {
            //     convertAnotherBtn2.addEventListener('click', function() {
            //         resetUploadForm();
            //     });
            // }

            // Cloud storage and sharing functionality
            document.addEventListener('click', function(e) {
                if (e.target.matches('#saveToDrive') || e.target.closest('#saveToDrive')) {
                    if (convertedFiles.length > 0) {
                        // Send request to save to Google Drive
                        fetch('{{ route('save.to.drive') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify({
                                    file_url: convertedFiles[0].convertedFilePath,
                                    filename: convertedFiles[0].convertedFileName
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('File saved to Google Drive successfully!');
                                } else {
                                    alert('Failed to save to Google Drive: ' + data.message);
                                }
                            })
                            .catch(error => {
                                alert('Error saving to Google Drive');
                            });
                    }
                }

                if (e.target.matches('#saveToDropbox') || e.target.closest('#saveToDropbox')) {
                    if (convertedFiles.length > 0) {
                        // Send request to save to Dropbox
                        fetch('{{ route('save.to.dropbox') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify({
                                    file_url: convertedFiles[0].convertedFilePath,
                                    filename: convertedFiles[0].convertedFileName
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('File saved to Dropbox successfully!');
                                } else {
                                    alert('Failed to save to Dropbox: ' + data.message);
                                }
                            })
                            .catch(error => {
                                alert('Error saving to Dropbox');
                            });
                    }
                }

                if (e.target.matches('#shareOnWhatsApp') || e.target.closest('#shareOnWhatsApp')) {
                    if (convertedFiles.length > 0) {
                        const message = "Check out this PDF I converted: ";
                        const url = convertedFiles[0].convertedFilePath;
                        window.open(`https://wa.me/?text=${encodeURIComponent(message + url)}`);
                    }
                }

                if (e.target.matches('#directDownload') || e.target.closest('#directDownload')) {
                    if (convertedFiles.length > 0) {
                        window.open(convertedFiles[0].convertedFilePath, '_blank');
                    }
                }
            });

            // Handle server-side converted files (if redirected back with data)
            if (window.convertedFilesData) {
                convertedFiles = window.convertedFilesData;
                showConversionResult({
                    success: true,
                    convertedFiles: convertedFiles
                });
            }

            // Auto-dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                if (alert.classList.contains('alert-success')) {
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 5000);
                }
            });

            // Handle Google Drive and Dropbox buttons (placeholder)
            const googleDriveBtn = document.getElementById('googleDriveBtn');
            const dropboxBtn = document.getElementById('dropboxBtn');

            if (googleDriveBtn) {
                googleDriveBtn.addEventListener('click', function() {
                    alert('Google Drive integration would be implemented here');
                });
            }

            if (dropboxBtn) {
                dropboxBtn.addEventListener('click', function() {
                    alert('Dropbox integration would be implemented here');
                });
            }
        });
        // Success response handle karne ke liye
        // Success response handle karne ke liye
        function handleConversionSuccess(response) {
            const resultContainer = document.getElementById('conversion-results');
            resultContainer.innerHTML = '';

            response.convertedFiles.forEach((fileData, fileIndex) => {
                const fileDiv = document.createElement('div');
                fileDiv.className = 'conversion-result mb-3 p-3 border rounded bg-light';

                // Download ZIP button
                const downloadButton = `
            <a href="/download-converted-file?url=${encodeURIComponent(fileData.convertedFiles)}&filename=${encodeURIComponent(fileData.convertedFileName || 'converted.zip')}"
               class="btn btn-success btn-sm">
               <i class="fas fa-download me-1"></i> Download ZIP (${fileData.pageCount} page${fileData.pageCount > 1 ? 's' : ''})
            </a>
        `;

                // Preview button (only if preview URL available)
                let previewButton = '';
                if (fileData.previewUrl) {
                    previewButton = `
                <button type="button" class="btn btn-sm btn-outline-primary ms-2" onclick="previewJpg('${fileData.previewUrl}', '${fileData.originalFileName}', ${JSON.stringify(fileData.allImageUrls || [])})">
                    <i class="fas fa-eye me-1"></i> Preview JPG${fileData.pageCount > 1 ? 's' : ''}
                </button>
            `;
                }

                const statusInfo =
                    `<small class="text-muted"><i class="fas fa-file-archive me-1"></i>All pages converted and packaged in ZIP file</small>`;

                fileDiv.innerHTML = `
            <h6 class="text-success mb-2">
                <i class="fas fa-check-circle me-1"></i>
                ${fileData.originalFileName} - Converted Successfully
            </h6>
            <div class="mb-2">${statusInfo}</div>
            <div class="download-buttons d-flex gap-2">
                ${downloadButton}
                ${previewButton}
            </div>
        `;

                resultContainer.appendChild(fileDiv);
            });
        }

        // Preview function
        function previewJpg(previewUrl, originalFileName, allImageUrls = []) {
            if (!previewUrl) {
                alert('No preview available for this file');
                return;
            }

            // If multiple images, show gallery
            if (allImageUrls.length > 1) {
                showImageGallery(allImageUrls, originalFileName);
            } else {
                // Single image preview
                const previewWindow = window.open('', '_blank');
                previewWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Preview: ${originalFileName}</title>
                <style>
                    body { margin: 0; padding: 20px; background: #f5f5f5; text-align: center; }
                    img { max-width: 100%; height: auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
                    .title { margin-bottom: 20px; color: #333; }
                </style>
            </head>
            <body>
                <h3 class="title">Preview: ${originalFileName}</h3>
                <img src="${previewUrl}" alt="Preview" onload="document.title = 'Preview: ${originalFileName} - Loaded'" onerror="document.body.innerHTML='<h3>Failed to load preview</h3>'">
            </body>
            </html>
        `);
            }
        }

        // Gallery function for multiple pages
        function showImageGallery(imageUrls, originalFileName) {
            const galleryWindow = window.open('', '_blank');

            let galleryHtml = `
        <!DOCTYPE html>
        <html>
        <head>
            <title>Gallery: ${originalFileName}</title>
            <style>
                body { margin: 0; padding: 20px; background: #f5f5f5; font-family: Arial, sans-serif; }
                .title { text-align: center; margin-bottom: 20px; color: #333; }
                .gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
                .page { text-align: center; background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
                .page img { max-width: 100%; height: auto; border: 1px solid #ddd; }
                .page-title { margin-bottom: 10px; font-weight: bold; color: #555; }
            </style>
        </head>
        <body>
            <h2 class="title">Gallery: ${originalFileName} (${imageUrls.length} pages)</h2>
            <div class="gallery">
    `;

            imageUrls.forEach((url, index) => {
                galleryHtml += `
            <div class="page">
                <div class="page-title">Page ${index + 1}</div>
                <img src="${url}" alt="Page ${index + 1}" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjE1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkZhaWxlZCB0byBsb2FkPC90ZXh0Pjwvc3ZnPg=='">
            </div>
        `;
            });

            galleryHtml += `
            </div>
        </body>
        </html>
    `;

            galleryWindow.document.write(galleryHtml);
        }

        // AJAX form submission
        document.getElementById('pdf-conversion-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = document.getElementById('convert-button');
            const originalButtonText = submitButton.innerHTML;

            // Show loading state
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Converting...';
            submitButton.disabled = true;

            fetch('/convert/pdf-to-jpg', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('API Response:', data); // Debug log

                    if (data.success) {
                        handleConversionSuccess(data);
                        showAlert(data.message, 'success');
                    } else {
                        showAlert(data.message || 'Conversion failed', 'error');
                        console.error('Conversion failed:', data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred during conversion', 'error');
                })
                .finally(() => {
                    // Reset button
                    submitButton.innerHTML = originalButtonText;
                    submitButton.disabled = false;
                });
        });

        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
            alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-1"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

            const container = document.querySelector('.container');
            container.insertBefore(alertDiv, container.firstChild);

            // Auto remove after 5 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        // File input change handler
        document.getElementById('pdf-files').addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            if (files.length > 0) {
                const fileList = files.map(file => `${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`)
                    .join(', ');
                console.log('Selected files:', fileList);
            }
        });
    </script>


@endsection
