@extends('main')
{{-- @section('meta_canonical', 'http://127.0.0.1:8000/pdf-to-word') --}}
@section('title', __('Merge-to-PDF.title'))
@section('description', __('Merge-to-PDF.description'))

@push('head')
<style>
      :root {
        --primary: #7e6ef6;
        --primary-dark: #5a4bc2;
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
        font-family: "Inter", "Segoe UI", sans-serif;
        padding-bottom: 2rem;
      }

      .hero-section {
        background: linear-gradient(
          135deg,
          rgba(126, 110, 246, 0.05) 0%,
          rgba(109, 93, 252, 0.02) 100%
        );
        padding: 1rem 0 2rem;
        position: relative;
        overflow: hidden;
      }

      .hero-section::before {
        content: "";
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: linear-gradient(
          135deg,
          var(--primary-light) 0%,
          rgba(109, 93, 252, 0.05) 100%
        );
        z-index: -1;
      }

      .hero-section::after {
        content: "";
        position: absolute;
        bottom: -150px;
        left: -100px;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: linear-gradient(
          135deg,
          rgba(109, 93, 252, 0.05) 0%,
          var(--primary-light) 100%
        );
        z-index: -1;
      }

      .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(
          135deg,
          var(--dark) 0%,
          var(--primary-dark) 100%
        );
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
      }
      .language-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 0.75rem;
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
        width: 56px;
        height: 56px;
        margin-bottom: 1.5rem;
        color: var(--primary);
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

      .feature-card {
        background-color: var(--white);
        border-radius: var(--radius);
        padding: 2rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
        text-align: center;
        height: 100%;
      }

      .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
      }

      .feature-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 1.5rem;
        color: var(--primary);
      }

      .featured-icon {
        width: 60px;
        height: 60px;
        background-color: rgba(126, 110, 245, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
      }

      .section-title {
        position: relative;
        margin-bottom: 40px;
        font-weight: 600;
      }

      .section-title:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 50px;
        height: 3px;
        background-color: var(--primary);
      }

      .text-primary {
        color: #7e6ef6 !important;
      }

      .workflow-section {
        background-color: #f9f9ff;
      }

      .workflow-steps {
        display: flex;
        justify-content: space-between;
        position: relative;
        max-width: 900px;
        margin: 0 auto;
      }

      .step-card {
        position: relative;
        width: 22%;
        text-align: center;
        z-index: 1;
      }

      .step-number {
        width: 40px;
        height: 40px;
        background-color: #7e6ef5;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin: 0 auto 15px;
        font-size: 1.2rem;
      }

      .step-icon {
        width: 60px;
        height: 60px;
        background-color: rgba(126, 110, 245, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        color: #7e6ef5;
        font-size: 1.5rem;
      }

      .step-title {
        font-size: 1.1rem;
        margin-bottom: 10px;
        color: #2e2e48;
      }

      .step-description {
        color: #6c757d;
        font-size: 0.9rem;
      }

      .step-connector {
        position: absolute;
        top: 20px;
        left: 80%;
        width: 60%;
        height: 2px;
        background-color: rgba(126, 110, 245, 0.3);
        z-index: -1;
      }

      .productivity-section {
        background: linear-gradient(to bottom, #ffffff 0%, #f9f9ff 100%);
      }

      .productivity-visual {
        position: relative;
        min-height: 300px;
      }

      .time-saved-card {
        position: absolute;
        top: 20px;
        right: 0;
        background: #7e6ef5;
        color: white;
        padding: 20px;
        border-radius: 12px;
        width: 180px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(126, 110, 245, 0.3);
        z-index: 2;
      }

      .time-saved-card i {
        font-size: 2rem;
        margin-bottom: 10px;
      }

      .document-stack {
        position: absolute;
        bottom: 0;
        left: 50px;
      }

      .document-page {
        width: 200px;
        height: 280px;
        background: white;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transform: rotate(var(--rotation));
        font-size: 3rem;
        color: #7e6ef5;
      }

      .document-page:nth-child(1) {
        z-index: 3;
        bottom: calc(var(--order) * 20px);
      }
      .document-page:nth-child(2) {
        z-index: 2;
        bottom: calc(var(--order) * 20px);
      }
      .document-page:nth-child(3) {
        z-index: 1;
        bottom: calc(var(--order) * 20px);
      }

      .productivity-feature {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
      }

      .feature-number {
        font-size: 2rem;
        font-weight: bold;
        color: rgba(126, 110, 245, 0.2);
        line-height: 1;
      }

      footer {
        background-color: #4b4291;
        color: var(--white);
        padding: 5rem 0 2rem;
        margin-top: 5rem;
      }

      /* Merge Options Styles */
      .merge-options-section {
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

      .option-title svg {
        width: 20px;
        height: 20px;
        color: var(--primary);
      }

      .compression-levels {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.625rem;
        margin-top: 0.625rem;
      }

      .level-option {
        background: var(--white);
        border: 2px solid var(--light-gray);
        border-radius: 10px;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
      }

      .level-option.active {
        border-color: var(--primary);
        background-color: var(--primary-light);
      }

      .level-option .level-name {
        font-weight: 600;
        margin-bottom: 0.5rem;
      }

      .level-option .level-desc {
        font-size: 0.875rem;
        color: var(--gray);
      }

      .merge-btn {
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

      .merge-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
      }

      .result-section {
        background: var(--light);
        border-radius: var(--radius);
        padding: 1.875rem 0;
        margin: 1.875rem auto 0;
        width: 90%;
        max-width: 900px;
        display: none;
      }

      .result-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.25rem;
      }

      .result-content {
        background: white;
        border-radius: 12px;
        padding: 1.25rem;
        width: 100%;
      }

      .compression-stats {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin: 1.5rem 0;
      }

      .stat-item {
        text-align: center;
      }

      .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
      }

      .stat-label {
        font-size: 0.875rem;
        color: var(--gray);
      }

      .download-btn {
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 0.75rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.625rem;
        margin: 1.5rem auto 0;
        transition: all 0.3s ease;
        text-decoration: none;
      }

      .download-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        color: white;
      }

      .preview-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 1.5rem;
        width: 100%;
      }

      .preview-title {
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .preview-iframe {
        width: 100%;
        height: 400px;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }

      .preview-btn {
        background: var(--white);
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin: 1rem auto 0;
        transition: all 0.3s ease;
      }

      .preview-btn:hover {
        background: var(--primary);
        color: white;
      }

      .preview-modal .modal-dialog {
        max-width: 800px;
      }

      .preview-modal .modal-body {
        padding: 0;
        height: 70vh;
      }

      .preview-modal iframe {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 0 0 0.5rem 0.5rem;
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

      /* Enhanced Preview Controls */
      .preview-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-top: 15px;
        background: var(--light);
        padding: 10px;
        border-radius: 50px;
        width: 100%;
        max-width: 400px;
      }

      .preview-control-btn {
        background: var(--white);
        border: 1px solid var(--primary);
        color: var(--primary);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s ease;
      }

      .preview-control-btn:hover {
        background: var(--primary);
        color: white;
      }

      .preview-page-info {
        font-weight: 600;
        color: var(--dark);
        min-width: 100px;
        text-align: center;
      }

      .zoom-controls {
        display: flex;
        gap: 10px;
        margin-top: 10px;
      }

      .zoom-btn {
        padding: 6px 12px;
        background: white;
        border: 1px solid var(--primary);
        color: var(--primary);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.2s ease;
      }

      .zoom-btn:hover {
        background: var(--primary);
        color: white;
      }

      .preview-loading {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 400px;
        flex-direction: column;
      }

      .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid var(--primary-light);
        border-top: 5px solid var(--primary);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-bottom: 15px;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

      /* File List Styles */
      .file-list {
        max-height: 300px;
        overflow-y: auto;
        padding: 1rem;
        border: 1px solid var(--light-gray);
        border-radius: var(--radius);
        background: var(--light);
      }

      .file-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
        margin-bottom: 0.75rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
      }

      .file-icon {
        width: 36px;
        height: 36px;
        margin-right: 1rem;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .file-info {
        flex-grow: 1;
      }

      .file-name {
        font-weight: 600;
        margin-bottom: 0.25rem;
      }

      .file-size {
        font-size: 0.875rem;
        color: var(--gray);
      }

      .file-actions {
        display: flex;
        gap: 0.5rem;
      }

      .action-btn {
        background: none;
        border: none;
        color: var(--gray);
        cursor: pointer;
        transition: color 0.3s;
        padding: 0.25rem;
        border-radius: 4px;
      }

      .action-btn:hover {
        color: var(--primary);
        background: var(--primary-light);
      }

      .merge-status {
        display: none;
        text-align: center;
        margin-top: 1.5rem;
        padding: 1rem;
        background: var(--primary-light);
        border-radius: 8px;
      }

      .progress-container {
        height: 8px;
        background: var(--light-gray);
        border-radius: 4px;
        overflow: hidden;
        margin: 1rem 0;
      }

      .progress-bar {
        height: 100%;
        background: var(--primary);
        width: 0;
        transition: width 0.5s ease;
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

      /* Responsive improvements */
      @media (max-width: 992px) {
        .workflow-steps {
          flex-wrap: wrap;
          justify-content: center;
        }
        
        .step-card {
          width: 45%;
          margin-bottom: 30px;
        }
        
        .step-connector {
          display: none;
        }
        
        .productivity-visual {
          min-height: 250px;
          margin-bottom: 30px;
        }
        
        .time-saved-card {
          top: 0;
          right: auto;
          left: 50%;
          transform: translateX(-50%);
        }
        
        .document-stack {
          left: 50%;
          transform: translateX(-50%);
        }
      }

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

        .feature-card,
        .step-card {
          padding: 1.5rem;
        }

        .compression-levels {
          grid-template-columns: 1fr;
        }

        .preview-controls {
          flex-wrap: wrap;
          border-radius: 12px;
        }
        
        .productivity-feature {
          flex-direction: column;
          gap: 10px;
        }
        
        .feature-number {
          font-size: 1.5rem;
        }
        
        .result-header {
          flex-direction: column;
          gap: 15px;
          text-align: center;
        }
        
        .compression-stats {
          flex-direction: column;
          gap: 1rem;
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

        .col-md-4,
        .col-md-6,
        .col-lg-3,
        .col-lg-4 {
          margin-bottom: 1.25rem;
        }

        footer {
          padding: 3rem 0 1.25rem;
        }

        .merge-options-section {
          padding: 1.5rem;
          width: 95%;
        }
        
        .step-card {
          width: 100%;
        }
        
        .language-grid {
          grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        }
        
        .document-page {
          width: 150px;
          height: 210px;
        }
        
        .time-saved-card {
          width: 150px;
          padding: 15px;
        }
      }
      .card-body i {
            color: var(--primary);
        }
    </style>

@endpush
@section('page')
<!-- Hero Section -->
    <section class="hero-section">
      <div class="container text-center py-4">
        <h1 class="hero-title mb-3">Merge PDF Files Online Free</h1>
        <p class="lead mb-5">
          Secure, reliable, and completely free PDF tools. Combine files while
          maintaining quality.
        </p>
      </div>

      <!-- Upload Section -->
      <div class="upload-section" id="upload">
        <div class="container">
          <div class="upload-area" id="dropZone">
            <div class="text-center" id="initialUpload">
              <svg class="upload-icon" viewBox="0 0 24 24">
                <path
                  fill="currentColor"
                  d="M19.35,10.04C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.04C2.34,8.36 0,10.91 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.04M14,13V17H10V13H7L12,8L17,13H14Z"
                />
              </svg>
              <h3 class="mb-2">Drop Your Files Here!</h3>
              <p class="text-muted mb-4">or select files from your device</p>
              <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary btn-upload" id="uploadBtn">
                  <svg
                    style="width: 16px; height: 16px; margin-right: 4px"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"
                    />
                  </svg>
                  Upload PDFs
                </button>
              </div>
              <input
                type="file"
                id="fileInput"
                accept=".pdf"
                class="d-none"
                multiple
              />

              <!-- URL Input Container -->
              <div class="url-input-container" id="urlInputContainer">
                <div class="url-input-group">
                  <input
                    type="text"
                    class="url-input"
                    id="urlInput"
                    placeholder="Enter PDF URL..."
                  />
                  <button class="url-close-btn" id="urlCloseBtn">
                    <svg style="width: 16px; height: 16px" viewBox="0 0 24 24">
                      <path
                        fill="currentColor"
                        d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"
                      />
                    </svg>
                  </button>

                  <button class="url-submit-btn" id="urlSubmitBtn">
                    <svg style="width: 16px; height: 16px" viewBox="0 0 24 24">
                      <path
                        fill="currentColor"
                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
            <div class="source-item" id="googleDriveBtn">
              <svg style="width: 16px; height: 16px" viewBox="0 0 24 24">
                <path
                  fill="currentColor"
                  d="M7.71,3.5L1.15,15L4.58,21L11.13,9.5M9.73,15L6.3,21H19.42L22.85,15M22.28,14L15.42,2H8.58L8.57,2L15.43,14H22.28Z"
                />
              </svg>
              <span>Google Drive</span>
            </div>
            <div class="source-item" id="dropboxBtn">
              <svg style="width: 16px; height: 16px" viewBox="0 0 24 24">
                <path
                  fill="currentColor"
                  d="M3,6.2L8,9.39L13,6.2L8,3L3,6.2M13,6.2L18,9.39L23,6.2L18,3L13,6.2M3,12.55L8,15.74L13,12.55L8,9.35L3,12.55M18,9.35L13,12.55L18,15.74L23,12.55L18,9.35M8.03,16.8L13.04,20L18.04,16.8L13.04,13.61L8.03,16.8Z"
                />
              </svg>
              <span>Dropbox</span>
            </div>
            <div class="source-item" id="urlSourceBtn">
              <svg style="width: 16px; height: 16px" viewBox="0 0 24 24">
                <path
                  fill="currentColor"
                  d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z"
                />
              </svg>
              <span>From URL</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- File List Section -->
    <div class="merge-options-section" id="mergeOptions">
      <div class="container">
        <h3 class="text-center mb-4">Files to Merge</h3>

        <div class="file-list" id="fileList">
          <!-- Files will be added here dynamically -->
          <div class="text-center py-4" id="emptyListMessage">
            <p class="text-muted">
              No files added yet. Upload PDFs to get started.
            </p>
          </div>
        </div>

        <div class="mt-4">
          <h4 class="option-title">
            <i class="fas fa-cog"></i>
            Merge Options
          </h4>

          <div class="compression-levels">
            <div class="level-option active" data-level="normal">
              <div class="level-name">Normal Merge</div>
              <div class="level-desc">Combine files without compression</div>
            </div>
            <div class="level-option" data-level="compressed">
              <div class="level-name">Compressed Merge</div>
              <div class="level-desc">Reduce file size during merge</div>
            </div>
            <div class="level-option" data-level="high_quality">
              <div class="level-name">High Quality</div>
              <div class="level-desc">Preserve maximum quality</div>
            </div>
          </div>

          <div class="option-group mt-4">
            <h4 class="option-title">
              <i class="fas fa-file-signature"></i>
              Output Settings
            </h4>
            <div class="form-check form-switch">
              <input
                class="form-check-input"
                type="checkbox"
                id="preserveBookmarks"
                checked
              />
              <label class="form-check-label" for="preserveBookmarks"
                >Preserve bookmarks and links</label
              >
            </div>
            <div class="form-check form-switch mt-2">
              <input
                class="form-check-input"
                type="checkbox"
                id="linearizePDF"
                checked
              />
              <label class="form-check-label" for="linearizePDF"
                >Optimize for web viewing</label
              >
            </div>
          </div>
        </div>

        <button class="merge-btn" id="mergeBtn">
          <i class="fas fa-object-group me-2"></i>
          Merge PDFs
        </button>

        <div class="merge-status" id="mergeStatus">
          <p>Merging your files...</p>
          <div class="progress-container">
            <div class="progress-bar" id="mergeProgress"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Result Section -->
    <div class="result-section" id="resultSection">
      <div class="container">
        <div class="result-header">
          <h3>Your Merged PDF is Ready!</h3>
          <button class="btn btn-outline-primary" id="newMergeBtn">
            <i class="fas fa-plus me-2"></i>
            New Merge
          </button>
        </div>

        <div class="result-content">
          <div class="compression-stats">
            <div class="stat-item">
              <div class="stat-value">3</div>
              <div class="stat-label">Files Merged</div>
            </div>
            <div class="stat-item">
              <div class="stat-value">85%</div>
              <div class="stat-label">Size Reduced</div>
            </div>
            <div class="stat-item">
              <div class="stat-value">12.5s</div>
              <div class="stat-label">Processing Time</div>
            </div>
          </div>

          <div class="text-center">
            <a href="#" class="download-btn" id="downloadBtn">
              <i class="fas fa-download me-2"></i>
              Download Merged PDF
            </a>

            <button
              class="preview-btn"
              id="previewBtn"
              data-bs-toggle="modal"
              data-bs-target="#previewModal"
            >
              <i class="fas fa-eye me-2"></i>
              Preview Merged PDF
            </button>
          </div>

          <div class="preview-container mt-4">
            <h4 class="preview-title">
              <i class="fas fa-file-pdf text-primary"></i>
              Quick Preview
            </h4>

            <!-- Loading indicator -->
            <div class="preview-loading" id="previewLoading">
              <div class="spinner"></div>
              <p>Loading document preview...</p>
            </div>

            <iframe
              class="preview-iframe"
              id="previewFrame"
              src="about:blank"
              onload="document.getElementById('previewLoading').style.display = 'none';"
              style="display: none"
            ></iframe>

            <!-- Preview Controls -->
            <div class="preview-controls">
              <button class="preview-control-btn" id="prevPage">
                <i class="fas fa-chevron-left"></i>
              </button>
              <div class="preview-page-info" id="pageInfo">Page 1 of 10</div>
              <button class="preview-control-btn" id="nextPage">
                <i class="fas fa-chevron-right"></i>
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
    </div>
</div>

            <!-- Zoom Controls -->
          </div>
        </div>
      </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Merged PDF Preview</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <iframe
              class="preview-modal"
              id="fullPreviewFrame"
              src="about:blank"
            ></iframe>
          </div>
        </div>
      </div>
    </div>

    <!-- Related Tools Section -->
    <section class="py-5">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="fw-bold mb-3">More Helpful PDF Tools</h2>
          <p class="text-muted">
            Discover our full suite of free document utilities
          </p>
        </div>
        <div class="row g-4 mx-auto justify-content-center">
                <div class="col-md-4 col-lg-2">
                    <a href="{{route('pdf-to-word')}}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-word fa-2x mb-3"></i>
                            <h5 class="card-title">PDF to Word</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2">
                    <a href="{{route('word-to-pdf')}}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-pdf fa-2x mb-3"></i>
                            <h5 class="card-title">Word to PDF</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2">
                    <a href="{{route('jpg-to-pdf')}}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-image fa-2x mb-3"></i>
                            <h5 class="card-title">JPG to PDF</h5>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-md-4 col-lg-2">
                    <a href="{{route('merge-pdf')}}" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-object-group fa-2x mb-3"></i>
                            <h5 class="card-title">Merge PDF</h5>
                        </div>
                    </a>
                </div> --}}
                <div class="col-md-4 col-lg-2">
                    <a href="#" class="card h-100 border-0 shadow-sm text-decoration-none">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-compress fa-2x mb-3"></i>
                            <h5 class="card-title">Compress PDF</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2">
                    <a href="{{route('pdf-summarize')}}" class="card h-100 border-0 shadow-sm text-decoration-none">
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
    <section class="container mb-5 py-5" id="features">
      <div class="text-center mb-5">
        <h2 class="section-title d-inline-block">Why Choose Our PDF Merger</h2>
        <p class="text-muted">
          Powerful features to make your document workflow easier
        </p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-4">
            <div class="featured-icon">
              <i class="fas fa-shield-alt fa-2x text-primary"></i>
            </div>
            <h4>Secure Processing</h4>
            <p class="text-muted">
              All processing happens in your browser. Your files never leave
              your computer and are never stored on our servers.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-4">
            <div class="feature-icon">
              <i class="fas fa-bolt fa-2x text-primary"></i>
            </div>
            <h4>Lightning Fast</h4>
            <p class="text-muted">
              Merge PDF documents in seconds with our optimized processing
              engine, even for large files.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-4">
            <div class="feature-icon">
              <i class="fas fa-mobile-alt fa-2x text-primary"></i>
            </div>
            <h4>Mobile Friendly</h4>
            <p class="text-muted">
              Works perfectly on all devices including smartphones and tablets
              with our responsive interface.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-4">
            <div class="feature-icon">
              <i class="fas fa-cogs fa-2x text-primary"></i>
            </div>
            <h4>Advanced Options</h4>
            <p class="text-muted">
              Customize your output with page size selection, optimization, and
              bookmark preservation.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-4">
            <div class="feature-icon">
              <i class="fas fa-file-alt fa-2x text-primary"></i>
            </div>
            <h4>No Quality Loss</h4>
            <p class="text-muted">
              Merge PDFs without compromising quality or adding watermarks to
              your documents.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-4">
            <div class="feature-icon">
              <i class="fas fa-infinity fa-2x text-primary"></i>
            </div>
            <h4>Unlimited Merging</h4>
            <p class="text-muted">
              Merge as many PDFs as you need with no file size limits or
              restrictions.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="workflow-section py-5">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="display-5 fw-bold mb-3">The Smart PDF Workflow</h2>
          <p class="text-muted fs-5">How our merging process works</p>
        </div>

        <div class="workflow-steps">
          <!-- Step 1 -->
          <div class="step-card">
            <div class="step-number">1</div>
            <div class="step-content">
              <div class="step-icon">
                <i class="fas fa-folder-open"></i>
              </div>
              <h4 class="step-title">Upload & Organize</h4>
              <p class="step-description">
                Drag and drop your PDF files or select from your device
              </p>
            </div>
            <div class="step-connector"></div>
          </div>

          <!-- Step 2 -->
          <div class="step-card">
            <div class="step-number">2</div>
            <div class="step-content">
              <div class="step-icon">
                <i class="fas fa-cogs"></i>
              </div>
              <h4 class="step-title">Smart Processing</h4>
              <p class="step-description">
                Our system merges while preserving quality
              </p>
            </div>
            <div class="step-connector"></div>
          </div>

          <!-- Step 3 -->
          <div class="step-card">
            <div class="step-number">3</div>
            <div class="step-content">
              <div class="step-icon">
                <i class="fas fa-search"></i>
              </div>
              <h4 class="step-title">Preview & Adjust</h4>
              <p class="step-description">
                Review the merged document and make any final tweaks
              </p>
            </div>
            <div class="step-connector"></div>
          </div>

          <!-- Step 4 -->
          <div class="step-card">
            <div class="step-number">4</div>
            <div class="step-content">
              <div class="step-icon">
                <i class="fas fa-file-export"></i>
              </div>
              <h4 class="step-title">Download & Share</h4>
              <p class="step-description">
                Get your polished PDF or share it directly
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Productivity Boost Section -->
    <section class="productivity-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="productivity-visual p-4">
              <div class="time-saved-card">
                <i class="fas fa-clock"></i>
                <h3>87% Faster</h3>
                <p>Than manual merging</p>
              </div>
              <div class="document-stack">
                <div
                  class="document-page"
                  style="--rotation: -5deg; --order: 1"
                >
                  <i class="fas fa-file-pdf"></i>
                </div>
                <div class="document-page" style="--rotation: 0deg; --order: 2">
                  <i class="fas fa-file-pdf"></i>
                </div>
                <div class="document-page" style="--rotation: 5deg; --order: 3">
                  <i class="fas fa-file-pdf"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <h2 class="mb-4">Supercharge Your Document Workflow</h2>
            <div class="productivity-feature">
              <div class="feature-number">01</div>
              <div>
                <h4>Batch Processing</h4>
                <p>
                  Merge hundreds of PDFs in one operation with our bulk
                  processing engine
                </p>
              </div>
            </div>
            <div class="productivity-feature">
              <div class="feature-number">02</div>
              <div>
                <h4>Template Presets</h4>
                <p>
                  Save your favorite merge configurations for frequent document
                  types
                </p>
              </div>
            </div>
            <div class="productivity-feature">
              <div class="feature-number">03</div>
              <div>
                <h4>Cloud Integration</h4>
                <p>
                  Directly merge files from Google Drive, Dropbox, and OneDrive
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // File input elements
        const fileInput = document.getElementById("fileInput");
        const uploadBtn = document.getElementById("uploadBtn");
        const dropZone = document.getElementById("dropZone");
        const mergeOptions = document.getElementById("mergeOptions");
        const fileList = document.getElementById("fileList");
        const emptyListMessage = document.getElementById("emptyListMessage");
        const mergeBtn = document.getElementById("mergeBtn");
        const mergeStatus = document.getElementById("mergeStatus");
        const mergeProgress = document.getElementById("mergeProgress");
        const resultSection = document.getElementById("resultSection");
        const newMergeBtn = document.getElementById("newMergeBtn");
        const previewBtn = document.getElementById("previewBtn");
        const downloadBtn = document.getElementById("downloadBtn");
        const previewFrame = document.getElementById("previewFrame");
        const fullPreviewFrame = document.getElementById("fullPreviewFrame");
        const levelOptions = document.querySelectorAll(".level-option");
        const urlSourceBtn = document.getElementById("urlSourceBtn");
        const urlInputContainer = document.getElementById("urlInputContainer");
        const urlCloseBtn = document.getElementById("urlCloseBtn");

        // Preview controls
        const prevPageBtn = document.getElementById("prevPage");
        const nextPageBtn = document.getElementById("nextPage");
        const zoomInBtn = document.getElementById("zoomIn");
        const zoomOutBtn = document.getElementById("zoomOut");
        const zoomLevel = document.getElementById("zoomLevel");
        const pageInfo = document.getElementById("pageInfo");

        // Array to store uploaded files
        let uploadedFiles = [];
        let currentPage = 1;
        let zoom = 100;

        // Upload button click handler
        uploadBtn.addEventListener("click", () => {
          fileInput.click();
        });

        // File input change handler
        fileInput.addEventListener("change", (e) => {
          handleFiles(e.target.files);
        });

        // Drag and drop handlers
       dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('dragover');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('dragover');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('dragover');
    if (e.dataTransfer.files.length > 0) {
        handleFiles(e.dataTransfer.files);
    }
});
        // URL source button handler
        urlSourceBtn.addEventListener("click", () => {
          urlInputContainer.style.display = "block";
        });

        // URL close button handler
        urlCloseBtn.addEventListener("click", () => {
          urlInputContainer.style.display = "none";
        });

        // Merge options level selection
        levelOptions.forEach((option) => {
          option.addEventListener("click", () => {
            levelOptions.forEach((opt) => opt.classList.remove("active"));
            option.classList.add("active");
          });
        });

       // New merge button handler
