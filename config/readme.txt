
1 - Se utilizar docker para o PHP e MYSQL, execute na pasta raiz o comando:
docker compose -d --build

2 - Após compilado com sucesso e subir o Mysql, execute o script para criar as tabelas utilizadas no teste.
\kabum\db\script_kabum_v2.sql

3 - Verifique o arquivo .env localizado na pasta \kabum\app\infrastructure\persistence\.env:
Se utilizar o docker configure a variavel DB_HOST = db, senão caso utilize php instalado no seu computador pessoal
configure DB_HOST=localhost

4 - No script de criar do banco já foi incluído um insert de usuário para logar no portal administrativo, pode utilizar esse usuário para teste inicial:
INSERT INTO `kabum`.`usuario` (`cd_login`,`ds_senha`) VALUES('123','123');


