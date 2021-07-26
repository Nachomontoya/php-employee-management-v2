<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->

[![All Contributors](https://img.shields.io/badge/all_contributors-2-orange.svg?style=flat-square)](#contributors-)

<!-- ALL-CONTRIBUTORS-BADGE:END -->

`#html` `#css` `#js` `#php` `#basics` `#master-in-software-engineering`

# PHP Employee Management v2 using MVC and OOP<!-- omit in toc -->

> This project is part of the Master in Software Development. The objective was to refactor a previous project (https://github.com/mhfortuna/php-employee-management-v1) in order to get the application applying the MVC pattern, OOP and using a database instead of a JSON file.

### Main functionality:

- Login and logout with a MySQL database for storing the users.
- Controlled user session set to 10 minutes
- Show data from a MySQL database in a JS Grid
- Pagination of the data configured by the grid
- Employees CRUD Create Read Delete and Update with a MySQL database for the storage
- Employee page with employee detail
- A pannel so an admin can manage the users (create and delete them).

## Index <!-- omit in toc -->

- [Deployment 📦](#deployment-)
- [How to use 💻](#how-to-use-)
  - [Users page](#users-page)
  - [Dashboard page](#dashboard-page)
  - [Employee page](#employee-page)
- [Project structure 📁](#project-structure-)
- [Tools and tecnologies used 🛠️](#tools-and-tecnologies-used-️)
- [Project requirements 📏](#project-requirements-)
- [Resources](#resources)
- [Contributors ✨](#contributors-)

### Requirements 📋

To run this project you need yo have a local server installed in your computer (XAMPP or MAMP) and a MySQL database configured into the local server. On this project you'll find a file called 'employees_v2.sql' (config/employees.sql) in order to create that database.

### Install🔧

To clone this repository you can type the next on your terminal:

```
git clone https://github.com/Nachomontoya/php-employee-management-v2.git
```

Then you need to copy this folder to `htdocs` or change the server root variable.

## Deployment 📦

To open the file explorer just open a browser and go to [localhost](localhost)
You'll have to login, the credentials are:

```
email: admin@assemblerschool.com
pass: 123456
```

## How to use 💻

### Users page

If you are logged in as an admin (with the credentials we give you). On this page you will be able to manage the users that have access to the application. You will be able to create new users and delete all of them but the admin.

### Dashboard page

After you have logged in the application you'll see a grid with some of the employees data. From there you can add new employees or delete them. If you double click on an employee you can see more data in a new page called the **employee page**. If you press on the employee icon it will redirect you to the **employee page** too, but this time you'll have a form to create a new employee.

### Employee page

This page renders conditionaly depending on how you accesed it:

- Case 1 - double click on employee from dashboard:
  In this view you will see the available employee data, and you can update any of the fields. It the `id` doesn't exist it will show an error and redirect you to the dashboard.
- Case 2 - Click on the employee icon from dashboard:
  In this view you'll see the empty form to create a new employee. There are mandatory fields to fill. When you submit the new employee it will show a modal and redirect you to the dashboard.

## Project structure 📁

```
assets/
config/
controllers/
libs/
models/
views/

```

- Assets folder contains css, js & images.
- Config folder contains the global constants, db configuration and sql files.
- Controllers folder contains the controllers for the main functionality.
- libs folder contains parent Classes from which controllers heritage their main structure.
- Models folder manage the queries made to the database (CRUD).
- Views folder contains the pages that will be rendered.

## Tools and tecnologies used 🛠️

- PHP
- HTML
- CSS
- JavaScript
- jQuery
- jsGrid
- Bootstrap
- MySQL

## Project requirements 📏

- You must use PDO to establish the connection with your database
- All code included comments need to be write in English
- Use a code style like camelCase
- HTML never use inline styles
- It is recommended to divide the tasks into several subtasks so that you can associate each particular step of the construction with a specific commitment.
- You should try as much as possible that the commits and planned tasks are the same
- You must create a correctly documented README.md file in the root directory of the project (see guidelines in Resources)

## Resources

- [Password hash](https://www.php.net/manual/es/function.password-hash.php)
- [Password verify](https://www.php.net/manual/es/function.password-verify.php)
- [HTTP response code](https://www.php.net/manual/es/function.http-response-code.php)
- [PDO](http://zetcode.com/php/pdo/)
- [Official web page](http://js-grid.com/)
- [Official examples](http://js-grid.com/demos/)
- [JSGrid](http://js-grid.com/docs/#callbacks)
- [Check if a file exists](https://www.php.net/manual/es/function.file-exists.php)
- [MVC Pattern](https://en.wikipedia.org/wiki/Model–view–controller)
- [htaccess” file](https://www.hostinger.es/tutoriales/que-es-el-archivo-htaccess)
- [htaccess” file](https://ticket.cdmon.com/es/support/solutions/articles/7000006237-informaci%C3%B3n-y-usos-del-fichero-htaccess)

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://github.com/Nachomontoya"><img src="https://avatars.githubusercontent.com/u/73990495?v=4" width="100px;" alt=""/><br /><sub><b>Nacho Montoya</b></sub></a><br /><a href="https://github.com/Nachomontoya/php-employee-management-v2/commits?author=nachomontoya" title="Code">💻</a></td>
    <td align="center"><a href="https://github.com/bbenalia/"><img src="https://avatars.githubusercontent.com/u/65949632?v=4" width="100px;" alt=""/><br /><sub><b>Brahim Benalia</b></sub></a><br /><a href="https://github.com/Nachomontoya/php-employee-management-v2/commits?author=bbenalia" title="Code">💻</a></td>
  </tr>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!
