<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `countries` (`id`, `name`, `code`) VALUES
            (1, 'England', 'ENG'),
            (2, 'Spain', 'ESP'),
            (3, 'Italy', 'ITA'),
            (4, 'Germany', 'GER'),
            (5, 'Portugal', 'POR'),
            (6, 'France', 'FRA'),
            (7, 'Netherlands', 'NED'),
            (8, 'Scotland', 'SCO'),
            (9, 'Russia', 'RUS'),
            (10, 'Austria', 'AUT'),
            (11, 'Ukraine', 'UKR'),
            (12, 'Serbia', 'SRB'),
            (13, 'Belgium', 'BEL'),
            (14, 'Switzerland', 'SUI'),
            (15, 'Croatia', 'CRO'),
            (16, 'Cyprus', 'CYP'),
            (17, 'Czech Republic', 'CZE'),
            (18, 'Turkey', 'TUR'),
            (19, 'Norway', 'NOR'),
            (20, 'Sweden', 'SWE'),
            (21, 'Greece', 'GRE'),
            (22, 'Denmark', 'DEN'),
            (23, 'Israel', 'ISR'),
            (24, 'Bulgaria', 'BUL'),
            (25, 'Romania', 'ROU'),
            (26, 'Hungary', 'HUN'),
            (27, 'Kazakhstan', 'KAZ'),
            (28, 'Poland', 'POL'),
            (29, 'Slovenia', 'SVN'),
            (30, 'Azerbaijan', 'AZE'),
            (31, 'Slovakia', 'SVK'),
            (32, 'Belarus', 'BLR'),
            (33, 'Lithuania', 'LTU'),
            (34, 'Bosnia and Herzegovina', 'BIH'),
            (35, 'Luxembourg', 'LUX'),
            (36, 'Latvia', 'LVA'),
            (37, 'Moldova', 'MDA'),
            (38, 'Kosovo', 'KOS'),
            (39, 'Republic of Ireland', 'IRL'),
            (40, 'Northern Ireland', 'NIR'),
            (41, 'Albania', 'ALB'),
            (42, 'Finland', 'FIN'),
            (43, 'Armenia', 'ARM'),
            (44, 'Faroe Islands', 'FRO'),
            (45, 'Malta', 'MLT'),
            (46, 'Georgia', 'GEO'),
            (47, 'North Macedonia', 'MKD'),
            (48, 'Liechtenstein', 'LIE'),
            (49, 'Wales', 'WAL'),
            (50, 'Estonia', 'EST'),
            (51, 'Iceland', 'ISL'),
            (52, 'Gibraltar', 'GIB'),
            (53, 'Montenegro', 'MNE'),
            (54, 'Andorra', 'AND')");
    }
}
