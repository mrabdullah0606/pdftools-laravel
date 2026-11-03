@extends('main')
@section('title', 'Merge PDF Free | Combine PDF files online - PDFTools.net')
@section('description', 'Pdftools.net offers free Word to PDF converter online. Enjoy the best, secure and user-friendly online tool that ensures high-quality conversions.')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@push('head')
<style>
    .text-graylight {
        color: #47494abf;
    }
    .button {
        position: relative;
        width: 150px;
        height: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        border: 1px solid rgb(106, 84, 248);
        background-color: rgba(133, 117, 245, 1);
        overflow: hidden;
        margin: auto;
        border-radius: 12px;
    }
    .button, .button__icon, .button__text {
        transition: all 0.3s;
    }
    .button .button__text {
        transform: translateX(22px);
        color: #fff;
        font-weight: 600;
    }
    .button .button__icon {
        position: absolute;
        transform: translateX(109px);
        height: 100%;
        width: 39px;
        background-color: rgb(135, 117, 253);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button:hover {
        background: rgb(135, 117, 253);
    }
    .button:hover .button__text {
        color: transparent;
    }
    .button:hover .button__icon {
        width: 148px;
        transform: translateX(0);
    }
    .button:active .button__icon {
        background-color: rgb(135, 117, 253);
    }
    .button:active {
        border: 1px solid rgb(135, 117, 253);
    }
</style>
@endpush

@section('page')
{{-- Input --}}
<form class="col-12 mx-auto"  id="pdf-upload-form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container py-5">
        <div class="row">
            <div class="col-12 px-4 pt-5">
                <h1 class="text-gradient text-center">Tool to Merge PDF Files Online</h1>
                <p class="text-graylight text-center">Our tool to merge PDF files is free, secure, and reliable.</p>

                {{-- Input Section --}}
                <div class="col-12 col-lg-8 mx-auto p-5 border-gradient rounded text-center mt-5" id="before_input">
                    <h2 class="text-graylight">Drop Your Files here!</h2>
                    <p class="fs-5">or upload files</p>
                    <div class="col-8 mx-auto d-grid" id="file-inputs">
                        <label for="files" class="btn pt-2 fw-semibold text-white bg-gradient">Upload PDF Files</label>
                        <input type="file"  name="pdf_files[]"  id="files" accept="application/pdf" multiple class="d-none upload_img files">
                    </div>
                </div>

                {{-- Preview Section --}}
                <div class="col-12 col-lg-8 mx-auto p-5 border-gradient rounded text-center mt-5" id="previewSection" style="display: none;">
                    <div id="fileDetailsList"></div>
                    <div class="d-flex justify-content-center">
                        <div id="message" class="text-center">Faizan</div>
                        <button type="button" class="btn bg-gradient text-white mx-auto my-3 fw-medium fs-5" id="add-more">Add More PDF</button>
                        <button id="pdf-upload-form" type="submit" class="btn bg-gradient text-white mx-auto my-3 fw-medium fs-5">Merge PDFs</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- Result Section --}}
@if(session('mergedFile'))
<div class="col-12 col-lg-8 mx-auto p-5 border-gradient rounded text-center mt-5" id="result">
    <h2 class="text-graylight">Merged PDF File</h2>
    <div class="card mb-3 border-0 shadow mt-4 px-5">
        <div class="row g-0">
            <div class="col-md-10">
                <div class="card-body px-0">
                    <h5 class="card-title">{{ session('mergedFile')['originalFileName'] }}</h5>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('downloadMergedFile ') }}">
            @csrf
            <input type="hidden" name="url" value="{{ session('mergedFile')['downloadUrl'] }}">
            <button class="button mb-3" type="submit">
                <span class="button__text">Download Merged PDF</span>
                <span class="button__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" class="svg">
                        <path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path>
                        <path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path>
                        <path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path>
                    </svg>
                </span>
            </button>
        </form>
    </div>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInputsContainer = document.getElementById('file-inputs');
    const previewSection = document.getElementById('previewSection');
    const fileDetailsList = document.getElementById('fileDetailsList');
    const beforeInputSection = document.getElementById('before_input');

    function handleFileSelect(event) {
        const files = event.target.files;
        beforeInputSection.style.display = 'none'; // Hide before_input section
        previewSection.style.display = 'block'; // Show preview section

        Array.from(files).forEach(file => {
            const fileDetail = document.createElement('div');
            fileDetail.className = 'card mb-3 border-0 shadow mt-4 px-5';
            fileDetail.innerHTML = `
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('images/pdf.png') }}" loading="lazy" class="mt-3 mb-2 w-75" alt="upload">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body px-0">
                            <h5 class="card-title">${file.name}</h5>
                            <button type="button" class="btn btn-danger btn-sm remove-file">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            fileDetailsList.appendChild(fileDetail);
        });
    }

    // Initial file input event listener
    const initialFileInput = fileInputsContainer.querySelector('input[type="file"]');
    initialFileInput.addEventListener('change', handleFileSelect);

    document.getElementById('add-more').addEventListener('click', function() {
        console.log("Triger")
        const newInput = document.createElement('div');
        newInput.className = 'col-8 mx-auto d-grid';
        newInput.innerHTML = `
            <label for="files" class="btn pt-2 fw-semibold text-white bg-gradient">Upload PDF Files</label>
            <input type="file" name="pdf_files[]" accept="application/pdf" class="d-none upload_img files">
        `;
        fileDetailsList.appendChild(newInput);

        // Add event listener for the new file input
        const newFileInput = newInput.querySelector('input[type="file"]');
        newFileInput.addEventListener('change', handleFileSelect);
    });

    fileDetailsList.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-file')) {
            const fileDetail = event.target.closest('.card');
            fileDetailsList.removeChild(fileDetail);
        }
    });
});
document.getElementById('pdf-upload-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const messageDiv = document.getElementById('message');
            messageDiv.textContent = "Uploading... Please wait.";
            messageDiv.style.color = "blue";

            axios.post('/Merge', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => {

                console.log(response.data.response)
                messageDiv.textContent = `Files uploaded successfully:  ${response.data.response.merged_pdf_name}` ;
                messageDiv.style.color = "green";
                // Clear the file input
                this.reset();
                // Clear additional inputs
                const fileInputsContainer = document.getElementById('file-inputs');
                fileInputsContainer.innerHTML = `
                    <div class="form-group">
                        <label for="pdf_files">Select PDF Files:</label>
                        <input type="file" class="form-control-file" name="pdf_files[]" accept="application/pdf" required>
                    </div>
                `;
            })
            .catch(error => {
                if (error.response) {
                    // Server responded with a status other than 200 range
                    messageDiv.textContent = 'Error uploading files: ' + error.response.data.error;
                } else if (error.request) {
                    // Request was made but no response was received
                    messageDiv.textContent = 'Error: No response from server.';
                } else {
                    // Something happened in setting up the request
                    messageDiv.textContent = 'Error: ' + error.message;
                }
                messageDiv.style.color = "red";
            });
        });
</script>
@endsection
