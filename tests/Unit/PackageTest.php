<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PackageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
public function it_belongs_to_created_by()
{
    $created_by = factory(\App\User::class)->create();
    $Package  = factory(\App\Package::class)->create(['created_by_id' => $created_by->id]);
    $this->assertInstanceOf(\App\User::class, $Package->created_by);
}
}
