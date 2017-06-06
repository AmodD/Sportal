<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePageContains()
    {
	    $this->get('/')->assertSee('Indian Sportal');
	    $this->get('/')->assertSee('Search');
	    $this->get('/')->assertSee('Log In');
	    $this->get('/')->assertSee('Register');

    }
}
