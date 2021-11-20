<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Note;

class NoteTest extends TestCase
{
    public function setUp(): void
    {
      parent::setUp();

      // マイグレーション実行
      $this->artisan('migrate');

      // テストデータ投入 seeder使うのもあり
      Note::factory()->create([
        'id' => 1,
        'title' => '削除したメモです',
        'deleted_at' => '2021-11-20 09:50:00', // 削除済データ
      ]);
      Note::factory()->create([
        'id' => 2,
        'title' => '生きてるメモです',
      ]);
    }

    /**
     * @return void
     */
    public function test_論理削除フラグONのデータがnullであること()
    {
      $result = Note::find(1);
      $this->assertNull($result);
    }

    /**
     * @return void
     */
    public function test_論理削除フラグOFFのデータがnullでないこと()
    {
      $result = Note::find(2);
      $this->assertNotNull($result);
    }

    /**
     * @return void
     */
    public function test_論理削除フラグONのデータが一覧に含まれないこと()
    {
      $result = Note::all()->pluck('id');
      $expected = Note::hydrate([
        [
          'id' => 2,
          'title' => '生きてるメモです',
        ],
      ])->pluck('id');
      $this->assertEquals($result, $expected);
    }
}
