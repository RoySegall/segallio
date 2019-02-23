---
title: Bonapetit
technologies: React, NodeJS, MongoDB, Webpack
external-url: "http://www.github.com/roysegall/bonapetit"
Image: "images/projects/bonapetit.png"
shortDescription: "it was my first attempt with React"
youtubeId: "OFzP_1oRNMY"
github: "roysegall/bonappetit"
---
#### Background
Bonapetit is a dummy project, as most of my projects. After I learned in Frontend masters 
[React](https://frontendmasters.com/courses/complete-react-v4/) and 
[Node.js](https://frontendmasters.com/courses/node-js/) I 
needed to practice what iv'e learned.

#### The idea
Let's say you have a food item: Egg, Butter, Milk, Apple, Banana, Ground beef, etc. And you don't know what you can make
with them or maybe which products you need to get in order to make something to eat. Well, with `bonapetit` you can do 
it. 

Once you in the front page you can choose which products you own and select how the search will take place: Get recipes
which contains **only what you own** or get recipes which **contains what you have but with more products** that you 
might not have or have but not aware of that combination.

#### My two cents on the stack

**Let start with the backend**: Working with node was pretty nice. Yes, it's `JavaScript`, not my favorite language in the 
world, but the development was pretty easy. Installing `node` is pretty easy, setting up the server with `express` was 
easy as well and the work with `mongoose` and `MongoDB` was pretty much good for modeling data. Wiring up `typescript` 
and `nodemon` is well documented over the web. Creating a small and light weight backend with `NodeJS`, `MongoDB` and 
`Express` is not that different from `Symfony` or `Flask` - there's a lot of documentation, tools, and support from the
community that make your life very easy.

**Let's talk about the frontend**: `React` has a lot of common with `Vue` - you start with the core: only the components
and you start to layer up what you need: Routing system, HTTP requests, Store layer, and maybe `CSS` processors such as
`LESS` or `SASS`. 

When using something like `Vue CLI` that with a couple of settings, that could be save for later, you get a lot of 
stuff: `typescript`, `VueX`, `Vue Router` and a lot more(including a UI for manging your project) with `React` it simply 
does not exists. Yes, there could some documentation around the web but if I'm doing a lot of projects I won't clone
the same repo and start form that point. With `Vue CLI` I'm getting a lot of stuff with a couple of commands.

But, there's another thing I need to consider - `React` has a couple of things that `Vue` is missing:

* A support from a big company - Facebook supports react with the community while `Vue` is supported by companies that
willing to support it and the community. Who can assure me that those companies won't backdown from the support they 
provide in a two-three years?
* NativeScript - There is another thing that don't exits for vue which is `React native`. Right when writing this lines,
I did not hared about `Vue native` and if so, I think the it's the same as `React native`.

