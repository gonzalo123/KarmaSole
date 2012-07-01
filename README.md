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

Ayuda:

```
$ app/console.php
Console Tool

Usage:
  [options] command [arguments]

Options:
  --help           -h Display this help message.
  --quiet          -q Do not output any message.
  --verbose        -v Increase verbosity of messages.
  --version        -V Display this application version.
  --ansi              Force ANSI output.
  --no-ansi           Disable ANSI output.
  --no-interaction -n Do not ask any interactive question.

Available commands:
  help               Displays help for a command
  list               Lists commands
karmaSole
  karmaSole:acorta   Acorta url con karmacracy
```