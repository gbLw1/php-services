# Prova

Prova final da disciplina **Arquitetura Orientada a Serviços** do curso de **Sistemas para Internet** da Faculdade de Tecnologia de Jahú.

As questões da prova estão no arquivo [Segunda Avaliação.docx](./docs/Segunda%20Avaliação.docx).

## Rodando o projeto

Para executar o projeto, crie o banco de dados com o nome `pontos_turisticos` e execute o script SQL [pontos_turisticos.sql](./db/pontos_turisticos.sql) para criar as tabelas do banco de dados (você ainda deverá popular o banco de dados manualmente).

### Passo a passo

1. Abra o [XAMPP](https://www.apachefriends.org/pt_br/index.html) e inicie os serviços Apache e MySQL
2. Abra o navegador e acesse o endereço `http://localhost/phpmyadmin`
3. Crie um banco de dados com o nome `pontos_turisticos`
4. Clique no banco de dados criado e depois na aba `SQL`
5. Copie e cole o conteúdo do arquivo [pontos_turisticos.sql](./db/pontos_turisticos.sql) no campo de texto e clique em `Executar`
6. Crie uma pasta com o nome `Gabriel` dentro da pasta `htdocs` do XAMPP e copie os arquivos do projeto para dentro dela
7. Abra o navegador e acesse o endereço `http://localhost/Gabriel/`
8. Pronto! O projeto está rodando
