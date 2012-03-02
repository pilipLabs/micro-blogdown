Micro MVC Framework
===================

Micro is a tiny MVC router for micro-applications that does not require
a heavy set of features



##Install

1. Clone the project
2. Initialise les submodule
3. git submodule update --init
4. chmod 777 on cache/ for twig caching


##Structuring contents folder

The navbar is based on first level folders/files
If the folder contains an other folder then there will be a subnavbar


here a simple exemple :
<pre><code>
--CONTENTS
 `--HOME
 | `--POST_1.md
 | `--POST_2.md
 | `--POST_3.md
 `--HOME.md
 `--POSTS
 | `--POSTS_1
 | | `--POST_1_1.md
 | | `--POST_1_2.md
 | | `--POST_1_3.md
 | `--POSTS_1.md
 | | `--- ...
 | `--POSTS_2
 | `--POSTS_2.md
 | `--POSTS_3
 | `--POSTS_3.md
 `--POSTS.md
 `--ABOUT
 | `--POST_1.md
 | `--POST_2.md
 | `--POST_3.md
 `--ABOUT.md
</code></pre>



###< folder name >.md structure :
<pre><code>
-----
span: 4
title: title of page
-----

Markdown content for header of section
</code></pre>


### Other Markdown file are juste markdown contents
