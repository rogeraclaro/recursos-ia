# Recursos IA - WordPress Theme

Tema de WordPress per gestionar i mostrar recursos d'Intel·ligència Artificial.

## Característiques

- **Custom Post Type**: `recurs_ia` per gestionar recursos
- **Taxonomies personalitzades**: Categories i Subcategories
- **Disseny modern**: Estil Twitter Bookmarks amb gradients blaus
- **Cerca en temps real**: Filtra recursos per nom, descripció o URL
- **Responsive**: Optimitzat per mòbil, tauleta i desktop
- **Base de dades**: Tot guardat a WordPress (no localStorage)

## Instal·lació

1. Descarrega el fitxer ZIP
2. Puja'l a `/wp-content/themes/`
3. Descomprimeix-lo
4. Activa el tema des de WordPress Admin > Aparença > Temes
5. Executa el script d'importació: `/wp-content/themes/recursos-ia-theme/import-data.php`

## Estructura de Fitxers

```
recursos-ia-theme/
├── style.css              # Info del tema (requerit per WordPress)
├── functions.php          # Funcions principals del tema
├── index.php              # Template principal
├── header.php             # Capçalera
├── footer.php             # Peu de pàgina
├── import-data.php        # Script per importar dades inicials
├── assets/
│   ├── css/
│   │   └── style.css      # Estils complets
│   └── js/
│       └── main.js        # JavaScript per cerca i interacció
└── README.md              # Aquest fitxer
```

## Ús

### Afegir un nou recurs

1. Ves a **Recursos IA > Afegir Nou**
2. Introdueix:
   - **Títol**: Nom del recurs
   - **Contingut**: Descripció
   - **URL**: Enllaç al recurs
   - **Categoria**: Categoria principal
   - **Subcategoria**: Subcategoria específica
3. Publica

### Gestionar categories

- **Categories**: WordPress Admin > Recursos IA > Categories
- **Subcategories**: WordPress Admin > Recursos IA > Subcategories

## Personalització

### Canviar colors

Edita `assets/css/style.css` i modifica:
- `#1da1f2`: Color principal (blau Twitter)
- `#0d8bd9`: Color secundari (blau fosc)
- `#f5f5f5`: Fons gris clar

### Afegir funcionalitats

Edita `functions.php` per afegir hooks, filters o custom fields.

## Requisits

- WordPress 5.0+
- PHP 7.4+
- MySQL 5.6+

## Suport

Per preguntes o problemes, contacta amb l'autor del tema.
