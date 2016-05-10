<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    /** Index (main) page testing **/
    
    public function testTitle()
    {
        $this->visit('/')
             ->see('Rock Chalk JayMovies');
    }
    
    public function testTitleHome()
    {
        $this->visit('/')
             ->see('Home');
    }
    
    public function testTitleLogin()
    {
        $this->visit('/')
             ->see('Login');
    }
    
    public function testTitleRegister()
    {
        $this->visit('/')
             ->see('Register');
    }
    
    public function testHeader()
    {
        $this->visit('/')
             ->see('Wanna know how to watch your favorite movie?');
    }
    
    public function testParagraph()
    {
        $this->visit('/')
             ->see('Check it out right now!');
    }
    
    public function testSearch()
    {
        $this->visit('/')
             ->see('Search');
    }
    
    public function testInputBox()
    {
        $this->visit('/')
             ->see('Type the movie name');
    }
    
    public function testSearchButtonEmpty()
    {
        $this->visit('/')
             ->press('Search')
             ->seePageIs('/')
             ->see('The search field is required.');
    }
    
    public function testSearchRandom()
    {
        $this->visit('/')
             ->type('lkajsdkljflasjdfj', 'search')
             ->press('Search')
             ->seePageIs('/search');
    }
    
    public function testSearchButtonValid()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->seePageIs('/search');
    }
    
    public function testRCJButton()
    {
        $this->visit('/')
             ->click('Rock Chalk JayMovies')
             ->seePageIs('/');
    }
    
    public function testHomeButton()
    {
        $this->visit('/')
             ->click('Home')
             ->seePageIs('/login');
    }
    
    public function testLoginButton()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login');
    }
    
    public function testRegisterButton()
    {
        $this->visit('/')
             ->click('Register')
             ->seePageIs('/register');
    }
    
    
    /** Login page testing **/
    
    public function testLoginEmailTitle()
    {
        $this->visit('/login')
             ->see('E-Mail Address');
    }
    
    public function testPasswordTitle()
    {
        $this->visit('/login')
             ->see('Password');
    }
    
    public function testRememberMeTitle()
    {
        $this->visit('/login')
             ->see('Remember Me');
    }
    
    public function testFYPTitle()
    {
        $this->visit('/login')
             ->see('Forgot Your Password?');
    }
    
    public function testCheckBox()
    {
        $this->visit('/login')
             ->check('remember');
    }
    
    public function testEmptyEmailPassword()
    {
        $this->visit('/login')
             ->press('Login')
             ->see('The email field is required.')
             ->see('The password field is required.')
             ->seePageIs('/login');
    }
    
    public function testEmptyPassword()
    {
        $this->visit('/login')
             ->type('abc@gmail.com', 'email')
             ->press('Login')
             ->see('The password field is required.')
             ->seePageIs('/login');
    }
    
    public function testEmptyEmail()
    {
        $this->visit('/login')
             ->type('12345', 'password')
             ->press('Login')
             ->see('The email field is required.')
             ->seePageIs('/login');
    }
    
    /**
    public function testValidEmailPassword()
    {
        $this->visit('/login')
             ->type('abc@gmail.com', 'email')
             ->type('12345', 'password')
             ->press('Login')
             ->seePageIs('/login');
    }
    
    Add function for checked box + correct input
    Ask abaout rechecking the nav bar links
    
    **/
    
    public function testFYPLink()
    {
        $this->visit('/login')
             ->click('Forgot Your Password?')
             ->seePageIs('/password/reset');
    }
    
    
    
    
}
