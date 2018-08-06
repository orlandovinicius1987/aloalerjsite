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
                ->string('code')
                ->nullable()
                ->index();

            $table
                ->string('cpf_cnpj')
                ->nullable()
                ->index();

            $table
                ->string('name')
                ->nullable()
                ->index();

            $table->string('identification')->nullable();

            $table->date('birthdate')->nullable();

            $table
                ->integer('gender_id')
                ->unsigned()
                ->nullable();

            $table
                ->integer('civil_status_id')
                ->unsigned()
                ->nullable();

            $table->string('spouse_name')->nullable();

            $table
                ->integer('main_occupation_id')
                ->unsigned()
                ->nullable();

            $table
                ->integer('scholarship_id')
                ->unsigned()
                ->nullable();

            $table->float('income')->nullable();

            $table
                ->integer('person_type_id')
                ->unsigned()
                ->nullable();

            $table
                ->integer('updated_by_id')
                ->unsigned()
                ->nullable();

            $table->boolean('is_anonymous')->default(false);

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

            $table->string('contact_type_id'); // email, celular, telefone fixo, whatsapp
            $table->string('contact');
            $table->string('from')->default('personal'); // comercial / pessoal

            $table->timestamp('validated_at')->nullable();
            $table
                ->integer('validated_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table->timestamps();
        });

        Schema::create('contacts_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name'); // email, celular, telefone fixo, whatsapp
            $table->string('code'); // email, celular, telefone fixo, whatsapp

            $table->timestamps();
        });

        $array = [
            [0, 'Celular', 'mobile'],
            [1, 'Whatsapp', 'whatsapp'],
            [2, 'E-mail', 'email'],
            [3, 'Telefone Fixo', 'phone'],
            [4, 'Facebook', 'facebook'],
            [5, 'Twitter', 'twitter'],
            [6, 'Instagram', 'instagram'],
        ];

        foreach ($array as $item) {
            DB::table('contacts_types')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'code' => $item[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->string('protocol_number')
                ->index()
                ->nullable();

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

            $table->integer('origin_id')->unsigned();

            $table->string('subject', 512);

            $table->text('original');

            $table->text('rectified')->nullable();

            $table->timestamp('rectified_at')->nullable();

            $table
                ->integer('rectified_by_id')
                ->nullable()
                ->unsigned()
                ->index();

            $table
                ->integer('answer_address_id')
                ->unsigned()
                ->index()
                ->nullable();

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

        Schema::create('origins', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [999999, 'Nenhum'],
            [0, '0800'],
            [1, 'Chat'],
            [2, 'Whatsapp'],
            [3, 'E-mail'],
            [4, 'Carteirada do Bem'],
            [5, 'Telegram'],
        ];

        foreach ($array as $item) {
            DB::table('origins')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::create('call_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [48, 'Agradecimento'],
            [49, 'Demanda sem Clareza'],
            [47, 'Denúncia'],
            [44, 'Informação'],
            [50, 'Outros'],
            [51, 'Pedido'],
            [93, 'Queda de Ligação'],
            [45, 'Reclamação'],
            [97, 'Reenvio de protocolo'],
            [46, 'Sugestão'],
        ];

        foreach ($array as $item) {
            DB::table('call_types')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [999999, 'Nenhum'],
            [0, 'Abuso aos direitos humanos'],
            [1, 'Ação social'],
            [2, 'Animais'],
            [3, 'Assuntos trabalhistas'],
            [4, 'Concursos públicos'],
            [5, 'Crianças'],
            [6, 'Crianças e Adolescentes Desaparecidos'],
            [7, 'Educação'],
            [8, 'Empresa Privada'],
            [9, 'Empresa Pública'],
            [10, 'Esporte e Lazer'],
            [11, 'Estudantes'],
            [12, 'Habitação'],
            [13, 'Idosos'],
            [14, 'Infra-estrutura'],
            [15, 'Leis'],
            [16, 'Mulheres'],
            [17, 'Multas'],
            [18, 'Orçamento participativo'],
            [19, 'Outros'],
            [20, 'Pessoa com deficiência'],
            [21, 'Saúde'],
            [22, 'Segurança'],
            [23, 'Transportes'],
        ];

        foreach ($array as $item) {
            DB::table('areas')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::create('how', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        $array = [
            [54, 'Amigos'],
            [88, 'Cartazes/Placas/Outdoor'],
            [56, 'Carteirada do bem'],
            [82, 'Contas à pagar'],
            [72, 'Deputados'],
            [58, 'Internet'],
            [60, 'Jornal'],
            [86, 'Lista telefônica'],
            [84, 'Não Informado'],
            [74, 'Nota Fiscal'],
            [76, 'Ônibus da Defesa'],
            [78, 'Órgãos/Secretarias'],
            [62, 'Rádio'],
            [80, 'Redes Sociais'],
            [64, 'Site da Alerj'],
            [66, 'Televisão'],
        ];

        foreach ($array as $item) {
            DB::table('how')->insert([
                'id' => $item[0],
                'name' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::dropIfExists('areas');
        Schema::dropIfExists('calls');
        Schema::dropIfExists('call_types');
        Schema::dropIfExists('committees');
        Schema::dropIfExists('how');
        Schema::dropIfExists('persons');
        Schema::dropIfExists('persons_addresses');
        Schema::dropIfExists('persons_contacts');
        Schema::dropIfExists('origins');
    }
}