newMergeBtn.addEventListener('click', () => {
    // Hide result section
    resultSection.style.display = 'none';
    
    // Reset merge options
    mergeOptions.style.display = 'none';
    uploadedFiles = [];
    fileList.innerHTML = '<div class="text-center py-4" id="emptyListMessage"><p class="text-muted">No files added yet. Upload PDFs to get started.</p></div>';
    emptyListMessage.style.display = 'block';
    
    // Show the initial upload prompt again
    const initialUpload = document.getElementById('initialUpload');
    if (initialUpload) initialUpload.style.display = 'block';
    
    // Reset file input
    fileInput.value = '';
    
    // Scroll to upload section
    document.getElementById('upload').scrollIntoView({ behavior: 'smooth' });
});
        // Merge button handler
        mergeBtn.addEventListener("click", () => {
          mergeOptions.style.display = "none";
          mergeStatus.style.display = "block";

          // Simulate merging progress
          let progress = 0;
          const interval = setInterval(() => {
            progress += 5;
            mergeProgress.style.width = `${progress}%`;

            if (progress >= 100) {
              clearInterval(interval);
              setTimeout(() => {
                mergeStatus.style.display = "none";
                resultSection.style.display = "block";
                loadPreview();
              }, 500);
            }
          }, 100);
        });

        // Preview button handler
        previewBtn.addEventListener("click", () => {
          fullPreviewFrame.src =
            "https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf";
        });

        // Preview navigation controls
        prevPageBtn.addEventListener("click", () => {
          if (currentPage > 1) {
            currentPage--;
            updatePageInfo();
          }
        });

        nextPageBtn.addEventListener("click", () => {
          if (currentPage < 10) {
            currentPage++;
            updatePageInfo();
          }
        });

        // Zoom controls
        zoomInBtn.addEventListener("click", () => {
          if (zoom < 200) {
            zoom += 10;
            updateZoom();
          }
        });

        zoomOutBtn.addEventListener("click", () => {
          if (zoom > 50) {
            zoom -= 10;
            updateZoom();
          }
        });

        // Function to handle uploaded files
        function handleFiles(files) {
          if (files.length > 0) {
            // Hide just the initial prompt, not the entire upload area
            const dropPrompt = document.querySelector("#dropZone .text-center");
            if (dropPrompt) dropPrompt.style.display = "block";

            mergeOptions.style.display = "block";

            // Add files to the list
            for (let i = 0; i < files.length; i++) {
              const file = files[i];
              if (file.type === "application/pdf") {
                uploadedFiles.push(file);
                addFileToList(file);
              }
            }

            if (uploadedFiles.length > 0) {
              emptyListMessage.style.display = "none";
            }
          }
        }

        // Function to add a file to the list
        function addFileToList(file) {
          const fileSize = formatFileSize(file.size);

          const fileItem = document.createElement("div");
          fileItem.className = "file-item";
          fileItem.innerHTML = `
                    <div class="file-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="file-info">
                        <div class="file-name">${file.name}</div>
                        <div class="file-size">${fileSize}</div>
                    </div>
                    <div class="file-actions">
                        <button class="action-btn preview-file" title="Preview">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="action-btn remove-file" title="Remove">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;

          fileList.appendChild(fileItem);

          // Add event listeners
          fileItem
            .querySelector(".remove-file")
            .addEventListener("click", () => {
              const index = Array.from(fileList.children).indexOf(fileItem) - 1;
              uploadedFiles.splice(index, 1);
              fileList.removeChild(fileItem);

              if (uploadedFiles.length === 0) {
                emptyListMessage.style.display = "block";
              }
            });

          fileItem
            .querySelector(".preview-file")
            .addEventListener("click", () => {
              alert(
                `Previewing: ${file.name}\n\nThis feature would open a preview of your PDF in a real implementation.`
              );
            });
        }

        // Function to format file size
        function formatFileSize(bytes) {
          if (bytes === 0) return "0 Bytes";
          const k = 1024;
          const sizes = ["Bytes", "KB", "MB", "GB"];
          const i = Math.floor(Math.log(bytes) / Math.log(k));
          return parseFloat(
            (bytes / Math.pow(k, i)).toFixed(2) + " " + sizes[i]
          );
        }

        // Function to load preview
        function loadPreview() {
          document.getElementById("previewLoading").style.display = "flex";
          previewFrame.style.display = "none";

          // Simulate loading delay
          setTimeout(() => {
            previewFrame.src =
              "https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf";
            previewFrame.style.display = "block";
            currentPage = 1;
            zoom = 100;
            updatePageInfo();
            updateZoom();
          }, 1500);
        }

        // Function to reset preview
        function resetPreview() {
          previewFrame.src = "about:blank";
          currentPage = 1;
          zoom = 100;
          updatePageInfo();
          updateZoom();
        }

        // Function to update page info
        function updatePageInfo() {
          pageInfo.textContent = `Page ${currentPage} of 10`;
        }

        // Function to update zoom level
        function updateZoom() {
          zoomLevel.textContent = `${zoom}%`;
          // In a real implementation, this would adjust the PDF viewer zoom
        }
      });
    </script>
    @endsection
