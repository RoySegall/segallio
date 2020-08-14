---
type: blog
url: https://www.gizra.com/content/how-deal-colliding-aliases
slug: "/blog/my-first-post"
source: "gizra"
date: "2012-03-01"
title: "How to deal with colliding aliases"
---
Here’s a common problem with aliases:

users/[user:name]/blog – This is a page defined by Panels. It shows a list of latest blog posts
users/[user:name]/blog/[node:title] – This is the alias of the node that is a blog post. But if you will try to use it, Drupal thinks you refer to the Panels page, and shows you the lastest blog posts, instead of the node
