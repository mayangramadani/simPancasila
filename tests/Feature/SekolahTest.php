<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SekolahTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tambah_sekolah()
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post(url('/sekolah/add'), [
                'nama_sekolah' => '123123',
                'derajat' => '21',
                'lokasi' => '123',
                'spp' => '213',
            ]);

        $response->assertStatus(302);
    }
    public function test_edit_sekolah()
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->put(url('/sekolah/1'), [
                'nama_sekolah' => 'test',
                'derajat' => 'test',
                'lokasi' => 'test',
                'spp' => 'test',
            ]);

        $response->assertStatus(302);
    }
    public function test_hapus_sekolah()
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->delete(url('/sekolah/1'), [

            ]);

        $response->assertStatus(302);
    }
    
    
}
