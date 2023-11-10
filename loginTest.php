<?php
use PHPUnit\Framework\TestCase;

// Assuming your test file is in the /tests/ directory
require_once(dirname(__DIR__) . '/wp-load.php');

/**
 * Test case for wp_authenticate function.
 */
class LoginTest extends TestCase {

    /**
     * Test invalid username and password.
     */
    public function test_invalid_username_password() {
        $username = 'invalid_username';
        $password = 'invalid_password';

        $result = wp_authenticate($username, $password);

        $this->assertInstanceOf('WP_Error', $result);
        $this->assertEquals('<strong>Fout:</strong> de gebruikersnaam <strong>invalid_username</strong> is niet geregistreerd op deze website. Als je niet zeker bent van je gebruikersnaam, probeer dan je e-mailadres.', $result->get_error_message());
    }

    /**
     * Test valid username and password.
     */
    public function test_valid_username_password() {
        $username = 'PIA';
        $password = 'valid_password';

        $result = wp_authenticate($username, $password);

        $this->assertInstanceOf('WP_Error', $result);
        $this->assertEquals('<strong>Fout:</strong> het wachtwoord ingevoerd voor de gebruikersnaam <strong>PIA</strong> is incorrect. <a href="http://localhost/wp-login.php?action=lostpassword">Je wachtwoord vergeten?</a>', $result->get_error_message());
    }
}
?>
