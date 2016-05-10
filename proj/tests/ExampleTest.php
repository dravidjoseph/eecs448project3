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
    /**
    public function testSearchButtonEmpty()
    {
        $this->visit('/')
             ->press('Search')
             ->seePageIs('/search');
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
    **/
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
}
