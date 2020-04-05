<?php

namespace Tests\Feature;

use App\Package;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PackageTest extends TestCase
{
    use DatabaseMigrations;

    public function create_package($args = [], $num = null)
    {
        return factory(Package::class, $num)->create($args);
    }

    /** @test */
    public function user_can_get_all_package()
    {
        $package = $this->create_package();
        $this->get(route('package.index'))
            ->assertOk()
            ->assertSee($package->name);
    }
    
    /** @test */
    public function user_can_see_create_page_of_package()
    {
        $this->get(route('package.create'))
            ->assertOk()
            ->assertSee('Create Package');
    }

    /** @test */
    public function user_can_store_new_package()
    {
        $package = factory(Package::class)->make(['name'=>'Laravel']);
        $this->post(route('package.store'), $package->toArray())
        ->assertRedirect(route('package.index'))
        ->assertSessionHas(['message']);
        $this->assertDatabaseHas('packages', ['name'=>'Laravel']);
    }

    /** @test */
    public function user_can_see_single_package()
    {
        $package = $this->create_package();
        $this->get(route('package.show', $package->id))
        ->assertSee($package->name);
    }
    
    /** @test */
    public function user_can_visit_package_update_page()
    {
        $package = $this->create_package();
        $this->get(route('package.edit', $package->id))
        ->assertSee('Edit Package');
    }

    /** @test */
    public function user_can_update_package()
    {
        $package = $this->create_package();
        $this->put(route('package.update', $package->id), ['name'=>'UpdatedValue'])
        ->assertRedirect(route('package.index'))
        ->assertSessionHas(['message']);
        $this->assertDatabaseHas('packages', ['name'=>'UpdatedValue']);
    }

    /** @test */
    public function user_can_delete_package()
    {
        $package = $this->create_package();
        $this->delete(route('package.destroy', $package->id))->assertStatus(302)
        ->assertRedirect(route('package.index'))
        ->assertSessionHas(['message']);
        $this->assertDatabaseMissing('packages',['name'=>$package->name]);
    }
}
