<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Data\Models\ProgressType as ProgressTypeModel;

class PopulateProgressTypes extends Migration
{
    private $cercredElements = [
        'Informação - Demanda de atendimento',
        'Informação - Telefone',
        'Informação - Email',
        'Informação - Outras',
        'Reclamação - Prestação de serviços',
        'Reclamação - Água e Esgoto',
        'Reclamação - Lixo',
        'Sugestão - Projetos de Lei',
        'Denúncia',
        'Agradecimento/Elogio',
        'Demanda sem clareza',
        'Outros',
        'Pedido',
        'Reclamação - Luz ou Iluminação',
        'Reclamação - Transportes',
        'Reclamação - Saúde',
        'Reclamação - Educação',
        'Reclamação - Serviços Públicos',
        'Reclamação - Serviços Privados',
        'Reclamação - ALERJ',
        'Reclamação - Falta de fiscalização',
        'Reclamação - Outros',
        'Reclamação - Segurança Pública',
        'Maus tratos aos animais',
        'Comissão do Trabalho',
        'Queda de Ligação',
        'Reenvio de protocolo',
        'Comissão dos Direitos da Mulher',
        'Venda',
        'Não Venda',
        'Não Tabulado',
        'Exclusão da Venda',
        'Pré-Venda',
        'Expirado',
        'E-mail Material de Venda Enviado',
        'SMS Enviado',
        'Voice Messenger Enviado',
        'Carta Enviada',
        'Resposta de Protocolo',
        'Fidelização',
        'Agendamento Automático',
        'Informação',
        'Baixa de CPF',
        'Baixa de Contrato',
        'Baixa de Contrato Parcela',
        'Devolução de CPF',
        'Devolução de Contrato',
        'Devolução de Contrato Parcela',
        'Discador - Não Atende',
        'Discador - Ocupado',
        'Discador - Máquina',
        'Discador - Fax',
        'Discador - Sem Agente Disp.',
        'Discador - Número Errado',
        'Discador - Cliente Desligou',
        'Discador - Mudo',
        'Discador - Validado',
        'Discador - Recado URA',
        'Discador - Não Retornar',
        'Discador - Desconhece Pessoa',
        'Discador - Caixa Postal',
        'Discador - Mensagem Operadora',
        'Discador - Silêncio',
        'Discador - Falha na Operadora',
        'Discador - Congestionamento',
    ];

    private $newElements = [
        'Demanda de atendimento',
        'Telefone',
        'Email',
        'Prestação de serviços',
        'Água e Esgoto',
        'Lixo',
        'Projetos de Lei',
        'Denúncia',
        'Agradecimento/Elogio',
        'Demanda sem clareza',
        'Pedido',
        'Luz ou Iluminação',
        'Transportes',
        'Saúde',
        'Educação',
        'Serviços Públicos',
        'Serviços Privados',
        'ALERJ',
        'Falta de fiscalização',
        'Outros',
        'Segurança Pública',
        'Maus tratos aos animais',
        'Comissão do Trabalho',
        'Queda de Ligação',
        'Reenvio de protocolo',
        'Comissão dos Direitos da Mulher',
        'Venda',
        'Não Venda',
        'Não Tabulado',
        'Exclusão da Venda',
        'Pré-Venda',
        'Expirado',
        'E-mail Material de Venda Enviado',
        'SMS Enviado',
        'Voice Messenger Enviado',
        'Carta Enviada',
        'Resposta de Protocolo',
        'Fidelização',
        'Agendamento Automático',
        'Informação',
        'Baixa de CPF',
        'Baixa de Contrato',
        'Baixa de Contrato Parcela',
        'Devolução de CPF',
        'Devolução de Contrato',
        'Devolução de Contrato Parcela',
        'Discador - Não Atende',
        'Discador - Ocupado',
        'Discador - Máquina',
        'Discador - Fax',
        'Discador - Sem Agente Disp.',
        'Discador - Número Errado',
        'Discador - Cliente Desligou',
        'Discador - Mudo',
        'Discador - Validado',
        'Discador - Recado URA',
        'Discador - Não Retornar',
        'Discador - Desconhece Pessoa',
        'Discador - Caixa Postal',
        'Discador - Mensagem Operadora',
        'Discador - Silêncio',
        'Discador - Falha na Operadora',
        'Discador - Congestionamento',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $elements = $this->newElements;

        ProgressTypeModel::truncate();

        foreach ($elements as $element) {
            ProgressTypeModel::insert([
                'name' => $element,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $elements = $this->cercredElements;

        ProgressTypeModel::truncate();

        foreach ($elements as $element) {
            ProgressTypeModel::insert([
                'name' => $element,
            ]);
        }
    }
}
