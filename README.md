# SCP
Sistema de Controle de Projetos


Sistema de Controle de Projetos Versão 1.0.0 - Documentação

Geral - O sistema foi batizado geréricamente de Sistema de Controle de Projetos. Todo o sistema foi trabalhado para ser responsivo à todas as plataformas de visualização, como Desktop, Tablets e Celulares. O sistema está publicado na web utilizando o recurso Lightsail da Amazon, para haver visualização do sistema em funcionamento. O código fonte do sistema encontra-se publicado no meu GitHub (https://github.com/alexbotelhoa) para visualizações.

Cabeçalho - No foi colocado um recurso à ser implementado de tradução da página. Foi criado um logotippo para melhor aparência do sistema. Logo a baixo encontra-se o menu com cinco opções: Home, Projetos, Tarefas, Satus e Sobre.

Rodapé - Existe três quadros informativos, um da 'Empresa Hallyz Cia & Ltda' (fake), um de 'Navegação' servido apenas como atalhos do sistema e um recursos à ser desenvolvido de 'Newsletter'.

Página Home - Utilizada apenas para visualização do andamento dos projetos e das tarefas. No gráfico 'Status dos Projetos' em formato de Donut, mostrar o andamento geral dos projetos, os projetos atrasados em vermelho e não atrasados em verde. No quadro 'Tarefas Antigas', mostra as 6 tarefas com status 'Aberta' e com data de fechamento mais antigas. É possível fechar a terefa através desse quadra. No canto superior direito dos quadros 'Status dos Projetos' e 'Tarefas Antigas', existem opções de minimizar o quadro e de fechá-lo. Retornando quando a página for atualizada. No quadro 'Últimos 6 Projetos', mostra os 6 projetos mais recentemente criados e informando o status de atrasado em vermelho e não atrasado em verde e clicando nos botões 'PREV' e 'NEXT' você pode percorrer por esses projetos.

Página Projetos - Utilizada para visualização, criação, edição e exclusão de projetos. Clicando nos títulos de cada coluna da tabela, automáticamente toda a tabela será ordenado em ordem crescente de acordo com a coluna escolhida. Abaixo da tabela tem a opção de paginação, pois foi configurado para apresenar apenas seis projetos por página. Para realizar com cadastro, basta clicar em 'Cadastrar Projeto', informar o nome do projeto, a data de previsão de início do projeto e a data de previsão de fechamento do projeto e depois clicar em 'Cadastrar'. Para realiar uma alteração, basta clicar em 'Editar' e alterar as informações desejadas e depois clicar em 'Salvar' e para excluir, basta clicar em 'Excluir' e confirmar a exclusão para finalizar o processo. Importante: Existe uma restrição criada no sistema, para não ser possível excluir um projeto que tenha tarefas vinculadas.

Página Tarefas - Utilizada para visualização, criação, edição e exclusão de tarefas. Clicando nos títulos de cada coluna da tabela, automáticamente toda a tabela será ordenado em ordem crescente de acordo com a coluna escolhida. Existe a opção de fechar a tarefas nessa tabela, para alterar o status de uma tarefa, basta clicar no botão existente na coluna 'Situação' referente a tarefa escolhida. Abaixo da tabela tem a opção de paginação, pois foi configurado para apresenar apenas seis tarefas por página. Para realizar com cadastro, basta clicar em 'Cadastrar Tarefas', informar o nome da tarefa, escolher a qual projeto estará vinculada essa tarefa, informar a data de previsão de início da tarefa e a data de previsão de fechamento da tarefa e depois clicar em 'Cadastrar'. Para realiar uma alteração, basta clicar em 'Editar' e alterar as informações desejadas e depois clicar em 'Salvar' e para excluir, basta clicar em 'Excluir' e confirmar a exclusão para finalizar o processo.

Página Status - Utilizada para uma visualização mais detalhada dos projetos Atrasados e Não Atrasado, com relação a página principal. Clicando nos títulos de cada coluna da tabela, automáticamente toda a tabela será ordenado em ordem crescente de acordo com a coluna escolhida.

Página Sobre - Página utilizada para registrar as informações do sistema, tanto quanto os recursos utilizados para o seu desenvolvimento.

Recursos utilizados no Front-End:

 HTML 5 - Novos conceitos de marcação de código
 JavaScript - Utilizados em vários recursos
 Bootstrap v3.2.0 - Utilizado no layout das páginas
 Font Awesome Free v5.12.0 - Para os ícones
 CSS v3.0.0 - Para vários stylos de font no site
j jQuery v1.11.1 - Para o slides em carrossel
 BxSlider v4.1.2 - Para o slides em carrossel
 Ionicons v2.0.0 - Utilizado no ícone do carrossel
Recursos utilizados no Back-End:

 PHP 7.3.12 - Linguagem com foco em POO
 PDO - Utilizado para conexão com o BD
 MariaDB 10.4.10 - Utlizado como SGBD
 Apache 2.4.41 - Como Web Services
