KarmaSole
========

* Cliente de consola que consume la API de Karmacracy
* Desarrollado en el mini hackaton en www.katayunos.com junto con la gente de http://karmacracy.com/
* dependencias:
 * Symfony\Console
 * Pimple
 * Composer

* Usando el script pasándole como parámetro la url
```
gonzalo@gnzl:~/$ app/console.php karmaSole:acorta www.katayunos.com
Acortando: www.katayunos.com ...
shorturl: http://kcy.me/9ikf
mykcytype: 2
mykclicks: 0
Personas que han compartido este enlace:
  Usuario: ice. kcyrank: 110
  Usuario: ggalmazor. kcyrank: 149
  Usuario: gonzalo123. kcyrank: 174
  Usuario: ikercelorrio. kcyrank: 280
```

* Usando el script en modo interactivo

```
gonzalo@gnzl:~/$ app/console.php karmaSole:acorta
Dame la url  www.katayunos.com
Acortando: www.katayunos.com ...
shorturl: http://kcy.me/9ikf
mykcytype: 2
mykclicks: 0
Personas que han compartido este enlace:
  Usuario: ice. kcyrank: 110
  Usuario: ggalmazor. kcyrank: 149
  Usuario: gonzalo123. kcyrank: 174
  Usuario: ikercelorrio. kcyrank: 280
```