Micro-Blogdown
===================

Micro-Blogdown is a blog based on [Micro](https://github.com/aegypius/micro) using 
Markdown files to store blog posts.

No database required !


Install
-------

```sh
git clone git://github.com/pilipLabs/micro-blogdown.git
cd micro-blogdown
git submodule update --init
chmod 777 cache
```

Structuring contents folder
---------------------------

The navbar is based on first level folders/files
If the folder contains an other folder then there will be a subnavbar


here a simple example :

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


### ```<folder name>```.md structure :

    -----
    span: 4
    title: title of page
    -----
    
    Markdown content for header of section



### Other Markdown file are juste markdown contents
