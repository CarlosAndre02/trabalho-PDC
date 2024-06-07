<?php

namespace Database\Seeders;

use App\Models\Horoscopes;
use Illuminate\Database\Seeder;

class HoroscopesSeeder extends Seeder
{
    public function run(): void
    {
        Horoscopes::truncate();
        $horoscopes = [
            // Capricórnio
            [
                'signo' => '1',

                'message_basic' => 'Hoje é um bom dia para se concentrar em sua saúde física. Reserve um tempo para se exercitar e cuidar de seu corpo.',
                'work_basic' => 'Este é um momento para se concentrar em sua carreira e objetivos profissionais. Seja ambicioso em suas metas e trabalhe duro para alcançá-las. Você pode se sentir mais focado e motivado em seu trabalho, e pode ser um bom momento para assumir novas responsabilidades ou buscar uma promoção. Mantenha uma atitude positiva e continue trabalhando duro para alcançar seus objetivos.',

                'message_premium' => 'Este é um bom momento para se concentrar em suas relações pessoais. Dedique tempo para se conectar com amigos e familiares e fortalecer seus relacionamentos. Esteja aberto a novas conexões e tente se envolver em comunidades ou grupos que compartilham seus interesses. Lembre-se de que os relacionamentos são importantes e podem ajudá-lo em sua vida pessoal e profissional.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente quando se trata de finanças. Pode haver oportunidades inesperadas de ganhar dinheiro ou melhorar sua situação financeira. No entanto, lembre-se de que a sorte só irá levá-lo até certo ponto. É importante trabalhar duro e fazer escolhas inteligentes para garantir que essas oportunidades sejam bem aproveitadas.',
                'love_premium' => 'Este pode ser um momento de estabilidade em seus relacionamentos amorosos. Se você está em um relacionamento, é um bom momento para fortalecer sua conexão com seu parceiro e se concentrar no crescimento e evolução de sua relação. Se você está solteiro, pode ser um bom momento para se concentrar em suas próprias metas e objetivos pessoais. Lembre-se de que um relacionamento saudável começa com amor-próprio.',
                'health_premium' => 'Este é um bom momento para cuidar de sua saúde física e mental. Certifique-se de ter uma rotina de exercícios e alimentação saudável. Também pode ser um bom momento para explorar técnicas de gerenciamento de estresse, como a meditação ou ioga. Lembre-se de que cuidar de sua saúde é um investimento em si mesmo e pode ajudá-lo a ter sucesso em outras áreas de sua vida.',

                'start_date' => '12-22',
                'end_date' => '01-20',
            ],
            // Aquário
            [
                'signo' => '2',

                'message_basic' => 'Você pode se sentir um pouco desconectado de seus sentimentos hoje. Tire um tempo para se reconectar com suas emoções e expressá-las de maneira saudável.',
                'work_basic' => 'Este é um momento para ser criativo e inovador em sua carreira e objetivos profissionais. Você pode estar sentindo uma necessidade maior de liberdade e independência em seu trabalho, o que pode levar a ideias novas e emocionantes. Esteja aberto a novas oportunidades e tome a iniciativa para experimentar coisas novas. Lembre-se de que sua originalidade e pensamento fora da caixa são suas maiores forças.',

                'message_premium' => 'Este é um bom momento para se concentrar em sua carreira e objetivos profissionais. Seja ambicioso em suas metas e trabalhe duro para alcançá-las. Esteja aberto a novas oportunidades e saiba como aproveitá-las para sua vantagem. Mantenha uma mente aberta e seja criativo em sua abordagem para ver resultados positivos.',
                'lucky_premium' => 'A sorte pode estar ao seu lado neste momento, especialmente quando se trata de oportunidades criativas ou financeiras. Esteja aberto a novas possibilidades e siga seus instintos. No entanto, lembre-se de que a sorte é apenas uma parte da equação e que você ainda precisa trabalhar duro e tomar decisões inteligentes para alcançar seus objetivos.',
                'love_premium' => 'Este pode ser um momento de mudanças e crescimento em seus relacionamentos amorosos. Se você está em um relacionamento, pode haver uma necessidade maior de liberdade e independência. Comunique suas necessidades e ouça as de seu parceiro. Se você está solteiro, este pode ser um momento para explorar novos interesses e conhecer novas pessoas. Lembre-se de que a honestidade e a comunicação são importantes em qualquer relacionamento.',
                'health_premium' => 'Este é um bom momento para se concentrar em sua saúde mental e emocional. Tire um tempo para cuidar de si mesmo, seja através da meditação, exercícios ou outras atividades que o façam sentir-se bem consigo mesmo. Também é importante manter uma dieta saudável e equilibrada e garantir que você esteja recebendo a quantidade adequada de sono. Lembre-se de que cuidar de sua saúde é uma prioridade e pode ajudá-lo a ser mais bem-sucedido em outras áreas de sua vida.',

                'start_date' => '01-21',
                'end_date' => '02-19',
            ],
            // Peixes
            [
                'signo' => '3',

                'message_basic' => 'Este é um bom momento para se concentrar em seu crescimento pessoal e espiritual. Encontre tempo para meditar, refletir e se conectar com sua espiritualidade.',
                'work_basic' => 'Este é um momento para se concentrar em seus objetivos e metas profissionais. Você pode estar sentindo uma maior inspiração e criatividade em seu trabalho, o que pode levar a novas ideias e projetos. Esteja aberto a colaborar com outras pessoas e compartilhar suas ideias. Lembre-se de que a empatia e a compaixão são suas maiores forças.',

                'message_premium' => 'Este é um momento para se concentrar em sua saúde mental e emocional. Encontre maneiras de cuidar de si mesmo e aliviar o estresse. Meditação, ioga ou outras atividades relaxantes podem ajudar a aliviar a tensão. Lembre-se de que pedir ajuda quando necessário não é um sinal de fraqueza, mas de sabedoria. Este também é um bom momento para se conectar com sua espiritualidade e encontrar significado em sua vida.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente quando se trata de conexões e colaborações com outras pessoas. Esteja aberto a novas parcerias e esteja disposto a ajudar os outros em suas próprias metas e projetos. Lembre-se de que a sorte é apenas uma parte da equação e que você ainda precisa trabalhar duro e tomar decisões inteligentes para alcançar seus objetivos.',
                'love_premium' => 'Este pode ser um momento de sensibilidade e conexão em seus relacionamentos amorosos. Se você está em um relacionamento, pode ser um bom momento para se conectar mais profundamente com seu parceiro e compartilhar suas emoções e sentimentos. Se você está solteiro, este pode ser um momento para se conectar com sua própria intuição e encontrar um parceiro que compartilhe seus valores e interesses. Lembre-se de que a honestidade e a comunicação são importantes em qualquer relacionamento.',
                'health_premium' => 'Este é um bom momento para se concentrar em sua saúde mental e emocional. Tire um tempo para cuidar de si mesmo, seja através da meditação, exercícios ou outras atividades que o façam sentir-se bem consigo mesmo. Também é importante manter uma dieta saudável e equilibrada e garantir que você esteja recebendo a quantidade adequada de sono. Lembre-se de que cuidar de sua saúde é uma prioridade e pode ajudá-lo a ser mais bem-sucedido em outras áreas de sua vida.',

                'start_date' => '02-19',
                'end_date' => '03-20',
            ],
            // Áries
            [
                'signo' => '4',

                'message_basic' => 'Hoje é um bom dia para focar em seus objetivos e trabalhar duro para alcançá-los. Confie em sua intuição e siga em frente com confiança.',
                'work_basic' => 'Este é um momento para se concentrar em sua carreira e objetivos profissionais. Dedique tempo para avaliar suas metas e objetivos e trabalhe duro para alcançá-los. Esteja aberto a novas oportunidades e esteja disposto a assumir riscos calculados para avançar em sua carreira. Lembre-se de que sua energia e determinação podem levá-lo longe.',

                'message_premium' => 'Hoje é um bom dia para você focar em seus objetivos e trabalhar duro para alcançá-los. Você está se sentindo confiante e energético, então aproveite essa energia para avançar em seus projetos e trabalhos. Confie em sua intuição e siga em frente com confiança. Não tenha medo de assumir riscos e buscar novas oportunidades. Lembre-se de manter o equilíbrio em sua vida e reservar tempo para descansar e recarregar suas energias.',
                'lucky_premium' => 'A sorte está do seu lado, Áries. Este é um bom momento para assumir riscos calculados em suas escolhas e aproveitar as oportunidades que aparecem. Mantenha uma mente aberta e esteja disposto a experimentar coisas novas. Lembre-se de que a sorte favorece os corajosos, mas também esteja preparado para trabalhar duro para alcançar seus objetivos.',
                'love_premium' => 'Este é um momento emocionante para o amor, Áries. Se você está em um relacionamento, concentre-se em fortalecer sua conexão com seu parceiro e cultivar a intimidade. Se você está solteiro, este é um bom momento para sair e conhecer pessoas novas. Lembre-se de ser honesto consigo mesmo e com os outros sobre o que você procura em um relacionamento.',
                'health_premium' => 'Sua saúde é importante, Áries. Certifique-se de cuidar de si mesmo e encontrar tempo para relaxar e recarregar as energias. Exercícios regulares e uma dieta saudável podem ajudar a manter sua saúde física e mental em boa forma. Lembre-se de que a prevenção é a chave para uma boa saúde e faça check-ups regulares com seu médico.',

                'start_date' => '03-21',
                'end_date' => '04-20',
            ],
            // Touro
            [
                'signo' => '5',

                'message_basic' => 'Você pode se sentir tentado a gastar dinheiro em coisas que não precisa hoje. Lembre-se de manter suas finanças sob controle e evite compras impulsivas.',
                'work_basic' => 'Este é um momento para ser persistente e disciplinado em sua carreira e objetivos profissionais. Você pode estar sentindo uma necessidade maior de segurança e estabilidade em seu trabalho, o que pode levar a uma maior determinação para alcançar seus objetivos. Esteja aberto a novas oportunidades e trabalhe duro para alcançar seus objetivos. Lembre-se de que sua paciência e perseverança são suas maiores forças.',

                'message_premium' => 'Hoje, você pode se sentir tentado a gastar dinheiro em coisas que não precisa. No entanto, é importante lembrar de manter suas finanças sob controle e evitar compras impulsivas. Procure equilibrar suas despesas e orçamento e priorize suas necessidades. Você pode encontrar oportunidades financeiras positivas, mas é importante ter cautela e agir com responsabilidade.',
                'lucky_premium' => 'A sorte pode estar ao seu lado neste momento, especialmente quando se trata de oportunidades financeiras ou de investimento. Esteja aberto a novas possibilidades, mas tome decisões inteligentes e bem pensadas. Lembre-se de que a sorte é apenas uma parte da equação e que você ainda precisa trabalhar duro para alcançar seus objetivos.',
                'love_premium' => 'Este pode ser um momento de estabilidade e segurança em seus relacionamentos amorosos. Se você está em um relacionamento, pode ser um bom momento para fortalecer seus laços e comprometer-se com seu parceiro. Se você está solteiro, este pode ser um momento para encontrar alguém que valorize as mesmas coisas que você e esteja disposto a se comprometer. Lembre-se de que a honestidade e a fidelidade são importantes em qualquer relacionamento.',
                'health_premium' => 'Este é um bom momento para se concentrar em sua saúde física e bem-estar geral. Garanta que você esteja recebendo a quantidade adequada de exercício e movimento diário, assim como uma dieta saudável e equilibrada. Se você está sentindo estresse, tente incorporar técnicas de relaxamento como a meditação ou yoga em sua rotina. Lembre-se de que cuidar de sua saúde é uma prioridade e pode ajudá-lo a ser mais bem-sucedido em outras áreas de sua vida.',

                'start_date' => '04-21',
                'end_date' => '05-20',
            ],
            // Gêmeos
            [
                'signo' => '6',

                'message_basic' => 'Este é um bom momento para se conectar com amigos e familiares e fortalecer seus relacionamentos. Comunique-se com clareza e ouça atentamente os outros.',
                'work_basic' => 'Este é um momento para se concentrar em seus objetivos e metas profissionais. Você pode estar sentindo uma maior criatividade e curiosidade em seu trabalho, o que pode levar a novas ideias e projetos. Esteja aberto a colaborar com outras pessoas e compartilhar suas ideias. Lembre-se de que a comunicação clara e a capacidade de se adaptar são suas maiores forças.',

                'message_premium' => 'Este é um bom momento para se conectar com amigos e familiares e fortalecer seus relacionamentos. Comunique-se com clareza e ouça atentamente os outros. Seja honesto sobre seus sentimentos e necessidades, e trabalhe em direção a um entendimento mútuo. Este é um bom momento para fazer planos e projetos em equipe e aproveitar as habilidades e ideias de seus colegas.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente quando se trata de conexões e colaborações com outras pessoas. Esteja aberto a novas parcerias e esteja disposto a ajudar os outros em suas próprias metas e projetos. Lembre-se de que a sorte é apenas uma parte da equação e que você ainda precisa trabalhar duro e tomar decisões inteligentes para alcançar seus objetivos.',
                'love_premium' => 'der a paixão em um relacionamento atual. Se você está em um relacionamento, pode ser um bom momento para se conectar mais profundamente com seu parceiro e compartilhar suas emoções e sentimentos. Se você está solteiro, este pode ser um momento para sair e conhecer novas pessoas. Lembre-se de que a honestidade e a comunicação são importantes em qualquer relacionamento.',
                'health_premium' => 'Este é um bom momento para se concentrar em sua saúde mental e emocional. Tire um tempo para cuidar de si mesmo, seja através da meditação, exercícios ou outras atividades que o façam sentir-se bem consigo mesmo. Tente manter uma dieta equilibrada e saudável, e lembre-se de beber bastante água. Lembre-se de que cuidar de sua saúde é uma prioridade e pode ajudá-lo a ser mais bem-sucedido em outras áreas de sua vida.',

                'start_date' => '05-21',
                'end_date' => '06-20',
            ],
            // Câncer
            [
                'signo' => '7',

                'message_basic' => 'Seja gentil consigo mesmo e tire um tempo para cuidar de sua saúde mental e emocional hoje. Meditação ou atividades relaxantes podem ajudar.',
                'work_basic' => 'Você pode sentir um forte impulso para se concentrar em sua carreira e objetivos profissionais neste momento. É um bom momento para trabalhar duro e fazer avanços significativos em seus projetos. No entanto, lembre-se de que é importante equilibrar o trabalho e a vida pessoal. Não deixe que o trabalho consuma toda a sua energia e tempo.',

                'message_premium' => 'Este é um bom momento para cuidar de sua saúde mental e emocional. Você pode se sentir sobrecarregado ou estressado, mas é importante lembrar de tirar um tempo para si mesmo e fazer atividades que o deixem feliz e relaxado. Meditação, ioga ou outras atividades relaxantes podem ajudar a aliviar a tensão. Lembre-se de que pedir ajuda quando necessário não é um sinal de fraqueza, mas de sabedoria.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente quando se trata de questões financeiras. Esteja aberto a novas oportunidades de ganhar dinheiro e considere investir em projetos que possam ter um retorno lucrativo. Lembre-se de que a sorte não é garantida, portanto, certifique-se de tomar decisões inteligentes e cuidadosas.',
                'love_premium' => 'Este pode ser um momento para fortalecer seus relacionamentos existentes, incluindo amizades e relacionamentos românticos. Se você está em um relacionamento, certifique-se de que a comunicação seja clara e aberta, e esteja disposto a comprometer-se quando necessário. Se você está solteiro, pode ser um bom momento para se concentrar em si mesmo e trabalhar em sua autoconfiança.',
                'health_premium' => 'Este é um bom momento para cuidar de sua saúde física e mental. Certifique-se de que está dormindo o suficiente e adotando hábitos alimentares saudáveis. Tente encontrar maneiras de lidar com o estresse, como meditação ou exercícios. Lembre-se de que cuidar de si mesmo é a chave para se sentir bem e ter sucesso em outras áreas da vida.',

                'start_date' => '06-21',
                'end_date' => '07-22',
            ],
            // Leão
            [
                'signo' => '8',

                'message_basic' => 'Você pode se sentir inspirado a ser criativo hoje. Deixe sua imaginação correr solta e trabalhe em projetos que o excitem.',
                'work_basic' => 'Este pode ser um momento em que você se sentirá inspirado a liderar e a se destacar em sua carreira. É um bom momento para demonstrar suas habilidades e mostrar a todos o seu potencial. No entanto, lembre-se de que liderança não é o mesmo que controle - certifique-se de trabalhar em equipe e ouvir a opinião dos outros.',

                'message_premium' => 'Este é um momento em que você pode se sentir inspirado a ser criativo. Deixe sua imaginação correr solta e trabalhe em projetos que o animam e inspiram. Você pode encontrar oportunidades de expressar sua criatividade em sua carreira ou hobbies. Mantenha uma mente aberta e seja ousado em sua abordagem, e você pode ver resultados positivos.',
                'lucky_premium' => 'A sorte pode estar ao seu lado neste momento, especialmente quando se trata de negociações financeiras. Esteja aberto a novas oportunidades e seja ousado em seus investimentos. Lembre-se de que a sorte não é garantida, portanto, certifique-se de fazer pesquisas e tomar decisões conscientes.',
                'love_premium' => 'Este pode ser um momento para se divertir e aproveitar a vida ao máximo. Se você está em um relacionamento, certifique-se de mostrar ao seu parceiro o quanto você o ama e aprecia. Se você está solteiro, pode ser um bom momento para conhecer novas pessoas e se permitir viver novas experiências.',
                'health_premium' => 'Este é um bom momento para cuidar de sua saúde física e mental. Certifique-se de que está se alimentando bem e fazendo exercícios regularmente. Tente encontrar maneiras de reduzir o estresse, como meditação ou yoga. Lembre-se de que cuidar de si mesmo é a chave para viver uma vida saudável e feliz.',

                'start_date' => '07-23',
                'end_date' => '08-22',
            ],
            // Virgem
            [
                'signo' => '9',

                'message_basic' => 'Você pode se sentir um pouco sobrecarregado hoje. Organize suas tarefas e priorize o que é mais importante para ajudar a aliviar o estresse.',
                'work_basic' => 'Você pode sentir uma forte necessidade de se concentrar em sua carreira neste momento. É um bom momento para trabalhar duro e ser produtivo, mas lembre-se de que é importante equilibrar o trabalho e a vida pessoal. Tente ser mais organizado e criar uma rotina para aumentar a eficiência no trabalho.',

                'message_premium' => 'Hoje, você pode se sentir um pouco sobrecarregado com tarefas e responsabilidades. Organize suas tarefas e priorize o que é mais importante para ajudar a aliviar o estresse. Encontre maneiras de simplificar suas tarefas e ser mais eficiente em seu trabalho. Lembre-se de que é importante reservar tempo para cuidar de si mesmo e de sua saúde mental.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente em questões financeiras. Esteja aberto a novas oportunidades e tome decisões cuidadosas quando se trata de investimentos. Lembre-se de que a sorte não é garantida, portanto, é importante ser cauteloso e ter um plano de backup.',
                'love_premium' => 'Este pode ser um momento para se concentrar em fortalecer seus relacionamentos existentes. Se você está em um relacionamento, trabalhe para melhorar a comunicação e resolver quaisquer problemas que possam surgir. Se você está solteiro, pode ser um bom momento para se concentrar em si mesmo e trabalhar em sua autoestima.',
                'health_premium' => 'Este é um bom momento para cuidar da sua saúde física e mental. Certifique-se de que está fazendo exercícios regularmente e se alimentando bem. Tente encontrar maneiras de reduzir o estresse, como meditação ou ioga. Lembre-se de que cuidar de si mesmo é a chave para se sentir bem e ter sucesso em outras áreas da vida.',

                'start_date' => '08-23',
                'end_date' => '09-22',
            ],
            // Libra
            [
                'signo' => '10',

                'message_basic' => 'Este é um bom momento para se concentrar em suas metas de carreira e trabalhar em direção ao sucesso. Lembre-se de se comunicar claramente e ser assertivo.',
                'work_basic' => 'Este pode ser um momento em que você sentirá uma grande criatividade e inspiração em sua carreira. Aproveite essa energia para trabalhar em projetos e ideias que você acredita. No entanto, lembre-se de ser paciente e perseverante, pois o sucesso nem sempre acontece imediatamente.',

                'message_premium' => 'Este é um bom momento para se concentrar em suas metas de carreira e trabalhar em direção ao sucesso. Lembre-se de se comunicar claramente e ser assertivo em suas ações. Esteja aberto a novas oportunidades e saiba como aproveitá-las para sua vantagem. Trabalhar em equipe pode ser muito benéfico neste momento, portanto, não tenha medo de pedir ajuda quando necessário.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente quando se trata de relacionamentos e parcerias. Esteja aberto a novas conexões e seja sociável. Lembre-se de que a sorte não é garantida, portanto, esteja preparado para trabalhar duro para aproveitar as oportunidades que surgirem.',
                'love_premium' => 'Este pode ser um momento para fortalecer seus relacionamentos existentes e demonstrar amor e gratidão. Se você está em um relacionamento, concentre-se em construir uma conexão emocional mais profunda com seu parceiro. Se você está solteiro, pode ser um bom momento para conhecer novas pessoas e experimentar novas experiências.',
                'health_premium' => 'Este é um bom momento para cuidar de sua saúde mental e emocional. Tente encontrar maneiras de equilibrar sua vida pessoal e profissional e reserve um tempo para relaxar e descansar. Lembre-se de que a saúde mental é tão importante quanto a saúde física, portanto, não ignore suas emoções e sentimentos.',

                'start_date' => '09-23',
                'end_date' => '10-22',
            ],
            // Escorpião
            [
                'signo' => '11',

                'message_basic' => 'Se você tem a oportunidade de viajar hoje, aproveite-a! Novas experiências e aventuras o aguardam.',
                'work_basic' => 'Este é um momento em que você pode enfrentar desafios em sua carreira, mas lembre-se de que a perseverança e a determinação são suas maiores armas. Mantenha um foco firme em seus objetivos e esteja aberto a mudanças e adaptações para alcançá-los.',

                'message_premium' => 'Se você tem a oportunidade de viajar hoje, aproveite-a! Novas experiências e aventuras o aguardam. Este é um bom momento para expandir seus horizontes e descobrir coisas novas. Você pode encontrar novas ideias e perspectivas que o inspiram e o ajudam a crescer pessoalmente e profissionalmente. Se não puder viajar, encontre outras maneiras de expandir seus horizontes, como aprender uma nova habilidade ou explorar um novo hobby.',
                'lucky_premium' => 'A sorte pode estar do seu lado neste momento, especialmente quando se trata de finanças. Esteja atento às oportunidades de investimento e tenha cuidado ao lidar com dinheiro. Lembre-se de que a sorte não é garantida, portanto, seja prudente em suas escolhas.',
                'love_premium' => 'Este pode ser um momento de intensidade em seus relacionamentos, seja em um relacionamento existente ou em um novo romance. Abra-se para a possibilidade de conexões profundas e emocionais, mas esteja ciente de suas próprias emoções e limites. Comunicação aberta e honesta será fundamental.',
                'health_premium' => 'Este é um bom momento para cuidar de sua saúde física e mental. Priorize o autocuidado e reserve tempo para atividades relaxantes e terapêuticas. Esteja ciente de quaisquer padrões de pensamento ou comportamentos autodestrutivos e busque ajuda profissional, se necessário. Lembre-se de que a saúde é fundamental para uma vida equilibrada e feliz.',

                'start_date' => '10-23',
                'end_date' => '11-21',
            ],
            // Sagitário
            [
                'signo' => '12',

                'message_basic' => 'Este é um bom momento para se concentrar em seus relacionamentos íntimos e trabalhar na construção de conexões mais profundas e significativas.',
                'work_basic' => 'Você pode estar enfrentando desafios em sua carreira, mas este é um momento para manter a positividade e a confiança em suas habilidades. Considere novas oportunidades e esteja aberto a aprender e crescer em sua profissão. Sua energia e entusiasmo serão seus principais trunfos.',

                'message_premium' => 'Este é um momento para se concentrar em suas finanças e trabalhar para alcançar a estabilidade financeira. Avalie seus gastos e encontre maneiras de economizar dinheiro. Lembre-se de que pequenas mudanças em seus hábitos de gastos podem fazer uma grande diferença ao longo do tempo. Este também pode ser um bom momento para explorar novas oportunidades financeiras.',
                'lucky_premium' => 'A sorte pode estar ao seu lado neste momento, especialmente em viagens e aventuras. Esteja aberto a novas experiências e oportunidades, mas lembre-se de tomar precauções e ser cuidadoso. A sorte pode mudar rapidamente, então aproveite cada momento.',
                'love_premium' => 'Este pode ser um momento de mudanças em seus relacionamentos. Se você está solteiro, esteja aberto a novas conexões e permita-se explorar suas emoções. Se você está em um relacionamento, este é um momento para se comunicar abertamente e cultivar a intimidade emocional. Lembre-se de que o amor é uma jornada contínua.',
                'health_premium' => 'Este é um bom momento para cuidar de sua saúde física e mental. Priorize o autocuidado e mantenha-se ativo com atividades físicas ao ar livre. Esteja ciente de seus limites e evite excessos. A saúde é fundamental para uma vida equilibrada e feliz, então mantenha um equilíbrio saudável em sua rotina diária.',

                'start_date' => '11-22',
                'end_date' => '12-21',
            ],

        ];

        foreach ($horoscopes as $horoscope) {
            Horoscopes::create([
                'signo' => $horoscope['signo'],
                'message_basic' => $horoscope['message_basic'],
                'work_basic' => $horoscope['work_basic'],
                'message_premium' => $horoscope['message_premium'],
                'lucky_premium' => $horoscope['lucky_premium'],
                'love_premium' => $horoscope['love_premium'],
                'health_premium' => $horoscope['health_premium'],
                'start_date' => $horoscope['start_date'],
                'end_date' => $horoscope['end_date'],
            ]);
        }
    }
}
