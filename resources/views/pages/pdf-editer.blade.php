@extends('main')
{{-- @section('title', $title)
@section('description', $meta_description) --}}
@push('head')
<style>
    
    .text-graylight{
        color: #47494abf;
    }
    .text-graylight{
        color: #47494abf;
    }
    .button{position:relative;width:150px;height:40px;cursor:pointer;display:flex;align-items:center;border:1px solid rgb(106, 84, 248);background-color:rgba(133,117,245,1);overflow:hidden;margin:auto;border-radius:12px;}
    .button,.button__icon,.button__text{transition:all 0.3s;}
    .button .button__text{transform:translateX(22px);color:#fff;font-weight:600;}
    .button .button__icon{position:absolute;transform:translateX(109px);height:100%;width:39px;background-color:rgb(135, 117, 253);display:flex;align-items:center;justify-content:center;}
    .button .svg{width:20px;fill:#fff;}
    .button:hover{background:rgb(135, 117, 253);}
    .button:hover .button__text{color:transparent;}
    .button:hover .button__icon{width:148px;transform:translateX(0);}
    .button:active .button__icon{background-color:rgb(135, 117, 253);}
    .button:active{border:1px solid rgb(135, 117, 253);}
    
</style>

@endpush
@section('page')
{{-- input --}}
<form class="col-12 mx-auto" action="{{ route('pdf-to-word') }}" id="wordToPdfForm" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container py-5">
        <div class="row">
            <div class="col-12 px-4 pt-5">
                <h1 class="text-gradient text-center">PDF Editor</h1>
                <p class="text-graylight text-center">Our tool to convert PDF files into Word is free, secure, and reliable.</p>
                
                {{-- Input Section --}}
                <div class="col-12 col-lg-8 mx-auto p-5 border-gradient rounded text-center mt-5" id="before_input">
                    <h2 class="text-graylight">Drop Your File here!</h2>
                    <p class="fs-5">or upload file</p>
                    <div class="col-8 mx-auto d-grid">
                        <label for="files" class="btn pt-2 fw-semibold text-white bg-gradient">Upload PDF Files</label>
                        <input type="file" name="files[]" id="files" accept="application/pdf" multiple class="d-none upload_img files">
                    </div>
                </div>
                
                {{-- Preview Section --}}
                <div class="col-12 col-lg-8 mx-auto p-5 border-gradient rounded text-center mt-5" id="previewSection" style="display: none;">
                    <div class="card mb-3 border-0 shadow mt-4 px-5" id="fileDetailsList">
                        <div class="row g-0">
                            <div class="col-md-2">
                                <img src="{{ asset('images/pdf.svg') }}" loading="lazy" class="mt-3 mb-2 w-75" alt="upload">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body px-0 d-flex">
                                    <div class="col-11">
                                        <h5 class="card-title" id="fileName"></h5>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn-close text-dark" aria-label="Close" id="removeFileBtn"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id="button3" type="submit" class="btn bg-gradient text-white mx-auto my-3 fw-medium fs-5">Edit PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- Result Section --}}
@if(session('convertedFiles'))
<script>
    var beforeInputDiv = document.getElementById('before_input');
    if (beforeInputDiv) {
        beforeInputDiv.remove();
    }
    document.getElementById('button3').remove();
</script>
<div class="col-12 col-lg-8 mx-auto p-5 border-gradient rounded text-center mt-5" id="result">
    @foreach(session('convertedFiles') as $file)
    <div class="card mb-3 border-0 shadow mt-4 px-5">
        <div class="row g-0">
            <div class="col-3 col-md-2 mx-auto">
                <img src="{{ asset('images/pdf.svg') }}" class="img-fluid rounded-start mt-3 w-75" alt="upload">
            </div>
            <div class="col-md-10">
                <div class="card-body px-0">
                    <h5 class="card-title">{{ $file['originalFileName'] }}</h5> <!-- Access the correct key -->
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('downloadFile') }}">
            @csrf
            <input type="hidden" name="url" value="http://63.250.41.43/api/pdf/{{ basename($file['convertedFilePath']) }}">
            <button class="button mb-3" type="submit">
                <span class="button__text">Download</span>
                <span class="button__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg">
                        <path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path>
                        <path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path>
                        <path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path>
                    </svg>
                </span>
            </button>
        </form>
    </div>
    @endforeach
</div>
@endif


