# Recursos IA Frontend Editor - WordPress Plugin

Plugin complementari per al tema **Recursos IA** que permet afegir i gestionar recursos des del frontend amb un modal elegant.

## Característiques

✅ **Botó flotant** (+) sempre visible per afegir recursos
✅ **Modal elegant** amb formulari complet
✅ **Crear noves categories** des del frontend
✅ **Crear noves subcategories** des del frontend
✅ **Validació de formularis** amb missatges d'error
✅ **AJAX**: Sense recarregar la pàgina
✅ **Permisos**: Només usuaris amb permisos d'edició poden afegir

## Instal·lació

1. Descarrega el ZIP del plugin
2. Puja'l a WordPress: `Plugins > Afegir nou > Pujar plugin`
3. Activa el plugin
4. Assegura't que el tema **Recursos IA** està activat

## Ús

### Afegir un recurs des del frontend

1. Fes clic al **botó flotant (+)** (part inferior dreta)
2. Omple el formulari:
   - Títol del recurs
   - URL
   - Descripció
   - Categoria (pots crear-ne de noves)
   - Subcategoria (pots crear-ne de noves)
3. Fes clic a **Afegir Recurs**
4. La pàgina es recarregarà automàticament

### Crear nova categoria

1. Al formulari principal, fes clic al botó **+** al costat de "Categoria"
2. Introdueix nom i descripció
3. La categoria es crearà i quedarà seleccionada automàticament

### Crear nova subcategoria

1. Al formulari principal, fes clic al botó **+** al costat de "Subcategoria"
2. Introdueix el nom
3. La subcategoria es crearà i quedarà seleccionada automàticament

## Permisos

- **Afegir recursos**: Usuaris amb capacitat `edit_posts`
- **Crear categories/subcategories**: Usuaris amb capacitat `manage_categories`
- **Botó visible**: Només per usuaris logats amb permisos

## Seguretat

- ✅ Nonces per validar peticions AJAX
- ✅ Sanitització de tots els inputs
- ✅ Comprovació de permisos
- ✅ Validació de camps obligatoris

## Compatibilitat

- WordPress 5.0+
- PHP 7.4+
- Requereix jQuery (inclòs per defecte a WordPress)
- Requereix tema **Recursos IA**

## Estructura de fitxers

```
recursos-ia-frontend/
├── recursos-ia-frontend.php    # Fitxer principal del plugin
├── templates/
│   └── modal.php               # HTML del modal
├── assets/
│   ├── css/
│   │   └── frontend.css        # Estils del modal
│   └── js/
│       └── frontend.js         # JavaScript i AJAX
└── README.md                   # Aquest fitxer
```

## Personalització

### Canviar colors del botó flotant

Edita `assets/css/frontend.css`:
```css
.floating-add-btn {
    background: linear-gradient(135deg, #1da1f2 0%, #0d8bd9 100%);
}
```

### Canviar posició del botó

Edita `assets/css/frontend.css`:
```css
.floating-add-btn {
    bottom: 30px;  /* Distància des de baix */
    right: 30px;   /* Distància des de dreta */
}
```
