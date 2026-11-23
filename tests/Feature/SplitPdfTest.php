<?php

namespace Tests\Feature;

use Tests\TestCase;

class SplitPdfTest extends TestCase
{
    public function test_split_pdf_page_loads_successfully(): void
    {
        $response = $this->get('/split-pdf');
        $response->assertStatus(200);
        $response->assertSee('Split PDF');
    }

    public function test_split_pdf_localized_page_loads_successfully(): void
    {
        $response = $this->get('/es/split-pdf');
        $response->assertStatus(200);
    }

    public function test_split_pdf_validation_fails_without_file(): void
    {
        $response = $this->post('/split-pdf', [
            'split_mode' => 'ranges',
            'ranges'     => '1-3',
        ]);
        $response->assertSessionHasErrors(['files']);
    }

    public function test_split_pdf_validation_fails_without_range_value(): void
    {
        $response = $this->post('/split-pdf', [
            'split_mode' => 'ranges',
        ]);
        $response->assertSessionHasErrors(['ranges', 'files']);
    }

    public function test_split_pdf_guide_blog_loads_successfully(): void
    {
        $response = $this->get('/how-to-split-pdf-files-into-multiple-pages-2026-guide');
        $response->assertStatus(200);
    }

    public function test_split_pdf_shows_result_section_with_session_data(): void
    {
        $sessionData = [
            'split_api_response' => [
                'detail' => 'PDF split completed successfully',
                'data'   => [
                    'files' => [
                        [
                            'filename' => 'split_part_1.pdf',
                            'url'      => 'https://example.com/part1.pdf',
                            'size'     => '120 KB',
                        ],
                        [
                            'filename' => 'split_part_2.pdf',
                            'url'      => 'https://example.com/part2.pdf',
                            'size'     => '150 KB',
                        ]
                    ]
                ]
            ],
            'split_download_urls'     => ['https://example.com/part1.pdf', 'https://example.com/part2.pdf'],
            'split_original_filename' => 'sample_doc.pdf',
        ];

        $response = $this->withSession($sessionData)->get('/split-pdf');
        $response->assertStatus(200);
        $response->assertSee('sample_doc.pdf');
        $response->assertSee('split_part_1.pdf');
        $response->assertSee('split_part_2.pdf');
        $response->assertSee('Download All (ZIP)');
    }

    public function test_split_pdf_from_url_validation(): void
    {
        $response = $this->postJson('/split-pdf/from-url', [
            'split_mode' => 'ranges',
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['file_url']);
    }

    public function test_split_pdf_download_without_url_aborts(): void
    {
        $response = $this->get('/split-pdf/download');
        $response->assertStatus(404);
    }

    public function test_split_pdf_download_zip_without_urls_aborts(): void
    {
        $response = $this->post('/split-pdf/download-zip', []);
        $response->assertStatus(400);
    }
}
