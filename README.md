# Estudo Direto

**ATENÇÃO:** Este projeto ainda está em desenvolvimento e não está pronto para uso em produção.

## Sobre

Estudo Direto é uma plataforma de aprendizagem online dedicada a fornecer recursos educacionais de qualidade e acessíveis para estudantes de todas as idades e níveis. O objetivo é facilitar o acesso ao conhecimento e proporcionar uma experiência de aprendizado eficaz e direta.

## Funcionalidades (em desenvolvimento)

- Cadastro e autenticação de usuários
- Listagem e visualização de cursos
- Criação e edição de cursos (admin)
- Upload de imagens para cursos e perfis
- Sistema de comentários e avaliações
- Blog de notícias
- Página de contato
- Comunidade para interação entre usuários
- Perfil do usuário com edição de dados e foto
- Timer e calendário para organização dos estudos

## Tecnologias Utilizadas

- **Backend:** Laravel (PHP)
- **Frontend:** Blade (Laravel), Bootstrap, SASS, JavaScript
- **Banco de Dados:** SQLite (padrão), suporte a outros via configuração
- **Outros:** Livewire, Vite, Composer, NPM

## Estrutura do Projeto

- `app/` - Código principal da aplicação Laravel (Controllers, Models, Livewire, etc)
- `resources/views/` - Templates Blade para as páginas do sistema
- `resources/js/` - Scripts JavaScript customizados
- `resources/sass/` - Estilos SASS customizados
- `public/` - Arquivos públicos (index.php, assets, etc)
- `database/` - Migrations, seeders e factories
- `config/` - Arquivos de configuração do Laravel

## Como rodar o projeto

1. **Clone o repositório**
2. **Instale as dependências do PHP:**
   ```sh
   composer install
   ```
3. **Instale as dependências do frontend:**
   ```sh
   npm install
   ```
4. **Copie o arquivo de exemplo de ambiente:**
   ```sh
   cp .env.example .env
   ```
5. **Gere a chave da aplicação:**
   ```sh
   php artisan key:generate
   ```
6. **Configure o banco de dados no `.env` (por padrão usa SQLite):**
   - Para SQLite, basta garantir que o arquivo `database/database.sqlite` exista.
7. **Rode as migrations:**
   ```sh
   php artisan migrate
   ```
8. **(Opcional) Popule o banco com dados de exemplo:**
   ```sh
   php artisan db:seed
   ```
9. **Inicie o servidor de desenvolvimento:**
   ```sh
   php artisan serve
   ```
10. **Inicie o frontend (Vite):**
    ```sh
    npm run dev
    ```

Acesse em [http://localhost:8000](http://localhost:8000).

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou pull requests.

## Aviso

Este projeto está em desenvolvimento e pode conter bugs, funcionalidades incompletas ou mudanças frequentes na estrutura.

---

Desenvolvido com

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
