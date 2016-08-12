# Recetalia API

## API Calls
Estas son las llamadas que la API soporta
- Ingredientes
  - /Ingredients/
    - GET: Obtiene la lista completa de ingredientes
    - HEAD: Obtiene la version de la lista de ingredientes
    - POST: Crea un ingrediente
  - /Ingredients/<id>/
    - GET: Obtiene la informacion de un ingrediente
    - HEAD: Obtiene la cabecera de la respuesta anterior 
    - PATCH: Actualiza un ingrediente
- Recetas
  - /Recipes/
    - GET: Lista completa de recetas
    - HEAD: Version de la lista de recetas
    - POST: Crea una receta
  - /Recipes/<id>/
    - GET: Obtiene la informacion de una receta
    - HEAD: Obtiene la cabecera de la respuesta anterior
    - PATCH: Actualiza un ingrediente
  - /Recipes/<id>/Ingredients/
    - GET: Lista completa de ingredientes de una receta
    - HEAD: Obtiene la cabecera de la respuesta anterior
