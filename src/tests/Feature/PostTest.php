<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    private const TABLE_NAME = 'posts';

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_投稿できる_正常(): void
    {
        $url = '/api/post';

        $query = [
            'title'      => 'テストタイトル',
            'content'    => 'テストコンテンツ',
        ];

        $response = $this->json('POST', $url, $query);

        $response->assertStatus(200);
        $this->assertDatabaseCount(self::TABLE_NAME, 1);
        $response->assertJsonFragment([
            'id'         => 1,
            'title'      => 'テストタイトル',
            'content'    => 'テストコンテンツ',
        ]);
    }
}
