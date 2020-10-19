<?php

use PHPUnit\Framework\TestCase;

use App\Sql\QueryBuilder;

class QueryBuilderTest extends TestCase
{
    /** @test */
    public function we_can_build_a_query()
    {
        // Given we create a QueryBuilder with table Comment
        $qb = new QueryBuilder("comment");

        // When I call $qb->getQuery()
        $sql = $qb->getQuery();

        // Then the SQL should be :
        $this->assertEquals(
            "SELECT * FROM comment",
            $sql
        );
    }

    /** @test */
    public function we_can_customize_select()
    {
        // Given we create a QueryBuilder with table Comment
        $qb = new QueryBuilder("comment");

        // When I set a select string
        $qb->select("title, created_at");

        // Then the SQL should be :
        $this->assertEquals(
            "SELECT title, created_at FROM comment",
            $qb->getQuery()
        );
    }

    /** @test */
    public function we_can_customize_where_clause()
    {
        // Given we create a QueryBuilder with table Comment
        $qb = new QueryBuilder("comment");

        // When I set a select string
        $qb->where("article_id = 3");

        // Then the SQL should be :
        $this->assertEquals(
            "SELECT * FROM comment WHERE article_id = 3",
            $qb->getQuery()
        );
    }

    /** @test */
    public function we_can_customize_select_and_where()
    {
        // Given we create a QueryBuilder with table Comment
        $qb = new QueryBuilder("comment");

        // When I set a select string
        $qb->select("title, created_at");
        // And I set a select string
        $qb->where("article_id = 3");

        // Then the SQL should be :
        $this->assertEquals(
            "SELECT title, created_at FROM comment WHERE article_id = 3",
            $qb->getQuery()
        );
    }
}
