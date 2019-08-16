# MVC
Model View Controller (MVC) architecture pattern with the same model of an application interface, in a model, a view and a controller.

In the MVC pattern, we would then map each of these three parts to the MVC pattern as illustrated in the image below:

![Image](https://arquivo.devmedia.com.br/artigos/Higor_Medeiros/IntroducaoMVC/IntroducaoMVC01.jpg)

External world modeling and visual user feedback are separated and managed by the Model, View, and Controller objects:

![Image](https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/MVC-Process.svg/512px-MVC-Process.svg.png)

The map of the structure folder is below:
```
application/
├── controllers/
│   ├── Controller.class.php
│   ├── ErrorController.class.php (Error 404 = Page not found)
│   ├── HomeController.class.php (OK = Home page)
├── models/
├── views/
│   ├── default/
│       ├── header.php
│       ├── footer.php
│   ├── pages/
│       ├── error.php (Page 404)
│       ├── home.php (Home page)
settings/
├── config.php
├── routers/
│   ├── Router.class.php
│   ├── RouterManager.class.php
assets/
```

Join us! Developer Nation

[![Image](https://discordapp.com/api/guilds/563480013052182539/embed.png)](https://discord.gg/YKNCADa)
