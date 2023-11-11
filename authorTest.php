<?php
use PHPUnit\Framework\TestCase;

require_once(dirname(__DIR__) . '/wp-load.php');

class AuthorTest extends TestCase {

    function test_get_author_posts_url_with_author_id() {
        $author_id = 1;
        $url = get_author_posts_url( $author_id );
        $author_nicename = get_the_author_meta( 'user_nicename', $author_id );
        $this->assertStringContainsString('/author/' . $author_nicename,$url);
    }

    function test_get_author_posts_url_with_author_nicename() {
        $author_id = 1;
        $author_nicename = 'PIA';
        $url = get_author_posts_url( $author_id, $author_nicename );
        $this->assertStringContainsString( $author_nicename, $url );
    }

    function test_get_author_posts_url_with_empty_author_nicename() {
        $author_id = 2;
        $author_nicename = '';
        $nicename = get_the_author_meta( 'user_nicename', $author_id );
        $url = get_author_posts_url( $author_id, $author_nicename );
        $this->assertStringContainsString( '/author/' . $nicename,  $url);
    }

    function test_get_author_posts_url_with_empty_link() {
        global $wp_rewrite;
        $wp_rewrite->author_structure = '';
        $author_id = 1;
        $url = get_author_posts_url( $author_id );
        $this->assertStringContainsString( '?author=' . $author_id, $url );
    }

}
?>
