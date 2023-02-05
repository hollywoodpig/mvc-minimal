## About

Only basic PHP. It can be useful if you're a beginner and somehow not allowed to use composer and frameworks

## Instead of docs

Please notice:

-   All your controllers and models classes must be static
-   All templates must have `.phtml` file extension
-   This "framework" relies on sqlite and the file's being created automatically at `./database/database.sqlite`
-   Your database structure sets up automatically too: just add a `__constructStatic` method with the `create table if not exists ... (...)` statement to your models

## Setup project

In order to setup your project, you should:

-   Use any web server out there
-   That's all :)

## Why's this code so awful?

We don’t judge people having been learning to code, right?
