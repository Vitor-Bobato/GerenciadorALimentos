<div align="center">
  <h1>🍏 Sistema de Gestão de Alimentos 🥕</h1>
  
  <p>
    <img src="https://img.shields.io/badge/Laravel-8.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
    <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap" alt="Bootstrap">
    <img src="https://img.shields.io/badge/MySQL-5.7+-4479A1?style=for-the-badge&logo=mysql" alt="MySQL">
    <img src="https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php" alt="PHP">
  </p>
  
  <p>Um <strong>sistema completo</strong> para gestão de alimentos desenvolvido com Laravel que transforma o controle de estoque em uma experiência intuitiva e visualmente agradável.</p>
  

<h2>✨ Funcionalidades Destacadas</h2>

<h3>🛍️ Cadastro Inteligente</h3>
<ul>
  <li>📋 Formulários dinâmicos com validação em tempo real</li>
  <li>📷 Campo para upload de fotos dos produtos</li>
  <li>📅 Seletor de datas intuitivo para validades</li>
  <li>🏷️ Auto-complete para categorias existentes</li>
</ul>

<h3>📦 Gestão Visual de Estoque</h3>
<ul>
  <li>🟢🟡🔴 Sistema de cores para níveis de estoque</li>
  <li>📈 Histórico completo de movimentações</li>
  <li>📤 Exportação para Excel/PDF</li>
</ul>

<h2>🛠️ Stack Tecnológica</h2>

<table>
  <tr>
    <th>Camada</th>
    <th>Tecnologias</th>
    <th>Ícones</th>
  </tr>
  <tr>
    <td><strong>Frontend</strong></td>
    <td>Bootstrap 5, Font Awesome 6, Chart.js, jQuery</td>
    <td>🎨📊🖼️</td>
  </tr>
  <tr>
    <td><strong>Backend</strong></td>
    <td>Laravel 8, PHP 7.4+, Laravel Livewire</td>
    <td>🐘🛠️🔥</td>
  </tr>
  <tr>
    <td><strong>Banco</strong></td>
    <td>MySQL 5.7+, Eloquent ORM</td>
    <td>🗄️🔍</td>
  </tr>
</table>

<h2>🚀 Guia de Instalação Passo-a-Passo</h2>

<ol>
  <li><strong>Preparação do Ambiente</strong>
<pre><code># Clone o repositório
git clone https://github.com/seu-usuario/gestao-alimentos.git
cd gestao-alimentos</code></pre>
  </li>
  
  <li><strong>Instalação de Dependências</strong>
<pre><code>composer install --optimize-autoloader
npm install && npm run dev</code></pre>
  </li>
  
  <li><strong>Configuração</strong>
<pre><code>cp .env.example .env
php artisan key:generate</code></pre>
    Edite o <code>.env</code> com suas credenciais de banco de dados
  </li>
</ol>

<h2>📂 Arquitetura do Projeto</h2>

<pre>
📦 gestao-alimentos
├── 📂 app
│   ├── 📂 Models
│   │   ├── Alimento.php
│   │   └── Categoria.php
│   ├── 📂 Http
│   │   ├── 📂 Controllers
│   │   │   ├── AlimentoController.php
│   │   │   └── RelatorioController.php
│   │   └── 📂 Requests
│   │       └── StoreAlimentoRequest.php
├── 📂 database
│   ├── 📂 migrations
│   └── 📂 seeds
└── 📂 resources
    └── 📂 views
        ├── 📂 alimentos
        └── 📂 layouts
</pre>

<h2>👨‍💻 Desenvolvido por</h2>

<p>Vitor Bobato © 2025</p>

<p>
  <a href="https://github.com/Vitor-Bobato">
    <img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github" alt="GitHub">
  </a>
  <a href="https://www.linkedin.com/in/vitor-bobato/">
    <img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin" alt="LinkedIn">
  </a>
</p>

<div align="center">
  <p>Feito com ❤️ e ☕</p>
</div>
