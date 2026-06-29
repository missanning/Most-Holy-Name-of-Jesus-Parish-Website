<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParishSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->truncate();
        DB::table('news')->truncate();
        DB::table('mass_schedule')->truncate();
        DB::table('sacraments')->truncate();
        DB::table('gallery')->truncate();
        DB::table('resources')->truncate();

        // Events
        DB::table('events')->insert([
            ['title' => 'Parish Fiesta', 'event_date' => '2025-08-15', 'time' => '9:00 AM', 'venue' => 'Parish Church', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Youth Fellowship Night', 'event_date' => '2025-07-20', 'time' => '6:00 PM', 'venue' => 'Parish Hall', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Charismatic Prayer Meeting', 'event_date' => '2025-07-05', 'time' => '7:00 PM', 'venue' => 'Parish Church', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // News
        DB::table('news')->insert([
            ['title' => 'Parish Bulletin — June 2025', 'body' => 'Read the latest parish announcements and updates for this month.', 'icon' => '📰', 'date_label' => 'June 2025', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'New Mass Schedule', 'body' => 'Starting July, additional Sunday Mass at 9:00 AM at SM Center San Pedro.', 'icon' => '⛪', 'date_label' => 'July 2025', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Confirmation Class Enrollment', 'body' => 'Enrollment for Confirmation class is now open. Contact the parish office for details.', 'icon' => '✝️', 'date_label' => 'May 2025', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Mass Schedule — Weekly
        DB::table('mass_schedule')->insert([
            ['category' => 'weekly', 'col1' => 'Monday – Friday', 'col2' => '6:00 AM', 'col3' => 'Daily Mass', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'weekly', 'col1' => 'Saturday', 'col2' => '6:00 AM', 'col3' => 'Vigil Mass', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'weekly', 'col1' => 'Sunday', 'col2' => '7:00 AM', 'col3' => 'Parish Church', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'weekly', 'col1' => 'Sunday', 'col2' => '9:00 AM', 'col3' => 'SM Center San Pedro', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'weekly', 'col1' => 'Sunday', 'col2' => '6:30 PM', 'col3' => 'Parish Church', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Mass Schedule — Holy Days
        DB::table('mass_schedule')->insert([
            ['category' => 'holyday', 'col1' => 'Christmas Day', 'col2' => '6:00 AM, 9:00 AM, 6:30 PM', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'holyday', 'col1' => 'Ash Wednesday', 'col2' => '6:00 AM & 6:30 PM', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'holyday', 'col1' => 'Holy Thursday', 'col2' => '6:30 PM', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'holyday', 'col1' => 'Good Friday', 'col2' => '3:00 PM', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Mass Schedule — Office Hours
        DB::table('mass_schedule')->insert([
            ['category' => 'office', 'col1' => 'Monday – Friday', 'col2' => '8:00 AM – 12:00 PM, 1:00 PM – 5:00 PM', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'office', 'col1' => 'Saturday', 'col2' => '8:00 AM – 12:00 PM', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'office', 'col1' => 'Sunday', 'col2' => 'Closed', 'col3' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Sacraments — with real images and full descriptions
        DB::table('sacraments')->insert([
            [
                'name' => 'Baptism',
                'label' => 'Baptism',
                'description' => 'The sacrament of initiation that cleanses original sin and welcomes one into the Church. A pre-baptism seminar is required. Contact the parish office to schedule.',
                'img' => 'images/baptism.jpg',
                'sort_order' => 1,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Eucharist',
                'label' => 'Eucharist',
                'description' => 'The source and summit of the Christian life — the Body and Blood of Christ. First Communion preparation is available for children and adults through the RCIA program.',
                'img' => 'images/eucharist.jpg',
                'sort_order' => 2,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Confirmation',
                'label' => 'Confirmation',
                'description' => 'The sacrament that strengthens the gifts of the Holy Spirit received at Baptism. Classes are held annually — enrollment opens every January.',
                'img' => 'images/confirmation.jpg',
                'sort_order' => 3,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Reconciliation',
                'label' => 'Reconciliation',
                'description' => 'The sacrament of forgiveness and healing through God\'s mercy. Confession is available by appointment — please contact the parish office to schedule.',
                'img' => 'images/reconciliation.jpg',
                'sort_order' => 4,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Anointing of the Sick',
                'label' => 'Anointing',
                'description' => 'Brings spiritual and physical healing to those who are gravely ill or facing serious surgery. Call the parish office to arrange a home or hospital visit.',
                'img' => 'images/anointing.jpg',
                'sort_order' => 5,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Holy Orders',
                'label' => 'Holy Orders',
                'description' => 'The sacrament through which men are ordained as deacons, priests, or bishops to serve the people of God. Inquire with the Diocese of San Pablo for vocations guidance.',
                'img' => 'images/sacraments.jpg',
                'sort_order' => 6,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Matrimony',
                'label' => 'Matrimony',
                'description' => 'The covenant between a man and a woman united in love and open to new life. A Pre-Cana seminar and canonical interview are required. Book at least 6 months in advance.',
                'img' => 'images/matrimony.jpg',
                'sort_order' => 7,
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);

        // Resources
        DB::table('resources')->insert([
            ['category' => 'document', 'title' => 'Parish Registration Form', 'url' => '#', 'icon' => '📄', 'col2' => null, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'document', 'title' => 'Baptism Requirements', 'url' => '#', 'icon' => '📄', 'col2' => null, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'faith', 'title' => 'Catechism of the Catholic Church', 'url' => 'https://www.vatican.va/archive/ENG0015/_INDEX.HTM', 'icon' => '📖', 'col2' => null, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'faith', 'title' => 'USCCB Bible Resources', 'url' => 'https://bible.usccb.org', 'icon' => '✝️', 'col2' => null, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'devotion', 'title' => 'Holy Rosary', 'url' => null, 'icon' => null, 'col2' => 'Every day, 5:30 AM before Mass', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'devotion', 'title' => 'Divine Mercy Chaplet', 'url' => null, 'icon' => null, 'col2' => 'Fridays, 3:00 PM', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
