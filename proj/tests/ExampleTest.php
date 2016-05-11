<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    
    /** Index (main) page testing **/
    
    public function testHeader()
    {
        $this->visit('/')
             ->see('Rock Chalk JayMovies')
             ->see('Home')
             ->see('Login')
             ->see('Register')
             ->see('Shows')
             ->see('Movies');
    }
    
    public function testSearchButtonEmpty()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->see('Type the movie name')
             ->press('Search')
             ->see('The search field is required.');
    }

    public function testSearchButtonValid()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->seePageIs('/search');
    }
 
    public function testRCJButton()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->click('Rock Chalk JayMovies')
             ->seePageIs('/');
    }
    
    public function testShowsButton()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->click('Shows')
             ->seePageIs('/shows');
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
    
    public function testLoginFields()
    {
        $this->visit('/login')
             ->see('E-Mail Address')
             ->see('Password')
             ->see('Remember Me')
             ->see('Forgot Your Password?')
             ->see('Login with Facebook');
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
    
    public function testValidEmailPassword()
    {
        $user = factory(App\User::class)->create([
            "name" => "Test Name",
            "password" => bcrypt("123456")
        ]);

        $this->visit('/login')
             ->type($user->email, 'email')
             ->type("123456", 'password')
             ->press('Login')
             ->seePageIs('/');
    }
    
    public function testFYPLink()
    {
        $this->visit('/login')
             ->click('Forgot Your Password?')
             ->seePageIs('/password/reset');
    }
    
    /** Forgot password page testing **/
    
    public function testResetFields()
    {
        $this->visit('/password/reset')
             ->see('Reset Password')
             ->see('E-Mail Address')
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
    
    /** Register page testing **/
    
    public function testRegisterFields()
    {
        $this->visit('/register')
             ->see('Register')
             ->see('Name')
             ->see('E-Mail Address')
             ->see('Password')
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
    
    public function testRegisterNoName()
    {
        $this->visit('/register')
             ->type('abc@gmail.com', 'email')
             ->type('123456', 'password')
             ->type('123456', 'password_confirmation')
             ->press('Register')
             ->see('The name field is required.')
             ->seePageIs('/register');
    }
    
    public function testRegisterNoEmail()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('123456', 'password')
             ->type('123456', 'password_confirmation')
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
             ->type('123456', 'password')
             ->press('Register')
             ->see('The password confirmation does not match.')
             ->seePageIs('/register');
    }
    
    public function testRegisterInvalidConfirmPassword()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc@gmail.com', 'email')
             ->type('123456', 'password')
             ->type('123457', 'password_confirmation')
             ->press('Register')
             ->see('The password confirmation does not match.')
             ->seePageIs('/register');
    }
    
    public function testRegisterInvalidEmail()
    {
        $this->visit('/register')
             ->type('Richard', 'name')
             ->type('abc', 'email')
             ->type('123456', 'password')
             ->type('123456', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/register');
    }
    
    public function testRegisterValid()
    {
        $user = factory(App\User::class)->make();

        $this->visit('/register')
             ->type($user->name, 'name')
             ->type($user->email, 'email')
             ->type('123456', 'password')
             ->type('123456', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/');
    }
    
    /** Search page testing **/
    
    public function testSearchMovieTitle()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->type('Star Wars', 'search')
             ->press('Search')
             ->see('Star Wars')
             ->see('More Information')
             ->click('More Information')
             ->seePageIs('/movie/133474')
             ->see('How can you watch?')
             ->see('Length')
             ->see('Lucasfilm')
             ->see('iTunes');
    }
    
    /** Shows page testing **/
    
    public function testShowsHeader()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->click('Shows')
             ->see('Wanna know how to watch your favorite show?')
             ->see('Check it out right now!')
             ->see('Search')
             ->see('Type the show name');
    }
    
    public function testShowsSearchButtonEmpty()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/shows')
             ->press('Search')
             ->seePageIs('/shows')
             ->see('The search field is required.');
    }
    
    public function testShowsSearchButtonValid()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/shows')
             ->type('the walking dead', 'search')
             ->press('Search')
             ->seePageIs('/shows/search')
             ->see('the walking dead')
             ->see('More Information')
             ->click('More Information');
    }
}
