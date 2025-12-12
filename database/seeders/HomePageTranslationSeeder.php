<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class HomePageTranslationSeeder extends Seeder
{
    public function run()
    {
        $group = 'homepage';

        $translations = [
            'hero.title' => [
                'fr' => 'Maîtrisez le français avec une experte',
                'ru' => 'Овладейте французским с экспертом',
                'en' => 'Master French with an expert',
            ],
            'hero.description' => [
                'fr' => 'Cours personnalisés avec un professeur vivant en France depuis plus de 20 ans. Méthode moderne et approche individuelle.',
                'ru' => 'Индивидуальные занятия с преподавателем, живущим во Франции более 20 лет. Современная методика и персональный подход.',
                'en' => 'Personalized lessons with a teacher living in France for over 20 years. Modern method and individual approach.',
            ],
            'hero.button' => [
                'fr' => 'LEARN MORE',
                'ru' => 'УЗНАТЬ БОЛЬШЕ',
                'en' => 'LEARN MORE',
            ],

            'motivation.title' => [
                'fr' => 'Pourquoi apprendre le français ?',
                'ru' => 'Зачем учить французский?',
                'en' => 'Why learn French?',
            ],
            'motivation.card1.title' => [
                'fr' => 'Opportunités Professionnelles',
                'ru' => 'Профессиональные возможности',
                'en' => 'Professional Opportunities',
            ],
            'motivation.card1.text' => [
                'fr' => 'Le français est parlé dans 29 pays et ouvre les portes des organisations internationales et des entreprises multinationales.',
                'ru' => 'Французский язык используется в 29 странах и открывает двери в международные организации и компании.',
                'en' => 'French is spoken in 29 countries and opens doors to international organizations and multinational companies.',
            ],
            'motivation.card2.title' => [
                'fr' => 'Voyage et Culture',
                'ru' => 'Путешествия и культура',
                'en' => 'Travel and Culture',
            ],
            'motivation.card2.text' => [
                'fr' => 'Explorez la France, le Canada, la Suisse et de nombreux autres pays francophones en toute confiance.',
                'ru' => 'Исследуйте Францию, Канаду, Швейцарию и другие франкоязычные страны с уверенностью.',
                'en' => 'Explore France, Canada, Switzerland, and many other French-speaking countries with confidence.',
            ],
            'motivation.card3.title' => [
                'fr' => 'Développement Cérébral',
                'ru' => 'Развитие мозга',
                'en' => 'Brain Development',
            ],
            'motivation.card3.text' => [
                'fr' => 'L\'apprentissage d\'une langue étrangère améliore la mémoire, la concentration et les capacités d\'analyse.',
                'ru' => 'Изучение иностранного языка улучшает память, концентрацию и аналитические способности.',
                'en' => 'Learning a foreign language improves memory, concentration, and analytical skills.',
            ],

            'test.title' => [
                'fr' => 'Découvrez votre niveau de français',
                'ru' => 'Узнайте свой уровень французского',
                'en' => 'Discover your French level',
            ],
            'test.description' => [
                'fr' => 'Passez notre test gratuit et recevez une évaluation précise de votre niveau avec des recommandations personnalisées.',
                'ru' => 'Пройдите наш бесплатный тест и получите точную оценку уровня с персональными рекомендациями.',
                'en' => 'Take our free test and receive an accurate level assessment with personalized recommendations.',
            ],
            'test.button' => [
                'fr' => 'PASSER LE TEST',
                'ru' => 'ПРОЙТИ ТЕСТ',
                'en' => 'TAKE THE TEST',
            ],

            'about.title' => [
                'fr' => 'Pourquoi apprendre avec Albina ?',
                'ru' => 'Почему стоит учиться у Альбины?',
                'en' => 'Why learn with Albina?',
            ],
            'about.card1.title' => [
                'fr' => '20 ans en France',
                'ru' => '20 лет во Франции',
                'en' => '20 years in France',
            ],
            'about.card1.text' => [
                'fr' => 'Vit et travaille en France depuis plus de deux décennies. Connaissance approfondie de la langue et de la culture française moderne.',
                'ru' => 'Живёт и работает во Франции более 20 лет. Глубокое знание языка и современной культуры.',
                'en' => 'Has lived and worked in France for over 20 years. Deep knowledge of modern French language and culture.',
            ],
            'about.card2.title' => [
                'fr' => '10 ans d\'expérience',
                'ru' => '10 лет опыта',
                'en' => '10 years of experience',
            ],
            'about.card2.text' => [
                'fr' => 'Plus de 10 ans d\'enseignement du français aux adultes et aux enfants. Méthodes éprouvées et résultats garantis.',
                'ru' => 'Более 10 лет преподавания французского детям и взрослым. Проверенные методы и гарантированный результат.',
                'en' => 'Over 10 years of teaching French to adults and children. Proven methods and guaranteed results.',
            ],
            'about.card3.title' => [
                'fr' => 'Approche personnalisée',
                'ru' => 'Индивидуальный подход',
                'en' => 'Personalized approach',
            ],
            'about.card3.text' => [
                'fr' => 'Programme adapté à vos objectifs et votre niveau. Soutien constant et atmosphère bienveillante pour chaque élève.',
                'ru' => 'Программа адаптирована под ваши цели и уровень. Постоянная поддержка и доброжелательная атмосфера.',
                'en' => 'Program tailored to your goals and level. Ongoing support and a caring atmosphere for every student.',
            ],

            'testimonials.title' => [
                'fr' => 'TÉMOIGNAGES',
                'ru' => 'ОТЗЫВЫ',
                'en' => 'TESTIMONIALS',
            ],
            'testimonial.1.name' => [
                'fr' => 'Lillian Nelson',
                'ru' => 'Лиллиан Нельсон',
                'en' => 'Lillian Nelson',
            ],
            'testimonial.1.text' => [
                'fr' => 'Business School fournit d\'excellentes ressources et programmes pour les cadres et chefs d\'entreprise.',
                'ru' => 'Бизнес-школа предоставляет отличные ресурсы и программы для руководителей и владельцев компаний.',
                'en' => 'Business School provides great resources and programs for executives and business owners.',
            ],
            'testimonial.2.name' => [
                'fr' => 'Marc Dubois',
                'ru' => 'Марк Дюбуа',
                'en' => 'Marc Dubois',
            ],
            'testimonial.2.text' => [
                'fr' => 'Les cours d\'Albina ont transformé mon approche du français. En seulement 3 mois, je peux participer aux réunions en français avec confiance.',
                'ru' => 'Занятия с Альбиной изменили мой подход к французскому. Уже через 3 месяца я уверенно участвую во встречах.',
                'en' => 'Albina\'s lessons transformed my approach to French. After just 3 months, I confidently join meetings in French.',
            ],
            'testimonial.3.name' => [
                'fr' => 'Sophie Martin',
                'ru' => 'Софи Мартен',
                'en' => 'Sophie Martin',
            ],
            'testimonial.3.text' => [
                'fr' => 'Une méthode d\'enseignement exceptionnelle qui s\'adapte parfaitement aux besoins professionnels. Je recommande vivement!',
                'ru' => 'Уникальная методика, идеально подходящая для профессиональных целей. Очень рекомендую!',
                'en' => 'An exceptional teaching method that perfectly fits professional needs. Highly recommended!',
            ],
        ];

        foreach ($translations as $key => $locales) {
            foreach ($locales as $locale => $value) {
                Translation::updateOrCreate([
                    'group' => $group,
                    'key' => $key,
                    'locale' => $locale,
                ], [
                    'value' => $value,
                ]);
            }
        }
    }
}
