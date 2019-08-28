# VIZIR CODE CHALLENGE
Teste realizado para avaliar o conhecimento e capacidade de candidatos às vagas de programação/desenvolvimento na Vizir.

## Executando o projeto
### Requisitos
- [Git](https://git-scm.com/)
- [Docker](https://www.docker.com/)
- [Docker compose](https://docs.docker.com/compose/)

### Baixando o projeto
```bash
git clone --recursive https://github.com/matheus-souza/test-vizir.git
```
### Executando o projeto
*Verifique se as portas 80 e 5432, da máquina que utilizará, não estão sendo usadas*

Acesse a pasta do projeto ```cd test-vizir```

Copie o arquivo ```.env.laradock.dev``` para a pasta do submodulo
```bash
cp .env.laradock.dev laradock/.env
```

Execute o arquivo run
```bash
./run
```

## Rodando os testes
Após executar o arquivo ```run``` estará logado no container ```workspace```, nele você poderá utilizar o comando ```vendor/bin/phpunit --testdox``` para a execução dos testes

Obs.: Se rodar os testes precisa recriar a base com a massa de dados inicial com o comando ```php artisan migrate:refresh --seed```

## Acesso pelo navegador
Após executar o projeto conforme a documentação acesse [localhost](http://localhost) para ter acesso as telas do projeto
