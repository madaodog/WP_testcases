<?php
use PHPUnit\Framework\TestCase;

require_once(dirname(__DIR__) . '/wp-load.php');
require_once(dirname(__DIR__)  . '/wp-content/plugins/akismet/akismet.php');


// We require an API key to test this function
// But the current setup should be suffice as long as the API key is valid

class AkismetTest extends TestCase {
    public function testAutoCheckComment() {
        $commentdata = array(
            'comment_content'         => 'This is a test comment. Hello, world!',
            'user_IP'                 => '192.168.1.1',  // Example IP address, replace with actual IP
            'user_agent'              => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'referrer'                => 'https://example.com',
            'blog'                    => 'https://yourwordpresssite.com',
            'blog_lang'               => 'en_US',
            'blog_charset'            => 'UTF-8',
            'permalink'               => 'https://yourwordpresssite.com/sample-post/',
            'user_ID'                 => 1,  // Example user ID, if available
            'user_role'               => 'subscriber',  // Example user role
            'akismet_comment_nonce'   => 'passed',  // Example nonce result
            'is_test'                 => 'true',  // Example test mode
            'POST_some_custom_field'  => 'custom_value',  // Example custom field from POST data
            // ... other relevant data ...
        );

        $result = Akismet::auto_check_comment($commentdata);
        var_dump($result);
        $this->assertArrayHasKey('akismet_result', $result);
    }
}
?>
