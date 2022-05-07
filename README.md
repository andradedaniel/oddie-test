# **Oddie Test**


1. [Sobre o teste](#sobre-o-teste)
2. [Instalação](#instalação)
3. [Como usar](#como-usar)
4. [Observações](#observações)
---

## Sobre o teste
#### Descrição básica

Desenvolver uma API para criação de profile de usuario para uma Rede social, contemplando backend para visualização dos perfis cadastrados.

#### User Stories

- Como visitante, quero me cadastrar informando nome, email, wpp, cpf e senha.
- Como visitante, quero confirmar a senha para ter certeza que não houve erros no preenchimento.
- Como usuário, quero fazer login
- Como usuário, quero adicionar foto de perfil
- Como usuário, quero substituir foto de perfil
- Como usuário, quero visualizar os dados do meu perfil
- Como administrador, quero visualizar os usuários cadastrados

---


## Instalação
#### Clonar projeto

`$ git clone https://github.com/andradedaniel/oddie-test.git`

#### Copiar o arquivo .env

`$ cd oddie-test`\
`$ cp .env.example .env`

#### Instalar dependências

`$ docker run --rm -it -v $PWD:/app --user $(id -u):$(id -g) composer:1.8.6 install`

#### Fazer build e iniciar containers docker

`$ ./vendor/bin/sail up --build`

#### Configuração inicial

`$ ./vendor/bin/sail artisan storage:link`\
`$ ./vendor/bin/sail artisan migrate --seed`

---
## Como usar

Junto ao código do projeto existe um arquivo [insomnia.json](https://raw.githubusercontent.com/andradedaniel/oddie-test/main/insomnia.json) que pode ser utilizado na ferramenta [Insomnia](https://insomnia.rest/) para realizar as requisições de teste. 
Importe esse arquivo no Insomnia a partir menu preferências na "Data". 

Durante a configuração é criado um user Admin para teste. Os dados são: 
`email: admin@oddie.com`
`senha: 1234`

Essas credenciais já estão configuradas no Insomnia como váriavel. Basta fazer a requisição "login" que o token de autenticação será  armazenado e utilizado para as proximas requisições. 

Para alterar essas credencias basta entrar em "Manage Environments" (CTRL + E) e alterar os parametros.

---

## Observações

A implementação do teste foi realizando observando as seguintes premissas:

- Utilização de versões do PHP e Laravel iguais (ou próximas) às utilizadas pela Oddie;
- Foco em atender a rigor as [User Stories](#user-stories) estabelecidas para o teste. Muitas outras coisas poderiam ser feitas, mas fugiria do escopo de um teste;
- Diante do requisito de ser uma API, entendi ser conveniente para a situação a utilização do Laravel Sanctum para autenticação e autorização utilizando API Tokens;
- As demais funcionalidades (Registro, Login e Logout), devido a simplicidade da funcionalidade para efeito de teste, julguei ser mais indicado implementa-las manualmente e não utilizar packages do Laravel que já implementam essas funções (como o Fortify ou Breeze) mas que são de maior complexidade, extrapolando o contexto e o que foi solicitado no teste. 

##### Por fim, não deixe de visitar a [HomePage](http://localhost/) no browser. ;) 