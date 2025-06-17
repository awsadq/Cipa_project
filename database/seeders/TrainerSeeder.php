<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;

class TrainerSeeder extends Seeder
{
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'Койчуманова Джамиля Азатовна',
                'position' => 'Аудитор',
                'bio' => 'CIPA, ACCA ДипИФР (rus).',
                'photo' => 'trainers/jamila.jpg',
            ],
            [
                'name' => 'Ахматова Гульнара Кочкаровна',
                'position' => 'Юрист, адвокат',
                'bio' => 'Эксперт в области трудового права, кадрового делопроизводства.',
                'photo' => 'trainers/gulnara_a.jpg',
            ],
            [
                'name' => 'Ускенбаева Гульнара Тураровна',
                'position' => 'Аудитор, налоговый консультант',
                'bio' => 'CIPA, Внутренний аудитор, Риск-менеджер.',
                'photo' => 'trainers/gulnara_u.jpg',
            ],
            [
                'name' => 'Донобаева Анна',
                'position' => 'Юрист, адвокат',
                'bio' => 'Сертифицированный тренер по программе CIPA.',
                'photo' => 'trainers/anna.jpg',
            ],
            [
                'name' => 'Айгуль Чертанова',
                'position' => 'Эксперт',
                'bio' => 'Создание эффективных команд и систем.',
                'photo' => 'trainers/chertanova.jpg',
            ],
            [
                'name' => 'Джамал Джолдошалиева',
                'position' => 'Консультант',
                'bio' => 'Стратегическое и организационное развитие.',
                'photo' => 'trainers/jamal.jpg',
            ],
            [
                'name' => 'Лейла Мирзахмедова',
                'position' => 'Тренер',
                'bio' => 'CIMA Cert PM, CIPA, DipIFR (rus), финансы и аудит.',
                'photo' => 'trainers/leyla.jpg',
            ],
            [
                'name' => 'Огнечук Оксана',
                'position' => 'Эксперт-методолог',
                'bio' => 'CIPA, DipIFR, Международные стандарты.',
                'photo' => 'trainers/oksana_o.jpg',
            ],
            [
                'name' => 'Шаршенова Бюбомариям',
                'position' => 'Аудитор',
                'bio' => 'CIA, CAP, опыт более 25 лет, внутренний аудит.',
                'photo' => 'trainers/bubomariyam.jpg',
            ],
            [
                'name' => 'Асель Алдашева',
                'position' => 'Тренер',
                'bio' => 'CAP, эксперт по управлению, анализу и бюджетированию.',
                'photo' => 'trainers/asel.jpg',
            ],
            [
                'name' => 'Жусуматова Салтанат',
                'position' => 'Риск-менеджер',
                'bio' => 'CAP, GARP, эксперт по управлению рисками.',
                'photo' => 'trainers/saltanat.jpg',
            ],
            [
                'name' => 'Ускенбаева Эльмира',
                'position' => 'Аудитор',
                'bio' => 'CAP, сертифицированный тренер по программе CIPA.',
                'photo' => 'trainers/elmira.jpg',
            ],
            [
                'name' => 'Хасанова Айнура Мелисовна',
                'position' => 'Тренер',
                'bio' => 'CIPA.',
                'photo' => 'trainers/aynura.jpg',
            ],
            [
                'name' => 'Биримкулова Ахар Дуйшенбековна',
                'position' => 'Доцент',
                'bio' => 'CIPA, Кандидат экономических наук.',
                'photo' => 'trainers/akhar.jpg',
            ],
            [
                'name' => 'Суеркулова Айсулуу',
                'position' => 'Бизнес-консультант',
                'bio' => 'CAP, аналитик.',
                'photo' => 'trainers/aysuluu.jpg',
            ],
            [
                'name' => 'Землянская Елена Георгиевна',
                'position' => 'Тренер',
                'bio' => 'Программа CIPA, сертифицированный практик.',
                'photo' => 'trainers/elena.jpg',
            ],
            [
                'name' => 'Ан Роза',
                'position' => 'Аудитор',
                'bio' => 'CAP.',
                'photo' => 'trainers/roza.jpg',
            ],
            [
                'name' => 'Байсеркеев Бактыбек',
                'position' => 'Эксперт',
                'bio' => 'По таможенным процедурам, полковник, опыт 20+ лет.',
                'photo' => 'trainers/baktybek.jpg',
            ],
            [
                'name' => 'Галимова Ольга Анатольевна',
                'position' => 'Сертифицированный тренер',
                'bio' => 'Финансовый и управленческий учёт, CIPA.',
                'photo' => 'trainers/olga.jpg',
            ],
            [
                'name' => 'Нурутдинова Алина',
                'position' => '1С профессионал',
                'bio' => 'CAP, опытный тренер по курсу 1С.',
                'photo' => 'trainers/alina.jpg',
            ],
        ];

        foreach ($trainers as $trainer) {
            Trainer::create($trainer);
        }
    }
}
