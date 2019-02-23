---
title: Financeular
technologies: PHP, Symfony, Vue
external-url: "http://www.github.com/roysegall/bonapetit"
image: "images/projects/financeular.png"
shortDescription: "Using Tahini with VueJS"
youtubeId: "YyZuWTcg7Js"
github: "roysegall/financeular"
---

#### Background
Usually I creates a project for the technologies I've learned. This time, I created a project for an idea I had based on
an open source project I created - [Tahini](/project/tahini). I did not create the project for learning something, but
maybe start something that later could have revenue. But, after a while I saw there's something like 10-100 sites that
do the same thing so I decided to quit and make it as a side project for myself.

#### The idea
Let's say you want to manage your incomes or build a budget for an upcoming trip. Usually, You'll open a `google spread 
sheet` or maybe a `Microsoft Excel` or using `Numbers` to design your budget. But, the look and feel of a huge table 
without separation into small peaces, or the need to start and write mathematical formulas based on other cells in the 
spreadsheet might be exhausting.

Financeular looks at the solution a bit different: You'll start by setting up your budget. Once it's done you'll see a 
stunning interface which you can create small blocks that dedicated to a different section of the budget - Food, visits, 
flight cost etc. etc.

But this solve only one case for managing a budget - a temporary budget in our case. What about a budget for a house 
which spread over a year? What if you could share you income and expenses with a professional that could help you
create a much more balanced budget for your house. This could be achieved with a market place of professionals. But, 
unfortunately, this might never exists since the project was placed on the shelve and might never be alive.

#### My two cents on the stack
**Let's talk about the backend**: Well, If you probably look on my other project in the portfolio you might saw that 
`PHP` is the dominate language. Yes, it's what I'm doing since I was 15. But expect for the language, in PHP there's 
something that I did not see much in `Python`, `JS` or `Golang` - dependency injection. Yes, that technique is one of my 
favorite techniques in the development world. it's allows you to control your classes structure and order and help you 
to test your code much better.

Except for that, `Symfony` gives you a good way to order your code, and alongside `doctrine`(a `PHP ORM`) the modeling 
of the entities is pretty much awesome. 

**Let's talk about the frontend**: This is the first real project I used `vue`. For creating the files and configuration
I used `Vue CLI` and the experience is good. I got so much things for free - `typescript`, `routing`, components order, 
store and much more. I did see something like `Vue CLI` for `React`. If something like this exists it's need a lot of 
publishing over the web.

Generally, the work with `Vue` is pretty delightful - no need for `JSX` or something like that. You just start to write
you components pretty easily.
