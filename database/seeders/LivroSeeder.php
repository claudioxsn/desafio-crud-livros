<?php

namespace Database\Seeders;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titulos = [
            'O Código da Vida',
            'A Jornada do Herói',
            'Segredos da Mente',
            'Os Mistérios do Tempo',
            'História de um Guerreiro',
            'Caminhos da Alma',
            'A Última Cidade',
            'Crônicas de um Viajante',
            'Além do Infinito',
            'Sombras do Amanhã',
            'Fragmentos do Passado',
            'O Fim da Inocência',
            'No Coração da Tempestade',
            'O Despertar do Gigante',
            'Guardião das Sombras',
            'Entre o Céu e o Inferno',
            'Códigos Perdidos',
            'Horizonte de Fogo',
            'A Fúria dos Deuses',
            'Reino dos Sonhos'
        ];

        $editoras = ['Novatec', 'Atlas', 'Pearson', 'Campus', 'Alta Books'];
        $anos = range(2000, 2024);

        $autores = Autor::pluck('id')->toArray();
        $assuntos = Assunto::pluck('id')->toArray();

        foreach ($titulos as $titulo) {
            $livro = Livro::create([
                'titulo' => $titulo,
                'editora' => fake()->randomElement($editoras),
                'edicao' => fake()->numberBetween(1, 10),
                'ano_publicacao' => fake()->randomElement($anos),
                'valor' => fake()->randomFloat(2, 30, 150),
            ]);

            $autorIds = fake()->randomElements($autores, rand(2, 4));
            $assuntoIds = fake()->randomElements($assuntos, rand(2, 5));

            $livro->autores()->attach($autorIds);
            $livro->assuntos()->attach($assuntoIds);
        }
    }
}
