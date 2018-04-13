<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;


abstract class DBTest extends TestCase
{
    use CreatesApplication, DatabaseMigrations;
}
