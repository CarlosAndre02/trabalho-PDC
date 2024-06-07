from flask import Flask, request, jsonify

app = Flask(__name__)


class Database:
    users = { 'andre': {'plano': 'basico', 'signo': 'aries'} }
    content = {
        'aries': {
            'mensagem': "O jeito mais seguro de avançar neste momento é você não dar nada por sabido nem muito menos por garantido, porque o cenário anda mais complexo do que o normal, e as pessoas andam também bastante desorientadas.",
            'bicho': 48
        },
        'touro': {
            'mensagem': "Dobre a aposta em vez de se retirar do jogo, porque esse não é do jeito que você sabe jogar. As coisas andam mudando com uma rapidez impressionante, é difícil manter o passo, mas isso não quer dizer nada negativo.",
            'bicho': 54
        },
        'gemeos': {
            'mensagem': "Nada é simples, porém, tampouco as coisas são tão complicadas que não possam ser administradas. Uma coisa é certa: você precisa de sabedoria, de economizar palavras e gestos até encontrar uma saída eficiente.",
            'bicho': 41
        },
        'cancer': {
            'mensagem': "Todo mundo quer ter a razão ao seu lado, mas as coisas não são tão simples assim para resolver numa espécie de queda de braço. A razão é volátil, ora está com uma pessoa, ora com outra. Seja razoável nesse sentido.",
            'bicho': 12
        },
        'leao': {
            'mensagem': "Mantenha o planejamento estudado, mas preserve uma abertura básica para perceber quando os ventos sopram diferente, e assim se adaptar aos acontecimentos, mesmo que isso signifique deixar de lado todo o planejamento.",
            'bicho': 46
        },
        'virgem': {
            'mensagem': "O espírito de aventura é importante nesta parte do caminho, no qual é melhor evitar a repetição dos padrões que deram certo em outros tempos, mas que agora frustrariam suas expectativas. Há alternativas disponíveis.",
            'bicho': 33
        },
        'libra': {
            'mensagem': "É conveniente mudar de rumo, mesmo que isso signifique ter de suportar críticas e enfrentar conflitos. As coisas andam mudando muito rapidamente para todas as pessoas, e as que se queixam são as que ficam para trás.",
            'bicho': 3
        }
    }


    def createUser(self, username, signo, plano):
        self.users[username] = {'signo': signo, 'plano': plano}
        print(self.users)

    def getUser(self, username):
        if self.isUserCreated(username) is False:
            raise Exception("Desculpe, mas você não está cadastrado")
        return self.users[username]

    def isUserCreated(self, username):
        if username in self.users:
            return True
        return False

    def consultarMessagem(self, plano, signo):
        content = self.content[signo]
        return { 'mensagem': content['mensagem'], 'signo': signo}

    def consultarBicho(self, plano, signo):
        content = self.content[signo]

        if plano == 'basico':
            raise Exception("Desculpa, mas não há número do bicho para o plano básico")
    
        return {
            'mensagem': content['mensagem'],
            'bicho': content['bicho'],
            'signo': signo
        }


database = Database()

@app.route('/create', methods=['POST'])
def postUser():
    data = request.get_json()
    
    username = data.get('username')
    signo = data.get('signo')
    plano = data.get('plano')
    database.createUser(username, signo, plano)
    return jsonify({'username': username, 'signo': signo, 'plano': plano})

@app.route('/message/<username>')
def consultarMessage(username):
    try:
        user = database.getUser(username)
        
        conteudo = database.consultarMessagem(user['plano'], user['signo'])
        return jsonify(conteudo)
    except Exception as e:
        error_message = str(e)
        return error_message,401

@app.route('/bicho/<username>')
def consultarBicho(username):
    try:
        user = database.getUser(username)

        conteudo = database.consultarBicho(user['plano'], user['signo'])
        return jsonify(conteudo)
    except Exception as e:
        error_message = str(e)
        return error_message,401
    

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
