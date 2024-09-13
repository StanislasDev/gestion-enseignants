<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = collect(['Production animale',
        'Production végétale','Infographie et Web Design','Maintenance des S.I','Génie logiciel',
                'Hôtellerie',
                'Restauration',
                'Tourisme et loisir',
                'Industrie du textile et de habillement',
                'Conception',
                'Bâtiment',
                'Travaux Publics',
                'Banque et Finance',
                'Comptabilité et gestion des entreprises',
                'Management évènementiel',
            'Topographe et géomètre',
            'Gestion logistique et transport',
            'Gestion des ressources humaines',
            'Marketing-Commerce-Vente',
            'Esthétique et cosmétique',
        'Coiffure',
        'Puériculture et gérontologie',
        'Sage-femme/Maïticien', 'Sciences infirmières', 'Kinésithérapie', 'Techniques de laboratoires et analyses médicales',
        ]);

        $options->each(fn ($option) => Option::create([
            'nom' => $option,
            'slug' => Str::slug($option),
        ]));
    }
}
