# kabum
 
Teste Fullstack Kabum - Ronni Novello

🚀 Visão Geral

Este projeto foi desenvolvido para demonstrar uma estrutura modularizada utilizando PHP, similar ao que é utilizado em frameworks como NestJS para Node.js.

🔹 Principais conceitos abordados:

Programação Orientada a Objetos (POO) seguindo os princípios SOLID.

Forte tipagem e reaproveitamento de código.

API padronizada BackEnd for FrontEnd (BFF) para facilitar o desenvolvimento fullstack.

Segurança com Docker, CI/CD e testes automatizados.

📌 Orientações para Deploy

1️⃣ Subindo o ambiente com Docker

Se estiver utilizando Docker para PHP e MySQL, execute na pasta raiz:

docker compose up -d --build

2️⃣ Criando as tabelas do banco de dados

Após a compilação do ambiente e a inicialização do MySQL, execute o seguinte script SQL:

kabum/db/script_kabum_v2.sql

3️⃣ Usuário de teste inicial

Para acessar o portal administrativo, utilize as seguintes credenciais:

Usuário: 123

Senha: 123

Essas credenciais já estão cadastradas no script de criação do banco:

INSERT INTO `kabum`.`usuario` (`cd_login`, `ds_senha`) VALUES ('123', '123');

4️⃣ Configuração do Banco de Dados

Verifique o arquivo .env localizado em:

kabum/app/infrastructure/persistence/.env

Se estiver utilizando Docker, configure:

DB_HOST=db

Caso esteja rodando PHP e MySQL localmente, configure:

DB_HOST=localhost

5️⃣ Alterações no Layout (React)

Caso queira modificar o frontend em React, siga os passos abaixo:

cd kabum/react
npm install
npm run build

Isso irá compilar o template na pasta kabum/public/frontend.

6️⃣ Acesso ao Sistema

Após concluir as configurações, acesse no navegador:

http://localhost/

📂 Estrutura do Projeto

kabum/
│── app/                          # Código-fonte do backend
│   ├── application/              # Camada de aplicação (use cases)
│   ├── domain/                   # Entidades e regras de negócio
│   ├── infrastructure/           # Infraestrutura (banco, serviços, autenticação)
│   ├── presentation/             # Controladores e APIs
│── db/                           # Scripts SQL
│── public/                       # Arquivos públicos (frontend compilado)
│── react/                        # Código-fonte do frontend (React)
│── docker-compose.yml            # Configuração do Docker
│── .env                          # Configuração de ambiente
│── README.md                     # Documentação

🛠 Tecnologias Utilizadas

Backend: PHP (modularizado, inspirado no NestJS)

Frontend: React.js

Banco de Dados: MySQL

Gerenciamento de Containers: Docker

CI/CD e Testes

📧 Contato do Desenvolvedor

🔗 rcndev.com.br

