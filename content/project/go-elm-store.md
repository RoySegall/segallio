---
title: Go-elm store
technologies: Golang, RethinkDB, Elm
external-url: "http://www.github.com/roysegall/bonapetit"
image: "images/projects/go-store.png"
shortDescription: "Using Elm and Go"
youtubeId: "gD_DEQFYdZI"
github: "roysegall/elm-store"
ogDescription: "A case study for a books e-commerce site based on Elm and Go"
---

#### Background
Let's look at the technologies - `Go` and `Elm`. Well, you might have heard of `Go` before(if not, I'll get to that) but 
what is `Elm`? `Elm` is a functional programming language which looks like `Haskell` and eventually compiles into `JS`.
I came across this language while working at `gizra`. You can read 
[here](https://www.gizra.com/content/elmlang-headless-drupal/)about why choosing `Elm` and not go with the flow and use 
`React` or maybe the new version of `Angular`.

At the same time, I heard about `Go` - a language created by Google which solved the problems Google had. I decided to 
take a look and see what it all about. I saw a nice language, not that complex which looks to me as the future.

I did not have a lot of experience with `Elm` since the projects I worked on did not use `Elm`. I took the challenge for 
creating a small project with `Elm` and this my story with `Elm` and `Go`.

#### The idea
Half a year before the project conceived there was a trend of fake Oreilly's books that make fun of the general look -
on the cover, there's an animal that doesn't have any connection to the main topic of the book, a title, and subtitle
that comes to elaborate on the content.

A friend of mine collected all the cover of the books. I decided to make an e-commerce site that sells the books. 
Overall, I tried to create a good experience with seeing all the books, showing a beautiful cart and having a cool 
checkout process with cool animations.

#### My two cents on the stack
**Let's talk about the DB:** First, I want to talk about the DB I choose - `RethinkDB`. It's a `NoSQL` DB which has 
orientation for `realtime` events and has an awesome query language. It's also very easy to set up and have a built-in 
UI. But, the company behind the DB had some financial issues and shut down. Of course, the community stepped in but, for 
some reasons, the DB lost his fame and `MongoDB` remained the dominant DB in the NoSQL DBs. Personally, I love this DB 
and think it's a good DB but, you can't use a product like that in a production environment: security issues, a product 
that is not backed by a company is not a good selling item when arriving to do a pitch in front of client or CV bodies.

**Let's talk about the backend**: Well, the work with `Go` was very refreshing in compare when working with languages 
like `PHP` or `Python` at the time: I liked the typing system, the dependency manager(though in big projects it can get 
very complex but that's for another story), and the fact that the deployment process is very easy - compile the file and 
run as a service.

**Let's talk about the frontend**: Well, `Elm` is not an easy language, IMO. The work with `Elm` was hard. Every time I
approached to do something it was very complicated; Nothing was easy with `Elm`. But, if you thought that programming
in `Elm` disables the need for writing `JS` code you are wrong. If we need to access local storage in the browser, or 
maybe interact with a `JS` package that we found first - we would need to write `JS` code for that. IMO, I would not 
recommend `Elm` as my first choice for writing apps.
