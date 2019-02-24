---
title: Nuntius
technologies: PHP, Symfony
external-url: "http://www.github.com/roysegall/nuntius-bot"
image: "images/projects/nuntius.png"
shortDescription: "Creating a bot framework based on PHP"
github: "roysegall/nuntius-bot"
site: "http://www.nuntius.xyz"
ogDescription: "Foo"
---

#### Background
When I worked at `gizra` there was a need for creating a chat bot in `slack`. My first weapon of choice was `PHP` 
because this was the most common language.

When I started to look for frameworks in `PHP`, none of the solutions I found was good enough. Yes, they had a lot of 
stars at Github but the work with them, and the architecture was not my cup of tea. So, I remembered in one of the 
unwritten rule in development: if you don't find something that suites you - write it your self. I created something 
small that later on will grow into something bigger. Bigger that what I expected.

#### The idea
So first, why that name? In order to understand it let's go to our Delorean time machine and had back a couple of years. 
I had an enlightenment - let's create a chat system that will be fully modular: the backend could be in any language, 
the front end could be in any language but the only thing that matters is that they will speak in the same way. Some 
kind of a protocol. I choose the name `nuntius` which means `messaging` in Latin. The idea was too big for one person 
but the name was to good to be forgotten.

When I came to scale the small script into something bigger, `nuntius` was a good choice. It sounds very exotic and 
probably no one would know what it really means, like any good name.

So, what `nuntius` gives us that other frameworks not? First, ease of development and elegance in writing what you
need to handle: text recognition, setting up dev environment, documentation that would be easy to read and with a very 
detailed code examples, a DB layer that can abstracted to any DB there is, entity system and much more.

The idea developed into something big and I bought a domain. I started to work on version 2.0 that will be much more big
than what we have now: modules system, better caching layer, better entity system, plugins, and much more. But, I never
got to finish the work. 

#### My two cents on the stack
Up until that point, I never created a framework from scratch. I started to pick up `PHP` packages which can solve for 
me what I needed: Slack integration solved by a package which created by the `PHP` community, stuff like: routing, 
file managing, dependency injection solved by `Symfony`.

Packages that did not exists, such as an abstraction for Facebook messenger, created by me and extracted for external
packages so other developers could use them however they desire.
