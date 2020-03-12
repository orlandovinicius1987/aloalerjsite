const appName = 'vue-phones'

if (jQuery('#' + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        data: {
            phones: [],
            filter: '',
            obs: '',
        },

        computed: {
            filteredPhones() {
                if (!this.filter) {
                    return this.phones
                }

                return _.filter(this.phones, phone => {
                    return new RegExp(this.filter, 'i').test(
                        phone.name + phone.label,
                    )
                })
            },
        },

        methods: {
            __loadData() {
                return [
                    {
                        label: 'ABAM',
                        name:
                            'Associação Brasileira de Auxílio Mútuo ao Servidor Público',
                        phones: ['2232-4580'],
                        obs: '',
                    },
                    {
                        label: 'DISQUE CCR BARCAS',
                        name: '',
                        phones: ['0800-721-1012'],
                        obs: '',
                    },
                    {
                        label: 'Aeroporto Internacional RioGaleão',
                        name: '',
                        phones: ['3004-6050'],
                        obs: '(Atendimento 06h às 00h)',
                    },
                    {
                        label: 'Aeroporto de Jacarepaguá',
                        name: '',
                        phones: ['2432-7070'],
                        obs: '',
                    },
                    {
                        label: 'Aeroporto Santos Dumont',
                        name: '',
                        phones: ['3814-7070'],
                        obs: '',
                    },
                    {
                        label: 'Agência Nacional de Saúde',
                        name: '',
                        phones: ['3398-4527'],
                        obs: '',
                    },
                    {
                        label: 'Água e esgoto',
                        name: 'Cedae (Companhia Estadual de Águas e Esgotos)',
                        phones: ['0800-031-6032'],
                        obs:
                            '(diariamente, das 9hs às 17hs, exceto sábados, domingos e feriados)',
                    },
                    {
                        label: 'Al-Anon',
                        name: '',
                        phones: ['2507-4558'],
                        obs: '',
                    },
                    {
                        label: 'Alcoólicos Anônimos',
                        name: '',
                        phones: ['2507-5830'],
                        obs: '',
                    },
                    {
                        label: 'Alô Rio',
                        name: '',
                        phones: ['2542-8080, 2542-8004'],
                        obs: '',
                    },
                    {
                        label: 'Ambulância',
                        name: 'Serviço Público de Remoção de Doentes - SAMU',
                        phones: ['192'],
                        obs: '',
                    },
                    {
                        label: 'Enel',
                        name: 'Iluminação e energia',
                        phones: ['0800-280-0120'],
                        obs: '',
                    },
                    {
                        label: 'ANATEL',
                        name: '',
                        phones: ['1331'],
                        obs: '',
                    },
                    {
                        label: 'Animais',
                        name:
                            'Suipa (Sociedade União Internacional Protetora dos Animais)',
                        phones: [
                            '2501-1529, 2501-9954, 2261-6875, 2501-8691, 2261-9405, 2501-1085',
                        ],
                        obs: '',
                    },
                    {
                        label: 'Anjos do Asfalto',
                        name: '',
                        phones: ['2590-2121'],
                        obs: '',
                    },
                    {
                        label: 'ASEP',
                        name:
                            'Agência Reguladora de Serviços Públicos do Rio de Janeiro',
                        phones: ['2253-4813'],
                        obs: '',
                    },
                    {
                        label: 'Atendimento ao Turista',
                        name: 'Centro Integrado de Atendimento ao Turista',
                        phones: ['2541-7522, 2542-8004, 2542-8080'],
                        obs: '',
                    },
                    {
                        label: 'APAE',
                        name: '',
                        phones: ['2220-5065'],
                        obs: '',
                    },
                    {
                        label: 'Banco Central',
                        name: '',
                        phones: ['2253-9283'],
                        obs: '',
                    },
                    {
                        label: 'Banco de Sangue',
                        name: '',
                        phones: ['0800-280-0120'],
                        obs: '',
                    },
                    {
                        label: 'BPTur',
                        name: 'Batalhão de Policiamento em Áreas Turísticas',
                        phones: ['2332-7932'],
                        obs: '',
                    },
                    {
                        label: 'Barcas',
                        name: '',
                        phones: ['133'],
                        obs: '',
                    },
                    {
                        label: 'Caixa Econômica Federal',
                        name: '',
                        phones: ['3978-8827'],
                        obs: '',
                    },
                    {
                        label: 'CAS',
                        name: '',
                        phones: ['3978-8829'],
                        obs: '',
                    },
                    {
                        label: 'Naturgy',
                        name: 'Gás',
                        phones: ['0800-024-0197, 0800-282-0205'],
                        obs: '',
                    },
                    {
                        label: 'Central de Atendimento à Mulher',
                        name: '',
                        phones: ['180'],
                        obs: '',
                    },
                    {
                        label: 'Ouvidoria da Prefeitura do RJ',
                        name: '',
                        phones: ['1746'],
                        obs: '',
                    },
                    {
                        label:
                            'Companhia de Engenharia de Tráfego do RJ - CET-Rio',
                        name: 'Trânsito',
                        phones: ['1746'],
                        obs: '',
                    },
                    {
                        label: 'Comlurb',
                        name: 'Companhia Municipal de Limpeza Urbana',
                        phones: ['1746'],
                        obs: '',
                    },
                    {
                        label: 'Corpo de Bombeiros',
                        name: '',
                        phones: ['193'],
                        obs: '',
                    },
                    {
                        label: 'Correios',
                        name: '',
                        phones: ['0800-570-0100'],
                        obs: '',
                    },
                    {
                        label: 'S.O.S Crianças Desaparecidas',
                        name: '',
                        phones: ['2286-8337'],
                        obs: '',
                    },
                    {
                        label: 'CVV',
                        name: 'Centro de Valorização da Vida',
                        phones: ['0800-726-0101'],
                        obs: '',
                    },
                    {
                        label: 'Defesa Civil',
                        name: '',
                        phones: ['199'],
                        obs: '',
                    },
                    {
                        label: 'Defesa Civil Estadual',
                        name: '',
                        phones: ['3399-4302, 3399-4301, 2293-1713'],
                        obs: '',
                    },
                    {
                        label: 'Defesa Civil Municipal',
                        name: '',
                        phones: ['199'],
                        obs: '',
                    },
                    {
                        label: 'DEAT - Delegacia Especial de Apoio ao Turismo',
                        name: '',
                        phones: ['2332-2924'],
                        obs: '',
                    },
                    {
                        label: 'DEAM Delegacia de Atendimento a Mulher',
                        name: '',
                        phones: ['2332-9994'],
                        obs: '',
                    },
                    {
                        label: 'Detran',
                        name: '',
                        phones: ['0800-020-4042, 3460-4042'],
                        obs: '',
                    },
                    {
                        label: 'Direitos Humanos',
                        name: '',
                        phones: ['2508-5500'],
                        obs: '',
                    },
                    {
                        label: 'Disque-Aids',
                        name: '',
                        phones: ['0800-570-0100'],
                        obs: '',
                    },
                    {
                        label: 'Disque-Amamentação',
                        name: '',
                        phones: ['141'],
                        obs: '',
                    },
                    {
                        label: 'Disque Barulho',
                        name: '',
                        phones: ['2503-2795'],
                        obs: '',
                    },
                    {
                        label: 'Disque Denúncia',
                        name: '',
                        phones: ['2253-1177'],
                        obs: '',
                    },
                    {
                        label: 'Disque Intoxicação',
                        name: '',
                        phones: ['0800 722 6001'],
                        obs: '',
                    },
                    {
                        label: 'Disque Procon',
                        name: 'Defesa do consumidor',
                        phones: ['1512'],
                        obs: '',
                    },
                    {
                        label: 'Disque Sinal',
                        name: '',
                        phones: ['2508-5500'],
                        obs: '',
                    },
                    {
                        label: 'Disque Transportes',
                        name: 'Trânsito',
                        phones: ['2286-8010'],
                        obs: '',
                    },
                    {
                        label: 'Disque Verde',
                        name: 'Patrulha ambiental',
                        phones: ['2498-1001'],
                        obs: '',
                    },
                    {
                        label: 'GAT',
                        name: 'Grupamento de Apoio ao Turista',
                        phones: ['2535-3780, 2535-2385'],
                        obs: '',
                    },
                    {
                        label: 'Disque Sangue HEMORIO',
                        name: '',
                        phones: ['0800 2820708'],
                        obs: '',
                    },
                    {
                        label: 'INCA',
                        name: '',
                        phones: ['3207-1000'],
                        obs: '',
                    },
                    {
                        label: 'Instituto Benjamin Constant',
                        name: '',
                        phones: ['3478-4442'],
                        obs: '',
                    },
                    {
                        label: 'Light',
                        name: 'Iluminação e energia',
                        phones: ['0800-282-0120'],
                        obs: '',
                    },
                    {
                        label: 'Moradores de rua',
                        name:
                            'Secretaria de Estado de Assistência Social e Direitos Humanos',
                        phones: ['2299-5451, 2299-5697'],
                        obs: '',
                    },
                    {
                        label: 'Nar-Anon',
                        name: '',
                        phones: ['2263-6595'],
                        obs: '',
                    },
                    {
                        label: 'Narcóticos Anônimos',
                        name: '',
                        phones: ['2533-5015'],
                        obs: '',
                    },
                    {
                        label: 'Polícia Civil',
                        name: '',
                        phones: ['2276-6497'],
                        obs: '',
                    },
                    {
                        label: 'Polícia Federal',
                        name: '',
                        phones: ['2203-4000'],
                        obs: '',
                    },
                    {
                        label: 'Polícia Militar',
                        name: '',
                        phones: ['190'],
                        obs: '',
                    },
                    {
                        label: 'Fundação Parques e Jardins',
                        name: '',
                        phones: ['2224-8088'],
                        obs: '',
                    },
                    {
                        label: 'RioLuz',
                        name: 'Iluminação e energia',
                        phones: ['3907-5600, 2535-5151'],
                        obs: '',
                    },
                    {
                        label: 'Rodoviária Novo Rio',
                        name: '',
                        phones: ['2263-4857, 3213-1800, R 397'],
                        obs: '',
                    },
                    {
                        label: 'Secretaria Municipal de Assistência Social',
                        name: '',
                        phones: ['3973-3800'],
                        obs: '',
                    },
                    {
                        label: 'Tapa buraco',
                        name: '',
                        phones: ['2589-1234'],
                        obs: '',
                    },
                    {
                        label: 'Telefonia',
                        name: '',
                        phones: ['10331'],
                        obs: '',
                    },
                    {
                        label: 'TURISRIO',
                        name:
                            'Companhia de Turismo do Estado do Rio de Janeiro',
                        phones: ['0800 282 2007, 2333-1037'],
                        obs: '',
                    },
                    {
                        label: 'Vigilância sanitária',
                        name: '',
                        phones: ['2503-2280, 2215-0690'],
                        obs: '',
                    },
                ]
            },
        },

        mounted() {
            this.phones = this.__loadData()
        },
    })
}
