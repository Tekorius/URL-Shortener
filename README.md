ryt.is URL Shortener
========================

Welcome to ryt.is URL shortener. This is a custom URL shortener built
on Symfony 3.4 framework.

What? Why?
--------------

First of all, let's talk about the reasoning behind this custom URL shortener.

Some time ago I scored an amazing domain - ryt.is, which is directly
derived from my name Rytis. At first I was thinking about redirecting it
to my personal portfolio or blog, but that would be waste of such a nice
short URL, won't it? So I decided to make it into an URL shortener service.

Sure I could have used one of the existing URL shorteners, such as [YOURLS][1]
or [Lessn More][2], but where's the fun in that, plus if I am taking something
written in PHP I want it written on top of Symfony Framework!

I love open-source, thus this project was born. I do not promise to maintain
it, or provide any support, but then again, I may. We'll see.

[1]: https://yourls.org/
[2]: https://lessnmore.net/

What does this project depend on?
---------------------------------

The main project is built on Symfony 3.4 (soon Symfony 4).

For frontend theme I opted to use [CoreUI](http://coreui.io/).

Getting Started
---------------

This is just like any other Symfony project, you should already be familiar
with development with Symfony. If not, I strongly suggest you to go to
[their official website][3] and start learning.

Anyway, here's a quick getting started:

### 0. Install your tools

For this recipe, you will need:
 * 50g of [GIT][6]
 * 200g of [Composer][4]
 * 200g of [Yarn][5]
 * Some skills with PHP
 * Knowledge of [Webpack][7] to taste

[3]: http://symfony.com/
[4]: https://getcomposer.org/
[5]: https://yarnpkg.com/en/docs/install
[6]: https://git-scm.com/
[7]: https://webpack.js.org/

### 1. Clone the repo

Do that through git

```text
git clone https://github.com/Tekorius/URL-Shortener rytis
```

### 2. Install composer dependencies

If you did everything correctly, this should work without a problem.

Navigate to the project directory using terminal and enter.

```text
composer install
```

### 3. Configure parameters

After composer installs the required components, it will detect that 
you are missing the `parameters.yml` file and start a configuration 
wizard. You should follow the instructions in the wizard and configure 
your database, mailer and some custom parameters.

If you skipped the wizard or accidentally mistyped anything, don't worry, 
this same configuration can be found inside `app/config/parameters.yml`. 
Notice that this file is git ignored and will not be committed with 
the project. Do not confuse `parameters.yml` with `parameters.yml.dist`.
Only the most l33t developers should touch the dist file.

### 4. Update database schema

To make it easier to work with Symfony's console and to save my fingers
I have created a symlink to the default `bin/console` and simply named it `c`.

This will work on normal systems and Mac. If you are using Windows, you will 
be stuck with `php bin/console`, yuck.

```text
./c d:d:c
./c d:s:c
```

### 5. Install frontend stuff

I opted to use Symfony's suggested way of using [Encore][8] with Webpack.

You should install yarn dependencies:

```text
yarn install
```

[8]: https://symfony.com/doc/current/frontend/encore/simple-example.html