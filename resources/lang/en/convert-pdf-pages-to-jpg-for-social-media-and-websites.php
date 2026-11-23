<?php

return [
    'title' => 'Convert PDF Pages to JPG for Social Media and Websites',
    'description' => 'Learn how to convert PDF pages into JPG images for social posts, websites, and presentations. Covers resolution, quality settings, and avoiding blurry or cropped output.',
    'main-heading' => 'Convert PDF Pages to JPG for Social Media and Websites',

    'intro-p1' => 'Some content simply works better as an image. A chart from a long report can illustrate a social post better than a link to a PDF. A page from a brochure can appear directly in a blog article without forcing visitors to download anything. Many social platforms also show images inline while displaying PDFs only as file attachments. Converting PDF pages to JPG solves these problems quickly.',
    'intro-p2' => 'JPG is supported almost everywhere. It opens in any browser, phone gallery, and design tool. The challenge is making the conversion produce clear, correctly sized images rather than soft, cropped, or dark results. This guide covers the settings that matter and how to avoid the most common issues.',

    'when-heading' => 'When Images Work Better Than PDFs',
    'when-p1' => 'Social media feeds favor images. A converted page appears directly in the post, so viewers can read it without tapping through to a separate file. This is especially useful for infographics, price lists, and event schedules.',
    'when-p2' => 'Websites also benefit. An image loads faster than an embedded document viewer on many pages, and it displays consistently across browsers. Designers can position the image within a layout and add captions or alt text for accessibility.',
    'when-p3' => 'Presentations often need a single page or diagram. An image can be dropped into a slide without bringing the rest of the document along.',

    'steps-heading' => 'Step by Step: Convert the Pages',
    'steps-p1' => 'Open the __PDF_TO_JPG_LINK__ on PDFTools and upload your file. Choose whether to convert every page or only a selected range. For a single page, enter its number. For a social post, one page at a time is usually best.',
    'steps-p2' => 'Select the quality and resolution. For text-heavy pages, choose high quality and 150 to 200 dots per inch. Social platforms compress images anyway, so a very high resolution rarely helps. Start the conversion and download the results.',
    'steps-p3' => 'Open each image and check it at full size. Confirm that text is sharp, margins are intact, and no part of the page is cut off.',

    'dimensions-heading' => 'Choosing Dimensions for Each Platform',
    'dimensions-p1' => 'Each platform displays images at different sizes. A square format around 1080 by 1080 pixels suits many feed layouts, while a tall format works better for stories and mobile scrolling. Wide banners are better for website headers.',
    'dimensions-p2' => 'Converting a page to JPG does not automatically resize it for a specific platform. You may need to crop or resize the image in an editor afterward. Keep the original high-resolution version, and create platform-specific copies from it.',

    'avoiding-heading' => 'Avoiding Blurry or Cropped Results',
    'avoiding-p1' => 'Blurriness usually comes from a low resolution setting. Convert the page again at a higher value rather than sharpening the image later, since sharpening adds artifacts. Text that remains blurry after conversion may also indicate a low-resolution original.',
    'avoiding-p2' => 'Cropping can happen when the page size in the PDF differs from the converter\'s default. Look for a fit-to-page or page-size option if the image edges are missing.',
    'avoiding-p3' => 'Dark backgrounds sometimes appear when a PDF contains transparent elements, because JPG does not support transparency. Set a white background in the conversion settings if available.',

    'carousel-heading' => 'Converting Multiple Pages for a Carousel Post',
    'carousel-p1' => 'Carousel posts show several images in sequence. Convert the relevant pages into separate JPG files, and name them in the order they should appear, such as carousel_01.jpg, carousel_02.jpg, and so on. Check that each image uses the same dimensions so the carousel looks consistent.',
    'carousel-p2' => 'If you later want to share the carousel as a single document, a __JPG_TO_PDF_LINK__ can reassemble the images into one file.',

    'filesize-heading' => 'Reducing File Size for Web Use',
    'filesize-p1' => 'Large images slow down websites. After conversion, consider compressing the images, or choose a lower quality setting if the text remains readable. A file of a few hundred kilobytes is usually suitable for most web pages.',
    'filesize-p2' => 'If you need to share a complete PDF on the website as well, compress it with a __COMPRESS_LINK__ so the download is faster for visitors.',

    'pagesneeded-heading' => 'Using Only the Pages You Need',
    'pagesneeded-p1' => 'Converting a full report when you need only two pages wastes time. Decide which pages are relevant before you start. Some teams first build a short PDF with the selected pages, then convert that smaller file. The __PAGES_TO_PDF_LINK__ can assemble such a file from the pages you choose.',

    'faq-heading' => 'Frequently Asked Questions',
    'faq1-q' => 'What resolution should I use for social media images?',
    'faq1-a' => 'A setting between 150 and 200 dots per inch is usually sufficient. Platforms compress uploads, so extremely high resolution rarely improves what viewers see.',
    'faq2-q' => 'Why does my converted image have a black background?',
    'faq2-a' => 'The PDF probably contains transparent elements, which JPG cannot store. Choose a white background setting during conversion, or add a white layer in an image editor.',
    'faq3-q' => 'Can I convert a whole PDF to JPG at once?',
    'faq3-a' => 'Yes. Most converters produce one image per page and package them in a ZIP file for download.',
    'faq4-q' => 'Will converting to JPG remove the text as selectable content?',
    'faq4-a' => 'Yes. A JPG is a picture, so the text cannot be selected or searched. Keep the original PDF if searchable text is important.',
    'faq5-q' => 'How do I make the image fit a website layout?',
    'faq5-a' => 'Resize the image in an editor to match the layout width. Save a copy in a web-friendly size and compress it before uploading.',
];
