## Cadastro e Gerenciamento de Moradores

Sistema web (CRUD) feito com HTML, CSS, JavaScript, PHP e MySQL.

## Estrutura

```
cadastro_moradores/
├── index.php                   (redireciona para a lista)
├── cadastro_moradores.sql                    (banco e tabela)
├── home/
│   ├── cadastro_morador.html   (formulário de cadastro)
│   └── lista.php               (lista com Editar e Excluir)
├── js/
│   └── morador_novo.js         (checkbox, placa em maiúsculas, máscara do telefone)
├── php/
│   ├── conexao.php             (liga ao banco)
│   ├── cadastrar.php           (INSERT)
│   ├── editar.php              (formulário preenchido)
│   ├── atualizar.php           (UPDATE)
│   └── excluir.php             (DELETE)
└── css/
    └── style.css
```

## Como rodar (XAMPP)

1. Copie a pasta `Cadastro_Moradores` para `C:\xampp\htdocs\` (resultado: `C:\xampp\htdocs\Cadastro_Moradores`).
2. Abra o XAMPP e ligue **Apache** e **MySQL**.
3. Abra `http://localhost/phpmyadmin`, vá na aba **SQL**, cole o conteúdo de `cadastro_moradores.sql` e clique em **Executar**.
4. Acesse `http://localhost/Cadastro_Moradores/home/cadastro_morador.html` ou `http://localhost/Cadastro_Moradores/`.



## Funcionalidades

- Cadastrar morador (nome, endereço/bloco e apto, e-mail, telefone, placa opcional)
- Listar moradores (mostra "Sem veículo" quando não há placa)
- Editar e excluir (com confirmação)
- JavaScript: checkbox "Não tenho veículo", placa em maiúsculas, máscara de telefone
- PHP: prepara statements e verificações de POST/id
