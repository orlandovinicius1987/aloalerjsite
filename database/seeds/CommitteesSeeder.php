<?php
use App\Data\Models\Committee;
use Illuminate\Database\Seeder;

class CommitteesSeeder extends Seeder
{
    private function getData()
    {
        return coollect([
            'defesadoconsumidor' => [
                'slug' => 'defesadoconsumidor',
                'name' => 'Comissão de Defesa do Consumidor',
                'link_caption' => 'Defesa do Consumidor',
                'short_name' => 'Defesa do Consumidor',
                'phone' => '0800-282-7060',
                'texto' => '<p>A Comissão de Defesa dos Direitos do Consumidor zela pelos seus direitos enquanto consumidor, seja de serviços ou produtos. Ela se manifesta aos assuntos referentes à economia popular; à composição, qualidade, apresentação, publicidade e distribuição de bens e serviços; às relações de consumo e medidas de defesa do consumidor; e ao acolhimento e investigação de denúncias relacionados aos direitos do consumidor.</p>
     <p>Existem várias formas de entrar em contato com a comissão. Os atendimentos são feitos pelos canais do Alô Alerj ou presencialmente, na sala localizada no térreo do prédio da Alerj, na Rua da Alfândega, número 8. A comissão também vai até você por meio do Ônibus Itinerante, que faz rotas por todo o Estado. Para solicitar a presença do Ônibus da Defesa do Consumidor em seu bairro e conferir os itinerários já programados, <a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"><strong>clique aqui</strong></a>.</p>',
                'president' => 'Deputado Fábio Silva',
                'vice-president' => 'Deputado Thiago Pampolha',
                'public' => true,
                'office_phone' => '0800 282-7060',
                'office_address' =>
                    'Rua da Alfândega, nº 8, Centro. Atendimento presencial nesse endereço, no térreo, de 9h às 18h.',
            ],
            'meioambiente' => [
                'slug' => 'meioambiente',
                'name' => 'Comissão de Defesa do Meio Ambiente',
                'link_caption' => 'Meio Ambiente',
                'short_name' => 'Defesa do Meio Ambiente',
                'phone' => '0800-282-0230',
                'texto' =>
                    '<p>A Comissão de Defesa de Meio Ambiente cuida da proteção dos recursos naturais e zela pelo desenvolvimento sustentável do Estado. É um meio não só de prevenção, mas também de alerta para os maus-tratos à natureza. O registro das reclamações de temas relacionados à defesa do meio ambiente podem ser feitos anonimamente para garantir a segurança do denunciante. A comissão se manifesta aos assuntos referentes: à política e sistema regionais do meio ambiente; à legislação de defesa ecológica; aos recursos naturais renováveis; à fauna, flora e ao solo; aos processos de edafologia e desertificação, ao incentivo ao reflorestamento; à preservação e proteção das culturas populares e étnicas do Estado.</p>',
                'president' => 'Deputado Thiago Pampolha',
                'vice-president' => 'Deputado Jorge Felippe Neto',
                'public' => true,
                'office-phone' => '(21) 2588-1360',
                'office_address' =>
                    'Departamento de Apoio às Comissões Permanentes - sala 316 do Palácio Tiradentes',
            ],
            'preconceitos' => [
                'slug' => 'preconceitos',
                'name' =>
                    'Comissão de Combate às Discriminações e Preconceitos de Raça, Cor, Etnia, Religião e Procedência Nacional',
                'link_caption' => 'Preconceitos',
                'short_name' => 'Combate às Discriminações e Preconceitos',
                'phone' => '0800-282-0802',
                'texto' =>
                    '<p>A Comissão de Combate às Discriminações e Preconceitos de Raça, Cor, Etnia, Religião e Procedência Nacional recebe e investiga denúncias de preconceito. Para lutar contra a discriminação, a comissão conta com a colaboração de várias entidades que se destinam a esse tipo de combate. Compete à comissão acompanhar e se manifestar sobre todos os assuntos pertinentes às ideologias racistas e práticas discriminatórias em geral.</p>',
                'president' => 'Deputado Carlos Minc',
                'vice_president' => 'Deputada Mônica Francisco',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Rua da Assembleia, s/nº – gabinete 308 – Centro.',
            ],
            'pirataria' => [
                'slug' => 'pirataria',
                'name' =>
                    'Comissão de Para Prevenir e Combater Pirataria no Estado do Rio de Janeiro',
                'link_caption' => 'Pirataria',
                'short_name' => 'Prevenção e Combate a Pirataria',
                'phone' => '0800-282-6582',
                'texto' =>
                    '<p>A Comissão para Prevenir e Combater a Pirataria investiga pontos de comercialização de produtos piratas e trabalha para combatê-los. Para isso, conta com a ajuda da população, que pode fazer denúncias anônimas por meio do Alô Alerj.  Produtos ou obras piratas são aqueles que infringem patentes, direitos autorais ou são reproduções não autorizadas.
            
            Cabe à comissão manifestar-se sobre todas as proposições pertinentes a assuntos relacionados à pirataria; fiscalizar e acompanhar os programas, projetos e ações governamentais de combate à pirataria; estimular ações da sociedade civil voltadas ao combate à pirataria no Estado; realizar discussões sobre o tema; promover campanhas de conscientização; e propor ações preventivas aos governos e estimular pesquisas sobre o assunto.</p>',
                'president' => 'Deputado Subtenente Bernardo',
                'vice_president' => 'Deputado Anderson Moraes',
                'public' => true,
                'office_phone' => '(21) 2588-1732',
                'office_address' => 'Palácio 23 de Julho, térreo, gabinete 01',
            ],
            'pessoadeficiente' => [
                'slug' => 'pessoadeficiente',
                'name' => 'Comissão de Pessoa com Deficiência',
                'link_caption' => 'Pessoa Deficiente (MUDAR!!!)',
                'short_name' => 'Pessoa com Deficiência',
                'phone' => '0800-285-5005',
                'texto' =>
                    '<p>A Comissão da Pessoa com Deficiência tem como objetivo assegurar os direitos de todas as pessoas com algum tipo de deficiência. Ela recebe e investiga denúncias relacionas ao tema, por meio do Alô Alerj.  A comissão conta com a colaboração de entidades que estão relacionadas à causa. Compete a ela se manifestar sobre todas as proposições referentes à Pessoa com Deficiência, bem como à legislação pertinente.</p>',
                'president' => 'Deputado Gil Vianna',
                'vice_president' => 'Deputada Franciane Motta',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' => 'Palácio Tiradentes, sala 112',
            ],
            'saneamentoambiental' => [
                'slug' => 'saneamentoambiental',
                'name' => 'Comissão de Saneamento Ambiental',
                'link_caption' => 'Saneamento Ambiental',
                'short_name' => 'Saneamento Ambiental',
                'phone' => '0800-282-8815',
                'texto' => '
                <p>A Comissão de Saneamento ambiental atua em ações técnicas e socioeconômicas fundamentadas na busca de melhorias da saúde pública, tendo por objetivo monitorar, fiscalizar e acompanhar níveis crescentes de salubridade ambiental no Estado do Rio de Janeiro.</p>
                
                <br>

                <p>Dentre as principais atividades relacionadas ao saneamento ambiental, está o cumprimento do que estabelece os princípios fundamentais e diretrizes nacionais para o saneamento (Lei nº 11.445/2007): universalização do acesso aos serviços público de saneamento básico; abastecimento de água; esgotamento sanitário; limpeza urbana e manejo dos resíduos sólidos; disponibilidade, em todas as áreas urbanas, de serviços de drenagem e de manejo das águas pluviais; entre outros.</p>
                
                <br>
                
                <p>Compete à Comissão de Saneamento Ambiental opinar sobre:</p> 
                
                <ol>
                  <li>projetos atinentes à realização de obras e serviços públicos pelo município, autarquias, entidades paraestatais e concessionárias de serviços públicos de âmbito Estadual;</li>
                
                  <li>fiscalização da promoção do abastecimento de água potável, do esgotamento sanitário, da limpeza urbana, do manejo de resíduos sólidos e da drenagem e manejo das águas pluviais urbanas;</li>
                
                  <li>fiscalização e auxílio na promoção da não geração, redução, reutilização, reciclagem e tratamento dos resíduos sólidos, bem como disposição final ambientalmente adequada dos rejeitos;</li>
                
                  <li>fiscalização e auxílio na promoção de incentivo à indústria da reciclagem, tendo em vista fomentar o uso de matérias-primas e insumos derivados de materiais recicláveis e reciclados;</li>
                
                  <li>auxílio na promoção da integração dos catadores de materiais reutilizáveis e recicláveis nas ações que envolvam a responsabilidade compartilhada pelo ciclo de vida dos produtos;</li>
                
                  <li>fiscalização e auxílio na promoção de incentivo ao desenvolvimento de sistemas de gestão ambiental e empresarial voltados para a melhoria dos processos produtivos e ao reaproveitamento dos resíduos sólidos, incluídos a recuperação e o aproveitamento energético;</li>
                
                  <li>promoção de adoção de padrões sustentáveis de produção e consumo de bens e serviços, do desenvolvimento e aprimoramento de tecnologias limpas como forma de minimizar impactos ambientais;</li>
                
                  <li>outras matérias pertinentes à proteção do meio ambiente, como por exemplo a balneabilidade das praias fluminenses.</li>
                
                  <li>A promoção da saúde por meio da integração do saneamento com os recursos hídricos.</li>
                </ol>
            ',
                'president' => 'Deputado Gustavo Schmidt',
                'vice_president' => 'Deputada Lucinha',
                'public' => true,
                'office_phone' => '(21) 2588-1309',
                'office_address' => 'Palácio Tiradentes, sala 130',
            ],
            'segurancapublica' => [
                'slug' => 'segurancapublica',
                'name' => 'Comissão de Segurança Pública e Assuntos de Polícia',
                'link_caption' => 'Seguranca',
                'short_name' => 'Segurança Pública e Assuntos de Polícia',
                'phone' => '0800-282-3135',
                'texto' =>
                    '<p>A Comissão de Segurança Pública e Assuntos de Polícia, além de trabalhar em prol da segurança dos cidadãos, é um importante canal de denúncias, que podem ser registradas anonimamente pelo Alô Alerj, garantindo a proteção do denunciante. Compete à comissão se manifestar sobre assuntos referentes ao sistema de segurança pública em geral, planos e programas de segurança da população do Estado, bem como sobre qualquer proposição que se refira à segurança pública.</p>',
                'president' => 'Deputado Delegado Carlos Augusto',
                'vice_president' => 'Deputado Coronel Salema',
                'public' => true,
                'office_phone' => '(21) 2588-1219',
                'office_address' =>
                    'Palácio Tiradentes, Prédio Anexo, gabinete 407',
            ],
            'trabalho' => [
                'slug' => 'trabalho',
                'name' =>
                    'Comissão de Trabalho Legislação Social e Seguridade Social',
                'link_caption' => 'Trabalho',
                'short_name' =>
                    'Trabalho, Legislação Social e Seguridade Social',
                'phone' => '0800-282-3596',
                'texto' =>
                    '<p>A Comissão de Trabalho, Legislação Social e Seguridade Social zela para que os direitos trabalhistas sejam respeitados. Trata de proposições e projetos de lei relacionados às questões do trabalho, da previdência e da assistência social. Compete à Comissão promover estudos, pesquisas e integrações relacionados à atividade parlamentar e se manifestar em matérias relacionadas às políticas públicas de assistência social e aos projetos e programas de geração de emprego.</p>',
                'president' => 'Deputada Mônica Francisco',
                'vice_president' => 'Deputado Bruno Dauaire',
                'public' => true,
                'office_phone' => '(21) 2588-1298',
                'office_address' =>
                    'Palácio 23 de Julho - Gabinete 508 - Praça XV, s/nº - Centro',
            ],

            'disqueidoso' => [
                'slug' => 'disqueidoso',
                'name' => 'Comissão de Assuntos da Criança do Adolescente e do Idoso',
                'link_caption' => 'Dique Idoso',
                'short_name' => 'Dique Idoso',
                'phone' => '0800-023-9191',
                'texto' => '<p>A Comissão de Assuntos da Criança, do Adolescente e do Idoso trata de proposições referentes aos assuntos especificamente relacionados à criança, ao adolescente e ao idoso, em especial os que tenham pertinência com os seus direitos, bem como exercer ação fiscalizadora diante de fatos que atentem contra estes.</p>',
                'president' => 'Deputada Rosane Félix',
                'vice_president' => 'Deputado Fábio Silva',
                'public' => true,
                'office_phone' => '(21) 2588-1243 / (21) 2588-1669',
                'office_address' => 'Rua Dom Manoel, s/nº, Centro, Rio de Janeiro. Gabinete 106',
            ],

            'disquecrianca' => [
                'slug' => 'disquecrianca',
                'name' => 'Comissão de Assuntos da Criança do Adolescente e do Idoso',
                'link_caption' => 'Dique Criança e Adolescente',
                'short_name' => 'Dique Criança e Adolescente',
                'phone' => '0800-023-0007',
                'texto' => '<p>A Comissão de Assuntos da Criança, do Adolescente e do Idoso trata de proposições referentes aos assuntos especificamente relacionados à criança, ao adolescente e ao idoso, em especial os que tenham pertinência com os seus direitos, bem como exercer ação fiscalizadora diante de fatos que atentem contra estes.</p>',
                'president' => 'Deputada Rosane Félix',
                'vice_president' => 'Deputado Fábio Silva',
                'public' => true,
                'office_phone' => '(21) 2588-1243 / (21) 2588-1669',
                'office_address' =>
                    'Rua Dom Manoel, s/nº, Centro, Rio de Janeiro. Gabinete 106',
            ],

            'direitoshumanos' => [
                'slug' => 'direitoshumanos',
                'name' => 'Comissão de Defesa dos Direitos Humanos e Cidadania',
                'link_caption' => 'Direitos Humanos',
                'short_name' => 'Defesa dos Direitos Humanos e Cidadania',
                'phone' => '0800-025-5108',
                'texto' =>
                    '<p>A Comissão de Defesa dos Direitos Humanos e Cidadania tem como tarefa acompanhar e se manifestar sobre proposições e assuntos ligados aos direitos inerentes ao ser humano, tendo em vista as condições mínimas à sua sobrevivência digna e o exercício pleno das garantias individuais e coletivas. A Comissão prioriza a articulação de canais efetivos, institucionalizados ou não, para a intermediação entre sociedade e poder público, a fim de alterar a fórmula tradicional de elaboração e implementação de políticas públicas.</p>
    <p>O objetivo principal é acompanhar e se manifestar sobre programas e ações relacionadas a todos os direitos humanos e, se necessário, agir em caso de violações. Dessa forma, assume uma postura de estabelecer uma arena de diálogo entre as diferentes esferas governamentais e a sociedade civil, bem como dar voz aos movimentos sociais.</p>
    <p>Diante das denúncias, solicitações de auxílio e acompanhamentos de casos, a Comissão pode tomar medidas com o intuito de esclarecer ou solucionar fatos reportados sobre violações de direitos humanos, a partir dos seguintes mecanismos: acolhimento das famílias vítimas de violações de direitos; requerimento de informações mediante ofício às instituições públicas envolvidas na denúncia; encaminhamento do usuário para órgãos responsáveis pelos diferentes setores governamentais; articulação com as demais comissões permanentes da casa com o intuito de buscar solucionar as demandas; realização de audiência pública para convocar instituições públicas a prestar esclarecimentos, promovendo a discussão sobre o tema para, assim, avançar na qualidade das políticas públicas.</p>',
                'president' => 'Deputada Renata Souza',
                'vice_president' => 'Deputado Márcio Gualberto',
                'public' => true,
                'office_phone' => '(21) 2588-1555',
                'office_address' =>
                    'Rua 1º de Março s/nº, Palácio Tiradentes, sala 307.',
            ],

            'educacao' => [
                'slug' => 'educacao',
                'name' => 'Comissão de Educação',
                'link_caption' => 'Educacao',
                'short_name' => 'Educacao',
                'phone' => '0800-282-1559',
                'texto' =>
                    '<p>A Comissão de Educação cuida dos assuntos relacionados ao sistema educacional. Compete a ela opinar e dar seguimento às proposições e assuntos relativos à educação e à instrução pública e particular. A Comissão realiza semanalmente audiências públicas para debater assuntos relevantes para todas as etapas do ensino, da educação infantil à universidade. As reuniões contam com presença de entidades, sindicatos e representantes das comunidades escolares, além de representantes do Poder Executivo, criando um canal de diálogo entre as instituições e esferas de poder.</p>
            <p>Com diversas conquistas para a educação fluminense, o colegiado está sempre aberto ao diálogo. Atende também as questões mais específicas de cada um que a procura buscando orientação ou fazendo denúncias. A Comissão tem como prioridade sua ação fiscalizadora do Poder Executivo no cumprimento das políticas públicas de educação do Estado do Rio de Janeiro.<p>',
                'president' => 'Deputado Flávio Serafini',
                'vice_president' => 'Deputado Léo Vieira',
                'public' => true,
                'office_phone' => '(21) 2588-1356',
                'office_address' => 'Gabinete T 02 Anexo',
            ],

            'segurancaalimentar' => [
                'slug' => 'segurancaalimentar',
                'name' => 'Comissão de Segurança Alimentar',
                'link_caption' => 'Seguranca Alimentar',
                'short_name' => 'Seguranca Alimentar',
                'phone' => '0800-282-0376',
                'texto' =>
                    '<p>A Comissão de Segurança Alimentar cuida para que os alimentos comercializados estejam adequados para consumo, seguindo as normas de produção, transporte e armazenamento. Compete à Comissão manifestar-se sobre a elaboração, coordenação e execução de programas e projetos ligados à segurança alimentar e combate à fome no Estado do Rio de Janeiro; políticas, programas e ações relacionadas ao direito à alimentação e nutrição como parte integrante dos direitos humanos; projetos e programas de geração de emprego e renda; e políticas públicas de assistência social.</p>
    <p>A Comissão atua com o objetivo de desenvolver estudos relacionados à garantia de alimentação e nutrição da população; fiscalizar e acompanhar projetos e ações governamentais na área de segurança alimentar; estudar e fiscalizar as ações das entidades da sociedade civil organizada voltadas para o combate à fome; estimular ações da sociedade civil voltadas para o combate à fome no Estado do Rio de Janeiro; e promover e coordenar campanhas de conscientização quanto ao desperdício de alimentos.</p>',
                'president' => 'Deputada Lucinha',
                'vice_president' => 'Deputada Mônica Francisco',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' => 'Palácio Tiradentes, sala 317',
            ],

            'sosmulher' => [
                'slug' => 'sosmulher',
                'name' => 'Comissão de Defesa dos Direitos da Mulher',
                'link_caption' => 'Sos Mulher',
                'short_name' => 'Defesa dos Direitos da Mulher',
                'phone' => '0800-282-0119',
                'texto' =>
                    '<p>A missão da Comissão de Defesa dos Direitos da Mulher é lutar pela igualdade entre homens e mulheres, e prestar apoio e acolhimento amigável às mulheres. A Comissão combate ideias preconceituosas, o machismo e  o patrimonialismo, que geram desigualdade nas relações de trabalho, assédio sexual e moral, além de violência à mulher, que a cada 14 minutos faz uma vítima no Brasil.</p>
    <p>A Comissão se utiliza de redes de atendimento e serviços jurídicos voltados para a mulher, criados por políticas públicas e espaços de solidariedade conquistadas na luta por respeito e igualdade, para fazer seu trabalho.  O "SOS MULHER", como é chamado o 0800 da Comissão, funciona de segunda a sexta, das 9h às 18h, com um atendimento especializado e feito apenas por mulheres preparadas.</p>',
                'president' => 'Deputada Enfermeira Rejane',
                'vice_president' => 'Deputada Dani Monteiro',
                'public' => true,
                'office_phone' => '0800 282-0119',
                'office_address' =>
                    'Rua Dom Manoel, s/nº, Centro, Rio de Janeiro. Gabinete 409',
            ],

            'tributacao' => [
                'slug' => 'tributacao',
                'name' =>
                    'Comissão de Tributação Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais',
                'link_caption' => 'Tributacao',
                'short_name' => 'Tributação e Controle da Arrecadação',
                'phone' => '0800-282-5888',
                'texto' =>
                    '<p>A Comissão de Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais trata dos assuntos referentes à tributação, arrecadação e fiscalização dos tributos estaduais. Cabe à Comissão:</p>
                <ul>
                <li>Solicitar que o Tribunal de Contas do Estado promova inspeções e auditorias na arrecadação de tributos estaduais;</li>
                <li>Efetuar a tomada de contas do Governador;</li>
                <li>Examinar e emitir parecer sobre as contas anualmente apresentadas pelo Governador;</li>
                <li>Opinar sobre projetos de lei relativos ao plano plurianual, às diretrizes orçamentárias, ao orçamento anual e aos créditos adicionais;</li>
                <li>Exercer o acompanhamento e a fiscalização contábil, financeira, orçamentária, operacional e patrimonial do Estado e das entidades da administração direta e indireta, incluídas as sociedades e fundações instituídas e mantidas pelo Poder Público Estadual.</li>
                <li>Examinar e emitir parecer sobre os planos e programas estaduais, regionais e setoriais previstos na Constituição Estadual, após exame pelas demais comissões dos programas que lhes disserem respeito.</li>
                <li>Interpor representações e recursos das decisões do Tribunal de Contas, solicitando sustação de contrato impugnado ou outras providências a cargo da Assembleia Legislativa, elaborando, em caso de parecer favorável, o respectivo projeto de decreto legislativo.</li>
                <li>Opinar sobre representação e recursos de suas decisões;</li>
                <li>Requerer informações, relatórios, balanços e inspeções sobre as contas ou autorizações de despesas de órgãos e entidades da administração estadual, diretamente ou através do Tribunal de Contas do Estado;</li>
                <li>Opinar sobre quaisquer proposições de implicações orçamentárias, bem como empréstimos públicos, fixação de subsídios do Governador, do Vice-Governador do Estado e dos Deputados.</li>
                </ul></p>',
                'president' => 'Deputado Luiz Paulo',
                'vice_president' => 'Alexandre Freitas',
                'public' => true,
                'office_phone' => '(21) 2588-1259',
                'office_address' =>
                    'Rua Dom Manoel, s/n°, gabinete 403 - Prédio Anexo',
            ],

            'animais' => [
                'slug' => 'animais',
                'name' => 'Comissão de Proteção ao Direito dos Animais',
                'link_caption' => 'Animais',
                'short_name' => 'Protecao ao Direito dos Animais',
                'phone' => '0800-282-3595',
                'texto' =>
                    '<p>A Comissão de Defesa dos Animais cuida dos assuntos relacionados às políticas públicas de proteção aos animais.  Seu objetivo principal é avançar na conscientização sobre o tratamento dos animais domésticos e silvestres, coordenando esforços para protegê-los e ampará-los. A Comissão está à disposição da sociedade para o recebimento de denúncias e sugestões.</p>',
                'president' => 'Deputado Renato Zaca',
                'vice_president' => 'Deputada Alana Passos',
                'public' => true,
                'office_phone' => '(21) 2588-1206',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'defesa-civil' => [
                'slug' => 'defesa-civil',
                'name' => 'Comissão de Defesa Civil',
                'link_caption' => 'Defesa Civil',
                'short_name' => 'Defesa Civil',
                'phone' => '2588-1308/1309',
                'email' => 'mscarabelli@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Flávio Bolsonaro',
                'vice_president' => 'Mauro S Scarabelli',
                'public' => true,
                'office_phone' => '(21) 2588-1308/1309',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'ciencia-tecnologia' => [
                'slug' => 'ciencia-tecnologia',
                'name' => 'Comissão de Comissão de Ciência e Tecnologia',
                'link_caption' => 'Ciência e Tecnologia',
                'short_name' => 'Ciência e Tecnologia',
                'phone' => '2588-1308',
                'email' => 'mlima@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Rosenverg Reis',
                'vice_president' => 'Marcelo Lima',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'constituicao-justica' => [
                'slug' => 'constituicao-justica',
                'name' => 'Comissão de Constituição e Justiça',
                'link_caption' => 'Constituição e Justiça',
                'short_name' => 'Constituição e Justiça',
                'phone' => '2588-1530',
                'email' => 'tatiana.guima@hotmail.com',
                'texto' => '',
                'president' => 'Deputado André Lazaroni',
                'vice_president' => 'Tatiana G Costa',
                'public' => true,
                'office_phone' => '(21) 2588-1530',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'cultura' => [
                'slug' => 'cultura',
                'name' => 'Comissão de Cultura',
                'link_caption' => 'Cultura',
                'short_name' => 'Cultura',
                'phone' => '2588-1308',
                'email' => 'haquino@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Zaqueu Teixeira',
                'vice_president' => 'Haroldo Aquino',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'meio-ambiente' => [
                'slug' => 'meio-ambiente',
                'name' => '	Comissão de Defesa do Meio Ambiente',
                'link_caption' => 'Meio Ambiente',
                'short_name' => 'Meio Ambiente',
                'phone' => '2588-1308',
                'email' => 'jfranca@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado André Lazaroni',
                'vice_president' => 'Jefferson Franca',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'economia' => [
                'slug' => 'economia',
                'name' => 'Comissão de Economia Indústria e Comércio',
                'link_caption' => 'Economia Indústria e Comércio',
                'short_name' => 'Economia Indústria e Comércio',
                'phone' => '',
                'email' => '@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Waldeck Carneiro',
                'vice_president' => '',
                'public' => true,
                'office_phone' => '',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'esporte-lazer' => [
                'slug' => 'esporte-lazer',
                'name' => 'Comissão de Esporte e Lazer',
                'link_caption' => 'Esporte e Lazer',
                'short_name' => 'Esporte e Lazer',
                'phone' => '2588-1391',
                'email' => 'sjesus@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Chiquinho da Mangueira',
                'vice_president' => '	Sandra J Ferreira',
                'public' => true,
                'office_phone' => '(21) 2588-1391',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'indicacoes-legislativas' => [
                'slug' => 'indicacoes-legislativas',
                'name' => 'Comissão de Indicações Legislativas',
                'link_caption' => 'Indicações Legislativas',
                'short_name' => 'Indicações Legislativas',
                'phone' => '2588-1308',
                'email' => 'lfaustino@alerj.rj.gov.br	',
                'texto' => '',
                'president' => 'Deputado Marcos Abrahão',
                'vice_president' => 'Luiz C Faustino',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'orcamento-financas' => [
                'slug' => 'orcamento-financas',
                'name' =>
                    '	Comissão de Orçamento Finanças Fiscalização Financeira e Controle',
                'link_caption' =>
                    'Orçamento Finanças Fiscalização Financeira e Controle',
                'short_name' =>
                    'Orçamento Finanças Fiscalização Financeira e Controle',
                'phone' => '2588-1400',
                'email' => 'apaiva@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Gustavo Tutuca',
                'vice_president' => 'Ada Paiva',
                'public' => true,
                'office_phone' => '(21) 2588-1400',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'politica-urbana' => [
                'slug' => 'politica-urbana',
                'name' =>
                    'Comissão de Política Urbana Habitação e Assuntos Fundiários',
                'link_caption' =>
                    'Política Urbana Habitação e Assuntos Fundiários',
                'short_name' =>
                    'Política Urbana Habitação e Assuntos Fundiários',
                'phone' => '2588-1308',
                'email' => 'rmoura@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Zeidan Lula',
                'vice_president' => 'Romulo Moura',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'drogas' => [
                'slug' => 'drogas',
                'name' =>
                    'Comissão de Prevenção ao Uso de Drogas e Dependentes Químicos em Geral',
                'link_caption' =>
                    'Prevenção ao Uso de Drogas e Dependentes Químicos em Geral',
                'short_name' =>
                    'Prevenção ao Uso de Drogas e Dependentes Químicos em Geral',
                'phone' => '2588-1308',
                'email' => 'calmeida@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Dr Deodato',
                'vice_president' => 'Carla Almeida',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'turismo' => [
                'slug' => 'turismo',
                'name' => 'Comissão de Turismo',
                'link_caption' => 'Turismo',
                'short_name' => 'Turismo',
                'phone' => '2588-1308',
                'email' => 'comissaodeturismo@alerj.rj.gov.br',
                'email2' => 'fcosta@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado Silas Bento',
                'vice_president' => 'Fabio Costa',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],

            'agricultura' => [
                'slug' => 'agricultura',
                'name' =>
                    '	Comissão de Agricultura Pecuária e Políticas Rural Agraria e Pesqueira',
                'link_caption' =>
                    'Agricultura Pecuária e Políticas Rural Agraria e Pesqueira',
                'short_name' =>
                    'Agricultura Pecuária e Políticas Rural Agraria e Pesqueira',
                'phone' => '2588-1308',
                'email' => 'rcastro@alerj.rj.gov.br',
                'texto' => '',
                'president' => 'Deputado João Peixoto',
                'vice_president' => 'Rogerio V. Castro',
                'public' => true,
                'office_phone' => '(21) 2588-1308',
                'office_address' =>
                    'Palácio 23 de julho, sala 104 - Praça XV, s/nº - Centro',
            ],
        ]);
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Committee::truncate();

        $this->getData()->each(function ($committee) {
            Committee::create([
                'slug' => $committee->slug,
                'name' => $committee->name,
                'link_caption' => $committee->link_caption,
                'short_name' => $committee->short_name,
                'phone' => $committee->phone,
                'bio' => $committee->texto,
                'president' => $committee->president,
                'vice_president' => $committee->vice_president,
                'public' => true,
                'office_phone' => $committee->office_phone,
                'office_address' => $committee->office_address,
            ]);
        });
    }
}
