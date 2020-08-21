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
                        label: 'Alô Alerj ',
                        name:
                            'O Alô Alerj é um canal de comunicação entre Você e a Assembleia Legislativa do Estado do Rio de Janeiro (Alerj). Aqui você pode registrar reclamações, solicitações e sugestões sobre temas que são tratados nas comissões e no plenário da Casa. ',
                        phones: ['0800-022-0008'],
                        obs: '',
                    },
                    {
                        label: 'DISQUE CCR BARCAS',
                        name: '',
                        phones: ['0800-721-1012','Para deficientes auditivos: 0800-025-3053'],
                        obs: '',
                    },
                    {
                        label: 'Disque Cidadania LGBT',
                        name: 'Para orientar LGBTs e familiares em situação de violência e discriminação. Aconselhar LGBTs em situação de crise, processo de descoberta, medo, rejeição familiar, entre outros. Informar sobre serviços e ações voltadas para LGBTs no estado.',
                        phones: ['0800-023-4567'],
                        obs: '(Atendimento 06h às 00h)',
                    },
                    {
                        label: 'Detran',
                        name: 'Para agendar a vistoria anual. O 0800 é para quem está no interior e o outro número para motoristas da capital.',
                        phones: ['0800-020-4040','3460-4040'],
                        obs: '',
                    },
                    {
                        label: 'Disque Transplante',
                        name: 'Recebe notificações de morte encefálica em todo o estado, agilizando o contato entre os profissionais de saúde e o Programa Estadual de Transplantes. Também tira dúvidas sobre o assunto.',
                        phones: ['155'],
                        obs: '',
                    },
                    {
                        label: 'Polícia Militar',
                        name: 'Quando a pessoa é vítima da ação de infratores, situações de risco e perturbação da ordem.',
                        phones: ['190'],
                        obs: '',
                    },
                    {
                        label: 'SAMU',
                        name: 'Problemas clínicos, traumas, acidentes, alteração do estado de consciência e intoxicação. Também pode ser acionado em caso de morte natural ocorrida em casa.',
                        phones: ['192'],
                        obs:
                            '',
                    },
                    {
                        label: 'Bombeiros',
                        name: 'Incêndios, acidentes, corte de árvore, salvamento de pessoas ou animais, ferimentos por arma de fogo ou arma branca, queimaduras, soterramentos e retirada de animais que podem atacar.',
                        phones: ['193'],
                        obs: '',
                    },
                    {
                        label: 'Polícia Civil',
                        name: 'Para denúncias de porte de arma, drogas, tráfico, entre outros.',
                        phones: ['197'],
                        obs: '',
                    },
                    {
                        label: 'Defesa Civil',
                        name: 'Em casos de alagamentos e enchentes, processos erosivos, derramamento de óleo em via pública, pontes com a infraestrutura abalada e demais casos de emergência.',
                        phones: ['199'],
                        obs: '',
                    },
                    {
                        label: 'Procon',
                        name: 'Situações que ferem o Direito do Consumidor.',
                        phones: ['151'],
                        obs: '',
                    },
                    {
                        label: 'Disque Mulher',
                        name: 'Quando há mulheres em situação de violência ou discriminação.',
                        phones: ['2332-8249'],
                        obs: '',
                    },
                    {
                        label: 'Racismo / Intolerância Religiosa ',
                        name: 'Para denunciar casos de injúria e discriminação em geral.',
                        phones: ['2334-5577'],
                        obs: '',
                    },
                    {
                        label: 'Disque Ambiente',
                        name:
                            'Registramos e protocolamos ligações quanto à solicitação / denúncia para encaminhamento posterior à Ouvidoria do INEA. Com o número do protocolo, o interessado pode acompanhar o andamento.',
                        phones: [
                            '2332-4604'],
                        obs: '',
                    },
                    {
                        label: 'Disque-Denúncia VERDE',
                        name: 'Parceria da Secretaria do Ambiente com o Disque-Denúncia, Programa Linha Verde centraliza denúncias de crimes ambientais pelo telefone.',
                        phones: ['2253-1177 (Capital)','0300-253-1177 (Interior)'],
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
