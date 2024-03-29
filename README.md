Módulo Para Transformar as Mensagens do Magento em Toaster
====================================================

---
Descrição
---------
---
Esse módulo permite ao cliente configurar as mensagens de feedback do magento, transformando em forma de toaster


Requisitos
----------
---
 - [Magento] Community 2.3+
 - [PHP] 7.4+


Instalação
-----------
Navegue até o diretório raíz da sua instalação do Magento 2 e siga os seguintes passos:

1. Instale via composer
   - ```composer config repositories.toastmessage vcs https://github.com/gihovani/magento2-toastmessage```
   - ```composer require gihovani/magento2-toastmessage```
       - Neste momento, podem ser solicitadas suas credenciais de autenticação do Magento. Caso tenha alguma dúvida, há uma descrição de como proceder nesse [link da documentação oficial](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/connect-auth.html).
2. Execute os comandos:
   - ```php bin/magento setup:upgrade```
   - ```php bin/magento setup:static-content:deploy``` ou ```php bin/magento setup:static-content:deploy pt_BR```, de acordo com as configurações da sua loja.
3. Dê permissões as pastas var/ pub/
   - ```chmod 777 -R var/ pub/```


Atualização
-----------
É altamente recomendado que você tenha um ambiente de testes para validar alterações e atualizações antes de atualizar sua loja em produção. É recomendado também que seja feito um **backup** da sua loja e informações importantes antes de executar qualquer procedimento de atualização/instalação.

A atualização do módulo do toastmessage é feita através do **composer** e pode ser feita de diversas maneiras, de acordo com suas preferências. Uma forma é através dos comandos:
1. ```composer update magento2-toastmessage```
2. ```php bin/magento setup:upgrade```
3. ```php bin/magento setup:static-content:deploy``` ou ```php bin/magento setup:static-content:deploy pt_BR```, de acordo com as configurações da sua loja.

**Observações**
- Em seguida, executar novamente o comando ```php bin/magento setup:static-content:deploy``` ou ```bin/magento setup:static-content:deploy pt_BR```, de acordo com as configurações da sua loja.


Configuração
----------
![Magento 2 Admin Config](https://raw.githubusercontent.com/gihovani/magento2-toastmessage/master/view/frontend/web/images/screenshots/admin-config.jpg)


Módulo em Ação
----------
![Mensagem de Sucesso](https://raw.githubusercontent.com/gihovani/magento2-toastmessage/master/view/frontend/web/images/screenshots/frontend-message-success.jpg)

![Mensagem de Erro](https://raw.githubusercontent.com/gihovani/magento2-toastmessage/master/view/frontend/web/images/screenshots/frontend-message-error.jpg)

![Mensagem de Atencao](https://raw.githubusercontent.com/gihovani/magento2-toastmessage/master/view/frontend/web/images/screenshots/frontend-message-warning.jpg)

![Mensagem de Informacao](https://raw.githubusercontent.com/gihovani/magento2-toastmessage/master/view/frontend/web/images/screenshots/frontend-message-info.jpg)

Dúvidas?
----------
---
Caso tenha dúvidas ou precise de suporte crie uma issue.


Changelog
---------
1.0.0
- Versão beta para testes.
- Configuração das cores via painel admin 

1.1.0
- Adicionado o toast nas mensagens de checkout

1.1.1
- Adicionado timer para remover o cookie e eliminar mensagens duplicadas

1.1.2
- Criado configuracao para remover o cookie, ajustes na tradução 

1.1.3
- Adicionado testes unitários

1.1.4
- Ajuste boas praticas magento

1.1.5
- Ajuste boas praticas magento  
- Ajuste menu de configuracoes no admin

1.1.6
- Adicionado as mensagens de exemplo no arquivo README.

1.1.7
- Ajustado a forma que o estilo css é importado.

Contribuições
-------------
---
Achou e corrigiu um bug ou tem alguma feature em mente e deseja contribuir?

* Faça um fork.
* Adicione sua feature ou correção de bug.
* Envie um pull request no [GitHub].
* Obs.: O Pull Request não deve ser enviado para o branch master e sim para o branch correspondente a versão ou para a branch de desenvolvimento.
