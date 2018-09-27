const appName = 'vue-phones'

if (jQuery("#" + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        data: {
            phones: [],

            filter: '',
        },

        computed: {
            filteredPhones() {
                if (!this.filter) {
                    return this.phones
                }
                
                return _.filter(this.phones, (phone) =>  {return new RegExp(this.filter, 'i').test(phone.name + phone.label)});
            }
        },

        methods: {
            __loadData() {
                return [
                    {
                        'label': 'ABAM',
                        'name': 'Associação Brasileira de Auxílio Mútuo ao Servidor Público',
                        'phones':['2232-4580']
                    },
                    {
                        'label': 'Aerobarcas',
                        'name': '',
                        'phones':['2533-4343']
                    },
                    {
                        'label': 'Aeroporto Internacional',
                        'name': '',
                        'phones':['2432-7070']
                    },
                    {
                        'label': 'Aeroporto de Jacarepaguá',
                        'name': '',
                        'phones':['2620-8589']
                    },
                    {
                        'label': 'Aeroporto Santos Dumont',
                        'name': '',
                        'phones':['3398-5050']
                    },
                    {
                        'label': 'AFDM - BRASIL',
                        'name': '',
                        'phones':['3398-4526']
                    },
                    {
                        'label': 'Agência Nacional de Saúde',
                        'name': '',
                        'phones':['3398-4527']
                    },
                    {
                        'label': 'Água e esgoto',
                        'name': 'Cedae (Companhia Estadual de Águas e Esgotos)',
                        'phones':['0800-2821-195']
                    },
                    {
                        'label': 'Al-Anon',
                        'name': '',
                        'phones':['2507-4558']
                    },
                    {
                        'label': 'Alcoólicos Anônimos',
                        'name': '',
                        'phones':['2507-5830']
                    },
                    {
                        'label': 'Alô Rio',
                        'name': '',
                        'phones':['2542-8080, 2542-8004']
                    },
                    {
                        'label': 'Ambulância',
                        'name': 'Serviço Público de Remoção de Doentes - SAMU',
                        'phones':['192']
                    },
                    {
                        'label': 'Ampla',
                        'name': 'Iluminação e energia',
                        'phones':['0800-2821-195']
                    },
                    {
                        'label': 'ANATEL',
                        'name': '',
                        'phones':['0800-282-1195']
                    },
                    {
                        'label': 'Animais',
                        'name': 'Suipa (Sociedade União Internacional Protetora dos Animais)',
                        'phones':['2501-1529, 2501-9954, 2261-6875, 2501-8691, 2261-9405, 2501-1085']
                    },
                    {
                        'label': 'Anjos do Asfalto',
                        'name': '',
                        'phones':['2590-2121']
                    },
                    {
                        'label': 'ASEP',
                        'name': 'Agência Reguladora de Serviços Públicos do Rio de Janeiro',
                        'phones':['2253-4813']
                    },
                    {
                        'label': 'Atendimento ao Turista',
                        'name': 'Centro Integrado de Atendimento ao Turista',
                        'phones':['2541-7522, 2542-8004, 2542-8080']
                    },{
                    'label': 'APAE',
                    'name': '',
                    'phones':['2220-5065']
                },
                    {
                        'label': 'Banco Central',
                        'name': '',
                        'phones':['2253-9283']
                    },
                    {
                        'label': 'Banco de Sangue',
                        'name': '',
                        'phones':['0800-280-0120']
                    },
                    {
                        'label': 'BPTur',
                        'name': 'Batalhão de Policiamento em Áreas Turísticas',
                        'phones':['2332-7932']
                    },
                    {
                        'label': 'Barcas',
                        'name': '',
                        'phones':['133']
                    },
                    {
                        'label': 'Caixa Econômica Federal',
                        'name': '',
                        'phones':['3978-8827']
                    },
                    {
                        'label': 'CAS',
                        'name': '',
                        'phones':['3978-8829']
                    },
                    {
                        'label': 'Cedae',
                        'name': '',
                        'phones':['0800-24-9040']
                    },
                    {
                        'label': 'CEG',
                        'name': 'Gás',
                        'phones':['0800-24-7766, 0800-282-0205, 0800-979-2345']
                    },
                    {
                        'label': 'Central de Atendimento à Mulher',
                        'name': '',
                        'phones':['180']
                    },
                    {
                        'label': 'Central de Atendimento ao Cidadão',
                        'name': '',
                        'phones':['1746']
                    },
                    {
                        'label': 'CET-Rio',
                        'name': 'Trânsito',
                        'phones':['2226-5566, 0800-282-0708']
                    },
                    {
                        'label': 'Comlurb',
                        'name': 'Companhia Municipal de Limpeza Urbana',
                        'phones':['2204-9999, 2214-7073']
                    },
                    {
                        'label': 'Corpo de Bombeiros',
                        'name': '',
                        'phones':['193']
                    },
                    {
                        'label': 'Correios',
                        'name': '',
                        'phones':['0800-570-0100']
                    },
                    {
                        'label': 'Crianças desaparecidas',
                        'name': '',
                        'phones':['2286-8337, 2226-6375, 2286-7631']
                    },
                    {
                        'label': 'CVV',
                        'name': 'Centro de Valorização da Vida',
                        'phones':['0800-726-0101']
                    },
                    {
                        'label': 'Defesa Civil',
                        'name': '',
                        'phones':['199']
                    },
                    {
                        'label': 'Defesa Civil Estadual',
                        'name': '',
                        'phones':['3399-4302, 3399-4301, 2293-1713']
                    },
                    {
                        'label': 'Defesa Civil Municipal',
                        'name': '',
                        'phones':['199']
                    },
                    {
                        'label': 'Delegacia de Atendimento ao Turista',
                        'name': '',
                        'phones':['0800-282-1195']
                    },
                    {
                        'label': 'Delegacia da Mulher',
                        'name': '',
                        'phones':['142']
                    },
                    {
                        'label': 'Detran',
                        'name': '',
                        'phones':['0800-20-4040, 0800-24-7766']
                    },
                    {
                        'label': 'Direitos Humanos',
                        'name': '',
                        'phones':['2508-5500']
                    },
                    {
                        'label': 'Disque-Aids',
                        'name': '',
                        'phones':['0800-570-0100']
                    },
                    {
                        'label': 'Disque-Amamentação',
                        'name': '',
                        'phones':['141']
                    },
                    {
                        'label': 'Disque Barulho',
                        'name': '',
                        'phones':['2503-2795']
                    },
                    {
                        'label': 'Disque Denúncia',
                        'name': '',
                        'phones':['2253-1177']
                    },
                    {
                        'label': 'Disque Intoxicação',
                        'name': '',
                        'phones':['0800 722 6001']
                    },
                    {
                        'label': 'Disque Procon',
                        'name': 'Defesa do consumidor',
                        'phones':['1512']
                    },
                    {
                        'label': 'Disque Sinal',
                        'name': '',
                        'phones':['2508-5500']
                    },
                    {
                        'label': 'Disque Transportes',
                        'name': 'Trânsito',
                        'phones':['2286-8010']
                    },
                    {
                        'label': 'Disque Verde',
                        'name': 'Patrulha ambiental',
                        'phones':['2498-1001']
                    },
                    {
                        'label': 'GAT',
                        'name': 'Grupamento de Apoio ao Turista',
                        'phones':['2535-3780, 2535-2385']
                    },
                    {
                        'label': 'Disque Sangue HEMORIO',
                        'name': '',
                        'phones':['0800 2820708']
                    },
                    {
                        'label': 'INCA',
                        'name': '',
                        'phones':['3207-1000']
                    },
                    {
                        'label': 'Instituto Benjamin Constant',
                        'name': '',
                        'phones':['3478-4442']
                    },
                    {
                        'label': 'Light',
                        'name': 'Iluminação e energia',
                        'phones':['0800-282-0120']
                    },
                    {
                        'label': 'Moradores de rua',
                        'name': 'Secretaria de Estado de Assistência Social e Direitos Humanos',
                        'phones':['2299-5451, 2299-5697']
                    },
                    {
                        'label': 'Nar-Anon',
                        'name': '',
                        'phones':['2263-6595']
                    },
                    {
                        'label': 'Narcóticos Anônimos',
                        'name': '',
                        'phones':['2533-5015']
                    },
                    {
                        'label': 'Polícia Civil',
                        'name': '',
                        'phones':['197']
                    },
                    {
                        'label': 'Polícia Federal',
                        'name': '',
                        'phones':['194']
                    },
                    {
                        'label': 'Polícia Militar',
                        'name': '',
                        'phones':['190']
                    },
                    {
                        'label': 'Poda ou remoção de árvores',
                        'name': '',
                        'phones':['2221-2574']
                    },
                    {
                        'label': 'Praças abandonadas',
                        'name': 'Fundação Parques e Jardins',
                        'phones':['2323-3500']
                    },
                    {
                        'label': 'RioLuz',
                        'name': 'Iluminação e energia',
                        'phones':['3907-5600, 2535-5151']
                    },
                    {
                        'label': 'Rodoviária Novo Rio',
                        'name': '',
                        'phones':['2263-4857, 3213-1800, R 397']
                    },
                    {
                        'label': 'Secretaria Municipal de Assistência Social',
                        'name': '',
                        'phones':['3973-3800']
                    },
                    {
                        'label': 'Tapa buraco',
                        'name': '',
                        'phones':['2589-1234']
                    },
                    {
                        'label': 'Telefonia',
                        'name': '',
                        'phones':['10331']
                    },
                    {
                        'label': 'TURISRIO',
                        'name': 'Companhia de Turismo do Estado do Rio de Janeiro',
                        'phones':['0800 282 2007, 2333-1037']
                    },
                    {
                        'label': 'Vigilância sanitária',
                        'name': '',
                        'phones':['2503-2280, 2215-0690']
                    }
                ]
            }
        },

        mounted() {
            this.phones = this.__loadData()
        },
    })
}
