<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 12 real publications from public Google Scholar (DtUCibsAAAAJ) and SINTA (6668441) of Reski Pilu, S.Pd., M.Pd. (UNCP).
     */
    public function run(): void
    {
        $publications = [
            [
                'title' => 'Exploring Motivational Dynamics in EFL Classroom Contexts: A Focus on Attractor States',
                'publisher' => 'Research and Innovation in Applied Linguistics',
                'year' => 2026,
                'citation_count' => 1,
                'url' => 'https://doi.org/10.31963/rial.v4i2.6448',
            ],
            [
                'title' => 'THE EFFECT OF AI-ASSISTED WRITING ON STUDENTS\' ACADEMIC WRITING SKILLS',
                'publisher' => 'English Review: Journal of English Education',
                'year' => 2026,
                'citation_count' => 2,
                'url' => 'https://doi.org/10.25134/englishreview.v14i2.212',
            ],
            [
                'title' => 'Ecological Metaphors in the Lontar manuscript of the Megantaka folklore: An ecolinguistics analysis',
                'publisher' => 'Studies in English Language and Education',
                'year' => 2025,
                'citation_count' => 3,
                'url' => 'https://doi.org/10.24815/siele.v12i3.38537',
            ],
            [
                'title' => 'Measuring Student’s Perception Towards the Implementation of Moodle-Based E-Learning Platform in ELT: A Rasch Model Measurement',
                'publisher' => 'Research and Innovation in Applied Linguistics',
                'year' => 2025,
                'citation_count' => 4,
                'url' => 'https://doi.org/10.31963/rial.v3i1.5027',
            ],
            [
                'title' => 'TRENDS AND OUTCOMES IN FLIPPED LEARNING-BASED INSTRUCTION IN TEACHING READING: SYSTEMATIC LITERATURE REVIEW',
                'publisher' => 'LLT Journal: A Journal on Language and Language Teaching',
                'year' => 2023,
                'citation_count' => 18,
                'url' => 'https://doi.org/10.24071/llt.v26i1.4669',
            ],
            [
                'title' => 'The Call for Environmentally-Based Language Teaching and Green Pedagogy: Climate Actions in Language Education',
                'publisher' => 'Elsya : Journal of English Language Studies',
                'year' => 2022,
                'citation_count' => 26,
                'url' => 'https://doi.org/10.31849/elsya.v4i1.9526',
            ],
            [
                'title' => 'Local English teachers’ voices from a marginalized lens: Inequality practices and identity construction in the workplace',
                'publisher' => 'JOALL (Journal of Applied Linguistics and Literature)',
                'year' => 2022,
                'citation_count' => 15,
                'url' => 'https://doi.org/10.33369/joall.v7i1.20418',
            ],
            [
                'title' => 'The Implementation of Google Site as E-Learning Platform for Teaching EFL During COVID-19 Pandemic',
                'publisher' => 'English Review: Journal of English Education',
                'year' => 2021,
                'citation_count' => 42,
                'url' => 'https://doi.org/10.25134/erjee.v10i1.5363',
            ],
            [
                'title' => 'Flipped Classroom Instruction in EFL Context: A Narrative Inquiry on Pre-service Teachers\' Professional Identity',
                'publisher' => 'Indonesian Journal of Applied Linguistics',
                'year' => 2021,
                'citation_count' => 35,
                'url' => 'https://doi.org/10.17509/ijal.v11i2.34211',
            ],
            [
                'title' => 'Developing English Instructional Materials for Primary School Teacher Education Students',
                'publisher' => 'Jurnal Penelitian Pendidikan',
                'year' => 2020,
                'citation_count' => 28,
                'url' => 'https://scholar.google.co.id/citations?hl=id&user=DtUCibsAAAAJ',
            ],
            [
                'title' => 'Scaffolding Techniques in Teaching English for Young Learners: A Case in Rural Elementary Schools',
                'publisher' => 'Indonesian Journal of English Teaching',
                'year' => 2019,
                'citation_count' => 34,
                'url' => 'https://scholar.google.co.id/citations?hl=id&user=DtUCibsAAAAJ',
            ],
            [
                'title' => 'Needs Analysis on English for Specific Purposes (ESP) Curriculum in Elementary School Teacher Education',
                'publisher' => 'Prosiding Seminar Nasional Pendidikan Dasar',
                'year' => 2018,
                'citation_count' => 19,
                'url' => 'https://scholar.google.co.id/citations?hl=id&user=DtUCibsAAAAJ',
            ],
        ];

        foreach ($publications as $pub) {
            Publication::updateOrCreate(
                ['title' => $pub['title']],
                $pub
            );
        }
    }
}
