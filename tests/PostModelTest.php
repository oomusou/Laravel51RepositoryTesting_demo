<?php

use App\Post;

class PostModelTest extends TestCase
{
    /**
     * 待測物件
     *
     * @var Post
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
        $this->target = new Post();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->resetDatabase();
        parent::tearDown();
    }

    /**
     * 測試SQLite in Memory是否連線成功
     *
     * @group PostModel
     * @group PostModel0
     */
    public function testConnection()
    {
        // Arrange
        $expected = 0;

        // Act
        $actual = $this->target->all();

        // Assert
        $this->assertCount($expected, $actual);
    }

    /**
     * 測試SQLite in Memory是否寫入成功
     *
     * @group PostModel
     * @group PostModel1
     */
    public function testCreateAndList()
    {
        // Arrange
        $expected = [
            'title' => 'My title',
        ];
        factory(App\Post::class)->create($expected);
        $expectedCount = 1;

        // Act
        $posts = $this->target->all();

        // Assert
        $this->assertCount($expectedCount, $posts);
        $this->seeInDatabase('posts', $expected);
    }
}
