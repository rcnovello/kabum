
*Obs: 
 - Projeto focado em demonstrar etrutura moduralizada utilizando php, similar o que é utilizado em frameworks como NestJS para Node.
 - Conceito POO em SOLID, com forte tipagem e reaproveitamento de código.
 - Também demonstrado disponibilizada de api padronizada BackEnd for FrontEnd, faccilitando o trabalho fullstack.
 - Plataforma segura com docker, CI/CD e test;

Orientações para deploy:

1 - Se utilizar docker para o PHP e MYSQL, execute na pasta raiz o comando:
docker compose -d --build

2 - Após compilado com sucesso e subir o Mysql, execute o script para criar as tabelas utilizadas no teste.
\kabum\db\script_kabum_v2.sql

3 - Usuário para teste inicial Usuario: 123, senha: 123
No script create do banco já foi incluído um insert de usuário para logar no portal administrativo, pode utilizar esse usuário para teste inicial:
INSERT INTO `kabum`.`usuario` (`cd_login`,`ds_senha`) VALUES('123','123');

4 - Verifique o arquivo .env localizado na pasta \kabum\app\infrastructure\persistence\.env:
Se utilizar o docker configure a variavel DB_HOST = db, senão caso utilize php e mysql instalado no seu computador pessoal configure DB_HOST=localhost.

5 - Caso queira alterar o layout feito em react, acesse a pasta /kabum/react e execute as duas linhas abaixo:
npm install
npm run build
Irá compilar o template na pasta /kabum/public/frontend.

6 - Acesse http://localhost/ para ver funcionando.
