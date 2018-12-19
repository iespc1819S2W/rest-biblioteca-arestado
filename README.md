# API Rest Biblioteca - aRESTado

| Ruta | Mètode | Url | Descripció | Responsable |
|--|--|--|--|--|
| llibres | GET | /llibres | Llegir tots els llibres | AYOUB | 
| llibre | GET | /llibres/{id} | Llegir un llibre a partir de la clau primària | Miguel |
| llibre | GET | /llibres/{id}/where/{condició}/order/{ordre} | Llegir un llibre amb filtres i ordenació | Amador |
| llibre | POST | /llibres | Alta d’un llibre. | Amador |
| llibre | POST | /llibres/{id}/modificar | Modificar un llibre | AYOUB |
| llibre | POST | /llibres/{id}/borrar | Borrar un llibre | Marta |
| autors-llibre | GET | /llibres/{id}/autors | Llegir tots els autors d’un llibre. | Miguel |
| autors-llibre | POST | /llibres/{id}/autors | Alta d’un nou autor d’un llibre | Marta |
| autors-llibre | POST | /llibres/{id}/autors/{id} | Baixa d’un autor d’un determinat llibre | X |
