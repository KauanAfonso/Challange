<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Versiculo;

class VersiculoSeeder extends Seeder
{
    public function run(): void
    {
        $versiculos = [
            [
                'livro' => 'Salmos',
                'capitulo' => '23',
                'versiculo' => '1',
                'meditacao' => 'Deus cuida de nós como um bom pastor. Confie que Ele proverá tudo que você precisa.',
            ],
            [
                'livro' => 'Filipenses',
                'capitulo' => '4',
                'versiculo' => '13',
                'meditacao' => 'Você pode vencer qualquer dificuldade com a força que vem de Cristo.',
            ],
            [
                'livro' => 'Provérbios',
                'capitulo' => '3',
                'versiculo' => '5',
                'meditacao' => 'Não dependa apenas do seu entendimento — confie no Senhor de todo o coração.',
            ],
            [
                'livro' => 'Mateus',
                'capitulo' => '6',
                'versiculo' => '33',
                'meditacao' => 'Busque a Deus em primeiro lugar e Ele cuidará do resto.',
            ],
            [
                'livro' => 'Isaías',
                'capitulo' => '41',
                'versiculo' => '10',
                'meditacao' => 'Não tenha medo: Deus está com você e te fortalece.',
            ],
        ];

        foreach ($versiculos as $versiculo) {
            Versiculo::create($versiculo);
        }
    }
}
