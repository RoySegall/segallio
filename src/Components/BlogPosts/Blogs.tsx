import ReactChild from "react";

export interface BlogPost {
    url: string;
    title: string;
    date: string;
    source: string;
    paragraph: ReactChild.JSX.Element;
}

export const blogs: BlogPost[] = [
    {
        url: "https://www.testim.io/blog/a-developers-take-on-qa/",
        date: "July 24, 2023",
        title: "A Developer’s Take on QA",
        source: "Testim IO blog",
        paragraph: <>Testim by Tricentis, originally named Testim, was created in 2014 to help anyone author automated tests. At the time, Selenium was king and tools to help developers automate their tests (e.g. Cypress, Puppeteer, and Playwright) were science fiction.</>
    },
    {
        url: "https://www.testim.io/blog/mocking-in-testing/",
        date: "January 05, 2022",
        title: "Mocking in Testing: from zero to hero",
        source: "Testim IO blog",
        paragraph: <>In end-to-end (E2E) automated testing, we attempt to simulate how the end-user would use the product—clicking on buttons, filling out forms, etc.—to see if the UI produces the expected results. The product relies on many smaller pieces like React/Angular/Vue components or functions that process data from the database in the backend.</>
    },
    {
        url: "https://www.testim.io/blog/developers-stop-being-afraid-of-qa/",
        date: "December 02, 2021",
        title: "Developers: Stop being afraid of QA",
        source: "Testim IO blog",
        paragraph: <>As developers, you are probably familiar with this scenario: you went over a code review with another developer (which you do, right?), pushed the latest fixes, ran a couple of tests by yourself, and with a big smile upon your face, you sent a message to the QA guy, Joe (a generic name for a person from the QA department): “You can start testing.”</>
    },
    {
        url: "https://www.testim.io/blog/my-top-four-static-site-generators/",
        date: "September 26, 2021",
        title: "My Top Four Static Site Generators",
        source: "Testim IO blog",
        paragraph: <>I talked about static site generators (SSG) and server-side rendering (SSR) in my previous blog post. We cover a brief history of how various techniques of websites and web-based applications were created and their intended use.</>
    },
    {
        url: "https://www.testim.io/blog/what-are-static-site-generators/",
        date: "September 18, 2021",
        title: "What are Static Site Generators and Why Would I Need One?",
        source: "Testim IO blog",
        paragraph: <>The internet, as we know it today, is a very diverse place. Thanks to JavaScript and web frameworks such as React, Vue, or Angular, and many more, it has led to more application-oriented versus static websites. Some well-known applications, including Google Drive, Gmail, Salesforce, and Testim.io, are web-based reincarnations of software that used to be desktop applications.</>
    },
    {
        url: "https://roysegall.medium.com/my-insights-as-a-web-developer-in-the-medtech-industry-adbb62831656",
        date: "June 19, 2021",
        title: "My insights as a web developer in the MedTech industry",
        source: "medium",
        paragraph: <>I just finished up my two years of work in Dreamed Diabetes. I won’t go into what they do
            (since their website is pretty cool), but I would describe how it feels to be a med-teach company developer.</>
    },
    {
        url: "https://www.medium.com/@roysegall/introduction-django-decorated-routes-35c93fd3fee0",
        date: "May 05, 2020",
        title: "Introduction: Django Decorated Routes",
        source: "medium",
        // eslint-disable-next-line react/no-unescaped-entities
        paragraph: <>I've been working with Django for the past year as my daily driver. Up until then, I worked with Drupal, Symfony and
            a bit of Laravel. One of the most common things between all of the above, and also for others frameworks, is that
            eventually there’s a file that contains all the routes and it’s can get big.</>
    },
    {
        url: "https://www.gizra.com/content/restful-access-token",
        date: "October 27, 2016",
        title: "Let’s Talk about Decoupled Authentication",
        source: "gizra",
        paragraph: <>For a traditional Drupal site, we don’t need to handle authentication, because Drupal has our back - a user submits
            the login form, gets a cookie, and starts using the awesome site. But what about decoupled sites? How can we
            authenticate the user?</>
    }
];
