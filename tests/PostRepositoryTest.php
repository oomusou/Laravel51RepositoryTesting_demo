<?php

use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostRepositoryTest extends TestCase
{
    /**
     * 待測物件
     *
     * @var PostRepository
     */
    protected $target;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->initDatabase();
        $this->target = $this->app->make(PostRepository::class);
    }



    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->resetDatabase();
        $this->target = null;
        parent::tearDown();
    }

    /**
     * 測試傳回最新3筆文章
     *
     * @group PostRepository
     * @group PostRepository0
     */

    public function testGetLatest3Posts()
    {
        // Arrange
        factory(App\Post::class, 100)->create();

        $expected = new Collection([
                100,
                99,
                98,
        ]);

        // Act
        $actual = $this->target
            ->getLatest3Posts()
            ->pluck('id'); // 只取[id]欄位的collection

        // Assert
        $this->assertEquals($expected, $actual);
    }
}