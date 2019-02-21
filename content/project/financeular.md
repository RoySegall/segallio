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
do the same thing so I decided to quit and make it as a side project for my self.

#### The idea
Let's say you want to manage your incomes or build a budget for an upcoming trip. Usually, You'll open a google spread 
sheet or maybe a Microsoft Excel or using numbers to design your budget. But the look and feel of a huge table without 
separation into small peaces, or the need to start and write mathematical formulas based on other cells in the 
spreadsheet might be exhausting.

Financeular looks at the solution a bit different: you go into the front page and start by entering the budget. Once 
it's done you'll see a stunning interface which you create small peaces of blocks that dedicated to different section of 
the budget - Food, visits, flight cost etc. etc.

But this solve only one case for managing a budget - a temporary budget in our case. What about a budget for a house 
which spread over a year? What if you could share you income and expenses with a professional person that could help you
create a much more balanced budget for you house keeping. This could be achieved with a market place of professional 
users. But, unfortunately, this might never exists since the project placed on the shelve and might never be alive.

#### My two cents on the stack
**Let's talk about the backend**: Well, If you probably look on my other project in the portfolio you might saw that 
`PHP` is the dominate language. Yes, it's what I'm doing since I was 15. But expect for the language, in PHP there's 
something that I did not see much in `Python`, `JS` or `Golang` - dependency injection. Yes, that technique is one of my 
favorite techniques in the development world. it's allows you to control your classes structure and order and help you 
to test your code much better.

Except for that, `Symfony` gives you a good to order your code, and alongside `doctrine`(a `PHP ORM`) the modeling of 
the entities is pretty much awesome. 

**Let's talk about the frontend**: This is the first real project I used a vue project which created by `Vue CLI` and 
the experience is good. I got so much things for free - `typescript`, `routing`, components order, store and much more - 
that React, for example, don't have or has a lack of PR.

Generally, the work with `Vue` is pretty delightful - no need for `JSX` or something like that. You just start to write
you components pretty easily.
