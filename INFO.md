# Objectius
- [x] Llegir tots els llibres. (GET)
- [x] Llegir un llibre a partir de la clau primària. (GET) 
- [x] Llegir un llibre amb filtres i ordenació (GET) 
- [x] Alta d’un llibre. (POST) 
- [x] Modificar un llibre (POST) 
- [x] Borrar un llibre(POST) 
- [x] Llegir tots els autors d’un llibre. (GET) 
- [ ] Alta d’un nou autor d’un llibre (POST) 
- [x] Baixa d’un autor d’un determinat llibre (POST)


# Fluxe de treball

1. Abans de tocar codi, sempre feim u **git pull**.
`git pull origin dev`
2. Feim els canvis pertinents al codi.
3. Pujam el codi a la branca de desenvolupament **dev**.
`git add .`
`git commit -m "missatge descriptiu dels canvis"` 
`git push origin dev`

# Configuració inicial
- Agafam el contingut de la branca **dev** que es on farem feina.
- `git pull origin dev`
- Ens crearà la branca **dev**. Ara ens movem a aquesta branca.
- `git checkout -b dev`

- I ara ja estam llestos per a treballar.
