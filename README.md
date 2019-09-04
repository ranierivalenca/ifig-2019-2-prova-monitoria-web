# Desenvolvimento para Web I - prova de monitoria (2019.2)

Este é um sistema de controle de serviços em uma pequena empresa de conserto de dispositivos eletrônicos. Após o login (no momento, apenas dois usuários estão cadastrados: "ranieri:ranieri" e "cara:teste", mas você pode cadastrar mais), na tela inicial do sistema, à esquerda são listados os clientes, com um campo para adicionar novos clientes; à esquerda, são mostrados os serviços já cadastrados no sistema.

Em ambas as listagens, algumas ações estão disponíveis:
    - clientes: editar e remover
    - serviços: editar, fechar, remover e ver (quando um serviço está fechado)


Algumas coisas não estão funcionando como deveriam, então você deve fazer um fork deste projeto repositório para a sua conta e realizar as tarefas descritas abaixo neste repositório:

1) Consertar os erros de sintaxe (PHP), funções (PHP) e HTML nos seguintes arquivos:
    - config.php
    - index.php
    - login.php
    - logout.php
    - home.php
    - add_service.php
    - nav.php
    - edit_service.php
    - close_service.php
    - update_service.php
    - update_and_close_service.php

Note que para consertar todos os erros você precisa navegar e testar o sistema.

2) **Comentar os trechos do código que você julga importantes para um estudante da disciplina entender. Leve em consideração que este sistema será disponibilizado para os estudantes como um estudo de caso, e quanto mais comentado estiver, melhor. Faça isso enquanto vai realizando as próximas atividades.**

3) Ajustar o sistema para adicionar clientes (arquivo não encontrado). [você pode se basear no sistema de adicionar serviços].

4) Ajustar o sistema para remover serviço (arquivo não encontrado).

5) Ajustar o sistema para remover cliente (arquivo não encontrado).

6) Fazer as alterações necessárias para que seja possível saber qual usuário cadastrou um serviço:
    - Banco de dados (*foreign key* em *services* referenciando *users*)
    - Sistema de login / logout (manter id do usuário logado...)
    - Script de adicionar serviço
    - Visualização de serviço (detalhes sobre quem cadastrou o serviço)

7) Faça seu código ser seguro contra ataques de injeção de SQL e XSS, pelo menos.

(extra) Ajustar o sistema para editar cliente (arquivo não encontrado) [você pode se basear no sistema de edição de serviços].
