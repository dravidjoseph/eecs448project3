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
    
    public function testTitleShows()
    {
        $this->visit('/')
             ->see('Shows');
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
    
    public function testShowsButton()
    {
        $this->visit('/')
             ->click('Shows')
             ->seePageIs('/shows');
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
    
    public function testLoginFBTitle()
    {
        $this->visit('/login')
             ->see('Login with Facebook');
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
    
    public function testInvalidEmail()
    {
        $this->visit('/login')
             ->type('abc', 'email')
             ->press('Login')
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
    
    /** Forgot password page testing **/
    
    public function testResetPassTitle()
    {
        $this->visit('/password/reset')
             ->see('Reset Password');
    }
    
    public function testResetEmailTitle()
    {
        $this->visit('/password/reset')
             ->see('E-Mail Address');
    }
    
    public function testSendPassResetTitle()
    {
        $this->visit('/password/reset')
             ->see('Send Password Reset Link');
    }
    
    public function testEmptyResetEmail()
    {
        $this->visit('/password/reset')
             ->press('Send Password Reset Link')
             ->see('The email field is required.')
             ->seePageIs('/password/reset');
    }
    
    public function testInvalidResetEmail()
    {
        $this->visit('/password/reset')
             ->type('abc', 'email')
             ->press('Send Password Reset Link')
             ->seePageIs('/password/reset');
    }
    
    /** Fix seePageIs when updated
    public function testValidResetEmail()
    {
        $this->visit('/password/reset')
             ->type('abc@gmail.com', 'email')
             ->press('Send Password Reset Link')
             ->seePageIs('/');
    }
    **/
    
    /** Register page testing **/
    
    public function testRegisterTitle()
    {
        $this->visit('/register')
             ->see('Register');
    }
    
    public function testRegisterNameTitle()
    {
        $this->visit('/register')
             ->see('Name');
    }
    
    public function testRegisterEmailTitle()
    {
        $this->visit('/register')
             ->see('E-Mail Address');
    }
    
    public function testRegisterPasswordTitle()
    {
        $this->visit('/register')
             ->see('Password');
    }
    
    public function testRegisterConfirmTitle()
    {
        $this->visit('/register')
             ->see('Confirm Password');
    }
    
    public function testRegisterEmpty()
    {
        $this->visit('/register')
             ->press('Register')
             ->see('The name field is required.')
             ->see('The email field is required.')
             ->see('The password field is required.')
             ->seePageIs('/register');
    }
    
    
    /**  Need email page to work. If enter any valid email it redirects no matter what.
    
    public function testRegisterNoName()
    {
        $this->visit('/register')
             ->type('abc@gmail.com', 'email')
             ->type('12345', 'password')
             ->type('12345', 'password_confirmation')
             ->press('Register')
             ->see('The name field is required.')
             ->seePageIs('/register');
    }
    
    public function testRegisterNoEmail()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('12345', 'password')
             ->type('12345', 'password_confirmation')
             ->press('Register')
             ->see('The email field is required.')
             ->seePageIs('/register');
    }
    
    public function testRegisterNoPassword()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc@gmail.com', 'email')
             ->press('Register')
             ->see('The password field is required.')
             ->seePageIs('/register');
    }
    
    public function testRegisterNoConfirmPassword()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc@gmail.com', 'email')
             ->type('12345', 'password')
             ->press('Register')
             ->see('The password confirmation does not match.')
             ->seePageIs('/register');
    }
    
    public function testRegisterInvalidConfirmPassword()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc@gmail.com', 'email')
             ->type('12345', 'password')
             ->type('1234', 'password_confirmation')
             ->press('Register')
             ->see('The password confirmation does not match.')
             ->seePageIs('/register');
    }
    
    public function testRegisterInvalidEmail()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc', 'email')
             ->type('12345', 'password')
             ->type('12345', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/register');
    }
    
    public function testRegisterValid()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc@gmail.com', 'email')
             ->type('12345', 'password')
             ->type('12345', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/');  Update to correct url when updated
    }
    **/
    
    /** Search page testing **/
    
    public function testSearchMovieTitle()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->see('Star Wars');
    }
    
    public function testSearchMoreInfoTitle() 
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->see('More Information');
    }
    
    public function testSearchMoreInfoButton()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->click('More Information')
             ->seePageIs('/movie/133474');
    }
    
    
    /** Search results testing **/
    
    public function testResultsMovieTitle()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->click('More Information')
             ->see('Star Wars');
    }
    
    public function testResultsHCYWTitle()   
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->click('More Information')
             ->see('How can you watch?');
    }
    
    public function testResultsParagraph()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->click('More Information')
             ->see('Length')
             ->see('Lucasfilm');
    }
    
    public function testResultsLinkTitle()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->click('More Information')
             ->see('iTunes');
    }
    /** FIgure out how to test
    public function testResultsPlayButton()
    {
        $this->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->click('More Information')
             ->click('.fa-play-circle');
             
    }**/
    
    
    /** Shows page testing **/
    
    public function testShowsHeader()
    {
        $this->visit('/')
             ->click('Shows')
             ->see('Wanna know how to watch your favorite show?');
    }
    
    public function testShowsParagraph()
    {
        $this->visit('/')
             ->click('Shows')
             ->see('Check it out right now!');
    }
    
    public function testShowsSearch()
    {
        $this->visit('/')
             ->click('Shows')
             ->see('Search');
    }
    
    public function testShowsTextBox()
    {
        $this->visit('/')
             ->click('Shows')
             ->see('Type the show name');
    }
    
    public function testShowsSearchButtonEmpty()
    {
        $this->visit('/shows')
             ->press('Search')
             ->seePageIs('/shows')
             ->see('The search field is required.');
    }
    
    public function testShowsSearchRandom()
    {
        $this->visit('/shows')
             ->type('lkajsdkljflasjdfj', 'search')
             ->press('Search')
             ->seePageIs('/shows/search');
    }
    
    public function testShowsSearchButtonValid()
    {
        $this->visit('/shows')
             ->type('the walking dead', 'search')
             ->press('Search')
             ->seePageIs('/shows/search');
    }
    
    /** Shows Search page testing **/
    
    public function testShowsSearchMovieTitle()
    {
        $this->visit('/shows')
             ->type('the walking dead', 'search')
             ->press('Search')
             ->see('the walking dead');
    }
    
    public function testShowsSearchMoreInfoTitle()   
    {
        $this->visit('/shows')
             ->type('the walking dead', 'search')
             ->press('Search')
             ->see('More Information');
    }
    /** wait for update 
    public function testShowsSearchMoreInfoButton()
    {
        $this->visit('/shows')
             ->type('the walking dead', 'search')
             ->press('Search')
             ->click('More Information')
             ->seePageIs('/);
    }
    **/
    
    
}