{{-- related tools --}}
<div class="container-fluid px-0 pt-5 bg-gradient text-white pb-5">
    <div class="col-12 col-lg-10 mx-auto">
        <div class="col-12 my-5 ">
            <h2 class="text-center mb-4">Related Tools</h2>
            <div class="col-12 d-flex flex-wrap justify-content-evenly">
                <a href="{{route('pdf-to-word')}}" class="card card-tools rounded-5 my-3 py-3">
                    <div class="card-body py-1">
                        <img src="{{asset('images/pdf.svg')}}" alt="pdf" width="89" height="89" class="w-50 mb-4 d-block mx-auto">
                        <h3 class="card-title text-center">PDF to WORD</h3>
                    </div>
                </a>
                <a href="{{route('word-to-pdf')}}" class="card card-tools rounded-5 my-3 py-3">
                    <div class="card-body py-1">
                        <img src="{{asset('images/word.svg')}}" alt="jpg" width="81" height="81" class="w-50 mb-4 d-block mx-auto">
                        <h3 class="card-title text-center">Word to PDF</h3>
                    </div>
                </a>
                <a href="{{route('jpg-to-pdf')}}" class="card card-tools rounded-5 my-3 py-3">
                    <div class="card-body py-1 px-4">
                        <img src="{{asset('images/jpg.svg')}}" alt="jpg" width="94" height="94" class="w-50 mb-4 d-block mx-auto">
                        <h3 class="card-title text-center">JPG to PDF</h3>
                    </div>
                </a>
                <a href="{{route('compress-pdf')}}" class="card card-tools rounded-5 my-3 py-3">
                    <div class="card-body py-1">
                        <img src="{{asset('images/compression.svg')}}" alt="jpg" width="91" height="91" class="w-50 mb-4 d-block mx-auto">
                        <h3 class="card-title text-center">Compress PDF</h3>
                    </div>
                </a>
                <a href="{{route('merge-pdf')}}" class="card card-tools rounded-5 my-3 py-3">
                    <div class="card-body py-1">
                        <img src="{{asset('images/merge.svg')}}" alt="jpg" width="90" height="90" class="w-50 mb-4 d-block mx-auto">
                        <h3 class="card-title text-center">Merge PDF</h3>
                    </div>
                </a>
                <a href="{{route('split-pdf')}}" class="card card-tools rounded-5 my-3 py-3">
                    <div class="card-body py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#795ef1" class="bi bi-scissors mb-4 d-block mx-auto" viewBox="0 0 16 16">
                            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.66a2.5 2.5 0 1 1-.794.604L8 9.274l-1.572 2.6a2.5 2.5 0 1 1-.794-.604l1.556-2.66zm-.252 7.744a1.5 1.5 0 1 0 2.121 2.122 1.5 1.5 0 0 0-2.121-2.122m7.504 0a1.5 1.5 0 1 0 2.122 2.122 1.5 1.5 0 0 0-2.122-2.122"/>
                        </svg>
                        <h3 class="card-title text-center">{{ __('home.split-pdf') }}</h3>
                    </div>
                </a>
                
            </div>
        </div>
    </div>
</div>

