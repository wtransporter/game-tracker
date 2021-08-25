<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(" INSERT INTO `clubs` (`id`, `name`) VALUES
            (1, 'Aberdeen FC'),
            (2, 'AC Milan'),
            (3, 'AC Sparta Praha'),
            (4, 'AEK Athens FC'),
            (5, 'AEK Larnaca FC'),
            (6, 'AEL Limassol FC'),
            (7, 'AFC Ajax'),
            (8, 'AGF Aarhus'),
            (9, 'Akademija Pandev'),
            (10, 'Akhisar Belediyespor'),
            (11, 'Alanyaspor'),
            (12, 'Alashkert FC'),
            (13, 'Anorthosis Famagusta FC'),
            (14, 'APOEL FC'),
            (15, 'Apollon Limassol FC'),
            (16, 'AraratArmenia FC'),
            (17, 'Aris Thessaloniki FC'),
            (18, 'Arka Gdynia'),
            (19, 'Arsenal FC'),
            (20, 'AS Jeunesse Esch'),
            (21, 'AS Monaco FC'),
            (22, 'AS Roma'),
            (23, 'AS SaintÉtienne'),
            (24, 'AS Trenčín'),
            (25, 'Asteras Tripolis FC'),
            (26, 'Atalanta BC'),
            (27, 'Athletic Club'),
            (28, 'Atromitos FC'),
            (29, 'AZ Alkmaar'),
            (30, 'B Tórshavn'),
            (31, 'Backa Topola'),
            (32, 'Bala Town FC'),
            (33, 'Ballymena United FC'),
            (34, 'Balzan FC'),
            (35, 'Bangor City FC'),
            (36, 'Barry Town AFC'),
            (37, 'Bayer  Leverkusen'),
            (38, 'Beitar Jerusalem FC'),
            (39, 'Beşiktaş JK'),
            (40, 'Birkirkara FC'),
            (41, 'BK Häcken'),
            (42, 'Bnei Yehuda TelAviv FC'),
            (43, 'Bohemian FC'),
            (44, 'Borussia Dortmund'),
            (45, 'Breidablik'),
            (46, 'Brøndby IF'),
            (47, 'BSC Young Boys'),
            (48, 'Budapest Honvéd FC'),
            (49, 'Burnley FC'),
            (50, 'Cardiff Metropolitan University FC'),
            (51, 'CD Santa Clara'),
            (52, 'Cefn Druids AFC'),
            (53, 'Celtic FC'),
            (54, 'CFR  Cluj'),
            (55, 'Chelsea FC'),
            (56, 'Cliftonville FC'),
            (57, 'Club Atlético de Madrid'),
            (58, 'Club Brugge'),
            (59, 'Coleraine FC'),
            (60, 'Connah\'s Quay Nomads FC'),
            (61, 'Cork City FC'),
            (62, 'Crusaders FC'),
            (63, 'CS Fola Esch'),
            (64, 'CS Marítimo'),
            (65, 'Debreceni VSC'),
            (66, 'Derry City FC'),
            (67, 'Djurgårdens IF'),
            (68, 'Dundalk FC'),
            (69, 'Eintracht Frankfurt'),
            (70, 'Esbjerg fB'),
            (71, 'Europa FC'),
            (72, 'Everton FC'),
            (73, 'F Diddeleng'),
            (74, 'FC Admira Wacker Mödling'),
            (75, 'FC Ararat'),
            (76, 'FC Arsenal Tula'),
            (77, 'FC Ashdod'),
            (78, 'FC Astana'),
            (79, 'FC Astra Giurgiu'),
            (80, 'FC Barcelona'),
            (81, 'FC Basel'),
            (82, 'FC BATE Borisov'),
            (83, 'FC Bayern München'),
            (84, 'FC Botoşani'),
            (85, 'FC Chikhura Sachkhere'),
            (86, 'FC Copenhagen'),
            (87, 'FC DAC  Dunajská Streda'),
            (88, 'FC Dacia Chisinau'),
            (89, 'FC Desna Chernihiv'),
            (90, 'FC Differdange'),
            (91, 'FC Dila Gori'),
            (92, 'FC Dinamo Batumi'),
            (93, 'FC Dinamo Brest'),
            (94, 'FC Dinamo Bucureşti'),
            (95, 'FC Dinamo Minsk'),
            (96, 'FC Dinamo Tbilisi'),
            (97, 'FC DinamoAuto Tiraspol'),
            (98, 'FC Drita'),
            (99, 'FC Dunav Ruse'),
            (100, 'FC Dynamo Kyiv'),
            (101, 'FC Dynamo Moscow'),
            (102, 'FC Flora Tallinn'),
            (103, 'FC Gagra'),
            (104, 'FC Gandzasar'),
            (105, 'FC Girondins de Bordeaux'),
            (106, 'FC Honka Espoo'),
            (107, 'FC Inter Turku'),
            (108, 'FC Internazionale Milano'),
            (109, 'FC Irtysh Pavlodar'),
            (110, 'FC Kairat Almaty'),
            (111, 'FC Kaysar Kyzylorda'),
            (112, 'FC Köln'),
            (113, 'FC Krasnodar'),
            (114, 'FC Lahti'),
            (115, 'FC Levadia Tallinn'),
            (116, 'FC Locomotive Tbilisi'),
            (117, 'FC Lokomotiv Moskva'),
            (118, 'FC Lugano'),
            (119, 'FC Luzern'),
            (120, 'FC Mariupol'),
            (121, 'FC Midtjylland'),
            (122, 'FC Milsami Orhei'),
            (123, 'FC Noah'),
            (124, 'FC Nordsjælland'),
            (125, 'FC Olexandriya'),
            (126, 'FC Olimpik Donetsk'),
            (127, 'FC Ordabasy Shymkent'),
            (128, 'FC Paços de Ferreira'),
            (129, 'FC Porto'),
            (130, 'FC Prishtina'),
            (131, 'FC Progrès Niederkorn'),
            (132, 'FC Pyunik'),
            (133, 'FC Rostov'),
            (134, 'FC Rubin'),
            (135, 'FC Saburtalo'),
            (136, 'FC Salzburg'),
            (137, 'FC Samtredia'),
            (138, 'FC Santa Coloma'),
            (139, 'FC Schalke'),
            (140, 'FC Sfintul Gheorghe'),
            (141, 'FC Shakhtar Donetsk'),
            (142, 'FC Shakhter Karagandy'),
            (143, 'FC Shakhtyor Soligorsk'),
            (144, 'FC Sheriff Tiraspol'),
            (145, 'FC Shirak'),
            (146, 'FC Shkupi'),
            (147, 'FC Sion'),
            (148, 'FC Sirens'),
            (149, 'FC Slovácko'),
            (150, 'FC Slovan Liberec'),
            (151, 'FC Sochi'),
            (152, 'FC Spartak Moskva'),
            (153, 'FC Spartak Trnava'),
            (154, 'FC Speranța Nisporeni'),
            (155, 'FC St Gallen'),
            (156, 'FC Struga'),
            (157, 'FC Stumbras'),
            (158, 'FC Swift Hesper'),
            (159, 'FC Thun'),
            (160, 'FC Tobol Kostanay'),
            (161, 'FC Torpedo Kutaisi'),
            (162, 'FC Torpedo Zhodino'),
            (163, 'FC Ufa'),
            (164, 'FC Union Berlin'),
            (165, 'FC Urartu'),
            (166, 'FC Utrecht'),
            (167, 'FC Vaduz'),
            (168, 'FC Viitorul'),
            (169, 'FC Viktoria Plzeň'),
            (170, 'FC Vitebsk'),
            (171, 'FC Vorskla Poltava'),
            (172, 'FC Zaria Balti'),
            (173, 'FC Zenit'),
            (174, 'FC Zlín'),
            (175, 'FC Zorya Luhansk'),
            (176, 'FC Zürich'),
            (177, 'FCI Tallinn'),
            (178, 'FCSB'),
            (179, 'Fehérvár FC'),
            (180, 'Fenerbahçe SK'),
            (181, 'Ferencvárosi TC'),
            (182, 'Feyenoord'),
            (183, 'FH Hafnarfjördur'),
            (184, 'FK Atlantas'),
            (185, 'FK Austria Wien'),
            (186, 'FK Bodø/Glimt'),
            (187, 'FK Borac Banja Luka'),
            (188, 'FK Budućnost Podgorica'),
            (189, 'FK Crvena zvezda'),
            (190, 'FK Čukarički'),
            (191, 'FK Dečić'),
            (192, 'FK Haugesund'),
            (193, 'FK Iskra'),
            (194, 'FK Jablonec'),
            (195, 'FK Jelgava'),
            (196, 'FK Kauno Žalgiris'),
            (197, 'FK Kukësi'),
            (198, 'FK Liepāja'),
            (199, 'FK Makedonija GP Skopje'),
            (200, 'FK Mladá Boleslav'),
            (201, 'FK Mladost Lučani'),
            (202, 'FK Partizan'),
            (203, 'FK Partizani'),
            (204, 'FK Pelister'),
            (205, 'FK Podgorica'),
            (206, 'FK Rabotnicki'),
            (207, 'FK Radnicki Niš'),
            (208, 'FK Radnik Bijeljina'),
            (209, 'FK Riteriai'),
            (210, 'FK Rudar Pljevlja'),
            (211, 'FK Sarajevo'),
            (212, 'FK Sileks'),
            (213, 'FK Spartak Subotica'),
            (214, 'FK Spartaks Jūrmala'),
            (215, 'FK Sūduva'),
            (216, 'FK Sutjeska'),
            (217, 'FK Valmiera'),
            (218, 'FK Vardar'),
            (219, 'FK Velež'),
            (220, 'FK Ventspils'),
            (221, 'FK Vojvodina'),
            (222, 'FK Žalgiris Vilnius'),
            (223, 'FK Željezničar'),
            (224, 'FK Zeta'),
            (225, 'Floriana FC'),
            (226, 'Gabala SC'),
            (227, 'Galatasaray AŞ'),
            (228, 'Getafe CF'),
            (229, 'Glenavon FC'),
            (230, 'Glentoran FC'),
            (231, 'GNK Dinamo Zagreb'),
            (232, 'Górnik Zabrze'),
            (233, 'Granada CF'),
            (234, 'Gżira United FC'),
            (235, 'Hammarby Fotboll'),
            (236, 'Hapoel BeerSheva FC'),
            (237, 'Hapoel Haifa FC'),
            (238, 'HB Tórshavn'),
            (239, 'Hertha BSC Berlin'),
            (240, 'Hibernian FC'),
            (241, 'Hibernians FC'),
            (242, 'HJK Helsinki'),
            (243, 'HNK Hajduk Split'),
            (244, 'HNK Rijeka'),
            (245, 'HŠK Zrinjski'),
            (246, 'ÍBV Vestmannaeyjar'),
            (247, 'IF Elfsborg'),
            (248, 'IFK Göteborg'),
            (249, 'IFK Mariehamn'),
            (250, 'IFK Norrköping FK'),
            (251, 'Ilves Tampere'),
            (252, 'Inter Club d\'Escaldes'),
            (253, 'İstanbul Başakşehir'),
            (254, 'Jagiellonia Białystok'),
            (255, 'JK Narva Trans'),
            (256, 'Juventus'),
            (257, 'KAA Gent'),
            (258, 'Keşla FK'),
            (259, 'KF Feronikeli'),
            (260, 'KF Gjilani'),
            (261, 'KF Laçi'),
            (262, 'KF Llapi'),
            (263, 'KF Renova'),
            (264, 'KF Shkëndija'),
            (265, 'KF Skënderbeu'),
            (266, 'KF Teuta'),
            (267, 'KF Tirana'),
            (268, 'KF Trepça’'),
            (269, 'KF Vllaznia'),
            (270, 'KÍ Klaksvík'),
            (271, 'Kilmarnock FC'),
            (272, 'KKS Lech Poznań'),
            (273, 'Kolos Kovalivka'),
            (274, 'Konyaspor'),
            (275, 'KR Reykjavík'),
            (276, 'KRC Genk'),
            (277, 'KS Lechia Gdańsk'),
            (278, 'KS Luftëtari'),
            (279, 'KuPS Kuopio'),
            (280, 'KV Oostende'),
            (281, 'La Fiorita'),
            (282, 'Larne FC'),
            (283, 'LASK'),
            (284, 'Legia Warszawa'),
            (285, 'Leicester City FC'),
            (286, 'Lillestrøm SK'),
            (287, 'Lincoln Red Imps FC'),
            (288, 'Linfield FC'),
            (289, 'Liverpool FC'),
            (290, 'LOSC Lille'),
            (291, 'Lyngby BK'),
            (292, 'Maccabi Haifa FC'),
            (293, 'Maccabi TelAviv FC'),
            (294, 'Malmö FF'),
            (295, 'Manchester City FC'),
            (296, 'Manchester United'),
            (297, 'MFK Ružomberok'),
            (298, 'MKS Cracovia Kraków'),
            (299, 'MKS Pogoń Szczecin'),
            (300, 'Molde FK'),
            (301, 'Mons Calpe SC'),
            (302, 'Mosta FC'),
            (303, 'Motherwell FC'),
            (304, 'MŠK Žilina'),
            (305, 'ND Gorica'),
            (306, 'Neftçi PFK'),
            (307, 'Newtown AFC'),
            (308, 'NK Celje'),
            (309, 'NK Domžale'),
            (310, 'NK Lokomotiva Zagreb'),
            (311, 'NK Maribor'),
            (312, 'NK Olimpija Ljubljana'),
            (313, 'NK Osijek'),
            (314, 'NK Rudar Velenje'),
            (315, 'NK Široki Brijeg'),
            (316, 'Nõmme Kalju FC'),
            (317, 'NS Mura'),
            (318, 'NSÍ Runavík'),
            (319, 'Odds BK'),
            (320, 'OFI Crete FC'),
            (321, 'OFK Titograd'),
            (322, 'OGC Nice'),
            (323, 'Olympiacos FC'),
            (324, 'Olympique de Marseille'),
            (325, 'Olympique Lyonnais'),
            (326, 'Omonoia FC'),
            (327, 'Östersunds FK'),
            (328, 'Paide Linnameeskond'),
            (329, 'Panathinaikos FC'),
            (330, 'Panevezys'),
            (331, 'Panionios GSS'),
            (332, 'PAOK FC'),
            (333, 'Paris Saint-Germain'),
            (334, 'PetrocubHincesti'),
            (335, 'PFC Arda Kardzhali'),
            (336, 'PFC Botev Plovdiv'),
            (337, 'PFC CSKA Moskva'),
            (338, 'PFC CSKASofia'),
            (339, 'PFC Levski Sofia'),
            (340, 'PFC Lokomotiv Plovdiv'),
            (341, 'PFC Ludogorets'),
            (342, 'PFC Slavia Sofia'),
            (343, 'Piast Gliwice'),
            (344, 'PSV Eindhoven'),
            (345, 'Puskás Akadémia FC'),
            (346, 'Qarabağ FK'),
            (347, 'R Charleroi SC'),
            (348, 'R Standard de Liège'),
            (349, 'Racing Club de Strasbourg Alsace'),
            (350, 'Racing FC Union Luxembourg'),
            (351, 'Raków Czestochowa'),
            (352, 'Randers FC'),
            (353, 'Rangers FC'),
            (354, 'RB Leipzig'),
            (355, 'RCD Espanyol'),
            (356, 'Real Betis Balompié'),
            (357, 'Real Madrid CF'),
            (358, 'Real Sociedad de Fútbol'),
            (359, 'Riga FC'),
            (360, 'Rio Ave FC'),
            (361, 'RoPS Rovaniemi'),
            (362, 'Rosenborg BK'),
            (363, 'Royal Antwerp FC'),
            (364, 'RSC Anderlecht'),
            (365, 'Sabail'),
            (366, 'Saint Patrick\'s Athletic FC'),
            (367, 'Sarpsborg  FF'),
            (368, 'SC Braga'),
            (369, 'SC Freiburg'),
            (370, 'SCR Altach'),
            (371, 'Sepsi Sfantu Gheorghe'),
            (372, 'Servette FC'),
            (373, 'Sevilla FC'),
            (374, 'Shamrock Rovers FC'),
            (375, 'Sivasspor'),
            (376, 'SJK Seinäjoki'),
            (377, 'SK Brann'),
            (378, 'SK Rapid Wien'),
            (379, 'SK Sigma Olomouc'),
            (380, 'SK Slavia Praha'),
            (381, 'ŠK Slovan Bratislava'),
            (382, 'SK Sturm Graz'),
            (383, 'SL Benfica'),
            (384, 'Sligo Rovers FC'),
            (385, 'SønderjyskE'),
            (386, 'SP Tre Fiori'),
            (387, 'SP Tre Penne'),
            (388, 'Sporting Clube de Portugal'),
            (389, 'SS Folgore'),
            (390, 'SS Lazio'),
            (391, 'SSC Napoli'),
            (392, 'St Johnstone FC'),
            (393, 'St Joseph\'s FC'),
            (394, 'Stade de Reims'),
            (395, 'Stade Rennais FC'),
            (396, 'Stjarnan'),
            (397, 'Sumqayıt FK'),
            (398, 'SV Zulte Waregem'),
            (399, 'The New Saints FC'),
            (400, 'Torino FC'),
            (401, 'Tottenham Hotspur'),
            (402, 'Trabzonspor AŞ'),
            (403, 'TSG  Hoffenheim'),
            (404, 'TSV Hartberg'),
            (405, 'UE Engordany'),
            (406, 'UE Sant Julià'),
            (407, 'UE Santa Coloma'),
            (408, 'Újpest FC'),
            (409, 'Union Titus Petange'),
            (410, 'Universitatea Craiova'),
            (411, 'Valencia CF'),
            (412, 'Vålerenga Fotball Elite'),
            (413, 'Valletta FC'),
            (414, 'Valur'),
            (415, 'Vasas FC'),
            (416, 'VfL Borussia Mönchengladbach'),
            (417, 'VfL Wolfsburg'),
            (418, 'Viking FK'),
            (419, 'Víkingur'),
            (420, 'Víkingur Reykjavík'),
            (421, 'Villarreal CF'),
            (422, 'Vitesse'),
            (423, 'Vitória SC'),
            (424, 'VPS Vaasa'),
            (425, 'West Ham United FC'),
            (426, 'Willem II'),
            (427, 'WKS Śląsk Wrocław'),
            (428, 'Wolfsberger AC'),
            (429, 'Wolverhampton Wanderers FC'),
            (430, 'Yeni Malatyaspor'),
            (431, 'Zirä FK')");
    }
}
