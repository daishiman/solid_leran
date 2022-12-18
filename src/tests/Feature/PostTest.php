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
     *
     * @return void
     */
    public function test_投稿できる_正常(): void
    {
        $url = '/api/post';

        $query = [
            'title'   => 'テストタイトル',
            'content' => 'テストコンテンツ',
        ];

        $response = $this->json('POST', $url, $query);

        $response->assertStatus(201);
        $this->assertDatabaseCount(self::TABLE_NAME, 1);
        $response->assertJsonFragment([
            'id'      => 1,
            'title'   => 'テストタイトル',
            'content' => 'テストコンテンツ',
        ]);
    }

    /**
     *
     * @return void
     */
    public function test_バリデーションエラー_異常系(): void
    {
        $url = '/api/post';

        $query = [
            'title'   => null,
            'content' => null,
        ];

        $response = $this->json('POST', $url, $query);

        $response->assertStatus(400);
        $this->assertDatabaseCount(self::TABLE_NAME, 0);
    }
}
