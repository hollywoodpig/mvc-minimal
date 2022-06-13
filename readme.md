## About

Only basic PHP. It can be useful if you're a beginner and somehow not allowed to use composer and frameworks

## Instead of docs

Please notice:

- All your controllers and models classes must be static
- All templates must have `.phtml` file extension
- This "framework" uses sqlite and it creates automatically at `./database/database.sqlite`
- Your database should setup automatically. If needed for your model, just add a `__constructStatic` method with `create table if not exists ... (...)` statement

## Setup project

In order to setup your project, you should do:

- Type `php -S localhost:8000` in terminal (or use a dev server)
- That's all :)

## Why's this code so awful?

We don’t judge people having been learning to code, right?
