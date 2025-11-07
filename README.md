# ðŸ¤– Recursos IA - WordPress Theme & Plugin

[![Version](https://img.shields.io/badge/version-1.1-blue.svg)](https://github.com/rogeraclaro/recursos-ia)
[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://php.net/)
[![License](https://img.shields.io/badge/license-GPL--3.0-green.svg)](LICENSE)

ColÂ·lecciÃ³ curada de **47 recursos d'IntelÂ·ligÃ¨ncia Artificial** organitzats en **6 categories** i **12 subcategories**, amb sistema complet de gestiÃ³ per WordPress.

## ðŸ“Š Contingut

- **47 recursos** d'IA amb URL i descripciÃ³ completa
- **6 categories** principals temÃ tiques
- **12 subcategories** especialitzades
- Theme WordPress complet amb disseny modern
- Plugin frontend per afegir recursos dinÃ micament
- Script d'importaciÃ³ automÃ tic de dades

## ðŸ—‚ï¸ Estructura del Repositori

```
recursos-ia/
â”œâ”€â”€ theme/                          # Tema WordPress
â”‚   â””â”€â”€ recursos-ia-theme/
â”‚       â”œâ”€â”€ style.css              # Header del tema
â”‚       â”œâ”€â”€ functions.php          # CPT, taxonomies, hooks
â”‚       â”œâ”€â”€ index.php              # Template principal
â”‚       â”œâ”€â”€ header.php             # CapÃ§alera amb stats
â”‚       â”œâ”€â”€ footer.php             # Peu de pÃ gina
â”‚       â”œâ”€â”€ import-47-recursos.php # Script importaciÃ³ dades
â”‚       â”œâ”€â”€ assets/
â”‚       â”‚   â”œâ”€â”€ css/style.css     # Estils complets (6.2 KB)
â”‚       â”‚   â””â”€â”€ js/main.js        # JavaScript cerca (1.7 KB)
â”‚       â””â”€â”€ README.md              # DocumentaciÃ³ tema
â”‚
â”œâ”€â”€ plugin/                         # Plugin frontend
â”‚   â””â”€â”€ recursos-ia-frontend/
â”‚       â”œâ”€â”€ recursos-ia-frontend.php
â”‚       â”œâ”€â”€ templates/modal.php
â”‚       â”œâ”€â”€ assets/
â”‚       â”‚   â”œâ”€â”€ css/frontend.css
â”‚       â”‚   â””â”€â”€ js/frontend.js
â”‚       â””â”€â”€ README.md
â”‚
â””â”€â”€ README.md                       # Aquest fitxer
```

## ðŸŽ¨ Categories i Recursos

### 1. ðŸ’¬ Xats i Assistents IA (11 recursos)
Plataformes conversacionals amb models de llenguatge avanÃ§ats
- ChatGPT, Claude AI, Google Gemini, Perplexity AI, Qwen, DeepSeek, Kimi, NotebookLM

### 2. ðŸ› ï¸ Eines de Desenvolupament amb IA (16 recursos)
Plataformes per crear aplicacions, webs i codi automÃ ticament
- **Builders**: Bolt.new, v0, Lovable, B12, 10Web, Locofy
- **Assistents**: Cline, Claude Code, Supermaven, GitHub Spark, OpenAI Codex
- **AutomatitzaciÃ³**: n8n, Superflex AI, Jules

### 3. ðŸ“š Aprenentatge i FormaciÃ³ (9 recursos)
Cursos, tutorials i recursos educatius sobre IA
- **Oficials**: DeepLearning.AI, NVIDIA Academy, Codecademy, DataCamp
- **CatalÃ **: CibernÃ rium (IA Generativa, ChatGPT, Prompting)
- **Tutorials**: OpenAI Cookbook, Claude Code for PMs

### 4. ðŸŽ¨ IA Creativa (5 recursos)
Eines per disseny, imatges, vÃ­deo i creativitat
- **Imatges**: Freepik AI, Sketch to Image, Adobe Firefly
- **Ã€udio**: Typecast TTS, Fadr

### 5. ðŸ”§ Recursos per Desenvolupadors (4 recursos)
Repositories, plantilles i eines tÃ¨cniques
- **Templates**: Pydantic Starter, MindWork AI Studio
- **Comunitats**: a16z Gen AI Apps, AI Templates

### 6. ðŸŒ Aplicacions Diverses (2 recursos)
Altres aplicacions i serveis amb IA
- Justicio (legal), ConveyThis (traducciÃ³)

## ðŸš€ InstalÂ·laciÃ³

### Requisits
- WordPress 5.0 o superior
- PHP 7.4 o superior
- MySQL 5.6 o superior

### Pas 1: InstalÂ·lar el Tema

```bash
# Descarrega o clona el repositori
git clone https://github.com/rogeraclaro/recursos-ia.git

# Puja el tema a WordPress
# Copia theme/recursos-ia-theme/ a wp-content/themes/

# Activa el tema des del panel de WordPress
# AparenÃ§a > Temes > Recursos IA > Activar
```

### Pas 2: Executar Script d'ImportaciÃ³

Visita aquesta URL (substitueix amb el teu domini):
```
https://tudomini.com/wp-content/themes/recursos-ia-theme/import-47-recursos.php
```

L'script importarÃ  automÃ ticament:
- âœ… 6 categories amb descripcions
- âœ… 12 subcategories
- âœ… 47 recursos amb tÃ­tol, URL i descripciÃ³

### Pas 3: InstalÂ·lar Plugin (Opcional)

```bash
# Puja el plugin a WordPress
# Copia plugin/recursos-ia-frontend/ a wp-content/plugins/

# Activa el plugin
# Plugins > Recursos IA Frontend > Activar
```

Ara tindrÃ s un **botÃ³ flotant (+)** per afegir recursos des del frontend!

## ðŸ’» Desenvolupament

### Custom Post Type
```php
// Nom: recurs_ia
// Slug: recurs
// Suports: title, editor, thumbnail
```

### Taxonomies
```php
// Categoria: categoria_ia (hierarchical)
// Subcategoria: subcategoria_ia (hierarchical)
```

### Meta Fields
```php
// Camp URL: _recurs_url (tipus: url, requerit)
```

## ðŸŽ¯ Funcionalitats

### Frontend
- âœ… Disseny modern Twitter Bookmarks
- âœ… Gradient blau (#1da1f2)
- âœ… Cerca en temps real (JavaScript)
- âœ… Responsive (mÃ²bil, tauleta, desktop)
- âœ… Favicons automÃ tics
- âœ… Ãndex de categories clickable
- âœ… EstadÃ­stiques dinÃ miques

### Backend
- âœ… GestiÃ³ completa de recursos
- âœ… Categories i subcategories jerÃ rquiques
- âœ… Camp URL personalitzat
- âœ… Compatible amb Gutenberg
- âœ… Meta boxes al editor

### Plugin Frontend
- âœ… BotÃ³ flotant per afegir recursos
- âœ… Modal elegant amb AJAX
- âœ… Crear categories/subcategories
- âœ… Sense recarregar pÃ gina

## ðŸ”§ PersonalitzaciÃ³

### Canviar Colors
Edita `theme/recursos-ia-theme/assets/css/style.css`:
```css
/* Color principal */
--color-primary: #1da1f2;  /* Blau Twitter */
--color-primary-hover: #0d8bd9;
```

### Modificar Templates
Els templates PHP estan a `theme/recursos-ia-theme/`:
- `index.php` - Template principal
- `header.php` - CapÃ§alera
- `footer.php` - Peu de pÃ gina

### Afegir Funcionalitat
Edita `functions.php` per afegir hooks personalitzats

## ðŸ“– DocumentaciÃ³

- [InstalÂ·laciÃ³ detallada](docs/INSTALL.md)
- [Guia de desenvolupament](docs/DEVELOPMENT.md)
- [Changelog](docs/CHANGELOG.md)

## ðŸ¤ Contribuir

Les contribucions sÃ³n benvingudes! Si us plau:

1. Fes fork del projecte
2. Crea una branca per la teva feature (`git checkout -b feature/NovaFuncionalitat`)
3. Commit dels canvis (`git commit -m 'Afegeix nova funcionalitat'`)
4. Push a la branca (`git push origin feature/NovaFuncionalitat`)
5. Obre un Pull Request

## ðŸ“ LlicÃ¨ncia

Aquest projecte estÃ  llicenciat sota GPL-3.0 - veure [LICENSE](LICENSE) per mÃ©s detalls.

## ðŸ‘¤ Autor

**Roger Aclaro**
- GitHub: [@rogeraclaro](https://github.com/rogeraclaro)
- Repositori: [recursos-ia](https://github.com/rogeraclaro/recursos-ia)

## ðŸ™ AgraÃ¯ments

- Tots els desenvolupadors dels 47 recursos d'IA inclosos
- Comunitat WordPress
- Comunitat open source

## ðŸ“Š EstadÃ­stiques del Projecte

- **Llenguatges**: PHP 61.4%, CSS 17.2%, JavaScript 13.6%, Hack 7.8%
- **VersiÃ³ actual**: 1.1
- **Data**: Novembre 2025
- **Estado**: Actiu i mantenint-se

## ðŸ”— Links Ãštils

- [WordPress.org](https://wordpress.org/)
- [PHP Documentation](https://www.php.net/docs.php)
- [Modern CSS](https://moderncss.dev/)

---

**â­ Si aquest projecte t'ha estat Ãºtil, considera donar-li una estrella!**

Fet amb â¤ï¸ a Catalunya
