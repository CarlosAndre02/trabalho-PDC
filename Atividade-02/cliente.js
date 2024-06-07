const readline = require("readline");

const urlBase = "https://e287b614-01dc-4957-83fd-f0b4f3d83d4d-00-3v0abygoq0a8n.kirk.replit.dev";

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

function perguntar(opcao) {
  return new Promise((resolve) => {
    rl.question(opcao, (resposta) => {
      resolve(resposta);
    });
  });
}

async function showInitialMenu() {
  console.log(`
    ==============================
    Menu
    ==============================
    1. Criar conta
    2. Consultar mensagem do dia
    3. Consultar número do bicho
    4. Sair
    ==============================
  `);

  const escolha = await perguntar("Escolha uma opção: ");

  switch (escolha) {
    case "1":
      await createAccountMenu();
      break;
    case "2":
      await getMessageOfTheDayMenu()
      break;
    case "3":
      await getBichoMenu()
      break;
    case "4":
      console.log("Saindo...");
      rl.close();
      return;
    default:
      console.log("Opção inválida, por favor escolha uma opção válida.");
  }

  showInitialMenu();
}

async function createAccountMenu() {
  const username = await perguntar("\nDigite seu username: ");
  const signo = await perguntar("Digite seu signo: ");
  const opcaoPlano = await perguntar(
    `\n1. Plano básico: Apenas mensagem do dia, com base no seu signo.\n2. Plano avançado: Mensagem do dia e número do bicho.\nEscolha um plano: `,
  );
  const plano =
    opcaoPlano === "1"
      ? "basico"
      : opcaoPlano === "2"
        ? "avançado"
        : "inválido";

  const data = {username, signo, plano};
  try {
    const response = await fetch(urlBase + "/create", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });

    if (!response.ok) {
      throw new Error("Erro na requisição: " + response.statusText);
    }

    // const responseData = await response.json();
    // console.log("Resposta recebida:", responseData);
    console.log("Usuário criado com sucesso!")
  } catch (error) {
    console.error("Ocorreu um erro:", error);
  }
}

async function getMessageOfTheDayMenu() {
  const username = await perguntar("\nDigite seu username: ");

  try {
    const response = await fetch(urlBase + "/message/" + username);

    if (!response.ok) {
      throw new Error(await response.text());
    }

    const responseData = await response.json();
    console.log(`\nCom base no signo ${responseData.signo}, a mensagem do dia é: `)
    console.log(responseData.mensagem)
  } catch (error) {
    console.error(error.message);
  }
}

async function getBichoMenu() {
  const username = await perguntar("\nDigite seu username: ");

  try {
    const response = await fetch(urlBase + "/bicho/" + username);

    if (!response.ok) {
      throw new Error(await response.text());
    }

    const responseData = await response.json();
    console.log(`\nCom base no signo ${responseData.signo}, o número do bicho do dia é: ${responseData.bicho}`)
  } catch (error) {
    console.error(error.message);
  }
}

showInitialMenu();