{{-- content --}}
{{-- <div class="container py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Why Convert PDF to Word File? </h2>
            <p>Here are some of the top reasons why it becomes necessary to convert a PDF file into a Word file.</p>
            <div class="col-12 d-flex flex-wrap">
                <div class="col-6 col-lg-4 px-3 my-3 d-flex">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body py-1 text-center">
                            <div class="col-2 mx-auto">
                                <p class="card-title bg-gradient p-3 py-2 p-mb-2 py-mb-3 rounded-5 text-white fw-medium mb-4">1</p>
                            </div>
                            <h3 class="card-subtitle mb-2">Easy to Edit and Format</h3>
                            <p class="card-text">Converting a PDF to a Word document makes it much easier to edit. PDFs are usually not easy to change, but Word files allow you to make any edits you need. You can </p>
                            
                            <u>
                                <li>Add or remove text, </li>
                                <li>Change the layout, and </li>
                                <li>Remove text and much more.</li>
                            </u>
                            <p>This is helpful if you receive a PDF that needs changes before it's finished.</p>
                            <p>Word also gives you many ways to format the document. You can change fonts, adjust margins, add images or tables, and use different styles. These features help make the document look more professional.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 px-3 my-3 d-flex">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body text-center">
                            <div class="col-2 mx-auto">
                                <p class="card-title bg-gradient p-3 py-2 p-mb-2 py-mb-3 rounded-5 text-white fw-medium mb-4">2</p>
                            </div>
                            <h3 class="card-subtitle mb-2">Easier to Search</h3>
                            <p class="card-text">PDF files can be difficult to search through, especially when you need to find something specific. When you convert a PDF to Word, you get the benefit of Word’s search feature. You can quickly find keywords or phrases, which saves time, especially in long documents.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 px-3 my-3 d-flex">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body text-center">
                            <div class="col-2 mx-auto">
                                <p class="card-title bg-gradient p-3 py-2 p-mb-2 py-mb-3 rounded-5 text-white fw-medium mb-4">3</p>
                            </div>
                            <h3 class="card-subtitle mb-2">Better for Teamwork</h3>
                            <p class="card-text"></p>
                            <p>Converting a PDF to Word makes it easier for several people to work on the same file. If you are working with others, using Word is much more efficient.</p>
                            <p>In Word, people can </p>
                            <ul>
                                <li>Edit the file,</li>
                                <li>Leave comments,and</li>
                                <li>Track any changes.</li>
                            </ul>
                            <p>This helps make the whole process run more smoothly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="container">
    <div class="col-12 bg-white rounded-3 p-4 shadow">
        <h2>How to Convert PDF to Word Using Free Online Tools?</h2>
        <p>Thankfully, there are a lot of free online PDF-to-Word conversion tools, such as <a href="">PDFTools.</a></p>
        <p>Here is how to convert your PDF into a Word file.</p>
        
        <u>
            <li>Just go to our <a href="">PDF to Word Tool</a> </li>
            <li>Upload PDF Files</li>
            <li>Press the "Convert to Word" button</li>
            <li>Download the Converted Document </li>
        </u>
        
        <p>Why use our tool for PDF to Word conversion?</p>
        <u>
            <li>We do not share your information. Files are deleted from our system every hour.</li>
            <li>Our tools are browser-based, so you can use them on any device without worrying about compatibility.</li>
            <li>Use all our PDF tools for free, with no limits on file size or number of uses.</li>
            <li>Work from any location or device to boost your productivity with our PDF tools.</li>
            <li>We ensure your documents remain clean with no watermarks or logos.</li>
            <li>Get quick results with no complicated steps, even for many documents at once.</li>
            <li>PDFtools.net offers a wide range of tools for all your PDF needs in one place.</li>
            <li>You can use our tools as much as you need, anytime, anywhere, with no restrictions.</li>
            <li>Our tools are designed to help you work smarter and save time, all for free.</li>
            <li>Use our tools on any device or operating system, including mobile phones.</li>
        </u>
        <h2 class="text-center mx-5 py-5 head-2">Common Challenges in PDF to Word Conversion and How to Address Them</h2>
        <p class="mx-5">Converting PDF files into Word documents is not a straightforward process. Here are some common issues you may face and how to address them. </p>
        <h3>1.Text Misalignment</h3>
        <p>Sometimes, text doesn’t line up correctly, which may cause paragraphs or headings to shift.</p>
        <p> <b>Solution:</b> Use high-quality PDF converters. After conversion, check the document and adjust any alignment issues.</p>
        <h3>2.Incorrect Words</h3>
        <p>Letters that are close together, like “w” and “vv,” may be misinterpreted during conversion.</p>
        <p> <b>Solution:</b> Use Word’s spell check to spot and fix misspelled words. You can also use the 'search and replace' tool for quick corrections.</p>
        <h3>3.Font Problems</h3>
        <p>Fonts might change during conversion, which may lead to differences in appearance.</p>
        <p> <b>Solution:</b> Use basic fonts like Times New Roman or Arial, and embed fonts in the PDF before conversion to avoid this issue.</p>
        <h3>4.Image Problems</h3>
        <p>Images may be misplaced, stretched, or missing during conversion.</p>
        <p> <b>Solution:</b> Check image settings in the conversion tool, compress high-resolution images, and use the “Wrap Text” feature in Word for proper image placement.</p>
        <h3>5.Hyphenation Issues</h3>
        <p>Words split at the end of lines may be misinterpreted, especially if they are hyphenated unnecessarily.</p>
        <p><b>Solution: </b>Look out for hyphenation errors after conversion and remove them using the 'find and replace' function.</p>
        <h3>6.Line Breaks and Column Problems</h3>
        <p>Line breaks, margins, and columns may not match the original PDF, which can cause text to shift or misalign.</p>
        <p><b>Solution:</b> Check margins, line spacing, and columns in the converted file. Use the "show invisibles" option to detect misplaced line breaks.</p>
        <h3>7.Bold, Underline, and Italics Issues</h3>
        <p>OCR software might fail to recognize bold, underline, or italic formatting, or it could change the font.</p>
        <p> <b>Solution:</b> Choose a reliable conversion tool and check the formatting after conversion. You can also convert to an intermediate format like RTF first to keep the styles intact.</p>
        <h3>8.Look-Alike Characters</h3>
        <p>OCR may confuse characters like the number “0” and the letter “O.”</p>
        <p> <b>Solution:</b> Use the find and replace feature in Word to correct these mistakes.</p>
        <h3>9.Incomplete Conversion</h3>
        <p>Sometimes, parts of the text, images, or tables may be missing, or annotations and links could be lost.</p>
        <p><b>Solution:</b> Choose a converter that handles large files well and supports batch processing. You can manually add missing items like page numbers or annotations in Word.</p>
        <h3>10.Missing Links</h3>
        <p>Links in the document might not transfer during conversion, especially if they use anchor text instead of full URLs.</p>
        <p> <b>Solution:</b> Proofread the document and manually add any missing links using Word’s hyperlink feature.</p>
        <h2>General Tips when converting a PDF file to Word</h2>
        <h3>a.Impact of Original PDF Quality</h3>
        <p>The quality of the original PDF affects how well it converts. If the PDF contains scanned images or poor-quality text, fonts, and images, it can make the conversion process harder. Therefore, make sure the quality of the original PDF file is good. </p>
        <h3>b.Convert PDFs Created in Word</h3>
        <p>If possible, try to convert PDFs that were originally made in Word. These usually convert the best, keeping the layout, colors, fonts, and image quality from the original document.</p>    
        <h3>c.Check Hyperlinks and Bookmarks</h3>
        <p>If the PDF has links, make sure they still work after conversion to Word. Some tools keep the links automatically, but others may need you to fix them.</p>
        <p>Also, if the PDF has internal links or bookmarks, check that they are transferred correctly and work as they should in Word.</p>
        <h3>d.Save a Backup Copy</h3>
        <p>Before you edit the converted document, it is a good idea to save a backup. Make a copy of the document on your computer so you have a reference, then make changes to the original Word file.</p>
        <h3>e.Using OCR for Scanned PDFs</h3>
        <p>If the PDF has scanned pages, using OCR (Optical Character Recognition) can help. OCR changes the text from images into editable text, making the conversion more accurate.</p>
        <p>Frequently Asked Questions</p>.
        <h2>How can you tell if a PDF was made in an app or scanned?</h2>
        <p>Open the PDF in a PDF viewer like Edge (on Windows), Preview (on Mac), or Adobe Acrobat Reader. Try highlighting some text. If you can select the text, the PDF was made in an app. If you can’t highlight any text, the PDF was scanned, and OCR was used to convert it.</p>
        <h2>Can you extract text from scanned PDFs using a PDF-to-Word converter?</h2>
        <p>No, you cannot extract text from scanned PDFs with a PDF-to-Word converter. The converter only works with text that is already in the PDF, not with text in scanned images.</p>
        
        <h2>Why does the PDF-to-Word conversion create multiple text boxes?</h2>
        <p>The conversion uses text boxes to preserve the original format of the PDF. If you want the text to flow normally, you can choose the "flowing mode" option in the conversion settings. This may change the layout a bit compared to the original PDF.</p>
        
        
    </div>
</div> --}}




{{-- cotent --}}

<script>
    // Get references to the DOM elements
    const fileInput = document.getElementById('files');
    const before_input = document.getElementById('before_input');
    const previewSection = document.getElementById('previewSection');
    const fileNameElement = document.getElementById('fileName');
    const removeFileBtn = document.getElementById('removeFileBtn');
    
    // Listen for file selection event
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        
        // If a file is selected
        if (file) {
            // Hide the input section
            before_input.style.display = 'none';
            
            // Show the preview section
            previewSection.style.display = 'block';
            
            // Display the file name in the preview section
            fileNameElement.textContent = file.name;
        }
    });
    
    // Remove the file and go back to the input section when the close button is clicked
    removeFileBtn.addEventListener('click', function() {
        // Reset the file input
        fileInput.value = '';
        
        // Hide the preview section
        previewSection.style.display = 'none';
        
        // Show the input section again
        before_input.style.display = 'block';
    });
    
</script>
@endsection