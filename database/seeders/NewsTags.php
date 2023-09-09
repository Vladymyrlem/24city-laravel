<?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class NewsTags extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $data =
                [
                    [
                        "Term ID" => 798,
                        "Term Name" => "общество",
                        "Term Slug" => "obshchestvo",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 799,
                        "Term Name" => "транспорт",
                        "Term Slug" => "transport",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 800,
                        "Term Name" => "Чернігів",
                        "Term Slug" => "chernihiv",
                        "Count" => 22
                    ],
                    [
                        "Term ID" => 801,
                        "Term Name" => "Чернигов",
                        "Term Slug" => "chernyhov",
                        "Count" => 24
                    ],
                    [
                        "Term ID" => 802,
                        "Term Name" => "covid",
                        "Term Slug" => "covid",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 803,
                        "Term Name" => "городня",
                        "Term Slug" => "horodnya",
                        "Count" => 4
                    ],
                    [
                        "Term ID" => 804,
                        "Term Name" => "Ічня",
                        "Term Slug" => "ichnia",
                        "Count" => 4
                    ],
                    [
                        "Term ID" => 805,
                        "Term Name" => "Ольшана",
                        "Term Slug" => "olshana",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 806,
                        "Term Name" => "Новгород-Сіверський",
                        "Term Slug" => "novhorod-siverskyy",
                        "Count" => 8
                    ],
                    [
                        "Term ID" => 807,
                        "Term Name" => "фотозвіт",
                        "Term Slug" => "fotozvit",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 808,
                        "Term Name" => "фотоочтет",
                        "Term Slug" => "fotoochtet",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 809,
                        "Term Name" => "бобровиця",
                        "Term Slug" => "bobrovytsia",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 810,
                        "Term Name" => "бобровица",
                        "Term Slug" => "bobrovytsa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 811,
                        "Term Name" => "Тупичів",
                        "Term Slug" => "tupychiv",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 812,
                        "Term Name" => "Ніжин",
                        "Term Slug" => "nizhyn",
                        "Count" => 9
                    ],
                    [
                        "Term ID" => 813,
                        "Term Name" => "Прилуки",
                        "Term Slug" => "pryluky",
                        "Count" => 13
                    ],
                    [
                        "Term ID" => 814,
                        "Term Name" => "ТЭЦ",
                        "Term Slug" => "t-ts",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 815,
                        "Term Name" => "отопление",
                        "Term Slug" => "otoplenye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 816,
                        "Term Name" => "опалення",
                        "Term Slug" => "opalennia",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 817,
                        "Term Name" => "бюджет",
                        "Term Slug" => "biudzhet",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 818,
                        "Term Name" => "ЦНАП",
                        "Term Slug" => "tsnap",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 819,
                        "Term Name" => "аадміністративні послуги",
                        "Term Slug" => "aadministratyvni-posluhy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 820,
                        "Term Name" => "новорічні свята",
                        "Term Slug" => "novorichni-sviata",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 821,
                        "Term Name" => "Новый Год",
                        "Term Slug" => "nov-y-hod",
                        "Count" => 6
                    ],
                    [
                        "Term ID" => 822,
                        "Term Name" => "ремонт",
                        "Term Slug" => "remont",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 823,
                        "Term Name" => "село",
                        "Term Slug" => "selo",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 824,
                        "Term Name" => "областная больница",
                        "Term Slug" => "oblastnaia-bolnytsa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 825,
                        "Term Name" => "профспілки",
                        "Term Slug" => "profspilky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 826,
                        "Term Name" => "освіта",
                        "Term Slug" => "osvita",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 827,
                        "Term Name" => "вакцінація",
                        "Term Slug" => "vaktsinatsiia",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 828,
                        "Term Name" => "кордон",
                        "Term Slug" => "kordon",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 829,
                        "Term Name" => "зброя",
                        "Term Slug" => "zbroia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 830,
                        "Term Name" => "Чернобыль",
                        "Term Slug" => "chernob-l",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 831,
                        "Term Name" => "радиоактивные отходы",
                        "Term Slug" => "radyoaktyvn-e-otkhod",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 832,
                        "Term Name" => "Еловщина",
                        "Term Slug" => "elovshchyna",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 833,
                        "Term Name" => "горсовет",
                        "Term Slug" => "horsovet",
                        "Count" => 4
                    ],
                    [
                        "Term ID" => 834,
                        "Term Name" => "сессия",
                        "Term Slug" => "sessyia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 835,
                        "Term Name" => "семинар",
                        "Term Slug" => "semynar",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 836,
                        "Term Name" => "ичня",
                        "Term Slug" => "ychnia",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 837,
                        "Term Name" => "автостанция",
                        "Term Slug" => "avtostantsyia",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 838,
                        "Term Name" => "земля",
                        "Term Slug" => "zemlia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 839,
                        "Term Name" => "прокуратура",
                        "Term Slug" => "prokuratura",
                        "Count" => 4
                    ],
                    [
                        "Term ID" => 840,
                        "Term Name" => "магазин",
                        "Term Slug" => "mahazyn",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 841,
                        "Term Name" => "облспоживспілка",
                        "Term Slug" => "oblspozhyvspilka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 842,
                        "Term Name" => "COOP",
                        "Term Slug" => "coop",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 843,
                        "Term Name" => "талалаївка",
                        "Term Slug" => "talalaivka",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 844,
                        "Term Name" => "субвенція",
                        "Term Slug" => "subventsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 845,
                        "Term Name" => "депутати",
                        "Term Slug" => "deputaty",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 846,
                        "Term Name" => "піар",
                        "Term Slug" => "piar",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 847,
                        "Term Name" => "Рибинськ",
                        "Term Slug" => "rybynsk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 848,
                        "Term Name" => "музей",
                        "Term Slug" => "muzey",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 849,
                        "Term Name" => "творчість",
                        "Term Slug" => "tvorchist",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 850,
                        "Term Name" => "вишивка",
                        "Term Slug" => "vyshyvka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 851,
                        "Term Name" => "театр",
                        "Term Slug" => "teatr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 852,
                        "Term Name" => "полиция",
                        "Term Slug" => "polytsyia",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 853,
                        "Term Name" => "Гончаровск",
                        "Term Slug" => "honcharovsk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 854,
                        "Term Name" => "Короп",
                        "Term Slug" => "korop",
                        "Count" => 7
                    ],
                    [
                        "Term ID" => 855,
                        "Term Name" => "автопригода",
                        "Term Slug" => "avtopryhoda",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 856,
                        "Term Name" => "ДСНС",
                        "Term Slug" => "dsns",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 857,
                        "Term Name" => "сапери",
                        "Term Slug" => "sapery",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 858,
                        "Term Name" => "міна",
                        "Term Slug" => "mina",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 859,
                        "Term Name" => "вибухонебезпечний",
                        "Term Slug" => "vybukhonebezpechnyy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 860,
                        "Term Name" => "газ",
                        "Term Slug" => "haz",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 861,
                        "Term Name" => "Корюківка",
                        "Term Slug" => "koriukivka",
                        "Count" => 5
                    ],
                    [
                        "Term ID" => 862,
                        "Term Name" => "футбол",
                        "Term Slug" => "futbol",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 863,
                        "Term Name" => "тепломережа",
                        "Term Slug" => "teplomerezha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 864,
                        "Term Name" => "убийство",
                        "Term Slug" => "ubyystvo",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 865,
                        "Term Name" => "полицейский",
                        "Term Slug" => "polytseyskyy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 866,
                        "Term Name" => "Киїнка",
                        "Term Slug" => "kyinka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 867,
                        "Term Name" => "ювілей",
                        "Term Slug" => "iuviley",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 868,
                        "Term Name" => "Тарновського",
                        "Term Slug" => "tarnovskoho",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 869,
                        "Term Name" => "гроші",
                        "Term Slug" => "hroshi",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 870,
                        "Term Name" => "моніторинг",
                        "Term Slug" => "monitorynh",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 871,
                        "Term Name" => "грошові перекази",
                        "Term Slug" => "hroshovi-perekazy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 872,
                        "Term Name" => "мобільники",
                        "Term Slug" => "mobilnyky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 873,
                        "Term Name" => "зв’язок",
                        "Term Slug" => "zv-iazok",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 874,
                        "Term Name" => "відключення",
                        "Term Slug" => "vidkliuchennia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 875,
                        "Term Name" => "законопроект",
                        "Term Slug" => "zakonoproekt",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 876,
                        "Term Name" => "штормовое предупреждение",
                        "Term Slug" => "shtormovoe-preduprezhdenye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 877,
                        "Term Name" => "без электричества",
                        "Term Slug" => "bez-lektrychestva",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 878,
                        "Term Name" => "связь",
                        "Term Slug" => "sviaz",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 879,
                        "Term Name" => "интернет",
                        "Term Slug" => "ynternet",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 880,
                        "Term Name" => "оптический кабель",
                        "Term Slug" => "optycheskyy-kabel",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 881,
                        "Term Name" => "акция",
                        "Term Slug" => "aktsyia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 882,
                        "Term Name" => "активисты",
                        "Term Slug" => "aktyvyst",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 883,
                        "Term Name" => "документальное кино",
                        "Term Slug" => "dokumentalnoe-kyno",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 884,
                        "Term Name" => "фестиваль",
                        "Term Slug" => "festyval",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 885,
                        "Term Name" => "права человека",
                        "Term Slug" => "prava-cheloveka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 886,
                        "Term Name" => "козелець",
                        "Term Slug" => "kozelets",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 887,
                        "Term Name" => "завод",
                        "Term Slug" => "zavod",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 888,
                        "Term Name" => "запрет",
                        "Term Slug" => "zapret",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 889,
                        "Term Name" => "пластиковые пакеты",
                        "Term Slug" => "plastykov-e-paket",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 890,
                        "Term Name" => "стафілокок",
                        "Term Slug" => "stafilokok",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 891,
                        "Term Name" => "інфекція",
                        "Term Slug" => "infektsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 892,
                        "Term Name" => "заклади освіти",
                        "Term Slug" => "zaklady-osvity",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 893,
                        "Term Name" => "общежитие",
                        "Term Slug" => "obshchezhytye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 894,
                        "Term Name" => "выселение",
                        "Term Slug" => "v-selenye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 895,
                        "Term Name" => "железнодорожный лицей",
                        "Term Slug" => "zheleznodorozhn-y-lytsey",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 896,
                        "Term Name" => "СНІД",
                        "Term Slug" => "snid",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 897,
                        "Term Name" => "ВІЛ\/СНІД",
                        "Term Slug" => "vil-snid",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 898,
                        "Term Name" => "ОДА",
                        "Term Slug" => "oda",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 899,
                        "Term Name" => "обласна адміністрація",
                        "Term Slug" => "oblasna-administratsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 900,
                        "Term Name" => "молодь",
                        "Term Slug" => "molod",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 901,
                        "Term Name" => "конкурс",
                        "Term Slug" => "konkurs",
                        "Count" => 4
                    ],
                    [
                        "Term ID" => 902,
                        "Term Name" => "управління в справах сім’ї",
                        "Term Slug" => "upravlinnia-v-spravakh-sim-i",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 903,
                        "Term Name" => "міська рада",
                        "Term Slug" => "miska-rada",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 904,
                        "Term Name" => "харчування",
                        "Term Slug" => "kharchuvannia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 905,
                        "Term Name" => "діти",
                        "Term Slug" => "dity",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 906,
                        "Term Name" => "маршрутне таксі",
                        "Term Slug" => "marshrutne-taksi",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 907,
                        "Term Name" => "пожежа",
                        "Term Slug" => "pozhezha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 908,
                        "Term Name" => "Нехаївка",
                        "Term Slug" => "nekhaivka",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 909,
                        "Term Name" => "амбулаторія",
                        "Term Slug" => "ambulatoriia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 910,
                        "Term Name" => "сімейна медицина",
                        "Term Slug" => "simeyna-medytsyna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 911,
                        "Term Name" => "поліція",
                        "Term Slug" => "politsiia",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 912,
                        "Term Name" => "гугл карти",
                        "Term Slug" => "huhl-karty",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 913,
                        "Term Name" => "перевірки",
                        "Term Slug" => "perevirky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 914,
                        "Term Name" => "питна води",
                        "Term Slug" => "pytna-vody",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 915,
                        "Term Name" => "якість",
                        "Term Slug" => "iakist",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 916,
                        "Term Name" => "аварія",
                        "Term Slug" => "avariia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 917,
                        "Term Name" => "водоканал",
                        "Term Slug" => "vodokanal",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 918,
                        "Term Name" => "форум",
                        "Term Slug" => "forum",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 919,
                        "Term Name" => "Ліга ділових жінок",
                        "Term Slug" => "liha-dilovykh-zhinok",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 920,
                        "Term Name" => "допомога",
                        "Term Slug" => "dopomoha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 921,
                        "Term Name" => "підтримка народжуваності",
                        "Term Slug" => "pidtrymka-narodzhuvanosti",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 922,
                        "Term Name" => "зарплата",
                        "Term Slug" => "zarplata",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 923,
                        "Term Name" => "демонтируют",
                        "Term Slug" => "demontyruiut",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 924,
                        "Term Name" => "суд",
                        "Term Slug" => "sud",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 925,
                        "Term Name" => "управління юстиції",
                        "Term Slug" => "upravlinnia-iustytsii",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 926,
                        "Term Name" => "СБУ",
                        "Term Slug" => "sbu",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 927,
                        "Term Name" => "Відродження",
                        "Term Slug" => "vidrodzhennia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 928,
                        "Term Name" => "Реабілітація",
                        "Term Slug" => "reabilitatsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 929,
                        "Term Name" => "капітальний ремонт",
                        "Term Slug" => "kapitalnyy-remont",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 930,
                        "Term Name" => "центр творчості",
                        "Term Slug" => "tsentr-tvorchosti",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 931,
                        "Term Name" => "соціальний велосипед",
                        "Term Slug" => "sotsialnyy-velosyped",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 932,
                        "Term Name" => "призи",
                        "Term Slug" => "pryzy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 933,
                        "Term Name" => "військовий комісаріат",
                        "Term Slug" => "viyskovyy-komisariat",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 934,
                        "Term Name" => "аренда",
                        "Term Slug" => "arenda-nedvizhimosti",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 935,
                        "Term Name" => "проект",
                        "Term Slug" => "proekt",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 936,
                        "Term Name" => "развитие предпринимательства",
                        "Term Slug" => "razvytye-predprynymatelstva",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 937,
                        "Term Name" => "бизнес центр",
                        "Term Slug" => "byznes-tsentr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 938,
                        "Term Name" => "Варва",
                        "Term Slug" => "varva",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 939,
                        "Term Name" => "программа жилья",
                        "Term Slug" => "prohramma-zhylia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 940,
                        "Term Name" => "медработники",
                        "Term Slug" => "medrabotnyky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 941,
                        "Term Name" => "регулирование цен",
                        "Term Slug" => "rehulyrovanye-tsen",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 942,
                        "Term Name" => "Верховная Рада",
                        "Term Slug" => "verkhovnaia-rada",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 943,
                        "Term Name" => "цены",
                        "Term Slug" => "tsen",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 944,
                        "Term Name" => "Мена",
                        "Term Slug" => "mena",
                        "Count" => 6
                    ],
                    [
                        "Term ID" => 945,
                        "Term Name" => "територіальний центр",
                        "Term Slug" => "terytorialnyy-tsentr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 946,
                        "Term Name" => "пропал человек",
                        "Term Slug" => "propal-chelovek",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 947,
                        "Term Name" => "розыск",
                        "Term Slug" => "roz-sk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 948,
                        "Term Name" => "авария",
                        "Term Slug" => "avaryia",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 949,
                        "Term Name" => "ДТП",
                        "Term Slug" => "dtp",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 950,
                        "Term Name" => "Чернигов-Сосница",
                        "Term Slug" => "chernyhov-sosnytsa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 951,
                        "Term Name" => "пострадавшие",
                        "Term Slug" => "postradavshye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 952,
                        "Term Name" => "погибли",
                        "Term Slug" => "pohybly",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 953,
                        "Term Name" => "маршрутка",
                        "Term Slug" => "marshrutka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 954,
                        "Term Name" => "бокс",
                        "Term Slug" => "boks",
                        "Count" => 5
                    ],
                    [
                        "Term ID" => 955,
                        "Term Name" => "Нежин",
                        "Term Slug" => "nezhyn",
                        "Count" => 6
                    ],
                    [
                        "Term ID" => 956,
                        "Term Name" => "социальный хаб",
                        "Term Slug" => "sotsyaln-y-khab",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 957,
                        "Term Name" => "выставка",
                        "Term Slug" => "v-stavka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 958,
                        "Term Name" => "тренинг",
                        "Term Slug" => "trenynh",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 959,
                        "Term Name" => "психолог",
                        "Term Slug" => "psykholoh",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 960,
                        "Term Name" => "Троллейбус",
                        "Term Slug" => "trolleybus",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 961,
                        "Term Name" => "погода",
                        "Term Slug" => "pohoda",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 962,
                        "Term Name" => "Новгород-Северский",
                        "Term Slug" => "novhorod-severskyy",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 963,
                        "Term Name" => "мост",
                        "Term Slug" => "most",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 964,
                        "Term Name" => "Бахмач",
                        "Term Slug" => "bakhmach",
                        "Count" => 5
                    ],
                    [
                        "Term ID" => 965,
                        "Term Name" => "дерибан",
                        "Term Slug" => "deryban",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 966,
                        "Term Name" => "молодіжний центр",
                        "Term Slug" => "molodizhnyy-tsentr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 967,
                        "Term Name" => "кінотеатр Щорса",
                        "Term Slug" => "kinoteatr-shchorsa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 968,
                        "Term Name" => "кинотеатр",
                        "Term Slug" => "kynoteatr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 969,
                        "Term Name" => "молодежный центр",
                        "Term Slug" => "molodezhn-y-tsentr",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 970,
                        "Term Name" => "підозра",
                        "Term Slug" => "pidozra",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 971,
                        "Term Name" => "посадовець",
                        "Term Slug" => "posadovets",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 972,
                        "Term Name" => "бассейн",
                        "Term Slug" => "basseyn",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 973,
                        "Term Name" => "поликлиника",
                        "Term Slug" => "polyklynyka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 974,
                        "Term Name" => "Дед Мороз",
                        "Term Slug" => "ded-moroz",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 975,
                        "Term Name" => "центральный парк",
                        "Term Slug" => "tsentraln-y-park",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 976,
                        "Term Name" => "городской каток",
                        "Term Slug" => "horodskoy-katok",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 977,
                        "Term Name" => "елка",
                        "Term Slug" => "elka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 978,
                        "Term Name" => "РЛП Еловщина",
                        "Term Slug" => "rlp-elovshchyna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 979,
                        "Term Name" => "комиссия",
                        "Term Slug" => "komyssyia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 980,
                        "Term Name" => "Бальмачівка",
                        "Term Slug" => "balmachivka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 981,
                        "Term Name" => "освітлення",
                        "Term Slug" => "osvitlennia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 982,
                        "Term Name" => "Толстого",
                        "Term Slug" => "tolstoho",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 983,
                        "Term Name" => "подрезал подростка",
                        "Term Slug" => "podrezal-podrostka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 984,
                        "Term Name" => "протест",
                        "Term Slug" => "protest",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 985,
                        "Term Name" => "законопроект4",
                        "Term Slug" => "zakonoproekt4",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 986,
                        "Term Name" => 4142,
                        "Term Slug" => 4142,
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 987,
                        "Term Name" => "ОГА",
                        "Term Slug" => "oha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 988,
                        "Term Name" => "Талалаевка",
                        "Term Slug" => "talalaevka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 989,
                        "Term Name" => "дід мороз",
                        "Term Slug" => "did-moroz",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 990,
                        "Term Name" => "Новий рік",
                        "Term Slug" => "novyy-rik",
                        "Count" => 8
                    ],
                    [
                        "Term ID" => 991,
                        "Term Name" => "автобус",
                        "Term Slug" => "avtobus",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 992,
                        "Term Name" => "настільний теніс",
                        "Term Slug" => "nastilnyy-tenis",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 993,
                        "Term Name" => "Застройка",
                        "Term Slug" => "zastroyka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 994,
                        "Term Name" => "Обладминистрация",
                        "Term Slug" => "obladmynystratsyia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 995,
                        "Term Name" => "Корюковка",
                        "Term Slug" => "koryukovka",
                        "Count" => 4
                    ],
                    [
                        "Term ID" => 996,
                        "Term Name" => "відсторонення",
                        "Term Slug" => "vidstoronennia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 997,
                        "Term Name" => "карантин",
                        "Term Slug" => "karantyn",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 998,
                        "Term Name" => "транспортування газу",
                        "Term Slug" => "transportuvannia-hazu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 999,
                        "Term Name" => "газопостачання",
                        "Term Slug" => "hazopostachannia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1000,
                        "Term Name" => 104,
                        "Term Slug" => 104,
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1001,
                        "Term Name" => "Копти",
                        "Term Slug" => "kopty",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1002,
                        "Term Name" => "детский сад",
                        "Term Slug" => "detskyy-sad",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1003,
                        "Term Name" => "Березовая роща",
                        "Term Slug" => "berezovaia-roshcha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1004,
                        "Term Name" => "парк",
                        "Term Slug" => "park",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1005,
                        "Term Name" => "охрана природы",
                        "Term Slug" => "okhrana-pryrod",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1006,
                        "Term Name" => "Батурин",
                        "Term Slug" => "baturyn",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1007,
                        "Term Name" => "заповедник",
                        "Term Slug" => "zapovednyk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1008,
                        "Term Name" => "мер",
                        "Term Slug" => "mer",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1009,
                        "Term Name" => "Дмитрий Митрофанов",
                        "Term Slug" => "dmytryy-mytrofanov",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1010,
                        "Term Name" => "рейтинговый бой",
                        "Term Slug" => "reytynhov-y-boy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1011,
                        "Term Name" => "спорт",
                        "Term Slug" => "sport",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1012,
                        "Term Name" => "министр внутренних дел",
                        "Term Slug" => "mynystr-vnutrennykh-del",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1013,
                        "Term Name" => "Школа",
                        "Term Slug" => "shkola",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1014,
                        "Term Name" => "внешкольное образование",
                        "Term Slug" => "vneshkolnoe-obrazovanye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1015,
                        "Term Name" => "кружки",
                        "Term Slug" => "kruzhky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1016,
                        "Term Name" => "детское развитие",
                        "Term Slug" => "detskoe-razvytye",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1017,
                        "Term Name" => "автостанція",
                        "Term Slug" => "avtostantsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1018,
                        "Term Name" => "ярмарка",
                        "Term Slug" => "iarmarka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1019,
                        "Term Name" => "ярмарок",
                        "Term Slug" => "iarmarok",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1020,
                        "Term Name" => "Холмы",
                        "Term Slug" => "kholm",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1021,
                        "Term Name" => "тренажерный зал",
                        "Term Slug" => "trenazhern-y-zal",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1022,
                        "Term Name" => "женщина года",
                        "Term Slug" => "zhenshchyna-hoda",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1023,
                        "Term Name" => "дворец культуры",
                        "Term Slug" => "dvorets-kultur",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1024,
                        "Term Name" => "акція",
                        "Term Slug" => "aktsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1025,
                        "Term Name" => "пам’ятник",
                        "Term Slug" => "pam-iatnyk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1026,
                        "Term Name" => "аукціон",
                        "Term Slug" => "auktsion",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1027,
                        "Term Name" => "библиотека",
                        "Term Slug" => "byblyoteka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1028,
                        "Term Name" => "мастер-класс",
                        "Term Slug" => "master-klass",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1029,
                        "Term Name" => "Камка",
                        "Term Slug" => "kamka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1030,
                        "Term Name" => "Холми",
                        "Term Slug" => "kholmy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1031,
                        "Term Name" => "Холминся ТГ",
                        "Term Slug" => "kholmynsia-th",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1032,
                        "Term Name" => "старостат",
                        "Term Slug" => "starostat",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1033,
                        "Term Name" => "Святой Николай",
                        "Term Slug" => "sviatoy-nykolay",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1034,
                        "Term Name" => "відділення пошти",
                        "Term Slug" => "viddilennia-poshty",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1035,
                        "Term Name" => "картина",
                        "Term Slug" => "kartyna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1036,
                        "Term Name" => "купить елку",
                        "Term Slug" => "kupyt-elku",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1037,
                        "Term Name" => "Чернгов",
                        "Term Slug" => "chernhov",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1038,
                        "Term Name" => "ялинка",
                        "Term Slug" => "ialynka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1039,
                        "Term Name" => "рынок змели",
                        "Term Slug" => "r-nok-zmely",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1040,
                        "Term Name" => "продаж землі",
                        "Term Slug" => "prodazh-zemli",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1041,
                        "Term Name" => "фермери",
                        "Term Slug" => "fermery",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1042,
                        "Term Name" => "фермеры",
                        "Term Slug" => "fermer",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1043,
                        "Term Name" => "депутат",
                        "Term Slug" => "deputat",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1044,
                        "Term Name" => "Новгород-Сівреський",
                        "Term Slug" => "novhorod-sivreskyy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1045,
                        "Term Name" => "Рідний дім",
                        "Term Slug" => "ridnyy-dim",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1046,
                        "Term Name" => "Рождество",
                        "Term Slug" => "rozhdestvo",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 1047,
                        "Term Name" => "оформление фасада",
                        "Term Slug" => "oformlenye-fasada",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1048,
                        "Term Name" => "Семенівка",
                        "Term Slug" => "semenivka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1049,
                        "Term Name" => "общественный транспорт",
                        "Term Slug" => "obshhestvennyj-transport",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1050,
                        "Term Name" => "канализация",
                        "Term Slug" => "kanalyzatsyia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1051,
                        "Term Name" => "пухова",
                        "Term Slug" => "pukhova",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1052,
                        "Term Name" => "фекальные стоки",
                        "Term Slug" => "fekaln-e-stoky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1053,
                        "Term Name" => "Десна",
                        "Term Slug" => "desna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1054,
                        "Term Name" => "фекалии",
                        "Term Slug" => "fekalyy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1055,
                        "Term Name" => "Отель",
                        "Term Slug" => "otel",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1056,
                        "Term Name" => "рыбак",
                        "Term Slug" => "r-bak",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1057,
                        "Term Name" => "сом гигант",
                        "Term Slug" => "som-hyhant",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1058,
                        "Term Name" => "поезд",
                        "Term Slug" => "poezd",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1059,
                        "Term Name" => "Кикбоксинг",
                        "Term Slug" => "kykboksynh",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1060,
                        "Term Name" => "турнир",
                        "Term Slug" => "turnyr",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1061,
                        "Term Name" => "зубр",
                        "Term Slug" => "zubr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1062,
                        "Term Name" => "заповідник",
                        "Term Slug" => "zapovidnyk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1063,
                        "Term Name" => "мидицина",
                        "Term Slug" => "mydytsyna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1064,
                        "Term Name" => "Спицина",
                        "Term Slug" => "spytsyna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1065,
                        "Term Name" => "самбо",
                        "Term Slug" => "sambo",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1066,
                        "Term Name" => "ВСУ",
                        "Term Slug" => "vsu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1067,
                        "Term Name" => "жінки",
                        "Term Slug" => "zhinky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1068,
                        "Term Name" => "військовий облік",
                        "Term Slug" => "viyskovyy-oblik",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1069,
                        "Term Name" => "начальник",
                        "Term Slug" => "nachalnyk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1070,
                        "Term Name" => "вимагав хабаря",
                        "Term Slug" => "vymahav-khabaria",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1071,
                        "Term Name" => "скраплений газ",
                        "Term Slug" => "skraplenyy-haz",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1072,
                        "Term Name" => "Чернігівщина",
                        "Term Slug" => "chernihivshchyna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1073,
                        "Term Name" => "разрушен мост",
                        "Term Slug" => "razrushen-most",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1074,
                        "Term Name" => "фура",
                        "Term Slug" => "fura",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1075,
                        "Term Name" => "ремонт моста",
                        "Term Slug" => "remont-mosta",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1076,
                        "Term Name" => "Нааз 313",
                        "Term Slug" => "naaz-313",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1077,
                        "Term Name" => "ледовая арена",
                        "Term Slug" => "ledovaia-arena",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1078,
                        "Term Name" => "дворец спорта",
                        "Term Slug" => "dvorets-sporta",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1079,
                        "Term Name" => "больница",
                        "Term Slug" => "bolnytsa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1080,
                        "Term Name" => "томограф",
                        "Term Slug" => "tomohraf",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1081,
                        "Term Name" => "диагностика",
                        "Term Slug" => "dyahnostyka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1082,
                        "Term Name" => "аренда земли",
                        "Term Slug" => "arenda-zemly",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1083,
                        "Term Name" => "різдво",
                        "Term Slug" => "rizdvo",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1084,
                        "Term Name" => "колядки",
                        "Term Slug" => "koliadky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1085,
                        "Term Name" => "регионально-ландшафтный парк",
                        "Term Slug" => "rehyonalno-landshaftn-y-park",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1086,
                        "Term Name" => "геокадастр",
                        "Term Slug" => "heokadastr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1087,
                        "Term Name" => "волейбол",
                        "Term Slug" => "voleybol",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1088,
                        "Term Name" => "чемпионат",
                        "Term Slug" => "chempyonat",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1089,
                        "Term Name" => "бренд города",
                        "Term Slug" => "brend-horoda",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1090,
                        "Term Name" => "победитель",
                        "Term Slug" => "pobedytel",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1091,
                        "Term Name" => "тарифы",
                        "Term Slug" => "taryf",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1092,
                        "Term Name" => "Елки",
                        "Term Slug" => "elky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1093,
                        "Term Name" => "тепловоз",
                        "Term Slug" => "teplovoz",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1094,
                        "Term Name" => "Чернигов-Горностаевка",
                        "Term Slug" => "chernyhov-hornostaevka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1095,
                        "Term Name" => "биатлон",
                        "Term Slug" => "byatlon",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1096,
                        "Term Name" => "камеры фиксации",
                        "Term Slug" => "kamer-fyksatsyy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1097,
                        "Term Name" => "Вячеслав Чаус",
                        "Term Slug" => "viacheslav-chaus",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1098,
                        "Term Name" => "Черниговский автозавод",
                        "Term Slug" => "chernyhovskyy-avtozavod",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1099,
                        "Term Name" => "грузовики",
                        "Term Slug" => "hruzovyky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1100,
                        "Term Name" => "спецтехника",
                        "Term Slug" => "spetstekhnyka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1101,
                        "Term Name" => "Мошенники",
                        "Term Slug" => "moshennyky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1102,
                        "Term Name" => "колл-центр",
                        "Term Slug" => "koll-tsentr",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1103,
                        "Term Name" => "Іваницька бібліотека",
                        "Term Slug" => "ivanytska-biblioteka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1104,
                        "Term Name" => "виставка",
                        "Term Slug" => "vystavka",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1105,
                        "Term Name" => "новорічні іграшки",
                        "Term Slug" => "novorichni-ihrashky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1106,
                        "Term Name" => "праздники",
                        "Term Slug" => "prazdnyky",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1107,
                        "Term Name" => "краеведческий музей",
                        "Term Slug" => "kraevedcheskyy-muzey",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1108,
                        "Term Name" => "ковидная тысяча",
                        "Term Slug" => "kovydnaia-t-siacha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1109,
                        "Term Name" => "культурная схема",
                        "Term Slug" => "kulturnaia-skhema",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1110,
                        "Term Name" => "криптовалюта",
                        "Term Slug" => "kryptovaliuta",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1111,
                        "Term Name" => "деньги",
                        "Term Slug" => "denhy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1112,
                        "Term Name" => "сборежения",
                        "Term Slug" => "sborezhenyia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1113,
                        "Term Name" => "сельсовет",
                        "Term Slug" => "selsovet",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1114,
                        "Term Name" => "авто",
                        "Term Slug" => "avto",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1115,
                        "Term Name" => "зелена зона",
                        "Term Slug" => "zelena-zona",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1116,
                        "Term Name" => "футзал",
                        "Term Slug" => "futzal",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1117,
                        "Term Name" => "Борзна",
                        "Term Slug" => "borzna",
                        "Count" => 3
                    ],
                    [
                        "Term ID" => 1118,
                        "Term Name" => "чемпіонат",
                        "Term Slug" => "chempionat",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 1119,
                        "Term Name" => "турнір",
                        "Term Slug" => "turnir",
                        "Count" => 2
                    ],
                    [
                        "Term ID" => 1176,
                        "Term Name" => "вічна калюжа",
                        "Term Slug" => "vichna-kaliuzha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2451,
                        "Term Name" => "Данилівка",
                        "Term Slug" => "danylivka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2453,
                        "Term Name" => "закрили школу",
                        "Term Slug" => "zakryly-shkolu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2455,
                        "Term Name" => "вчителі без роботи",
                        "Term Slug" => "vchyteli-bez-roboty",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2457,
                        "Term Name" => "Вертіївка",
                        "Term Slug" => "vertiivka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2459,
                        "Term Name" => "Анна Колесник",
                        "Term Slug" => "anna-kolesnyk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2461,
                        "Term Name" => "вільна боротьба",
                        "Term Slug" => "vilna-borotba",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2463,
                        "Term Name" => "Крок до Олімпу",
                        "Term Slug" => "krok-do-olimpu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2465,
                        "Term Name" => "Квартирник",
                        "Term Slug" => "kvartyrnyk",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2467,
                        "Term Name" => "Творча Туса",
                        "Term Slug" => "tvorcha-tusa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2469,
                        "Term Name" => "поліцейський офіс",
                        "Term Slug" => "politseyskyy-ofis",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2471,
                        "Term Name" => "негода",
                        "Term Slug" => "nehoda",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2473,
                        "Term Name" => "знеструмлені населенні пункти",
                        "Term Slug" => "znestrumleni-naselenni-punkty",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2475,
                        "Term Name" => "книга",
                        "Term Slug" => "knyha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2477,
                        "Term Name" => "Людмила Корженко",
                        "Term Slug" => "liudmyla-korzhenko",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2479,
                        "Term Name" => "ТЕМНІ СПІРАЛІ СМАРАГДОВОГО КРУГА",
                        "Term Slug" => "temni-spirali-smarahdovoho-kruha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2481,
                        "Term Name" => "Центральна Ніжинська бібліотека",
                        "Term Slug" => "tsentralna-nizhynska-biblioteka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2483,
                        "Term Name" => "ТЕЦ",
                        "Term Slug" => "tets",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2485,
                        "Term Name" => "ТехНова",
                        "Term Slug" => "tekhnova",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2487,
                        "Term Name" => "Облтеплокомуненерго",
                        "Term Slug" => "oblteplokomunenerho",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2489,
                        "Term Name" => "тарифи",
                        "Term Slug" => "taryfy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2491,
                        "Term Name" => "Водохреща",
                        "Term Slug" => "vodokhreshcha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2493,
                        "Term Name" => "прикмети",
                        "Term Slug" => "prykmety",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2495,
                        "Term Name" => "Інша Тиша",
                        "Term Slug" => "insha-tysha",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2497,
                        "Term Name" => "мелодекламація",
                        "Term Slug" => "melodeklamatsiia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2501,
                        "Term Name" => "соціальний газ",
                        "Term Slug" => "sotsialnyy-haz",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2503,
                        "Term Name" => "хлібзавод",
                        "Term Slug" => "khlibzavod",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2505,
                        "Term Name" => "об’єм газу",
                        "Term Slug" => "ob-iem-hazu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2507,
                        "Term Name" => "харчової промисловості",
                        "Term Slug" => "kharchovoi-promyslovosti",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2509,
                        "Term Name" => "газ за пільговою ціною",
                        "Term Slug" => "haz-za-pilhovoiu-tsinoiu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2511,
                        "Term Name" => "соціальну значущість продукції",
                        "Term Slug" => "sotsialnu-znachushchist-produktsii",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2513,
                        "Term Name" => "Ладан",
                        "Term Slug" => "ladan",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2515,
                        "Term Name" => "Ладанська територіальна громада",
                        "Term Slug" => "ladanska-terytorialna-hromada",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2517,
                        "Term Name" => "Виповзів",
                        "Term Slug" => "vypovziv",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2519,
                        "Term Name" => "Деснянська ОТГ",
                        "Term Slug" => "desnianska-oth",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2521,
                        "Term Name" => "проблеми Деснянської ОТГ",
                        "Term Slug" => "problemy-desnianskoi-oth",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2523,
                        "Term Name" => "Ковбаса із саморізом",
                        "Term Slug" => "kovbasa-iz-samorizom",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2525,
                        "Term Name" => "Гірський старостинський округ",
                        "Term Slug" => "hirskyy-starostynskyy-okruh",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2527,
                        "Term Name" => "незаконна вирубка",
                        "Term Slug" => "nezakonna-vyrubka",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2529,
                        "Term Name" => "Корюківський район",
                        "Term Slug" => "koriukivskyy-rayon",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2644,
                        "Term Name" => "політична криза",
                        "Term Slug" => "politychna-kryza",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2646,
                        "Term Name" => "без бюджету",
                        "Term Slug" => "bez-biudzhetu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2648,
                        "Term Name" => "Коропська ОТГ",
                        "Term Slug" => "koropska-oth",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2650,
                        "Term Name" => "Чемпіонат України",
                        "Term Slug" => "chempionat-ukrainy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2652,
                        "Term Name" => "призери",
                        "Term Slug" => "pryzery",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2654,
                        "Term Name" => "опалення горищ та підвалів",
                        "Term Slug" => "opalennia-horyshch-ta-pidvaliv",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2656,
                        "Term Name" => "ЖКГ",
                        "Term Slug" => "zhkh",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2658,
                        "Term Name" => "додаткова плата",
                        "Term Slug" => "dodatkova-plata",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2660,
                        "Term Name" => "централізоване теплопостачання",
                        "Term Slug" => "tsentralizovane-teplopostachannia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2662,
                        "Term Name" => "Замглай",
                        "Term Slug" => "zamhlay",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2664,
                        "Term Name" => "вибори голови",
                        "Term Slug" => "vybory-holovy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2739,
                        "Term Name" => "нарушение законодательства",
                        "Term Slug" => "narushenye-zakonodatelstva",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2741,
                        "Term Name" => "распашка земель",
                        "Term Slug" => "raspashka-zemel",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2744,
                        "Term Name" => "Седнів",
                        "Term Slug" => "sedniv",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2747,
                        "Term Name" => "злочинна группа",
                        "Term Slug" => "zlochynna-hruppa",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2749,
                        "Term Name" => "торгівля людьми",
                        "Term Slug" => "torhivlia-liudmy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2751,
                        "Term Name" => "історичний музей",
                        "Term Slug" => "istorychnyy-muzey",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2753,
                        "Term Name" => "День кота",
                        "Term Slug" => "den-kota",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2755,
                        "Term Name" => "сирени",
                        "Term Slug" => "syreny",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2757,
                        "Term Name" => "система оповіщення",
                        "Term Slug" => "systema-opovishchennia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2759,
                        "Term Name" => "улица Васильевская",
                        "Term Slug" => "ulytsa-vasylevskaia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2761,
                        "Term Name" => "погане поводження з дитиною",
                        "Term Slug" => "pohane-povodzhennia-z-dytynoiu",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2763,
                        "Term Name" => "Космопарк в Чернигове",
                        "Term Slug" => "kosmopark-v-chernyhove",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2765,
                        "Term Name" => "Часниківська церква св. Васілія Великого",
                        "Term Slug" => "chasnykivska-tserkva-sv-vasiliia-velykoho",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2767,
                        "Term Name" => "Сосниця",
                        "Term Slug" => "sosnytsia",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2769,
                        "Term Name" => "КПНЗ «ДЮСШ «Фортуна»",
                        "Term Slug" => "kpnz-dyussh-fortuna",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2771,
                        "Term Name" => "Олександр Криворучко",
                        "Term Slug" => "oleksandr-kryvoruchko",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2773,
                        "Term Name" => "Солитер в рыбе",
                        "Term Slug" => "solyter-v-r-be",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2775,
                        "Term Name" => "Земснаряд",
                        "Term Slug" => "zemsnariad",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2777,
                        "Term Name" => "Конкурс рецептів",
                        "Term Slug" => "konkurs-retseptiv",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2779,
                        "Term Name" => "дороги",
                        "Term Slug" => "dorohy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2781,
                        "Term Name" => "Седнев",
                        "Term Slug" => "sednev",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2783,
                        "Term Name" => "Клочків",
                        "Term Slug" => "klochkiv",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2785,
                        "Term Name" => "день рідної мови",
                        "Term Slug" => "den-ridnoi-movy",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2787,
                        "Term Name" => "Юрій Шень",
                        "Term Slug" => "yuriy-shen",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2789,
                        "Term Name" => "обікрали пенсіонерку",
                        "Term Slug" => "obikraly-pensionerku",
                        "Count" => 1
                    ],
                    [
                        "Term ID" => 2791,
                        "Term Name" => "Велике будівництво",
                        "Term Slug" => "velyke-budivnytstvo"
                    ],
                    [
                        "Term ID" => 2793,
                        "Term Name" => "воєнний стан",
                        "Term Slug" => "voiennyy-stan"
                    ],
                    [
                        "Term ID" => 2795,
                        "Term Name" => "програми звязку",
                        "Term Slug" => "prohramy-zviazku"
                    ],
                    [
                        "Term ID" => 2797,
                        "Term Name" => "вуличне світло",
                        "Term Slug" => "vulychne-svitlo"
                    ],
                    [
                        "Term ID" => 2799,
                        "Term Name" => "Горить СБУ в Чернігові",
                        "Term Slug" => "horyt-sbu-v-chernihovi"
                    ]
                ];

            $id = 1; // Initialize the id

            foreach ($data as $item) {
                DB::table('tags')->insert([
                    'id' => $id,
                    'name' => $item['Term Name'],
                    'slug' => $item['Term Slug'],
                ]);

                $id++; // Increment the id
            }
        }
    }

