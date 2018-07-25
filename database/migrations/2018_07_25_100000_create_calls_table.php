<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->string('cpf_cnpj')
                ->unique()
                ->nullable()
                ->index();

            $table
                ->string('name')
                ->nullable()
                ->index();

            $table
                ->string('identification')
                ->nullable()
                ->index();

            $table->boolean('is_anonymous')->default(false);

            $table->integer('via_id')->unsigned();

            $table
                ->integer('created_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('persons_addresses', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table
                ->string('zipcode')
                ->nullable()
                ->index();

            $table
                ->string('street')
                ->nullable()
                ->index();

            $table
                ->string('complement')
                ->nullable()
                ->index();

            $table
                ->string('neighbourhood')
                ->nullable()
                ->index();

            $table
                ->string('city')
                ->nullable()
                ->index();

            $table
                ->string('state')
                ->nullable()
                ->index();

            $table
                ->string('from')
                ->nullable()
                ->index(); // comercial / residencial

            $table->boolean('is_mailable')->default(false);

            $table->timestamp('validated_at')->nullable();

            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('persons_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table->string('contact_type'); // email, celular, telefone fixo, whatsapp
            $table->string('contact');
            $table->string('from'); // comercial / residencial

            $table->timestamp('validated_at')->nullable();
            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');

            $table->string('protocol_number')->index();

            $table
                ->integer('committee_id')
                ->unsigned()
                ->index();

            $table
                ->integer('person_id')
                ->unsigned()
                ->index();

            $table
                ->integer('call_type_id')
                ->unsigned()
                ->index();

            $table
                ->integer('area_id')
                ->unsigned()
                ->index();

            $table->string('subject', 512);

            $table
                ->integer('reason_id')
                ->unsigned()
                ->index();

            $table->text('original');

            $table->text('rectified')->nullable();

            $table->timestamp('rectified_at')->nullable();

            $table
                ->integer('rectified_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table
                ->integer('address_id')
                ->unsigned()
                ->index();

            $table->boolean('send_answer_by_email')->default(true);

            $table->text('answer')->nullable();

            $table->timestamp('answered_at')->nullable();

            $table
                ->integer('answered_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');
            $table->string('name');
            $table->string('link_caption');
            $table->string('short_name');
            $table->string('phone');
            $table->text('bio');
            $table->string('president');
            $table->string('vice_president');
            $table->string('office_phone');
            $table->string('office_address');
            $table->string('public')->default(false);

            $table->timestamps();
        });

        Schema::create('vias', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('request_reasons', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('call_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
        Schema::dropIfExists('persons_addresses');
        Schema::dropIfExists('persons_contacts');
        Schema::dropIfExists('calls');
        Schema::dropIfExists('committees');
        Schema::dropIfExists('vias');
        Schema::dropIfExists('request_reasons');
        Schema::dropIfExists('call_types');
        Schema::dropIfExists('areas');
    }
}

//Como tomou conhecimento do atendimento do Alo Alerj?
//<td>
//                                <select name="action_abordagem$ddlresposta" onchange="javascript:setTimeout('__doPostBack(\'action_abordagem$ddlresposta\',\'\')', 0)" id="action_abordagem_ddlresposta" class="campoCombo">
//									<option selected="selected" value="0">Selecione</option>
//									<option value="54|False">Amigos</option>
//									<option value="88|False">Cartazes/Placas/Outdoor</option>
//									<option value="56|False">Carteirada do bem</option>
//									<option value="82|False">Contas à pagar</option>
//									<option value="72|False">Deputados</option>
//									<option value="58|False">Internet</option>
//									<option value="60|False">Jornal</option>
//									<option value="86|False">Lista telefônica</option>
//									<option value="84|False">Não Informado</option>
//									<option value="74|False">Nota Fiscal</option>
//									<option value="76|False">Ônibus da Defesa</option>
//									<option value="78|False">Órgãos/Secretarias</option>
//									<option value="62|False">Rádio</option>
//									<option value="80|False">Redes Sociais</option>
//									<option value="64|False">Site da Alerj</option>
//									<option value="66|False">Televisão</option>
//
//								</select>
//                            </td>
//
//Qual o motivo da Ligação? Origem: [ddr_origem]
//    <select name="action_abordagem$ddlresposta" onchange="javascript:setTimeout('__doPostBack(\'action_abordagem$ddlresposta\',\'\')', 0)" id="action_abordagem_ddlresposta" class="campoCombo">
//					<option selected="selected" value="0">Selecione</option>
//					<option value="48|False">Agradecimento</option>
//					<option value="49|False">Demanda sem Clareza</option>
//					<option value="47|False">Denúncia</option>
//					<option value="44|False">Informação</option>
//					<option value="50|False">Outros</option>
//					<option value="51|False">Pedido</option>
//					<option value="93|False">Queda de Ligação</option>
//					<option value="45|False">Reclamação</option>
//					<option value="97|False">Reenvio de protocolo</option>
//					<option value="46|False">Sugestão</option>
//
//				</select>
//
//Area
//<select name="historico_propriedade1$cbo_hp_1" id="historico_propriedade1_cbo_hp_1">
//								<option value="Nenhum">Nenhum</option>
//								<option value="0">Abuso aos direitos humanos</option>
//								<option value="1">Ação social</option>
//								<option value="2">Animais</option>
//								<option value="3">Assuntos trabalhistas</option>
//								<option value="4">Concursos públicos</option>
//								<option value="5">Crianças</option>
//								<option value="6">Crianças e Adolescentes Desaparecidos</option>
//								<option value="7">Educação</option>
//								<option value="8">Empresa Privada</option>
//								<option value="9"> Empresa Pública</option>
//								<option value="10">Esporte e Lazer</option>
//								<option value="11">Estudantes</option>
//								<option value="12">Habitação</option>
//								<option value="13">Idosos</option>
//								<option value="14">Infra-estrutura</option>
//								<option value="15">Leis</option>
//								<option value="16">Mulheres</option>
//								<option value="17"> Multas</option>
//								<option value="18"> Orçamento participativo</option>
//								<option value="19">Outros</option>
//								<option value="20"> Pessoa com deficiência</option>
//								<option value="21"> Saúde</option>
//								<option value="22"> Segurança</option>
//								<option value="23">Transportes</option>
//
//							</select>
//
//Origem
//<select name="historico_propriedade1$cbo_hp_2" id="historico_propriedade1_cbo_hp_2">
//								<option value="Nenhum">Nenhum</option>
//								<option value="0">0800</option>
//								<option value="1">Chat</option>
//								<option value="2">Whatsapp</option>
//								<option value="3">E-mail</option>
//								<option value="4">Carteirada do Bem</option>
//								<option value="5">Telegram</option>
//
//							</select>
