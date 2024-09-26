use App\Models\Group;
use App\Models\Level;
use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea 3 grupos
        Group::factory()->count(3)->create();

        // Crea niveles con nombres específicos
        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'Plata']);
        Level::factory()->create(['name' => 'Bronce']);

        // Crea 5 usuarios con perfiles, localizaciones, grupos e imágenes
        User::factory()->count(5)->create()->each(function ($user) {
            // Crea un perfil y lo asocia al usuario
            $profile = $user->profile()->save(Profile::factory()->make());

            // Crea una localización y la asocia al perfil
            $profile->location()->save(Location::factory()->make());

            // Asocia el usuario a varios grupos
            $user->groups()->attach($this->array(rand(1, 3)));

            // Crea una imagen y la asocia al usuario
            $user->image()->save(Image::factory()->make([
                'url' => 'https://lorempixel.com/90/90/' // URL ficticia
            ]));
        });

        // Crea un usuario de prueba específico
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    // Método para generar un array de valores
    public function array($max)
    {
        $values = [];

        for ($i = 1; $i <= $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }
}
