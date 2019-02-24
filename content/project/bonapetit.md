---
title: Bonapetit
technologies: React, NodeJS, MongoDB, Webpack
external-url: "http://www.github.com/roysegall/bonapetit"
Image: "images/projects/bonapetit.png"
shortDescription: "it was my first attempt with React"
youtubeId: "OFzP_1oRNMY"
github: "roysegall/bonappetit"
ogDescription: "A case study for a React and NodeJS apps which help you to know what you should cook"
---
#### Background
Bonapetit is a dummy project, as most of my projects. After I learned in Frontend masters 
[React](https://frontendmasters.com/courses/complete-react-v4/) and 
[Node.js](https://frontendmasters.com/courses/node-js/) I 
needed to practice what I've learned.

#### The idea
Let's say you have a food item: Egg, Butter, Milk, Apple, Banana, Ground beef, etc. And you don't know what you can make
with them or maybe which products you need to get in order to make something to eat. Well, with `bonapetit` you can do 
it. 

Once you see the front page you can choose which products you own and select how the search will take place: Get recipes
which contains **only what you own** or get recipes which **contains what you have but with more products** that you 
might not have or have but not aware of that combination.

#### My two cents on the stack

**Let start with the backend**: Working with node was pretty nice. Yes, it's `JavaScript`, not my favorite language in 
the world, but the development was pretty easy. Installing `node` is pretty easy, setting up the server with `express` 
was easy as well and the work with `mongoose` and `MongoDB` was pretty much good for modeling data. Wiring up 
`typescript` and `nodemon` is well documented over the web. Creating a small and lightweight backend with `NodeJS`, 
`MongoDB` and 
`Express` is not that different from `Symfony` or `Flask` - there's a lot of documentation, tools, and support from the
community that makes your life very easy.

**Let's talk about the frontend**: `React` has a lot of common with `Vue` - you start with the core: only the components
and you start to layer up what you need: Routing system, HTTP requests, Store layer, and maybe `CSS` processors such as
`LESS` or `SASS`. 

`Vue CLI` has a lot of power: with a couple of settings, that could be saved for later, you get a lot of stuff with zero
configs: `typescript`, `VueX`, `Vue Router` and a lot more(including a UI for managing your project). With `React` it 
simply does not exists. Yes, there could be some documentation around the web but if I'm doing a lot of projects I 
won't clone the same repo and start to form that point. With `Vue CLI` I'm getting a lot of stuff with a couple of 
commands.

But, there's another thing I need to consider - `React` has to support from a big company - Facebook - while `Vue` is 
supported by developers from the community and companies that willing support with money. Who can assure me that those 
companies won't back down from the support they provide in two-three years? Who can make sure people still contribute 
to `vue`?
