use App\Models\Group;
use App\Models\Level;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::factory()->count(3)->create();

        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'Plata']);
        Level::factory()->create(['name' => 'Bronce']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
